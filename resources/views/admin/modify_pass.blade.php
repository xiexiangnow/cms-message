@extends('layouts.middle')
@section('middle-content')
<body>
<style>

    #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
    #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
</style>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 修改密码
        </div>
    </div>
    <div id="content-header">
        <h1>修改密码</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>修改密码</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">原密码 :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="old_pass" value="{{old('old_pass')}}" placeholder="请输入原始密码"  style="font-size: 10px" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">新密码 :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="new_pass" value="{{old('new_pass')}}" placeholder="新密码6-20位" style="font-size: 10px"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">确认密码 :</label>
                                <div class="controls">
                                    <input type="password" class="span11" name="new_pass_confirmation" value="{{old('new_pass_confirmation')}}" placeholder="再次输入新密码" style="font-size: 10px" />
                                </div>
                            </div>
                            @if(count($errors) > 0)
                                <div class="mark">
                                    @if(is_object($errors))
                                        @foreach($errors->all() as $error)
                                            <p style="margin-left: 120px;color: red;margin-top: 5px">{{$error}}</p>
                                        @endforeach
                                    @else
                                        <p style="margin-left: 120px;color: red;margin-top: 5px">{{$errors}}</p>
                                    @endif
                                </div>
                            @endif
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">保存</button>
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