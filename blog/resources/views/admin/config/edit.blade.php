@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
       <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/config')}}">网站配置</a> &raquo; 添加网站配置
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加网站配置</a>
                    <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>全部网站配置</a>
                </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config/'.$field->conf_id)}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" name="conf_title" value="{{$field->conf_title}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题不能为空</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" name="conf_name" value="{{$field->conf_name}}"> 
                            <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称不能为空</span>               
                        </td>
                    </tr>
                    <tr>
                        <th>类型：</th>
                        <td>
                            <input type="radio" name="field_type" value="input" @if($field->field_type=='input') checked @endif onclick="showTr()">input　　
                            <input type="radio" name="field_type" value="textarea"  @if($field->field_type=='textarea') checked @endif onclick="showTr()">textarea　　
                            <input type="radio" name="field_type" value="radio"  @if($field->field_type=='radio') checked @endif onclick="showTr()">radio　　
                            <span><i class="fa fa-exclamation-circle yellow"></i>类型：input　　textarea　　radio</span>
                        </td>
                    </tr>
                    <tr class="field_value">
                        <th><i class="require">*</i>类型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value" value="{{$field->field_value}}"> <p><i class="fa fa-exclamation-circle yellow"></i>类型值只有在radio的情况下才需要配置，格式 1|开启,0|关闭</p>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" value="{{$field->conf_order}}">
                        </td>
                    </tr>
                    <tr>
                        <th>说明：</th>
                        <td>
                            <textarea class="lg" name="conf_tips">{{$field->conf_tips}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
        showTr();   //页面初始化，调用此函数
        function showTr(){
            //找到当前选择的类型值是多少
            var type = $('input[name=field_type]:checked').val();
            if(type=='radio'){   //判断当前的类型选择的radio
                $('.field_value').show();   //如果是则显示类型值此输入框
            }else{
                $('.field_value').hide();   //如果不是则隐藏类型值
            }
        }
    </script>
@endsection