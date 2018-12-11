<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    protected $table = 'navs';
    protected $primaryKey = 'nav_id';
    public $timestamps = false;
    protected $guarded = [];     //写入数据库并填充字段，通过排除法把没有的字段设置为空/
}
