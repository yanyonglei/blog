<html >
	<head>
		<title>登录页面</title>
		<meta charset="utf-8">
		<link href="public/css/login.css" rel="stylesheet" type="text/css">

	</head>
	<body class="login" mycollectionplug="bind">
		<p class="back"><a href="index.php">返回主页</a></p>
		<div class="login_m">
			<div class="login_logo">
				<img src="public/images/logo.png" width="196" height="46">
			</div>
			<div class="login_boder">
				<div class="login_padding" id="login_model">
					<form method="post" action="index.php?m=user&a=doLogin"  enctype="multipart/form-data">
						  <h2>用户名</h2>
						  <label>
							<input type="text" id="username" name="username" class="txt_input txt_input2" placeholder="输入用户名" value="">
						  </label>
						  <h2>密码</h2>
						  <label>
							<input type="password" name="password" id="userpwd" class="txt_input" placeholder="*****" value="">
						  </label>
						  <label>
							<input class="login" type="submit"  value="登录">
						  </label>
					  </form> 
				</div>
			</div>
		</div>
	</body>
</html>