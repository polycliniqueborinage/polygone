{include file="template_header.tpl" js_rico="yes" js_debt="yes"}

	<div id="middle">
		
		{if $modules.management_debt_adminstate == 3}
			{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_debt_adminstate == 4}
			{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./management_debt.php?action=search">{#dico_management_debt_menu_search#}</a>

    				<a href="./management_debt.php?action=add">{#dico_management_debt_menu_add#}</a>

					<span>{#dico_management_debt_menu_list#}</span> 

    				<a href="./management_debt.php?action=contact_list">{#dico_management_debt_menu_contact_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/debt.png" alt="" />
										<span id='debtlist_timer'></span><span id="debtlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<!--a href="javascript:void(0);" style="float:right">
										<img src="./templates/standard/img/symbols/print.png" alt="" />
									</a-->
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="debtlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%">{#dico_management_debt_search_colum_action#}</td>
												<td class="b" style="width:17%">{#dico_management_debt_search_colum_amount#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_creation_date#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_contact#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_workphone#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_mobilephone#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_privatephone#}</td>
												<td class="b" style="width:12%">{#dico_management_debt_search_colum_comment#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="debtBox">
																
										</div> {*Accordion End*}
										
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

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:50},{filterUI:'t',width:70},{filterUI:'t',width:90},{filterUI:'t',width:150},{width:120},{width:120},{width:120},{filterUI:'t',width:300}]
		  	};
			
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});

			orderGrid=new Rico.LiveGrid ('debtlist', buffer, opts);
			
			orderGrid.menu=new Rico.GridMenu();
		});
	</script>
	{/literal}
