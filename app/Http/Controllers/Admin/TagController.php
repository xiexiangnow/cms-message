<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Tag $tag)
    {
        $result =[
            'tags' => $tag->get()
        ];
        return view('admin.tag.buy_goods',$result);
    }

    /**
     * - 添加标签页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tag.add');
    }

    /**
     * - 添加标签
     * @param Request $request
     * @param Tag $tag
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request,Tag $tag)
    {
        $validator = Validator::make($request->all(),
            [
                'tag_name'      => 'required|max:200',
                'tag_color'     => 'required'
            ],[
                'tag_name.required'  => '标签名为必填',
                'tag_color.required' => '请选择一种颜色'
            ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if($tag->addTag($request->all())){
            $request->session()->flash('success_message', '添加标签成功！');
            return redirect('admin/tag');
        }
        $request->session()->flash('error_message', '添加标签失败！');
    }

    /**
     * - 删除tag
     * @param Tag $tag
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function destroy(Tag $tag,Request $request)
    {
        $id = $request->get('id');
        if(!$id || !is_numeric($id)){
            return response()->json(['status'=>0,'msg'=>'参数错误！']);
        }
        try{
            if($tag->deleteTag($id)){
                return response()->json(['status'=>1,'msg'=>'删除成功！']);
            }
            return response()->json(['status'=>0,'msg'=>'删除失败！']);
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * @param $id
     * @param Tag $tag
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id,Tag $tag)
    {
        if(!$id || !is_numeric($id)){
            return false;
        }
        $result = [
            'tag' => $tag->getOne($id)
        ];
        return view('admin.tag.edit',$result);
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request,Tag $tag)
    {
        $validator = Validator::make($request->all(),
            [
                'tag_name'      => 'required|max:200',
                'tag_color'     => 'required',
                'tag_id'        => 'required'
            ],[
                'tag_name.required'  => '标签名为必填',
                'tag_color.required' => '请选择一种颜色',
            ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if ($tag->updateTag($request->all())) {
            $request->session()->flash('success_message', '修改标签成功！');
            return redirect('admin/tag');
        } else {
            $request->session()->flash('error_message', '修改标签失败！');
            return redirect('admin/tag');
        }
    }

}