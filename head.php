<?php session_start();
 //检测session是否为空,实则跳转到登录
if (empty($_SESSION['usname'])) {
	// header("Refresh:0;url=logoin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  	<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="sui-container">
		<div class="my-head">学生管理系统 V2.0 
			<div class="top" style="float: right;">
				<p id="welcome" style="font-size: 18px;text-align: right;">欢迎<span style="color:#e00;"><?php echo $_SESSION['usname']; ?></span>登录成功!&nbsp;&nbsp;<a href="logoin.php">退出-></a></p>
			</div>
		</div>
	<br/>
	<div class="sui-layout">
  		<div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php") ?>
  		</div>