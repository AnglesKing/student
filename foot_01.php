</div>
</body>
</html>
<script>
		$(".tip").hide();
		$("#identifying").on("blur",function(){
			if($(this).val()!=$("#ifg").html()){
				$(this).closest(".control-group").addClass("error");
				$(".tip").show();
			}else{
				$(this).closest(".control-group").removeClass("error");
				$(".tip").hide();
			}
		})
</script>