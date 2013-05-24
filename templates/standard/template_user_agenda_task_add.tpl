{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_ajax="yes" js_daterangepicker="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "95%",
			height: "220px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	{/literal}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php?action=day">{#dico_user_agenda_menu_day#}</a>
    				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
	  				<a href="./user_agenda.php?action=list">{#dico_user_agenda_menu_list#}</a>
	  				<a href="./user_agenda.php?action=fulllist">{#dico_user_agenda_menu_fulllist#}</a>
	  				<a href="./user_agenda.php?action=timeline">{#dico_user_agenda_menu_timeline#}</a>
	  				<a href="./user_agenda.php?action=schedule">{#dico_user_agenda_menu_schedule#}</a>
					{if $task.ID != ""}
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
					{/if}
					{if $task.ID == ""}
					<span>{#dico_user_agenda_menu_task_add#}</span> 
					{/if}
					{if $task.ID != ""}
					<span>{#dico_user_agenda_menu_task_edit#}</span> 
					{/if}
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/images/symbols/task.png" alt="" />
									{if $task.ID != ""}
										<span>{#dico_user_agenda_task_submenu_edit#}</span>
									{/if}
									{if $task.ID == ""}
										<span>{#dico_user_agenda_task_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="user_agenda.php?action=task_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type="hidden" value="{$task.ID}" name="id" id="id" />

											<div class="row"><label for = "end_date" class="mandatory">{#dico_user_agenda_task_end_date#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$task.end_date}" name = "end_date" id="end_date" realname="{#dico_user_agenda_task_end_date#}" onkeyup="javascript:valueenddate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "title" class="mandatory">{#dico_user_agenda_task_title#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$task.title}" name = "title" id="title" realname="{#dico_user_agenda_task_title#}" autocomplete="off"/></div>

											<div class="row"><label for = "textcomment">{#dico_user_agenda_task_textcomment#}:</label><textarea name="textcomment" id="textcomment" realname="{#dico_user_agenda_task_textcomment#}" rows="3" cols="1" >{$task.textcomment}</textarea></div>

											<div class = "row">
												<label for = "type" class="mandatory">{#dico_user_agenda_task_reminder#}:</label>
												<select name = "reminder" id = "reminder" realname = "{#dico_user_agenda_task_reminder#}" />
													<option {if $task.reminder == ""}selected="selected"{/if} value = "">{#dico_user_agenda_task_reminder_no#}</option>
													<option {if $task.reminder == "0"}selected="selected"{/if} value = "0">{#dico_user_agenda_task_reminder_today#}</option>
													<option {if $task.reminder == "-1"}selected="selected"{/if} value = "-1">{#dico_user_agenda_task_reminder_yesterday#}</option>
												</select>
											</div>

											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn">
												<button type="submit">
												{if $task.ID != ""}
												{#dico_user_agenda_addbox_button_update#}
												{/if}
												{if $task.ID == ""}
												{#dico_user_agenda_addbox_button_add#}
												{/if}
												</button>
												</div>
											</div>
			
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
			
					</div> {*Block B end*}	
					
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" product_search="no"}

	{literal}
	<script type="text/javascript">
		var valuesize =  null;
		var valuedose =  null;
		var valuestok =  null;
		var product = null;
		var valuestartingstok = null;

		$(document).ready(function() {
	
			product = $("#id").val();

		    $("form").validate({
			rules: {
	  			end_date : { required: true, date:true },
	  			title: "required"
   			},
   			messages: {
				end_date: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}",
 			    	date: "{/literal}{#dico_user_error_date#}{literal}"
 				},
				title: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				}
 			}
		});	
	    
	    $("form").bind("invalid-form.validate", function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? '{/literal}{#dico_management_error_one_field_error#}{literal}'
					: '{/literal}{#dico_management_error_many_fields_error_1#}{literal}' + errors + '{/literal}{#dico_management_error_many_fields_error_2#}{literal}';
					$("div.error span").html(message);
					$("div.error").show();
					$("div.infowin_left").show();
					systemeMessage('systemmsg',6000);
				}
		});
		
		
		$(document).ready(function(){
    	   	$('#end_date').daterangepicker({
    	   		dateFormat: 'dd/mm/yy', 
    	   		posX: 270, 
    	   		posY: 275,
    	   		presetRanges: [
					{text: '{/literal}{#dico_general_calendar_today#}{literal}', dateStart: 'today', dateEnd: 'today' },
					{text: '{/literal}{#dico_general_calendar_tomorrow#}{literal}', dateStart: 'tomorrow', dateEnd: 'tomorrow' },
					{text: '{/literal}{#dico_general_calendar_next_week#}{literal}', dateStart: 'today+7days', dateEnd: 'today+7days' },
					{text: '{/literal}{#dico_general_calendar_next_month#}{literal}', dateStart: function(){ return Date.parse('today').moveToLastDayOfMonth().add(1).days(); }, dateEnd: function(){ return Date.parse('today').moveToLastDayOfMonth().add(1).days(); }  }
							],
				presets: {
					specificDate: '{/literal}{#dico_general_calendar_specific_date#}{literal}' 
					}
    	   	}); 
	     });	
		
		
	});
	</script>
	{/literal}