<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JaegerApp\Encrypt;


class LoginController extends CommonController
{
    /**
     * @var UserService
     */
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService  = $userService;
    }

    /**
     * - 登录
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if($request->getMethod() == 'POST'){
            if( !trim($request->get('username'))
                ||
                !trim($request->get('password')))
            {
                return back()->with('msg','用户名和密码不能为空！');
            }
            if($user = $this->userService->checkUser($request->all())){
                // 存session
                session(['user' => $user]);
                return redirect('admin/index');
            }
            return back()->with('msg','用户名或者密码错误！');
        }
        return view('admin.login');
    }

    /**
     * - 退出
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOut()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }


}
