<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Leaps\HttpClient\Adapter\Curl;

class HttpController extends CommonController
{

    // - 获取认证
    private function auth()
    {
        $authInfo =(new Curl())->post('http://kunkka.zbjwork.com/oauth/access_token',
            [
                'grant_type'    => 'client_credentials',
                'client_id'     => 'M2tNAk2dBmdYvhXoOXat',
                'client_secret' => '9KVTRcNdX8Uev0A9Ayb3LV5M9Qf0hPDveAh1FE4z',
                'scope'         => 'oauth:scope:read,knight:instance:read,knight:instance:write,knight:project:read,knight:project:write,knight:enum:read,knight:enum:write'
            ])->getContent();
        return json_decode($authInfo);
    }

    // - 项目列表
    public function projects()
    {
         $curl = new Curl();
         $authInfo = $this->auth();
         $curl->setHeader('Accept','application/vnd.knight.v1+json');
         $curl->setHeader('Authorization', $authInfo->token_type.' '.$authInfo->access_token);
        return $curl->get('http://knight.api.zbjwork.com/projects')->getContent();
    }


    
}
