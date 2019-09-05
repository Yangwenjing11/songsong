<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RaceController extends Controller
{
	public function r_add()
	{
		return view('r_add');
	}

    public function r_do(Request $request)
    {
     $data = $request->all();
     // dd($data);
     $data=$request->except(['_token']);
     	$data['c_time'] = time();
     // dd($data);
     // dd(['c_name'=>$data['c_name'],'c_name1'=>$data['c_name1'],'c_time'=>date("H:i",time()+7200)]);
   $res=DB::table('race')->insert($data);
   dd($res);
     if($res){
      return redirect('race/r_list');
     }else{
      return redirect('race/r_do');
     }


    }

    public function r_list()
    {
    	$data=DB::table('race')->get();
    	dd($data);
    }

}
