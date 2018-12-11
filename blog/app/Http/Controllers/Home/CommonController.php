<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Navs;
use App\Http\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
class CommonController extends Controller
{
    public function __construct(){    //通过魔术方法将导航栏引入公共部分并调用 
        //获取点击量最高的6篇文章(站长推荐区域)
        $pics = Article::orderBy('art_view','desc')->take(5)->get();
        //获取最新的文章
    	$new = Article::orderBy('art_time','desc')->take(8)->get();  	
    	$navs = Navs::all();
    	View::share('navs',$navs);     //share 将$navs共享到每个页面
    	View::share('pics',$pics);
    	View::share('new',$new);
    }
}
