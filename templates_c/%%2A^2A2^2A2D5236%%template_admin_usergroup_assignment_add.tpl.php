<?php /* Smarty version 2.6.19, created on 2013-02-15 10:13:41
         compiled from template_admin_usergroup_assignment_add.tpl */ ?>
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
				
    				<a href="./admin_grh.php?action=add_usergroup"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_add']; ?>
</a>
    			
    				<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_add']; ?>
</span>
    				
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
									<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_add']; ?>
</span>
								</a>
								</h2>
							</div>
			
							<div id = "addassignment" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="admin_grh.php?action=submit_assignment" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">

											<div class="row">
											<label for = "group" class="name"><?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_groupe']; ?>
:</label>
											<select name="group" id="group" realname="<?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_groupe']; ?>
" autocomplete="off">
											<option value="0" SELECTED="true"><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>			
											<?php unset($this->_sections['groupe']);
$this->_sections['groupe']['name'] = 'groupe';
$this->_sections['groupe']['loop'] = is_array($_loop=$this->_tpl_vars['groupes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['groupe']['show'] = true;
$this->_sections['groupe']['max'] = $this->_sections['groupe']['loop'];
$this->_sections['groupe']['step'] = 1;
$this->_sections['groupe']['start'] = $this->_sections['groupe']['step'] > 0 ? 0 : $this->_sections['groupe']['loop']-1;
if ($this->_sections['groupe']['show']) {
    $this->_sections['groupe']['total'] = $this->_sections['groupe']['loop'];
    if ($this->_sections['groupe']['total'] == 0)
        $this->_sections['groupe']['show'] = false;
} else
    $this->_sections['groupe']['total'] = 0;
if ($this->_sections['groupe']['show']):

            for ($this->_sections['groupe']['index'] = $this->_sections['groupe']['start'], $this->_sections['groupe']['iteration'] = 1;
                 $this->_sections['groupe']['iteration'] <= $this->_sections['groupe']['total'];
                 $this->_sections['groupe']['index'] += $this->_sections['groupe']['step'], $this->_sections['groupe']['iteration']++):
$this->_sections['groupe']['rownum'] = $this->_sections['groupe']['iteration'];
$this->_sections['groupe']['index_prev'] = $this->_sections['groupe']['index'] - $this->_sections['groupe']['step'];
$this->_sections['groupe']['index_next'] = $this->_sections['groupe']['index'] + $this->_sections['groupe']['step'];
$this->_sections['groupe']['first']      = ($this->_sections['groupe']['iteration'] == 1);
$this->_sections['groupe']['last']       = ($this->_sections['groupe']['iteration'] == $this->_sections['groupe']['total']);
?>
												<option value="<?php echo $this->_tpl_vars['groupes'][$this->_sections['groupe']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['groupes'][$this->_sections['groupe']['index']]['description']; ?>
</option>
											<?php endfor; endif; ?>
											</select>
											</div>
											
											<div class="row">
											<label for = "member" class="name"><?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_member']; ?>
:</label>
											<select name="member" id="member" realname="<?php echo $this->_config[0]['vars']['dico_admin_grh_usergroup_member']; ?>
" autocomplete="off">
											<option value="0" SELECTED="true"><?php echo $this->_config[0]['vars']['dico_management_wsr_choice']; ?>
</option>			
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
												<option value="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</option>
											<?php endfor; endif; ?>
											
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

	