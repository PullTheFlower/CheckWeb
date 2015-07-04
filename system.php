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
	<title>欢迎来到管理员系统</title>
</head>
<body>
<div class="main">
	<div class="main_logo">
    <div class="out_system btn btn-default">
        安全退出
    </div>
        <img src="images/logo.png">
    </div>
    <div class="dropdown-own-one">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           首页
         </button>
    </div>
    <div class="btn-group">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           报检管理 <span class="caret"></span>
         </button>
         <ul class="dropdown-menu">
            <li><a href="#" class="new_form">新建报检</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" class="put_up">编辑提交</a></li>
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
     today：
   	 <?php
        date_default_timezone_set("PRC");
        echo date("Y-m-d"); 
   	 ?>
   </div>
   <div id="show">
       
   </div>
</div>
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
    $("a.new_form").click(function(){
        $("#show").load("index.html");
    });
        $("#show").load("welcome.html");
    $(".dropdown-own-one .dropdown-toggle").on("click",function(){
        $("#show").load("welcome.html");
    });
    $("a.put_up").on("click",function(){
        $("#show").load("formlist.html");
    });
    $("div.footer_close").on("click",function(){
            $("#show").load("welcome.html");
    });
 });

</script>

</body>
</html>