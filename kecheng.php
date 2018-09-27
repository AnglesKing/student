<?php include "head.php" ?>
  	<div class="content">
		<p class="sui-text-xxlarge my-padd">课程录入</p>
		<form action="kecheng-save.php" id="form1" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
		   		<label for="kcName" class="control-label">课程名：</label>
		   		<div class="controls">
		    		<input class="input-large input-fat" type="text"   id="kcName" placeholder="请输入课程名称" data-rules='required|minlength=2|maxlength=10' name="kcName">
				</div>
			</div>
			<div class="control-group">
				<label for="kcTime" class="control-label">课程时间：</label>
				<div class="controls">
					 <input class="input-large input-fat" type="text" id="kcTime" data-toggle="datepicker" placeholder="请输入课程时间" name="kcTime">
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