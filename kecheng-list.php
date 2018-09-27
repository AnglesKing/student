<?php include "head.php";
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功!')</script>";
}else{
die( "<script>console.log('连接失败')</script>".mysqli_connect_error() );}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="select 课程编号,课程名,时间 from kecheng";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close( $conn );
?>

  	<div class="content">
		<table class="sui-table table-primary">
			<tr>
				<th>课程编号</th>
				<th>课程名</th>
				<th>课程时间</th>
				<th>操作</th>
			</tr>
			<?php // 输出数据
				if(mysqli_num_rows($result) > 0){
					// mysqli_fetch_assco()从结果集中取得一行作为关联数组,如果结果集中没有更多行则返回null
					while ($row=mysqli_fetch_assoc($result)) {
						echo "<tr><td>{$row['课程编号']}</td><td>{$row['课程名']}</td><td>{$row['时间']}</td><td><a class='sui-btn btn-xlarge btn-info' href='kecheng-update.php?kid={$row['课程编号']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-xlarge btn-warning' href='kecheng-del.php?kid={$row['课程编号']}'>删除</a></td></tr>";}	
				}else{
						echo "没有记录";
				}

				if($result){
					echo "<script>console.log('操作成功!')</script>";
				}else{
					echo "<script>console.log('操作失败!')</script>";
				} 
			?>
		</table>
	</div>
</div>
</div>
<?php include("foot.php") ?>