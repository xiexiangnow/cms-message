<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\alipay\pagepay\buildermodel\AlipayTradePagePayContentBuilder;
use App\Helpers\alipay\pagepay\service\AlipayTradeService;
use App\Helpers\UserHelp;
use App\Models\Goods;
use App\Models\Order;
use App\Services\AlipayService;
use App\Services\writeIntoFileContentService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GoodsController extends CommonController
{
    /**
     * - 商品列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $where['cate_id'] = $request->get('cate_id',0);
        $params = [
            'goods' => Goods::getGoods($where)
        ];
        return view('admin.goods.buy_goods',$params);
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
     * - 订单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orders(Request $request)
    {
        $where = [
            'order_no' => trim($request->get('keyword')),
            'status'   => $request->get('status'),
        ];
        $params = [
            'keyword' => $request->get('keyword'),
            'orders'  => Order::getOrders($where),
            'status'  => $request->get('status')
        ];
        return view('admin.goods.orders',$params);
    }

    /**
     * - 删除订单
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrder(Request $request)
    {
        $orderId = $request->get('id');
        if(!$orderId){
            return response()->json([
                'success' => false,
                'status'  => 0,
                'msg'     => '参数缺失'
            ]);
        }

        if(Order::deleteOrder($orderId)){
            return response()->json([
                'success' => true,
                'status'  => 1,
                'msg'     => '删除成功'
            ]);
        }
        return response()->json([
            'success' => false,
            'status'  => 0,
            'msg'     => '删除失败'
        ]);
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

    /**
     * - 结算页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function settlement($id)
    {
        $params = [
            'detail' => Goods::getDetail($id)
        ];
        return view('admin.goods.settlement',$params);
    }

    /**
     * - 创建订单
     * @param $id
     * @param Request $request
     */
    public function order($id, Request $request)
    {
        echo  "<p>正在加载，请稍等...</p> ";

        if(!session('user')->name){
            $request->session()->flash('error_message', '用户未登录');
            return redirect('admin/goods');
        }
        $good = Goods::getDetail($id);
        $orderNo = $this->createOrderNo();  //生成订单号
        //创建订单
        $createRe = Order::insertOrder([
            'user_id' => session('user')->id,
            'goods_id'=> $id,
            'order_name' => $good->title,
            'order_no'   => $orderNo,
            'goods_mun'  => 1,
            'status'     => 1,   //1:待付款；2：待发货；3、待收货；4；订单完成
            'order_money' => $good->money,
            'description' => $good->description,
        ]);
        if(!$createRe){
            $request->session()->flash('error_message', '创建订单失败');
            return redirect('admin/goods');
        }

        // 订单详情
        $order = Order::getOrderByOrderNo($orderNo);

        $outTradeNo = $orderNo;  //商品订单号
        $subject  = $order->order_name;  //订单名称
        $totalAmount = $order->order_money;  //订单金额
        $body = $order->description;       //商品描述

        $service = new AlipayService();
        $service->aliPayPage($body, $subject, $totalAmount, $outTradeNo);
        //$service->payPage($outTradeNo, $totalAmount, $subject, '描述描述');
    }

}
