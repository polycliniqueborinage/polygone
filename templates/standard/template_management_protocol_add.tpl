{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_protocol="yes" js_form="yes" js_jquery_validate="yes" js_jquery_multifile="yes" tinymce="yes"}

	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "100%",
			height: "320px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			inline_styles : false,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	{/literal}
	
	<div id="middle">
    	
		{if $modules.management_protocol_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_protocol_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_protocol.php?action=search">{#dico_management_protocol_menu_search#}</a>

					{if $protocol.ID != ""}
	  				<a href="./management_protocol.php?action=add">{#dico_management_protocol_menu_add#}</a>
					{/if}
					{if $protocol.ID == ""}
					<span>{#dico_management_protocol_menu_add#}</span> 
					{/if}

	  				<a href="./management_protocol.php?action=list">{#dico_management_protocol_menu_list#}</a>

					{if $protocol.ID != ""}
					<span>{#dico_management_protocol_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_management_protocol_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_management_protocol_error2#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
								<h2><a href="javascript:void(0);" id="protocoledit_toggle" class="win_block" onclick = "toggleBlock('protocoledit');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									{if $protocol.ID != ""}
										<span>{#dico_management_protocol_submenu_edit#}</span>
									{/if}
									{if $protocol.ID == ""}
										<span>{#dico_management_protocol_submenu_create#}</span>
									{/if}
									</a>
								</h2>
							</div>
			
							<div id = "protocoledit" class="block_in_wrapper">
			
									<form id="form" class="main" method="post" action="management_protocol.php?action=submit" enctype="multipart/form-data">
						
										<fieldset>
			
											<div style="float:left;width:80%;">
										
												<input type = "hidden" value = "{$protocol.ID}" name = "id" id="id" />
												<input type = "hidden" value = "{$protocol.patient_ID}" name = "patient_id" id="patient_id" />
												<input type = "hidden" value = "{$protocol.user_sender_ID}" name = "user_sender_id" id="user_sender_id" />
												<input type = "hidden" value = "{$protocol.user_recipient1_ID}" name = "user_recipient1_id" id="user_recipient1_id" />
												<input type = "hidden" value = "{$protocol.user_recipient2_ID}" name = "user_recipient2_id" id="user_recipient2_id" />
												<input type = "hidden" value = "{$protocol.user_recipient3_ID}" name = "user_recipient3_id" id="user_recipient3_id" />
												<input type = "hidden" value = "{$protocol.user_recipient4_ID}" name = "user_recipient4_id" id="user_recipient4_id" />
												<input type = "hidden" value = "{$protocol.user_recipient5_ID}" name = "user_recipient5_id" id="user_recipient5_id" />
											
												<div class="row"><label class="mandatory">{#dico_management_protocol_patient#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$protocol.patient}" name = "patient" id="patient" realname="{#dico_management_protocol_patient#}" onkeyup="javascript:patientAutoComplete('',this.value)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row"><label class="mandatory">{#dico_management_protocol_user#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$protocol.user_sender}" name = "user_sender" id="user_sender" realname="{#dico_management_protocol_user#}" onkeyup="javascript:userSenderAutoComplete('',this.value)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient1_div"><label>{#dico_management_protocol_addressbook#}:</label><input type = "text" value = "{$protocol.user_recipient1}" name = "user_recipient1" id="user_recipient1" realname="{#dico_management_protocol_addressbook#}" onkeyup="javascript:userRecipientAutoComplete('',this.value,1)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient2_div" style="display:{$protocol.user_recipient2_display}"><label>{#dico_management_protocol_addressbook#}:</label><input type = "text" value = "{$protocol.user_recipient2}" name = "user_recipient2" id="user_recipient2" realname="{#dico_management_protocol_addressbook#}" onkeyup="javascript:userRecipientAutoComplete('',this.value,2)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient3_div" style="display:{$protocol.user_recipient3_display}"><label>{#dico_management_protocol_addressbook#}:</label><input type = "text" value = "{$protocol.user_recipient3}" name = "user_recipient3" id="user_recipient3" realname="{#dico_management_protocol_addressbook#}" onkeyup="javascript:userRecipientAutoComplete('',this.value,3)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient4_div" style="display:{$protocol.user_recipient4_display}"><label>{#dico_management_protocol_addressbook#}:</label><input type = "text" value = "{$protocol.user_recipient4}" name = "user_recipient4" id="user_recipient4" realname="{#dico_management_protocol_addressbook#}" onkeyup="javascript:userRecipientAutoComplete('',this.value,4)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient5_div" style="display:{$protocol.user_recipient5_display}"><label>{#dico_management_protocol_addressbook#}:</label><input type = "text" value = "{$protocol.user_recipient5}" name = "user_recipient5" id="user_recipient5" realname="{#dico_management_protocol_addressbook#}" onkeyup="javascript:userRecipientAutoComplete('',this.value,5)" onfocus="javascript:this.select()" autocomplete="off"/></div>

												<div class="row"><label for = "date" class="mandatory">{#dico_management_protocol_date#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$protocol.date}" name = "date" id="date" class="{$errors.date}" realname="{#dico_management_protocol_date#}" onkeyup="javascript:valuedate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>

												<div class="row"><textarea name="text" id="text" realname="{#dico_management_protocol_text#}" rows="10" cols="1" >{$protocol.text}</textarea></div>
											
												<div class="clear_both"></div>

												<div style="background-color:#EFEFEF;padding:10px;margin-bottom:10px">
													<input name = "file[]" id="file" type="file" class="multi"/>
													
													<div class="MultiFile-label">
														{section name=protocol_file loop=$protocol_files}
															<div id="div_{$protocol_files[protocol_file].ID}">
																<div style="display:none">
																	<input id="input_{$protocol_files[protocol_file].ID}" type="checkbox" name="delete[]" value="{$protocol_files[protocol_file].ID}"/>
																</div>
																<a href="#" class="MultiFile-remove" onclick="$('#input_{$protocol_files[protocol_file].ID}').attr('checked', 'checked');$('#div_{$protocol_files[protocol_file].ID}').hide();return false;">x</a>
																<span title="File selected: calendar-6.x-2.2.tar.gz" class="MultiFile-title">{$protocol_files[protocol_file].name}</span>
																<br/>
															</div>
													    {/section}
													</div>
												</div>	

												<div class="clear_both"></div>

												{section name=group loop=$groups}
												<div class="row">
	    										    <input type="checkbox" class="checkbox" value="{$groups[group].ID}" name="assignto[]" id="{$groups[group].ID}" {if $groups[group].assigned == 1}checked="checked"{/if} /><label for="{$groups[group].ID}" style="width:210px;">{$groups[group].name}</label>
	    								    	</div>
										    	{/section}
												
												<div class="clear_both"></div>
												
					                        	<div class="row">
													<label>&nbsp;</label>
													<div class="butn"><button type="submit">{#dico_management_protocol_send#}</button></div>
												</div>
											</div>
			
											<div style="float:left;" >
																						
											</div>
			
										</fieldset>
									
									</form>
			
									<div class="clear_both"></div> {*required ... do not delete this row*}
								
									</div> {*block_in_wrapper end*}
			
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
			
							</div> {*IN end*}
			
					</div> {*Block A end*}
					
						
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" patient_search="yes" user_search="yes" addressbook_search="yes"}
	
	
	{literal}
	<script type="text/javascript">
	var date='';
	$(document).ready(function() {
	
		// VALIDATION
		jQuery.validator.addMethod("patient_id", function( value, element ) {
			return $("#patient_id").val() != '';
		}, "");
		// VALIDATION
		jQuery.validator.addMethod("user_sender_id", function( value, element ) {
			return $("#user_sender_id").val() != '';
		}, "");
	
	    $("form").validate({
			rules: {
				patient  : { required:true , patient_id: true },
				user_sender  : { required:true , user_sender_id: true },
				date : { required:true, date: true}
   			},
   			messages: {
				patient: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	patient_id: "{/literal}{#dico_management_error_patient_id#}{literal}"
 				},
				user_sender: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	user_id: "{/literal}{#dico_management_error_user_id#}{literal}"
 				},
				date: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	date: "{/literal}{#dico_management_error_date#}{literal}",
 				},
				addressbook: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	addressbook_id: "{/literal}{#dico_management_error_patient_id#}{literal}"
 				}
			},
			submitHandler: function() {
				form.submit();
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
					systemeMessage('systemmsg',3000);
				}
		});
		
	});
	</script>
	{/literal}