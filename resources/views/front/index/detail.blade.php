@extends('front.layouts.common')
@section('content')
<main class="" id="main-collapse">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="brand-title">当前位置：<a href="">首页</a> > <a href="">性感美女</a></div>
            <div class="section-container-spacer">
                <h3>{{$title}}</h3>
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                    {{--tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
                    {{--quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo--}}
                    {{--consequat.</p>--}}
                <p style="color: #C1C1C1">2019-08-14 12:12:12</p>
            </div>
            @forelse($pic_list as $pic)
            <div class="section-container-spacer">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <p><img class="img-responsive" alt="" src="{{$pic->img_src}}"></p>
                    </div>
                </div>
            </div>
            @empty
                <p>暂无</p>
            @endforelse
            <div class="footer_remark">更多内容将会持续更新...</div>

        </div>

    </div>
</main>
@endsection
