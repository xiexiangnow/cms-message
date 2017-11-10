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
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 用户管理
            </div>
        </div>
        <div id="content-header">
            <h1>用户列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>列表</h5>
                            @if((new \App\Helpers\UserHelp())->isAdmin())
                            <a href="{{url('admin/category/create')}}" class="btn btn-success btn-mini" style="margin-top: 10px;float: right;margin-right: 10px">新增用户</a>
                                @endif
                        </div>
                        <div class="widget-content ">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                <tr>
                                    <th class="tc" width="5%">ID</th>
                                    <th>用户名</th>
                                    <th>姓名</th>
                                    <th>权限</th>
                                    <th>创建时间</th>
                                    <th width="18%">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr class="content-list">
                                        <td class="tc">{{$user->id}}</td>
                                        <td>{{$user->username}}</td>
                                        @if($user->id == 1)
                                            <td><b>{{$user->name}}</b></td>
                                        @else
                                            <td>{{$user->name}}</td>
                                        @endif
                                        <td>
                                            @if($user->is_admin == 1)
                                                管理员
                                                @else
                                                非管理员
                                                @endif
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @if(!($user->id ==1))
                                                @if((new \App\Helpers\UserHelp())->isAdmin())
                                                <a class="btn btn-danger btn-mini" href="javascript:void(0)" onclick="deleteUser({{$user->id}})">删除</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="content-list">
                                        <td class="tc" colspan="5">暂无内容</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <span style="margin-left: 10px;">共 {{ $users->total() }} 条数据</span>
                        <div class="pagination alternate right">
                            <ul>
                                {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                {{--<li class="active"> <a href="#">1</a> </li>--}}
                                {{--<li><a href="#">2</a></li>--}}
                                {{--<li><a href="#">3</a></li>--}}
                                {{--<li><a href="#">4</a></li>--}}
                                {{--<li><a href="#">Next</a></li>--}}
                                <span style="float: right">{!! $users->appends(Input::all())->render() !!}</span>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // - 删除分类
        function deleteUser(userId){
            layer.msg('确定执行删除操作么?', {
                time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    layer.close(index);
                    // - 执行区域
                    var url = "{{ route('admin.user.destroy') }}";
                    $.ajax({
                        data:{'id':userId},
                        type: 'DELETE',
                        url: url,
                        dataType: 'json'
                    }).done(function (data) {
                        if(data.status == 1){
                            $.toast({
                                heading: '提示信息',
                                text: data.msg,
                                position: 'top-right',
                                stack: false
                            });
                            window.setTimeout("window.location='/admin/user'",2000);
                        }else{
                            $.toast({
                                heading: '提示信息',
                                text: data.msg,
                                position: 'top-right',
                                stack: false,
                                bgColor: '#FF1356',
                                textColor: 'white'
                            })
                        }
                    }).fail(function (data) {
                        prompt('error', data.responseJSON.msg);
                    });

                }
            });
        }
    </script>

    </body>
@endsection