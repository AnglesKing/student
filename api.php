<?php
include "conn.php";
$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];

$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功"
);
switch ($action) {
	case 'student':
		$sql = "select * from ".$action;
		$result = mysqli_query($conn, $sql);
		if( mysqli_num_rows($result)>0 ){
			$stdentlist = array();
			while( $row = mysqli_fetch_assoc($result) ){
				$stdentlist[]= $row;
			}
			//var_dump($stdentlist);
			$responseArr["data"] = $stdentlist;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die( json_encode($responseArr) );
		break;
	case 'banji':
		# code...
		break;	
	default:
		echo "请指定正确的参数";
		break;
}
?>