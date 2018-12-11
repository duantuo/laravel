<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
class CommonController extends Controller
{
    //图片上传
    public function upload(){
    	$file = Input::file('Filedata');
    	if($file->isValid()){
    		$realPath = $file->getRealPath();    //获取临时文件的绝对路径
    		$entension = $file->getClientOriginalExtension();    //获取上传文件的后缀名
    		//mt_rand 从100到900之间随机取一个数 
    		$newName = date('YmdHis').mt_rand(100,900).'.'.$entension;   //给上传的文件重命名一个随机名
    		//base_path  当前网站的根目录
    		$path = $file->move(base_path().'/uploads',$newName);   //获取到上传后存储的路径
    		$filepath = 'uploads/'.$newName;
    		return $filepath;
    	}
    }
}
