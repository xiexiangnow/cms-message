<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manager;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    /**
     * - ipr所有人员信息
     * @param Manager $manager
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Manager $manager,Request $request)
    {
        $where = [
            'keyword' => $request->get('keyword'),
            'level'   => $request->get('level'),
            'row'     => $request->get('row'),
            'status'  => $request->get('status')
        ];
        $params = [
            'levels'   => $this->levels(),
            'managers' => $manager->getAll($where),
            'keyword'  => $request->get('keyword'),
            'now_level'=> $request->get('level'),
            'row'      => $request->get('row'),
            'status'  => $request->get('status')
        ];
        return view('admin.manager.index',$params);
    }

    /**
     * - 详情页面
     * @param $id
     * @param Manager $manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, Manager $manager)
    {

        $params = [
            'manager' => $manager->getDetail($id)
        ];
        return view('admin.manager.show',$params);
    }

    private function levels(){
        return ["Z1","Z2","Z3","Z4","Z5","Z6","Z7","Z8","Z9","Z10","Z11",
            "Z12","Z13","Z14","Z15","Z16","Z17","Z18","Z19","Z20"];
    }
}
