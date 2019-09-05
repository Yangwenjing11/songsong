<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="{{url('kao/k_list')}}" >
<input type="hidden" id='{{$data->k_id}}>'>
@csrf
	<table>
		<tr>
			<td>货物名称</td>
			<td><input type="text" name="name"></td>
		</tr>
			<tr>
			<td>货物图片</td>
			<td><input type="file" name="k_img"></td>
		</tr>
			<tr>
			<td>货物数量</td>
			<td><input type="text" name="number"></td>
		</tr>
			<tr>
			<td></td>
			<td><input type="submit" value="入库"></td>
		</tr>
	</table>
</form>
	
</body>
</html>