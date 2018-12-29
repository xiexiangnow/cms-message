<!DOCTYPE html>
<html lang="en">
<head>
    <title>内容管理系统</title>
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
    <!--layer-->
    <script type="text/javascript" src="{{ asset('assets/org/layer/layer/layer.js')  }}"></script>

    <!--toast-->
    <link rel="stylesheet" href="{{ asset('assets/org/toast/css/jquery.toast.css')  }}">
    <script type="text/javascript" src="{{ asset('assets/org/toast/js/jquery.toast.js')  }}"></script>

    <!--uediter-->
    <script type="text/javascript" charset="utf-8" src="{{ asset('assets/org/ueditor/ueditor.config.js')  }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('assets/org/ueditor/ueditor.all.min.js')  }}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('assets/org/ueditor/lang/zh-cn/zh-cn.js')  }}"></script>



</head>
@yield('middle-content')

@include('fragments.notify')

</body>
</html>
