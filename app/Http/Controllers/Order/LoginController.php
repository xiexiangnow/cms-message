<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if($request->getMethod() == 'POST'){
            if( !trim($request->get('phone'))
                ||
                !trim($request->get('password')))
            {
                return back()->with('msg','手机号码和密码不能为空！');
            }
//            if($user = $this->userService->checkUser($request->all())){
//                // 存session
//                session(['user' => $user]);
//                return redirect('admin/index');
//            }

            return redirect('order/index');
            //return back()->with('msg','用户名或者密码错误！');
        }
        return view('order.login.login', []);
    }



}
