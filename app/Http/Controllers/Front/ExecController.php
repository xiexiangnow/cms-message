<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Tool;
use App\Models\ImgCategory;
use App\Models\Xinggan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExecController extends Controller
{

    // 路由：front/exec_xinggan
    //执行性感美女数据中将titel抽离成分类
    public function execXingGan()
    {
        echo 111;die;
        $xingGanModel = new Xinggan();
        $imgCategoryModel = new ImgCategory();
        $dataList = $xingGanModel->getAllData();
        dd($dataList);die;
        $category = [];
        $result = []; //结果输出
        $data = [];
        foreach ($dataList as $key => $item){

                if (stripos($item['title'], '(') || stripos($item['title'], ')')) {
                    $item['title'] = preg_replace('/\(.*?\)/', '', $item['title']);
                }
                $existInfo = $imgCategoryModel->getByName($item['title']);
                if(empty($existInfo)) {
                    if (!in_array($item['title'], $category)) {
                        //判断拿到的图片是横图还是竖图
                        $imgAttr = Tool::myGetImageSize($item['img_src']);

                        if (!empty($imgAttr) && ($imgAttr['height'] > $imgAttr['width'])) {
                            $category[] = $item['title'];

                            $data['option'] = 1; // 1:性感美女
                            $data['name'] = $item['title'];
                            $data['cover_img'] = $item['img_src'];
                            $re = ImgCategory::add($data);
                            if ($re) {
                                echo "正在执行 > " . $item['title'] . '...<br/>';
                                echo '<img src="' . $item['img_src'] . '" style="width: 20px;height: 30px;"> <hr/>';
                            }
                        }
                    }
                }
        }
        echo  "<h3 style='color: red'>处理完成...</h3>";
    }

}
