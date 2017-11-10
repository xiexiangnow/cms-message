<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function __construct()
    {
        $this->encrypt = (new Encrypt())->setKey(env('ENCRYPT_STRING'));
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
            return $spaceFileName;
        }
    }



    
}
