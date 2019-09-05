<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreBlogPost;
use Validator;
use Cookie;
use App\Student;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
//     public function index($id=0){
//     dump('laravle欢迎你'.$id);
// }


    public function add()
    {
       // 存session
       $user=['uid'=>1,'name'=>'ee'];
       // session(['user'=>$user]);
       // request()->session()->put('user',$user);
       // request()->session()->save();
       // 删除session
       // session(['user'=>null]);
       // request()->session()->pull('user');
       // request()->session()->forget('user');
       // 删除全
       // request()->session()->flush();
       // 取session
       // $user=request()->session()->get('user');
       // $user=session('user');
       // dd($user);

       // 存cookie队列的方式
       Cookie::queue(Cookie::make('pp', 'aa', 24*60));
       // Cookie::queue('popo', 'aa', 24*60);
       // $name=request()->Cookie('name');
       // $name=Cookie::get('name');
       // dd($name);
        return view('add');
    }
 

   // public function add_do(StoreBlogPost $Request)
    public function add_do(Request $Request)
    {

       // $post = $Request->post();
        // $post = Request()->post();
        //$post = Request()->all();
        //查询一条
        //$post = $Request->only('name');
        //去除一条
        $post = $Request->except(['_token']);
        //第一种验证
        //  $Request->validate([
        //     'name' => 'required|unique:student|max:50',
        //     'age' => 'required|numeric',
        // ],[
        //     'name.required'=>'姓名不能为空',
        //     'name.unique'=>'格式错误',
        //     'age.required'=>'年龄不能为空'
        // ]);
        //第三种验证
        $validator = Validator::make($post, [
            'name' => 'required|unique:student|max:50',
            'age' => 'required|numeric',
        ],[
            'name.required'=>'姓名不能为空',
             'name.unique'=>'格式错误',
             'age.required'=>'年龄不能为空'
        ]);
            if ($validator->fails()) {
            return redirect('student/add')
            ->withErrors($validator)
           ->withInput();
            }
            //调用文件上传方法
            // dd(request()->hasFile('headimg'));
           if(request()->hasFile('headimg'))
           {
            $post['headimg'] =uploads('headimg');
           }
           
        // $res = DB::table('student')->insert($post);
           $res=Student::create($post);
        if($res)
        {
            return redirect('student/list');
        }
    }

    //文件上传方法
 // public function upload($name)
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



   
    public function lists()
    {
         // $name=request()->Cookie('name');
        //   $name=Cookie::get('uu');
        // dd($name);

        $query = Request()->input();
        $name = $query['name']??'';
        $age = $query['age']??'';
        $where = [];
        if($name)
        {
            $where[] = ['name','like',$name.'%'];
        }
        if($age)
        {
            $where[] = ['age','=',$age];
        }
        $pageSize = config('app.pageSize');

        // $data = DB::table('student')->where($where)->paginate($pagesize);
        $orderfiled='stu_id';
        $data=Student::getStudent($where,$pageSize,$orderfiled);
        // dd($data);
       return view('lists',compact(['data','name','age']));
    }

    public function edit($id)
    {
        // $data=Student::where(['stu_id'=>$id])->first()->toArray();
       $data=Student::find($id);
         // dd($data);
        return view('edit',['data'=>$data]);
    }
    public function update($id)
    {
       $post=request()->except(['_token']);
       // 第三种验证
         $validator = Validator::make($post, [
            'name'=>[
                    'required',
                    Rule::unique('student')->ignore($id,'stu_id'),
                    'max:30'
                    ],
            // 'name' => 'required|unique:student|max:50',
            'age' => 'required|numeric',
        ],[
            'name.required'=>'姓名不能为空',
             'name.unique'=>'格式错误',
             'age.required'=>'年龄不能为空'
        ]);
            if ($validator->fails()) {
            return redirect('student/edit/'.$id)
            ->withErrors($validator)
           ->withInput();
            }
            // dd(123);
       // dd($post);
            // 图片上传
        if(request()->hasFile('headimg'))
           {
            $post['headimg'] =upload('headimg');
            $filename =storage_path('app/public').'/'.$post['oldimg'];
            // dd($filename);
            // 判断是否存在
            if(file_exists($filename))
            {
                unlink($filename);
            }
           }
           unset($post['oldimg']);
           // dd($post);
       $res=Student::where('stu_id',$id)->update($post);
    return redirect('student/list');
      
    }
    //删除
    public function delete($id)
    {
        $res=Student::destroy($id);
        if($res)
        {
            return redirect('student/list');
        }
    }
}
