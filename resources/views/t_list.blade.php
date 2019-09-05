<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('text/add_do')}}" method="post">
      @csrf
       <table border="1">
      <tr>
        <td>学生姓名</td>
        <td>学生年龄</td>
        <td>学生住址</td>
        <td>学生状态</td>
      </tr>
      @foreach($data as $v)
      <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->age}}</td>
        <td>{{$v->address}}</td>
        <td>{{$v->status}}</td>
        <td>
          <a href="">编辑</a>
        </td>
      </tr>
      @endforeach
       </table>
    </form>
</body>
</html> -->

<a href="javascript:;" class="show">显示离校学生</a>
<table align="center" width="700" border="1" class="a"> 
    <tr align="center">
        <td>ID</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>住址</td>
        <td>学生状态</td>
        <td>操作</td>
    </tr>
    @foreach($data as $v)
    <tr align="center">
        <td>{{$v->id}}</td>
        <td>{{$v->name}}</td>
        <td>{{$v->age}}</td>
        <td>{{$v->address}}</td>
        <td>@if($v->status==0)在校 @else离校 @endif</td>
        <td><a href="/text/t_delete/{{$v->id}}">删除</a>
            <a href="/text/t_update/{{$v->id}}">修改</a></td>
    </tr>
    @endforeach
</table>



<script type="text/javascript" src="/index/js/jquery.min.js"></script>
<script type="text/javascript">
    
    $('.show').click(function() {
        // alert(1)
        var a = $(this).text();
        if (a=='显示离校学生') {
            $(this).text('显示在校学生');
            $('.a').hide();
            $('.b').show();
        }else{
            $(this).text('显示离校学生');
            $('.b').hide();
            $('.a').show();
        }
    });
</script>