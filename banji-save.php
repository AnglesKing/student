<?php 
$clsid=strtolower($_POST["clsid"]);
$clsled= $_POST["clsled"];
$clsroom=$_POST["clsroom"];
$bzr = $_POST["bzr"];
$clskh=$_POST["clskh"];
// 判断提交页面
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action=="add"){
	$url = "banji.php";
	$sql="insert into banji(班号,班长,教室,班主任,班级口号) values('$clsid','$clsled','$clsroom','$bzr','$clskh')";
}else if($action=="update"){
	$url="banji-list.php";
	$kid= $_POST["kid"];
	$sql="update banji set 班号='{$clsid}',班长='{$clsled}',教室='{$clsroom}',班主任='{$bzr}',班级口号='{$clskh}' where 班号='{$kid}';";
}else{
	die ("请选择操作方法");
}
?>
<?php include("conn.php") ?>