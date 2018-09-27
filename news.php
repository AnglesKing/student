 <?php include "head.php"; ?>
 
<?php 
// 创建连接 
$conn = mysqli_connect("localhost","root","");
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
$sql="select * from user where email='{$_SESSION['usname']}';";
$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
 ?>
	<div class="content">
		<p class="sui-text-xxlarge my-padd">新闻发布</p>
		<form action="news-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
		    	<label for="title" class="control-label">标题：</label>
		    	<div class="controls">
		      		<input type="text" name="title" id="title" class="input-large input-fat" placeholder="输入新闻标题" data-rules="required|minlength=1|maxlength=50">
				</div>
			</div>
			<div class="control-group">
		    	<label for="kicker" class="control-label">肩题：</label>
		    	<div class="controls">
		      		<input type="text" name="kicker" id="kicker" class="input-large input-fat" placeholder="输入新闻肩题" data-rules="required|minlength=1|maxlength=50">
				</div>
			</div>
			<div class="control-group">
		    	<label for="file" class="control-label">图片：</label>
		    	<div class="controls">
		      		<input type="file" name="file" id="photo" class="input-large input-fat">
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
		    	<label for="createtimes" class="control-label">创建时间：</label>
		    	<div class="controls">
		      		<input type="text" name="createtimes" id="createtimes" class="input-large input-fat" placeholder="输入新闻作者" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s') ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="times" class="control-label">发布时间：</label>
		    	<div class="controls">
		      		<input type="text" name="times" id="times" class="input-large input-fat" placeholder="输入新闻发布时间" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s',time()); ?>"  data-toggle="datepicker">
				</div>
			</div>
			<div class="control-group">
		    	<label for="count" class="control-label">内容: </label>
		    	<div class="controls">
		      		<textarea name="count" id="count" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="submit" class="control-label"></label>
				<div class="controls">
					<input type="submit" id="submit" class="sui-btn btn-xlarge btn-primary" value="发布">
				</div>
			</div>
		</form>
<?php include "foot.php"; ?>