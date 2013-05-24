<?php /* Smarty version 2.6.19, created on 2012-11-20 11:26:24
         compiled from template_admin_mailing_day.tpl */ ?>
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

					<span><?php echo $this->_config[0]['vars']['dico_admin_mailing_day']; ?>
</span> 

    				<a href="./admin_mailing.php?action=all"><?php echo $this->_config[0]['vars']['dico_admin_mailing_list']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						
					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="history_toggle" class="win_block" onclick = "toggleBlock('history');"><img src="./templates/standard/img/symbols/timetracker.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_admin_mailing_submenu_day']; ?>
</span></a>
								</h2>
						
							</div>
					
							<div id="history" style="display:block">
							
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:23%"><?php echo $this->_config[0]['vars']['dico_admin_mailing_search_colum_rubric']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_config[0]['vars']['dico_admin_mailing_search_colum_user_name']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_config[0]['vars']['dico_admin_mailing_search_colum_user_email']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_config[0]['vars']['dico_admin_mailing_search_colum_subject']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">

										<?php unset($this->_sections['mailing']);
$this->_sections['mailing']['name'] = 'mailing';
$this->_sections['mailing']['loop'] = is_array($_loop=$this->_tpl_vars['mailings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mailing']['show'] = true;
$this->_sections['mailing']['max'] = $this->_sections['mailing']['loop'];
$this->_sections['mailing']['step'] = 1;
$this->_sections['mailing']['start'] = $this->_sections['mailing']['step'] > 0 ? 0 : $this->_sections['mailing']['loop']-1;
if ($this->_sections['mailing']['show']) {
    $this->_sections['mailing']['total'] = $this->_sections['mailing']['loop'];
    if ($this->_sections['mailing']['total'] == 0)
        $this->_sections['mailing']['show'] = false;
} else
    $this->_sections['mailing']['total'] = 0;
if ($this->_sections['mailing']['show']):

            for ($this->_sections['mailing']['index'] = $this->_sections['mailing']['start'], $this->_sections['mailing']['iteration'] = 1;
                 $this->_sections['mailing']['iteration'] <= $this->_sections['mailing']['total'];
                 $this->_sections['mailing']['index'] += $this->_sections['mailing']['step'], $this->_sections['mailing']['iteration']++):
$this->_sections['mailing']['rownum'] = $this->_sections['mailing']['iteration'];
$this->_sections['mailing']['index_prev'] = $this->_sections['mailing']['index'] - $this->_sections['mailing']['step'];
$this->_sections['mailing']['index_next'] = $this->_sections['mailing']['index'] + $this->_sections['mailing']['step'];
$this->_sections['mailing']['first']      = ($this->_sections['mailing']['iteration'] == 1);
$this->_sections['mailing']['last']       = ($this->_sections['mailing']['iteration'] == $this->_sections['mailing']['total']);
?>
										
										<?php if ($this->_sections['log']['index'] % 2 == 0): ?>
										<li class="bg_a">
										<?php else: ?>
										<li class="bg_b">
										<?php endif; ?>
	
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:23%"><?php echo $this->_tpl_vars['mailings'][$this->_sections['mailing']['index']]['rubric']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_tpl_vars['mailings'][$this->_sections['mailing']['index']]['recipient_name']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_tpl_vars['mailings'][$this->_sections['mailing']['index']]['recipient_email']; ?>
</td>
												<td class="b" style="width:25%"><?php echo $this->_tpl_vars['mailings'][$this->_sections['mailing']['index']]['subject']; ?>
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
	