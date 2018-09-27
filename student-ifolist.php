<?php include "head.php";
$id=empty($_POST['id'])?'null':$_POST['id'];
$xsid=empty($_POST['xsid'])?'null':$_POST['xsid'];
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功')</script>";
}else{
	die( "<script>console.log('连接失败')</script>".mysqli_connect_error() );
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="SELECT * FROM student INNER JOIN banji ON student.班号=banji.班号 INNER JOIN xuanxiu ON student.学号=xuanxiu.学号 WHERE student.学号='{$xsid}' or student.姓名='{$id}';";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close( $conn );
?>

  	<div class="content">
		<table class="sui-table table-primary">
			<tr>
				<th>学号</th>
				<th>班号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>出生日期</th>
				<th>联系电话</th>
				<th>课程编号</th>
				<th>成绩</th>
				<th>班长</th>
				<th>班主任</th>
				<th>班级口号</th>
			</tr>
			<?php // 输出数据
				if(mysqli_num_rows($result) > 0){
					// mysqli_fetch_assco()从结果集中取得一行作为关联数组,如果结果集中没有更多行则返回null
					while ($row=mysqli_fetch_assoc($result)) {
						$sex = $row["性别"]==0?"女": "男"; 
						echo "<tr><td>{$row['学号']}</td><td>{$row['班号']}</td><td>{$row['姓名']}</td><td>".$sex."</td><td>{$row['出生日期']}</td><td>{$row['电话']}</td><td>{$row['课程编号']}</td><td>{$row['成绩']}</td><td>{$row['班长']}</td><td>{$row['班主任']}</td><td>{$row['班级口号']}</td>";
					}	
				}else{
					echo "<tr><td>没有记录!</td></tr>";
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