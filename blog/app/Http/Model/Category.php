<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];     //写入数据库并填充字段，通过排除法把没有的字段设置为空

    /*第一种调用方法*/
    public function tree(){
    	//$categorys = $this->all();
    	$categorys = $this->orderBy('cate_order','asc')->get();
    	return $this->getTree($categorys,'cate_name','cate_id','cate_pid');   
    }

    /*   第二种方法
    public static function tree(){
    	$categorys = Category::all();
    	return (new Category)->getTree($categorys,'cate_name','cate_id','cate_pid');   
    }*/

    //循环遍历分类
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
    	$arr= array();     //声明一个空数组
    	foreach($data as $k=>$v){     //循环遍历出所有分类信息
    		if($v->$field_pid == $pid){    //判断分类信息的cate_pid是否为0，也就是父ID
    			$data[$k]["_".$field_name] = $data[$k]["$field_name"];
      			$arr[] = $data[$k];    //将分类的父级$ke值存入到空数组$arr[]
      			foreach ($data as $m => $n) {    //再次循环遍历出所有分类信息
      				if($n->$field_pid == $v->$field_id){      //判断遍历出来的所有分类的父ID与ID是否相同
      					$data[$m]["_".$field_name] = '|---- '.$data[$m]["$field_name"];
      					$arr[] = $data[$m];     //将分类的父级$m值存入到空数组$arr[]
      				}
      			}
    		}
    	}
    	return $arr;
    }

}
