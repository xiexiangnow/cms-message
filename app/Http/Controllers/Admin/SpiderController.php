<?php

namespace App\Http\Controllers\Admin;

use App\Models\Xinggan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpiderController extends Controller
{

    const INDEX_SET_NUM = 50;  //设置在首页显示的数量
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spider = new Xinggan();
        $result = [
            'spiders' => $spider->get()
        ];

        return view('admin.spider.buy_goods',$result);
    }

    /**
     * - 美女图片首页显示
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function goIndex(Request $request)
    {
        $pid = $request->get('pid');
        if(!$pid || !is_numeric($pid)) {
            return response()->json([
                'status' => 0,
                'msg'    => '参数错误！'
            ]);
        }
        $spider = new Xinggan();
        $indexShowNum = $spider->getIndexShowNum();
        if ($indexShowNum > self::INDEX_SET_NUM) {
            return response()->json([
                'status' => 0,
                'msg'    => '首页只可以设置'.self::INDEX_SET_NUM.'张'
            ]);
        }
        $result = $spider->goIndex([
            'id' => $pid,
            'is_index' => 1
        ]);
        if($result) {
            $surplus = self::INDEX_SET_NUM - $indexShowNum;
            return response()->json([
                'status' => 1,
                'msg'    => '操作成功！还可以添加'.$surplus.'张。'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '操作失败！'
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
