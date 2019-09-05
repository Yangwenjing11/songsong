<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='student';
    protected $primaryKey='stu_id';
    public $timestamps=false;
    protected $fillable=['name','age','headimg'];

    public static function getStudent($where,$pageSize,$orderfiled,$order='desc')
    {
    	return self::where($where)->orderBy($orderfiled,$order)->paginate($pageSize);
    }
}
