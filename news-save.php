<?php 
$title = $_POST['title'];
$kid = $_POST['kid'];
$kicker = $_POST['kicker'];
$writer = $_POST['writer'];
$times = $_POST['times'];
$columnid = $_POST['columnid'];
$createtimes = $_POST['createtimes'];
$count = $_POST['count'];
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "video/mp4") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 10241000)) {
	if ($_FILES["file"]["error"] > 0) {
    	echo "错误: " . $_FILES["file"]["error"] . "<br />";
    } else {
    	// 重新给上传的文件命名,增加一个年月日时分秒的前缀,并且加上保存路径
    	$filename="upload/".date("YmdHis").$_FILES['file']['name'];
    	//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		
    	echo "文件名: " . $_FILES["file"]["name"] . "<br />";
    	echo "文件类型: " . $_FILES["file"]["type"] . "<br />";
    	echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    	echo "暂存目录: " . $_FILES["file"]["tmp_name"]. "<br />";
    }
} else {
  	echo "您上传的文件不符合要求!";
}

// 如果是录入页面提交的,那么$action等于add
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action=="add"){
	$url = "news.php";
	$sql="insert into news(标题,肩题,图片,发布时间,创建时间,内容,userid,columnid) values('$title','$kicker','$filename','$times','$createtimes','$count','$writer','$columnid')";
}else if($action=="update"){
    $url= "newsManage.php";
    $sql="update news set 标题='{$title}',肩题='{$kicker}',图片='{$filename}',发布时间='{$times}',创建时间='{$createtimes}',内容='{$count}',userid='{$writer}',columnid='{$columnid}' where id={$kid}";
}else{
	die ("请选择操作方法");
}

?>
<?php include("conn.php") ?>