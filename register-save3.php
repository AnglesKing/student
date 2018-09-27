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
$email=$_POST['email'];
$names=$_POST['names'];
$password=$_POST['password'];
$question=$_POST['question'];
$answer=$_POST['answer'];
$sql = "insert into user(email,name,password,question,answer) values('$email','$names','$password','$question','$answer')";
$result = mysqli_query($conn,$sql);
if($result){
	echo "ok";
}else{
	echo "error";
}
?>