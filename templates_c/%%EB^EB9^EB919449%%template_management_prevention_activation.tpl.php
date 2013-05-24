<?php /* Smarty version 2.6.19, created on 2013-04-11 14:49:49
         compiled from template_management_prevention_activation.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_progressbar' => 'yes','js_jqmodal' => 'yes','js_prevention' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_prevention.php"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_status']; ?>
</a>

    				<a href="./management_prevention.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list']; ?>
</a>

    				<a href="./management_prevention.php?action=list_deleted"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list_deleted']; ?>
</a>

					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_activation']; ?>
</span> 

    				<a href="./management_prevention.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</a>

    				<a href="./management_prevention.php?action=timeplot"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_timeplot']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_error1']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error2'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_error2']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'delete'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_motif_deleted']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'added'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_motif_added']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_motif_edited']; ?>
</span>
						<?php endif; ?>
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
					
					<div class="block_a">
						
						<div class="in">
						
							<div class="headline">

								<a href="#" id="activation_toggle" class="win_block" onclick = "toggleBlock('activation');"></a>
									
								<div class="clear_both"></div> 									
								<div style="position:relative;">
									
										<div class="win_tools">
											<h2>
												<img src="./templates/standard/img/symbols/detail.png" alt="" />
												<span><?php echo $this->_config[0]['vars']['dico_management_prevention_submenu_activation']; ?>
</span>
											</h2>
										</div>
									</div>
																   
							   	</div>

								<div class="projects">

									<div class="block" id="activation">

										<div class="nosmooth" id="sm_myprojects">
				
											<table cellpadding="0" cellspacing="0" border="0">

												<thead>
					
													<tr>
						
														<th class="tools"></th>
														<th></th>
														<th></th>
														<th></th>
														<th class="a"></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
												
													</tr>
							
												</thead>

												<tfoot>
												<tr>
												<td colspan="5"></td>
												</tr>
												</tfoot>
					
												<?php unset($this->_sections['motif']);
$this->_sections['motif']['name'] = 'motif';
$this->_sections['motif']['loop'] = is_array($_loop=$this->_tpl_vars['motifs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['motif']['show'] = true;
$this->_sections['motif']['max'] = $this->_sections['motif']['loop'];
$this->_sections['motif']['step'] = 1;
$this->_sections['motif']['start'] = $this->_sections['motif']['step'] > 0 ? 0 : $this->_sections['motif']['loop']-1;
if ($this->_sections['motif']['show']) {
    $this->_sections['motif']['total'] = $this->_sections['motif']['loop'];
    if ($this->_sections['motif']['total'] == 0)
        $this->_sections['motif']['show'] = false;
} else
    $this->_sections['motif']['total'] = 0;
if ($this->_sections['motif']['show']):

            for ($this->_sections['motif']['index'] = $this->_sections['motif']['start'], $this->_sections['motif']['iteration'] = 1;
                 $this->_sections['motif']['iteration'] <= $this->_sections['motif']['total'];
                 $this->_sections['motif']['index'] += $this->_sections['motif']['step'], $this->_sections['motif']['iteration']++):
$this->_sections['motif']['rownum'] = $this->_sections['motif']['iteration'];
$this->_sections['motif']['index_prev'] = $this->_sections['motif']['index'] - $this->_sections['motif']['step'];
$this->_sections['motif']['index_next'] = $this->_sections['motif']['index'] + $this->_sections['motif']['step'];
$this->_sections['motif']['first']      = ($this->_sections['motif']['iteration'] == 1);
$this->_sections['motif']['last']       = ($this->_sections['motif']['iteration'] == $this->_sections['motif']['total']);
?>

																								<?php if ($this->_sections['motif']['index'] % 2 == 0): ?>
												<tbody class="color-a" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php else: ?>
												<tbody class="color-b" id="task_<?php echo $this->_tpl_vars['tasks'][$this->_sections['task']['index']]['ID']; ?>
">
												<?php endif; ?>
											
												<tr>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_motif_box(<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_detail']; ?>
" ></a>
													<a class="tool_edit" href="management_prevention.php?action=edit&id=<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_edit']; ?>
" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_motif_confirmbox(<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_delete']; ?>
" ></a>
												</td>
												<td>
												<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['description']; ?>

												</td>
												<td><a class="tool_print" href="#" onclick="javascript:print_courriel_test(<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_print_test']; ?>
" /></td>
                    				        	<?php if ($this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['lasteddate'] != $this->_tpl_vars['today']): ?>
												<td><a class="tool_laught" href="#" onclick="javascript:start_motif_batch(<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
,<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['time_avg']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_batch']; ?>
 <?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['lasteddate']; ?>
" /></td>
												<?php elseif ($this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['lasteddate'] == $this->_tpl_vars['today']): ?>
												<td><a class="tool_laught_lock" href="javascript:void(0);" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_batch']; ?>
 <?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['lasteddate']; ?>
" /></td>
												<?php endif; ?>
												<td><span class="progressBar" id="spaceused<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
">0%</span></td>
                    				        	<td><span id="first_insertion<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['first_insertion']; ?>
</span> <?php echo $this->_config[0]['vars']['dico_management_prevention_first_insertion']; ?>
</td>
												<td><span id="to_call_back<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['to_call_back']; ?>
</span> <?php echo $this->_config[0]['vars']['dico_management_prevention_to_call_back']; ?>
</td>
												<td><span id="init_contact<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['init_contact']; ?>
</span> <?php echo $this->_config[0]['vars']['dico_management_prevention_init_contact']; ?>
</td>
												<td><span id="still_exist<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['still_exist']; ?>
</span> <?php echo $this->_config[0]['vars']['dico_management_prevention_still_exist']; ?>
</td>
												<td><span id="deleted<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['deleted']; ?>
</span> <?php echo $this->_config[0]['vars']['dico_management_prevention_deleted']; ?>
</td>
											</tr>

											
											</tbody>
											<?php endfor; endif; ?>
	
											</table>

									</div>
										
								</div>
								
							</div>
								
						</div>
					
					</div>
					
				</div>
					
			</div>

		</div>

	</div>
	
	
	<div class="jqmWindow" id="viewbox">
	
	</div>
	
	<div class="jqmWindow" id="confirmbox">
	
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
						<?php echo $this->_config[0]['vars']['dico_management_prevention_confirme_delete_motif']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:delete_motif();" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_management_prevention_button_delete']; ?>
</span></a>
							<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_management_prevention_button_cancel']; ?>
</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script type="text/javascript">
	
		var progress_key = \'\';

		$(document).ready(function() {
		
			$(\'#confirmbox\').jqm({ });
	
			$(\'#viewbox\').jqm({ });

			$(".progressBar").progressBar({ barImage: \'./templates/standard/img/progressbar/progressbg_orange.gif\', showText: false} );
		
		});
		
	</script>
	'; ?>