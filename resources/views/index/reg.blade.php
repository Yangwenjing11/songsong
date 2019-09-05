@extends('layouts.index')

@section('title', '前台')


@section('content')
   <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('reg_do')}}" method="get" class="reg-login">
     @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{route('login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="tel" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text"  name="code" placeholder="输入短信验证码" /> <button>获取验证码</button></div>
       <div class="lrList"><input type="text" name="pwd"  placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text"  name="pwd_again" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     <div class="footNav">
      <dl>
       <a href="{{url('index/index')}}">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="prolist.html">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="car.html">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="user.html">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>
     </div><!--footNav/-->
     @endsection 
