<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class CategoryController extends CommonController
{
    //get过来的admin/category     全部分类列表
    public function index(){
    	$categorys = (new Category)->tree();
     	//dd($categorys);
    	return view('admin.category.index')->with('data',$categorys);
    }

   	//定义排序的方法
    public function changeOrder(){
    	$input = Input::all();    //获取表单提交过来的所有数据
    	$cate = Category::find($input['cate_id']);   //以cate_id为字段查出相关内容
    	$cate -> cate_order = $input['cate_order'];  //将所输入的排序值赋予到数据库中
    	$re = $cate->update();   //更新数据库

    	if($re){
    		$data = [
    			'status' =>0,
    			'msg' =>'分类排序更新成功！',
    		];
    	}else{
    		$data = [
    			'status' =>1,
    			'msg' =>'分类排序更新失败，请稍后重试！',
    		];
    	}
    	return $data;
    }

    //get过来的admin/category       添加分类
    public function create(){
        $data = Category::where('cate_pid',0)->get();    //查询出cate_pid字段为0的顶级分类
        return view('admin.category.add',compact('data'));   //然后返回分配到模板
    }
    
    //post过来的admin/category       处理分类提交过来的数据
    public function store(){
        $input = Input::except('_token');    //获取添加分类提交过来的值，除了_token的值，不需要写入到数据库，其他字段均写入到数据库
        $rules = [
                'cate_name'=>'required',     //判断分类的名称是否为空
        ];
            //自定义提示信息
        $message = [
                'cate_name.required'=>'分类名称不能为空！',
        ];
        //make传入三个参数，第一个为参数值，第二个为验证规则,第三个为自定义提示内容
        $validator = Validator::make($input,$rules,$message);
        //判断validator里passes方法是否通过
        if($validator->passes()){
            $re = Category::create($input);     //此处写入到数据库只有部分字段，剩余字段可以用fillable和guarded字段在模型里面进行填充，也可以create自定义
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','分类添加失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    //get过来的admin/category/{category}/edit     修改单个分类
    public function edit($cate_id){      //将修改的分类的cate_id传过来
        //dd($cate_id);
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get(); 
        return view('admin.category.edit',compact('field','data'));
    }
    
    //put和过来的admin/category/{category}    更新分类
    public function update($cate_id){
        $input = Input::except('_token','_method');
        $rules = [
                'cate_name'=>'required',     //判断分类的名称是否为空
        ];
        $message = [
                'cate_name.required'=>'分类名称不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){            
            $re = Category::where('cate_id',$cate_id)->update($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','分类修改失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    



    //get过来的admin/category/{category}     显示单个分类
    public function show(){

    }

    //delete过来的admin/category/{category}     删除单个分类
    public function destroy($cate_id){         //将需要删除的cate_id传过来
        $re = Category::where('cate_id',$cate_id)->delete();   //执行删除命令
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);   //若删除的是顶级分类，那么它的子级分类就更新为顶级分类
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
