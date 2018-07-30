<?php

namespace App\Http\Controllers\Api\V1\Project;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\Controller;
use Leaps\HttpClient\Adapter\Curl;

class ProjectController extends Controller
{
    /**
     * -- 项目列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curl = new Curl();
        $curl->setHeader('Accept','application/vnd.kunkka.v1+json');
        $re =  $curl->post('http://kunkka.zbjwork.com/oauth/access_token',
            [
                'grant_type'    => 'client_credentials',
                'client_id'     => 'M2tNAk2dBmdYvhXoOXat',
                'client_secret' => 'Wd9g7EeSZ6vsf68EDQntynQBlAMpq8McdXaiPEka',
                'scope'         => 'oauth:scope:read,knight:instance:read,knight:project:read,knight:enum:read'
            ]
            )->getContent();
       dd($re);
    }

}
