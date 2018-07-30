<?php
namespace App\Services;
use App\Models\User;
use Icarus\Kernel\Service;
use JaegerApp\Encrypt;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2017/4/19
 * Time: 上午12:41
 */
class UserService extends Service
{

    public function checkUser($userInfo)
    {
        if($user = User::where([
            'username' => $userInfo['username'],
            'password' => (new Encrypt())->setKey(env('ENCRYPT_STRING'))->encode($userInfo['password'])
        ])->first()){
            return $user;
        }
        return false;
    }
    
}