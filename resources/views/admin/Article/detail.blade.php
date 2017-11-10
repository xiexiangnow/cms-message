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
            <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 内容管理  ➤ 内容详情
        </div>
    </div>
    <div id="content-header">
        <h1>{{$detail->title}}</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-screenshot"></i> </span>
                        <h5>
                            分类：<code><a href="{{route('admin.article.index',['cate_id' => $detail->category['cate_id']])}}">{{$detail->category['cate_name']}}</a></code>  &nbsp;&nbsp;
                            编者：{{$detail->author}}  &nbsp;&nbsp;
                            阅读数：{{$detail->view}}  &nbsp;&nbsp;
                            创建时间： {{$detail->created_at}}

                        </h5>
                    </div>
                    <div class="widget-content"> {!! htmlspecialchars_decode($detail->content) !!}</div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script src="http://www.jq22.com/jquery/jquery-1.7.1.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/matrix.js"></script>
</body>
@endsection