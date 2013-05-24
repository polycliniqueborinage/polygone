<?php /* Smarty version 2.6.19, created on 2013-02-15 10:13:57
         compiled from template_admin_usergroup_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_workschedule' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
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

					<a href="./admin_grh.php?action=list_usergroup"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_liste']; ?>
</a>

    				<?php if ($this->_tpl_vars['ug']['id'] != ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_edit']; ?>
</span>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['ug']['id'] == ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_add']; ?>
</span>
					<?php endif; ?>
    				
    				<a href="./admin_grh.php?action=add_assignment"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_add']; ?>
</a>
    				
    				<a href="./admin_grh.php?action=list_assignment"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_list']; ?>
</a>
    				
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('dwsedit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
									<?php if ($this->_tpl_vars['ug']['id'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['ug']['id'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_add']; ?>
</span>
									<?php endif; ?>
								</a>
								</h2>
							</div>
			
							<div id = "dwsedit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="admin_grh.php?action=submit_usergroup" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										<input type = "hidden" value = "<?php echo $this->_tpl_vars['ug']['id']; ?>
" name = "id" id="id" class="<?php echo $this->_tpl_vars['errors']['id']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_id']; ?>
" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/>

											<div class="row"><label for = "description" class="name"><?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_description']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['ug']['description']; ?>
" name = "description" id="description" class="<?php echo $this->_tpl_vars['errors']['description']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_description']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row">
											<label for = "leader" class="name"><?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_leader']; ?>
:</label>
											<select name="leader" id="leader" realname="<?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_leader']; ?>
" autocomplete="off">
														
											<?php unset($this->_sections['user']);
$this->_sections['user']['name'] = 'user';
$this->_sections['user']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['user']['show'] = true;
$this->_sections['user']['max'] = $this->_sections['user']['loop'];
$this->_sections['user']['step'] = 1;
$this->_sections['user']['start'] = $this->_sections['user']['step'] > 0 ? 0 : $this->_sections['user']['loop']-1;
if ($this->_sections['user']['show']) {
    $this->_sections['user']['total'] = $this->_sections['user']['loop'];
    if ($this->_sections['user']['total'] == 0)
        $this->_sections['user']['show'] = false;
} else
    $this->_sections['user']['total'] = 0;
if ($this->_sections['user']['show']):

            for ($this->_sections['user']['index'] = $this->_sections['user']['start'], $this->_sections['user']['iteration'] = 1;
                 $this->_sections['user']['iteration'] <= $this->_sections['user']['total'];
                 $this->_sections['user']['index'] += $this->_sections['user']['step'], $this->_sections['user']['iteration']++):
$this->_sections['user']['rownum'] = $this->_sections['user']['iteration'];
$this->_sections['user']['index_prev'] = $this->_sections['user']['index'] - $this->_sections['user']['step'];
$this->_sections['user']['index_next'] = $this->_sections['user']['index'] + $this->_sections['user']['step'];
$this->_sections['user']['first']      = ($this->_sections['user']['iteration'] == 1);
$this->_sections['user']['last']       = ($this->_sections['user']['iteration'] == $this->_sections['user']['total']);
?>
												<?php if ($this->_tpl_vars['users'][$this->_sections['user']['index']]['id'] == $this->_tpl_vars['ug']['leader']): ?>
													<option value="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" SELECTED="true"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</option>
												<?php else: ?>
													<option value="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</option>
												<?php endif; ?>
											<?php endfor; endif; ?>
											<option value="0" SELECTED="true"><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>
											</select>
											</div>
			
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
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
	  			description: "required",
	  			
   			},
   			messages: {
 				description: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
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

	