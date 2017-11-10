<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    protected $primaryKey = 'cate_id';
    public $timestamps=false;
    //use SoftDeletes;

    static public function get()
    {
        return Category::orderBy('cate_order','DESC')->get();
    }

    public function orderCate($cateId,$cateOrder)
    {
        return $this->where('cate_id',$cateId)->update(['cate_order' => $cateOrder]);
    }

    static public function getParents()
    {
        return Category::where('cate_pid',0)->get();
    }

    /**
     *  - 添加
     * @param $data
     * @return mixed
     */
    static public function addCategory($data)
    {
        return Category::insert([
            'cate_pid'         => $data['pid'],
            'cate_name'        => $data['cate_name'],
            'cate_title'       => $data['cate_title'],
            'cate_keywords'    => $data['cate_keywords'],
            'cate_description' => $data['cate_description'],
            'cate_order'       => $data['cate_order'],
            'created_at'       => Carbon::now()
        ]);
    }

    /**
     * - 修改
     * @param $data
     * @return mixed
     */
    static public function updateCategory($data)
    {
        return Category::where('cate_id',$data['cate_id'])->update(
            [
                'cate_pid'         => $data['pid'],
                'cate_name'        => $data['cate_name'],
                'cate_title'       => $data['cate_title'],
                'cate_keywords'    => $data['cate_keywords'],
                'cate_description' => $data['cate_description'],
                'cate_order'       => $data['cate_order'],
                'updated_at'       => Carbon::now()
            ]
        );
    }

    /**
     * -详情
     * @param $id
     * @return mixed
     */
    static public function showCategory($id)
    {
        return Category::find($id);
    }

    /**
     * - 删除分类
     * @param $cateId
     * @return mixed
     */
    static public function deleteCategory($cateId)
    {
        return Category::where('cate_id',$cateId)->delete();
    }

    static public function isHaveChild($cateId)
    {
        return Category::where('cate_pid',$cateId)->count();
    }
}
