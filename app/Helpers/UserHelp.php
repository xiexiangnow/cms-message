<?php
namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2017/11/9
 * Time: 下午10:58
 */

class UserHelp {


    public function isAdmin()
    {
        return (session('user')->id == 1) || (session('user')->is_admin == 1);
    }


}
