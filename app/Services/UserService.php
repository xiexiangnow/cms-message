<?php
namespace App\Services;
use App\Models\User;
use Carbon\Carbon;
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

    /**
     * - 检验用户是否签到
     * @return bool
     */
    public function checkUserIsCheckIn(){
        //  _________(可以签到)___________【今天的开始】________（已签到）________【今天的结束】_________（不能签到）__________
        $user = User::getUserById(session('user')->id);
        //查询数据库中的签到时间，如若为空，添加签到时间，积分+1;如若不为空，比较签到时间
        if(!$user->last_checkin_time){
            return true;
        }else{
            //获取当天的开始及结束时间
            $nowDayStartTime = date("Y-m-d 00:00:01",time());
            $nowDayEndTime   = date("Y-m-d 23:59:59",time());
            //如果当前时间小于当前时间的最后一刻，可以签到，否则不签到
            if(strtotime($user->last_checkin_time) < strtotime($nowDayStartTime)){
                //可以签到
                return true;
            }elseif((strtotime($user->last_checkin_time) > strtotime($nowDayStartTime))
                && (strtotime($user->last_checkin_time) < strtotime($nowDayEndTime))){
                //已签到
                return false;
            }elseif(strtotime($user->last_checkin_time) > strtotime($nowDayEndTime)){
                return false;
            }
        }
    }
    
}