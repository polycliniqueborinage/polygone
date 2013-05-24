{include file="template_header.tpl" showheader="no" js_jquery132 = "yes" js_ajax = "yes"}


<div class="login">
	<div class="login-in">
		<div class="logo-name">
			<h1><a href = "http://collabtive.o-dyn.de/"><img src="./templates/standard/images/MClightLOGOBlue.png" alt="{$settings.name}" /></a></h1>
			<h2>{$settings.name}</h2>
			<h3>{$settings.subtitle}</h3>
		</div>
		
		<form id = "loginform" name = "loginform" method="post" action="user_menu.php?action=login">
			<fieldset>
			
			<div class="row">
				<label for="username" class="username"></label>
				<input type="text" class="text" name="username" id="username" realname = "{#dico_general_name#}" />
			</div>
			
			<div class="row">		
				<label for="pass" class="pass"></label>
				<input type="password" class="text" name="pass" id="pass" realname = "{#dico_general_password#}" />
			</div>
			
			<div class="row">			
				<label for="stay" class="keep" onclick = "$(this).toggleClass('keep-active');"><span>{#dico_general_stayloggedin#}</span></label>
				<input type = "checkbox" name = "staylogged" id="stay" value = "1" />
			</div>
			
			<div class="row">
				<button type="submit" class="loginbutn" title="{#loginbutton#}" onfocus="this.blur();"></button>
			</div>
			</fieldset>
		</form>
	</div>
	
	{if $loginerror == 1}
	<div class="login-alert">
		{#dico_general_login_error#}
	</div>	
	{/if}
</div>



</body>
</html>
