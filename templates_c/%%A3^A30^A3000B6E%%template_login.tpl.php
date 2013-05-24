<?php /* Smarty version 2.6.19, created on 2012-09-08 09:13:59
         compiled from template_login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('showheader' => 'no','js_jquery132' => 'yes','js_ajax' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="login">
	<div class="login-in">
		<div class="logo-name">
			<h1><a href = "http://collabtive.o-dyn.de/"><img src="./templates/standard/images/MClightLOGOBlue.png" alt="<?php echo $this->_tpl_vars['settings']['name']; ?>
" /></a></h1>
			<h2><?php echo $this->_tpl_vars['settings']['name']; ?>
</h2>
			<h3><?php echo $this->_tpl_vars['settings']['subtitle']; ?>
</h3>
		</div>
		
		<form id = "loginform" name = "loginform" method="post" action="user_menu.php?action=login">
			<fieldset>
			
			<div class="row">
				<label for="username" class="username"></label>
				<input type="text" class="text" name="username" id="username" realname = "<?php echo $this->_config[0]['vars']['dico_general_name']; ?>
" />
			</div>
			
			<div class="row">		
				<label for="pass" class="pass"></label>
				<input type="password" class="text" name="pass" id="pass" realname = "<?php echo $this->_config[0]['vars']['dico_general_password']; ?>
" />
			</div>
			
			<div class="row">			
				<label for="stay" class="keep" onclick = "$(this).toggleClass('keep-active');"><span><?php echo $this->_config[0]['vars']['dico_general_stayloggedin']; ?>
</span></label>
				<input type = "checkbox" name = "staylogged" id="stay" value = "1" />
			</div>
			
			<div class="row">
				<button type="submit" class="loginbutn" title="<?php echo $this->_config[0]['vars']['loginbutton']; ?>
" onfocus="this.blur();"></button>
			</div>
			</fieldset>
		</form>
	</div>
	
	<?php if ($this->_tpl_vars['loginerror'] == 1): ?>
	<div class="login-alert">
		<?php echo $this->_config[0]['vars']['dico_general_login_error']; ?>

	</div>	
	<?php endif; ?>
</div>



</body>
</html>