<?php session_start();
 //检测session是否为空,实则跳转到登录
if (empty($_SESSION['usname'])) {
	// header("Refresh:0;url=logoin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>学生管理系统V2.0</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  	<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="sui-container">
	<div class="top">
		<p id="welcome" style="font-size: 18px;text-align: right;">欢迎<span style="color:#e00;"><?php echo $_SESSION['usname']; ?></span>登录成功!&nbsp;&nbsp;<a href="logoin.php">退出-></a></p>
	</div>
	<div class="contents">
	  	<div class="sui-layout">
	  		<div class="sidebar"><?php include "leftmenu.php"; ?></div>
	  		<div class="content">
	  			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统:)</p>
				<?php
				$sql = "select * from news join columns on news.columnid = columns.id";
				   // 创建连接 
				$conn = mysqli_connect("localhost","root","");
				
				// 选择要操作的数据库
				mysqli_select_db($conn,"pposms");
				// 设置读取数据库的编码,不然汉字显示乱码
				mysqli_query($conn,"set names utf8");
				// 执行SQL语句
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result) > 0){
				while ($row=mysqli_fetch_assoc($result)){
					echo "<li style='float:left;margin-left:170px;margin-top:20px;font-size:16px;overflow:hidden;width:300px;height:255px;'><a href='newscount.php?kid={$row['id']}'>
								<img src='{$row["图片"]}' style='width:300px;height:200px;'>
								<p style='color:orange;'><span>{$row['发布时间']}</span>|<span>{$row['name']}</span></p>
								<p style='font-size:20px;font-weight:800;'>{$row['标题']}</p>
								<p>{$row['内容']}</p>
						</a></li>";
				}
				echo "<div style='clear:both;height:0px;line-height:0;margin:0;'></div>";
				}else{
					echo "没有记录!";
				}
				mysqli_close($conn);
	  			?>		
	  		</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
	$(function(){
		// console.log($(".level1>a"));
		$(".level1>a").on("click",function(){
			$(this).addClass("current")//给当前元素添加"current"样式
			.next().show()//下一个元素显示
			.parent().siblings().children("a").removeClass("current")//父元素的兄弟元素的子元素<a>,移除上面找到的所有<a>的current样式
			//上面所有<a>的下一个元素隐藏
			.next().hide();
			// 获取当前li标签在兄弟中的序号
			document.cookie="menuNum="+$(this).parent().index()+";";
			return false;
		});
	});
	// console.log(document.cookie);
	var menuNum=document.cookie.substr(8,1);
	// console.log(menuNum);
	// 找到对应序号的li,在查找li中的ul标签,让其显示
	$(".box .menu>li").eq(menuNum).find("ul").show();
	$(".box .menu>li").eq(menuNum).children("a:eq(0)").addClass("current");
</script>