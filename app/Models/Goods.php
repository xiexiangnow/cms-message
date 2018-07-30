<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model{
    use softDeletes;
    const LIST_SIZE = 20;           //每页显示条数

    /**
     * @param $data
     * @return mixed
     */
    static public function insertGoods($data)
    {
        return Goods::insert([
            'pic_path' => $data['pic_path'],
            'cate_id'  => $data['cate_id'],
            'title'    => $data['title'],
            'money'    => $data['money'],
            'postage' => $data['postage'],
            'description' => $data['description'],
            'content' => $data['content'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * @param $where
     * @return mixed
     */
    static public function getGoods($where)
    {
        $goods = new Goods();
        if($where['cate_id']){
            $goods = $goods->where('cate_id',$where['cate_id']);
        }
        return $goods->orderBy('created_at','DESC')->paginate(self::LIST_SIZE);
    }

    /**
     * @param $id
     * @return mixed
     */
    static public function getDetail($id)
    {
        return Goods::find($id);
    }
}