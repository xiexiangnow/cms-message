<?php
namespace App\Services\Front;
use App\Helpers\Tool;
use App\Models\ImgCategory;
use App\Models\Xinggan;
use Icarus\Kernel\Service;

/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2019/8/14
 * Time: 5:52 PM
 */
class XingGanService extends Service {

    /**
     * @return array
     */
    public function getXingGanCategoryList()
    {
        $imgCategoryModel = new ImgCategory();
        $result = $imgCategoryModel->getData([]);
        return $result;
    }

}