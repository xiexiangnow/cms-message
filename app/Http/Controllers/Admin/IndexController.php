<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use JaegerApp\Encrypt;


class IndexController extends CommonController
{
    /**
     * - 首页
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'integral'  => User::getUserById(session('user')->id)->integral   //积分查询
        ];
        return view('admin.buy_goods',$params);
    }

    /**
     * - 网站首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info()
    {
        $userService = new UserService();
        $result = [
            'content_sum'   => Article::getArticleSum(),
            'last_articles' => Article::getLastArticle(),
            'now_month_sum' => Article::getNowMonthSum(),
            'user_sum'      => User::getUserSum(),
            'is_check_in'   => $userService->checkUserIsCheckIn()
        ];
        return view('admin.info',$result);
    }

    /**
     * - 密码修改
     *
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modifyPass(Request $request)
    {
        if($request->getMethod() == 'POST') {
            $validator = Validator::make($request->all(), [
                'new_pass' => 'required|between:6,20|alpha_num:true|confirmed',
            ], [
                'new_pass.required'  => '新密码输入不能为空',
                'new_pass.between'   => '新密码的设置为6-20位',
                'new_pass.alpha_num' => '新密码的设置只能为字母或者数字',
                'new_pass.confirmed' => '新密码和确认密码的输入必须一致',
            ]);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }
            $databasePass = $this->encrypt->decode(User::find(session('user')->id)->password);
            if ($databasePass == $request->get('old_pass')) {
                // - 执行修改
                User::where('id', session('user')->id)->update([
                    'password' => $this->encrypt->encode($request->get('new_pass'))
                ]);
                $request->session()->flash('success_message','密码修改成功,请牢记！');
                return redirect('admin/modify_pass');
            }
            return back()->withInput()->with('errors','原密码输入错误');
        }
        return view('admin.modify_pass');
    }


}
