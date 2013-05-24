{include file="template_header.tpl" js_jquery="yes" js_jquery_autocomplete="yes" js_product="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

    				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>
					
					<span>{#dico_management_product_menu_automatic_flow#}</span>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
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
									<span>{#dico_management_product_submenu_command#}</span></a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
								
								<form id="form" class="main" method="post" action="management_product.php?action=automatic_flow_submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "filetoupload">{#dico_product_file_upload#}:</label><input type = "file" class="file" name = "filetoupload" id="filetoupload" size="20" /></div>
											
											<div class="clear_both"></div>
					                        
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
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
	
	{include file="template_left.tpl" product_search="yes"}
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$("#form").validate({
			rules: {
			    filetoupload: "required"
   			},
   			messages: {
				filetoupload: {
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
					systemeMessage('systemmsg');
				}
		});
		
  		$("#birthday").mask("99/99/9999");
  		$("#workphone").mask("(9999) 99 99 99");
  		$("#mobilephone").mask("(9999) 99 99 99");
  		$("#privatephone").mask("(9999) 99 99 99");
  		$("#fax").mask("(9999) 99 99 99");		
		
	});
	</script>
	{/literal}
	
	
	
	
	