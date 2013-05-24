<?php /* Smarty version 2.6.19, created on 2013-03-22 12:51:25
         compiled from template_management_workschedule_wsr_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_workschedule' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
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

					<a href="./management_workschedule.php?action=list_dws"><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_liste']; ?>
</a>

					<a href="./management_workschedule.php?action=add_dws"><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_add']; ?>
</a>
    				
    				<a href="./management_workschedule.php?action=list_wsr"><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_liste']; ?>
</a>
    				
    				<?php if ($this->_tpl_vars['wsr_id'] != ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_edit']; ?>
</span>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['wsr_id'] == ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_add']; ?>
</span>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('wsredit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
									<?php if ($this->_tpl_vars['wsr_id'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['wsr_id'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_add']; ?>
</span>
									<?php endif; ?>
								</a>
								</h2>
							</div>
			
							<div id = "wsredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_workschedule.php?action=submit_wsr" enctype="multipart/form-data">
						
									<input type = "hidden" value = "<?php echo $this->_tpl_vars['current_index']; ?>
" name = 'current_index' id = 'current_index'>
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											
											<div class="row"><input type = "hidden" name = "check_all_filled" id="check_all_filled"  class="<?php echo $this->_tpl_vars['errors']['check_all_filled']; ?>
" /></div>
											
											<div class="row"><label for = "id"          class="name"><?php echo $this->_config[0]['vars']['dico_management_wsr_id']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['horaire'][0]['id']; ?>
" name = "id" id="id" class="<?php echo $this->_tpl_vars['errors']['id']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_id']; ?>
" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description" class="name"><?php echo $this->_config[0]['vars']['dico_management_wsr_description']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['horaire'][0]['description']; ?>
" name = "description" id="description" class="<?php echo $this->_tpl_vars['errors']['description']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_description']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "average" class="name"><?php echo $this->_config[0]['vars']['dico_management_wsr_column_avg_text']; ?>
<span class="mandatory"></span>:</label><input type = "text" name = "average" id="average" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_column_avg_text']; ?>
" autocomplete="off"/></div>
											
											<div class="clear_both"></div> 											<br><br>
											
											<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
												<input type="hidden" id="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" name="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['nb_hours']; ?>
">
											<?php endfor; endif; ?>

											<div class="table">
												<table id="weekly_wsr" name="weekly_wsr">
												<tr>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_index']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour1']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour2']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour3']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour4']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour5']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour6']; ?>
</th>
													<th><?php echo $this->_config[0]['vars']['dico_management_wsr_jour7']; ?>
</th>
												</tr>
												<?php unset($this->_sections['horaire']);
$this->_sections['horaire']['name'] = 'horaire';
$this->_sections['horaire']['loop'] = is_array($_loop=$this->_tpl_vars['horaire']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['horaire']['show'] = true;
$this->_sections['horaire']['max'] = $this->_sections['horaire']['loop'];
$this->_sections['horaire']['step'] = 1;
$this->_sections['horaire']['start'] = $this->_sections['horaire']['step'] > 0 ? 0 : $this->_sections['horaire']['loop']-1;
if ($this->_sections['horaire']['show']) {
    $this->_sections['horaire']['total'] = $this->_sections['horaire']['loop'];
    if ($this->_sections['horaire']['total'] == 0)
        $this->_sections['horaire']['show'] = false;
} else
    $this->_sections['horaire']['total'] = 0;
if ($this->_sections['horaire']['show']):

            for ($this->_sections['horaire']['index'] = $this->_sections['horaire']['start'], $this->_sections['horaire']['iteration'] = 1;
                 $this->_sections['horaire']['iteration'] <= $this->_sections['horaire']['total'];
                 $this->_sections['horaire']['index'] += $this->_sections['horaire']['step'], $this->_sections['horaire']['iteration']++):
$this->_sections['horaire']['rownum'] = $this->_sections['horaire']['iteration'];
$this->_sections['horaire']['index_prev'] = $this->_sections['horaire']['index'] - $this->_sections['horaire']['step'];
$this->_sections['horaire']['index_next'] = $this->_sections['horaire']['index'] + $this->_sections['horaire']['step'];
$this->_sections['horaire']['first']      = ($this->_sections['horaire']['iteration'] == 1);
$this->_sections['horaire']['last']       = ($this->_sections['horaire']['iteration'] == $this->_sections['horaire']['total']);
?>
												<tr>
													<td><?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day1']; ?>
" name = "day1-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day1-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour1']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day1'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>	
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day2']; ?>
" name = "day2-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day2-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour2']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day2'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day3']; ?>
" name = "day3-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day3-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour3']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day3'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day4']; ?>
" name = "day4-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day4-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour4']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day4'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day5']; ?>
" name = "day5-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day5-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour5']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day5'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day6']; ?>
" name = "day6-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day6-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour6']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day6'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select value = "<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day7']; ?>
" name = "day7-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" id="day7-<?php echo $this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour7']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<?php if ($this->_tpl_vars['horaire'][$this->_sections['horaire']['index']]['day7'] == $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']): ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php else: ?>
																<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
															<?php endif; ?>
														<?php endfor; endif; ?>	
														</select>
													</td>
												</tr>	
												<?php endfor; endif; ?>
												<?php if ($this->_tpl_vars['current_index'] == 1 && $this->_tpl_vars['wsr_id'] == ""): ?>
												<tr>
													<td><?php echo $this->_tpl_vars['current_index']; ?>
</td>
													<td><select name = "day1-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day1-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour1']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day2-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day2-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour2']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day3-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day3-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour3']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day4-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day4-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour4']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day5-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day5-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour5']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day6-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day6-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour6']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
													<td><select name = "day7-<?php echo $this->_tpl_vars['current_index']; ?>
" id="day7-<?php echo $this->_tpl_vars['current_index']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_wsr_jour7']; ?>
" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value=""><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
														<?php unset($this->_sections['dws']);
$this->_sections['dws']['name'] = 'dws';
$this->_sections['dws']['loop'] = is_array($_loop=$this->_tpl_vars['dws']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dws']['show'] = true;
$this->_sections['dws']['max'] = $this->_sections['dws']['loop'];
$this->_sections['dws']['step'] = 1;
$this->_sections['dws']['start'] = $this->_sections['dws']['step'] > 0 ? 0 : $this->_sections['dws']['loop']-1;
if ($this->_sections['dws']['show']) {
    $this->_sections['dws']['total'] = $this->_sections['dws']['loop'];
    if ($this->_sections['dws']['total'] == 0)
        $this->_sections['dws']['show'] = false;
} else
    $this->_sections['dws']['total'] = 0;
if ($this->_sections['dws']['show']):

            for ($this->_sections['dws']['index'] = $this->_sections['dws']['start'], $this->_sections['dws']['iteration'] = 1;
                 $this->_sections['dws']['iteration'] <= $this->_sections['dws']['total'];
                 $this->_sections['dws']['index'] += $this->_sections['dws']['step'], $this->_sections['dws']['iteration']++):
$this->_sections['dws']['rownum'] = $this->_sections['dws']['iteration'];
$this->_sections['dws']['index_prev'] = $this->_sections['dws']['index'] - $this->_sections['dws']['step'];
$this->_sections['dws']['index_next'] = $this->_sections['dws']['index'] + $this->_sections['dws']['step'];
$this->_sections['dws']['first']      = ($this->_sections['dws']['iteration'] == 1);
$this->_sections['dws']['last']       = ($this->_sections['dws']['iteration'] == $this->_sections['dws']['total']);
?>
															<option value="<?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dws'][$this->_sections['dws']['index']]['id']; ?>
</option>
														<?php endfor; endif; ?>	
														</select>
													</td>
												</tr>
												<?php endif; ?>
												</table>
											</div>
											
											<div class="clear_both"></div> 											<br><br>
			
											<div class="row">
												<label>&nbsp;</label>
												<div><a onclick="javascript:add_line();setFillin();get_average();"><img src="./templates/standard/img/16x16/application_add.png" alt="" />
													 <a onclick="javascript:delete_line();setFillin();get_average();"><img src="./templates/standard/img/16x16/application_delete.png" alt="" />
												</div>
											</div>

											<div class="clear_both"></div> 											<br><br>
			
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><a><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></a></div>
											</div>

										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
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
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('daily_wsr_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script type="text/javascript">
		var valuesize =  null;
		
		$(document).ready(function() {
		
		    $("form").validate({
			rules: {
	  			id: "required",
	  			description: "required",
	  			check_all_filled: "required"
   			},
   			messages: {
				id: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				description: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				check_all_filled: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required_all_days']; ?>
<?php echo '"
 				}			
 			},
			submitHandler: function() {
				form.submit();
			}
		});
		
	});
	</script>
	'; ?>

	