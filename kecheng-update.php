<?php
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
if($kid=="null"){
	die ("请选择要修改的记录");
}else{
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "连接成功!";
}else{
	die( "连接失败".mysqli_connect_error() );
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select 课程编号,课程名,时间 from kecheng where 课程编号={$kid}";
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
<p class="sui-text-large">课程修改</p>
		<form action="kecheng-save.php" id="form1" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
		   		<label for="inputEmail" class="control-label">课程名：</label>
		   		<div class="controls">
		   			<!-- 增加一个隐藏的input区分新建数据与修改数据 -->
		   			<input type="hidden" name="action" value="update">
                	<!-- 增加一个隐藏的input 保存课程编号 -->
                	<input type="hidden" name="kid" value="<?php echo $row['课程编号']; ?>">
		    		<input class="input-large input-fat" type="text" value="<?php echo $row['课程名']; ?>"  id="kcName" placeholder="请输入课程名称" data-rules='required|minlength=2|maxlength=10' name="kcName">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程时间：</label>
				<div class="controls">
					 <input class="input-large input-fat" type="text" id="kcTime" value="<?php echo $row['时间']; ?>" data-toggle="datepicker" placeholder="请输入课程时间" name="kcTime">
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