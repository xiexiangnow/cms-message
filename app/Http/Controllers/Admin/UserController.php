<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UserHelp;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends CommonController
{
    /**
     * - 用户列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [
            'users' => User::getAll()
        ];
        return view('admin.user.index',$result);
    }

    /**
     * - 创建账户
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        $validator = Validator::make($request->all(),[
            'username'        => 'required|between:4,20',
            'name'            => 'required',
            'password'        => 'required|between:6,20|alpha_num:true',
            'is_admin'        => 'required|numeric',
            'sex'             => 'required|numeric'
        ],[
            'username.required'       => '用户名为必填',
            'username.between'        => '用户名长度为4-20位',
            'name.required'           => '真实姓名为必填',
            'password.required'       => '密码为必填项',
            'password.between'        => '新密码的设置为6-20位',
            'password.alpha_num'      => '新密码的设置只能为字母或者数字',
            'is_admin.required'       => '请选择是否为管理员',
            'sex.required'            => '请选择性别'
        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }
        $password = $this->encrypt->encode($request->get('password'));
        if(User::insertUser($request->all(),$password)){
            $request->session()->flash('success_message', '添加成功！');
            return redirect('admin/user');
        }
        $request->session()->flash('error_message', '添加失败！');
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
     * - 账户删除
     * Remove the specified resource from storage.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!(new UserHelp())->isAdmin()) {
            abort(403, '无操作权限');
        }
        if(!$request->get('id')){
            return response()->json([
                'status' => 0,
                'msg'    => '缺少参数'
             ]);
        }

        //超管不能删除
        if(User::isSuperAdmin($request->get('id'))){
            return response()->json([
                'status' => 0,
                'msg'    => '超级管理不能删除哦'
            ]);
        }

        if(User::deleteUser($request->get('id'))){
            return response()->json([
                'status' => 1,
                'msg'    => '删除成功'
            ]);
        }
        return response()->json([
            'status' => 0,
            'msg'    => '删除失败'
        ]);
    }
}
