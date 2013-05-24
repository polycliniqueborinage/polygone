{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_agenda="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php">{#dico_user_agenda_menu_day#}</a>
    				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
					<span>{#dico_user_agenda_menu_list#}</span>
	  				<a href="./user_agenda.php?action=fulllist">{#dico_user_agenda_menu_fulllist#}</a>
	  				<a href="./user_agenda.php?action=timeline">{#dico_user_agenda_menu_timeline#}</a>
	  				<a href="./user_agenda.php?action=schedule">{#dico_user_agenda_menu_schedule#}</a>
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg">
						{if $mode == "task_deleted"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_deleted#}</span>
						{/if}
						{if $mode == "task_closed"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_closed#}</span>
						{/if}
						{if $mode == "task_opened"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_opened#}</span>
						{/if}
						{if $mode == "task_added"}
						<span class="info_in_green"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_added#}</span>
						{/if}
						{if $mode == "task_edited"}
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/>{#dico_user_menu_task_edited#}</span>
						{/if}
						<span id = "update_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_update_done#}
						</span>
						<span id = "delete_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_delete_done#}
						</span>
						<span id = "add_done" class="info_in_green" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_add_done#}
						</span>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
					
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
                          		 				<a class="butn_check" href="#" onclick="javascript:close_task({$tasks[task].ID},'user_agenda.php?action=list&mode=task_closed')" title="{#dico_user_menu_button_close#}"></a>
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
					
					
					{*AGENDA*}
					<div class="block_c">
						
						<div class="in">						

							<div class="headline">

								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('agenda');"></a>
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php?action=day" title="">
												<img src="./templates/standard/images/symbols/miles.png" alt="" />
											</a>
											<span id="title"></span>
										</h2>
									</div>
								</div>
																   
							</div>

							<div class="neutral">
			
								<div class="block" id="agenda">

									<div class="nosmooth" id="agenda_list"></div>

								</div>

							</div>

						</div>

					</div>
					{*AGENDA END*}



					{*OLD TASKS*}
					{if $otasknum > 0}
					<div class="block_c">
						
						<div class="in">
						
							<div class="headline">

								<a href="#" id="oldtasks_toggle" class="win_none" onclick = "toggleBlock('oldtasks');"></a>
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php?action=list" title="{#dico_user_menu_tasks_closed_title#}">
												<img src="./templates/standard/images/symbols/task.png" alt="" />
												<span>{#dico_user_menu_tasks_closed_title#}</span>
											</a>
										</h2>
									</div>
								</div>
																   
							</div>
								
							<div class="neutral">

								<div class="block" id="oldtasks" style="display: none;>

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
					
												{section name = otask loop=$otasks}

												{*Color-Mix*}
												{if $smarty.section.otask.index % 2 == 0}
												<tbody class="color-a" id="task_{$tasks[task].ID}">
												{else}
												<tbody class="color-b" id="task_{$tasks[task].ID}">
												{/if}
												<tr {if $otasks[otask].daysleft < 0} class="marker-late"{elseif $tasks[task].daysleft == 0} class="marker-today"{/if}>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_task_box({$otasks[otask].ID})" title="{#dico_user_agenda_task_view#}" ></a>
													<a class="tool_edit" href="user_agenda.php?action=task_edit&id={$otasks[otask].ID}" title="{#dico_user_agenda_task_edit#}" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_task_confirmbox({$otasks[otask].ID})" title="{#dico_user_agenda_task_delete#}" ></a>
												</td>
												<td>
												{if $otasks[otask].title != ""}
													{$otasks[otask].title|truncate:30:"...":true}
												{else}
													{$otasks[otask].text|truncate:30:"...":true}
												{/if}
												</td>
												<td>{$otasks[otask].daysleft}</td>
												<td>
                          		 				<a class="butn_check" href="#" onclick="javascript:open_task({$otasks[otask].ID},'user_agenda.php?action=list&mode=task_opened')" title="{#dico_user_menu_button_open#}"></a>
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

				</div>
					
			</div>

		</div>

	</div>

	<!-- AGENDA -->
	<div class="jqmWindow" id="agendaaddbox">
		<div class="jqmConfirmWindow">
		    <div id="add_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_addbox_title#}</h1>
  			</div>
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_updatebox_title#}</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		{#dico_user_agenda_addbox_from#} <div class="startconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_to#} <div class="endconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_length#} <div class="length" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_time#}
 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient#}:</label><input type="text" name="patient" id="patient" realname="{#dico_user_agenda_addbox_patient#}" onfocus="javascript:this.select()"  onkeyup="javascript:patientAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationPatient"></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif#}:</label><input type="text" name="motif" id="motif" realname="{#dico_user_agenda_addbox_motif#}" onfocus="javascript:this.select()" onkeyup="javascript:motifAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationMotif"></div>
						<div class="row"><label for="location">{#dico_user_agenda_addbox_location#}:</label><input type="text" name="location" id="location" realname="{#dico_user_agenda_addbox_location#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
						<div class="row"><label for="desc">{#dico_user_agenda_addbox_comment#}:</label><textarea name="comment" id="comment" rows="3" cols="1" ></textarea></div>
						<input type="hidden" size="15" name="id" id="id" value=""/>
						<input type="hidden" size="15" name="motif_id" id="motif_id" value=""/>
						<input type="hidden" size="15" name="patient_id" id="patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="add"><span id="add_button">{#dico_user_agenda_addbox_button_add#}</span><span id="update_button">{#dico_user_agenda_addbox_button_update#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
		
	<div class="jqmWindow" id="agendaviewbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_viewbox_title#}</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		{#dico_user_agenda_addbox_from#} <div id="detail_start" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_to#} <div id="detail_end" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_length#} <div id="detail_length" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_time#}
 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient#}:</label><div id="detail_patient"></div></div>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient_addresse#}:</label><div id="detail_patient_addresse"></div></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif#}:</label><div id="detail_motif"></div></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif_description#}:</label><div id="detail_motif_description"></div></div>
						<div class="row"><label for="location">{#dico_user_agenda_addbox_location#}:</label><div id="detail_location"></div></div>
						<div class="row"><label for="desc">{#dico_user_agenda_addbox_comment#}:</label><div id="detail_comment"></div></div>
						<input type="hidden" size="15" name="detail_id" id="detail_id" value=""/>
						<input type="hidden" size="15" name="detail_motif_id" id="detail_motif_id" value=""/>
						<input type="hidden" size="15" name="detail_patient_id" id="detail_patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<div id="edit_button">
								<a href="#" onclick="javascript:editConsultation($('#detail_id').val());" class="butn_link"><span>{#dico_user_agenda_addbox_button_edit#}</span></a>
							</div>
							<a href="#" onclick="javascript:deleteConsultationBox();" class="butn_link"><span>{#dico_user_agenda_addbox_button_del#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="agendaconfirmbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
  		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_user_agenda_confirm_delete_task#}
					</div>
					<div class="clear_both_b"></div>
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteConsultation('list');$('#agendaconfirmbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_user_agenda_addbox_button_del#}</span></a>
							<a href="#" onclick="$('#agendaconfirmbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
						</div>
				</fieldset>
			</form>
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
	
	{literal}
	<script>
		$(document).ready(function(){
		
			$('#agendaconfirmbox').jqm({
			});

			$('#agendaviewbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$("#detail_start").html('');
	      			$("#detail_end").html('');
	      			$("#detail_length").html('');
	     	 		$("#detail_patient").html('');
	     	 		$("#detail_motif").html('');
	     	 		$("#detail_location").html('');
	     	 		$("#detail_comment").html('');
	     	 		$("#detail_patient_addresse").html('');
	     	 		$("#detail_motif_description").html('');
	     	 		$("#detail_id").val('');
	     	 		$("#detail_patient_id").val('');
	     	 		$("#detail_motif_id").val('');
		    	}
			});
			
			$('#agendaaddbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$('.selectableitem_1').removeClass("selecteditem");
			    	if (add == true) {
		    			modifConsultation($('#id').val(),$('#patient').val(),$('#patient_id').val(),$('#motif').val(),$('#motif_id').val(),$('#location').val(),$('#comment').val(),'list');
			    		add = false;
			    	}
			    	$('#id').val('');
			    	$('#patient').val('');
			    	$('#patient_id').val('');
			    	$('#motif').val('');
			    	$('#motif_id').val('');
			    	$('#location').val('');
			    	$('#comment').val('');
			    	$('#overlayInformationPatient').html('');
			    	$('#overlayInformationMotif').html('');
		    	}
			});

			$('#taskconfirmbox').jqm({ });
			$('#taskviewbox').jqm({ });
			changeDay(0,'list');
  		});
  	</script>
	{/literal}