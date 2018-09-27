<?php
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
if($kid=="null"){
	die ("请选择要修改的记录");
}else{
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功')</script>";
}else{
	echo "<script>console.log('连接失败')</script>".mysqli_connect_error() ;
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select * from user where id='{$kid}'";
$result = mysqli_query($conn,$sql);
// 输出数据
if(mysqli_num_rows($result) > 0){
	// 将查询的结果转换成数组
	$row=mysqli_fetch_assoc($result);
}else{
	echo "找不到这条记录";
}
// 关闭数据连接
mysqli_close( $conn );
}
?>
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
		<form action="vip-save.php" class="sui-form form-horizontal sui-validate" id="formf" method="post">
  			<div class="control-group">
    			<label for="email" class="control-label">用户邮箱：</label>
    			<div class="controls">
    			<input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
      			<input type="text" id="email" name="email" class="input-large input-fat" placeholder="请输入用户邮箱" data-rules="required|email|minlength=8" value="<?php echo $row['email']; ?>">
            <div class="sui-msg msg-naked msg-error tip">
              <i class="msg-icon"></i>
              <div class="msg-con">该邮箱已注册!</div>
            </div>
				  </div>
  			</div>
  			<div class="control-group">
  				<label for="name" class="control-label">用户名：</label>
    			<div class="controls">
      				<input type="text" id="names" name="names" class="input-large input-xfat" placeholder="请输入用户名" data-rules="required|minlength=2|maxlength=6" value="<?php echo $row['name']; ?>">
    			</div>
  			</div>
  			<div class="control-group">
    			<label for="password" class="control-label">密码：</label>
    			<div class="controls">
      				<input type="password" id="password" name="password" class="input-large input-xfat" placeholder="请输入密码" data-rules="required|minlength=6|maxlength=15" value="<?php echo $row['password']; ?>">
    			</div>
  			</div>
  			<div class="control-group">
    			<label for="repassword" class="control-label">重复密码：</label>
    			<div class="controls">
      				<input type="password" id="repassword" name="repassword" class="input-large input-xfat" placeholder="重复密码" data-rules="required|match=password">
    			</div>
  			</div>
  			<div class="control-group">
    			<label for="identifying" class="control-label">验证码: </label>
    			<div class="controls">
      				<input type="text" id="identifying" name="identifying" class="input-medium input-xfat" placeholder="请输入验证码" data-rules="required|minlength=4|maxlength=4">
      				<a href="" class="sui-btn btn-bordered btn-xlarge btn-success" id="ifg"><?php 
              			$characters = '0123456789abcdefghijklmnopqrstuvwxyz'; 
              			$randomString = ''; 
              			for ($i = 0; $i < 4; $i++) { 
              			$randomString .= $characters[rand(0, strlen($characters) - 1)]; 
              			} 
              			echo $randomString;
             		?></a>
             		<div class="sui-msg msg-naked msg-error tip">
             		 	<i class="msg-icon"></i>
        				<div class="msg-con">错误</div>
      				</div>
    			</div>
  			</div>
  			<div class="control-group">
  				<label for="question" class="control-label">密码提示问题: </label>
  				<div class="controls">
  					<select name="question" id="question" class="input-large input-xfat">
  						<option value="你的小学在哪里上?">你的小学在哪里上?</option>
  						<option value="你的最好的朋友的姓名?">你的最好的朋友的姓名?</option>
  						<option value="你的最有纪念的日期?">你的最有纪念的日期?</option>
  					</select>
  				</div>
  			</div>
  			<div class="control-group">
  				<label for="answer" class="control-label">密码答案: </label>
  				<div class="controls">
  					<input type="text" id="answer" name="answer" class="input-large input-xfat" data-rules="required" value="<?php echo $row['answer']; ?>">
  				</div>
  			</div>
  			<div class="control-group">
  				<label for="answer" class="control-label"></label>
				<div class="controls">
					<input type="submit" value="更改完成" name="submit" class="sui-btn btn-xlarge btn-primary" id="submit">
				</div>
			</div>
  	</form>
  </div>
<?php include "foot_01.php"; ?>