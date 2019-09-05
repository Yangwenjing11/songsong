<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Nece;
use Validator;
class CeController extends Controller
{
 	public function ce_add()
 	{
 		return view('ce_add');
 	}
 	public function ce_do(Request $Request)
 	{
 		// $post=request()->post();
 		// dd($post);
		$post=Request()->except(['_token']);
 		// dd($post);
 		   //第三种验证
        $validator = Validator::make($post, [
            'c_name' => 'required|unique:neice|max:50',
            'c_url' => 'required'
        ],[
            'c_name.required'=>'姓名不能为空',
             'c_name.unique'=>'格式错误',
             'c_url.required'=>'网站地址不能为空'
            
        ]);
            if ($validator->fails()) {
            return redirect('neice/ce_add')
            ->withErrors($validator)
           ->withInput();
            }

 		
 		 if($Request->hasFile('c_img')){
            $post['c_img'] =uploads('c_img');
        }
 		  $res=DB::table('neice')->insert($post);
 		// dd($res);
 		  if($res)
 		  {
 		  	return redirect('neice/ce_list');
 		  }
 	}


 
 //    // 文件上传方法
 // public function uploads($name)
 // {
 //     if (request()->file($name)->isValid()) {
 //         $photo = request()->file($name);
 //         //$extension = $photo->extension();
 //         //$store_result = $photo->store('photo');
 //         $store_result = $photo->store('', 'public');
         
 //         return $store_result;
 //         }
 //         exit('未获取到上传文件或上传过程出错');
 // }

 	public function ce_list()
 	{
 		$quest=Request()->input();
 		$c_name=$quest['c_name']??'';
 		$where=[];
 		if($c_name)
 		{
 			$where[]=['c_name','like',$c_name.'%'];
 		}
 		$pageSize=config('app.pageSize');
 		$data=DB::table('neice')->where($where)->paginate($pageSize);
 		// dd($data);
 		return view('ce_list',['data'=>$data,'c_name'=>$c_name]);
 	}
 public function ce_delete(Request $request)
    {
        $data=$request->all();
        // dd($data);
        $res=DB::table('neice')->where(['c_id'=>$data['c_id']])->delete();
        return redirect('neice/ce_list');
    }
    
    public function ce_update(Request $request)
    {
    	// echo 1234;
    	$post=Request()->except(['_token']);
 		dd($post);
 		 //   //第三种验证
       //  $validator = Validator::make($post, [
       //      'c_name' => 'required|unique:neice|max:50',
       //      'c_url' => 'required'
       //  ],[
       //      'c_name.required'=>'姓名不能为空',
       //       'c_name.unique'=>'格式错误',
       //       'c_url.required'=>'网站地址不能为空'
            
       //  ]);
       //      if ($validator->fails()) {
       //      return redirect('neice/ce_update')
       //      ->withErrors($validator)
       //     ->withInput();
       //      }

       // $res=Nece::where('c_id',$c_id)->update($post);
    return redirect('neice/ce_list');

    }
 
}
