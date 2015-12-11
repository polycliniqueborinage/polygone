{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_product="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

					<span>{#dico_management_product_menu_search#}</span> 

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>
	  				
	  				<a href="./management_product.php?action=stock_critique">{#dico_management_product_menu_stock_critique#}</a>

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" style = "display:none" id = "systemmsg">
						<span class="info_in_red"><img src="templates/standard/img/symbols/product.png" alt=""/>{#dico_management_product_deleted#}</span>
					</div>
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2><a href="javascript:void(0);" id="product_toggle" class="win_block" onclick = "toggleBlock('product');"><img src="./templates/standard/img/symbols/product.png" alt="" />
									<span>{#dico_management_product_submenu_search#}</span></a>
								</h2>
						
								</div>
							
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_product_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_management_product_complete_search#}" onkeyup="javascript:productCompleteSearch(this.value);productSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="product">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="tools" style="width:9%">{#dico_management_product_search_colum_action#}</td>
												<td class="b" style="width:17%">{#dico_management_product_search_colum_name#}</td>
												<td class="b" style="width:16%">{#dico_management_product_search_colum_unit#}</td>
												<td class="b" style="width:15%">{#dico_management_product_search_colum_size#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_current_stock#}</td>
												<td class="b" style="width:20%">{#dico_management_product_search_colum_sail_price_htva#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_tva#}</td>
												<td class="b" style="width:20%">{#dico_management_product_search_colum_sail_price#}</td>
												
											</tr>
										</table>
									</div>
									
									<div class="neutral">

										<div class="block" id="milestone">

											<div class="nosmooth" id="productBox">
											
											</div>

										</div>

									</div>
					
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" product_search="yes"}

	{include file="template_right.tpl"}
	
	<div class="jqmWindow" id="confirmbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
  		
		</div>
			  
		<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="detail" style="display:inline">
						{#dico_management_product_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteProduct();" class="butn_link" id="delete"><span>{#dico_management_product_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_management_product_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$("#search").focus();
		
		$('#confirmbox').jqm({
		});
	});
	</script>
	{/literal}

