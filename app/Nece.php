<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nece extends Model
{
     protected $table='neice';
    protected $primaryKey='c_id';
    public $timestamps=false;
    protected $fillable=['c_name','c_url','c_img','c_lxing','c_man','c_content','is_show'];
}
