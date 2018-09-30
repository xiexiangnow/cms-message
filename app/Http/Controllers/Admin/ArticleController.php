<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserHelp;
use App\Models\Article;
use App\Models\Tag;
use App\Services\CategoryService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Helper\Helper;


class ArticleController extends CommonController
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * - 文章列表
     * @param Article $article
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article,Request $request)
    {
        $where = [
            'cate_id' => $request->get('cate_id'),
            'keyword' => trim($request->get('keyword'))
        ];
        $result = [
             'articles'    => $article->get($where),
             'cate_tree'   => $this->categoryService->getTree(),
             'now_cate_id' => $request->get('cate_id'),
             'now_keyword' => $request->get('keyword')
        ];
        return view('admin.article.list',$result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');
        // 获取文件相关信息
        $originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();       //临时文件的绝对路径
        $type = $file->getClientMimeType();     // image/jpeg
        $filePath = $this->qiNiuUpload($realPath, $originalName, $ext);
        if ($filePath){
            return response()->json([
                'status' => 1,
                'path'   => $filePath,
                'msg'    => '上传成功！'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '上传失败！'
        ]);
        }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Tag $tag)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $result = [
            'cate_tree'  => $this->categoryService->getTree(),
            'tags'       => $tag->getJsonTagsList()
        ];
        return view('admin.article.add',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        $validator = Validator::make($request->all(),[
            'cate_id'     => 'required|numeric',
            'title'       => 'required',
            'content'     => 'required',
            'description' => 'required',
            'sort'        => 'integer',
            'view'        => 'integer'
        ],[
            'title.required' => '标题为必填',
            'content.required'     => '请编写内容详情',
            'description.required' => '请输入内容描述',
            'sort.integer'         => '排序的输入必须是整数，默认为0',
            'view.integer'         => '浏览次数的输入必须是整数，默认为0'

        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if(Article::insertArticle($request->all())){
            $request->session()->flash('success_message', '保存成功！');
            return redirect('admin/article');
        }
        $request->session()->flash('error_message', '保存失败！');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Article::where(['id'=> $id])->increment('view');
        $result = [
            'detail' => Article::getDetail($id)
        ];
        return view('admin.article.detail',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $result = [
            'article'    => Article::getDetail($id),
            'cate_tree'  => $this->categoryService->getTree()
        ];
        return view('admin.article.edit',$result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $validator = Validator::make($request->all(),[
            'cate_id'     => 'required|numeric',
            'title'       => 'required',
            'content'     => 'required',
            'description' => 'required',
            'sort'        => 'integer',
            'view'        => 'integer'
        ],[
            'title.required' => '标题为必填',
            'content.required'     => '请编写内容详情',
            'description.required' => '请输入内容描述',
            'sort.integer'         => '排序的输入必须是整数，默认为0',
            'view.integer'         => '浏览次数的输入必须是整数，默认为0'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if(Article::updateArticle($request->all())){
            $request->session()->flash('success_message', '修改成功！');
            return redirect('admin/article');
        }
        $request->session()->flash('error_message', '修改失败！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            return response()->json([
                'status' => 0,
                'msg'    => '无操作权限！'
            ]);
        }
        if(!$request->get('id')){
            return response()->json([
                'status' => 0,
                'msg'    => '参数缺失！'
            ]);
        }

        if(Article::deleteArticle($request->get('id'))){
            return response()->json([
                'status' => 1,
                'msg'    => '内容删除成功！'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '删除失败！'
        ]);
    }


    /**
     * - 发送短信
     * @param Request $request
     */
    public function sendSMS(Request $request)
    {
//        echo Redis::get('TEST');
//        echo Redis::get('my-test');
//        Redis::set('test-mi','this is a test!!!');
//        Redis::set('my-test','hello world!!!');
//
//
//
//       $re =  (new Curl())->post('http://m.5c.com.cn/api/send/index.php',
//            [
//                'username' => '18502368717',
//                'password_md5' => md5('chongqing123'),
//                'apikey'  => '7e5928edae03d71d252a01b31e11bbf5',
//                'mobile'  => '18723426002,18502368717',
//                'content' => urlencode('短信内容'),
//                'encode' => 'UTF-8',
//            ]);
//        dd($re);
    }
}
