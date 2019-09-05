<form action="/wechat/login_do" method="post">
    <p>
        用户名：<input type="text" name="name" />
    </p>
    <p>
        密码：<input type="password" name="pwd" />
    </p>
    <p>
        <button type="button" class="dian">登录</button>
    </p>
</form>
<script src="/js/app.js"></script>
<script>
	$(function(){
		$('.dian').click(function(){
			// alert(111);
			window.location.href="wechat/login";
		});
		
	})
</script>