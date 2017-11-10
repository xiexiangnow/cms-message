<?php
namespace App\Services;
use App\Models\Category;
use Icarus\Kernel\Service;
/**
 * Created by PhpStorm.
 * User: xiexiang
 * Date: 2017/4/19
 * Time: 上午12:41
 */
class CategoryService extends Service
{

    /**
     * - 得到树形处理后的分类列表
     * @param int $pid
     * @param array $result
     * @param int $space
     * @return array
     */
    public function getTree($pid=0,&$result=[],$space=0)
    {
        $space+=2;
        $parents = Category::where('cate_pid',$pid)->orderBy('cate_order','DESC')->get();
        foreach ($parents as $key => $val){
            if ($val->cate_pid != 0){
                $val['cate_name'] = str_repeat('&nbsp;&nbsp;&nbsp;',$space).'▲ '.$val['cate_name'];
            }
            $result[] = $val;
            $this->getTree($val->cate_id,$result,$space);
        }
        return $result;
    }

//    public function getTree($data,$newName,$fieldId='id',$fieldPid='pid',$pid=0)
//    {
//        if(!$data){
//            return false;
//        }
//        $newArray = [];
//        foreach ($data as $key => $val){
//            if($val->$fieldPid == $pid){
//                $data[$key]['_'.$newName] = $data[$key][$newName];
//                $newArray[] = $data[$key];
//            }
//            foreach ($data as $m => $n){
//                if($val->$fieldId == $n->$fieldPid){
//                    $data[$m]['_'.$newName] = '&nbsp;&nbsp;&nbsp;┣ '.$data[$m][$newName];
//                    $newArray[] = $data[$m];
//                }
//            }
//        }
//        return $newArray;
//    }
   
}