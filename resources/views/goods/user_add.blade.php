<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="../laravel/css/css.css" />
<script type="text/javascript" src="../laravel/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../laravel/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform"> 
					<form action="{{route('add_do')}}" method="post" class="form"  enctype="multipart/form-data">
					@csrf
						<div class="cfD">
						用户名：<input class="userinput" name="user_name" type="text" placeholder="输入用户名" /><br>&nbsp;&nbsp;
							用户密码：<input class="userinput vpr"  name="user_pwd" type="text" placeholder="输入用户密码" /><br>&nbsp;&nbsp;
							用户等级：<input class="userinput"  name="user_grade" type="text" placeholder="输入会员等级" /><br>&nbsp;&nbsp;
							<button class="userbtn">添加</button>
						</div>
					</form>
				</div>
			
</html>