<?php
  
  //var_dump($_POST);
  $UserName=$_POST['username'];
  $Password=$_POST['password'];
  //echo $Password;
  $conn=mysqli_connect('127.0.0.1','root','13032011','coal')or die('连接失败');
  $sql="select * from users where username='".$UserName."' and password='".$Password."'";
  //echo $sql;
  $result=mysqli_query($conn,$sql);

  //var_dump($result);
  //echo $sql;
  //var_dump($result->num_rows);
  //echo $result->num_rows;
  if ($result->num_rows) {
  	 //echo "登录成功";
     //$_SESSION['logined']=1;
  	 //$_SESSION['username']=$UserName;
  	 setcookie("logined",1,time()+3600);
  	 setcookie("username",$UserName,time()+3600);
  	 //echo $_SESSION['logined'];
  	 //echo $_SESSION['username'];
  	 //session_write_close();
  	 header("Location: system.php");

  }else{
     echo "登录失败，请检查您的用户名和密码是否正确。<br/>";
     echo '<html><head><title></title></head><body><a href="login.php">返回登录页面</a></body></html>';
  }
  //mysqli_free_result($result);

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
	<title></title>
</head>
<body>
<pre>

</pre>
</body>
</html>