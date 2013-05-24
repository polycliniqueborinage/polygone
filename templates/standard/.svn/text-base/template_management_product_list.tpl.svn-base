{include file="template_header.tpl" js_rico="yes" js_product="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

	  				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

					<span>{#dico_management_product_menu_list#}</span> 

	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/product.png" alt="" />
										<span id='productlist_timer'></span><span id="productlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<a href="management_product.php?action=pdfstock" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div id="useredit">
								
									<div class="table_head">
										<table id="productlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:4%">{#dico_management_product_search_colum_action#}</td>
												<td class="b" style="width:16%">{#dico_management_product_search_colum_name#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_unit#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_size#}</td>
												<td class="b" style="width:8%">{#dico_management_product_search_colum_dose#}</td>
												<td class="b" style="width:5%">{#dico_management_product_sail_price_htva#}</td>
												<td class="b" style="width:5%">{#dico_management_product_tva#}</td>
												<td class="b" style="width:5%">{#dico_management_product_sail_price#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_stock#}</td>
												<td class="b" style="width:8%">{#dico_management_product_search_colum_current_stock#}</td>
												<td class="b" style="width:8%">{#dico_management_product_search_colum_stock_sail_price#}</td>
												<td class="b" style="width:12%">{#dico_management_product_search_colum_commande#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	
	{literal}
	<script type='text/javascript'>
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [,{filterUI:'t',width:150},,,,{filterUI:'t',width:100},{filterUI:'t',width:100},{filterUI:'t',width:100},,,,{filterUI:'t',width:100}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('productlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

