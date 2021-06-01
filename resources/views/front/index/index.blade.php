@extends('front.layouts.common')
@section('content')
<main class="" id="main-collapse">
    <!-- Add your site or app content here -->
    <div class="hero-full-wrapper">
        <div class="grid">
            <div class="gutter-sizer"></div>
            <div class="grid-sizer"></div>

            @foreach($spiders as $key => $spider)
            <div class="grid-item">
                <img class="img-responsive" alt="" src="{{$spider->img_src}}">
                <a href="{{route('front.index.show',['id' => $spider->id,'title'=>$spider->title])}}" target="_blank" class="project-description">
                    <div class="project-text-holder">
                        <div class="project-text-inner">
                            <h5 style="color: white">{{$spider->title}}</h5>
                            <p>view</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            masonryBuild();
        });
    </script>
</main>
@endsection
