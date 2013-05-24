{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" }
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					
    				<a href="./user_services.php?action=team_calendar">{#navigation_title_user_services_teamcalendar#}</a>
    				<span>{#navigation_title_user_services_pending_requests#}</span>
    				<a href="./user_services.php?action=quota_overview">{#navigation_title_user_services_quotas#}</a>
    				<a href="./user_services.php?action=absence_request">{#navigation_title_user_services_leaverequest#}</a>
    				{if $ismanager == 'X'}
    					<a href="./user_services.php?action=tasks_overview">{#navigation_user_mss#}</a>
    					<a href="./user_services.php?action=my_teams_calendar">{#navigation_title_user_services_myteamscalendar#}</a>
    				{/if}
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#navigation_title_user_services_pending_requests#}</span>
									</a>
								</h2>
								
							</div>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%">{#dico_user_myservices_absencetype#}</td>
												<td class="b" style="width:10%">{#dico_user_myservices_begda#}</td>
												<td class="b" style="width:10%">{#dico_user_myservices_endda#}</td>
												<td class="b" style="width:10%">{#dico_user_myservices_beghr#}</td>
												<td class="b" style="width:10%">{#dico_user_myservices_endhr#}</td>
												<td class="b" style="width:16%">{#dico_user_myservices_comment#}</td>
												<td class="b" style="width:14%">{#dico_user_myservices_leaverequest_status#}</td>
												<td class="b" style="width:16%">{#dico_user_myservices_leaverequest_owner#}</td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										{section name=absence loop=$absences}
										
										{if $smarty.section.log.index % 2 == 0}
										<li class="bg_a">
										{else}
										<li class="bg_b">
										{/if}
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%">{$absences[absence].absenceid}</td>
												<td class="b" style="width:10%">{$absences[absence].begda}</td>
												<td class="b" style="width:10%">{$absences[absence].endda}</td>
												<td class="b" style="width:10%">{$absences[absence].beghr}</td>
												<td class="b" style="width:10%">{$absences[absence].endhr}</td>
												<td class="b" style="width:16%">{$absences[absence].textcomment}</td>
												<td class="b" style="width:14%">{$absences[absence].status_description}</td>
												<td class="b" style="width:16%">{$absences[absence].owner_name}</td>
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
	
	