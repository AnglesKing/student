<?php
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
$sid = empty($_GET['sid'])?"null":$_GET['sid'];
if($kid=="null"){
	die ("请选择要修改的记录");
}else{
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功')</script>";
}else{
	die( "连接失败".mysqli_connect_error() );
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select 学号,课程编号,成绩 from xuanxiu where 学号={$kid} and 课程编号={$sid}";
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
		<p class="sui-text-xxlarge my-padd">成绩修改</p>
		<form action="chengji-save.php" id="form1" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
		   		<label for="inputEmail" class="control-label">学号：</label>
		   		<div class="controls">
		   			<!-- 增加一个隐藏的input区分新建数据与修改数据 -->
		   			<input type="hidden" name="action" value="update">
                	<!-- 增加一个隐藏的input 保存课程编号 -->
                	<input type="hidden" name="kid" value="<?php echo $row['学号']; ?>">
                	<input type="hidden" name="sid" value="<?php echo $row['课程编号']; ?>">
		    		<select name="xsid" id=""><?php 
				    	$sql = 'select 学号 from student';
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
				    		echo "<option>{$arr['学号']}</option>";
				    	}
				    ?>
		    			
		    		</select>
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程编号：</label>
				<div class="controls">
 				<select name="kcid"><?php
				    	$sql = 'select 课程编号,课程名 from kecheng';
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
				    		echo "<option value='{$arr['课程编号']}'>{$arr['课程名']}</option>";
				    	}
					?></select>
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">成绩：</label>
				<div class="controls">
					 <input class="input-large input-fat" type="text" id="cj" placeholder="请输入成绩" name="cj" value="<?php echo $row['成绩']; ?>">
				</div>
			</div>
			<div class="control-group">
				<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
				  	<input type="submit" value="完成" name="" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>
			</div>
		</form>
	</div>
</div>
</div>
<?php include("foot.php") ?>