<html >
	<head>
		<title><?=$title;?></title>
		<meta charset="utf-8">
		<link href="public/css/register.css" rel="stylesheet" type="text/css">

		<script type="text/javascript"> 
		$(‘#btn‘).click(function(){ var tel = $.trim($(‘#tel‘).val()); $.post(‘SendTemplateSMS.php‘, {‘tel‘:tel},function(res){ if (res) { alert(‘发送成功‘); } else { alert(‘发送失败‘); } }); }); 
		
	</script>	
	</head>
	<body class="login" mycollectionplug="bind">
	<p class="back"><a href="index.php?m=user&a=login">登录</a></p>
		<div class="login_m">
			<div class="login_logo">
				<img src="public/images/logo.png" width="196" height="46">
			</div>
			<div class="login_boder">
				<div class="login_padding" id="login_model">
					<form method="post" action="index.php?m=user&a=doRegister"  enctype="multipart/form-data">

						 <label>
							<input type="text" name="tel" id="userpwd" class="txt_input" placeholder="输入手机号-收到验证码后不用填写" value=""><br/>

							<input type="submit" name="yzm" value="点击获取手机验证码">
						   </label>
						  	<label>
							<input type="text" name="num" id="userpwd" class="txt_input" placeholder="输入手机验证码" value="">
							<br/>
						  <h2>用户名</h2>
						  <label>
							<input type="text" id="username" name="username" class="txt_input txt_input2" placeholder="输入用户名" value="">
						  </label>
						  <h2>密码</h2>
						  <label>
							<input type="password" name="password" id="userpwd" class="txt_input" placeholder="*****" value="">
						  </label>
						   <h2>确认密码</h2>
						  <label>
							<input type="password" name="confirm" id="userpwd" class="txt_input" placeholder="*****" value="">
						  </label>
						   <h2>手机号</h2>
						 
						 <!--   </label>
							 <h2>图片验证码</h2>
						  <label>
							<input type="text" name="yzm" id="userpwd" class="txt_input" placeholder="图片验证码" value="">
						  </label><br/>
						 <label>
						   <img src="index.php?m=user&a=verify" onclick="this.src='index.php?m=user&a=verify&id='+Math.random()" width="70" height="40" style="margin-left:10px;vertical-align:middle;"/>
						  <label> -->
						  
							<input class="login" type="submit" name="register" value="注册">
						  </label>
					  </form> 
				</div>
			</div>
		</div>
	</body>
</html>