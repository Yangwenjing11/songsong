<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="">
	<table border="1">
		<tr>
			<td>id</td>
			<td>标题</td>
			<td>作者</td>
			<td>内容</td>
			<td>点击量</td>
			<td>编辑</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->n_id}}</td>
			<td><a href="{{url('new/n_list_do')}}?n_id={{$v->n_id}}">{{$v->title}}</a></td>
			<td>{{$v->writer}}</td>
			<td>{{$v->content}}</td>
			<td>{{$v->click}}</td>
			<td>
			<a href="{{url('new/n_del/'.$v->n_id)}}">删除</a>
			<a href="{{url('new/n_upd/'.$v->n_id)}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
</form>
	
</body>
</html>