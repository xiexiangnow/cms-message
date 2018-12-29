@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}

        .popframe1{
            visibility: hidden;
            z-index: 2;
            font-size: 12px;
            border: 1px solid #3399FF;
            width: 400px;
            height: 250px;
            position: absolute;
            top: 200px;
            left: 620px;
            background-color: #FFFFFF;
            text-align: center;
        }
        .fullbg{
            background-color:gray;
            left: 0;
            opacity:0.5;
            position: absolute;
            top:0;
            z-index: 1;
            filter: alpha(opacity=50);
        }
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 管理员信息
            </div>
        </div>
        <div id="content-header">
            <h1>管理员列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="get" id="list-form">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>列表</h5>

                                <a href="javascript:void(0)" onclick="submitForm()" class="btn btn-info btn" style="margin-top: 4px;float: right;margin-right: 10px">搜索</a>
                                <input type="text" name="keyword" style="margin-top: 4px;float: right;font-size: 10px;height: 18px" value="{{$keyword}}" placeholder="请输入搜索关键字...">
                                <!--职级筛选-->
                                <select name="level" id="" style="margin-top: 3px;float: right;margin-right: 10px;font-size: 10px;width: 100px" onchange="submitForm()">
                                    <option value="0">职级筛选</option>
                                    @forelse($levels as $level)
                                        <option value="{{$level}}" @if($level == $now_level)selected="selected"@endif  >{{$level}}</option>
                                    @empty
                                        <option value="">暂无父级分类</option>
                                    @endforelse
                                </select>

                                &nbsp;&nbsp;&nbsp;&nbsp;
                               <!--在职状态-->
                                <select name="status" id="" style="margin-top: 3px;float: right;margin-right: 10px;font-size: 10px;width: 100px" onchange="submitForm()">
                                    <option value="0">在职状态</option>
                                    <option value="1" @if($status == 1)selected="selected"@endif  >在职</option>
                                    <option value="2" @if($status == 2)selected="selected"@endif  >离职</option>
                                </select>

                                <!--显示条数-->
                                <select name="row" id="" style="margin-top: 3px;float: right;margin-right: 10px;font-size: 10px;width: 100px" onchange="submitForm()">
                                    <option value="0">条数显示</option>
                                    <option value="20" @if($row == 20)selected="selected"@endif  >20</option>
                                    <option value="40" @if($row == 40)selected="selected"@endif  >40</option>
                                    <option value="50" @if($row == 50)selected="selected"@endif  >50</option>
                                    <option value="100" @if($row == 100)selected="selected"@endif  >100</option>
                                </select>
                            </div>
                            <div class="widget-content ">
                                <table class="table table-bordered table-striped with-check">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th width="6%">头像</th>
                                        <th>工号</th>
                                        <th>BOOSID</th>
                                        <th width="6%">花名</th>
                                        <th width="6%">真实姓名</th>
                                        <th width="6%">boss姓名</th>
                                        <th>性别</th>
                                        <th width="8%">电话号码</th>
                                        <th width="6%">职级</th>
                                        <th width="8%">生日</th>
                                        <th width="9%">邮箱</th>
                                        <th width="5%">状态</th>
                                        <th width="3%">角色ID</th>
                                        <th width="8%">创建时间</th>
                                        <th width="8%">修改时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($managers as $key => $manager)
                                        <tr class="content-list">
                                            <td class="tc">{{$manager->id}}</td>
                                            @if($manager->userface)
                                            <td><a href="{{url('admin/manager',$manager->id)}}"><img src="{{$manager->userface}}" alt="" width="100" height="100"></a></td>
                                            @else
                                                <td><a href="{{url('admin/manager',$manager->id)}}"><img src="{{asset('assets/style/img/no-img.png')}}" alt="" width="100" height="100"></a></td>
                                            @endif
                                                <td>{{$manager->worknum}}</td>
                                            <td>{{$manager->manager_id}}</td>
                                            <td>{{$manager->nickname}}</td>
                                            <td>{{$manager->truename}}</td>
                                            <td>{{$manager->boss_name}}</td>
                                            <td>
                                                @if($manager->sex == 1)
                                                男
                                                @elseif($manager->sex == 2)
                                                女
                                                @elseif($manager->sex == 0)
                                                保密
                                                @endif
                                            </td>
                                            <td>{{$manager->mobi}}</td>
                                            <td>{{$manager->z_level}}</td>
                                            <td>{{$manager->birthday}}</td>
                                            <td>{{$manager->email}}</td>
                                            <td>
                                                @if($manager->state == 1)
                                                    在职
                                                @else
                                                    离职
                                                @endif
                                            </td>
                                            <td>{{$manager->role_id}}</td>
                                            <td>{{$manager->create_time}}</td>
                                            <td>{{$manager->update_time}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="tc" colspan="16">暂无数据</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <span style="margin-left: 10px;">共 {{ $managers->total() }} 条数据</span>
                            <div class="pagination alternate right">
                                <ul>
                                    {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                    {{--<li class="active"> <a href="#">1</a> </li>--}}
                                    {{--<li><a href="#">2</a></li>--}}
                                    {{--<li><a href="#">3</a></li>--}}
                                    {{--<li><a href="#">4</a></li>--}}
                                    {{--<li><a href="#">Next</a></li>--}}
                                    <span style="float: right">{!! $managers->appends(Input::all())->render() !!}</span>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="popframe1">
            <img src="images/7.jpg" width="400px">
        </div>
        <div class="fullbg"></div>

    </div>
    <script type="text/javascript">
        function submitForm()
        {
            //alert($(cateObj).val());
            $('#list-form').submit();
        }

        //鼠标放上去放大图片
        function clickImg(key) {
            $('.hover_img_'+key).css({"boder":"1px solid red"});
        }
    </script>
    </body>
@endsection