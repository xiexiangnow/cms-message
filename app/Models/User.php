<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2017/3/30
 * Time: 下午4:33
 */
class User extends Model
{
  use SoftDeletes;

  const LIST_SIZE = 20; //每页显示条数


    /**
     * @return mixed
     */
    static public function getUserSum()
    {
        return User::count();
    }

    /**
     * @return mixed
     */
    static public function getAll()
    {
        return User::orderBy('id','ASC')->paginate(self::LIST_SIZE);
    }

    /**
     * @param $id
     * @return mixed
     */
    static public function deleteUser($id)
    {
        return User::where('id',$id)->delete();
    }

    /**
     * @param $id
     * @return bool
     */
    static public function isSuperAdmin($id)
    {
        if($id == 1){
            return true;
        }
        return false;
    }

    /**
     * @param $data
     * @param $password
     * @return mixed
     */
    static public function insertUser($data,$password)
    {
        return User::insert([
            'username'    => $data['username'],
            'password'    => $password,
            'name'        => $data['name'],
            'sex'         => $data['sex'],
            'description' => $data['description'],
            'is_admin'    => $data['is_admin'],
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}