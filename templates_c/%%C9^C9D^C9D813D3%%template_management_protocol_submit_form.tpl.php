<?php /* Smarty version 2.6.19, created on 2012-09-08 12:10:20
         compiled from template_management_protocol_submit_form.tpl */ ?>
<html>

	<body>
	
	<script type="text/javascript" src="include/js/jquery-1.3.2/jquery-1.3.2.min.js"></script>
	
	<div style="display:none">
	
		<form action="<?php echo $this->_tpl_vars['submit_url']; ?>
" method="post" id="form1" name="form1" ACCEPT-CHARSET="UTF-8">
			<textarea rows="3" value="protocol" name="protocol"><?php echo $this->_tpl_vars['protocol']; ?>
</textarea>
	   		<input type="submit" value="Send" id="getprotocol"> <INPUT type="reset">
	 	</form>
 	
 	</div>
 	
 	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
		$(\'#getprotocol\').click();
	});
	</script>
	'; ?>


	</body>
</html>
 	