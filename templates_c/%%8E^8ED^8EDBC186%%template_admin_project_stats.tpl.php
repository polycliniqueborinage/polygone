<?php /* Smarty version 2.6.19, created on 2012-12-18 10:59:35
         compiled from template_admin_project_stats.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_filtergrid' => 'yes','js_new_datepicker' => 'yes','js_ajax' => 'yes','js_workschedule' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_admin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./admin_project.php"><?php echo $this->_config[0]['vars']['dico_admin_project_menu_dashboard']; ?>
</a>
   					<a href="./admin_project.php?action=list_cost_center"><?php echo $this->_config[0]['vars']['dico_admin_project_cost_center_menu_list']; ?>
</a>
					<a href="./admin_project.php?action=list_project_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_task_menu_list']; ?>
</a>
					<?php if ($this->_tpl_vars['type'] == 'T'): ?>					
					<a href="./admin_project.php?action=stat_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</span>
					<a href="./admin_project.php?action=stat_costs_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</a>
					<?php elseif ($this->_tpl_vars['type'] == 'C'): ?>
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</span>
					<a href="./admin_project.php?action=stat_costs_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</a>
					<?php elseif ($this->_tpl_vars['type'] == 'CT'): ?>
					<a href="./admin_project.php?action=stat_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</span>
					<?php elseif ($this->_tpl_vars['type'] == 'CC'): ?>					
					<a href="./admin_project.php?action=stat_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</span>
					<a href="./admin_project.php?action=stat_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</a>					
					<?php endif; ?>
					
 
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
										<?php if ($this->_tpl_vars['type'] == 'T'): ?>
											<span><?php echo $this->_config[0]['vars']['navigation_title_timesheet_stats_tasks']; ?>
</span>
										<?php elseif ($this->_tpl_vars['type'] == 'C'): ?>	
											<span><?php echo $this->_config[0]['vars']['navigation_title_timesheet_stats_cc']; ?>
</span>
										<?php elseif ($this->_tpl_vars['type'] == 'CT'): ?>
											<span><?php echo $this->_config[0]['vars']['navigation_title_timesheet_stats_costs_tasks']; ?>
</span>
										<?php elseif ($this->_tpl_vars['type'] == 'CC'): ?>
											<span><?php echo $this->_config[0]['vars']['navigation_title_timesheet_stats_costs_cc']; ?>
</span>	
										<?php endif; ?>	
								</a>
								
								<a href="admin_project.php?action=stat_print&begda=<?php echo $this->_tpl_vars['begda']; ?>
&endda=<?php echo $this->_tpl_vars['endda']; ?>
&type=<?php echo $this->_tpl_vars['type']; ?>
&userid=<?php echo $this->_tpl_vars['selected_user']; ?>
" style="float:right">
									<img src="./templates/standard/img/16x16/printer.png" alt="" />
								</a>
								</h2>
							</div>
							
								<form id="form" class="main" method="post" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type = "hidden" name = "type"  id="type" value=<?php echo $this->_tpl_vars['type']; ?>
/>
											<div class="row"><label for = "begda"> <?php echo $this->_config[0]['vars']['dico_management_product_report_begda']; ?>
:</label><input type = "text" name = "begda"  id="begda" value=<?php echo $this->_tpl_vars['begda']; ?>
 realname="<?php echo $this->_config[0]['vars']['dico_management_product_report_begda']; ?>
"  autocomplete="off"  onclick='fPopCalendar("begda")'/></div>
											<div class="row"><label for = "endda"><?php echo $this->_config[0]['vars']['dico_management_product_report_endda']; ?>
:</label><input type = "text" name = "endda" id="endda" value=<?php echo $this->_tpl_vars['endda']; ?>
 realname="<?php echo $this->_config[0]['vars']['dico_management_product_report_endda']; ?>
" autocomplete="off" onclick='fPopCalendar("endda")'/></div>
											<div class="row"><label for = "userid"><?php echo $this->_config[0]['vars']['dico_admin_people_user_user']; ?>
:</label>
												<select name = "userid" id="userid}" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_user']; ?>
" autocomplete="off" onchange="document.forms['form'].submit();">
													<option value=""><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_user']; ?>
</option>
													<?php unset($this->_sections['ts_users']);
$this->_sections['ts_users']['name'] = 'ts_users';
$this->_sections['ts_users']['loop'] = is_array($_loop=$this->_tpl_vars['ts_users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ts_users']['show'] = true;
$this->_sections['ts_users']['max'] = $this->_sections['ts_users']['loop'];
$this->_sections['ts_users']['step'] = 1;
$this->_sections['ts_users']['start'] = $this->_sections['ts_users']['step'] > 0 ? 0 : $this->_sections['ts_users']['loop']-1;
if ($this->_sections['ts_users']['show']) {
    $this->_sections['ts_users']['total'] = $this->_sections['ts_users']['loop'];
    if ($this->_sections['ts_users']['total'] == 0)
        $this->_sections['ts_users']['show'] = false;
} else
    $this->_sections['ts_users']['total'] = 0;
if ($this->_sections['ts_users']['show']):

            for ($this->_sections['ts_users']['index'] = $this->_sections['ts_users']['start'], $this->_sections['ts_users']['iteration'] = 1;
                 $this->_sections['ts_users']['iteration'] <= $this->_sections['ts_users']['total'];
                 $this->_sections['ts_users']['index'] += $this->_sections['ts_users']['step'], $this->_sections['ts_users']['iteration']++):
$this->_sections['ts_users']['rownum'] = $this->_sections['ts_users']['iteration'];
$this->_sections['ts_users']['index_prev'] = $this->_sections['ts_users']['index'] - $this->_sections['ts_users']['step'];
$this->_sections['ts_users']['index_next'] = $this->_sections['ts_users']['index'] + $this->_sections['ts_users']['step'];
$this->_sections['ts_users']['first']      = ($this->_sections['ts_users']['iteration'] == 1);
$this->_sections['ts_users']['last']       = ($this->_sections['ts_users']['iteration'] == $this->_sections['ts_users']['total']);
?>
														<?php if ($this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['ID'] == $this->_tpl_vars['selected_user']): ?>
															<option value="<?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['ID']; ?>
" SELECTED><?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['firstname']; ?>
</option>
														<?php else: ?>
															<option value="<?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['ts_users'][$this->_sections['ts_users']['index']]['firstname']; ?>
</option>
														<?php endif; ?>	
													<?php endfor; endif; ?>	
												</select>
											</div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
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
									<th width="10%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_code']; ?>
</th>
									<th width="30%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_name']; ?>
</th>
									<?php if ($this->_tpl_vars['type'] == 'T' || $this->_tpl_vars['type'] == 'C'): ?>
										<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_nbhours']; ?>
</th>
									<?php else: ?>	
										<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_couts']; ?>
</th>
									<?php endif; ?>	
									<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_pourcentage']; ?>
</th>
									<?php if ($this->_tpl_vars['type'] == 'T' || $this->_tpl_vars['type'] == 'C'): ?>
										<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_nbhours_cumule']; ?>
</th>
									<?php else: ?>	
										<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_couts_cumule']; ?>
</th>
									<?php endif; ?>	
									<th width="15%" align="left"><?php echo $this->_config[0]['vars']['dico_management_timesheet_stats_pourcentage_cumule']; ?>
</th>
								</tr>	
								<?php unset($this->_sections['stats']);
$this->_sections['stats']['name'] = 'stats';
$this->_sections['stats']['loop'] = is_array($_loop=$this->_tpl_vars['stats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['stats']['show'] = true;
$this->_sections['stats']['max'] = $this->_sections['stats']['loop'];
$this->_sections['stats']['step'] = 1;
$this->_sections['stats']['start'] = $this->_sections['stats']['step'] > 0 ? 0 : $this->_sections['stats']['loop']-1;
if ($this->_sections['stats']['show']) {
    $this->_sections['stats']['total'] = $this->_sections['stats']['loop'];
    if ($this->_sections['stats']['total'] == 0)
        $this->_sections['stats']['show'] = false;
} else
    $this->_sections['stats']['total'] = 0;
if ($this->_sections['stats']['show']):

            for ($this->_sections['stats']['index'] = $this->_sections['stats']['start'], $this->_sections['stats']['iteration'] = 1;
                 $this->_sections['stats']['iteration'] <= $this->_sections['stats']['total'];
                 $this->_sections['stats']['index'] += $this->_sections['stats']['step'], $this->_sections['stats']['iteration']++):
$this->_sections['stats']['rownum'] = $this->_sections['stats']['iteration'];
$this->_sections['stats']['index_prev'] = $this->_sections['stats']['index'] - $this->_sections['stats']['step'];
$this->_sections['stats']['index_next'] = $this->_sections['stats']['index'] + $this->_sections['stats']['step'];
$this->_sections['stats']['first']      = ($this->_sections['stats']['iteration'] == 1);
$this->_sections['stats']['last']       = ($this->_sections['stats']['iteration'] == $this->_sections['stats']['total']);
?>
								<tr>
									<td width="10%"><?php echo $this->_tpl_vars['stats'][$this->_sections['stats']['index']][1]; ?>
</td>
									<td width="30%"><?php echo $this->_tpl_vars['stats'][$this->_sections['stats']['index']][2]; ?>
</td>
									<td width="15%"><?php echo $this->_tpl_vars['stats'][$this->_sections['stats']['index']][3]; ?>
</td>
									<td width="15%"><?php echo $this->_tpl_vars['cumul'][$this->_sections['stats']['index']][1]; ?>
</td>
									<td width="15%"><?php echo $this->_tpl_vars['cumul'][$this->_sections['stats']['index']][0]; ?>
</td>
									<td width="15%"><?php echo $this->_tpl_vars['cumul'][$this->_sections['stats']['index']][2]; ?>
</td>
								</tr>
								<?php endfor; endif; ?>
								</table>
								
								<div class="clear_both"></div> 								
								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 			
					</div> 	
					
				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
		<script language="javascript" type="text/javascript">			
			var MyTableFilter = { 	col_2: "none",
									col_3: "none",
									col_4: "none",
									col_5: "none",
									exact_match: "true",
									col_width: [\'10%\',\'30%\',\'15%\',\'15%\',\'15%\',\'15%\'] }
			setFilterGrid("statstable", 0, MyTableFilter);
		</script> 
	'; ?>

	