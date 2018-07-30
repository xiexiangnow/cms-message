<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserHelp;
use App\Models\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GoodsController extends CommonController
{
    /**
     * - 商品列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where['cate_id'] = $request->get('cate_id',0);
        $params = [
            'goods' => Goods::getGoods($where)
        ];
        return view('admin.goods.index',$params);
    }

    /**
     * - 添加商品
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [

        ];
        return view('admin.goods.create',$params);
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
            'pic_path'    => 'required',
            'cate_id'     => 'required|numeric',
            'title'       => 'required',
            'money'       => 'required',
            'postage'     => 'required',
            'description' => 'required',
            'content'     => 'required'
        ],[
            'pic_path.required'    => '请上传商品图片',
            'cate_id.required'     => '请选择商品分类',
            'title.required'       => '商品标题为必填',
            'money.required'       => '商品价格不能为空',
            'postage.required'     => '商品运费不能为空',
            'description.required' => '请输入商品描述',
            'content.required'     => '请编写商品详情'
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        if(Goods::insertGoods($request->all())){
            $request->session()->flash('success_message', '保存成功！');
            return redirect('admin/goods');
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
        $params = [
            'detail' => Goods::getDetail($id)
        ];
        return view('admin.goods.detail',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * - 图片上传
     * @return mixed
     */
    public function upload()
    {
        $picName = explode('.',$_FILES['file']['name']);
        $filePath = $this->qiNiuUpload($_FILES['file']['tmp_name'],$_FILES['file']['name'],$picName[1]);
        if ($filePath){
            return response()->json([
                'success' => true,
                'path'   => $filePath,
                'msg'    => '上传成功！'
            ]);
        }
        return response()->json([
            'success' => false,
            'path'   => '',
            'msg'    => '上传失败！'
        ]);
    }
}
