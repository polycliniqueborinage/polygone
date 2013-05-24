{include file="template_header.tpl" js_jquery="yes" js_jquery_accordion="yes" js_jquery_datepicker="yes" js_jquery_form="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				</div>
			
				<div class="ViewPane">
				
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					<div class="infowin_left"  id="systemmsg">
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/system.png" alt=""/>{#dico_admin_system_settingschanged#}</span>
						{/if}
					</div>

					<script>
						systemeMessage('systemmsg');
					</script>
		
					<div class="block_b">
					<div class="in">
						<div class="headline">
						<h2><a href="#" id="admin_toggle" class="win_block" onclick = "toggleBlock('admin');"><img src="./templates/standard/img/symbols/system.png" alt="" />
						<span>{#dico_admin_system_submenu_view#}</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							<form class="main" method="post" action="admin_system.php?action=editsets" enctype="multipart/form-data" {literal}onsubmit="return validateCompleteForm(this);"{/literal}>
							<fieldset>
		
							<div class="row"><label for = "name">{#dico_admin_system_globaltitle#}:</label><input type = "text" value = "{$settings.name}" name = "name" id="name" realname = "dico_admin_system_globaltitle" /></div>
							<div class="row"><label for = "subtitle">{#dico_admin_system_subtitle#}:</label><input type="text" value="{$settings.subtitle}" name="subtitle" id="subtitle" realname = "dico_admin_system_subtitle" /></div>
					
							
							<div class="row">
							<label for = "locale">dico_admin_system_locale</label>
							<select name = "locale" id="locale" realname = "{#locale#}">
								{section name = lang loop=$languages_fin}
								<option value = "{$languages_fin[lang].val}" {if $languages_fin[lang].val == $settings.locale}selected="selected"{/if}>{$languages_fin[lang].str}</option>
								{/section}
							</select>
							</div>
		
							<div class="row">
							<label for="timezone">{#dico_admin_system_timezone#}:</label>
							<select name="timezone" id="timezone" required="1" realname="{#timezone#}">
							{section name=timezone loop=$timezones}
							<option value="{$timezones[timezone]}" {if $timezones[timezone] == $settings.timezone}selected="selected"{/if}>{$timezones[timezone]}</option>
							{/section}
							</select>
							</div>
		
							<div class="row">
							<label for = "template">{#dico_admin_system_template#}:</label>
							<select name="template" id="template" required = "1" realname = "{#template#}" >
							{section name=tem loop=$templates}
							<option value="{$templates[tem]}" {if $settings.template == $templates[tem]}selected="selected"{/if}>{$templates[tem]}</option>
							{/section}
							</select>
							</div>
		
							<div class="row">
							<label>&nbsp;</label>
							<div class="butn"><button type="submit">{#dico_admin_system_button_save#}</button></div>
							</div>
		
		
							</fieldset>
							</form>
		
						</div> {*block_in_wrapper end*}
						</div> {*admin end*}
					</div> {*IN end*}
				</div> {*Block C end*}
				
			

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl"}

	{include file="template_right.tpl"}
	