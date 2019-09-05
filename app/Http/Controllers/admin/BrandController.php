<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BrandController extends Controller
{
    public function brand_add()
    {
        return view('brand/brand_add');
    }
    public function brand_do(Request $request)
    {
    	// // $post=request()->post();
    	// $post=request()->except(['_token']);
    	// // dd($post);
    	// $res=DB::table('brand')->insert($post);
    	// if($res)
    	// {
    	// 	return redirect('brand/brand_list');
    	// }
    	  $data = request()->except(['_token']);
          // dd($data);
        if($request->hasFile('brand_img')){
            $data['brand_img'] = $this->uploads('brand_img');
        }
        $post = DB::table('brand')->insert($data);
        if ($post){
            return redirect('brand/brand_list');
        }
    	
    }

    public function uploads($name)
 {
     if (request()->file($name)->isValid()) {
         $photo = request()->file($name);
         //$extension = $photo->extension();
         //$store_result = $photo->store('photo');
         $store_result = $photo->store('', 'public');
         
         return $store_result;
         }
         exit('未获取到上传文件或上传过程出错');
 }

    public function brand_list()
    {

         $query = Request()->input();
        $brand_name = $query['brand_name']??'';
        $where = [];
        if($brand_name)
        {
            $where[] = ['brand_name','like',$brand_name.'%'];
        }
        $pageSize = config('app.pageSize');

    	$data=DB::table('brand')->where($where)->paginate($pageSize);
    	// dd($data);
    	return view('brand/brand_list',['data'=>$data,'brand_name'=>$brand_name]);
    }

}
