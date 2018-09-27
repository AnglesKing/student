<?php include "head.php" ?>
  	<div class="content">
		<p class="sui-text-xxlarge my-padd">班级信息录入</p>
		<form action="banji-save.php" id="form1"  class="sui-form form-horizontal sui-validate" method="post">
			<div class="control-group">
				<label for="kcName" class="control-label">班号：</label>
				<div class="controls">
				    <input type="text" id="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10" name="clsid">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">班长：</label>
				<div class="controls">
				    <input type="text" id="banzhang" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10"  name="clsled">
				</div>
			</div>
			<div class="control-group">
				<label for="jiaoshi" class="control-label">教室：</label>
				<div class="controls">
				    <input type="text" id="jiaoshi" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10" name="clsroom">
				</div>
			</div>
			<div class="control-group">
				<label for="banzhuren" class="control-label">班主任：</label>
				<div class="controls">
				    <input type="text" id="banzhuren" class="input-large input-fat"  placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=10" name="bzr">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">口号：</label>
				<div class="controls">
					<textarea rows="3" name="clskh" class="input-block-level"></textarea >
				</div>
			</div>			  
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
				  	<input type="submit" value="提交" name="" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>	  
		</form>
	</div>
</div>
</div>
<?php include("foot.php") ?>
<script>
	console.log(document.cookie);
	var str = document.cookie;
	console.log(str.split(";")[0].split("=")[1]);
	// /用正则表达式
	function getCookie(name){
		
	}
</script>