<?php /* Smarty version 2.6.19, created on 2013-01-30 20:44:34
         compiled from template_user_agenda_schedule.tpl */ ?>
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
	  				<a href="./user_agenda.php?action=week"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_week']; ?>
</a>
	  				<a href="./user_agenda.php?action=list"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_list']; ?>
</a>
	  				<a href="./user_agenda.php?action=fulllist"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_fulllist']; ?>
</a>
	  				<a href="./user_agenda.php?action=timeline"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_timeline']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_schedule']; ?>
</span>
	  				<a href="./user_agenda.php?action=task_add"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_add']; ?>
</a>
				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg" style="display:none">
						<span id = "upload_in_progress" class = "info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/loader-cal.gif" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_upload_in_progress']; ?>

						</span>
						<span id = "update_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_agenda_schedule_update_done']; ?>

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
													
										<!-- 1 -->
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
												<div id = "eventowner_1" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_1" id="1#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_2" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_2" id="2#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_3" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_3" id="3#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_4" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_4" id="4#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_5" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_5" id="5#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_6" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_6" id="6#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
												<div id = "eventowner_7" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
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
													<div class="selectableitem_7" id="7#day_<?php echo $this->_tpl_vars['construct'][$this->_sections['construct']['index']]*2+1; ?>
"></div>
													<?php endfor; endif; ?>
												</div>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('color_schedule2' => 'yes','template' => 'schedule')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('calendar' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	<?php echo '
	<script>
		$(document).ready(function(){
		
			changeDay(0,\'schedule\');
	   		
  		});
  	</script>
	'; ?>