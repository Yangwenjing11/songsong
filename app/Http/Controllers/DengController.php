<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DengController extends Controller
{
    public function d_add()
    {
    	return view('d_add');
    }

    public function d_do(Request $request)
    {
    	$post=$request->post();
    	$post=$request->except(['_token']);
    	// dd($post);
    	$res=DB::table('deng')->insert($post);
    	// dd($res);
    	if($res)
    	{
    		return redirect('kao/k_add');
    	}
    }
}
