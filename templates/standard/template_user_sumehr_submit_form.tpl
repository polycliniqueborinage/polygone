<html>

	<body>
	
	<script type="text/javascript" src="include/js/jquery-1.3.2/jquery-1.3.2.min.js"></script>
	
	<div style="display:none">
	
		<form action="{$submit_url}" method="post" id="form1" name="form1" ACCEPT-CHARSET="UTF-8">
			<textarea rows="3" value="protocol" name="protocol">{$sumehr}</textarea>
	   		<input type="submit" value="Send" id="getsumher"> <INPUT type="reset">
	 	</form>
 	
 	</div>
 	
 	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
		$('#getsumher').click();
	});
	</script>
	{/literal}

	</body>
</html>
 	