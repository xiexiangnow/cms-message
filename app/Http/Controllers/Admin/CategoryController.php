<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserHelp;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Icarus\Exceptions\AppException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{

    /**
     * @var CategoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * - 分类列表
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [
            'categories' => $this->categoryService->getTree()
        ];
        return view('admin.category.index',$result);
    }

    /**
     * - 分类排序
     *
     * @param Request $request
     * @param $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function cateOrder(Request $request,Category $category)
    {
        $cateId    = $request->get('cate_id');
        $cateOrder = $request->get('cate_order');
        $validator = Validator::make($request->all(),[
            'cate_id'    => 'numeric',
            'cate_order' => 'numeric'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 0,
                'msg'    => '参数缺失或者排序数值不合法！'
            ]);
        }
        if($cateOrder > 127){
            return response()->json([
                'status' => 0,
                'msg'    => '输入不能大于127！'
            ]);
        }

        if($category->orderCate($cateId,$cateOrder)){
            return response()->json([
                'status' => 1,
                'msg'    => '排序更新成功！'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '排序更新失败！'
        ]);
    }

    /**
     * - 添加分类页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
       $result = [
            'cate_tree' => $this->categoryService->getTree(),
            'parent_id' => $request->get('cate_id')
       ];
       return view('admin.category.add',$result);
    }

    /**
     * - 分类存储
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $validator = Validator::make($request->all(), [
            'cate_name'  => 'required',
            'cate_order' => 'integer'
        ], [
            'cate_name.required' => '分类名称的输入不能为空',
            'cate_order.integer' => '排序的输入必须是整数，默认为0'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        if (Category::addCategory($request->all())) {
            $request->session()->flash('success_message', '添加分类成功！');
            return redirect('admin/category');
        }
        $request->session()->flash('error_message', '添加失败！');
    }

    /**
     * - 分类删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $cateId = $request->get('cate_id');
        if(!$cateId){
            return response()->json([
                'status' => 0,
                'msg'    => '参数缺失！'
            ]);
        }
        if(Category::isHaveChild($cateId) > 0){
            return response()->json([
                'status' => 0,
                'msg'    => '存在下级分类，禁止删除！'
            ]);
        }

        if(Article::isHaveArticleByCateId($cateId) > 0){
            return response()->json([
                'status' => 0,
                'msg'    => '分类下有内容，禁止删除！'
            ]);
        }

        if(Category::deleteCategory($request->get('cate_id'))){
            return response()->json([
                'status' => 1,
                'msg'    => '分类删除成功！'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '删除失败！'
        ]);
    }

    /**
     * - 分类修改页面
     *
     * @param $id
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        if(!$id || !is_numeric($id)){
            return false;
        }
        $result = [
            'category'   => Category::showCategory($id),
            'cate_tree'  => $this->categoryService->getTree()
        ];
        return view('admin.category.edit',$result);
    }

    /**
     * - 执行分类修改
     *
     * @param Request $request
     * @return $this
     */
    public function update(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $validator = Validator::make($request->all(), [
            'cate_name'  => 'required',
            'cate_order' => 'integer'
        ], [
            'cate_name.required'  => '分类名称的输入不能为空',
            'cate_order.integer'   => '排序的输入必须是整数，默认为0'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        if(Category::updateCategory($request->all())){
            $request->session()->flash('success_message','修改分类成功！');
            return redirect('admin/category');
        }else{
            $request->session()->flash('error_message','修改分类失败！');
            return redirect('admin/category');
        }

    }

}
