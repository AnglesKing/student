<?php
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
if($kid=="null"){
	die ("请选择要修改的记录");
}else{
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功!')</script>";
}else{
	die( "<script>console.log('连接失败')</script>".mysqli_connect_error() );
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$kid}'";
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
<p class="sui-text-xxlarge my-padd">班级信息修改</p>
		<form action="banji-save.php" id="form1"  class="sui-form form-horizontal sui-validate" method="post">
			<div class="control-group">
				<label for="kcName" class="control-label">班号：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input区分新建数据与修改数据 -->
		   			<input type="hidden" name="action" value="update">
                	<!-- 增加一个隐藏的input 保存课程编号 -->
                	<input type="hidden" name="kid" value="<?php echo $row['班号']; ?>">
				    <input type="text" id="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10" name="clsid" value="<?php echo $row['班号']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班长：</label>
				<div class="controls">
				    <input type="text" id="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10"  name="clsled" value="<?php echo $row['班长']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="jiaoshi" class="control-label">教室：</label>
				<div class="controls">
				    <input type="text" id="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10" name="clsroom" value="<?php echo $row['教室']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="banzhuren" class="control-label">班主任：</label>
				<div class="controls">
				    <input type="text" id="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10" name="bzr" value="<?php echo $row['班主任']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">口号：</label>
				<div class="controls">
					<textarea rows="3" name="clskh" class="input-block-level"><?php echo $row['班级口号']; ?></textarea>
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