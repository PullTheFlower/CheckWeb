<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php
$name = $_POST['username'];
$password = md5($_POST['password']);
$dbc = mysqli_connect('127.0.0.1','root','130320','coal')or die('Error connect to database');
$query = "insert into users(username,password)values('".$name."','".$password."')";
//echo $query;
$result = mysqli_query($dbc, $query);
if ($result) {
	echo "添加成功";
}
mysqli_close($dbc);


?>
</body>
</html>