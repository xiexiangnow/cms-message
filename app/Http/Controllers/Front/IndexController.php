<?php

namespace App\Http\Controllers\Front;

use App\Models\Xinggan;
use App\Services\Front\IndexService;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redis;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spide = new Xinggan();

        $result = [
            'spiders' => $spide->getIndexShowList()
        ];
        return view('front.index.index',$result);
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $title = $request->get('title','');
        if(stripos($title,'(') || stripos($title,')')) {
            $title =  preg_replace('/\(.*?\)/', '', $title);
        }
        if(!trim($title)){
            throw new HttpException("404 未找到相关内容");
        }
        $indexService = new IndexService();
        $data = $indexService->getPicListByTitle($title);
        $result = [
            'pic_list' => $data['data'],
            'title'    => $title
        ];
        return view('front.index.detail',$result);
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
