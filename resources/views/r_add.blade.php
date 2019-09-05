<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<form action="{{url('race/r_do')}}" method="post" align="center">
	@csrf
		<table border='1'>
			<h1>添加竞猜球队</h1></br>
			<input type="text" name="c_name">	 VS		<input type="text" name="c_name1"></br>
			<h2>结束竞猜时间 </h2></br>
			<h2><input type="submit" value="添加"></h2>
		</table>
	</form>
</body>
</html>