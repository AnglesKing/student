<?php include "head.php";
$id=empty($_POST['id'])?null:$_POST['id'];
$xsid=empty($_POST['xsid'])?null:$_POST['xsid'];
$kcid=empty($_POST['kcid'])?null:$_POST['kcid'];
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
$sql="SELECT * FROM student INNER JOIN xuanxiu ON student.学号=xuanxiu.学号 WHERE student.学号='{$xsid}' and xuanxiu.课程编号='{$kcid}' or student.姓名='{$id}' and xuanxiu.课程编号='{$kcid}';";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close( $conn );
?>
<div class="sui-layout">
  	<div class="content">
		<table class="sui-table table-primary">
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>课程编号</th>
				<th>成绩</th>
			</tr>
			<?php // 输出数据
				if(mysqli_num_rows($result) > 0){
					// mysqli_fetch_assco()从结果集中取得一行作为关联数组,如果结果集中没有更多行则返回null
					while ($row=mysqli_fetch_assoc($result)) {
						echo "<tr><td>{$row['学号']}</td><td>{$row['姓名']}</td><td>{$row['课程编号']}</td><td>{$row['成绩']}</td></tr>";
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
<?php include("foot.php") ?>