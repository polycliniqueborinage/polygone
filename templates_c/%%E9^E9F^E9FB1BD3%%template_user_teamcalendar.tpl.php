<?php /* Smarty version 2.6.19, created on 2013-05-24 09:20:36
         compiled from template_user_teamcalendar.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes')));
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
					
					<?php if ($this->_tpl_vars['myteams'] == 'X'): ?>
    					<a href="./user_services.php?action=team_calendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_teamcalendar']; ?>
</a>
    				<?php else: ?>
    					<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_teamcalendar']; ?>
</span>
    				<?php endif; ?>	
    				<!--<a href="./user_services.php?action=leave_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_pending_requests']; ?>
</a>
    				<a href="./user_services.php?action=quota_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_quotas']; ?>
</a>
    				<a href="./user_services.php?action=absence_request"><?php echo $this->_config[0]['vars']['navigation_title_user_services_leaverequest']; ?>
</a>
    				<?php if ($this->_tpl_vars['ismanager'] == 'X'): ?>
    					<a href="./user_services.php?action=tasks_overview"><?php echo $this->_config[0]['vars']['navigation_user_mss']; ?>
</a>
    					<?php if ($this->_tpl_vars['myteams'] == 'X'): ?>
	    					<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_myteamscalendar']; ?>
</span>
	    				<?php else: ?>		
	    					<a href="./user_services.php?action=my_teams_calendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_myteamscalendar']; ?>
</a>
	    				<?php endif; ?>
    				<?php endif; ?>
    				-->
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_teamcalendar']; ?>
</span>
									</a>
								</h2>
							</div>
			
							
			
								<div class="block_in_wrapper">
			
									<fieldset>

										<div>
											<div class="row"><center>
											<a href="user_services.php?action=team_calendar&date=<?php echo $this->_tpl_vars['prev_date']; ?>
">
												<img src="./templates/standard/img/16x16/arrow_left.png" alt="" />
											</a>
											<?php echo $this->_tpl_vars['mois']; ?>
 <?php echo $this->_tpl_vars['annee']; ?>

											<a href="user_services.php?action=team_calendar&date=<?php echo $this->_tpl_vars['next_date']; ?>
">
												<img src="./templates/standard/img/16x16/arrow_right.png" alt="" />
											</a>
											</center></div>
										</div>
			
									</fieldset>
									
								
								</div>
			
								<div class="clear_both"></div> 								
								<div>
								<table width="100%" cellpadding="0" cellspacing="0" border=1>
									<tr>
										<th width="15%"></th>
										<?php unset($this->_sections['date']);
$this->_sections['date']['name'] = 'date';
$this->_sections['date']['loop'] = is_array($_loop=$this->_tpl_vars['dates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date']['show'] = true;
$this->_sections['date']['max'] = $this->_sections['date']['loop'];
$this->_sections['date']['step'] = 1;
$this->_sections['date']['start'] = $this->_sections['date']['step'] > 0 ? 0 : $this->_sections['date']['loop']-1;
if ($this->_sections['date']['show']) {
    $this->_sections['date']['total'] = $this->_sections['date']['loop'];
    if ($this->_sections['date']['total'] == 0)
        $this->_sections['date']['show'] = false;
} else
    $this->_sections['date']['total'] = 0;
if ($this->_sections['date']['show']):

            for ($this->_sections['date']['index'] = $this->_sections['date']['start'], $this->_sections['date']['iteration'] = 1;
                 $this->_sections['date']['iteration'] <= $this->_sections['date']['total'];
                 $this->_sections['date']['index'] += $this->_sections['date']['step'], $this->_sections['date']['iteration']++):
$this->_sections['date']['rownum'] = $this->_sections['date']['iteration'];
$this->_sections['date']['index_prev'] = $this->_sections['date']['index'] - $this->_sections['date']['step'];
$this->_sections['date']['index_next'] = $this->_sections['date']['index'] + $this->_sections['date']['step'];
$this->_sections['date']['first']      = ($this->_sections['date']['iteration'] == 1);
$this->_sections['date']['last']       = ($this->_sections['date']['iteration'] == $this->_sections['date']['total']);
?>
											<th align="center" width="<?php echo $this->_tpl_vars['size']; ?>
%">
												<?php echo $this->_tpl_vars['dates'][$this->_sections['date']['index']]; ?>

											</th>
										<?php endfor; endif; ?>
									</tr>
								<!--</table>
								<table width="100%" cellpadding="0" cellspacing="0">-->
									
									<?php unset($this->_sections['groupmember']);
$this->_sections['groupmember']['name'] = 'groupmember';
$this->_sections['groupmember']['loop'] = is_array($_loop=$this->_tpl_vars['groupmembers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['groupmember']['show'] = true;
$this->_sections['groupmember']['max'] = $this->_sections['groupmember']['loop'];
$this->_sections['groupmember']['step'] = 1;
$this->_sections['groupmember']['start'] = $this->_sections['groupmember']['step'] > 0 ? 0 : $this->_sections['groupmember']['loop']-1;
if ($this->_sections['groupmember']['show']) {
    $this->_sections['groupmember']['total'] = $this->_sections['groupmember']['loop'];
    if ($this->_sections['groupmember']['total'] == 0)
        $this->_sections['groupmember']['show'] = false;
} else
    $this->_sections['groupmember']['total'] = 0;
if ($this->_sections['groupmember']['show']):

            for ($this->_sections['groupmember']['index'] = $this->_sections['groupmember']['start'], $this->_sections['groupmember']['iteration'] = 1;
                 $this->_sections['groupmember']['iteration'] <= $this->_sections['groupmember']['total'];
                 $this->_sections['groupmember']['index'] += $this->_sections['groupmember']['step'], $this->_sections['groupmember']['iteration']++):
$this->_sections['groupmember']['rownum'] = $this->_sections['groupmember']['iteration'];
$this->_sections['groupmember']['index_prev'] = $this->_sections['groupmember']['index'] - $this->_sections['groupmember']['step'];
$this->_sections['groupmember']['index_next'] = $this->_sections['groupmember']['index'] + $this->_sections['groupmember']['step'];
$this->_sections['groupmember']['first']      = ($this->_sections['groupmember']['iteration'] == 1);
$this->_sections['groupmember']['last']       = ($this->_sections['groupmember']['iteration'] == $this->_sections['groupmember']['total']);
?>
									<tr>
										<td align="left" width="15%">
											<?php if ($this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['ID'] == $this->_tpl_vars['groupchief']['ID']): ?>
												<b><u>
											<?php endif; ?>	
											
											<?php if ($this->_tpl_vars['myuserid'] == $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['ID']): ?>
												<?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['firstname']; ?>
 <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['familyname']; ?>

											<?php else: ?>	
												<?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['firstname']; ?>
 <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['familyname']; ?>
 (<?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['user_group']; ?>
)
											<?php endif; ?>		
													
											<?php if ($this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]['ID'] == $this->_tpl_vars['groupchief']['ID']): ?>
												</u></b>
											<?php endif; ?>  
										</td>
										<?php unset($this->_sections['day']);
$this->_sections['day']['name'] = 'day';
$this->_sections['day']['loop'] = is_array($_loop=$this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day']['start'] = (int)11;
$this->_sections['day']['show'] = true;
$this->_sections['day']['max'] = $this->_sections['day']['loop'];
$this->_sections['day']['step'] = 1;
if ($this->_sections['day']['start'] < 0)
    $this->_sections['day']['start'] = max($this->_sections['day']['step'] > 0 ? 0 : -1, $this->_sections['day']['loop'] + $this->_sections['day']['start']);
else
    $this->_sections['day']['start'] = min($this->_sections['day']['start'], $this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] : $this->_sections['day']['loop']-1);
if ($this->_sections['day']['show']) {
    $this->_sections['day']['total'] = min(ceil(($this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] - $this->_sections['day']['start'] : $this->_sections['day']['start']+1)/abs($this->_sections['day']['step'])), $this->_sections['day']['max']);
    if ($this->_sections['day']['total'] == 0)
        $this->_sections['day']['show'] = false;
} else
    $this->_sections['day']['total'] = 0;
if ($this->_sections['day']['show']):

            for ($this->_sections['day']['index'] = $this->_sections['day']['start'], $this->_sections['day']['iteration'] = 1;
                 $this->_sections['day']['iteration'] <= $this->_sections['day']['total'];
                 $this->_sections['day']['index'] += $this->_sections['day']['step'], $this->_sections['day']['iteration']++):
$this->_sections['day']['rownum'] = $this->_sections['day']['iteration'];
$this->_sections['day']['index_prev'] = $this->_sections['day']['index'] - $this->_sections['day']['step'];
$this->_sections['day']['index_next'] = $this->_sections['day']['index'] + $this->_sections['day']['step'];
$this->_sections['day']['first']      = ($this->_sections['day']['iteration'] == 1);
$this->_sections['day']['last']       = ($this->_sections['day']['iteration'] == $this->_sections['day']['total']);
?>
											<?php if ($this->_sections['day']['iteration'] % 8 == 1): ?>
											<?php $this->assign('id', $this->_sections['day']['index']-6); ?>
											<?php $this->assign('descr', $this->_sections['day']['index']-5); ?>
											<?php $this->assign('begtime', $this->_sections['day']['index']-4); ?>
											<?php $this->assign('endtime', $this->_sections['day']['index']-3); ?>
											<?php $this->assign('begbreak', $this->_sections['day']['index']-2); ?>
											<?php $this->assign('endbreak', $this->_sections['day']['index']-1); ?>
											<td align="center" width="<?php echo $this->_tpl_vars['size']; ?>
%" style="background-color:<?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_sections['day']['index_next']]['daycolor']; ?>
" 
											    onmouseover="document.getElementById('divdetails-<?php echo $this->_sections['groupmember']['iteration']; ?>
-<?php echo $this->_sections['day']['iteration']; ?>
').style.display = 'block';document.getElementById('divabs-<?php echo $this->_sections['groupmember']['iteration']; ?>
-<?php echo $this->_sections['day']['iteration']; ?>
').style.display = 'block'"
											    onmouseout ="document.getElementById('divdetails-<?php echo $this->_sections['groupmember']['iteration']; ?>
-<?php echo $this->_sections['day']['iteration']; ?>
').style.display = 'none';document.getElementById('divabs-<?php echo $this->_sections['groupmember']['iteration']; ?>
-<?php echo $this->_sections['day']['iteration']; ?>
').style.display = 'none'">
											<?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_sections['day']['index']]['nb_hours']; ?>

											</td>
											<?php endif; ?>
										<?php endfor; endif; ?>
									</tr>
									<?php endfor; endif; ?>
									
								</table>
								
								<br>
								
								<div id="details">
								<?php unset($this->_sections['groupmember']);
$this->_sections['groupmember']['name'] = 'groupmember';
$this->_sections['groupmember']['loop'] = is_array($_loop=$this->_tpl_vars['groupmembers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['groupmember']['show'] = true;
$this->_sections['groupmember']['max'] = $this->_sections['groupmember']['loop'];
$this->_sections['groupmember']['step'] = 1;
$this->_sections['groupmember']['start'] = $this->_sections['groupmember']['step'] > 0 ? 0 : $this->_sections['groupmember']['loop']-1;
if ($this->_sections['groupmember']['show']) {
    $this->_sections['groupmember']['total'] = $this->_sections['groupmember']['loop'];
    if ($this->_sections['groupmember']['total'] == 0)
        $this->_sections['groupmember']['show'] = false;
} else
    $this->_sections['groupmember']['total'] = 0;
if ($this->_sections['groupmember']['show']):

            for ($this->_sections['groupmember']['index'] = $this->_sections['groupmember']['start'], $this->_sections['groupmember']['iteration'] = 1;
                 $this->_sections['groupmember']['iteration'] <= $this->_sections['groupmember']['total'];
                 $this->_sections['groupmember']['index'] += $this->_sections['groupmember']['step'], $this->_sections['groupmember']['iteration']++):
$this->_sections['groupmember']['rownum'] = $this->_sections['groupmember']['iteration'];
$this->_sections['groupmember']['index_prev'] = $this->_sections['groupmember']['index'] - $this->_sections['groupmember']['step'];
$this->_sections['groupmember']['index_next'] = $this->_sections['groupmember']['index'] + $this->_sections['groupmember']['step'];
$this->_sections['groupmember']['first']      = ($this->_sections['groupmember']['iteration'] == 1);
$this->_sections['groupmember']['last']       = ($this->_sections['groupmember']['iteration'] == $this->_sections['groupmember']['total']);
?>
									<?php unset($this->_sections['day']);
$this->_sections['day']['name'] = 'day';
$this->_sections['day']['loop'] = is_array($_loop=$this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day']['start'] = (int)11;
$this->_sections['day']['show'] = true;
$this->_sections['day']['max'] = $this->_sections['day']['loop'];
$this->_sections['day']['step'] = 1;
if ($this->_sections['day']['start'] < 0)
    $this->_sections['day']['start'] = max($this->_sections['day']['step'] > 0 ? 0 : -1, $this->_sections['day']['loop'] + $this->_sections['day']['start']);
else
    $this->_sections['day']['start'] = min($this->_sections['day']['start'], $this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] : $this->_sections['day']['loop']-1);
if ($this->_sections['day']['show']) {
    $this->_sections['day']['total'] = min(ceil(($this->_sections['day']['step'] > 0 ? $this->_sections['day']['loop'] - $this->_sections['day']['start'] : $this->_sections['day']['start']+1)/abs($this->_sections['day']['step'])), $this->_sections['day']['max']);
    if ($this->_sections['day']['total'] == 0)
        $this->_sections['day']['show'] = false;
} else
    $this->_sections['day']['total'] = 0;
if ($this->_sections['day']['show']):

            for ($this->_sections['day']['index'] = $this->_sections['day']['start'], $this->_sections['day']['iteration'] = 1;
                 $this->_sections['day']['iteration'] <= $this->_sections['day']['total'];
                 $this->_sections['day']['index'] += $this->_sections['day']['step'], $this->_sections['day']['iteration']++):
$this->_sections['day']['rownum'] = $this->_sections['day']['iteration'];
$this->_sections['day']['index_prev'] = $this->_sections['day']['index'] - $this->_sections['day']['step'];
$this->_sections['day']['index_next'] = $this->_sections['day']['index'] + $this->_sections['day']['step'];
$this->_sections['day']['first']      = ($this->_sections['day']['iteration'] == 1);
$this->_sections['day']['last']       = ($this->_sections['day']['iteration'] == $this->_sections['day']['total']);
?>
										<?php if ($this->_sections['day']['iteration'] % 8 == 1): ?>
											<?php $this->assign('id', $this->_sections['day']['index']-6); ?>
											<?php $this->assign('descr', $this->_sections['day']['index']-5); ?>
											<?php $this->assign('begtime', $this->_sections['day']['index']-4); ?>
											<?php $this->assign('endtime', $this->_sections['day']['index']-3); ?>
											<?php $this->assign('begbreak', $this->_sections['day']['index']-2); ?>
											<?php $this->assign('endbreak', $this->_sections['day']['index']-1); ?>
											<?php $this->assign('cursor1', $this->_sections['day']['index']-3); ?>
											<?php $this->assign('cursor', $this->_tpl_vars['cursor1']/8); ?>
										<div id="divdetails-<?php echo $this->_sections['groupmember']['iteration']; ?>
-<?php echo $this->_sections['day']['iteration']; ?>
" style="display: none; background-color: <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_sections['day']['index_next']]['daycolor']; ?>
;">
											<u><?php echo $this->_tpl_vars['cursor']; ?>
 <?php echo $this->_tpl_vars['mois']; ?>
 <?php echo $this->_tpl_vars['annee']; ?>
 - <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_tpl_vars['descr']]['description']; ?>
</u><br>
											<?php echo $this->_config[0]['vars']['dico_user_teamcalendar_horaire']; ?>
: <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_tpl_vars['begtime']]['begtime']; ?>
 - <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_tpl_vars['endtime']]['endtime']; ?>
<br>
											<?php echo $this->_config[0]['vars']['dico_user_teamcalendar_break']; ?>
: <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_tpl_vars['begbreak']]['begbreak']; ?>
 - <?php echo $this->_tpl_vars['groupmembers'][$this->_sections['groupmember']['index']][$this->_tpl_vars['endbreak']]['endbreak']; ?>
<br> 
										</div>
										<?php endif; ?>
									<?php endfor; endif; ?>
								<?php endfor; endif; ?>	
								</div>
								
								<div id="absences">
								<?php unset($this->_sections['absence']);
$this->_sections['absence']['name'] = 'absence';
$this->_sections['absence']['loop'] = is_array($_loop=$this->_tpl_vars['absences']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['absence']['show'] = true;
$this->_sections['absence']['max'] = $this->_sections['absence']['loop'];
$this->_sections['absence']['step'] = 1;
$this->_sections['absence']['start'] = $this->_sections['absence']['step'] > 0 ? 0 : $this->_sections['absence']['loop']-1;
if ($this->_sections['absence']['show']) {
    $this->_sections['absence']['total'] = $this->_sections['absence']['loop'];
    if ($this->_sections['absence']['total'] == 0)
        $this->_sections['absence']['show'] = false;
} else
    $this->_sections['absence']['total'] = 0;
if ($this->_sections['absence']['show']):

            for ($this->_sections['absence']['index'] = $this->_sections['absence']['start'], $this->_sections['absence']['iteration'] = 1;
                 $this->_sections['absence']['iteration'] <= $this->_sections['absence']['total'];
                 $this->_sections['absence']['index'] += $this->_sections['absence']['step'], $this->_sections['absence']['iteration']++):
$this->_sections['absence']['rownum'] = $this->_sections['absence']['iteration'];
$this->_sections['absence']['index_prev'] = $this->_sections['absence']['index'] - $this->_sections['absence']['step'];
$this->_sections['absence']['index_next'] = $this->_sections['absence']['index'] + $this->_sections['absence']['step'];
$this->_sections['absence']['first']      = ($this->_sections['absence']['iteration'] == 1);
$this->_sections['absence']['last']       = ($this->_sections['absence']['iteration'] == $this->_sections['absence']['total']);
?>
									<?php unset($this->_sections['day']);
$this->_sections['day']['name'] = 'day';
$this->_sections['day']['loop'] = is_array($_loop=$this->_tpl_vars['absences'][$this->_sections['absence']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['day']['show'] = true;
$this->_sections['day']['max'] = $this->_sections['day']['loop'];
$this->_sections['day']['step'] = 1;
$this->_sections['day']['start'] = $this->_sections['day']['step'] > 0 ? 0 : $this->_sections['day']['loop']-1;
if ($this->_sections['day']['show']) {
    $this->_sections['day']['total'] = $this->_sections['day']['loop'];
    if ($this->_sections['day']['total'] == 0)
        $this->_sections['day']['show'] = false;
} else
    $this->_sections['day']['total'] = 0;
if ($this->_sections['day']['show']):

            for ($this->_sections['day']['index'] = $this->_sections['day']['start'], $this->_sections['day']['iteration'] = 1;
                 $this->_sections['day']['iteration'] <= $this->_sections['day']['total'];
                 $this->_sections['day']['index'] += $this->_sections['day']['step'], $this->_sections['day']['iteration']++):
$this->_sections['day']['rownum'] = $this->_sections['day']['iteration'];
$this->_sections['day']['index_prev'] = $this->_sections['day']['index'] - $this->_sections['day']['step'];
$this->_sections['day']['index_next'] = $this->_sections['day']['index'] + $this->_sections['day']['step'];
$this->_sections['day']['first']      = ($this->_sections['day']['iteration'] == 1);
$this->_sections['day']['last']       = ($this->_sections['day']['iteration'] == $this->_sections['day']['total']);
?>
										
										<?php $this->assign('part1', $this->_sections['day']['index']+1); ?>
										<?php $this->assign('part2', $this->_tpl_vars['part1']*8); ?>
										<?php $this->assign('part3', $this->_tpl_vars['part2']+1); ?>
										<?php $this->assign('id', $this->_tpl_vars['part3']-8); ?>
									
										<div id="divabs-<?php echo $this->_sections['absence']['iteration']; ?>
-<?php echo $this->_tpl_vars['id']; ?>
" style="display: none">
											
											<?php unset($this->_sections['abs']);
$this->_sections['abs']['name'] = 'abs';
$this->_sections['abs']['loop'] = is_array($_loop=$this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['abs']['show'] = true;
$this->_sections['abs']['max'] = $this->_sections['abs']['loop'];
$this->_sections['abs']['step'] = 1;
$this->_sections['abs']['start'] = $this->_sections['abs']['step'] > 0 ? 0 : $this->_sections['abs']['loop']-1;
if ($this->_sections['abs']['show']) {
    $this->_sections['abs']['total'] = $this->_sections['abs']['loop'];
    if ($this->_sections['abs']['total'] == 0)
        $this->_sections['abs']['show'] = false;
} else
    $this->_sections['abs']['total'] = 0;
if ($this->_sections['abs']['show']):

            for ($this->_sections['abs']['index'] = $this->_sections['abs']['start'], $this->_sections['abs']['iteration'] = 1;
                 $this->_sections['abs']['iteration'] <= $this->_sections['abs']['total'];
                 $this->_sections['abs']['index'] += $this->_sections['abs']['step'], $this->_sections['abs']['iteration']++):
$this->_sections['abs']['rownum'] = $this->_sections['abs']['iteration'];
$this->_sections['abs']['index_prev'] = $this->_sections['abs']['index'] - $this->_sections['abs']['step'];
$this->_sections['abs']['index_next'] = $this->_sections['abs']['index'] + $this->_sections['abs']['step'];
$this->_sections['abs']['first']      = ($this->_sections['abs']['iteration'] == 1);
$this->_sections['abs']['last']       = ($this->_sections['abs']['iteration'] == $this->_sections['abs']['total']);
?>
											<?php if ($this->_sections['abs']['iteration'] == 1): ?>
												<br>
												<u><?php echo $this->_config[0]['vars']['dico_user_teamcalendar_absence']; ?>
</u>
												<br>
											<?php endif; ?>
											<?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']][$this->_sections['abs']['index']]['absenceid']; ?>
: 
												<?php if ($this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']][$this->_sections['abs']['index']]['beghr'] == '00:00:00' && $this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']][$this->_sections['abs']['index']]['endhr'] == '00:00:00'): ?>
													<?php echo $this->_config[0]['vars']['dico_user_teamcalendar_allday']; ?>

												<?php else: ?>
													<?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']][$this->_sections['abs']['index']]['beghr']; ?>
 - <?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']][$this->_sections['day']['index']][$this->_sections['abs']['index']]['endhr']; ?>
 
												<?php endif; ?>
											<br>
											<?php endfor; endif; ?> 
										</div>
									<?php endfor; endif; ?>
								<?php endfor; endif; ?>	
								</div>
											
								</div>
								
								<div class="table_body">
								</div> 							
							<div class="clear_both"></div> 			
						</div> 					
					</div> 	
					
				</div>
					
			</div>

	</div>
	

	<?php echo '

	'; ?>

	
	