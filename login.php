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
				<span class="glyphicon glyphicon-user"></span><span class="login_title">用户登录</span>
			</div>

			<?php
		       //session_start();
			   //require_once(system.php);
               $UserName=$_POST['username'];
               $Password=$_POST['password'];

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              	if (empty($UserName)) {
              		$NameErr="用户名不能为空";
              	}
              	if (empty($Password)) {
              		$PassErr="密码不能为空";
              	}
              	
              	if (!empty($UserName)&&!empty($Password)) {
              		$conn=mysqli_connect('127.0.0.1','root','130320','coal')or die('连接失败');
              		$sql="select count(*) from users where username='$UserName' and password='$Password'";
              		$result=mysqli_query($conn,$sql);
              		$rows=mysqli_num_rows($result);
              	    
              		//echo $row;
              		//$count=0;
              		//$count=$row[0];
              		if($rows){
              			$_SESSION['loggedin']=1;
              			echo "登录成功";
              			//header("Location: localhost/xiangmu/system.php");
                        exit;
              		}else{
              			$Error="用户名或密码不正确";
              		}
              	}
              }
          




			?>
		  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
		    <div class="user_name">
				<div class="login_left">用户名：</div><div class="login_right"><input name="username" class="username form-control" type="text" placeholder="请输入用户名"></div>
			</div>
			<div class="warning_one">
			<?php
			echo $NameErr;
			?>	
			</div>
			<div class="password">
				<div class="login_left">密码：</div><div class="login_right"><input name="password" class="username form-control" type="password" placeholder="请输入密码"></div>
			</div>
			<div class="warning_two">
			<?php
			    
			echo $PassErr;
			echo $Error;
			?>	
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