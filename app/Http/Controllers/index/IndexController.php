<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    public function index()
    {
    	$res=DB::table('cat')->where('parent_id',0)->get();
        return view('index.index',['res'=>$res]);
    }
}
