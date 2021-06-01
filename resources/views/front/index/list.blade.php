@extends('front.layouts.common')
@section('content')
<main class="" id="main-collapse">
    <div class="row">
        <div class="col-xs-12 section-container-spacer">
            <h3>性感美女</h3>
            <div class="brand-title">当前位置：<a href="">首页</a> > <a href="">性感美女</a></div>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                {{--tempor incididunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam,--}}
                {{--quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
                {{--consequat.</p>--}}
        </div>
        @foreach($category as $key => $item)
        <div class="col-xs-12 col-md-3 section-container-spacer">
            <a href="{{route('front.index.show',['id'=>$key,'title'=> $item['name']])}}" target="_blank" class="cover-img" title="{{$item['name']}}"><img class="img-responsive" alt="{{$item['title']}}" src="{{$item['cover_img']}}"></a>
            {{--<h5>{{ mb_substr($item['name'],0,15,"UTF8") }}</h5>--}}
            <h5 style="display: none">{{$item['name']}}</h5>
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
            {{--<a href="{{route('front.index.show',['id'=>$key,'title'=> $item['title']])}}" class="btn btn-primary" title=""> Get in touch</a>--}}
        </div>
        @endforeach

        <style>
            .pagination li {
                display: inline;
                float: left;
                height: 27px;
                color: #ccc;
                border: 1px solid #ccc;
                text-align: center;
                width: 27px;
                margin-left: -1px;
            }
            .pagination li.active {
                background-color: #FF6068;
                color: white;
                border: 1px solid #FF6068;
            }

            .pagination li:hover{
                background-color: #FF6068;
                border: 1px solid #FF6068;
                color: white;
                cursor: none;
            }

        </style>
        <div class="content-page">
            <span class="page-ch">共{{ $category->total() }}页</span>
            {{--<a href="5089_50.html" class="page-ch">上一页</a>--}}
            {{--<a href="5089_35.html" class="page-en">35</a>--}}
            {{--<a href="5089_36.html" class="page-en">36</a>--}}
            {!! $category->appends(Input::all())->render() !!}
            {{--<a href="5089_52.html" class="page-ch">下一页</a>--}}
        </div>


    </div>


</main>
@endsection