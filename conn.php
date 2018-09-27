<?php
// 创建连接 
$conn = mysqli_connect("localhost","root","");


// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('操作成功')</script>";
	header ("Refresh:1;url=$url");
}else{
	echo "<script>alert('操作失败')</script>".mysqli_error($conn); 
}
?>
