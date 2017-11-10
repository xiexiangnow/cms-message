<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QueueController extends CommonController
{
    public function queue(Request $request)
    {

        try {
            dispatch((new SendEmail($request))->noQueue(SendEmail::NAME)->delay(60));
        }catch (\Exception $e){

        }
    }



}
