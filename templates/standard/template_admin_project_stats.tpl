{include file="template_header.tpl" js_jquery132="yes" js_filtergrid="yes" js_new_datepicker="yes" js_ajax="yes" js_workschedule="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./admin_project.php">{#dico_admin_project_menu_dashboard#}</a>
   					<a href="./admin_project.php?action=list_cost_center">{#dico_admin_project_cost_center_menu_list#}</a>
					<a href="./admin_project.php?action=list_project_task">{#dico_admin_project_project_task_menu_list#}</a>
					{if $type=="T"}					
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<a href="./admin_project.php?action=stat_costs_cc">{#dico_admin_project_project_stat_cost_cc#}</a>
					<span>{#dico_admin_project_project_stat_task#}</span>
					<a href="./admin_project.php?action=stat_costs_task">{#dico_admin_project_project_stat_cost_task#}</a>
					{elseif $type=='C'}
					<span>{#dico_admin_project_project_stat_cc#}</span>
					<a href="./admin_project.php?action=stat_costs_cc">{#dico_admin_project_project_stat_cost_cc#}</a>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>
					<a href="./admin_project.php?action=stat_costs_task">{#dico_admin_project_project_stat_cost_task#}</a>
					{elseif $type=='CT'}
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<a href="./admin_project.php?action=stat_costs_cc">{#dico_admin_project_project_stat_cost_cc#}</a>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>
					<span>{#dico_admin_project_project_stat_cost_task#}</span>
					{elseif $type=='CC'}					
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<span>{#dico_admin_project_project_stat_cost_cc#}</span>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>
					<a href="./admin_project.php?action=stat_costs_task">{#dico_admin_project_project_stat_cost_task#}</a>					
					{/if}
					
 
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('dwsedit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
										{if $type=="T"}
											<span>{#navigation_title_timesheet_stats_tasks#}</span>
										{elseif $type=='C'}	
											<span>{#navigation_title_timesheet_stats_cc#}</span>
										{elseif $type=='CT'}
											<span>{#navigation_title_timesheet_stats_costs_tasks#}</span>
										{elseif $type=='CC'}
											<span>{#navigation_title_timesheet_stats_costs_cc#}</span>	
										{/if}	
								</a>
								
								<a href="admin_project.php?action=stat_print&begda={$begda}&endda={$endda}&type={$type}&userid={$selected_user}" style="float:right">
									<img src="./templates/standard/img/16x16/printer.png" alt="" />
								</a>
								</h2>
							</div>
							
								<form id="form" class="main" method="post" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type = "hidden" name = "type"  id="type" value={$type}/>
											<div class="row"><label for = "begda"> {#dico_management_product_report_begda#}:</label><input type = "text" name = "begda"  id="begda" value={$begda} realname="{#dico_management_product_report_begda#}"  autocomplete="off"  onclick='fPopCalendar("begda")'/></div>
											<div class="row"><label for = "endda">{#dico_management_product_report_endda#}:</label><input type = "text" name = "endda" id="endda" value={$endda} realname="{#dico_management_product_report_endda#}" autocomplete="off" onclick='fPopCalendar("endda")'/></div>
											<div class="row"><label for = "userid">{#dico_admin_people_user_user#}:</label>
												<select name = "userid" id="userid}" realname="{#dico_admin_people_user_user#}" autocomplete="off" onchange="document.forms['form'].submit();">
													<option value="">{#dico_management_timesheet_stats_user#}</option>
													{section name=ts_users loop=$ts_users}
														{if $ts_users[ts_users].ID == $selected_user}
															<option value="{$ts_users[ts_users].ID}" SELECTED>{$ts_users[ts_users].familyname} {$ts_users[ts_users].firstname}</option>
														{else}
															<option value="{$ts_users[ts_users].ID}">{$ts_users[ts_users].familyname} {$ts_users[ts_users].firstname}</option>
														{/if}	
													{/section}	
												</select>
											</div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
							<div style = "">
			
								<div class="block_in_wrapper">
								<table id="statstable" width='100%' rules='rows' align='left' class="ricoLiveGrid">
								<tr>
									<th width="10%" align="left">{#dico_management_timesheet_stats_code#}</th>
									<th width="30%" align="left">{#dico_management_timesheet_stats_name#}</th>
									{if $type=='T' || $type=='C'}
										<th width="15%" align="left">{#dico_management_timesheet_stats_nbhours#}</th>
									{else}	
										<th width="15%" align="left">{#dico_management_timesheet_stats_couts#}</th>
									{/if}	
									<th width="15%" align="left">{#dico_management_timesheet_stats_pourcentage#}</th>
									{if $type=='T' || $type=='C'}
										<th width="15%" align="left">{#dico_management_timesheet_stats_nbhours_cumule#}</th>
									{else}	
										<th width="15%" align="left">{#dico_management_timesheet_stats_couts_cumule#}</th>
									{/if}	
									<th width="15%" align="left">{#dico_management_timesheet_stats_pourcentage_cumule#}</th>
								</tr>	
								{section name=stats loop=$stats}
								<tr>
									<td width="10%">{$stats[stats][1]}</td>
									<td width="30%">{$stats[stats][2]}</td>
									<td width="15%">{$stats[stats][3]}</td>
									<td width="15%">{$cumul[stats][1]}</td>
									<td width="15%">{$cumul[stats][0]}</td>
									<td width="15%">{$cumul[stats][2]}</td>
								</tr>
								{/section}
								</table>
								
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
	
	{literal}
		<script language="javascript" type="text/javascript">			
			var MyTableFilter = { 	col_2: "none",
									col_3: "none",
									col_4: "none",
									col_5: "none",
									exact_match: "true",
									col_width: ['10%','30%','15%','15%','15%','15%'] }
			setFilterGrid("statstable", 0, MyTableFilter);
		</script> 
	{/literal}
	
