@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 网站配置
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
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                @if(count($errors)>0)
                    <div class="mark">
                            <p>{{$errors}}</p>
                    </div>
                @endif
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加网站配置</a>
                    <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部网站配置</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
        <form action="{{url('admin/config/changecontent')}}" method="post">
        {{csrf_field()}}
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>变量值</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" onchange="changeOrder(this,{{$v->conf_id}})" name="ord[]" value="{{$v->conf_order}}">
                        </td>
                        <td class="tc">{{$v->conf_id}}</td>
                        <td>{{$v->conf_title}}</td>
                        <td>{{$v->conf_name}}</td>
                        {{-- 此处前后两个感叹号可以解析标签 --}}
                        <td>
                            <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                            {!!$v->_html!!}
                        </td>
                        <td>
                            <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick = "delconf({{$v->conf_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach 
                </table>
                <div class="btn_group">
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                </div>
        </form>
            </div>
        </div>
    <!--搜索结果页面 列表 结束-->
<script>
    function changeOrder(obj,conf_id){
        var conf_order = $(obj).val();
        $.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order}, function (data){
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
    function delconf(conf_id){     //传入需要删除的cate_id
        layer.confirm('您确定要删除当前配置项吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            //alert(cate_id);
            //第一个参数为URL，第二个为参数，点三个为回调函数
            //将删除的id传入到CategoryController控制器的destroy方法
            $.post("{{url('admin/config/')}}/"+conf_id,  
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