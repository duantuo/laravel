<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;

class IndexController extends CommonController
{
    public function index(){
    	return view('admin.index');
    }

    public function info(){
    	return view('admin.info');
    }

    //修改密码
    public function pass(){
    	//判断并获取表单提交过来的信息
    	if($input = Input::all()){
    		//dd($input);
    		//定义验证规则
    		$rules = [
    			//required:判断所输入内容是否为空    between:判断所输入内容是否符合定义长度   confirmed:判断所输入的确认密码是否与新密码相同
    			'password'=>'required|between:6,20|confirmed',
    		];
    		//自定义提示信息
    		$message = [
    			'password.required'=>'新密码不能为空！',
    			'password.between'=>'新密码必须是6-20位之间！',
    			'password.confirmed'=>'新密码与确认密码不同，请重新输入！'
    		];
    		//make传入三个参数，第一个为参数值，第二个为验证规则,第三个为自定义提示内容
    		$validator = Validator::make($input,$rules,$message);
    		//判断validator里passes方法是否通过
    		if($validator->passes()){
    			$user = User::first();     //连接数据库查询admin的账号
    			$_password = Crypt::decrypt($user->user_pass);    //解密admin账号的密码
    			if($input['password_o'] == $_password){     //判断输入的密码是否和原密码相同
    				$user->user_pass = Crypt::encrypt($input['password']);    //将新输入的密码通过加密的方式写入到数据库中
    				$user->update();     //更新数据库
    				return back()->with('msg','密码修改成功！');
    			}else{
    				return back()->with('msg','原密码输入错误，请重新输入！');
    			}
    		}else{
    			//dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
    			return back()->withErrors($validator);
    		}

    	}

    	return view('admin.pass');
    }
}
