<?php
$xsid=$_POST['xsid'];
$kcid=$_POST['kcid'];
$cj=$_POST['cj'];
// 如果是录入页面提交的,那么$action等于add
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action=="add"){
	$url = "chengji.php";
	$sql="insert into xuanxiu(学号,课程编号,成绩) values('$xsid','$kcid','$cj')";
}else if($action=="update"){
	$url="chengji-list.php";
	$kid = $_REQUEST["kid"];
	$sid = $_REQUEST["sid"];
	$sql="update xuanxiu set 学号='{$xsid}',课程编号='{$kcid}',成绩='{$cj}' where xuanxiu.学号='{$kid}' and xuanxiu.课程编号='{$sid}';";
}else{
	die ("请选择操作方法");
}
?>
<?php include("conn.php") ?>
