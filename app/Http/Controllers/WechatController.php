<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class WechatController extends Controller
{
    /**
     * 获取用户列表
     */
    public function get_user_list()
    {
        $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->get_wechat_access_token().'&next_openid=');
        $re = json_decode($result,1);
        $last_info = [];
        foreach($re['data']['openid'] as $k=>$v){
            $user_info = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_wechat_access_token().'&openid='.$v.'&lang=zh_CN');
            $user = json_decode($user_info,1);
            $last_info[$k]['nickname'] = $user['nickname'];
            $last_info[$k]['openid'] = $v;
        }
        // dd($last_info);
        // dd($re['data']['openid']);
        return view('Wechat.userList',['info'=>$last_info]);
    }
    /**
     * 获取access_token
     */
    public function get_access_token()
    {
        return $this->get_wechat_access_token();
    }
    public function get_wechat_access_token()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        //加入缓存
        $access_token_key = 'wechat_access_token';
        if($redis->exists($access_token_key)){
            //存在
            return $redis->get($access_token_key);
        }else{
            //不存在
            $result = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET'));
            $re = json_decode($result,1);
            $redis->set($access_token_key,$re['access_token'],$re['expires_in']);  //加入缓存
            return $re['access_token'];
        }
    }
    public function get_user_info()
    {
        //1接openid
         $openid=$_GET['openid'];
        //2.获取数据  
        //获取access_token
         $access_token=$this->get_wechat_access_token();
        //dd($access_token);
        //调用接口   接收数据  
         $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
         $re=file_get_contents($url);
        //  dd($re);
         //处理数据
         $result=json_decode($re,true);
        //  dd($result);
        //3.展示
        return view('Wechat.get_list',['result'=>$result]);
    }

    // 查看详情[昵称，城市，头像]
    public function login()
    {
        return view('wechat/login');
    }

      public function wechat_login()
    {
        //dd(111);
        $redirect_uri = "http://www.wxlaravel.com/code";
        // $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.env('WECHAT_APPID').'&redirect_uri='.urlencode($redirect_uri).'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
        header('Location:'.$url);
        //header('Location:'.$url);
    }

    public function code(Request $request){
                $req = $request->all();
                // dd($req);


        $result = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_APPSECRET').'&code='.$req['code'].'&grant_type=authorization_code');
        $re = json_decode($result,1);
        $user_info = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$re['access_token'].'&openid='.$re['openid'].'&lang=zh_CN');
        $wechat_user_info = json_decode($user_info,1);
        dd($wechat_user_info);
    }

}

