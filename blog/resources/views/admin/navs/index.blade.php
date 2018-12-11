@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 导航栏设置
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>添加导航栏</a>
                    <a href="{{url('admin/navs')}}"><i class="fa fa-recycle"></i>全部导航栏</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc">ID</th>
                        <th>名称</th>
                        <th>别名</th>
                        <th>地址</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$v->nav_id}})" name="ord[]" value="{{$v->nav_order}}">
                        </td>
                        <td class="tc">{{$v->nav_id}}</td>
                        <td><a href="{{$v->nav_url}}" target="_blank">{{$v->nav_name}}</a></td>
                        <td>{{$v->nav_alias}}</td>
                        <td>{{$v->nav_url}}</td>
                        <td>
                            <a href="{{url('admin/navs/'.$v->nav_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick = "delnav({{$v->nav_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach 
                </table>
                <div class="page_list">
                    {{-- 直接调用框架分页类,css样式为调整分页状态 --}}
                    <style>
                        .result_content ul li span {
                            font-size: 15px;
                            padding: 6px 12px;
                        }
                    </style>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<script>
    function changeOrder(obj,nav_id){
        var nav_order = $(obj).val();
        $.post("{{url('admin/navs/changeorder')}}",{'_token':'{{csrf_token()}}','nav_id':nav_id,'nav_order':nav_order}, function (data){
            //alert(data.msg);
            //此处弹框提示效果参考网址 http://layer.layui.com/
            //layer.alert(data.msg, {icon: 6});
            //layer.msg(data.msg);
            if(data.status == 0){
                layer.alert(data.msg, {icon: 6});
            }else{
                layer.alert(data.msg, {icon: 5});
            }
        });
    }
    /*$(function (){
        alert('1111');
    });*/

    //删除分类操作方法
    function delnav(nav_id){     //传入需要删除的cate_id
        layer.confirm('您确定要删除当前这个导航栏吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //alert(cate_id);
            //第一个参数为URL，第二个为参数，点三个为回调函数
            //将删除的id传入到CategoryController控制器的destroy方法
            $.post("{{url('admin/navs/')}}/"+nav_id,  
                //提交方式通过delete方式提交   并传入token值    
                {'_method':'delete','_token':"{{csrf_token()}}"},   
                function (data){
                    //alert(data.msg);
                    if(data.status == 0){     //判断删除完成之后返回的值
                        layer.msg(data.msg, {icon: 6});     //给他出删除成功的提示
                        location.href = location.href;      //删除成功后瞬间刷新当前页
                    }else{
                        layer.msg(data.msg, {icon: 5});
                    }
            });
        });
    }
</script>

@endsection