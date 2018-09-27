<?php 
$kcName = $_POST["kcName"];
$kcTime = $_POST["kcTime"];
echo $kcName;
// 如果是录入页面提交的,那么$action等于add
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action=="add"){
	$url = "kecheng.php";
	$sql="insert into kecheng(课程名,时间) values('$kcName','$kcTime')";
}else if($action=="update"){
	$url="kecheng-list.php";
	$kid= $_POST["kid"];
	$sql="update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号='{$kid}'";
}else{
	die ("请选择操作方法");
}

?>
<?php include("conn.php") ?>