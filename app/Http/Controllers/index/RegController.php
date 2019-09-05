5

m<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class RegController extends Controller
{
    public function reg()
    {
        return view('index.reg');
    }
     public function reg_do()
    {
        
         $validator = Validator::make($post, [
            'tel' => 'required',
            'pwd' => 'required'
        ],[
            'tel.required'=>'电话不能为空',
             'pwd.required'=>'密码不能为空'
             
        ]);
            if ($validator->fails()) {
            return redirect('/reg')
            ->withErrors($validator)
           ->withInput();
            }
    }

    public function sendemail()
    {
        $code=rand(1000,9999);
        // dd($code);
        // session(['code'=>$code]);
        $email=request()->email;
        // dd($email);
        $info='欢迎注册电商前台用户';
        send($email,$info,$code); 
        echo json_encode(['msg'=>'注册成功，请前往邮箱查看验证码']);
    }
}