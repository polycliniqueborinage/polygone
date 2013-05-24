{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_ouvrier="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
 
	<div id="middle">
    	
 		{if $modules.management_ouvrier_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_ouvrier_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
       
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				
    				<a href="./management_ouvrier.php">{#dico_ouvrier_menu_search#}</a>
						
					{if $ouvrier.ID != ""}
	  				<a href="./management_ouvrier.php?action=add">{#dico_ouvrier_menu_add#}</a>
					{/if}
					{if $ouvrier.ID == ""}
					<span>{#dico_ouvrier_menu_add#}</span> 
					{/if}

	  				<a href="./management_ouvrier.php?action=list">{#dico_ouvrier_menu_list#}</a>

					{if $ouvrier.ID != ""}
					<span>{#dico_ouvrier_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_ouvrier_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_ouvrier_error2#}</span>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									{if $ouvrier.ID != ""}
										<span>{#dico_ouvrier_submenu_edit#} {$ouvrier.familyname} {$ouvrier.firstname}</span>
									{/if}
									{if $ouvrier.ID == ""}
										<span>{#dico_ouvrier_submenu_create#}</span>
									{/if}
								</a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_ouvrier.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">

											<div class="row"><label>&nbsp;</label><label>&nbsp;</label></div>
											
											<input type = "hidden" value = "{$ouvrier.ID}" name = "id" id="id" />
							
											<div class="row"><label for = "familyname" class="mandatory">{#dico_ouvrier_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$ouvrier.familyname}" name = "familyname" id="familyname" realname="{#dico_ouvrier_familyname#}" onfocus="javascript:this.select()" onkeyup="javascript:ouvrierSimpleSearch('', this.value + ' ' +  $('#firstname').val());" autocomplete="off"/></div>
							
											<div class="row"><label for = "firstname" class="mandatory">{#dico_ouvrier_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$ouvrier.firstname}" name = "firstname" id="firstname" realname="{#dico_ouvrier_firstname#}" onfocus="javascript:this.select()" onkeyup="javascript:ouvrierSimpleSearch('', $('#familyname').val() + ' ' + this.value);" autocomplete="off"/></div>
											
											<div class="row"><label for = "salaire_horaire">{#dico_ouvrier_salaire_horaire#}:</label><input type = "text" value = "{$ouvrier.salaire_horaire}" name = "salaire_horaire" id="salaire_horaire" realname="{#dico_ouvrier_salaire_horaire#}" onfocus="javascript:this.select()" onkeyup="javascript:valueamount = checkAmount(this, valueamount, 10, 2, false);" autocomplete="off"/></div>
											
											<div class="row"><label for = "bonus_recurrent">{#dico_ouvrier_bonus_recurrent#}:</label><input type = "text" value = "{$ouvrier.bonus_recurrent}" name = "bonus_recurrent" id="bonus_recurrent" realname="{#dico_ouvrier_bonus_recurrent#}" onfocus="javascript:this.select()" onkeyup="javascript:valueamount = checkAmount(this, valueamount, 10, 2, false);" autocomplete="off"/></div>
											
											<div class="row"><label for = "cout_recurrent">{#dico_ouvrier_cout_recurrent#}:</label><input type = "text" value = "{$ouvrier.cout_recurrent}" name = "cout_recurrent" id="cout_recurrent" realname="{#dico_ouvrier_cout_recurrent#}" onfocus="javascript:this.select()" onkeyup="javascript:valueamount = checkAmount(this, valueamount, 10, 2, false);" autocomplete="off"/></div>
											
											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_patient_send#}</button></div>
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
	
	{include file="template_left.tpl" ouvrier_search="yes"}

	{literal}
	<script type="text/javascript">
	
		var valueamount = null;
		
		$(document).ready(function() {
		
			$("#form").validate({
				rules: {
				    familyname: "required",
				    firstname: "required",
	   			},
	   			messages: {
					familyname: {
	 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
	 				},
					firstname: {
	 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
	 				},
				}
			});
				
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

	</script>
	
	{/literal}