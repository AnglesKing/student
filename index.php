<?php include "head_01.php"; ?>
  		<form action="register-save.php" class="sui-form form-horizontal sui-validate" id="formf" method="post">
  			<div class="control-group">
    			<label for="email" class="control-label">用户邮箱：</label>
    			<div class="controls">
      			<input type="text" id="email" name="email" class="input-large input-xfat" placeholder="请输入用户邮箱" data-rules="required|email|minlength=8">
            <div class="sui-msg msg-naked msg-error" id="wrong">
              <i class="msg-icon"></i>
              <div class="msg-con">该邮箱已注册!</div>
            </div>
				  </div>
  			</div>
  			<div class="control-group">
  				<label for="name" class="control-label">用户名：</label>
    			<div class="controls">
      				<input type="text" id="names" name="names" class="input-large input-xfat" placeholder="请输入用户名" data-rules="required|minlength=2|maxlength=6" value="">
    			</div>
  			</div>
  			<div class="control-group">
    			<label for="password" class="control-label">密码：</label>
    			<div class="controls">
      				<input type="password" id="password" name="password" class="input-large input-xfat" placeholder="请输入密码" data-rules="required|minlength=6|maxlength=15">
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
  					<input type="text" id="answer" name="answer" class="input-large input-xfat" data-rules="required">
  				</div>
  			</div>
  			<div class="control-group">
  				<label for="answer" class="control-label"></label>
				<div class="controls">
					<input type="button" value="注册" name="submit" class="sui-btn btn-xlarge btn-primary" id="submit">
				</div>
			</div>
  	</form>
  </div>
<?php include "foot_01.php"; ?>
<script>
 $("#wrong").hide();
  var email = document.getElementById('email');
  var names = document.getElementById('names');
  var password = document.getElementById('password');
  var question = document.getElementById('question');
  var answer = document.getElementById('answer');
  $("input[name=email]").on("blur",function(){
    var xhr;
    if (window.XMLHttpRequest){
      xhr=new XMLHttpRequest();
    }else{
      xhr=new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange=function(){
      // readyState一共有四个返回值
      // 1:服务器已连接;2:请求已接收;3:请求处理中;4:请求完成,响应已发送;
      console.log(xhr.readyState);
      if (xhr.readyState == 4&& xhr.status==200) {
        console.log(xhr.responseText);
        if (xhr.responseText=="error") {
          console.log("邮箱已注册!");
          $("#wrong").show();
        }else{
          $("#wrong").hide();
        }
      }
    }
    xhr.open("get","register-save2.php?email="+email.value,true);
    xhr.send();
  })
  $("input[name=submit]").on("click",function(){
    var xhr;
    if (window.XMLHttpRequest){
      xhr=new XMLHttpRequest();
    }else{
      xhr=new ActiveObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange=function(){
      // readyState一共有四个返回值
      // 1:服务器已连接;2:请求已接收;3:请求处理中;4:请求完成,响应已发送;
      console.log(xhr.readyState);
        console.log(xhr.status);
      if (xhr.readyState == 4&& xhr.status==200) {
        console.log(xhr.responseText);
        if (xhr.responseText=="ok") {
          window.location.href = "logoin.php";
        }
      }
    }
    xhr.open("post","register-save3.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("email="+email.value+"&names="+names.value+"&password="+password.value+"&question="+question.value+"&answer="+answer.value);
  })
</script>