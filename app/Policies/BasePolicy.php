<?php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: xiexiang
* Date: 2017/11/8
* Time: 上午9:48
*/

class BasePolicy {
    use HandlesAuthorization;

    /**
     * @return bool
     */
    public function before()
    {
        if($this->isSuperAdmin() || $this->isAdmin()){
            return true;
        }
    }

    /**
     * - 是否是超管
     * @return bool
     */
    public function isSuperAdmin()
    {
         if(session('user')->id == 1){
             return true;
         }
         return false;
    }

    /**
     * - 是否是管理员
     * @return bool
     */
    public function isAdmin()
    {
        if(session('user')->id_admin == 1){
            return true;
        }
        return false;
    }


}