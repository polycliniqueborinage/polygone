{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_acte="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_acte.php?action=search">{#dico_management_acte_menu_search#}</a>

					{if $acte.ID != ""}
	  				<a href="./management_acte.php?action=add">{#dico_management_acte_menu_add#}</a>
					{/if}
					{if $acte.ID == ""}
					<span>{#dico_management_acte_menu_add#}</span> 
					{/if}

	  				<a href="./management_acte.php?action=list">{#dico_management_acte_menu_list#}</a>

					{if $acte.ID != ""}
					<span>{#dico_management_acte_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_acte_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_acte_error2#}</span>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									{if $acte.ID != ""}
										<span>{#dico_management_acte_submenu_edit#}</span>
									{/if}
									{if $acte.ID == ""}
										<span>{#dico_management_acte_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_acte.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$acte.ID}" name = "id" id="id" />
											
											<div class="row"><label for = "code" class="mandatory">{#dico_management_acte_code#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.code}" name = "code" id="code" class="{$errors.code}" realname="{#dico_management_acte_code#}" onkeyup="javascript:acteSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description" class="mandatory">{#dico_management_acte_description#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.description}" name = "description" id="description" class="{$errors.description}" realname="{#dico_management_acte_description#}" onkeyup="javascript:acteSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "cecodis">{#dico_management_acte_cecodis#}:</label><input type = "text" value = "{$acte.cecodis}" name = "cecodis" id="cecodis" realname ="{#dico_management_acte_cecodis#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "couttr" class="mandatory">{#dico_management_acte_couttr#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.couttr}" name = "couttr" id="couttr" realname ="{#dico_management_acte_couttr#}" onkeyup="javascript:valuecouttr = checkAmount(this, valuecouttr, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "couttp" class="mandatory">{#dico_management_acte_couttp#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.couttp}" name = "couttp" id="couttp" realname ="{#dico_management_acte_couttp#}" onkeyup="javascript:valuecouttp = checkAmount(this, valuecouttp, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "coutvp" class="mandatory">{#dico_management_acte_coutvp#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.coutvp}" name = "coutvp" id="coutvp" realname ="{#dico_management_acte_coutvp#}" onkeyup="javascript:valuecoutvp = checkAmount(this, valuecoutvp, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "coutsm" class="mandatory">{#dico_management_acte_coutsm#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$acte.coutsm}" name = "coutsm" id="coutsm" realname ="{#dico_management_acte_coutsm#}" onkeyup="javascript:valuecoutsm = checkAmount(this, valuecoutsm, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class = "row">
												<label for = "type">{#dico_management_acte_length#}</label>
												<select name = "length" id = "length" class="{$errors.length}" realname = "{#dico_management_acte_length#}" />
												{if $acte.length == ""}
													<option value = "" selected>{#dico_management_acte_chooseone#}</option>
												{/if}
													<option {if $acte.length == "0"}selected="selected"{/if} value = "0">0 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "5"}selected="selected"{/if} value = "5">5 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "10"}selected="selected"{/if} value = "10">10 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "15"}selected="selected"{/if} value = "15">15 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "20"}selected="selected"{/if} value = "20">20 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "25"}selected="selected"{/if} value = "25">25 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "30"}selected="selected"{/if} value = "30">30 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "35"}selected="selected"{/if} value = "35">35 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "40"}selected="selected"{/if} value = "40">40 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "45"}selected="selected"{/if} value = "45">45 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "50"}selected="selected"{/if} value = "50">50 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "55"}selected="selected"{/if} value = "55">55 {#dico_management_acte_minutes#}</option>
													<option {if $acte.length == "60"}selected="selected"{/if} value = "60">60 {#dico_management_acte_minutes#}</option>
												</select>
											</div>
											
											
											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_acte_button_save#}</button></div>
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
	
	{include file="template_left.tpl" acte_search="yes"}
	

	{literal}
	<script type="text/javascript">
		var valuecouttr = null;
		var valuecouttp = null;
		var valuecoutvp = null;
		var valuecoutsm = null;
		var acte = null;

		$(document).ready(function() {
		
			acte = $("#id").val();
	
			$("form").validate({
				rules: {
	  				code : { required: true, remote: "php_request/check_acte.php?id="+acte },
				    description: "required",
				    couttr: "required",
				    couttp: "required",
				    coutvp: "required",
				    coutsm: "required"
   				},
   				messages: {
					code: {
 				    	required: "{/literal}{#dico_management_error_required#}{literal}",
 				    	remote: "{/literal}{#dico_management_error_acte_unique#}{literal}"
 					},
					description: {
 				    	required: "{/literal}{#dico_management_error_required#}{literal}"
 					},
					couttr: {
 				    	required: "{/literal}{#dico_management_error_required#}{literal}"
 					},
					couttp: {
 				    	required: "{/literal}{#dico_management_error_required#}{literal}"
 					},
					coutvp: {
 				    	required: "{/literal}{#dico_management_error_required#}{literal}"
 					},
					coutsm: {
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
					systemeMessage('systemmsg');
				}
		});
		
	});
	</script>
	{/literal}
	