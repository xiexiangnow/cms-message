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
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 美女图片
            </div>
        </div>
        <div id="content-header">
            <h1>美女图片列表</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <form action="" method="get" id="list-form">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>列表</h5>


                            </div>
                            <div class="widget-content ">
                                <table class="table table-bordered table-striped with-check">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th width="30%">title</th>
                                        <th>图片</th>
                                        <th>首页是否展示</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($spiders as $key => $spider)
                                        <tr class="content-list">
                                            <td class="tc">{{$spider->id}}</td>
                                            <td>{{$spider->title}}</td>
                                            <td><a href="{{$spider->img_src}}" target="_blank" ><img src="{{$spider->img_src}}" alt="" style="width: 35px;height: 40px"></a></td>
                                            <td>
                                                @if($spider->is_index == 1)
                                                    <span style="color: green">首页显示</span>
                                                @else
                                                    <spn>无</spn>
                                                @endif
                                            </td>
                                            <td><a class="btn btn-warning btn-mini" href="javascript:void(0)" onclick="goIndex({{$spider->id}})">首页显示</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="tc" colspan="4">暂无数据</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <span style="margin-left: 10px;">共 {{ $spiders->total() }} 条数据</span>
                            <div class="pagination alternate right">
                                <ul>
                                    {{--<li class="disabled"><a href="#">Prev</a></li>--}}
                                    {{--<li class="active"> <a href="#">1</a> </li>--}}
                                    {{--<li><a href="#">2</a></li>--}}
                                    {{--<li><a href="#">3</a></li>--}}
                                    {{--<li><a href="#">4</a></li>--}}
                                    {{--<li><a href="#">Next</a></li>--}}
                                    <span style="float: right">{!! $spiders->appends(Input::all())->render() !!}</span>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


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

        //首页显示
        function goIndex(pId){
            // - 执行区域
            var url = "{{ url('admin/goIndex') }}";
            $.ajax({
                data:{'pid':pId},
                type: 'POST',
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
                   // window.setTimeout("window.location='/admin/spider'",2000);
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
                //网络错误
                prompt('error', data.responseJSON.msg);
            });
        }
    </script>
    </body>
@endsection