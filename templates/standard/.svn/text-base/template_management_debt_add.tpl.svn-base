{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_debt="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "95%",
			height: "120px",
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
    	
		{if $modules.management_debt_adminstate == 3}
			{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_debt_adminstate == 4}
			{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}

	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_debt.php?action=search">{#dico_management_debt_menu_search#}</a>

					{if $debt.ID != ""}
	  				<a href="./management_debt.php?action=add">{#dico_management_debt_menu_add#}</a>
					{/if}
					{if $debt.ID == ""}
					<span>{#dico_management_debt_menu_add#}</span> 
					{/if}

	  				<a href="./management_debt.php?action=list">{#dico_management_debt_menu_list#}</a>

	  				<a href="./management_debt.php?action=contact_list">{#dico_management_debt_menu_contact_list#}</a>

					{if $debt.ID != ""}
					<span>{#dico_management_debt_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg">
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
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/debt.png" alt="" />
									{if $debt.ID != ""}
										<span>{#dico_management_debt_submenu_edit#} {$debt.familyname} {$debt.firstname}</span>
									{/if}
									{if $debt.ID == ""}
										<span>{#dico_management_debt_submenu_create#}</span>
									{/if}
									</a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_debt.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$debt.ID}" name = "ID" id="ID" />
											<input type = "hidden" value = "{$debt.addressbook_ID}" name = "addressbook_ID" id="addressbook_ID" />
											
											<div class="row"><label for = "search">{#dico_management_debt_search#}:</label><input type = "text" value = "{$debt.search}" name = "search" id="search" realname ="{#dico_management_debt_search#}" onkeyup="javascript:debtAutoComplete(this.value,'');debtSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "amount" class="mandatory">{#dico_management_debt_amount#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$debt.amount}" name = "amount" id="amount" realname ="{#dico_management_debt_amount#}" onkeyup="javascript:valueamount = checkAmount(this, valueamount, 10, 2, false);" onkeydown="javascript:valueamount = checkAmount(this, valueamount, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "creation_date" class="mandatory">{#dico_management_debt_creation_date#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$debt.creation_date}" name = "creation_date" id="creation_date" realname="{#dico_management_debt_creation_date#}" onkeyup="javascript:valuecreationdate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "familyname" class="mandatory">{#dico_management_debt_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$debt.familyname}" name = "familyname" id="familyname" class="{$errors.familyname}" realname="{#dico_management_debt_familyname#}" onkeyup="javascript:debtSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "firstname" class="mandatory">{#dico_management_debt_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$debt.firstname}" name = "firstname" id="firstname" class="{$errors.firstname}" realname="{#dico_management_debt_firstname#}" onkeyup="javascript:debtSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "address1">{#dico_management_debt_address1#}:</label><input type = "text" value = "{$debt.address1}" name = "address1" id="address1" realname ="{#dico_management_debt_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1">{#dico_management_debt_zip1city1#}:</label><input type = "text" value = "{$debt.zip1} {$debt.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_management_debt_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1">{#dico_management_debt_state1#}:</label><input type = "text" value = "{$debt.state1}" name = "state1" id="state1" realname ="{#dico_management_debt_state1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1">{#dico_management_debt_country1#}:</label><input type = "text" value = "{$debt.country1}" name = "country1" id="country1" realname ="{#dico_management_debt_country1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone">{#dico_management_debt_workphone#}:</label><input type = "text" value = "{$debt.workphone}" name = "workphone" id="workphone" realname ="{#dico_management_debt_workphone#}" onfocus="javascript:this.select()" autocomplete="off"/></div-->

											<div class="row"><label for = "mobilephone">{#dico_management_debt_mobilephone#}:</label><input type = "text" value = "{$debt.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_management_debt_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "privatephone">{#dico_management_debt_privatephone#}:</label><input type = "text" value = "{$debt.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_management_debt_privatephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax">{#dico_management_debt_fax#}:</label><input type = "text" value = "{$debt.fax}" name = "fax" id="fax" realname ="{#dico_management_debt_fax#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email">{#dico_management_debt_email#}:</label><input type = "text" value = "{$debt.email}" name = "email" id="email" realname ="{#dico_management_debt_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "textcomment">{#dico_management_debt_textcomment#}:</label><textarea name="textcomment" id="textcomment" realname="{#dico_management_debt_textcomment#}" rows="3" cols="1" >{$debt.textcomment_debt}</textarea></div>
											
											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_debt_button_save#}</button></div>
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
	
	{include file="template_left.tpl" debt_search="yes"}
	
	{literal}
	<script type="text/javascript">
	
		var valueamount = null;
		var valuecreationdate = null;
	
		$(document).ready(function() {
	
		//AUTOCOMPLETE
		$("#zip1city1").autocomplete("php_request/localite_search.php", {
			minChars: 1,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#country1").autocomplete("php_request/country_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#state1").autocomplete("php_request/state_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});

	    $("form").validate({
			rules: {
			    firstname: "required",
			    familyname: "required",
	    		email: { email: true },
				creation_date : { required:true, date: true},
	    		amount: "required"
   			},
   			messages: {
				firstname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				familyname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				email: {
    				email: "{/literal}{#dico_management_error_email#}{literal}"
 				},
				creation_date: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	date: "{/literal}{#dico_management_error_date#}{literal}",
 				},
				amount: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
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
		
		//$("#workphone").mask("(9999) 99 99 99");
  		//$("#mobilephone").mask("(9999) 99 99 99");
  		//$("#privatephone").mask("(9999) 99 99 99");
  		//$("#fax").mask("(9999) 99 99 99");
		
		
		
	});
	</script>
	{/literal}
	