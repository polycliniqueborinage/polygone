{include file="template_header.tpl" js_jquery="yes" js_form="yes" js_jquery_validate="yes" js_rico="yes" js_product="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

	  				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

					<span>{#dico_management_product_menu_flow_list#}</span> 

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/product.png" alt="" />
										<span id='productflowlist_timer'></span><span id="productflowlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									
									
									<a target='_new' href="management_product.php?action=pdf" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div class="block_in_wrapper">

									<form id="form" class="main" method="post" action="./management_product.php?action=flowlist">
									
										<fieldset>
									
										<div>
											<label>{#dico_management_product_report_begda#}:</label>
											<input type = "text" value = "{$begda}" name = "begda" id="begda" class="{$errors.begda}" realname="{#dico_management_product_report_begda#}" onkeyup="javascript:valuebegda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											<label>{#dico_management_product_report_endda#}:</label>
											<input type = "text" value = "{$endda}" name = "endda" id="endda" class="{$errors.endda}" realname="{#dico_management_product_report_endda#}" onkeyup="javascript:valueendda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											<input type="submit" name="validate" id="valideate" value="{#dico_management_product_report_submit#}" onfocus="javascript:this.select()" autocomplete="off"/>
										</div>
											
										</fieldset>
								
									</form>
								
								</div>
								
								<div id="messagecookie">
								
								
									<div class="table_head">
										<table id="productflowlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%">{#dico_management_product_search_colum_date#}</td>
												<td class="b" style="width:18%">{#dico_management_product_search_colum_name#}</td>
												<td class="b" style="width:12%">{#dico_management_product_search_colum_unit#}</td>
												<td class="b" style="width:8%">{#dico_management_product_search_colum_size#}</td>
												<td class="b" style="width:8%">{#dico_management_product_search_colum_es#}</td>
												<!--<td class="b" style="width:8%">{#dico_management_product_sail_price_htva#}</td>-->
												<!--<td class="b" style="width:8%">{#dico_management_product_tva#}</td>-->
												<!--<td class="b" style="width:8%">{#dico_management_product_sail_price#}</td>-->
												<td class="b" style="width:12%">{#dico_management_product_search_colum_consumer_name#}</td>
												<td class="b" style="width:8%">{#dico_management_product_consumer_type#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_proprietaire_name#}</td>
												<td class="b" style="width:14%">{#dico_management_product_search_colum_proprietaire_adresse#}</td>
												<td class="b" style="width:10%">{#dico_management_product_search_colum_lot_number#}</td>
												<td class="b" style="width:12%">{#dico_management_product_search_colum_comment#}</td>
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
		
		var valuebegda = null;
		var valueendda = null;

		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{filterUI:'t',width:90},{filterUI:'t',width:170},{width:70},{width:70},{filterUI:'t',width:50}, {width:150}, {filterUI:'t',width:50}, {width:100},{width:150},{filterUI:'t',width:70}, {filterUI:'t',width:150}]
		  	};
		  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('productflowlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
	</script>
	{/literal}

