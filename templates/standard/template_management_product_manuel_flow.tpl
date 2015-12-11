{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_patient="yes" js_product="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "95%",
			height: "30px",
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

    				<span>{#dico_management_product_menu_manuel_flow#}</span> 

					<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>

					<a href="./management_product.php?action=stock_critique">{#dico_management_product_menu_stock_critique#}</a>

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>
    				
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
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_product_submenu_manuel_flow#}</span>
									</a>
								</h2>
							</div>
			
							<div id = "useredit" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_product.php?action=manuel_flow_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$ID}" name = "id" id="id" />
											<input type = "hidden" value = "{$product_ID}" name = "product_id" id="product_id" />
											<input type = "hidden" value = "" name = "client_id" id="client_id" />
											<input type = "hidden" value = "" name = "consumer_id" id="consumer_id" />
											
											<div id="1" style="display:none">{#dico_management_product_unit1#}</div>
											<div id="2" style="display:none">{#dico_management_product_unit2#}</div>
											<div id="3" style="display:none">{#dico_management_product_unit3#}</div>
											<div id="4" style="display:none">{#dico_management_product_unit4#}</div>
											
											<div class="row"><label for = "name">{#dico_management_product_name#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.name}" name = "name" id="name" class="{$errors.name}" realname="{#dico_management_product_name#}" onkeyup="javascript:productAutoComplete();productSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="row"><label for = "unit">{#dico_management_product_unit#}:</label><div id="unit_detail"></div></div>
											<div class="row"><label for = "size">{#dico_management_product_size#}:</label><div id="size_detail"></div></div>
											<div class="row"><label for = "dose">{#dico_management_product_dose#}:</label><div id="dose_detail"></div></div>
											<div class="row"><label for = "stock">{#dico_management_product_stock#}:</label><div id="stock_detail"></div></div>
											<div class="row"><label for = "sail_price">{#dico_management_product_sail_price#}:</label><div id="sail_price_detail"></div></div>
											<div class="row"><label for = "description">{#dico_management_product_description#}:</label><div id="description_detail"></div></div>
											<div class="row"><label for = "current_stock">{#dico_management_product_current_stock#}:</label><div id="current_stock_detail"></div></div>
											<div class="row"><label for = "stock_sail_price">{#dico_management_product_stock_sail_price#}:</label><div id="stock_sail_price_detail"></div></div>
											
											<div class = "row">
												<label for = "type" class="mandatory">{#dico_management_product_type#}<span class="mandatory">*</span>:</label>
												<select name = "type" id = "type" class="{$errors.type}" realname = "{#dico_management_product_type#}" onchange="javascript:productSetSpecialType(this.value);"/>
													<option {if $product.type == "1"}selected="selected"{/if} value = "1">{#dico_management_product_type2#}</option>
													<option {if $product.type == "-1" || $product.type == "" }selected="selected"{/if} value = "-1">{#dico_management_product_type1#}</option>
													<option {if $product.type == "-2"}selected="selected"{/if} value = "-2">{#dico_management_product_type3#}</option>
													<option {if $product.type == "-3"}selected="selected"{/if} value = "-3">{#dico_management_product_type4#}</option>
												</select>
											</div>

											<div class="row"><label for = "quantity" class="mandatory">{#dico_management_product_quantity#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$product.quantity}" name = "quantity" id="quantity" realname ="{#dico_management_product_quantity#}" onkeyup="javascript:valuequantity = checkAmount(this, valuequantity, 10, 2, false);" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "date" class="mandatory">{#dico_management_product_date#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$date}" name = "date" id="date" class="{$errors.date}" realname="{#dico_management_product_date#}" onkeyup="javascript:valuedate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "consumer_name">{#dico_management_product_consumer#}:</label><input type = "text" value = "{$product.consumer_name}" name = "consumer_name" id="consumer_name" realname ="{#dico_management_product_consumer#}" onfocus="javascript:this.select()" onkeyup="javascript:doctorAutoComplete();doctorSimpleSearch(this.value);" autocomplete="off"/></div>
											<!--
											<div class="row"><label for = "consumer_type">{#dico_management_product_consumer_type#}:</label><input type = "text" value = "{$product.consumer_type}" name = "consumer_type" id="consumer_type" realname ="{#dico_management_product_consumer_type#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "client">{#dico_management_product_proprietaire#}:</label><input type = "text" value = "{$product.proprietaire}" name = "client" id="client" realname ="{#dico_management_product_client#}" onfocus="javascript:this.select()" onkeyup="javascript:clientAutoComplete('',this.value);" autocomplete="off"/>
											</div>
											-->
											<div class="row"><label for = "lot_number">{#dico_management_product_lot_number#}:</label><input type = "text" value = "{$product.lot_number}" name = "lot_number" id="lot_number" realname ="{#dico_management_product_lot_number#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "comment">{#dico_management_product_comment#}:</label><textarea name="comment" id="comment" realname="{#dico_management_product_comment#}" rows="3" cols="1" >{$product.comment}</textarea></div>

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
	
	{include file="template_left.tpl" doctor_search="yes" product_search="yes"}

	{literal}
	<script type="text/javascript">
		var valuequantity =  null;
		var valuedate =  null;

		$(document).ready(function() {
		
			$("#name").focus();
			
			jQuery.validator.addMethod("product", function( value, element ) {
				return $("#product_id").val() != '';
			}, "");
	
		    $("form").validate({
			rules: {
				name: { required:true, product:true },
				date : { required:true},
			    quantity: "required"
   			},
   			messages: {
				name: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	product: "{/literal}{#dico_management_error_product_exist#}{literal}"
 				},
				date: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	date: "{/literal}{#dico_management_error_date#}{literal}",
 				},
				quantity: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
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
	
