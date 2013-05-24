{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_product="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
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

    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

    				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

					{if $product.ID != ""}
	  				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>
					{/if}
					{if $product.ID == ""}
					<span>{#dico_management_product_menu_add#}</span> 
					{/if}

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>

					{if $product.ID != ""}
					<span>{#dico_management_product_menu_edit#}</span> 
					{/if}
						
    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/product.png" alt="" />
									{if $product.ID != ""}
										<span>{#dico_management_product_submenu_edit#}</span>
									{/if}
									{if $product.ID == ""}
										<span>{#dico_management_product_submenu_create#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_product.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type="hidden" value="{$product.ID}" name="id" id="id" />

											<div class="row"><label for = "name" class="name">{#dico_management_product_name#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.name}" name = "name" id="name" class="{$errors.name}" realname="{#dico_management_product_name#}" onkeyup="javascript:productSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class = "row">
												<label for = "unit" class="mandatory">{#dico_management_product_unit#}<span class="mandatory">*</span>:</label>
												<select name = "unit" id = "unit" class="{$errors.unit}" realname = "{#dico_management_product_unit#}"/>
												{if $product.unit == ""}
													<option value = "" selected>{#dico_management_product_chooseone#}</option>
												{/if}
												<option {if $product.unit == "1"}selected="selected"{/if} value = "1">{#dico_management_product_unit1#}</option>
												<option {if $product.unit == "2"}selected="selected"{/if} value = "2">{#dico_management_product_unit2#}</option>
												<option {if $product.unit == "3"}selected="selected"{/if} value = "3">{#dico_management_product_unit3#}</option>
												<option {if $product.unit == "4"}selected="selected"{/if} value = "4">{#dico_management_product_unit4#}</option>
												<option {if $product.unit == "5"}selected="selected"{/if} value = "5">{#dico_management_product_unit5#}</option>
												</select>
											</div>
											
											<div class="row"><label for = "size" class="mandatory">{#dico_management_product_size#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.size}" name = "size" id="size" realname ="{#dico_management_product_size#}" onkeyup="javascript:valuesize = checkAmount(this, valuesize, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "dose" class="mandatory">{#dico_management_product_dose#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.dose}" name = "dose" id="dose" realname ="{#dico_management_product_dose#}" onkeyup="javascript:valuedose = checkAmount(this, valuedose, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "stock" class="mandatory">{#dico_management_product_stock#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.stock}" name = "stock" id="stock" realname ="{#dico_management_product_stock#}" onkeyup="javascript:valuestok = checkAmount(this, valuestok, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											{if $product.ID == ""}
											<div class="row"><label for = "starting_stock">{#dico_management_product_starting_stock#}:</label><input type = "text" value = "0" name = "starting_stock" id="starting_stock" realname ="{#dico_management_product_starting_stock#}" onkeyup="javascript:valuestartingstok = checkAmount(this, valuestartingstok, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											{if $product.ID != ""}
											<div class="row"><label for = "starting_stock">{#dico_management_product_current_stock#}:</label><input type = "text" value = "{$product.current_stock}" name = "starting_stock" id="starting_stock" realname ="{#dico_management_product_starting_stock#}" onkeyup="javascript:valuestartingstok = checkAmount(this, valuestartingstok, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											
											<div class="row"><label for = "sail_price_htva">{#dico_management_product_sail_price_htva#}:</label><input type = "text" value = "{$product.sail_price_htva}" name = "sail_price_htva" id="sail_price_htva" realname ="{#dico_management_product_sail_price_htva#}" onkeyup="javascript:valuesailpricehtva = checkAmount(this, valuesailpricehtva, 10, 2, false); $('#sail_price').val(calculateTotal(this.value, $('#tva').val()));" onfocus="javascript:this.select()" autocomplete="off"/></div>											
											
											<div class="row"><label for = "tva">{#dico_management_product_tva#}:</label>
												<select name = "tva" id="tva" realname ="{#dico_management_product_tva#}" onchange="javascript:$('#sail_price').val(calculateTotal($('#sail_price_htva').val(), this.value));">
													<option {if $product.tva == "21"}selected="selected"{/if} value = "21">21%</option>
													<option {if $product.tva == "6"} selected="selected"{/if} value = "6"> 6% </option>
												</select>	
											</div>
											
											<div class="row"><label for = "sail_price">{#dico_management_product_sail_price#}:</label><input type = "text" value = "{$product.sail_price}" name = "sail_price" id="sail_price" realname ="{#dico_management_product_sail_price#}" onkeyup="javascript:valuesailprice = checkAmount(this, valuesailprice, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description">{#dico_management_product_description#}:</label><textarea name="description" id="description" realname="{#dico_management_product_description#}" rows="3" cols="1" >{$product.description}</textarea></div>
											
											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_product_button_save#}</button></div>
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
	
	{include file="template_left.tpl" product_search="yes"}

	{literal}
	<script type="text/javascript">
		var valuesize =  null;
		var valuedose =  null;
		var valuestok =  null;
		var product = null;
		var valuestartingstok = null;
		var valuesailprice = null;
		var valuesailpricehtva = null;

		$(document).ready(function() {
		
			$("#name").focus();
			
			product = $("#id").val();

		    $("form").validate({
			rules: {
	  			name : { required: true, remote: "php_request/check_product.php?id="+product },
	  			unit: "required",
			    size: "required",
			    dose: "required",
			    stock: "required"
   			},
   			messages: {
				name: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	remote: "{/literal}{#dico_management_error_product_unique#}{literal}"
 				},
				unit: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				size: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				dose: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				stock: {
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