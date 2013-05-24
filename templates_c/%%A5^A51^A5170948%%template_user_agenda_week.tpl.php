<?php /* Smarty version 2.6.19, created on 2012-10-30 15:07:56
         compiled from template_user_agenda_week.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_ui_171' => 'yes','js_jquery_autocomplete' => 'yes','js_jquery_form' => 'yes','js_jqmodal' => 'yes','js_agenda' => 'yes')));
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
    				<a href="./user_agenda.php?action=day"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_day']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_week']; ?>
</span>
	  				<a href="./user_agenda.php?action=list"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_list']; ?>
</a>
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
				
					<div class="infowin_left" id = "systemmsg" style="display:none">
						<span id = "upload_in_progress" class = "info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/loader-cal.gif" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_upload_in_progress']; ?>

						</span>
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
				
					<div class="navigation-calendar">

						<a class="thisday" href="#" onclick="javascript:changeDay('d','week');return false;" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_today']; ?>
"></a>
						<a class="previousMajor" href="#" onclick="javascript:changeDay(-7,'week');return false;" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_previous_week']; ?>
"></a>
						<a class="nextMajor" href="" onclick="javascript:changeDay(7,'week');return false;" title="<?php echo $this->_config[0]['vars']['dico_user_agenda_next_week']; ?>
"></a>
						<h2 id="title"></h2>

	  				</div>

				</div>
				
				<table id="mothertable" cellpadding="0" cellspacing="0" width="100%">
							
					<tr>
							
						<td id="maincell" valign="top">
							
							<div id="chipdayresume">
							</div>
							
							<div id="gridcontainer">
							
								<table id="tablecontainer" style="height:6048px;" border="0" cellpadding="0" cellspacing="0">
								
									<tr>
													
										<!--Morning trash -->
										<td id="trash" style="width:1px;">
												
											<div id="trashrow" class="dropzone" style="height: 6048px; top: 0px; left: 0pt;">
													
												<div style="height: 252px;"><a name="key_00"></a></div>
												<div style="height: 252px;"><a name="key_01"></a></div>
												<div style="height: 252px;"><a name="key_02"></a></div>
												<div style="height: 252px;"><a name="key_03"></a></div>
												<div style="height: 252px;"><a name="key_04"></a></div>
												<div style="height: 252px;"><a name="key_05"></a></div>
												<div style="height: 252px;"><a name="key_06"></a></div>
												<div style="height: 252px;"><a name="key_07"></a></div>
												<div style="height: 252px;"><a name="key_08"></a></div>
												<div style="height: 252px;"><a name="key_09"></a></div>
												<div style="height: 252px;"><a name="key_10"></a></div>
												<div style="height: 252px;"><a name="key_11"></a></div>
												<div style="height: 252px;"><a name="key_12"></a></div>
												<div style="height: 252px;"><a name="key_13"></a></div>
												<div style="height: 252px;"><a name="key_14"></a></div>
												<div style="height: 252px;"><a name="key_15"></a></div>
												<div style="height: 252px;"><a name="key_16"></a></div>
												<div style="height: 252px;"><a name="key_17"></a></div>
												<div style="height: 252px;"><a name="key_18"></a></div>
												<div style="height: 252px;"><a name="key_19"></a></div>
												<div style="height: 252px;"><a name="key_20"></a></div>
												<div style="height: 252px;"><a name="key_21"></a></div>
												<div style="height: 252px;"><a name="key_22"></a></div>
												<div style="height: 252px;"><a name="key_23"></a></div>
													
											</div>
															
										</td>
													
										<!--Morning hours -->
										<td style="width:40px;">
								
											<div id="hoursrow_1" style="height: 6048px; top: 0px; left: 0pt;"/>
								
										</td>
								
										<td class="gridcontainercell" style="width:auto;height:6048px;">
													
											<div class="grid" style="height: 6048px;">
															
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>

												<div id = "eventowner_1" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_1" id="$currentWeekArray[0]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_1" id="$currentWeekArray[0]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
															
												<div id="chipday_1"/>
								
											</div>
									
										</td>
										
										<!--Morning hours -->
										<td style="width:40px;">
								
											<div id="hoursrow_2" style="height: 6048px; top: 0px; left: 0pt;"/>
								
										</td>
								
										<td class="gridcontainercell" style="width:auto;height:6048px;">
													
											<div class="grid" style="height: 6048px;">
															
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>

												<div id = "eventowner_2" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_2" id="$currentWeekArray[1]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_2" id="$currentWeekArray[1]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
															
												<div id="chipday_2"/>
								
											</div>
									
										</td>

										<!--3 -->
										<td style="width:40px;">
								
											<div id="hoursrow_3" style="height: 6048px; top: 0px; left: 0pt;"/>
								
										</td>
								
										<td class="gridcontainercell" style="width:auto;height:6048px;">
													
											<div class="grid" style="height: 6048px;">
															
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>

												<div id = "eventowner_3" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_3" id="$currentWeekArray[2]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_3" id="$currentWeekArray[2]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
															
												<div id="chipday_3"/>
								
											</div>
									
										</td>

										<!--4 -->
										<td style="width:40px;">
											<div id="hoursrow_4" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>
												<div id = "eventowner_4" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_4" id="$currentWeekArray[3]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_4" id="$currentWeekArray[3]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
												<div id="chipday_4"/>
											</div>
										</td>
												
										<!-- 5 -->
										<td style="width:40px;">
											<div id="hoursrow_5" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>
												<div id = "eventowner_5" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_5" id="$currentWeekArray[4]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_5" id="$currentWeekArray[4]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
												<div id="chipday_5"/>
											</div>
										</td>
										
										<!-- 6 -->
										<td style="width:40px;">
											<div id="hoursrow_6" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>
												<div id = "eventowner_6" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_6" id="$currentWeekArray[5]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_6" id="$currentWeekArray[5]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
												<div id="chipday_6"/>
											</div>
										</td>
										
										<!-- 7 -->
										<td style="width:40px;">
											<div id="hoursrow_7" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													<?php endfor; endif; ?>
												</div>
												<div id = "eventowner_7" class="eventowner" style="z-index: 1;display=none; height:6048px">
													<?php unset($this->_sections['construct']);
$this->_sections['construct']['name'] = 'construct';
$this->_sections['construct']['loop'] = is_array($_loop=$this->_tpl_vars['construct']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['construct']['show'] = true;
$this->_sections['construct']['max'] = $this->_sections['construct']['loop'];
$this->_sections['construct']['step'] = 1;
$this->_sections['construct']['start'] = $this->_sections['construct']['step'] > 0 ? 0 : $this->_sections['construct']['loop']-1;
if ($this->_sections['construct']['show']) {
    $this->_sections['construct']['total'] = $this->_sections['construct']['loop'];
    if ($this->_sections['construct']['total'] == 0)
        $this->_sections['construct']['show'] = false;
} else
    $this->_sections['construct']['total'] = 0;
if ($this->_sections['construct']['show']):

            for ($this->_sections['construct']['index'] = $this->_sections['construct']['start'], $this->_sections['construct']['iteration'] = 1;
                 $this->_sections['construct']['iteration'] <= $this->_sections['construct']['total'];
                 $this->_sections['construct']['index'] += $this->_sections['construct']['step'], $this->_sections['construct']['iteration']++):
$this->_sections['construct']['rownum'] = $this->_sections['construct']['iteration'];
$this->_sections['construct']['index_prev'] = $this->_sections['construct']['index'] - $this->_sections['construct']['step'];
$this->_sections['construct']['index_next'] = $this->_sections['construct']['index'] + $this->_sections['construct']['step'];
$this->_sections['construct']['first']      = ($this->_sections['construct']['iteration'] == 1);
$this->_sections['construct']['last']       = ($this->_sections['construct']['iteration'] == $this->_sections['construct']['total']);
?>
													<div class="selectableitem_7" id="$currentWeekArray[6]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<div class="selectableitem_7" id="$currentWeekArray[6]}#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+2; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
												<div id="chipday_7"/>
											</div>
										</td>
																									
									</tr>
								
								</table>
							
							</div>
							
						</td>
					
					</tr>
				
				</table>
				
					
				<div id="calendarSideBar">
  					<div id="cal1Container"></div>
  					<div id="textContainer"><?php echo '<?='; ?>
$textComment<?php echo '?>'; ?>
</div>
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('patient_search' => 'no','template' => 'week','color_schedule1' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('calendar_week' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
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
							<a href="#" onclick="javascript:deleteConsultationBox($('#detail_id').val());" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_del']; ?>
</span></a>
							<a href="#" onclick="javascript:$('#agendaviewbox').jqmHide();" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_cancel']; ?>
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
						<a href="#" onclick="javascript:deleteConsultation('week');$('#agendaconfirmbox').jqmHide();" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_del']; ?>
</span></a>
						<a href="#" onclick="javascript:$('#agendaconfirmbox').jqmHide();" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_cancel']; ?>
</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<?php echo '
	<script>
		$(document).ready(function(){
		
			changeDay(0,\'week\');
			
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
			    	$(\'.selectableitem_\'+dayofweekCurrent).removeClass("ui-selected");
			    	if (add == true) {
			    		if ($(\'#id\').val()!=\'\'){
			    			modifConsultation($(\'#id\').val(),$(\'#patient\').val(),$(\'#patient_id\').val(),$(\'#motif\').val(),$(\'#motif_id\').val(),$(\'#location\').val(),$(\'#comment\').val(),\'week\');
			    		} else {
	    	    			addConsultation(position,length,$(\'#patient\').val(),$(\'#patient_id\').val(),$(\'#motif\').val(),$(\'#motif_id\').val(),$(\'#location\').val(),$(\'#comment\').val(),\'week\');
			    		}
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

	   		
  		});
  	</script>
	'; ?>