<?php
namespace App\Services\Front;
use App\Models\Xinggan;
use Icarus\Kernel\Service;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2019/8/14
 * Time: 4:08 PM
 */

class IndexService extends Service {

    public function getPicListByTitle($title)
    {
        if(!$title){
            return ['success' => false,'data' => '','msg' => '参数错误'];
        }
        $phpSpider = new Xinggan();
        $data = $phpSpider->getPicListByTitle($title);
        if(!empty($data)) {
            return ['success' => true,'data' => $data];
        }
        return ['success' => true,'data' => ''];
    }

}