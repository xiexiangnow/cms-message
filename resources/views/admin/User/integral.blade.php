@extends('layouts.middle')

@section('middle-content')
    <body>
    <style>
        #content #content-header #breadcrumb {width: 100%;z-index: 20;background: #fff;height: 40px}
        #content #content-header #breadcrumb a{line-height: 45px;padding: 4px 10px}
        .radio-margin {margin-right: 40px;}
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('admin/info') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a>➤ 用户管理  ➤ 积分充值
            </div>
        </div>
        <div id="content-header">
            <h1>积分充值</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-strikethrough"></i> </span>
                            <h5>积分充值</h5>
                        </div>
                        <div class="widget-content ">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">选择用户</label>
                                    <div class="controls">
                                        <select name="user_id" >
                                            @forelse($users as  $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @empty
                                                <option value="0">暂无用户</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="checkboxes" class="control-label">充值金额</label>
                                    <div class="controls">
                                        <input type="radio"  name="" value="20"> <span style="font-size: 14px">20</span> &nbsp;&nbsp;

                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">立即充值</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function selectedButton(vat){
            vat.attr('class','btn btn-primary');
        }

    </script>
    </body>
@endsection