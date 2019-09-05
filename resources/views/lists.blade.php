<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="">
    <input type="text" name="name" placeholder="请输入搜索的姓名">
    <input type="text" name="age" placeholder="请输入搜索的姓名">
    <button>搜索</button>
    </form>
    @foreach ($data as $v)
    <p>ID:{{$v->stu_id}}姓名{{$v->name}} 年龄:{{$v->age}} 性别:@if($v->sex==1)女 @else 男 @endif 
    图片:<img src="{{env('UPLOAD_URL')}}{{$v->headimg}}" width="30" heigth="30"><a href="{{url('student/edit/'.$v->stu_id)}}">编辑</a>|<a href="{{url('student/delete/'.$v->stu_id)}}">删除</a></p>
    @endforeach
    {{ $data->appends(['name'=>$name,'age'=>$age])->links() }}
</body>
</html>