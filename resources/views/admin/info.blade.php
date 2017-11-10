<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/matrix-style2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/msg-style/css/matrix-media.css')}}" />
    <link href="{{asset('assets/msg-style/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='{{asset('assets/msg-style/font-awesome/css/font.css')}}' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ asset('assets/style/js/jquery.js')  }}"></script>

    <!--toast-->
    <link rel="stylesheet" href="{{ asset('assets/org/toast/css/jquery.toast.css')  }}">
    <script type="text/javascript" src="{{ asset('assets/org/toast/js/jquery.toast.js')  }}"></script>
</head>
@include('fragments.notify')
<body>
<div id="content">
    <div  class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lb"> <a href="{{url('admin/article')}}"> <i class="icon-dashboard"></i> 内容总数（{{$content_sum}}） </a> </li>
            <li class="bg_lg"> <a href="{{url('admin/user')}}"> <i class="icon-shopping-cart"></i> 用户总数（{{$user_sum}}）</a> </li>
            <li class="bg_ly"> <a href="{{url('admin/article')}}"> <i class=" icon-globe"></i> 本月发布（{{$now_month_sum}}）</a> </li>
            <li class="bg_lo"> <a href="{{url('admin/modify_pass')}}"> <i class="icon-group"></i> 修改密码 </a> </li>
            {{--<li class="bg_ls"> <a href="#"> <i class="icon-signal"></i> 222 </a> </li>--}}
            {{--<li class="bg_lb"> <a href="{{url('admin/modify_pass')}}"> <i class="icon-undo"></i> 修改密码 </a> </li>--}}
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>最近发布</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG2">
                        <ul class="recent-posts">
                            @forelse($last_articles as $article)
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{asset('assets/msg-style/img/demo/av1.jpg')}}"> </div>
                                <div class="article-post"> <span class="user-info"> {{str_limit($article->title,100)}} | {{$article->created_at}} | {{$article->category['cate_name']}} </span>
                                    <p><a href="{{route('admin.article.show',['id'=>$article->id])}}" title="点击跳转">{{str_limit($article->description,400)}}</a> </p>
                                </div>
                            </li>
                            @empty
                                <li>暂无最近内容</li>
                            @endforelse
                            </li>
                        </ul>
                    </div>
                </div>
                {{--<div class="widget-box">--}}
                    {{--<div class="widget-title bg_ly"> <span class="icon"><i class="icon-ok"></i></span>--}}
                        {{--<h5>To Do list</h5>--}}
                    {{--</div>--}}
                    {{--<div class="widget-content">--}}
                        {{--<div class="todo">--}}
                            {{--<ul>--}}
                                {{--<li class="clearfix">--}}
                                    {{--<div class="txt"> Luanch This theme on Themeforest <span class="by label">Nirav</span> <span class="date badge badge-important">Today</span> </div>--}}
                                    {{--<div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>--}}
                                {{--</li>--}}
                                {{--<li class="clearfix">--}}
                                    {{--<div class="txt"> Manage Pending Orders <span class="by label">Alex</span> <span class="date badge badge-warning">Today</span> </div>--}}
                                    {{--<div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>--}}
                                {{--</li>--}}
                                {{--<li class="clearfix">--}}
                                    {{--<div class="txt"> MAke your desk clean <span class="by label">Admin</span> <span class="date badge badge-success">Tomorrow</span> </div>--}}
                                    {{--<div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>--}}
                                {{--</li>--}}
                                {{--<li class="clearfix">--}}
                                    {{--<div class="txt"> Today we celebrate the great looking theme <span class="by label">Admin</span> <span class="date badge badge-info">08.03.2013</span> </div>--}}
                                    {{--<div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>--}}
                                {{--</li>--}}
                                {{--<li class="clearfix">--}}
                                    {{--<div class="txt"> Manage all the orders <span class="by label">Mark</span> <span class="date badge badge-info">12.03.2013</span> </div>--}}
                                    {{--<div class="pull-right"> <a class="tip" href="#" title="Edit Task"><i class="icon-pencil"></i></a> <a class="tip" href="#" title="Delete"><i class="icon-remove"></i></a> </div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
        <hr>
    </div>
</div>
</body>
</html>
