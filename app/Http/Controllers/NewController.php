<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NewController extends Controller
{
    public function n_add()
    {
    return view('n_add');
    }
    public function n_do(Request $request)
    {
    	$post=$request->post();
    	$post=$request->except(['_token']);
    	$post['add_time'] = time();
    	// dd($post);
    	$res=DB::table('new')->insert($post);
    	// dd($res);
    	if($res)
    	{
    		return redirect('new/n_list');
    	}
    }

    public function n_list(Request $request)
    {
    	$data=$request->all();
    	// dd($data);
    	$data=DB::table('new')->get();
    	// dd($data);
    	return view('n_list',['data'=>$data]);
    }

     public function n_list_do()
    {
    	// $data=$request->all();
    	// dd($data);
    	 $info=request()->all();
    	 // dd($info);
        $data=DB::table('new')->where('n_id',$info['n_id'])->first();
    	// dd($data);
    	return view('n_list_do',['data'=>$data]);
    }

    public function n_del($n_id)
    {
    	$res=DB::table('new')->where('n_id',$n_id)->delete();
    	// dd($res);
    	if($res)
    	{
    		return redirect('new/n_list');
    	}
    }

    public function n_upd($n_id)
    {
    	$res=DB::table('new')->where('n_id',$n_id)->first();
    	// dd($res);
    	if($res)
    	{
    		return view('n_upd',['res'=>$res]);
    	}
    }
    public function n_edit($n_id)
    {

    	$post=request()->except(['_token']);
    	// dd($post);
    	$post['add_time'] = time();
    	// dd($post);
    	$res=DB::table('new')->where('n_id',$n_id)->update($post);
    	// dd($res);
    	if($res)
    	{
    		return redirect('new/n_list');
    	}
    }
}
