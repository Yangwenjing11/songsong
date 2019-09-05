<form action="">
	<table border="1">
		<tr>
			<td>id</td>
			<td>姓名</td>
			<td>年龄</td>
			<td>性别</td>
			<td>编辑</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->age}}</td>
			<td>@if($v->sex=='0')男@else女@endif</td>
			<td>
			<a href="{{url('lian/li_delete/'.$v->id)}}">删除</a>
			<a href="{{url('lian/li_edit/'.$v->id)}}">编辑</a>

			</td>
		</tr>
		@endforeach
	</table>
	{{$data->links()}}
</form>