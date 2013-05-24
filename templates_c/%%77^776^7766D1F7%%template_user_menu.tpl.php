<?php /* Smarty version 2.6.19, created on 2012-09-08 09:14:07
         compiled from template_user_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_user_menu.tpl', 139, false),array('modifier', 'nl2br', 'template_user_menu.tpl', 266, false),array('function', 'cycle', 'template_user_menu.tpl', 280, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_jquery_datepicker' => 'no','js_jqmodal' => 'yes','js_agenda' => 'yes')));
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
    				<a href="./user_profil.php"><?php echo $this->_config[0]['vars']['dico_user_profil_menu_account']; ?>
</a>
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'task_deleted'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_deleted']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'task_closed'): ?>
						<span class="info_in_yellow"><img src="templates/standard/images/symbols/task.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_menu_task_closed']; ?>
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
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
				
										<div class="block_b">
						
						<div class="in">
							
							<div class="headline">

								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('agenda');"></a>
									
								<div class="clear_both"></div> 									
								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_agenda.php" title="<?php echo $this->_config[0]['vars']['dico_user_menu_agenda_title']; ?>
">
												<img src="./templates/standard/images/symbols/agenda.png" alt="" />
												<span><?php echo $this->_config[0]['vars']['dico_user_menu_agenda_span']; ?>
</span>
											</a>
										</h2>
									</div>
								</div>
																   
							</div>
							   
							<div class="block" id="agenda">
								<div id = "thecal" class="bigcal"></div>
							</div> 				
						</div>
							
					</div>
										
					
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
,'user_menu.php?mode=task_closed')" title="<?php echo $this->_config[0]['vars']['close']; ?>
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
										
					
					
					
				
										<?php if ($this->_tpl_vars['msgnum'] > 0): ?><?php if ($this->_tpl_vars['adminstate'] > 0): ?>
					
					<div class="block_a">
						
							<div class="in">
							
							   <div class="headline">
								  	
								  	<a href="#" id="messagecookie_toggle" class="win_block" onclick = "toggleBlock('messagecookie');"></a>
									
									<div class="clear_both"></div> 									
									<div style="position:relative;">
									
										<div class="win_tools">
											<h2>
												<a href="user_message.php" title="<?php echo $this->_config[0]['vars']['dico_user_menu_messages_title']; ?>
">
													<img src="./templates/standard/img/symbols/msgs.png" alt="" />
													<span><?php echo $this->_config[0]['vars']['dico_user_menu_messages_span']; ?>
</span>
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
												<td class="b" style="width:20%"><?php echo $this->_config[0]['vars']['dico_user_menu_messages_colum_message']; ?>
</td>
												<td class="c" style="width:20%"><?php echo $this->_config[0]['vars']['dico_user_menu_messages_colum_group']; ?>
</td>
												<td class="d" style="width:20%"><?php echo $this->_config[0]['vars']['dico_user_menu_messages_colum_sendby']; ?>
</td>
												<td class="e" style="width:20%"><?php echo $this->_config[0]['vars']['dico_user_menu_messages_colum_on']; ?>
</td>
												<td><?php echo $this->_config[0]['vars']['dico_user_menu_messages_colum_replies']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div>
										
										<ul id="accordion_messages">
											
											<?php unset($this->_sections['message']);
$this->_sections['message']['name'] = 'message';
$this->_sections['message']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['message']['show'] = true;
$this->_sections['message']['max'] = $this->_sections['message']['loop'];
$this->_sections['message']['step'] = 1;
$this->_sections['message']['start'] = $this->_sections['message']['step'] > 0 ? 0 : $this->_sections['message']['loop']-1;
if ($this->_sections['message']['show']) {
    $this->_sections['message']['total'] = $this->_sections['message']['loop'];
    if ($this->_sections['message']['total'] == 0)
        $this->_sections['message']['show'] = false;
} else
    $this->_sections['message']['total'] = 0;
if ($this->_sections['message']['show']):

            for ($this->_sections['message']['index'] = $this->_sections['message']['start'], $this->_sections['message']['iteration'] = 1;
                 $this->_sections['message']['iteration'] <= $this->_sections['message']['total'];
                 $this->_sections['message']['index'] += $this->_sections['message']['step'], $this->_sections['message']['iteration']++):
$this->_sections['message']['rownum'] = $this->_sections['message']['iteration'];
$this->_sections['message']['index_prev'] = $this->_sections['message']['index'] - $this->_sections['message']['step'];
$this->_sections['message']['index_next'] = $this->_sections['message']['index'] + $this->_sections['message']['step'];
$this->_sections['message']['first']      = ($this->_sections['message']['iteration'] == 1);
$this->_sections['message']['last']       = ($this->_sections['message']['iteration'] == $this->_sections['message']['total']);
?>
					
																						<?php if ($this->_sections['message']['index'] % 2 == 0): ?>
												<li class="bg_a">
											<?php else: ?>
												<li class="bg_b">
											<?php endif; ?>
															
													<table class="resume" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td class="a" style="width:5%;">
																	<div class="accordion_toggle">
																		<a class="" style="width:20px;" href="javascript:void(0);" onclick = ""></a>
																	</div>
																</td>
																<td class="a" style="width:5%;">
																	<a class="butn_reply" href="user_message.php?action=add&amp;mid=<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['ID']; ?>
&amp;id=<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['group']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_user_menu_messages_answer']; ?>
"></a>
																</td>
																<td class="b" style="width:20%;"><?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</td>
																<td class="c" style="width:20%;"><?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['pname'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</td>
																<td class="d" style="width:20%;"><?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</td>
																<td class="e" style="width:20%;"><?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['postdate']; ?>
</td>
																<td style=""><?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['replies']; ?>
</td>
															</tr>
													</table>
														
													<div id="messages_focus<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['ID']; ?>
" class="focus_off">

														<div class="accordion_content">
														
															<table class="description" cellpadding="0" cellspacing="0" width="100%">
																<tr valign="top">
																	<td class="a"></td>
		
																	<td class="b" style="width:180px;">
																	<?php if ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['avatar'] != ""): ?>
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['avatar']; ?>
" alt="" /></div>
																	<?php else: ?>
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
																	<?php endif; ?>
																	</td>
		
																	<td class="message">
																	
																		<div class="msgin"><?php echo ((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['text'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
																		
																		<!-- MESSAGE TEXT -->
																		<?php if ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['tagnum'] > 1): ?><br /><strong><?php echo $this->_config[0]['vars']['tags']; ?>
:</strong>
																		<?php unset($this->_sections['tag']);
$this->_sections['tag']['name'] = 'tag';
$this->_sections['tag']['loop'] = is_array($_loop=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['tagsarr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tag']['show'] = true;
$this->_sections['tag']['max'] = $this->_sections['tag']['loop'];
$this->_sections['tag']['step'] = 1;
$this->_sections['tag']['start'] = $this->_sections['tag']['step'] > 0 ? 0 : $this->_sections['tag']['loop']-1;
if ($this->_sections['tag']['show']) {
    $this->_sections['tag']['total'] = $this->_sections['tag']['loop'];
    if ($this->_sections['tag']['total'] == 0)
        $this->_sections['tag']['show'] = false;
} else
    $this->_sections['tag']['total'] = 0;
if ($this->_sections['tag']['show']):

            for ($this->_sections['tag']['index'] = $this->_sections['tag']['start'], $this->_sections['tag']['iteration'] = 1;
                 $this->_sections['tag']['iteration'] <= $this->_sections['tag']['total'];
                 $this->_sections['tag']['index'] += $this->_sections['tag']['step'], $this->_sections['tag']['iteration']++):
$this->_sections['tag']['rownum'] = $this->_sections['tag']['iteration'];
$this->_sections['tag']['index_prev'] = $this->_sections['tag']['index'] - $this->_sections['tag']['step'];
$this->_sections['tag']['index_next'] = $this->_sections['tag']['index'] + $this->_sections['tag']['step'];
$this->_sections['tag']['first']      = ($this->_sections['tag']['iteration'] == 1);
$this->_sections['tag']['last']       = ($this->_sections['tag']['iteration'] == $this->_sections['tag']['total']);
?>
																			<a href = "managetags.php?action=gettag&tag=<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['tagsarr'][$this->_sections['tag']['index']]; ?>
&amp;id=<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['group']; ?>
"><?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['tagsarr'][$this->_sections['tag']['index']]; ?>
</a>
																		<?php endfor; endif; ?>
																		<?php endif; ?>
					
																		<!-- MESSAGE FILE -->
																		<?php if ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][0][0] > 0): ?>
																		<table cellpadding="0" cellspacing="0" style="border-top:1px dashed;margin:15px 0;width=100%">
																			<tr><td colspan="3" class="thead" style="padding:9px 0 3px 0;"><?php echo $this->_config[0]['vars']['dico_user_menu_messages_file']; ?>
</td></tr>
																			<?php unset($this->_sections['file']);
$this->_sections['file']['name'] = 'file';
$this->_sections['file']['loop'] = is_array($_loop=$this->_tpl_vars['messages'][$this->_sections['message']['index']]['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['file']['show'] = true;
$this->_sections['file']['max'] = $this->_sections['file']['loop'];
$this->_sections['file']['step'] = 1;
$this->_sections['file']['start'] = $this->_sections['file']['step'] > 0 ? 0 : $this->_sections['file']['loop']-1;
if ($this->_sections['file']['show']) {
    $this->_sections['file']['total'] = $this->_sections['file']['loop'];
    if ($this->_sections['file']['total'] == 0)
        $this->_sections['file']['show'] = false;
} else
    $this->_sections['file']['total'] = 0;
if ($this->_sections['file']['show']):

            for ($this->_sections['file']['index'] = $this->_sections['file']['start'], $this->_sections['file']['iteration'] = 1;
                 $this->_sections['file']['iteration'] <= $this->_sections['file']['total'];
                 $this->_sections['file']['index'] += $this->_sections['file']['step'], $this->_sections['file']['iteration']++):
$this->_sections['file']['rownum'] = $this->_sections['file']['iteration'];
$this->_sections['file']['index_prev'] = $this->_sections['file']['index'] - $this->_sections['file']['step'];
$this->_sections['file']['index_next'] = $this->_sections['file']['index'] + $this->_sections['file']['step'];
$this->_sections['file']['first']      = ($this->_sections['file']['iteration'] == 1);
$this->_sections['file']['last']       = ($this->_sections['file']['iteration'] == $this->_sections['file']['total']);
?>
																			<tr class="<?php echo smarty_function_cycle(array('values' => "bg_one,bg_two"), $this);?>
">
																				<td style="width:10%;padding:2px 0;">
																					<a href = "<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['datei']; ?>
" <?php if ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['imgfile'] == 1): ?> rel="lytebox[]" <?php elseif ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['imgfile'] == 2): ?> rel = "lyteframe[text]" <?php endif; ?>><img src = "templates/standard/img/symbols/files/<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['type']; ?>
.png" alt="<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['name']; ?>
" /></a>
																				</td>
																				<td style="width:90%;padding:0 0 0 5px;">
																					<a href = "<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['datei']; ?>
" <?php if ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['imgfile'] == 1): ?> rel="lytebox[img<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['ID']; ?>
]" <?php elseif ($this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['imgfile'] == 2): ?> rel = "lyteframe[text<?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['ID']; ?>
]"<?php endif; ?>><?php echo $this->_tpl_vars['messages'][$this->_sections['message']['index']]['files'][$this->_sections['file']['index']]['name']; ?>
</a>
																				</td>
																				<td class="tools" style="width:26px;padding:0;">
																				</td>
																			</tr>
																			<?php endfor; endif; ?>
																		</table>
																		<?php endif; ?>
																		
																	</td>
																</tr>
															</table>
														
														</div> 							
													</div> 					
											</li>
											<?php endfor; endif; ?>
											
											</ul>
										</div> 										
									</div> 									
									<div class="clear_both"></div> 									
								</div>
							</div> 						</div> 					
					<?php endif; ?><?php endif; ?>
							

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

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('useronline' => 'no','chat' => 'no','calendar_light' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
		<script type = "text/javascript">
		function changecalendar(url){
	   		$("#progress").show();
			$("#thecal").load(url, {limit: 25}, function(){
		   		$("#progress").hide();
			});
		}
		
		$(document).ready(function() {
			changecalendar("user_menu.php?action=newcal");
			$(\'#taskconfirmbox\').jqm({ });
			$(\'#taskviewbox\').jqm({ });
		});
		</script>
	'; ?>

	