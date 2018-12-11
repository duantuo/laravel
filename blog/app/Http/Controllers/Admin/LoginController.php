<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
//引入验证码类文件
require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    //定义登陆页面方法控制器
    public function login(){
    	//$pdo = DB::connection()->getPdo();    //连接数据库
    	//dd($pdo); 
    	if($input=Input::all()){
    		$code = new \Code;
    		$_code= $code ->get();
    		if(strtoupper($input['code']) != $_code){
    			return back()->with('msg','验证码输入有误');  //back函数可以返回前一个请求的页面
    		}
            //查询数据库用户名和密码，判断用户输入的信息是否和数据库匹配
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back() -> with('msg','用户名或密码错误，请重新输入！');
            }
            //将登陆进来的用户信息写入session
            session(['user'=>$user]);
            //dd(session('user'));
            //redirect 表示跳转的意思
            return redirect('admin');
    	}else{
            //dd($_SERVER);
            //session(['user'=>null]);    //清除当前用户登陆的session,相当于退出的方法
    		return view('admin.login');
    	}
    }

    //定义验证码，引入验证码类
    public function code(){
    	//此处如果不加入斜杠会提示没有找code控制器，加斜杠去底层找验证码类
    	$code = new \Code;  
    	$code -> make();
    }

    public function quit(){
        session(['user'=>null]);    //清除登陆用户的session，然后返回登陆界面
        return redirect('admin/login');
    }

    //encrypt  对密码进行加密     |    decrypt 对密码字符串解密
    //public function crypt(){
    //    $str = '123456';
     //   $str_p = 'eyJpdiI6Im1yRmNCaDNxbEdCQjFza3B3Y0xXdlE9PSIsInZhbHVlIjoiQmNIcnhjWVhOTDcxUFFTZjVBY2VMUT09IiwibWFjIjoiNTgzNjZhYWRmNGQyYjg1YWRkMjJlNjgyZWFjYzRiYmRhZDY3NzRiYmQ0Mzk1MjQ5MmM3NjRmZDIxMzAzNGViOCJ9';
   // //    echo Crypt::encrypt($str).'<br>';
     //   echo Crypt::decrypt($str_p);
    //}



    /*public function getcode(){
    	//此方法通过调用session里的验证码，默认框架没有原生的session，如果需要开启session，需要在入口文件index.php中通过session_start()开启
    	$code = new \Code;
    	echo $code -> get();
    }*/
}
