@extends('layouts.middle')
@section('middle-content')
    <style>
        .control-group .controls label{
            display:inline-block;
        }
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
    </style>
    <body>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 添加用户
            </div>
        </div>
        <div id="content-header">
            <h1>添加用户</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                            <h5>添加</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('admin.user.store')}}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 用户名：</label>
                                    <div class="controls">
                                        <input type="text" name="username" class="span11" placeholder="请输入用户名" style="font-size: 10px" value="{{old('username')}}">
                                        @if($errors->has('username'))
                                            <span class="help-block" style="color: red">{{$errors->first('username')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 真实姓名：</label>
                                    <div class="controls">
                                        <input type="text" name="name" class="span11" placeholder="请输入真是姓名" style="font-size: 10px" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <span class="help-block" style="color: red">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 密码：</label>
                                    <div class="controls">
                                        <input type="password" name="password" class="span11" placeholder="请输入密码" style="font-size: 10px" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <span class="help-block" style="color: red">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 是否管理员：</label>
                                    <div class="controls">
                                        <input type="radio" name="is_admin" value="1" @if(old('is_admin') == 1)checked="checked"@endif> 是 &nbsp;&nbsp;
                                        <input type="radio" name="is_admin" value="0" @if(old('is_admin') == 0)checked="checked"@endif> 否
                                        @if($errors->has('is_admin'))
                                            <span class="help-block" style="color: red">{{$errors->first('is_admin')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><i style="color: red">*</i> 性别：</label>
                                    <div class="controls">
                                        <input type="radio" name="sex" value="1" @if(old('sex') == 1)checked="checked"@endif> 男 &nbsp;&nbsp;
                                        <input type="radio" name="sex" value="0" @if(old('sex') == 0)checked="checked"@endif> 女
                                        @if($errors->has('sex'))
                                            <span class="help-block" style="color: red">{{$errors->first('sex')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">描述：</label>
                                    <div class="controls">
                                        <textarea name="description" class="span11" placeholder="请输入用户描述" style="font-size: 10px">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn btn-success" value="提交">
                                    <input type="button" class="btn btn-info" onclick="history.go(-1)" value="返回">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.textarea_editor').wysihtml5();
    </script>
    </body>
@endsection