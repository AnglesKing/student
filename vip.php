
<?php include "head.php"; ?>

  	<div class="content">
		<table class="sui-table table-primary">
			<tr>
				<th>id</th>
				<th>邮件</th>
				<th>名字</th>
				<th>密码提示问题</th>
				<th>操作</th>
			</tr>
			<?php 
			// 创建连接 
			$conn = mysqli_connect("localhost","root","");

			if( $conn ){
				echo "<script>console.log('连接成功!<br/>')</script>";
			}else{
				die( "连接失败".mysqli_connect_error() );
			}
			// 选择要操作的数据库
			mysqli_select_db($conn,"pposms");
			// 设置读取数据库的编码,不然汉字显示乱码
			mysqli_query($conn,"set names utf8");
			// 执行SQL语句
			$sql = "SELECT * FROM user";
			$result = mysqli_query($conn,$sql);
			// 输出数据
				if(mysqli_num_rows($result) > 0){
					// mysqli_fetch_assco()从结果集中取得一行作为关联数组,如果结果集中没有更多行则返回null
					while ($row=mysqli_fetch_assoc($result)) {
						echo "<tr><td>{$row['id']}</td><td>{$row['email']}</td><td>{$row['name']}</td><td>{$row['question']}</td><td><a class='sui-btn btn-xlarge btn-info' href='vip-update.php?kid={$row['id']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-xlarge btn-warning' href='vip-delete.php?kid={$row['id']}'>删除</a></td></tr>";
					}	
				}else{
					echo "<script>console.log('没有记录')</script>";
				}
				if($result){
					echo "<script>console.log('操作成功!')</script>";
				}else{
					echo "<script>console.log('操作失败')</script>!"; 
				} 
			?>
		</table>
	</div>
</div>
</div>
<?php include "foot.php"; ?>