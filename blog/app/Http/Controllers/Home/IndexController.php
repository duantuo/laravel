<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Model\Category;
class IndexController extends CommonController
{
    //首页
    public function index(){        
        //获取点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(6)->get();
    	//获取文章列表（带分页）
    	$data = Article::orderBy('art_time','desc')->paginate(5);
    	//获取友情链接
    	$links = Links::orderBy('link_order','asc')->take(3)->get();
    	//获取网站的配置
    	return view('home.index',compact('hot','data','links'));
    }

    //列表页
    public function cate($cate_id){
        //获取文章列表（带分页）
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(5);
        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');
        //当前分类的子分类
        $submenu = Category::where('cate_pid',$cate_id)->get();
        $field = Category::find($cate_id);
    	return view('home.list',compact('data','field','submenu'));
    }

    //显示页
    public function article($art_id){
        //$field = Article::find($art_id);
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
        //dd($field);
        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');
        //上一篇文章
        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        //下一篇文章
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
        //相关文章
        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
    	return view('home.new',compact('field','article','data'));
    }
}
