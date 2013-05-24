{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_prevention="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
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
			theme_advanced_buttons1 : "bold,italic,|,charmap",
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
    	
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_prevention.php">{#dico_management_prevention_menu_status#}</a>

    				<a href="./management_prevention.php?action=list">{#dico_management_prevention_menu_list#}</a>

    				<a href="./management_prevention.php?action=list_deleted">{#dico_management_prevention_menu_list_deleted#}</a>

    				<a href="./management_prevention.php?action=activation">{#dico_management_prevention_menu_activation#}</a>

					{if $motif.ID != ""}
	  				<a href="./management_prevention.php?action=add">{#dico_management_prevention_menu_add#}</a>
					{/if}
					{if $motif.ID == ""}
					<span>{#dico_management_prevention_menu_add#}</span> 
					{/if}

    				<a href="./management_prevention.php?action=timeplot">{#dico_management_prevention_menu_timeplot#}</a>

					{if $motif.ID != ""}
					<span>{#dico_management_prevention_menu_edit#}</span> 
					{/if}

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_error2#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/product.png" alt="" />
									{if $prevention.ID != ""}
										<span>{#dico_management_prevention_submenu_edit#}</span>
									{/if}
									{if $prevention.ID == ""}
										<span>{#dico_management_prevention_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_prevention.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type="hidden" value="{$motif.ID}" name="id" id="id" />

											<div class="row"><label for = "description" class="mandatory">{#dico_management_prevention_description#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$motif.description}" name = "description" id="description" title="{#dico_management_prevention_description#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "main_text">{#dico_management_prevention_main_text#}:</label><textarea name="main_text" id="main_text" title="{#dico_management_prevention_main_text#}" rows="3" cols="1" >{$motif.main_text}</textarea></div>
											
											<div class="row"><label for = "rappel">{#dico_management_prevention_rappel#}:</label><input type = "text" value = "{$motif.rappel}" name = "rappel" id="rappel" title ="{#dico_management_prevention_rappel#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "period" class="mandatory">{#dico_management_prevention_period#}<span class="mandatory">*</span>:</label>
												<input type = "text" value = "{$motif.period}" name = "period" id="period" title="{#dico_management_prevention_period_title#}" onkeyup="javascript:periode = checkAmount(this, periode, 10, 0, false);" onfocus="javascript:this.select()" autocomplete="off"/>
											</div>
											
											<div class="row"><label for = "period_unit" class="mandatory">{#dico_management_prevention_period_unit#}<span class="mandatory">*</span>:</label>
												<select name = "period_unit" id = "period_unit" realname = "{#dico_management_prevention_period_unit#}"/>
												{if $motif.period_unit == ""}
													<option value = "" selected>{#dico_management_prevention_chooseone#}</option>
												{/if}
												<option {if $motif.period_unit == "jours"}selected="selected"{/if} value = "jours">{#dico_management_prevention_period_unit_day#}</option>
												<option {if $motif.period_unit == "mois"}selected="selected"{/if} value = "mois">{#dico_management_prevention_period_unit_month#}</option>
												<option {if $motif.period_unit == "annees"}selected="selected"{/if} value = "annees">{#dico_management_prevention_period_unit_year#}</option>
												</select>
											</div>

											<div class="row"><label for = "sender_name">{#dico_management_prevention_sender_name#}:</label><input type = "text" value = "{$motif.sender_name}" name = "sender_name" id="sender_name" title ="{#dico_management_prevention_sender_name#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_address1">{#dico_management_prevention_sender_address1#}:</label><input type = "text" value = "{$motif.sender_address1}" name = "sender_address1" id="sender_address1" title ="{#dico_management_prevention_sender_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_zip1city1">{#dico_management_prevention_sender_zip1city1#}:</label><input type = "text" value = "{$motif.sender_zip1city1}" name = "sender_zip1city1" id="sender_zip1city1" title ="{#dico_management_prevention_sender_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_mail" class="mandatory">{#dico_management_prevention_sender_mail#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$motif.sender_mail}" name = "sender_mail" id="sender_mail" title="{#dico_management_prevention_sender_mail#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_reply" class="mandatory">{#dico_management_prevention_sender_reply#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$motif.sender_reply}" name = "sender_reply" id="sender_reply" title="{#dico_management_prevention_sender_reply#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											{if $motif.ID == ""}
											<div class="row"><label for = "request" class="mandatory">{#dico_management_prevention_request#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$motif.request}" name = "request" id="request" title="{#dico_management_prevention_sender_request_title#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}

											<div class="row"><label for = "frequency" class="mandatory">{#dico_management_prevention_frequency#}<span class="mandatory">*</span>:</label>
											<select name = "frequency" id = "frequency" title = "{#dico_management_prevention_frequency_title#}"/>
												{if $motif.frequency == ""}
													<option value = "" selected>{#dico_management_prevention_chooseone#}</option>
												{/if}
												<option {if $motif.frequency == "annuelle"}selected="selected"{/if} value = "annuelle">{#dico_management_prevention_frequency_year#}</option>
												<option {if $motif.frequency == "semestrielle"}selected="selected"{/if} value = "semestrielle">{#dico_management_prevention_frequency_6month#}</option>
												<option {if $motif.frequency == "trimestrielle"}selected="selected"{/if} value = "trimestrielle">{#dico_management_prevention_frequency_3month#}</option>
												<option {if $motif.frequency == "mensuelle"}selected="selected"{/if} value = "mensuelle">{#dico_management_prevention_frequency_month#}</option>
												<option {if $motif.frequency == "hebdomadaire"}selected="selected"{/if} value = "hebdomadaire">{#dico_management_prevention_frequency_week#}</option>
												</select>
											</div>

											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_prevention_button_save#}</button></div>
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
	
	{include file="template_left.tpl" prevention_search="yes"}

	{literal}
	<script type="text/javascript">
	
		var periode=null;

		$(document).ready(function() {
	
			prevention = $("#id").val();
			
			//AUTOCOMPLETE
			$("#sender_zip1city1").autocomplete("php_request/localite_search.php", {
				minChars: 1,
				max: 6,
				scroll: false,
				autoFill: true,
				// remove if dont match
				mustMatch: false,
				matchContains: true
			});
			

		    $("form").validate({
			rules: {
	  			description : { required: true, remote: "php_request/check_prevention.php?id="+prevention },
	  			period: "required",
	  			period_unit: "required",
	  			signature: "required",
	    		sender_mail: { required: true, email: true },
	    		sender_reply: { required: true, email: true },
			    request: "required",
			    frequency: "required"
   			},
   			messages: {
				description: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	remote: "{/literal}{#dico_management_error_prevention_unique#}{literal}"
 				},
				period: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				period_unit: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				signature: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				sender_mail: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
    				email: "{/literal}{#dico_management_error_email#}{literal}"
 				},
				sender_reply: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
    				email: "{/literal}{#dico_management_error_email#}{literal}"
 				},
				request: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				frequency: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				}			}
			
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
					systemeMessage('systemmsg');
				}
		});
		
	});
	</script>
	{/literal}