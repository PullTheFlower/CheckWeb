<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="script/jquery-1.11.3.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="css/index.css">
<script type="text/javascript" src="script/bootstrap-datepicker.js"></script>
<link type="text/css" rel="stylesheet" href="css/datepicker.css">
	<title>华夏力鸿门户网站后台管理系统</title>
</head>
<body>
<div class="main">
	<div class="main_title" style="width:980px;">
		<img src="images/login_logo.png">
	</div>
	<div class="main_middle">
	  	
		<div class="login">
			<div class="login_title">
				<span class="glyphicon glyphicon-user"></span><span class="login_title">管理员登录</span>
			</div>

			
	
		  <form method="POST" action="signin.php">	
		    <div class="user_name">
				<div class="login_left">用户名：</div><div class="login_right"><input name="username" class="username form-control" type="text" placeholder="请输入用户名"></div>
			</div>
			<div class="warning_one">
			
			</div>
			<div class="password">
				<div class="login_left">密码：</div><div class="login_right"><input name="password" class="username form-control" type="password" placeholder="请输入密码"></div>
			</div>
			<div class="warning_two">
			
			</div>
		  	
			<div class="login_button">
				<input type="submit" class="btn btn-primary" value="登录"><!-- <span class="btn btn-danger login_btn_cancel">取消</span>-->
			</div>
	</form>
			<div class="login_tip">
				提示：请输入正确的管理员账号和密码<br/>
				不正确的管理员账号或密码将不能登录。
			</div>
		</div>
		<div class="login_logo">
			<img  src="images/logo.png" style="width:490px;">
		</div>
	</div>
	<div class="footer">
		<div class="footer_intro">design by zzh.</div>
	</div>
</div>

</body>
</html>