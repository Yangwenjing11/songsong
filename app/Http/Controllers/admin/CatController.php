<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CatController extends Controller
{
    public function cat_add()
    {
    	 $data=DB::table('cat')->get();

        // $data=createTree($data);
    	return view('cat/cat_add',['data'=>$data]);
    }

    public function add_do(Request $Request)
    {
    	
    	$post=Request()->except(['_token']);
    	// dd($post);
    	$data=DB::table('cat')->insert($post);
    	// dd($res);
    	if($data)
    	{
    		return redirect('cat/cat_list');
    	}
    	
    }


    public function cat_list()
    {
    	$res=request()->all();
    	// dd($res);
    	$data=DB::table('cat')->get();
    	// dd($data);
    return view('cat/cat_list',['data'=>$data]);
    }


    public function cat_delete($cat_id)
    {
		
		$data=DB::table('cat')->where('cat_id',$cat_id)->delete();
		return redirect('cat/cat_list');
    }

    public function cat_edit($cat_id)
    {
        $data=DB::table('cat')->where('cat_id',$cat_id)->first();
        // dd($data);
        if($data)
        {
            return view('cat/cat_edit',['data'=>$data]);
        }
    }


    public function cat_update($cat_id)
    {
            $post=Request()->except(['_token']);
        // dd($post);
        $data=DB::table('cat')->where('cat_id',$cat_id)->update($post);
        // dd($res);
        if($data)
        {
            return redirect('cat/cat_list');
        }
        
    }
}
