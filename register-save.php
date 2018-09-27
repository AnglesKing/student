<?php 
$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$question = $_POST["question"];
$answer = $_POST["answer"];
$url = "logoin.php";
$sql="insert into user(email,name,password,question,answer) values('{$email}','{$name}','{$password}','{$question}','{$answer}')";
?>
<?php include "inconn.php"; ?>
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
$email=$_GET['email'];
$sql = "SELECT * FROM user WHERE email='{$email}'";
$result = mysqli_query($conn,$sql);
// 如果查找的记录有一条,说明此email已经被注册过了
if(mysqli_num_rows($result)>0){
	echo "error";
}else{
	echo "ok";
}

 ?>