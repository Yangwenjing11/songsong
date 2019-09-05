<html>
	<form action="/lian/li_update/{{$res->id}}" method="post">
	@csrf
		<table>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name"  value="{{$res->name}}" placeholder="请输入学生姓名"></td>
			</tr>
			<tr>
				<td>年龄</td>
				<td><input type="text" name="age" value="{{$res->age}}" placeholder="请输入学生姓名"></td>
			</tr>
				<tr>
				<td>性别</td>
				<td>
				<input type="radio" name="sex" @if($res->sex==0)checked="checked"@endif placeholder="请输入学生姓名" value="0" >男
				<input type="radio" name="sex" @if($res->sex==1)checked="checked"@endif  placeholder="请输入学生姓名" value="1">女</td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>