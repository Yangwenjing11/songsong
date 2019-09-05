<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->
<form action="{{route('do')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
    <p><input type="text" name="name" placeholder="请输入姓名">@php echo $errors->first('name');@endphp</p>
    <p><input type="text" name="age" placeholder="请输入年龄">@php echo $errors->first('age');@endphp</p>
    <p>性别：<input type="radio" name="sex" value="0">男
    <input type="radio" name="sex" value="1">女
    </p>
    <p><input type="file" name="headimg"></p>
    <p><button>提交</button></p>
    </form>
</body>
</html>
<script src="js/jquery-1.8.2.min.js"></script>
<script>
    // 验证学生姓名
    $('input[name="name"]').blur(function(){
       var name=$(this).val();
       var obj=$(this);
       $(this).next().remove();
       // 中文 文字
       var reg=/^[\ue400-\u9fa5A-Za-z.]{2,12}$/;
       if(!reg.test(name)){
        $(this).after('<b style="color:red">学生姓名必须中文字母.组成长度为2~12位</b>')；
        return;
       }
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
// 唯一性验证
$.ajax({
    method:"POST",
    url:"/student/checkName",
});
    });
</script>