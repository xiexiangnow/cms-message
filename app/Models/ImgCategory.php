<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2019/8/16
 * Time: 2:08 PM
 */

class ImgCategory extends Model {

    const LIST_SIZE = 28;           //每页显示条数
    use softDeletes;


    /**
     * @param $data
     * @return mixed
     */
    public static function add($data)
    {
        return ImgCategory::insert([
            'option'     => $data['option'],
            'name'       => $data['name'],
            'cover_img'  => $data['cover_img'],
            'updated_at'  => Carbon::now(),
            'created_at'  => Carbon::now()
        ]);
    }

    /**
     * @param $name
     * @return mixed
     */
    public  function getByName($name)
    {
        $imgCategoryModel = new ImgCategory();
        return $imgCategoryModel->where('name',$name)->first();
    }

    /**
     * @param $where
     * @return mixed
     */
    public function getData($where)
    {
        $imgCategory = new ImgCategory();

        if(isset($where['keyword']) && !empty($where['keyword'])){
            $imgCategory = $imgCategory->where('name','like','%'.$where['keyword'].'%');
        }
        return $imgCategory->orderBy('id','DESC')->paginate(self::LIST_SIZE);
    }
}