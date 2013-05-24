{include file="template_header.tpl" js_jquery142="yes" js_ajax="yes" js_jqmodal="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				
					<a href="./admin_project.php">{#dico_admin_project_menu_dashboard#}</a>
					<a href="./admin_project.php?action=list_cost_center">{#dico_admin_project_cost_center_menu_list#}</a>
					<a href="./admin_project.php?action=list_project_task">{#dico_admin_project_project_task_menu_list#}</a>
					<span>{#dico_admin_project_assign_task_menu_list#}</span> 
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<a href="./admin_project.php?action=stat_costs_cc">{#dico_admin_project_project_stat_cost_cc#}</a>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>
					<a href="./admin_project.php?action=stat_costs_task">{#dico_admin_project_project_stat_cost_task#}</a>
				
				</div>
			
				<div class="ViewPane">
	
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					<div class="infowin_left" id = "systemmsg">
						{if $mode == "deassigned"}
							<span class="info_in_red"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_deassigned#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
				
					{*Projects*}
					<div class="block_a">
	
						<div class="in">
			
							<div class="headline">
						
								<h2><a href="#" id="projects_toggle" class="win_block" onclick = "toggleBlock('projects');"><img src="./templates/standard/img/symbols/projects.png" alt="" />
									<span>{#dico_admin_project_assign_task#}</span></a>
								</h2>
			
							</div>
							
							<a href="#" onclick="javascript:$('#adduser').toggle();" class="butn_link_b"><span>{#dico_admin_people_user_adduser#}</span></a><br />
							<div class="paging_wrapper" id="paging">
								<a href="./admin_project.php?action=assign_task&letter=A">A</a>
								<a href="./admin_project.php?action=assign_task&letter=B">B</a>
								<a href="./admin_project.php?action=assign_task&letter=C">C</a>
								<a href="./admin_project.php?action=assign_task&letter=D">D</a>
								<a href="./admin_project.php?action=assign_task&letter=E">E</a>
								<a href="./admin_project.php?action=assign_task&letter=F">F</a>
								<a href="./admin_project.php?action=assign_task&letter=G">G</a>
								<a href="./admin_project.php?action=assign_task&letter=H">H</a>
								<a href="./admin_project.php?action=assign_task&letter=I">I</a>
								<a href="./admin_project.php?action=assign_task&letter=J">J</a>
								<a href="./admin_project.php?action=assign_task&letter=K">K</a>
								<a href="./admin_project.php?action=assign_task&letter=L">L</a>
								<a href="./admin_project.php?action=assign_task&letter=M">M</a>
								<a href="./admin_project.php?action=assign_task&letter=N">N</a>
								<a href="./admin_project.php?action=assign_task&letter=O">O</a>
								<a href="./admin_project.php?action=assign_task&letter=P">P</a>
								<a href="./admin_project.php?action=assign_task&letter=Q">Q</a>
								<a href="./admin_project.php?action=assign_task&letter=R">R</a>
								<a href="./admin_project.php?action=assign_task&letter=S">S</a>
								<a href="./admin_project.php?action=assign_task&letter=T">T</a>
								<a href="./admin_project.php?action=assign_task&letter=U">U</a>
								<a href="./admin_project.php?action=assign_task&letter=V">V</a>
								<a href="./admin_project.php?action=assign_task&letter=W">W</a>
								<a href="./admin_project.php?action=assign_task&letter=X">X</a>
								<a href="./admin_project.php?action=assign_task&letter=Y">Y</a>
								<a href="./admin_project.php?action=assign_task&letter=Z">Z</a>
							</div>
							<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
						<div id="projects">
	
							<div class="table_head">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="a" style="width:5%"></td>
										<td class="a" style="width:3%"></td>
										<td class="b" style="width:30%">{#dico_admin_project_colum_name#}</td>
										<td class="c" style="width:30%">{#dico_admin_project_colum_firstname#}</td>
										<td class="d" style="width:30%">{#dico_admin_project_colum_familyname#}</td>
									</tr>
								</table>
							</div>
	
							<div class="table_body">
				
								<div>
							
									<ul id="accordion_projects">
											
									{section name=user loop=$users}
	
										{*Color-Mix*}
										{if $smarty.section.users.index % 2 == 0}
										<li class="bg_a">
										{else}
										<li class="bg_b">
										{/if}
		
											<table class="resume" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td class="a" style="width:5%;"></td>
													<td class="b" style="width:30%;">{$users[user].name}</td>
													<td class="c" style="width:30%;">{$users[user].firstname}</td>
													<td class="d" style="width:30%;">{$users[user].familyname}</td>
													</tr>
											</table>
	
											<div class="accordion_content">
													
												<table class="description" cellpadding="0" cellspacing="0"  width="100%">
													
													<tr valign="top">
															
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" width="90%">
	
															{section name = project_task loop=$project_tasks}
																{if $smarty.section.project_task.index % 2 == 0}
																<tr>
																	<td width="10%">
																		&nbsp;
																	</td>
																	<td>
																		<input type="checkbox" id="task_{$project_tasks[project_task].ID}" name="cboxwithlabel" value="Another check box">
																		<label for="task_{$project_tasks[project_task].ID}">{$project_tasks[project_task].name}</label>
																	</td>
																</tr>
																{/if}
															{/section}
		
															</table>
							
														</td>
														
														
														
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" width="90%">
	
															{section name = project_task loop=$project_tasks}
																{if $smarty.section.project_task.index % 2 == 1}
																<tr>
																	<td width="10%">
																		&nbsp;
																	</td>
																	<td>
																		<input type="checkbox" id="task_{$project_tasks[project_task].ID}" name="cboxwithlabel" value="Another check box">
																		<label for="task_{$project_tasks[project_task].ID}">{$project_tasks[project_task].name}</label>
																	</td>
																</tr>
																{/if}
															{/section}
		
															</table>
							
														</td>
														
													</tr>
													
												</table>
					
											</li>
											{/section}
											
										</ul>
					
									</div> {*Accordion End*}
								
								</div> {*Table_Body End*}
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
			
							</div> {*projects end*}
		
						</div> {*IN end*}
			
					</div> {*Block A end*}
				
				</div>
					
			</div>

		</div>

	</div>
	
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
						{#dico_admin_people_group_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="delete"><span>{#dico_admin_people_group_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_admin_people_group_button_cancel#}</span></a>
						</div>

					</fieldset>

			</form>

		</div>
	
	</div>

	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$('#confirmbox').jqm({
		});
	
		/*$("#accordion_projects").accordion({
			header: 'TABLE.resume',
			selectedClass: 'open',
			event: 'mouseover'
		});*/

	    $("form").validate({
			rules: {
				name : { required: true, remote: "php_request/check_group.php" }
   			},
   			messages: {
				name: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}",
 			    	remote: "{/literal}{#dico_admin_error_group_unique#}{literal}"
 			    	
 				}
			},
			submitHandler: function() {
				form.submit();
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
					systemeMessage('systemmsg');
				}
		});
		
		
	});
	</script>
	{/literal}
	
	
