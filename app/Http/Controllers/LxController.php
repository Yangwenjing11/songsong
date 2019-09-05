<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LxController extends Controller
{
   public function li_add()
   {
   	return view('li_add');
   }
   public function li_do(Request $request)
   {
   	$post=$request->post();
   	$post=$request->except(['_token']);
    $res=DB::table('text')->insert($post);
   	// dd($res);
   	if($res)
   	{
   		return redirect('lian/li_list');
   	}
  }
  public function li_list(Request $request)
  {

    $data=$request->all();
  	$data=DB::table('text')->paginate(2);

  	return view('li_list',['data'=>$data]);
  	// echo 11;
  }
  public function li_delete($id)
  {
  	  	$res=DB::table('text')->where('id',$id)->delete();
  	  	// dd($res);
  	return redirect('lian/li_list');
  }
  public function li_edit($id)
  {
  	$res=DB::table('text')->where('id',$id)->first();
  	// dd($res);
  	if($res)
  	{
  		return view('li_edit',['res'=>$res]);
  	}
  }
  public function li_update($id)
  {
  	 	$post=request()->except(['_token']);
  	 	 $res=DB::table('text')->where(['id'=>$id])->update($post);
   	// dd($res);
   	if($res)
   	{
   		return redirect('lian/li_list');
   	}
  }
}
