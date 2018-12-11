<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Links;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    //友情链接界面
    public function index(){
    	$data = Links::orderBy('link_order','asc')->paginate(5);
    	return view('admin.links.index',compact('data'));
    }

    //定义友情链接排序的方法
    public function changeOrder(){
    	$input = Input::all();    //获取表单提交过来的所有数据
    	$link = Links::find($input['link_id']);   //以link_id为字段查出相关内容
    	$link -> link_order = $input['link_order'];  //将所输入的排序值赋予到数据库中
    	$re = $link->update();   //更新数据库

    	if($re){
    		$data = [
    			'status' =>0,
    			'msg' =>'友情链接排序更新成功！',
    		];
    	}else{
    		$data = [
    			'status' =>1,
    			'msg' =>'友情链接排序更新失败，请稍后重试！',
    		];
    	}
    	return $data;
    }

     //get   admin/links/create     添加友情链接
    public function create(){
    	return view('admin.links.add',compact('data'));
    }

    //添加友情链接表单提交过来的数据  post方式提交到admin/links
    public function store(){
        $input = Input::except('_token');   //获取添加文章提交过来的信息，除了_token字段不需要写入数据库，其他字段都写入
        //dd($input);
        $rules = [
                'link_name'=>'required',     //判断名称是否为空
                'link_url'=>'required',     //判断URL是否为空
        ];
            //自定义提示信息
        $message = [
                'link_name.required'=>'名称不能为空！',
                'link_url.required'=>'链接地址URL不能为空！',
        ];
        //make传入三个参数，第一个为参数值，第二个为验证规则,第三个为自定义提示内容
        $validator = Validator::make($input,$rules,$message);
        //判断validator里passes方法是否通过
        if($validator->passes()){
            $re = Links::create($input);     //此处写入到数据库只有部分字段，剩余字段可以用fillable和guarded字段在模型里面进行填充，也可以create自定义
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','文章添加失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }


    //修改友情链接  admin/links/{link_id}/edit 
    public function edit($link_id){
        $field = Links::find($link_id);    //查找传递参数过来的art_id，并将查找的内容通过compact分配给模板
        return view('admin.links.edit',compact('field'));
    }

    //put和过来的admin/links/{links}    更新友情链接
    public function update($link_id){
        $input = Input::except('_token','_method');
        $rules = [
                'link_name'=>'required',     //判断名称是否为空
                'link_url'=>'required',     //判断URL是否为空
        ];
            //自定义提示信息
        $message = [
                'link_name.required'=>'名称不能为空！',
                'link_url.required'=>'链接地址URL不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){            
            $re = links::where('link_id',$link_id)->update($input);
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','文章修改失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    //delete过来的admin/article/{article}     删除单个文章
    public function destroy($link_id){         //将需要删除的art_id传过来
        $re = Links::where('link_id',$link_id)->delete();   //执行删除命令
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
