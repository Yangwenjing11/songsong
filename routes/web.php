<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//路由返回 试图
Route::get('/', function () {
    return view('welcome');
});

//路由返回字符串r
// Route::get('/', function () {`
// 	// session(['user'=>['uid'=>1,'name'=>'yangyang']]);
// 	// dd(session('user'));
// 	// 获取方法
// 	// dd(request()->user());
// 	// dd(\Auth::user()); 
// 	// dd(\Auth::id());
// 	// 判断是否登录
// 	// dd(\Auth::check());
//        return response('hello ndkj')->header('content-type','text/html');
//  });
//路由返回页面
// Route::get('/user','UserController@index'
  
// );
//路由返回表单
//  Route::get('/user', function () {
//      return '<form action="useradd" method="post"><input type="text" name=username>'.csrf_field().'<button>提交</button></form>';
//  });
Route::get('/login', function () {
    return '<form action="useradd" method=""><input type="text" name=username><input type="hidden" name="_token" value='.csrf_token().'><button>登录</button></form>';
});
//表单接受
//match接受
//  Route::match(['post'],'/useradd', function () {
//     dd(request()->username);
// });
//any接受
// Route::any('/useradd', function () {
//     dd(request()->username);
// });
//必选参数
// Route::get('user/{id}', function ($id) {
//     return $id;
// });
//可选参数
// Route::get('user/{id?}', function($id=0) {
//     return $id;
// });
//正则约束
// Route::get('user/{id?}', function($id=0) {
//     return $id;
// })->where('id','\d+');
//命名路由
//  Route::get('user/{id?}','UserController@index')->name('uid');
// //调用 前面的路由
// Route::get('aa', function () {
//     // 通过路由名称生成 URL
//     return redirect()->route('uid');
//    });



//引入视图
//  Route::get('/student/add','UserController@add' );
//  Route::any('/student/add_do','UserController@add_do' )->name('do');
//  Route::get('/student/list','UserController@lists' );
// auth 判断是否登录没登录调到登录 basic 认证登录
 //路由前缀
 Route::prefix('student')->middleware('auth.basic')->group(function () {
    Route::get('add','UserController@add' );
    Route::any('add_do','UserController@add_do' )->name('do');
	 Route::get('list','UserController@lists' );
	 Route::get('edit/{id}','UserController@edit' );
	 Route::post('update/{id}','UserController@update' );
	 Route::get('delete/{id}','UserController@delete' );
   });
 Route::get('mail','MailController@index');


Route::get('cookie/add', function () {
	$minutes = 24 * 60;
	return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', $minutes);
	});
Route::get('cookie/get', function(\Illuminate\Http\Request $request) {
		$cookie = $request->cookie('name');
		dd($cookie);
	});



// 练习
Route::prefix('lian')->group(function(){
	Route::get('li_add','LxController@li_add')->name('li_add');
	Route::post('li_do','LxController@li_do')->name('li_do');
	Route::get('li_list','LxController@li_list')->name('li_list');
	Route::get('li_delete/{id}','LxController@li_delete');
	Route::get('li_edit/{id}','LxController@li_edit');
	Route::post('li_update/{id}','LxController@li_update');
});

// 内测
Route::prefix('neice')->middleware('auth.basic')->group(function(){
	Route::get('ce_add','CeController@ce_add')->name('ce_add');
	 Route::post('ce_do','CeController@ce_do')->name('ce_do');
	 Route::get('ce_list','CeController@ce_list')->name('ce_list');
	 Route::get('ce_delete','CeController@ce_delete')->name('ce_delete');
	 Route::get('ce_update','CeController@ce_update')->name('ce_update');

});
//test表
Route::prefix('text')->group(function(){
	Route::get('index','TextController@index')->name('index');
	Route::post('add_do','TextController@add_do')->name('add_do');
	Route::get('t_list','TextController@t_list')->name('t_list');
	Route::get('t_update/{id}','TextController@t_update');
	Route::post('t_edit/{id}','TextController@t_edit');
	Route::get('t_delete/{id}','TextController@t_delete');
});
// 检测new表
Route::prefix('new')->group(function(){
	Route::get('n_add','NewController@n_add')->name('n_add');
	Route::post('n_do','NewController@n_do')->name('n_do');
	Route::get('n_list','NewController@n_list')->name('n_list');
	Route::get('n_list_do','NewController@n_list_do');
	Route::get('n_del/{n_id}','NewController@n_del');
	Route::get('n_upd/{n_id}','NewController@n_upd');
	Route::post('n_edit/{n_id}','NewController@n_edit');
});
// 检测登录表 deng
Route::prefix('deng')->group(function(){
	Route::get('d_add','DengController@d_add')->name('d_add');
	Route::post('d_do','DengController@d_do')->name('d_do');
});
// 竞猜球队
Route::prefix('race')->group(function(){
	Route::get('r_add','RaceController@r_add')->name('r_add');
	Route::post('r_do','RaceController@r_do')->name('r_do');
	Route::get('r_list','RaceController@r_list')->name('r_list');
});
 



// 考试题kao表
Route::prefix('kao')->middleware('auth.basic')->group(function(){
Route::get('k_add','KaoController@k_add')->name('k_add');
Route::post('k_do','KaoController@k_do')->name('k_do');
Route::get('k_list','KaoController@k_list')->name('k_list');
Route::get('k_del/{k_id}','KaoController@k_del')->name('k_del');
Route::get('ruindex','KaoController@ruindex')->name('ruindex');
Route::get('chuindex','KaoController@chuindex')->name('chuindex');
});








// nigx
Route::get('wechat/get_access_token','WechatController@get_access_token'); //获取access_token
Route::get('/wechat/get_user_list','WechatController@get_user_list'); //获取用户列表
Route::get('/wechat/get_user_info','WechatController@get_user_info');//详情

Route::get('/wechat/login','WechatController@wechat_login');//登录
Route::get('/wechat/code','WechatController@code');//登录







 //项目

 Route::get('goods/index','admin\GoodsController@index' );
 //头部eeeee
 Route::get('goods/head','admin\GoodsController@head' )->name('head');
 //左边
 Route::get('goods/left','admin\GoodsController@left' )->name('left');
 //
 Route::get('goods/main','admin\GoodsController@main' )->name('main');
 // 品牌添加
 Route::get('brand/brand_add','admin\BrandController@brand_add' )->name('brand_add');
 Route::post('brand/brand_do','admin\BrandController@brand_do' )->name('brand_do');
 Route::get('brand/brand_list','admin\BrandController@brand_list' )->name('brand_list');
 // 管理员管理
 Route::get('goods/user_add','admin\GoodsController@user_add' )->name('user_add');
 Route::post('goods/add_do','admin\GoodsController@add_do' )->name('add_do');
 Route::get('goods/user_list','admin\GoodsController@user_list' )->name('user_list');
// 分类管理
 Route::get('cat/cat_add','admin\CatController@cat_add')->name('cat_add');
 Route::post('cat/add_do','admin\CatController@add_do')->name('add_do');
 Route::get('cat/cat_list','admin\CatController@cat_list')->name('cat_list');
 Route::get('cat/cat_delete/{cat_id}','admin\CatController@cat_delete');
 Route::get('cat/cat_edit/{cat_id}','admin\CatController@cat_edit');
 Route::post('cat/cat_update/{cat_id}','admin\CatController@cat_update');








   



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'indexController@index')->name('index');
// Route::get('/login', 'LoginController@index')->name('login');
// Route::get('/reg', 'LoginController@reg')->name('reg');
Route::prefix('index')->group(function () { 
    Route::get('index', 'index\IndexController@index')->name('index');
    Route::get('prolist', 'index\ProlistController@prolist')->name('prolist');
    Route::get('car', 'index\CarController@car')->name('car');
    Route::get('user', 'index\UserController@user')->name('user');
    Route::get('login', 'index\LoginController@login')->name('login');
    Route::get('reg', 'index\RegController@reg')->name('reg');
    Route::get('reg_do', 'index\RegController@reg')->name('reg_do');
}); 