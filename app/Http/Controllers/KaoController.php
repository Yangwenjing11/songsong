<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class KaoController extends Controller
{
	public function k_add()
	{
		return view('k_add');
	}

	public function k_do(Request $request)
	{
		// $post=$request->post();
		$post=$request->except(['_token']);
		$post['time']=time();
		// 调用文件上传方法
		 if($request->hasFile('k_img')){
            $post['k_img'] =uploads('k_img');
        }
		$res=DB::table('kao')->insert($post);
		// dd($res);
		if($res)
		{
			return redirect('kao/k_list');
		}
	}
	public function ruindex()
	{
		return view('ruindex');
	}



	public function k_list(Request $request)
	{
		$data=$request->all();
		// dd($data);
		$data=DB::table('kao')->get();
		// dd($data);
		return view('k_list',['data'=>$data]);
	}

	public function k_del($k_id)
	{
		$res=DB::table('kao')->where('k_id',$k_id)->delete();
		if($res)
		{
			return redirect('kao/k_list');
		}
	}
    
}
