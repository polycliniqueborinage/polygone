{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" }
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					
    				<a href="./user_services.php?action=team_calendar">{#navigation_title_user_services_teamcalendar#}</a>
    				<a href="./user_services.php?action=leave_overview">{#navigation_title_user_services_pending_requests#}</a>
    				<a href="./user_services.php?action=quota_overview">{#navigation_title_user_services_quotas#}</a>
    				<a href="./user_services.php?action=absence_request">{#navigation_title_user_services_leaverequest#}</a>
    				{if $ismanager == 'X'}
    					<span>{#navigation_user_mss#}</span>
    					<a href="./user_services.php?action=my_teams_calendar">{#navigation_title_user_services_myteamscalendar#}</a>
    				{/if}
    				
				</div>
			
				<div class="ViewPane">
				
					{if $message != ''}
						<div class="infowin_left" id = "systemmsg">
							<div>
								<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{$message}</span>
	    					</div>
						</div>
						<script>
							systemeMessage('systemmsg',3000);
						</script>
					{/if}
					
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#navigation_user_mss#}</span>
									</a>
								</h2>
								
							</div>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:26%">{#dico_user_myservices_action#}</td>
												<td class="b" style="width:10%">{#dico_user_myservices_type#}</td>
												<td class="b" style="width:15%">{#dico_user_myservices_requester#}</td>
												<td class="b" style="width:45%">{#dico_user_myservices_request#}</td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										{section name=request loop=$requests}
										
										{if $smarty.section.log.index % 2 == 0}
										<li class="bg_a">
										{else}
										<li class="bg_b">
										{/if}
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:26%">{$requests[request].actions}</td>
												<td class="b" style="width:10%">{$requests[request].type}</td>
												<td class="b" style="width:15%">{$requests[request].requester}</td>
												<td class="b" style="width:45%">{$requests[request].request}</td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									
										</li>

	
										{/section}
										
									</div> {*Table_Body End*}
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
							</div>
			
						</div> {*IN end*}
					
					</div> {*Block B end*}	
					
				</div>
					
			</div>

	</div>
	

	{literal}

	{/literal}
	
	