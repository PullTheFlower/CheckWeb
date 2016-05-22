<?php
  if($_COOKIE['logined']!=1){
   setcookie("logined","",time()-7200);
   setcookie("username","",time()-7200);
   header("Location: /xiangmu/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/ico" href="/xiangmu/images/icon.ico">
<meta charset="utf-8">
<script src="/xiangmu/script/jquery-1.11.3.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/xiangmu/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="/xiangmu/css/index.css">
<script type="text/javascript" src="/xiangmu/script/bootstrap-datepicker.js"></script>
<link type="text/css" rel="stylesheet" href="/xiangmu/css/datepicker.css">
	<title>欢迎使用本系统</title>
</head>
<body style="width:980px;margin-left:auto;margin-right:auto;">
<script type="text/javascript">
$(function(){
    $(".btn-group .dropdown-toggle").click(function(){
        $(".btn-group .dropdown-menu").toggle();
    });

    $(".dropdown .dropdown-toggle").click(function(){
        $(".dropdown .dropdown-menu").toggle();
    });

    $(".dropdown-own .dropdown-toggle").click(function(){
        $(".dropdown-own .dropdown-menu").toggle();
    });
    $(".main .main_logo .out_system").on("click",function(){
        window.location.href='/xiangmu/login.php';
    });
    
    

 });

</script>

<div class="main">
<div class="main_logo">
    <div class="out_system btn btn-default" id="#out_system">
        安全退出
    </div>
        <img src="/xiangmu/images/logo.png">
    </div>
    <div class="dropdown-own-one">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <a href="/xiangmu/system.php" class="first_page">首页</a>
         </button>
    </div>
    <div class="btn-group">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           报检管理 <span class="caret"></span>
         </button>
         <ul class="dropdown-menu">
            <li><a href="/xiangmu/index.php" class="new_form">新建报检</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/xiangmu/php/formpage.php?p=1" class="put_up">编辑提交</a></li>
         </ul>
    </div>
    <div class="dropdown">
         <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            化验管理
            <span class="caret"></span>
         </button>
         <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">制样部化验现场</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">制样部化验结果核准发布</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">化验现场</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">化验结果核准发布</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/xiangmu/device.php">设备管理</a></li>
         </ul>
    </div>
 
   <div class="dropdown-own">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            实检重量 <span class="caret"></span>
         </button>
         <ul class="dropdown-menu">
            <li><a href="#">检重量确定</a></li>
         </ul>
    
   </div>
   <div class="now_time">
   <?php
    echo $_COOKIE['username'];
   ?>
   ，欢迎您&nbsp;&nbsp;&nbsp;&nbsp;
     today：
   	 <?php
        date_default_timezone_set("PRC");
        echo date("Y年m月d日"); 
   	 ?>
   </div>
   </div>