@extends('layouts.resource.blade1.php')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 标签管理 &raquo; 添加标签
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加标签</h3>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{route('admin.tag.store')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="140"><i class="require">*</i>标签名：</th>
                        <td colspan="4">
                            <input type="text" name="tag_name" size="40" placeholder="请输入标签名称" value="{{old('tag_name')}}">
                            @if($errors->has('tag_name'))
                            <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('tag_name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                       <th><i class="require">*</i>颜色选择</th>
                        <td width="145">
                            <p>
                                <input type="radio" name="tag_color" value="#CC3399" {{(old('tag_color') == '#CC3399') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#CC3399;font-size: 20px;"> <span style="font-size: 14px;color:#CC3399;">#CC3399</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#33CC99" {{(old('tag_color') == '#33CC99') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#33CC99;font-size: 20px;"> <span style="font-size: 14px;color:#33CC99;">#33CC99</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#009999" {{(old('tag_color') == '#009999') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#009999;font-size: 20px;"> <span style="font-size: 14px;color:#009999;">#009999</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#CC9999" {{(old('tag_color') == '#CC9999') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#CC9999;font-size: 20px;"> <span style="font-size: 14px;color:#CC9999;">#CC9999</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#FF6666" {{(old('tag_color') == '#FF6666') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#FF6666;font-size: 20px;"> <span style="font-size: 14px;color:#FF6666;">#FF6666</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#CCCC99" {{(old('tag_color') == '#CCCC99') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#CCCC99;font-size: 20px;"> <span style="font-size: 14px;color:#CCCC99;">#CCCC99</span></i>
                            </p>
                        </td>
                        <td  width="145">
                            <p>
                                <input type="radio" name="tag_color" value="#CCCC00" {{(old('tag_color') == '#CCCC00') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#CCCC00;font-size: 20px;"> <span style="font-size: 14px;color:#CCCC00;">#CCCC00</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#9966CC" {{(old('tag_color') == '#9966CC') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#9966CC;font-size: 20px;"> <span style="font-size: 14px;color:#9966CC;">#9966CC</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#FF33CC" {{(old('tag_color') == '#FF33CC') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#FF33CC;font-size: 20px;"> <span style="font-size: 14px;color:#FF33CC;">#FF33CC</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#3399CC" {{(old('tag_color') == '#3399CC') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#3399CC;font-size: 20px;"> <span style="font-size: 14px;color:#3399CC;">#3399CC</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#FF9999" {{(old('tag_color') == '#FF9999') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#FF9999;font-size: 20px;"> <span style="font-size: 14px;color:#FF9999;">#FF9999</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#66CC99" {{(old('tag_color') == '#66CC99') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#66CC99;font-size: 20px;"> <span style="font-size: 14px;color:#66CC99;">#66CC99</span></i>
                            </p>
                        </td>
                        <td  width="145">
                            <p>
                                <input type="radio" name="tag_color" value="#666666" {{(old('tag_color') == '#666666') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#666666;font-size: 20px;"> <span style="font-size: 14px;color:#666666;">#666666</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#FF6600" {{(old('tag_color') == '#FF6600') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#FF6600;font-size: 20px;"> <span style="font-size: 14px;color:#FF6600;">#FF6600</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#FFCC00" {{(old('tag_color') == '#FFCC00') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#FFCC00;font-size: 20px;"> <span style="font-size: 14px;color:#FFCC00;">#FFCC00</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#009966" {{(old('tag_color') == '#009966') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#009966;font-size: 20px;"> <span style="font-size: 14px;color:#009966;">#009966</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#669999" {{(old('tag_color') == '#669999') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#669999;font-size: 20px;"> <span style="font-size: 14px;color:#669999;">#669999</span></i>
                            </p>
                            <p>
                                <input type="radio" name="tag_color" value="#993366" {{(old('tag_color') == '#993366') ? "checked='true'" : ''}}><i class="fa fa-tag" style="color:#993366;font-size: 20px;"> <span style="font-size: 14px;color:#993366;">#993366</span></i>
                            </p>
                        </td>
                        <td>
                            @if($errors->has('tag_color'))
                                <span><i class="fa fa-exclamation-circle yellow"></i>{{$errors->first('tag_color')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td colspan="4">
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

@endsection