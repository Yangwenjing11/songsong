<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $email='xuyuliang0601@163.com';
       $this->send($email);
    }
    
    //   public function send($email){
    //     \Mail::send('mail' , ['name'=>'杨雯晶'] ,function($message)use($email){
    //     //设置主题
    //         $message->subject("欢迎注册滕浩有限公司");
    //     //设置接收方
    //         $message->to($email);
    //     });
    // }
  
          public function send($email){
            $msg="绝对是咖啡机!您的验证码".rand(1000,9999);
        \Mail::raw($msg,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
    }
}
