{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_ajax="yes" js_jquery_datepicker="no" js_jqmodal="yes" js_agenda="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_profil.php">{#dico_user_profil_menu_account#}</a>
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "task_deleted"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_deleted#}</span>
						{/if}
						{if $mode == "task_closed"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_closed#}</span>
						{/if}
						{if $mode == "task_added"}
						<span class="info_in_green"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_added#}</span>
						{/if}
						{if $mode == "task_edited"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_edited#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
				
					{*AGENDA*}
					<div class="block_b">
						
						<div class="in">
							
							<div class="headline">

								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('agenda');"></a>
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php" title="{#dico_user_menu_agenda_title#}">
												<img src="./templates/standard/images/symbols/agenda.png" alt="" />
												<span>{#dico_user_menu_agenda_span#}</span>
											</a>
										</h2>
									</div>
								</div>
																   
							</div>
							   
							<div class="block" id="agenda">
								<div id = "thecal" class="bigcal"></div>
							</div> {*block End*}
				
						</div>
							
					</div>
					{*AGENDA END*}
					
					
					{*TASKS*}
					{if $tasknum > 0}
					<div class="block_c">
						
						<div class="in">
						
							<div class="headline">

								<a href="#" id="tasks_toggle" class="win_block" onclick = "toggleBlock('tasks');"></a>
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php?action=list" title="{#dico_user_menu_tasks_opened_title#}">
												<img src="./templates/standard/images/symbols/task.png" alt="" />
												<span>{#dico_user_menu_tasks_opened_title#}</span>
											</a>
										</h2>
									</div>
								</div>
																   
							</div>
								
							<div class="neutral">

								<div class="block" id="tasks">

									<div class="nosmooth">
				
										<table cellpadding="0" cellspacing="0" border="0">

											<thead>
					
												<tr>
													<th class="tools"></th>
													<th class="b" >{#dico_user_menu_task_colum_task#}</th>
													<th>{#dico_user_menu_task_colum_dayleft#}</th>
													<th></th>
												</tr>
							
											</thead>

												<tfoot>
												<tr>
												<td colspan="5"></td>
												</tr>
												</tfoot>
					
												{section name = task loop=$tasks}

												{*Color-Mix*}
												{if $smarty.section.task.index % 2 == 0}
												<tbody class="color-a" id="task_{$tasks[task].ID}">
												{else}
												<tbody class="color-b" id="task_{$tasks[task].ID}">
												{/if}
												<tr {if $tasks[task].daysleft < 0} class="marker-late"{elseif $tasks[task].daysleft == 0} class="marker-today"{/if}>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_task_box({$tasks[task].ID});" title="{#dico_user_agenda_task_view#}" ></a>
													<a class="tool_edit" href="user_agenda.php?action=task_edit&id={$tasks[task].ID}" title="{#dico_user_agenda_task_edit#}" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_task_confirmbox({$tasks[task].ID});" title="{#dico_user_agenda_task_delete#}" ></a>
												</td>
												<td>
												{if $tasks[task].title != ""}
													{$tasks[task].title|truncate:30:"...":true}
												{else}
													{$tasks[task].text|truncate:30:"...":true}
												{/if}
												</td>
												<td>{$tasks[task].daysleft}</td>
												<td>
                          		 				<a class="butn_check" href="#" onclick="javascript:close_task({$tasks[task].ID},'user_menu.php?mode=task_closed')" title="{#close#}"></a>
                        	  				  	</td>
												</tr>

												</tbody>
												{/section}
												
	
										</table>

									</div>
										
								</div>
								
							</div>
							
						</div>
						
					</div>
					{/if}
					{*TASKS END*}
					
					
					
					
				
					{*Messages*}
					{if $msgnum > 0}{if $adminstate > 0}
					
					<div class="block_a">
						
							<div class="in">
							
							   <div class="headline">
								  	
								  	<a href="#" id="messagecookie_toggle" class="win_block" onclick = "toggleBlock('messagecookie');"></a>
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
									<div style="position:relative;">
									
										<div class="win_tools">
											<h2>
												<a href="user_message.php" title="{#dico_user_menu_messages_title#}">
													<img src="./templates/standard/img/symbols/msgs.png" alt="" />
													<span>{#dico_user_menu_messages_span#}</span>
												</a>
											</h2>
										</div>
									</div>
									
								</div>
					
								<div id="messagecookie">
									
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="a" style="width:5%"></td>
												<td class="a" style="width:5%"></td>
												<td class="b" style="width:20%">{#dico_user_menu_messages_colum_message#}</td>
												<td class="c" style="width:20%">{#dico_user_menu_messages_colum_group#}</td>
												<td class="d" style="width:20%">{#dico_user_menu_messages_colum_sendby#}</td>
												<td class="e" style="width:20%">{#dico_user_menu_messages_colum_on#}</td>
												<td>{#dico_user_menu_messages_colum_replies#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div>
										
										<ul id="accordion_messages">
											
											{section name=message loop=$messages}
					
											{*Color-Mix*}
											{if $smarty.section.message.index % 2 == 0}
												<li class="bg_a">
											{else}
												<li class="bg_b">
											{/if}
															
													<table class="resume" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td class="a" style="width:5%;">
																	<div class="accordion_toggle">
																		<a class="" style="width:20px;" href="javascript:void(0);" onclick = ""></a>
																	</div>
																</td>
																<td class="a" style="width:5%;">
																	<a class="butn_reply" href="user_message.php?action=add&amp;mid={$messages[message].ID}&amp;id={$messages[message].group}" title="{#dico_user_menu_messages_answer#}"></a>
																</td>
																<td class="b" style="width:20%;">{$messages[message].title|truncate:25:"...":true}</td>
																<td class="c" style="width:20%;">{$messages[message].pname|truncate:20:"...":true}</td>
																<td class="d" style="width:20%;">{$messages[message].username|truncate:20:"...":true}</td>
																<td class="e" style="width:20%;">{$messages[message].postdate}</td>
																<td style="">{$messages[message].replies}</td>
															</tr>
													</table>
														
													<div id="messages_focus{$messages[message].ID}" class="focus_off">

														<div class="accordion_content">
														
															<table class="description" cellpadding="0" cellspacing="0" width="100%">
																<tr valign="top">
																	<td class="a"></td>
		
																	<td class="b" style="width:180px;">
																	{if $messages[message].avatar != ""}
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=files/{$cl_config}/avatar/{$messages[message].avatar}" alt="" /></div>
																	{else}
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
																	{/if}
																	</td>
		
																	<td class="message">
																	
																		<div class="msgin">{$messages[message].text|nl2br}</div>
																		
																		<!-- MESSAGE TEXT -->
																		{if $messages[message].tagnum > 1}<br /><strong>{#tags#}:</strong>
																		{section name = tag loop=$messages[message].tagsarr}
																			<a href = "managetags.php?action=gettag&tag={$messages[message].tagsarr[tag]}&amp;id={$messages[message].group}">{$messages[message].tagsarr[tag]}</a>
																		{/section}
																		{/if}
					
																		<!-- MESSAGE FILE -->
																		{if $messages[message].files[0][0] > 0}
																		<table cellpadding="0" cellspacing="0" style="border-top:1px dashed;margin:15px 0;width=100%">
																			<tr><td colspan="3" class="thead" style="padding:9px 0 3px 0;">{#dico_user_menu_messages_file#}</td></tr>
																			{section name = file loop=$messages[message].files}
																			<tr class="{cycle values="bg_one,bg_two"}">
																				<td style="width:10%;padding:2px 0;">
																					<a href = "{$messages[message].files[file].datei}" {if $messages[message].files[file].imgfile == 1} rel="lytebox[]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text]" {/if}><img src = "templates/standard/img/symbols/files/{$messages[message].files[file].type}.png" alt="{$messages[message].files[file].name}" /></a>
																				</td>
																				<td style="width:90%;padding:0 0 0 5px;">
																					<a href = "{$messages[message].files[file].datei}" {if $messages[message].files[file].imgfile == 1} rel="lytebox[img{$messages[message].ID}]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text{$messages[message].ID}]"{/if}>{$messages[message].files[file].name}</a>
																				</td>
																				<td class="tools" style="width:26px;padding:0;">
																				</td>
																			</tr>
																			{/section}
																		</table>
																		{/if}
																		
																	</td>
																</tr>
															</table>
														
														</div> {*Accordion_Content End*}
							
													</div> {*Focus End*}
					
											</li>
											{/section}
											
											</ul>
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
							</div> {*IN end*}
						</div> {*Block A end*}
					
					{/if}{/if}
					{*Messages End*}		

				</div>
					
			</div>

		</div>

	</div>
	
	
	<!-- TASKS -->
	<div class="jqmWindow" id="taskviewbox">
	</div>
	
	<div class="jqmWindow" id="taskconfirmbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
					{#dico_user_menu_confirm_delete_task#}
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:delete_task('user_agenda.php?action=list&mode=task_deleted');" class="butn_link" id="delete"><span>{#dico_user_menu_button_delete#}</span></a>
						<a href="#" class="butn_link" id="cancel"><span>{#dico_user_menu_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	{include file="template_left.tpl" acte_search="no" patient_search="no" product_search="no" debt_search="no" user_search="no" addressbook_search="no"}

	{include file="template_right.tpl" useronline="no" chat="no" calendar_light="yes"}
	
	{literal}
		<script type = "text/javascript">
		function changecalendar(url){
	   		$("#progress").show();
			$("#thecal").load(url, {limit: 25}, function(){
		   		$("#progress").hide();
			});
		}
		
		$(document).ready(function() {
			changecalendar("user_menu.php?action=newcal");
			$('#taskconfirmbox').jqm({ });
			$('#taskviewbox').jqm({ });
		});
		</script>
	{/literal}
	
