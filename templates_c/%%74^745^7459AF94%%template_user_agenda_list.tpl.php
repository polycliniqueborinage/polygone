<?php /* Smarty version 2.6.19, created on 2012-10-15 13:26:16
         compiled from template_user_agenda_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_user_agenda_list.tpl', 119, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jqmodal' => 'yes','js_agenda' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_day']; ?>
</a>
    				<a href="./user_agenda.php?action=week"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_week']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_list']; ?>
</span>
	  				<a href="./user_agenda.php?action=fulllist"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_fulllist']; ?>
</a>
	  				<a href="./user_agenda.php?action=timeline"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_timeline']; ?>
</a>
	  				<a href="./user_agenda.php?action=schedule"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_schedule']; ?>
</a>
	  				<a href="./user_agenda.php?action=task_add"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_add']; ?>
</a>
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'task_deleted'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_deleted']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'task_closed'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_closed']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'task_opened'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_opened']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'task_added'): ?>
						<span class="info_in_green"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_added']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'task_edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_edited']; ?>
</span>
						<?php endif; ?>
						<span id = "update_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_update_done']; ?>

						</span>
						<span id = "delete_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_delete_done']; ?>

						</span>
						<span id = "add_done" class="info_in_green" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_add_done']; ?>

						</span>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
					
										<?php if ($this->_tpl_vars['tasknum'] > 0): ?>
					<div class="block_c">
						
						<div class="in">
						
							<div class="headline">

								<a href="#" id="tasks_toggle" class="win_block" onclick = "toggleBlock('tasks');"></a>
									
								<div class="clear_both"></div> 									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php?action=list" title="<?php echo $this->_config[0]['vars']['dico_user_menu_tasks_opened_title']; ?>
">
												<img src="./templates/standard/images/symbols/task.png" alt="" />
												<span><?php echo $this->_config[0]['vars']['dico_user_menu_tasks_opened_title']; ?>
</span>
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
													<th class="b" ><?php echo $this->_config[0]['vars']['dico_user_menu_task_colum_task']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_user_menu_task_colum_dayleft']; ?>
</th>
													<th></th>
												</tr>
							
											</thead>

												<tfoot>
												<tr>
												<td colspan="5"></td>
												</tr>
												</tfoot>
					
												<?php unset($this->_sections['task']);
$this->_sections['task']['name'] = 'task';
$this->_sections['task']['loop'] = is_array($_loop=$this->_tpl_vars['tasks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['task']['show'] = true;
$this->_sections['task']['max'] = $this->_sections['task']['loop'];
$this->_sections['task']['step'] = 1;
$this->_sections['task']['start'] = $this->_sections['task']['step'] > 0 ? 0 : $this->_sections['task']['loop']-1;
if ($this->_sections['task']['show']) {
    $this->_sections['task']['total'] = $this->_sections['task']['loop'];
    if ($this->_sections['task']['total'] == 0)
        $this->_sections['task']['show'] = false;
} else
    $this->_sections['task']['total'] = 0;
if ($this->_sections['task']['show']):

            for ($this->_sections['task']['index'] = $this->_sections['task']['start'], $this->_sections['task']['iteration'] = 1;
                 $this->_sections['task']['iteration'] <= $this->_sections['task']['total'];
                 $this->_sections['task']['index'] += $this->_sections['task']['step'], $this->_sections['task']['iteration']++):
$this->_sections['task']['rownum'] = $this->_sections['task']['iteration'];
$this->_sections['task']['index_prev'] = $this->_sections['task']['index'] - $this->_sections['task']['step'];
$this->_sections['task']['index_next'] = $this->_sections['task']['index'] + $this->_sections['task']['step'];
$this->_sections['task']['first']      = ($this->_sections['task']['iteration'] == 1);
$this->_sections['task']['last']       = ($this->_sections['task']['iteration'] == $this->_sections['task']['total']);
?>

																								<?php if ($this->_sections['task']['index'] % 2 == 0): ?>
												<tbody class="color-a" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php else: ?>
												<tbody class="color-b" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php endif; ?>
												<tr <?php if ($this->_tpl_vars['tasks'][$this->_sections['task']['index']]['daysleft'] < 0): ?> class="marker-late"<?php elseif ($this->_tpl_vars['tasks'][$this->_sections['task']['index']]['daysleft'] == 0): ?> class="marker-today"<?php endif; ?>>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_task_box(<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
);" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_view']; ?>
" ></a>
													<a class="tool_edit" href="user_agenda.php?action=task_edit&id=<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_edit']; ?>
" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_task_confirmbox(<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
);" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_delete']; ?>
" ></a>
												</td>
												<td>
												<?php if ($this->_tpl_vars['tasks'][$this->_sections['task']['index']]['title'] != ""): ?>
													<?php echo ((is_array($_tmp=$this->_tpl_vars['tasks'][$this->_sections['task']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

												<?php else: ?>
													<?php echo ((is_array($_tmp=$this->_tpl_vars['tasks'][$this->_sections['task']['index']]['text'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

												<?php endif; ?>
												</td>
												<td><?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['daysleft']; ?>
</td>
												<td>
                          		 				<a class="butn_check" href="#" onclick="javascript:close_task(<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
,'user_agenda.php?action=list&mode=task_closed')" title="<?php echo $this->_config[0]['vars']['dico_user_menu_button_close']; ?>
"></a>
                        	  				  	</td>
												</tr>

												</tbody>
												<?php endfor; endif; ?>
												
	
										</table>

									</div>
										
								</div>
								
							</div>
							
						</div>
						
					</div>
					<?php endif; ?>
										
					
										<div class="block_c">
						
						<div class="in">						

							<div class="headline">

								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('agenda');"></a>
									
								<div class="clear_both"></div> 									
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
					


										<?php if ($this->_tpl_vars['otasknum'] > 0): ?>
					<div class="block_c">
						
						<div class="in">
						
							<div class="headline">

								<a href="#" id="oldtasks_toggle" class="win_none" onclick = "toggleBlock('oldtasks');"></a>
									
								<div class="clear_both"></div> 									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php?action=list" title="<?php echo $this->_config[0]['vars']['dico_user_menu_tasks_closed_title']; ?>
">
												<img src="./templates/standard/images/symbols/task.png" alt="" />
												<span><?php echo $this->_config[0]['vars']['dico_user_menu_tasks_closed_title']; ?>
</span>
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
													<th class="b" ><?php echo $this->_config[0]['vars']['dico_user_menu_task_colum_task']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_user_menu_task_colum_dayleft']; ?>
</th>
													<th></th>
												</tr>
							
											</thead>

												<tfoot>
												<tr>
												<td colspan="5"></td>
												</tr>
												</tfoot>
					
												<?php unset($this->_sections['otask']);
$this->_sections['otask']['name'] = 'otask';
$this->_sections['otask']['loop'] = is_array($_loop=$this->_tpl_vars['otasks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['otask']['show'] = true;
$this->_sections['otask']['max'] = $this->_sections['otask']['loop'];
$this->_sections['otask']['step'] = 1;
$this->_sections['otask']['start'] = $this->_sections['otask']['step'] > 0 ? 0 : $this->_sections['otask']['loop']-1;
if ($this->_sections['otask']['show']) {
    $this->_sections['otask']['total'] = $this->_sections['otask']['loop'];
    if ($this->_sections['otask']['total'] == 0)
        $this->_sections['otask']['show'] = false;
} else
    $this->_sections['otask']['total'] = 0;
if ($this->_sections['otask']['show']):

            for ($this->_sections['otask']['index'] = $this->_sections['otask']['start'], $this->_sections['otask']['iteration'] = 1;
                 $this->_sections['otask']['iteration'] <= $this->_sections['otask']['total'];
                 $this->_sections['otask']['index'] += $this->_sections['otask']['step'], $this->_sections['otask']['iteration']++):
$this->_sections['otask']['rownum'] = $this->_sections['otask']['iteration'];
$this->_sections['otask']['index_prev'] = $this->_sections['otask']['index'] - $this->_sections['otask']['step'];
$this->_sections['otask']['index_next'] = $this->_sections['otask']['index'] + $this->_sections['otask']['step'];
$this->_sections['otask']['first']      = ($this->_sections['otask']['iteration'] == 1);
$this->_sections['otask']['last']       = ($this->_sections['otask']['iteration'] == $this->_sections['otask']['total']);
?>

																								<?php if ($this->_sections['otask']['index'] % 2 == 0): ?>
												<tbody class="color-a" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php else: ?>
												<tbody class="color-b" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php endif; ?>
												<tr <?php if ($this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['daysleft'] < 0): ?> class="marker-late"<?php elseif ($this->_tpl_vars['tasks'][$this->_sections['task']['index']]['daysleft'] == 0): ?> class="marker-today"<?php endif; ?>>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_task_box(<?php echo $this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_view']; ?>
" ></a>
													<a class="tool_edit" href="user_agenda.php?action=task_edit&id=<?php echo $this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_edit']; ?>
" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_task_confirmbox(<?php echo $this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_delete']; ?>
" ></a>
												</td>
												<td>
												<?php if ($this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['title'] != ""): ?>
													<?php echo ((is_array($_tmp=$this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

												<?php else: ?>
													<?php echo ((is_array($_tmp=$this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['text'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

												<?php endif; ?>
												</td>
												<td><?php echo $this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['daysleft']; ?>
</td>
												<td>
                          		 				<a class="butn_check" href="#" onclick="javascript:open_task(<?php echo $this->_tpl_vars['otasks'][$this->_sections['otask']['index']]['ID']; ?>
,'user_agenda.php?action=list&mode=task_opened')" title="<?php echo $this->_config[0]['vars']['dico_user_menu_button_open']; ?>
"></a>
                        	  				  	</td>
												</tr>

												</tbody>
												<?php endfor; endif; ?>
												
	
										</table>

									</div>
										
								</div>
								
							</div>
							
						</div>
						
					</div>
					<?php endif; ?>
										

				</div>
					
			</div>

		</div>

	</div>

	<!-- AGENDA -->
	<div class="jqmWindow" id="agendaaddbox">
		<div class="jqmConfirmWindow">
		    <div id="add_title" class="jqmConfirmTitle clearfix">
    			<h1><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_title']; ?>
</h1>
  			</div>
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1><?php echo $this->_config[0]['vars']['dico_user_agenda_updatebox_title']; ?>
</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_from']; ?>
 <div class="startconsult" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_to']; ?>
 <div class="endconsult" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_length']; ?>
 <div class="length" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_time']; ?>

 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_patient']; ?>
:</label><input type="text" name="patient" id="patient" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_patient']; ?>
" onfocus="javascript:this.select()"  onkeyup="javascript:patientAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationPatient"></div>
						<div class="row"><label for="motif"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_motif']; ?>
:</label><input type="text" name="motif" id="motif" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_motif']; ?>
" onfocus="javascript:this.select()" onkeyup="javascript:motifAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationMotif"></div>
						<div class="row"><label for="location"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_location']; ?>
:</label><input type="text" name="location" id="location" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_location']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
						<div class="row"><label for="desc"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_comment']; ?>
:</label><textarea name="comment" id="comment" rows="3" cols="1" ></textarea></div>
						<input type="hidden" size="15" name="id" id="id" value=""/>
						<input type="hidden" size="15" name="motif_id" id="motif_id" value=""/>
						<input type="hidden" size="15" name="patient_id" id="patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="add"><span id="add_button"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_add']; ?>
</span><span id="update_button"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_update']; ?>
</span></a>
							<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_cancel']; ?>
</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
		
	<div class="jqmWindow" id="agendaviewbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1><?php echo $this->_config[0]['vars']['dico_user_agenda_viewbox_title']; ?>
</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_from']; ?>
 <div id="detail_start" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_to']; ?>
 <div id="detail_end" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_length']; ?>
 <div id="detail_length" style="display:inline"></div>
 		 		<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_time']; ?>

 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_patient']; ?>
:</label><div id="detail_patient"></div></div>
						<div class="row"><label for="patient"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_patient_addresse']; ?>
:</label><div id="detail_patient_addresse"></div></div>
						<div class="row"><label for="motif"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_motif']; ?>
:</label><div id="detail_motif"></div></div>
						<div class="row"><label for="motif"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_motif_description']; ?>
:</label><div id="detail_motif_description"></div></div>
						<div class="row"><label for="location"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_location']; ?>
:</label><div id="detail_location"></div></div>
						<div class="row"><label for="desc"><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_comment']; ?>
:</label><div id="detail_comment"></div></div>
						<input type="hidden" size="15" name="detail_id" id="detail_id" value=""/>
						<input type="hidden" size="15" name="detail_motif_id" id="detail_motif_id" value=""/>
						<input type="hidden" size="15" name="detail_patient_id" id="detail_patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<div id="edit_button">
								<a href="#" onclick="javascript:editConsultation($('#detail_id').val());" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_edit']; ?>
</span></a>
							</div>
							<a href="#" onclick="javascript:deleteConsultationBox();" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_del']; ?>
</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="agendaconfirmbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1><?php echo $this->_config[0]['vars']['dico_general_delete']; ?>
</h1>
  			</div>
  		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						<?php echo $this->_config[0]['vars']['dico_user_agenda_confirm_delete_task']; ?>

					</div>
					<div class="clear_both_b"></div>
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteConsultation('list');$('#agendaconfirmbox').jqmHide();" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_del']; ?>
</span></a>
							<a href="#" onclick="$('#agendaconfirmbox').jqmHide();" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_cancel']; ?>
</span></a>
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
    			<h1><?php echo $this->_config[0]['vars']['dico_general_delete']; ?>
</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
					<?php echo $this->_config[0]['vars']['dico_user_menu_confirm_delete_task']; ?>

					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:delete_task('user_agenda.php?action=list&mode=task_deleted');" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_user_menu_button_delete']; ?>
</span></a>
						<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_user_menu_button_cancel']; ?>
</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('acte_search' => 'no','patient_search' => 'no','product_search' => 'no','debt_search' => 'no','user_search' => 'no','addressbook_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script>
		$(document).ready(function(){
		
			$(\'#agendaconfirmbox\').jqm({
			});

			$(\'#agendaviewbox\').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$("#detail_start").html(\'\');
	      			$("#detail_end").html(\'\');
	      			$("#detail_length").html(\'\');
	     	 		$("#detail_patient").html(\'\');
	     	 		$("#detail_motif").html(\'\');
	     	 		$("#detail_location").html(\'\');
	     	 		$("#detail_comment").html(\'\');
	     	 		$("#detail_patient_addresse").html(\'\');
	     	 		$("#detail_motif_description").html(\'\');
	     	 		$("#detail_id").val(\'\');
	     	 		$("#detail_patient_id").val(\'\');
	     	 		$("#detail_motif_id").val(\'\');
		    	}
			});
			
			$(\'#agendaaddbox\').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$(\'.selectableitem_1\').removeClass("selecteditem");
			    	if (add == true) {
		    			modifConsultation($(\'#id\').val(),$(\'#patient\').val(),$(\'#patient_id\').val(),$(\'#motif\').val(),$(\'#motif_id\').val(),$(\'#location\').val(),$(\'#comment\').val(),\'list\');
			    		add = false;
			    	}
			    	$(\'#id\').val(\'\');
			    	$(\'#patient\').val(\'\');
			    	$(\'#patient_id\').val(\'\');
			    	$(\'#motif\').val(\'\');
			    	$(\'#motif_id\').val(\'\');
			    	$(\'#location\').val(\'\');
			    	$(\'#comment\').val(\'\');
			    	$(\'#overlayInformationPatient\').html(\'\');
			    	$(\'#overlayInformationMotif\').html(\'\');
		    	}
			});

			$(\'#taskconfirmbox\').jqm({ });
			$(\'#taskviewbox\').jqm({ });
			changeDay(0,\'list\');
  		});
  	</script>
	'; ?>