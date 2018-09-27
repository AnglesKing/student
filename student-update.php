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
$sql="select * from student where id='{$kid}'";
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
<?php include "head.php" ?>

  	<div class="content">
<p class="sui-text-xxlarge my-padd">学生信息修改</p>
		<form action="student-save.php" id="form1"  class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="kcName" class="control-label">学号：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input区分新建数据与修改数据 -->
		   			<input type="hidden" name="action" value="update">
                	<!-- 增加一个隐藏的input 保存课程编号 -->
                	<input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
				    <input type="text" id="xsid" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10" name="xsid" value="<?php echo $row['学号']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班号：</label>
				<div class="controls">
				    <select name="clsid"><?php 
				    	$sql = 'select 班号 from banji;';
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
				<label for="jiaoshi" class="control-label">姓名：</label>
				<div class="controls">
				    <input type="text" id="jiaoshi" class="input-large input-fat"  placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10" name="id" value="<?php echo $row['姓名']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="file" class="control-label">照片: </label>
				<div class="controls">
					<input type="file" name="file"/>
					<img width="80" height="150" src="<?php echo $row['照片']; ?>" alt="">
				</div>
			</div>
			<div class="control-group">
				<label for="xingbie" class="control-label">性别：</label>
				<div class="controls">
				     <label class="radio-pretty inline <?php if($row['性别']==1) echo 'checked'; ?>"><input type="radio" name="radio" value="1" checked="checked"><span>男</span></label>
				    <label class="radio-pretty inline <?php if($row['性别']==0) echo 'checked'; ?>"><input type="radio" name="radio" value="0"><span>女</span></label>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">出生日期：</label>
				<div class="controls">
				    <input type="text" name="cstime" id="shengri" class="input-large input-fat" data-toggle="datepicker" value="<?php echo $row['出生日期']; ?>">
				</div>
			</div>	
			<div class="control-group">
				<label for="phone" class="control-label">电话：</label>
				<div class="controls">
				    <input type="text" id="phone" name="tel" class="input-large input-fat"  placeholder="输入电话" data-rules="required|minlength=2|maxlength=20" value="<?php echo $row['电话']; ?>">
				</div>
			</div>				  		  
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
				  	<input type="submit" value="提交" name="" class="sui-btn btn-xlarge btn-primary">
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