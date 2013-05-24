{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_cecodi="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

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

    				<a href="./management_cecodi.php?action=search">{#dico_management_cecodi_menu_search#}</a>

					{if $cecodi.ID != ""}
	  				<a href="./management_cecodi.php?action=add">{#dico_management_cecodi_menu_add#}</a>
					{/if}
					{if $cecodi.ID == ""}
					<span>{#dico_management_cecodi_menu_add#}</span> 
					{/if}

	  				<a href="./management_cecodi.php?action=list">{#dico_management_cecodi_menu_list#}</a>

					{if $cecodi.ID != ""}
					<span>{#dico_management_cecodi_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/cecodi.png" alt=""/>{#dico_management_cecodi_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/cecodi.png" alt=""/>{#dico_management_cecodi_error2#}</span>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/cecodi.png" alt="" />
									{if $cecodi.ID != ""}
										<span>{#dico_management_cecodi_submenu_edit#} {$cecodi.familyname} {$cecodi.firstname}</span>
									{/if}
									{if $cecodi.ID == ""}
										<span>{#dico_management_cecodi_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_cecodi.php?action=submit">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$cecodi.ID}" name = "id" id="id" />
											
											<div class="row"><label for="code">{#dico_management_cecodi_code#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$cecodi.code}" name = "code" id="code" realname="{#dico_management_cecodi_code#}" onkeyup="javascript:cecodiSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="age">{#dico_management_cecodi_age#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$cecodi.age}" name = "age" id="age" realname="{#dico_management_cecodi_age#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="description">{#dico_management_cecodi_description#}:</label><input type = "text" value = "{$cecodi.description}" name = "description" id="description" realname="{#dico_management_cecodi_description#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="class">{#dico_management_cecodi_class#}:</label><input type = "text" value = "{$cecodi.class}" name = "class" id="class" realname="{#dico_management_cecodi_class#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="condition">{#dico_management_cecodi_condition#}:</label><input type = "text" value = "{$cecodi.condition}" name = "condition" id="condition" realname="{#dico_management_cecodi_condition#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class = "row">
												<label for = "type">{#dico_management_cecodi_type#}<span class="mandatory">*</span>:</label>
												<select name = "type" id = "type" realname = "{#dico_management_cecodi_type#}" onchange="checkType(this.value)"/>
												{if $cecodi.type == ""}
													<option value = "" selected>{#dico_management_cecodi_chooseone#}</option>
												{/if}
												<option {if $cecodi.type == "consultation"}selected="selected"{/if} value = "consultation">{#dico_management_cecodi_consultation#}</option>
												<option {if $cecodi.type == "acte"}selected="selected"{/if} value = "acte">{#dico_management_cecodi_acte#}</option>
												</select>
											</div>
							
											<div class="row" id="hono_travailleurdiv" {if $cecodi.type != "consultation"}style="display: none;"{/if}><label for="hono_travailleur">{#dico_management_cecodi_hono_travailleur#}:</label><input type = "text" value = "{$cecodi.hono_travailleur}" name = "hono_travailleur" id="hono_travailleur" realname="{#dico_management_cecodi_hono_travailleur#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row" id="a_vippodiv" {if $cecodi.type != "consultation"}style="display: none;"{/if}><label for="a_vippo">{#dico_management_cecodi_a_vippo#}:</label><input type = "text" value = "{$cecodi.ID}" name = "a_vippo" id="a_vippo" realname="{#dico_management_cecodi_a_vippo#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row" id="b_tiers_payantdiv" {if $cecodi.type != "consultation"}style="display: none;"{/if}><label for="b_tiers_payant">{#dico_management_cecodi_b_tiers_payant#}:</label><input type = "text" value = "{$cecodi.ID}" name = "b_tiers_payant" id="b_tiers_payant" realname="{#dico_management_cecodi_b_tiers_payant#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row" id="kdbdiv" {if $cecodi.type != "acte"}style="display: none;"{/if}><label for="kdb">{#dico_management_cecodi_kdb#}:</label><input type = "text" value = "{$cecodi.ID}" name = "kdb" id="kdb" realname="{#dico_management_cecodi_kdb#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row" id="bcdiv" {if $cecodi.type != "acte"}style="display: none;"{/if}><label for="bc">{#dico_management_cecodi_bc#}:</label><input type = "text" value = "{$cecodi.ID}" name = "bc" id="bc" realname="{#dico_management_cecodi_bc#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="amout_tp">{#dico_management_cecodi_amount_tp#}:</label><input type = "text" value = "{$cecodi.amout_tp}" name = "amout_tp" id="amout_tp" realname="{#dico_management_cecodi_amount_tp#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="amout_tr">{#dico_management_cecodi_amount_tr#}:</label><input type = "text" value = "{$cecodi.amout_tr}" name = "amout_tr" id="amout_tp" realname="{#dico_management_cecodi_amount_tr#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="amout_vp">{#dico_management_cecodi_amount_vp#}:</label><input type = "text" value = "{$cecodi.amout_vp}" name = "amout_vp" id="amout_tp" realname="{#dico_management_cecodi_amount_vp#}" onkeyup="javascript:;" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_cecodi_button_save#}</button></div>
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
	
	{include file="template_left.tpl" cecodi_search="yes"}

	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		cecodi = $("#id").val();
	
		
	    $("form").validate({
			rules: {
	    		code  : {required:true, remote: "php_request/check_cecodi_code.php?id="+cecodi },
	    		hono_travailleur  : {required: function(element){return $("#type").val() == 'consultation';} },
	    		a_vippo  : {required: function(element){return $("#type").val() == 'consultation';} },
	    		b_tiers_payant  : {required: function(element){return $("#type").val() == 'consultation';} },
	    		kdb  : {required: function(element){return $("#type").val() == 'consultation';} },
	    		bc  : {required: function(element){return $("#type").val() == 'consultation';} },
				type: "required"
   			},
   			messages: {
				type: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				code: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 				    remote: "{/literal}{#dico_management_error_cecodi_unique#}{literal}"
 				},
				hono_travailleur: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				a_vippo: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				b_tiers_payant: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				kdb: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				bc: {
    				email: "{/literal}{#dico_management_error_email#}{literal}"
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
					systemeMessage('systemmsg');
				}
		});
		
		
  		$("#code").mask("999999");
		
	});
	</script>
	{/literal}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	