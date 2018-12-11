<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //配置项界面
    public function index(){
    	$data = Config::orderBy('conf_order','asc')->get();
        foreach($data as $k=>$v){
            switch ($v->field_type) {
                case 'input':
                //为$data[$k]新增一个变量值_html，并赋予值
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;

                case 'textarea':
                    $data[$k]->_html = '<textarea name="conf_content[]" class="lg">'.$v->conf_content.'</textarea>';
                    break;

                case 'radio':
                //1|开启,0|关闭
                   $arr=explode(',', $v->field_value); //分割字符串
                   $str= '';   //声明一个空的变量
                   foreach ($arr as $m => $n) {
                       //1|开启
                       $r= explode('|',$n);  //按照| 分割字符串
                       $c= $v->conf_content==$r[0]?'checked':'';
                       $str.='<input type="radio" name="conf_content[]" value="'.$r[0].'"'.$c.'>'.$r[1].'　　';
                   }
                   $data[$k]->_html = $str;
                    break;
            }
        }
    	return view('admin.Config.index',compact('data'));
    }

    //网站首页提交处理方法
    public function changeContent(){
        $input = Input::all();   //获取配置也提交过来的数据
        foreach ($input['conf_id'] as $k => $v) {    //循环遍历出里面的值
            Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);    //更新到数据库
        }
        $this->putFile();    //调用此方法将配置项更新到web.php文件中
        return back()->with('errors','配置项更新成功！');
    }

    //将网站的配置项写入到指定文件中
    public function putFile(){
        //echo \Illuminate\Support\Facades\Config::get('web.web_title'); //调取生成web.php里面的值
        //读取网站配置表里的所有数据
        //pluck 过滤掉不需要的字段，获取需要的字段
        $config = Config::pluck('conf_content','conf_name')->all();
        //数组不能写入到字符串中，先将$config用var_export转换为字符串
        //var_export($config,true);    //此处的true参数是直接赋值
        //base_path()为网站的根目录
        $path = base_path().'\config\web.php';    //定义生成网站配置的文件个路径
        $str = '<?php return '.var_export($config,true).';';   //将重组的字符串写入到指定（web.php）文件中
        //file_put_contents()  将字符串写入到指定的路径文件中
        file_put_contents($path, $str);

        
    }

    //定义配置项排序的方法
    public function changeOrder(){
    	$input = Input::all();    //获取表单提交过来的所有数据
    	$conf = Config::find($input['conf_id']);   //以conf_id为字段查出相关内容
    	$conf -> conf_order = $input['conf_order'];  //将所输入的排序值赋予到数据库中
    	$re = $conf->update();   //更新数据库

    	if($re){
    		$data = [
    			'status' =>0,
    			'msg' =>'配置项排序更新成功！',
    		];
    	}else{
    		$data = [
    			'status' =>1,
    			'msg' =>'配置项排序更新失败，请稍后重试！',
    		];
    	}
    	return $data;
    }

     //get   admin/config/create     添加配置项
    public function create(){
    	return view('admin.Config.add',compact('data'));
    }

    //添加配置项表单提交过来的数据  post方式提交到admin/config
    public function store(){
        $input = Input::except('_token');   //获取添加文章提交过来的信息，除了_token字段不需要写入数据库，其他字段都写入
        //dd($input);
        $rules = [
                'conf_name'=>'required',     //判断名称是否为空
                'conf_title'=>'required',     //判断标题是否为空
        ];
            //自定义提示信息
        $message = [
                'conf_name.required'=>'配置项名称不能为空！',
                'conf_title.required'=>'配置项标题不能为空！',
        ];
        //make传入三个参数，第一个为参数值，第二个为验证规则,第三个为自定义提示内容
        $validator = Validator::make($input,$rules,$message);
        //判断validator里passes方法是否通过
        if($validator->passes()){
            $re = Config::create($input);     //此处写入到数据库只有部分字段，剩余字段可以用fillable和guarded字段在模型里面进行填充，也可以create自定义
            if($re){
                return redirect('admin/config');
            }else{
                return back()->with('errors','配置项添加失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }


    //修改配置项  admin/config/{conf_id}/edit 
    public function edit($conf_id){
        $field = Config::find($conf_id);    //查找传递参数过来的art_id，并将查找的内容通过compact分配给模板
        return view('admin.Config.edit',compact('field'));
    }

    //put和过来的admin/config/{Config}    更新配置项
    public function update($conf_id){
        $input = Input::except('_token','_method');
        $rules = [
                'conf_name'=>'required',     //判断名称是否为空
                'conf_title'=>'required',     //判断标题是否为空
        ];
            //自定义提示信息
        $message = [
                'conf_name.required'=>'配置项名称不能为空！',
                'conf_title.required'=>'配置项标题不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){            
            $re = Config::where('conf_id',$conf_id)->update($input);
            if($re){
                $this->putFile();
                return redirect('admin/config');
            }else{
                return back()->with('errors','文章修改失败，请重新输入！');
            }
        }else{
             //dd($validator->errors()->all());    //如果没通过，打印出没通过的理由
             return back()->withErrors($validator);
        }
    }

    //delete过来的admin/article/{article}     删除单个文章
    public function destroy($conf_id){         //将需要删除的art_id传过来
        $re = Config::where('conf_id',$conf_id)->delete();   //执行删除命令
        if($re){
            $this->putFile();
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
