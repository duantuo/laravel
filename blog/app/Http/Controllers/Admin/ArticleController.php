<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
	//get. admin/article   全部文章列表
    public function index(){
        $data = Article::orderBy('art_id','desc')->paginate(5);      //paginate设置分页每页显示的数量
        return view('admin.article.index',compact('data'));
    }

    //get   admin/article/create     添加文章
    public function create(){
        $data = (new Category)->tree();   //获取文章分类的ID
    	return view('admin.article.add',compact('data'));
    }

    //添加文章表单提交过来的数据  post方式提交到admin/article
    public function store(){
        $input = Input::except('_token');   //获取添加文章提交过来的信息，除了_token字段不需要写入数据库，其他字段都写入
        $input['art_time'] = time();    //设置添加文章的时间为当前时间戳

        $rules = [
                'art_title'=>'required',     //判断文章的名称是否为空
                'art_content'=>'required',     //判断文章的内容是否为空
        ];
            //自定义提示信息
        $message = [
                'art_title.required'=>'文章标题不能为空！',
                'art_content.required'=>'文章内容不能为空！',
        ];
        //make传入三个参数，第一个为参数值，第二个为验证规则,第三个为自定义提示内容
        $validator = Validator::make($input,$rules,$message);
        //判断validator里passes方法是否通过
        if($validator->passes()){
            $re = Article::create($input);     //此处写入到数据库只有部分字段，剩余字段可以用fillable和guarded字段在模型里面进行填充，也可以create自定义
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','文章添加失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    //修改文章  admin/article/{art_id}/edit 
    public function edit($art_id){
        $data = (new Category)->tree();    //列出文章分类的id
        $field = Article::find($art_id);    //查找传递参数过来的art_id，并将查找的内容通过compact分配给模板
        return view('admin.article.edit',compact('field','data'));
    }

    //put和过来的admin/article/{article}    更新文章
    public function update($art_id){
        $input = Input::except('_token','_method');
        $rules = [
                'art_title'=>'required',     //判断文章的名称是否为空
                'art_content'=>'required',     //判断文章的内容是否为空
        ];
            //自定义提示信息
        $message = [
                'art_title.required'=>'文章标题不能为空！',
                'art_content.required'=>'文章内容不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){            
            $re = Article::where('art_id',$art_id)->update($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','文章修改失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    //delete过来的admin/article/{article}     删除单个文章
    public function destroy($art_id){         //将需要删除的art_id传过来
        $re = Article::where('art_id',$art_id)->delete();   //执行删除命令
        if($re){
            $data = [
                'status'=>0,
                'msg' =>'分类删除成功',
            ];
        }else{
            $data = [
                'status' =>1,
                'msg' =>'分类删除失败',
            ];
        }
        return $data;
    }
}
