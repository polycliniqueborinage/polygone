<?php /* Smarty version 2.6.19, created on 2012-09-14 13:33:24
         compiled from template_management_protocol_view.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_protocol' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php if ($this->_tpl_vars['modules']['management_protocol_adminstate'] == 3): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_protocol_adminstate'] == 4): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_protocol.php?action=search"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_search']; ?>
</a>

    				<a href="./management_protocol.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_add']; ?>
</a>

	  				<a href="./management_protocol.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_list']; ?>
</a>
						
					<span><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_view']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'saved'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_protocol_saved']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_protocol_edited']; ?>
</span>
						<?php endif; ?>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="protocol_toggle" class="win_block" onclick = "toggleBlock('protocol');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_management_protocol_submenu_view']; ?>
</span></a>
								</h2>
						
							</div>

							<div id = "protocol" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<?php echo $this->_tpl_vars['protocol']; ?>

											
											<?php if (protocol_files): ?>
											<b>Fichiers attach&eacute;s</b>
											<br/>
											<?php endif; ?>
											
											<?php unset($this->_sections['protocol_file']);
$this->_sections['protocol_file']['name'] = 'protocol_file';
$this->_sections['protocol_file']['loop'] = is_array($_loop=$this->_tpl_vars['protocol_files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['protocol_file']['show'] = true;
$this->_sections['protocol_file']['max'] = $this->_sections['protocol_file']['loop'];
$this->_sections['protocol_file']['step'] = 1;
$this->_sections['protocol_file']['start'] = $this->_sections['protocol_file']['step'] > 0 ? 0 : $this->_sections['protocol_file']['loop']-1;
if ($this->_sections['protocol_file']['show']) {
    $this->_sections['protocol_file']['total'] = $this->_sections['protocol_file']['loop'];
    if ($this->_sections['protocol_file']['total'] == 0)
        $this->_sections['protocol_file']['show'] = false;
} else
    $this->_sections['protocol_file']['total'] = 0;
if ($this->_sections['protocol_file']['show']):

            for ($this->_sections['protocol_file']['index'] = $this->_sections['protocol_file']['start'], $this->_sections['protocol_file']['iteration'] = 1;
                 $this->_sections['protocol_file']['iteration'] <= $this->_sections['protocol_file']['total'];
                 $this->_sections['protocol_file']['index'] += $this->_sections['protocol_file']['step'], $this->_sections['protocol_file']['iteration']++):
$this->_sections['protocol_file']['rownum'] = $this->_sections['protocol_file']['iteration'];
$this->_sections['protocol_file']['index_prev'] = $this->_sections['protocol_file']['index'] - $this->_sections['protocol_file']['step'];
$this->_sections['protocol_file']['index_next'] = $this->_sections['protocol_file']['index'] + $this->_sections['protocol_file']['step'];
$this->_sections['protocol_file']['first']      = ($this->_sections['protocol_file']['iteration'] == 1);
$this->_sections['protocol_file']['last']       = ($this->_sections['protocol_file']['iteration'] == $this->_sections['protocol_file']['total']);
?>
	
												<a target='_blank' title='<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['name']; ?>
' href='management_protocol.php?action=download_file&id=<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
&key=<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['key']; ?>
' class='tool_<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['extension']; ?>
'><?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['name']; ?>
</a>
												<br/>
											
											<?php endfor; endif; ?>
									
											<tr><td class="label"></td><td>
												<a href="management_protocol.php?action=edit&id=<?php echo $this->_tpl_vars['id']; ?>
" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_management_protocol_button_edit']; ?>
</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> 	
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('medecin_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	
	