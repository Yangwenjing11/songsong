<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="/new/n_edit/{{$res->n_id}}" method="post">
@csrf
	<table>
		<tr>
			<td>标题</td>
			<td><input type="text" name="title" value="{{$res->title}}"></td>
		</tr>
		<tr>
			<td>作者</td>
			<td><input type="text" name="writer" value="{{$res->writer}}"></td>
		</tr>
		<tr>
			<td>内容</td>
			<td><textarea name="content" id="" cols="30" rows="10" value="{{$res->content}}"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>
	
</body>
</html>