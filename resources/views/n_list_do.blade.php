<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻添加页</title>
</head>
<body>
<form action="{{url('new/n_do')}}" method="post">
@csrf
	<table>
		<tr>
			<td>标题</td>
			<td><input type="text" name="title" value="{{$data->title}}"></td>
		</tr>
		<tr>
			<td>作者</td>
			<td><input type="text" name="writer" value="{{$data->writer}}"></td>
		</tr>
		<tr>
			<td>内容</td>
			<td><textarea name="content" id="" cols="30" rows="10" value="{{$data->content}}"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="提交"></td>
		</tr>
	</table>
</form>
	
</body>
</html>