{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_thickbox="yes" js_product="yes" js_form="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

    				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>
						
	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>

					<span>{#dico_management_product_menu_view#}</span> 

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/product.png" alt=""/>{#dico_management_product_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/product.png" alt=""/>{#dico_management_product_edited#}</span>
						{/if}
						{if $mode == "stocked"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/product.png" alt=""/>{#dico_management_product_stocked#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="detail_toggle" class="win_block" onclick = "toggleBlock('detail');"><img src="./templates/standard/img/symbols/product.png" alt="" />
								<span>{#dico_management_product_submenu_view#} "{$product.name}"</span></a>
								</h2>
						
							</div>

							<div id = "detail">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                        						{if $product.name}
                        							<td class="label"><b>{#dico_management_product_name#}:</b></td><td>{$product.name}</td>
                        						{/if}
											</tr>

											{if $product.unit == "1"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_product_unit#}:</b></td><td>{#dico_management_product_unit1#}</td>
											</tr>
                       						{/if}
											
											{if $product.unit == "2"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_product_unit#}:</b></td><td>{#dico_management_product_unit2#}</td>
											</tr>
                       						{/if}

											{if $product.unit == "3"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_product_unit#}:</b></td><td>{#dico_management_product_unit3#}</td>
											</tr>
                       						{/if}

											{if $product.unit == "4"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_product_unit#}:</b></td><td>{#dico_management_product_unit4#}</td>
											</tr>
                       						{/if}
											
											{if $product.unit == "5"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_product_unit#}:</b></td><td>{#dico_management_product_unit5#}</td>
											</tr>
                       						{/if}

											<tr valign="top">
                        						{if $product.company}
                        							<td class="label"><b>{#dico_management_product_company#}:</b></td><td>{$product.company}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $product.size}
                        							<td class="label"><b>{#dico_management_product_size#}:</b></td><td>{$product.size}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $product.dose}
                        							<td class="label"><b>{#dico_management_product_dose#}:</b></td><td>{$product.dose}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $product.sail_price}
                        							<td class="label"><b>{#dico_management_product_sail_price_htva#}:</b></td><td>{$product.sail_price_htva} Euro</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $product.sail_price}
                        							<td class="label"><b>{#dico_management_product_tva#}:</b></td><td>{$product.tva} %</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $product.sail_price}
                        							<td class="label"><b>{#dico_management_product_sail_price#}:</b></td><td>{$product.sail_price} Euro</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $product.stock}
                        							<td class="label"><b>{#dico_management_product_stock#}:</b></td><td>{$product.stock}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $product.description}
                        							<td class="label"><b>{#dico_management_product_description#}:</b></td><td>{$product.description}</td>
                        						{/if}
											</tr>

											<tr><td>&nbsp;</td></tr>

											<tr valign="top">
                        						{if $product.current_stock < $product.stock }
                        							<td class="label red"><b>{#dico_management_product_current_stock#}:</b></td><td class="red">{$product.current_stock}</td>
                        						{/if}
												{if $product.current_stock >= $product.stock }
                        							<td class="label green"><b>{#dico_management_product_current_stock#}:</b></td><td class="green">{$product.current_stock}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $product.current_stock < $product.stock }
                        							<td class="label red"><b>{#dico_management_product_stock_price#}:</b></td><td class="red">{$product.total_price} Euro</td>
                        						{/if}
												{if $product.current_stock >= $product.stock }
                        							<td class="label green"><b>{#dico_management_product_stock_price#}:</b></td><td class="green">{$product.total_price} Euro</td>
                        						{/if}
											</tr>

											<tr><td class="label"></td><td>
												<a href="management_product.php?action=edit&id={$product.ID}" class="butn_link"><span>{#dico_management_product_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
								</div> {*block_in_wrapper end*}

							</div>{*userproducte end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}	
					
					
					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="history_toggle" class="win_block" onclick = "toggleBlock('history');"><img src="./templates/standard/img/symbols/timetracker.png" alt="" />
								<span>{#dico_management_product_submenu_history#} "{$product.name}"</span></a>
								</h2>
						
							</div>
					
							<div id="history" style="display:block">
									
									
									<div class="neutral">

										<div class="block" id="milestone">


											<div class="nosmooth" id="agenda_list">
	
<table cellpadding="0" cellspacing="0" border="0">

	<thead>
					
	<tr>
						
	<th>{#dico_management_product_search_colum_date#}</th>
	<th>{#dico_management_product_search_colum_type#}</th>
	<th>{#dico_management_product_search_colum_quantity#}</th>
	<th>{#dico_management_product_search_colum_consumer_name#}</th>
	<th>{#dico_management_product_search_colum_comment#}</th>
												
	</tr>
							
	</thead>

	<tfoot>
	<tr>
	<td colspan="5"></td>
	</tr>
	</tfoot>
												
	{section name=history loop=$historys}
	{*Color-Mix*}

	{if $smarty.section.history.index % 2 == 0}
	<tbody class="color-a">
	{else}
	<tbody class="color-b">
	{/if}
	
	<tr>
	<td>
	{$historys[history].date}
	</td>
	<td>
												{if $historys[history].type==-1}
                        							{#dico_management_product_type1#}
                        						{/if}
												{if $historys[history].type==1}
                        							{#dico_management_product_type2#}
                        						{/if}
												{if $historys[history].type==-2}
                        							{#dico_management_product_type1#}
                        						{/if}
												{if $historys[history].type==-3}
                        							{#dico_management_product_type1#}
                        						{/if}
    </td>
	<td>
	{$historys[history].quantity}
    </td>
	<td>
	{$historys[history].consumer_name}
    </td>
	<td>
	{$historys[history].comment|truncate:30:"...":true}
    </td>
    </tr>
	</tbody>
												
													
{/section}

	</table>
	

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
	
	