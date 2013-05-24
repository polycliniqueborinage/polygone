<?php /* Smarty version 2.6.19, created on 2013-05-24 09:17:44
         compiled from template_user_leaverequest_overview.tpl */ ?>
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
    				<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_pending_requests']; ?>
</span>
    				<a href="./user_services.php?action=quota_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_quotas']; ?>
</a>
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
										<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_pending_requests']; ?>
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
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_user_myservices_absencetype']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_user_myservices_begda']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_user_myservices_endda']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_user_myservices_beghr']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_user_myservices_endhr']; ?>
</td>
												<td class="b" style="width:16%"><?php echo $this->_config[0]['vars']['dico_user_myservices_comment']; ?>
</td>
												<td class="b" style="width:14%"><?php echo $this->_config[0]['vars']['dico_user_myservices_leaverequest_status']; ?>
</td>
												<td class="b" style="width:16%"><?php echo $this->_config[0]['vars']['dico_user_myservices_leaverequest_owner']; ?>
</td>
												<td class="b" style="width:2%"></td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

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
										
										<?php if ($this->_sections['log']['index'] % 2 == 0): ?>
										<li class="bg_a">
										<?php else: ?>
										<li class="bg_b">
										<?php endif; ?>
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['absenceid']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['begda']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['endda']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['beghr']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['endhr']; ?>
</td>
												<td class="b" style="width:16%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['textcomment']; ?>
</td>
												<td class="b" style="width:14%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['status_description']; ?>
</td>
												<td class="b" style="width:16%"><?php echo $this->_tpl_vars['absences'][$this->_sections['absence']['index']]['owner_name']; ?>
</td>
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

	
	