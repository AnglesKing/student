</div>
</body>
</html>
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script src="template-web.js"></script>
<script>
	$(function(){
		console.log($(".level1>a"));
		$(".level1>a").on("click",function(){
			$(this).addClass("current")//给当前元素添加"current"样式
			.next().show()//下一个元素显示
			.parent().siblings().children("a").removeClass("current")//父元素的兄弟元素的子元素<a>,移除上面找到的所有<a>的current样式
			//上面所有<a>的下一个元素隐藏
			.next().hide();
			// 获取当前li标签在兄弟中的序号
			document.cookie="menuState="+$(this).parent().index()+";";
			return false;
		});
	});
	// 读取菜单状态cookie
	// 用正则表达式
	var menuState = getCookie("menuState");
	$(".box .menu>li").eq(menuState).find("ul").show();
	function getCookie(name){
		var arr;var reg= new RegExp("(^|)"+name+"=([^;])(;|$)");
		if (arr=document.cookie.match(reg)) {
			return unescape(arr[2]);
		}else{
			return null;
		}
	}
</script>
