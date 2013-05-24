{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_addressbook="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

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
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_addressbook.php?action=search">{#dico_management_addressbook_menu_search#}</a>

					{if $addressbook.ID != ""}
	  				<a href="./management_addressbook.php?action=add">{#dico_management_addressbook_menu_add#}</a>
					{/if}
					{if $addressbook.ID == ""}
					<span>{#dico_management_addressbook_menu_add#}</span> 
					{/if}

	  				<a href="./management_addressbook.php?action=list">{#dico_management_addressbook_menu_list#}</a>

					{if $addressbook.ID != ""}
					<span>{#dico_management_addressbook_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/addressbook.png" alt=""/>{#dico_management_addressbook_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/addressbook.png" alt=""/>{#dico_management_addressbook_error2#}</span>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/addressbook.png" alt="" />
									{if $addressbook.ID != ""}
										<span>{#dico_management_addressbook_submenu_edit#} {$addressbook.familyname} {$addressbook.firstname}</span>
									{/if}
									{if $addressbook.ID == ""}
										<span>{#dico_management_addressbook_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_addressbook.php?action=submit">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$addressbook.ID}" name = "id" id="id" />
											
											<div class = "row">
												<label for = "type">{#dico_management_addressbook_type#}<span class="mandatory">*</span>:</label>
												<select name = "type" id = "type" realname = "{#dico_management_addressbook_type#}" onchange="checkType(this.value)"/>
												{if $addressbook.type == ""}
													<option value = "" selected>{#dico_management_addressbook_chooseone#}</option>
												{/if}
												<option {if $addressbook.type == "client"}selected="selected"{/if} value = "client">{#dico_management_addressbook_client#}</option>
												<option {if $addressbook.type == "supplier"}selected="selected"{/if} value = "supplier">{#dico_management_addressbook_supplier#}</option>
												<option {if $addressbook.type == "doctor"}selected="selected"{/if} value = "doctor">{#dico_management_addressbook_doctor#}</option>
												<option {if $addressbook.type == "mutuel"}selected="selected"{/if} value = "mutuel">{#dico_management_addressbook_mutuel#}</option>
												<option {if $addressbook.type == "other"}selected="selected"{/if} value = "other">{#dico_management_addressbook_other#}</option>
												</select>
											</div>
							
											<div class="row" id="codediv" {if $addressbook.type != "mutuel"}style="display: none;"{/if}><label for="code">{#dico_management_addressbook_code#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$addressbook.ID}" name = "code" id="code" realname="{#dico_management_addressbook_code#}" {if $addressbook.ID != ""}disabled="disabled"{/if} onkeyup="javascript:addressbookSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row" id="specialitydiv" {if $addressbook.type != "doctor"}style="display: none;"{/if}><label for = "speciality">{#dico_management_addressbook_speciality#}:</label>
												<select name = "speciality" id = "speciality" realname = "{#dico_management_addressbook_speciality#}">
													<option value = "" {if $addressbook.speciality == ""}selected="selected"{/if}>{#dico_management_addressbook_chooseone#}</option>
													{section name=speciality loop=$specialities}
														<option {if $addressbook.speciality == $specialities[speciality].ID }selected="selected"{/if} value = "{$specialities[speciality].ID}">{$specialities[speciality].VALUE}</option>
													{/section}
												</select>
											</div>
											
											<div class="row" id="inamidiv" {if $addressbook.type != "doctor"}style="display: none;"{/if}><label for="inami">{#dico_management_addressbook_inami#}:</label><input type = "text" value = "{$addressbook.inami}" name = "inami" id="inami" maxlength="11" realname="{#dico_management_addressbook_inami#}" onKeyUp='javascript:valueinami = checkNumber(this, valueinami, 11, false);' autocomplete='off' onfocus="javascript:this.select()"/></div>

											<div class="row"><label for="company">{#dico_management_addressbook_company#}<span id="companyspan" class="mandatory" {if $addressbook.type != "client"}style="display: none;"{/if}>*</span>:</label><input type = "text" value = "{$addressbook.company}" name = "company" id="company" realname="{#dico_management_addressbook_company#}" onkeyup="javascript:addressbookSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "familyname" class="mandatory">{#dico_management_addressbook_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$addressbook.familyname}" name = "familyname" id="familyname" class="{$errors.familyname}" realname="{#dico_management_addressbook_familyname#}" onkeyup="javascript:addressbookSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "firstname" class="mandatory">{#dico_management_addressbook_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$addressbook.firstname}" name = "firstname" id="firstname" class="{$errors.firstname}" realname="{#dico_management_addressbook_firstname#}" onkeyup="javascript:addressbookSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "address1">{#dico_management_addressbook_address1#}:</label><input type = "text" value = "{$addressbook.address1}" name = "address1" id="address1" realname ="{#dico_management_addressbook_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1">{#dico_management_addressbook_zip1city1#}:</label><input type = "text" value = "{$addressbook.zip1} {$addressbook.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_management_addressbook_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1">{#dico_management_addressbook_state1#}:</label><input type = "text" value = "{$addressbook.state1}" name = "state1" id="state1" realname ="{#dico_management_addressbook_state1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1">{#dico_management_addressbook_country1#}:</label><input type = "text" value = "{$addressbook.country1}" name = "country1" id="country1" realname ="{#dico_management_addressbook_country1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone">{#dico_management_addressbook_workphone#}:</label><input type = "text" value = "{$addressbook.workphone}" name = "workphone" id="workphone" realname ="{#dico_management_addressbook_workphone#}" onfocus="javascript:this.select()" autocomplete="off"/></div-->

											<div class="row"><label for = "mobilephone">{#dico_management_addressbook_mobilephone#}:</label><input type = "text" value = "{$addressbook.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_management_addressbook_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "privatephone">{#dico_management_addressbook_privatephone#}:</label><input type = "text" value = "{$addressbook.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_management_addressbook_privatephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax">{#dico_management_addressbook_fax#}:</label><input type = "text" value = "{$addressbook.fax}" name = "fax" id="fax" realname ="{#dico_management_addressbook_fax#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email">{#dico_management_addressbook_email#}:</label><input type = "text" value = "{$addressbook.email}" name = "email" id="email" realname ="{#dico_management_addressbook_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "web">{#dico_management_addressbook_web#}:</label><input type = "text" value = "{$addressbook.web}" name = "web" id="email" realname ="{#dico_management_addressbook_web#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "tva">{#dico_management_addressbook_tva#}:</label><input type = "text" value = "{$addressbook.tva}" name = "tva" id="tva" realname ="{#dico_management_addressbook_tva#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "textcomment">{#dico_management_addressbook_textcomment#}:</label><textarea name="textcomment" id="textcomment" realname="{#dico_management_addressbook_textcomment#}" rows="3" cols="1" >{$addressbook.textcomment}</textarea></div>
											
											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_addressbook_button_save#}</button></div>
											</div>
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
	
	{include file="template_left.tpl" addressbook_search="yes"}

	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		addressbook = $("#id").val();
	
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
	    		code  : { remote: "php_request/check_mutuel_code.php?id="+addressbook, required: function(element){return $("#type").val() == 'mutuel';} },
	    		company  : {required: function(element){return $("#type").val() == 'mutuel';} },
				type: "required",
			    firstname: "required",
			    familyname: "required",
	    		email: { email: true },
	    		web : { url: true},
	    		inami  : { minlength:11, maxlength:11 }
   			},
   			messages: {
				type: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				company: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				code: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 				    remote: "{/literal}{#dico_management_error_addressbook_unique#}{literal}"
 				},
				firstname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				familyname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				email: {
    				email: "{/literal}{#dico_management_error_email#}{literal}"
 				},
				web: {
 			    	url: "{/literal}{#dico_management_error_web#}{literal}"
 				},
				inami: {
 			    	minlength: "{/literal}{#dico_management_error_inami#}{literal}",
 			    	maxlength: "{/literal}{#dico_management_error_inami#}{literal}"
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
					systemeMessage('systemmsg',3000);
				}
		});
		
	});
	</script>
	{/literal}
	