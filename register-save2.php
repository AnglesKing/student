<?php
$conn = mysqli_connect("localhost","root","");
if( $conn ){
	// echo "连接成功!";
}else{
	echo "连接失败".mysqli_connect_error();
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$email=$_REQUEST['email'];
$sql = "SELECT * FROM user WHERE email='{$email}'";
$result = mysqli_query($conn,$sql);
// 如果查找的记录有一条,说明此email已经被注册过了
if(mysqli_num_rows($result)>0){
	echo "error";
}else{
	echo "ok";
}
?>