<?php include "head.php" ?>
  	<div class="content">
		<p class="sui-text-xxlarge my-padd">成绩录入</p>
		<form action="chengji-save.php" id="form1" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
		   		<label for="inputEmail" class="control-label">学号：</label>
		   		<div class="controls">
		    		<input class="input-large input-fat" type="text" placeholder="请输入学号" data-rules='required|minlength=2|maxlength=10' name="xsid">
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
					 <input class="input-large input-fat" type="text" id="kcTime" placeholder="请输入成绩" name="cj">
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