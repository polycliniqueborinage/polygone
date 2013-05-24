{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_thickbox="yes" js_product="yes" js_form="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<span>{#dico_admin_activity_day#}</span> 

    				<a href="./admin_activity.php?action=all">{#dico_admin_activity_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						
					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="history_toggle" class="win_block" onclick = "toggleBlock('history');"><img src="./templates/standard/img/symbols/timetracker.png" alt="" />
								<span>{#dico_admin_activity_submenu_day#}</span></a>
								</h2>
						
							</div>
					
							<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:22%">{#dico_admin_activity_search_colum_date#}</td>
												<td class="b" style="width:12%">{#dico_admin_activity_search_colum_user_name#}</td>
												<td class="b" style="width:12%">{#dico_admin_activity_search_colum_object#}</td>
												<td class="b" style="width:12%">{#dico_admin_activity_search_colum_type#}</td>
												<td class="b" style="width:40%">{#dico_admin_activity_search_colum_action#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										{section name=log loop=$logs}
										
										{if $smarty.section.log.index % 2 == 0}
										<li class="bg_a">
										{else}
										<li class="bg_b">
										{/if}
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:22%">{$logs[log].date}</td>
												<td class="b" style="width:12%">{$logs[log].user_name}</td>
												<td class="b" style="width:12%">{$logs[log].object}</td>
												<td class="b" style="width:12%">{$logs[log].type}</td>
												<td class="b" style="width:40%">{$logs[log].action}</td>
											</tr>
										</table>
									
										</li>

	
										{/section}
										
									</div> {*Table_Body End*}
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
							</div>
			        		    
						</div> {*IN end*}
							
					</div> {*Block A end*}
						
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_right.tpl"}
	