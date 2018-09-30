<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Carbon\Carbon;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

use App\Http\Requests;
use JaegerApp\Encrypt;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;


class CommonController extends Controller
{

    /**
     * @var \mithra62\Encrypt
     */
    protected $encrypt;

    private $userService;

    public function __construct()
    {
        $this->encrypt = (new Encrypt())->setKey(env('ENCRYPT_STRING'));
        $this->userService = new UserService();
    }


    /**
     * - 七牛认证
     * @return string
     */
    public function qiNiuAuth()
    {
        $auth      = new Auth(env('QINIU_ACCESS_KEY'), env('QINIU_SECRET_KEY'));
        $token     = $auth->uploadToken(env('QINIU_BUCKET_NAME'));
        return $token;
    }

    /**
     * - 七牛文件上传
     * @param $filePath / 文件的绝对路径
     * @param $fileName / 文件的原名
     * @param $suffix   / 文件扩展名
     * @return bool|string
     */
    public function qiNiuUpload($filePath,$fileName,$suffix)
    {
        $upManager       = new UploadManager();
        $spaceFileName   = env('QINIU_FILE_PREFIX').date('YmdHis').mt_rand(100,999).md5($fileName).'.'.$suffix;
        list($ret, $err) = $upManager->putFile($this->qiNiuAuth(), $spaceFileName, $filePath);
        if ($err !== null) {
            return false;
        } else {
            return env('QINIU_FERFIX_URL').$spaceFileName;
        }
    }

    /**
     * - 生成随机订单号
     * @return string
     */
    public function createOrderNo()
    {
       return  date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    /**
     * - 检查签到情况，并修改签到后对签到时间及积分的修改
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkIn(){
        $user = User::getUserById(session('user')->id);
        if($this->userService->checkUserIsCheckIn()){
            User::updateUser($user->id, [
                'last_checkin_time' => Carbon::now()
            ]);
            User::incrementIntegral($user->id, 1);
            return response()->json([
                'status' => 1,
                'msg'    => '签到成功！积分+1'
            ]);
        }else{
            return response()->json([
                'status' => 0,
                'msg'    => '今天已经签到了哦！'
            ]);
        }
    }





    
}
