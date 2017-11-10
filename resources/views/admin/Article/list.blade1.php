@extends('layouts.middle')
@section('middle-content')
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 文章列表
</div>
<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->

<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->
<style>
    .result_content {
        padding-bottom: 20px;
    }
    .search_keyword {
        float: right;
        margin-left: 400px;
        outline: 0;
    }
</style>
<form action="#" method="post">
    <div class="result_wrap">
        <div class="result_title">
            <h3>分类列表</h3>
        </div>
        <!--快捷导航 开始-->
        <div class="result_content">
            <div style="float: left">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                <div class="search_keyword">
                    选择分类：
                    <select name="category_id" id="">
                        <option value="0">全部</option>
                        <option value="1">php</option>
                        <option value="1">java</option>
                        <option value="1">javascript</option>
                    </select>
                    <input type="text" class="search_text" name="" placeholder="请输入关键词">
                    <input type="submit" name="sub" value="查询">
                </div>
            </div>
        </div>
        <!--快捷导航 结束-->

    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%"><input type="checkbox" name=""></th>
                    <th class="tc">排序</th>
                    <th class="tc">ID</th>
                    <th>头图</th>
                    <th>标题</th>
                    <th>标签</th>
                    <th>关键词</th>
                    <th>作者</th>
                    <th>是否置顶</th>
                    <th>阅读数</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                @foreach($articles as $article)
                <tr>
                    <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                    <td class="tc">
                        <input type="text" name="ord[]" value="{{$article->sort}}">
                    </td>
                    <td class="tc">{{$article->id}}</td>
                    <td>
                        <a href="#">{{$article->thumb}}</a>
                    </td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->tag_id}}</td>
                    <td>{{$article->keyword}}</td>
                    <td>{{$article->author}}</td>
                    <td>{{$article->is_top}}</td>
                    <td>{{$article->view}}</td>
                    <td>{{$article->updated_at}}</td>
                    <td>
                        <a href="#">修改</a>
                        <a href="#">删除</a>
                    </td>
                </tr>
                @endforeach

            </table>


            <div class="page_nav">
                <div>
                    <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
                    <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                    <span class="current">8</span>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
                    <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
                    <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
                    <span class="rows">11 条记录</span>
                </div>
            </div>



            <div class="page_list">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
</body>
@endsection