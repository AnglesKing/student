<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>密码找回</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  	<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="forget-content">
		<form action="logoin-save.php" class="sui-form form-horizontal sui-validate" id="formf" method="post">
			<div class="control-group">
    			<label for="email" class="control-label">用户邮箱：</label>
    			<div class="controls">
    				<input type="hidden" name="page" value="forget">
      				<input type="text" id="email" name="email" class="input-large input-xfat" placeholder="请输入用户邮箱" data-rules="required|email|minlength=8">
				</div>
			</div>
			<div class="control-group">
    			<label for="password" class="control-label">设置密码：</label>
    			<div class="controls">
      				<input type="password" id="password" name="password" class="input-large input-xfat" placeholder="请输入新密码" data-rules="required|minlength=6|maxlength=15">
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
  					<input type="text" id="answer1" name="answer" class="input-large input-xfat" data-rules="required" value="">
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
  				<label for="submit" class="control-label"></label>
				<div class="controls">
					<input type="submit" value="登录" name="submit" class="sui-btn btn-xlarge btn-primary" id="submit">
				</div>
			</div>
		</form>
	<?php include "foot_01.php"; ?>