<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2018/10/31
 * Time: 3:21 PM
 */
class Manager extends Model{

    const LIST_SIZE = 20;           //每页显示条数

    /**
     * - 获取所有
     * @param $where
     * @return mixed
     */
    public function getAll($where)
    {
        $manager = new Manager();

        $where['level'] &&  $manager = $manager->where('z_level',$where['level']);
        $where['keyword'] &&  $manager = $manager->where('truename','like','%'.$where['keyword'].'%');
        ($where['status'] && $where['status'] == 1) && $manager = $manager->where('state',$where['status']);
        ($where['status'] && $where['status'] == 2) && $manager = $manager->where('state',0);

        return $manager->orderBy('create_time','DESC')
            ->paginate($where['row'] ? $where['row'] : self::LIST_SIZE);
    }

    /**
     * - 获取详情
     * @param $id
     * @return mixed
     */
    public function getDetail($id)
    {
       return Manager::find($id);
    }
}