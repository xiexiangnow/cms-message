<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xinggan extends Model{

    const LIST_SIZE = 20;           //每页显示条数
    use softDeletes;

    /**
     * @return mixed
     */
    public function get()
    {
        $spider = new Xinggan();
        return $spider->orderBy('id','DESC')->paginate(self::LIST_SIZE);
    }

    /**
     * - 美女图片上首页
     * @param $data
     * @return mixed
     */
    public function goIndex($data)
    {
        return Xinggan::where('id',$data['id'])->update([
            'is_index'  => $data['is_index']
        ]);
    }

    /**
     * - 获取首页展示的图片
     * @return mixed
     */
    public function getIndexShowList()
    {
        $spider = new Xinggan();
        return $spider->where('is_index',1)->orderBy('updated_at','DESC')->get();
    }

    /**
     * - 首页显示的数量
     * @return mixed int
     */
    public function getIndexShowNum()
    {
        $spider = new Xinggan();
        return $spider->where('is_index',1)->count();
    }

    /**
     * @param $title
     * @return mixed
     */
    public function getPicListByTitle($title)
    {
        $spider = new Xinggan();
        return $spider->where('title','like','%'.$title.'%')->get();
    }

    /**
     * @return mixed
     */
    public function getAllData()
    {
        $spider = new Xinggan();
        return $spider->orderBy('id','DESC')->get();
    }
}