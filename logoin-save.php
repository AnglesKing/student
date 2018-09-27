<?php 
session_start();
$page = $_POST["page"];
$email = empty($_POST["email"])?null:strtoLower($_POST["email"]);
$password = empty($_POST["password"])?null:strtoLower($_POST["password"]);
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "连接成功!<br>";
}else{
	echo "连接失败".mysqli_connect_error();
}
// 选择要操作的数据库
mysqli_select_db($conn,"pposms");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
if($page == 'logoin'){
	$sql = "select * from user where email='{$email}' and password='{$password}'";
	$url = "logoin-success.php";

}else if($page == 'forget'){
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$sql = "update user set password='{$password}' where email='{$email}' and question='{$question}' and answer='{$answer}'";
	$url = 'logoin-success.php';
};
$result = mysqli_query($conn,$sql);
if($page == 'logoin'){
	if( mysqli_num_rows($result) >0 ){
		$row=mysqli_fetch_assoc($result);
		echo "<script>alert('登陆成功');document.cookie='usname={$email};path=../pposms/;';</script>";
		$_SESSION['usname'] = "{$row['email']}";
		$_SESSION['usid'] = "{$row['id']}";
		header ("Refresh:1;url={$url}");
	}else{
		echo "<script>alert('账户有误,登录失败!')</script>";
		header ("Refresh:1;url='logoin.php'");
	};
}else{
	if( $result ){
		echo "<script>alert('登陆成功');document.cookie='usname={$email};path=../pposms/;';</script>";
		$_SESSION['usname'] = "{$email}";
		header ("Refresh:1;url={$url}");
	}else{
		echo "<script>alert('账户有误,登录失败!')</script>";
		header ("Refresh:1;url='logoin.php'");
	};
}
// 关闭数据连接
mysqli_close( $conn );

?>

