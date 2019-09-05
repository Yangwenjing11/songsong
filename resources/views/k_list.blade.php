<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="">
<a href="/ruindex">入库</a>
<a href="/chuindex">出库</a>
	<table border="1">
		<tr>
			<td>货物ID</td>
			<td>货物名称</td>
			<td>货物图片</td>
			<td>货物数量</td>
			<td>时间</td>
			<td>货物操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->k_id}}</td>
			<td>{{$v->name}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->k_img}}" height="80" width="80"> </td>
			<td>{{date('Y-m-d H:i:s')}} </td>
			<td>{{$v->number}}</td>
			<td><a href="/chuindex/{{$v->k_id}}">出库</a></td>
		
		</tr>
		@endforeach
	</table>
</form>
	
</body>
</html>