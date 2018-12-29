<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class RegionController extends Controller
{
    //临时处理数据
    public function index(Area $area, Region $region)
    {
        $areas = $area->getAreaById(1);

        $arrayAreas = json_decode(str_replace("'","\"",$areas->values));

        foreach ($arrayAreas as $key => $item){
          foreach ($item->cityList as $city){
              $data['code'] = $item->code;
              $data['name'] = $city;
              $data['type'] = 3;
              $data['pid']  = 0;
              $data['create_time'] = Carbon::now();
              $data['update_time'] = Carbon::now();
              $data['create_guid'] = 1;

             $region->insetData($data);
          }

        }






    }
}
