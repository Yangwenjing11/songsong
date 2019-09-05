<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class GoodsController extends Controller
{
    public function index()
    {
        return view('goods/index');
    }
    //头部
    public function head()
    {
        return view('goods/head');
    }
    public function left()
    {
        return view('goods/left');
    }
    public function main()
    {
        return view('goods/main');
    }
    // 管理员管理
    public function user_add()
    {
        //return view('goods/user_add');
        // $data = DB::table('user')->get();
        return view('goods/user_add');
    }
    public function add_do()
    {
        // except去除表单令牌中_token
        $post = Request()->except(['_token']);
         // dd($post);
        // $post['user_pwd'] = md5($post['user_pwd']);
        $post['add_time'] = time();
       
        //  $validator = Validator::make($post, [
        //     'user_name' => 'required|unique:user|max:50',
            
        // ],[
        //     'name.required'=>'用户名不能为空',
        //      'name.unique'=>'格式错误'
        // ]);
        //     if ($validator->fails()) {
        //     return redirect('goods/user_add')
        //     ->withErrors($validator)
        //    ->withInput();
        //     }


        $res = DB::table('user')->insert($post);
        // dd($res);
        if($res)
        {
            return redirect('goods/user_list');
        }
    }
    public function user_list()
    {
       $quest=request()->input();
       $user_name=$quest['user_name']??'';
       $where=[];
       if($user_name)
       {
            $where[]=['user_name','like','%'.$user_name.'%'];
       }
       
       $PageSize=config('app.pageSize');
        
       $data=DB::table('user')->where($where)->paginate($PageSize);
       //dd($data);

       return view('goods/user_list',['data'=>$data,'user_name'=>$user_name]);
    }
  
}
