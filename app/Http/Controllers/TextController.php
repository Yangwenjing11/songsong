<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TextController extends Controller
{
	public function index()
	{
	// 	$mem= New \Memcache;
	// 	$mem->connect('127.0.0.1','11211');
	// 		// $data=json_encode(DB::table('text')->get());
	// 		// // 设置缓存
	// 		// $mem->set('TextController_index_text',$data,0,10);
	// 	// 取值
	// $data=$mem->get('TextController_index_text');
	// if(empty($data))
	// {
	// 	// 使用 缓存时间
	// 	$data=json_encode(DB::table('text')->get());
	// 	// 设置缓存
	// 	$mem->set('TextController_index_text',$data,0,10);
	// }
	// print_r($data);
	// 	// $mem->set('key','aew',0,10);
	// 	// echo $mem->get('key');
	// 	die;

		 return view('index');
	}
	public function add_do(Request $request)
	{
		$post=$request->post();
		$post=$request->except(['_token']);
		// dd($post);
		$res=DB::table('test')->insert($post);
		// dd($res);
		if($res)
		{
			return redirect('text/t_list');
		}
	}

	public function t_list(Request $request)
	{
		$data=$request->all();
		// dd($data);
		$data=DB::table('test')->get();
		// dd($data);
		return view('t_list',['data'=>$data]);
	}
	public function t_update($id)
	{
	$res=DB::table('test')->where('id',$id)->first();
	// dd($res);
	if($res)
	{
		return view('t_update',['res'=>$res]);
	}
	}
	public function t_edit($id)
	{
			$post=request()->except(['_token']);
		// dd($post);
		$res=DB::table('test')->where('id',$id)->update($post);
		// dd($res);
		if($res)
		{
			return redirect('text/t_list');
		}
	}
	public function t_delete($id)
	{
		$res=DB::table('test')->where('id',$id)->delete();
		// dd($res);
		if($res)
		{
			return redirect('text/t_list');
		}
	}
   
}
