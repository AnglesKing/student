<?php include "head.php" ?>
  	<div class="content">
		<p class="sui-text-xxlarge my-padd">学生信息查询</p>
		<form action="student-ifolist.php" id="form1"  class="sui-form form-horizontal sui-validate" method="post">
			<div class="control-group">
				<label for="kcName" class="control-label">姓名:</label>
				<div class="controls">
				    <input type="text" id="name" class="input-large input-fat" placeholder="输入姓名" data-rules="maxlength=10" name="id">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">学号:</label>
				<div class="controls">
				    <input type="text" id="xsid" class="input-large input-fat"  placeholder="输入学号" data-rules="maxlength=10"  name="xsid">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">
				</label>
					<div class="controls">
					  	<input type="button" value="查询" name="" class="sui-btn btn-xlarge btn-primary">
					</div>
			</div>	  
		</form>
	</div>
</div>
</div>
<?php include("foot.php") ?>
<script>
		$("input:last").on("click",function(){
			if( $("#name").val() || $("#xsid").val() ){
				$(this).attr("type","submit");
			}else{
				$(this).attr("type","button");
				alert("Error:请填写查询信息!!");
			}
		});
</script>
