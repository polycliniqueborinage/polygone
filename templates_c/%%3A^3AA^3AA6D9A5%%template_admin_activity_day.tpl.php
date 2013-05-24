<?php /* Smarty version 2.6.19, created on 2012-11-22 14:45:55
         compiled from template_admin_activity_day.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_datepicker' => 'yes','js_jquery_autocomplete' => 'yes','js_thickbox' => 'yes','js_product' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes')));
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

					<span><?php echo $this->_config[0]['vars']['dico_admin_activity_day']; ?>
</span> 

    				<a href="./admin_activity.php?action=all"><?php echo $this->_config[0]['vars']['dico_admin_activity_list']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						
					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="history_toggle" class="win_block" onclick = "toggleBlock('history');"><img src="./templates/standard/img/symbols/timetracker.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_admin_activity_submenu_day']; ?>
</span></a>
								</h2>
						
							</div>
					
							<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:22%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_date']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_user_name']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_object']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_type']; ?>
</td>
												<td class="b" style="width:40%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_action']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										<?php unset($this->_sections['log']);
$this->_sections['log']['name'] = 'log';
$this->_sections['log']['loop'] = is_array($_loop=$this->_tpl_vars['logs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['log']['show'] = true;
$this->_sections['log']['max'] = $this->_sections['log']['loop'];
$this->_sections['log']['step'] = 1;
$this->_sections['log']['start'] = $this->_sections['log']['step'] > 0 ? 0 : $this->_sections['log']['loop']-1;
if ($this->_sections['log']['show']) {
    $this->_sections['log']['total'] = $this->_sections['log']['loop'];
    if ($this->_sections['log']['total'] == 0)
        $this->_sections['log']['show'] = false;
} else
    $this->_sections['log']['total'] = 0;
if ($this->_sections['log']['show']):

            for ($this->_sections['log']['index'] = $this->_sections['log']['start'], $this->_sections['log']['iteration'] = 1;
                 $this->_sections['log']['iteration'] <= $this->_sections['log']['total'];
                 $this->_sections['log']['index'] += $this->_sections['log']['step'], $this->_sections['log']['iteration']++):
$this->_sections['log']['rownum'] = $this->_sections['log']['iteration'];
$this->_sections['log']['index_prev'] = $this->_sections['log']['index'] - $this->_sections['log']['step'];
$this->_sections['log']['index_next'] = $this->_sections['log']['index'] + $this->_sections['log']['step'];
$this->_sections['log']['first']      = ($this->_sections['log']['iteration'] == 1);
$this->_sections['log']['last']       = ($this->_sections['log']['iteration'] == $this->_sections['log']['total']);
?>
										
										<?php if ($this->_sections['log']['index'] % 2 == 0): ?>
										<li class="bg_a">
										<?php else: ?>
										<li class="bg_b">
										<?php endif; ?>
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:22%"><?php echo $this->_tpl_vars['logs'][$this->_sections['log']['index']]['date']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_tpl_vars['logs'][$this->_sections['log']['index']]['user_name']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_tpl_vars['logs'][$this->_sections['log']['index']]['object']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_tpl_vars['logs'][$this->_sections['log']['index']]['type']; ?>
</td>
												<td class="b" style="width:40%"><?php echo $this->_tpl_vars['logs'][$this->_sections['log']['index']]['action']; ?>
</td>
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

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	