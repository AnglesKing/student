<?php include "head.php";
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功!')</script>";
}else{
	die( "连接失败".mysqli_connect_error() );
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select 班号,班长,教室,班主任,班级口号 from banji";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close( $conn );
?>

  	<div class="content">
		<table class="sui-table table-primary">
			<tr>
				<th>班号</th>
				<th>班长</th>
				<th>教室</th>
				<th>班主任</th>
				<th>班级口号</th>
				<th>操作</th>
			</tr>
			<?php // 输出数据
				if(mysqli_num_rows($result) > 0){
					// mysqli_fetch_assco()从结果集中取得一行作为关联数组,如果结果集中没有更多行则返回null
					while ($row=mysqli_fetch_assoc($result)) {
						echo "<tr><td>{$row['班号']}</td><td>{$row['班长']}</td><td>{$row['教室']}</td><td>{$row['班主任']}</td><td>{$row['班级口号']}</td><td><a class='sui-btn btn-xlarge btn-info' href='banji-update.php?kid={$row['班号']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-xlarge btn-warning' href='banji-del.php?kid={$row['班号']}'>删除</a></td></tr>";
					}	
				}else{
						echo "没有记录";
				}

				if($result){
					echo "<script>console.log('操作成功!')</script>";
				}else{
					echo "操作失败!"; 
				} 
			?>
		</table>
	</div>
</div>
</div>
<?php include("foot.php") ?>