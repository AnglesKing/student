<?php 
$kid = $_POST['kid'];
$email = $_POST["email"];
$names = $_POST["names"];
$password = $_POST["password"];
$question = $_POST["question"];
$answer = $_POST["answer"];
$url = "vip.php";
$sql="update user set email='{$email}',name='{$names}',password='{$password}',question='{$question}',answer='{$answer}' where id ='{$kid}' ";
?>
<?php include "conn.php"; ?>
