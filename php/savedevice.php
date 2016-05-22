<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>


<?php
  $deviceName=$_POST['deviceName'];
  $deviceModel=$_POST['deviceModel'];
  $factoryNumber=$_POST['factoyNumber'];
  $roomNumber=$_POST['roomNumber'];
  $installPlace=$_POST['installPlace'];
  $systemIntergrating=$_POST['systemIntergrating'];
  if(!empty($deviceName)&&!empty($deviceModel)&&!empty($factoyNumber)&&!empty($roomNumber)&&!empty($installPlace)&&!empty($systemIntergrating)){
  //echo $deviceName,$deviceModel,$factoyrNumber,$roomNumber,$installPlace,$systemIntergrating;
  $local='127.0.0.1';
  $username='root';
  $password='130320';
  $database='coal';
  $conn=mysqli_connect($local,$username,$password,$database)or die('连接失败');
  $sql="insert into device(devicename,devicemodel,factorynumber,roomnumber,installplace,systemintergrating)values('".$deviceName."','".$deviceModel."','".$factoyNumber."','".$roomNumber."','".$installPlace."','".$systemIntergrating."')";
  //echo $sql;
  $result=mysqli_query($conn,$sql);
  if ($result) {
  	echo "添加成功<br><a href='/xiangmu/device.php'>返回继续</a>";
  }else{
  	echo "插入失败<br><a href='/xiangmu/device.php'>返回重新输入</a>";
  }
}else{
	echo "数据不完整<br><a href='/xiangmu/device.php'>返回重新输入</a>";
}

?>
</body>
</html>