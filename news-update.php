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
$sql="SELECT * FROM news WHERE id='{$kid}'";
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
	<p class="sui-text-xxlarge my-padd">新闻修改</p>
		<form action="news-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
		    	<label for="title" class="control-label">标题：</label>
		    	<div class="controls">
		    	<input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
		    	<input type="hidden" name="action" value="update">
		      		<input type="text" name="title" id="title" class="input-large input-fat" placeholder="输入新闻标题" data-rules="required|minlength=1|maxlength=50" value="<?php echo $row['标题'] ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="kicker" class="control-label">肩题：</label>
		    	<div class="controls">
		      		<input type="text" name="kicker" id="kicker" class="input-large input-fat" placeholder="输入新闻肩题" data-rules="required|minlength=1|maxlength=50" value="<?php echo $row['肩题']; ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="file" class="control-label">图片：</label>
		    	<div class="controls">
		      		<input type="file" name="file" id="photo" class="input-large input-fat">
		      		<img width="80" height="150" src="<?php echo $row['图片']; ?>" alt="<?php echo $row['标题']; ?>" title="<?php echo $row['标题'] ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="writer" class="control-label">作者：</label>
		    	<div class="controls">
		    	
		    		<input type="hidden" name="writer" id="writer" class="input-large input-fat" value="<?php echo $row['id'];  ?>">
		      		<input type="text" name="" id="" class="input-large input-fat" placeholder="输入新闻作者" data-rules="required|minlength=1|maxlength=50" value="<?php echo $_SESSION['usname']; ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">栏目：</label>
				<div class="controls">
	 				<select name="columnid"><?php
				    	$sql = 'select * from columns';
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
				    		echo "<option value='{$arr['id']}'>{$arr['name']}</option>";
				    	}
					?></select>
				</div>
			</div>
			<div class="control-group">
				<label for="times" class="control-label">发布时间：</label>
				<div class="controls">
					<input type="text" name="times" id="times" class="input-large input-fat" placeholder="输入发布时间" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s'); ?>"  data-toggle="datepicker">
				</div>
			</div>
			<div class="control-group">
		    	<label for="createtimes" class="control-label">创建时间：</label>
		    	<div class="controls">
		      		<input type="text" name="createtimes" id="createtimes" class="input-large input-fat" placeholder="输入发布时间" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="count" class="control-label">内容: </label>
		    	<div class="controls">
		      		<textarea name="count" id="count" cols="30" rows="10"><?php echo $row['内容']; ?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="submit" class="control-label"></label>
				<div class="controls">
					<input type="submit" id="submit" class="sui-btn btn-xlarge btn-primary" value="修改完成">
				</div>
			</div>	  
		</form>
	</div>
</div>
</div>
<?php include("foot.php") ?>
