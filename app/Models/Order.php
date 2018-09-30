<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model{

    use softDeletes;
    const LIST_SIZE = 20;           //每页显示条数

    /**
     * - 创建订单
     * @param $data
     * @return mixed
     */
    static public function insertOrder($data)
    {
        return Order::insert([
            'user_id'  => $data['user_id'],
            'goods_id' => $data['goods_id'],
            'order_name' => $data['order_name'],
            'order_no' => $data['order_no'],
            'goods_num'=> $data['goods_mun'],
            'status'   => $data['status'],   //1:待付款；2：待发货；3、待收货；4；订单完成
            'order_money'=> $data['order_money'],
            'description'=> $data['description'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * - 获取订单
     * @param $where
     * @return mixed
     */
    static public function getOrders($where = [])
    {
        $order = new Order();
        if(isset($where['user_id']) && $where['user_id']){
            $order = $order->where('user_id',$where['user_id']);
        }
        if(isset($where['status']) && $where['status']){
            $order = $order->where('status',$where['status']);
        }
        if(isset($where['order_no']) && $where['order_no']){
            $order = $order->where('order_no','like','%'.$where['order_no'].'%');
        }
        return $order->orderBy('created_at','DESC')->paginate(self::LIST_SIZE);
    }

    /**
     * - 获取单个订单
     * @param $id
     * @return mixed
     */
    static public function getOrderById($id)
    {
        return Order::find($id);
    }

    /**
     * - 根据订单号查询订单
     * @param $orderNo
     * @return mixed
     */
    static public function getOrderByOrderNo($orderNo)
    {
        return Order::where(['order_no' => $orderNo])->first();
    }


    /**
     * - 删除订单
     * @param $id
     * @return mixed
     */
    static public function deleteOrder($id)
    {
        return Order::where(['id' => $id])->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo("App\Models\Goods");
    }
}