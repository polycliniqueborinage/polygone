<?php /* Smarty version 2.6.19, created on 2013-05-24 09:17:43
         compiled from template_user_quota_overview.tpl */ ?>
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
					
    				<a href="./user_services.php?action=team_calendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_teamcalendar']; ?>
</a>
    				<a href="./user_services.php?action=leave_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_pending_requests']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_quotas']; ?>
</span>
    				<a href="./user_services.php?action=absence_request"><?php echo $this->_config[0]['vars']['navigation_title_user_services_leaverequest']; ?>
</a>
    				<?php if ($this->_tpl_vars['ismanager'] == 'X'): ?>
    					<a href="./user_services.php?action=tasks_overview"><?php echo $this->_config[0]['vars']['navigation_user_mss']; ?>
</a>
    					<a href="./user_services.php?action=my_teams_calendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_myteamscalendar']; ?>
</a>
    				<?php endif; ?>
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_quotas_overview']; ?>
</span>
									</a>
								</h2>
								
							</div>
			
								<div class="clear_both"></div> 								
								<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_id']; ?>
</td>
												<td class="b" style="width:16%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_description']; ?>
</td>
												<td class="b" style="width:10%"  align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_type']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_begda']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_endda']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_startsaldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_usedsaldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_requestedsaldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_config[0]['vars']['dico_user_myservices_quota_remainingsaldo']; ?>
</td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										<?php unset($this->_sections['quota']);
$this->_sections['quota']['name'] = 'quota';
$this->_sections['quota']['loop'] = is_array($_loop=$this->_tpl_vars['quotas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['quota']['show'] = true;
$this->_sections['quota']['max'] = $this->_sections['quota']['loop'];
$this->_sections['quota']['step'] = 1;
$this->_sections['quota']['start'] = $this->_sections['quota']['step'] > 0 ? 0 : $this->_sections['quota']['loop']-1;
if ($this->_sections['quota']['show']) {
    $this->_sections['quota']['total'] = $this->_sections['quota']['loop'];
    if ($this->_sections['quota']['total'] == 0)
        $this->_sections['quota']['show'] = false;
} else
    $this->_sections['quota']['total'] = 0;
if ($this->_sections['quota']['show']):

            for ($this->_sections['quota']['index'] = $this->_sections['quota']['start'], $this->_sections['quota']['iteration'] = 1;
                 $this->_sections['quota']['iteration'] <= $this->_sections['quota']['total'];
                 $this->_sections['quota']['index'] += $this->_sections['quota']['step'], $this->_sections['quota']['iteration']++):
$this->_sections['quota']['rownum'] = $this->_sections['quota']['iteration'];
$this->_sections['quota']['index_prev'] = $this->_sections['quota']['index'] - $this->_sections['quota']['step'];
$this->_sections['quota']['index_next'] = $this->_sections['quota']['index'] + $this->_sections['quota']['step'];
$this->_sections['quota']['first']      = ($this->_sections['quota']['iteration'] == 1);
$this->_sections['quota']['last']       = ($this->_sections['quota']['iteration'] == $this->_sections['quota']['total']);
?>
										
										<?php if ($this->_sections['log']['index'] % 2 == 0): ?>
										<li class="bg_a">
										<?php else: ?>
										<li class="bg_b">
										<?php endif; ?>
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['id']; ?>
</td>
												<td class="b" style="width:16%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['description']; ?>
</td>
												<td class="b" style="width:10%"  align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['type']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['begda']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['endda']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['start_saldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['used_saldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['requested_saldo']; ?>
</td>
												<td class="b" style="width:10%" align="left"><b><?php echo $this->_tpl_vars['quotas'][$this->_sections['quota']['index']]['remaining_saldo']; ?>
</b></td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									
										</li>

	
										<?php endfor; endif; ?>
										
									</div> 									
								<div class="clear_both"></div> 									
							</div>
			
						</div> 					
					</div> 	
					
				</div>
					
			</div>

	</div>
	

	<?php echo '

	'; ?>

	
	