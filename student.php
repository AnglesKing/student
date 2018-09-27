<?php include "head.php" ?>

  	<div class="content">
		<p class="sui-text-xxlarge my-padd">学生信息录入</p>
		<form action="student-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
		  	<div class="control-group">
		    	<label for="xuehao" class="control-label">学号：</label>
		    	<div class="controls">
		      		<input type="text" name="xsid" id="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="banhao" class="control-label">班号：</label>
				<div class="controls">
				    <select name="clsid"><?php 
				    	$sql = 'select 班号 from banji';
				    	// 创建连接 
						$conn = mysqli_connect("localhost","root","");
						
						if( $conn ){
							echo "连接成功!<br/>";
						}else{
							die( "连接失败".mysqli_connect_error() );
						}
						// 选择要操作的数据库
						mysqli_select_db($conn,"pposms");
						// 设置读取数据库的编码,不然汉字显示乱码
						mysqli_query($conn,"set names utf8");
						// 执行SQL语句
						$result = mysqli_query($conn,$sql);
				    	while ($arr=mysqli_fetch_assoc($result)){
				    		echo "<option>{$arr['班号']}</option>";
				    	}
				    ?></select>
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">姓名：</label>
				<div class="controls">
				    <input type="text" name="id" id="xingming" class="input-large input-fat"  placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="shengri" class="control-label">照片: </label>
				<div class="controls">
				    <input type="file" name="file" id="photo" class="input-large input-fat">
				</div>
			</div>
			<div class="control-group">
				<label for="shengri" class="control-label">出生日期：</label>
				<div class="controls">
				    <input type="text" name="cstime" id="shengri" class="input-large input-fat"  data-toggle="datepicker">
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">性别：</label>
				<div class="controls">
				    <label class="radio-pretty inline checked"><input type="radio" checked="checked" name="radio" value="1"><span>男</span></label>
				    <label class="radio-pretty inline"><input type="radio" name="radio" value="0"><span>女</span></label>
				</div>
			</div>	
			<div class="control-group">
				<label for="phone" class="control-label">电话：</label>
				<div class="controls">
				    <input type="text" id="phone" name="tel" class="input-large input-fat"  placeholder="输入电话" data-rules="required|minlength=2|maxlength=20">
				</div>
			</div>				  
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
				  	<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
				</div>
			</div>	  
		</form>
	</div>
</div>
</div>
	<?php include("foot.php") ?>
	<script>
	// 验证手机号
	function isPhoneNo(phone) { 
 		var reg = /^1[34578]\d{9}$/; 
 		return reg.test(phone); 
	}
	$("input#phone").on("blur",function(){
		if(isPhoneNo($.trim($('#phone').val()) == false)) {
  			alert('请输入有效电话号码!');
  		}
  	})
	</script>	