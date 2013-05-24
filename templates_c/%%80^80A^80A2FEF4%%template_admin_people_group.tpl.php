<?php /* Smarty version 2.6.19, created on 2013-05-03 14:40:17
         compiled from template_admin_people_group.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jqmodal' => 'yes','js_group' => 'yes','js_jquery_validate' => 'yes')));
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
				</div>
			
				<div class="ViewPane">
	
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> 
					<div class="infowin_left" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'deleted'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/projects.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_group_wasdeleted']; ?>
</span>
						<?php elseif ($this->_tpl_vars['mode'] == 'added'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/projects.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_group_wasadded']; ?>
</span>
						<?php elseif ($this->_tpl_vars['mode'] == 'deassigned'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/projects.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_group_deassigned']; ?>
</span>
						<?php endif; ?>
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
				
										<div class="block_a">
	
						<div class="in">
			
							<div class="headline">
						
								<h2><a href="#" id="projects_toggle" class="win_block" onclick = "toggleBlock('projects');"><img src="./templates/standard/img/symbols/projects.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['dico_admin_people_group_group']; ?>
</span></a>
								</h2>
			
							</div>
	
						<div id="projects">
	
							<div class="table_head">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="a" style="width:5%"></td>
										<td class="a" style="width:3%"></td>
										<td class="b" style="width:30%"><?php echo $this->_config[0]['vars']['dico_admin_people_group_messages_colum_group']; ?>
</td>
										<td class="c" style="width:20%"></td>
										<td class="d" style="width:20%"></td>
									</tr>
								</table>
							</div>
	
							<div class="table_body">
				
								<div>
							
									<ul id="accordion_projects">
											
									<?php unset($this->_sections['ogroup']);
$this->_sections['ogroup']['name'] = 'ogroup';
$this->_sections['ogroup']['loop'] = is_array($_loop=$this->_tpl_vars['ogroups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ogroup']['show'] = true;
$this->_sections['ogroup']['max'] = $this->_sections['ogroup']['loop'];
$this->_sections['ogroup']['step'] = 1;
$this->_sections['ogroup']['start'] = $this->_sections['ogroup']['step'] > 0 ? 0 : $this->_sections['ogroup']['loop']-1;
if ($this->_sections['ogroup']['show']) {
    $this->_sections['ogroup']['total'] = $this->_sections['ogroup']['loop'];
    if ($this->_sections['ogroup']['total'] == 0)
        $this->_sections['ogroup']['show'] = false;
} else
    $this->_sections['ogroup']['total'] = 0;
if ($this->_sections['ogroup']['show']):

            for ($this->_sections['ogroup']['index'] = $this->_sections['ogroup']['start'], $this->_sections['ogroup']['iteration'] = 1;
                 $this->_sections['ogroup']['iteration'] <= $this->_sections['ogroup']['total'];
                 $this->_sections['ogroup']['index'] += $this->_sections['ogroup']['step'], $this->_sections['ogroup']['iteration']++):
$this->_sections['ogroup']['rownum'] = $this->_sections['ogroup']['iteration'];
$this->_sections['ogroup']['index_prev'] = $this->_sections['ogroup']['index'] - $this->_sections['ogroup']['step'];
$this->_sections['ogroup']['index_next'] = $this->_sections['ogroup']['index'] + $this->_sections['ogroup']['step'];
$this->_sections['ogroup']['first']      = ($this->_sections['ogroup']['iteration'] == 1);
$this->_sections['ogroup']['last']       = ($this->_sections['ogroup']['iteration'] == $this->_sections['ogroup']['total']);
?>
	
																				<?php if ($this->_sections['ogroup']['index'] % 2 == 0): ?>
										<li class="bg_a">
										<?php else: ?>
										<li class="bg_b">
										<?php endif; ?>
		
											<table class="resume" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td class="a" style="width:5%;">
														<div class="accordion_toggle">
															<a class="" style="width:20px;" href="javascript:void(0);" onclick = ""></a>
														</div>
													</td>
													<td class="tools" style="width:3%;">
														<a class="tool_del" onclick="deleteConfirmBox(<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_admin_people_group_delete']; ?>
"></a>
													</td>
													<td class="b" style="width:30%;"><?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['name']; ?>
</td>
													<td class="c" style="width:20%;"></td>
													<td class="d" style="width:20%;"></td>
													</tr>
											</table>
	
											<div class="accordion_content">
													
												<table class="description" cellpadding="0" cellspacing="0"  width="100%">
													
													<tr valign="top">
															
														<td class="a" style="width:5%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="b"  style="width:30%;">
															<h2><?php echo $this->_config[0]['vars']['description']; ?>
</h2>
															<div style="overflow:auto;">
																<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['desc']; ?>

															</div>
														</td>
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" style="background:white;width="100%">
	
															<?php unset($this->_sections['membs']);
$this->_sections['membs']['name'] = 'membs';
$this->_sections['membs']['loop'] = is_array($_loop=$this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['membs']['show'] = true;
$this->_sections['membs']['max'] = $this->_sections['membs']['loop'];
$this->_sections['membs']['step'] = 1;
$this->_sections['membs']['start'] = $this->_sections['membs']['step'] > 0 ? 0 : $this->_sections['membs']['loop']-1;
if ($this->_sections['membs']['show']) {
    $this->_sections['membs']['total'] = $this->_sections['membs']['loop'];
    if ($this->_sections['membs']['total'] == 0)
        $this->_sections['membs']['show'] = false;
} else
    $this->_sections['membs']['total'] = 0;
if ($this->_sections['membs']['show']):

            for ($this->_sections['membs']['index'] = $this->_sections['membs']['start'], $this->_sections['membs']['iteration'] = 1;
                 $this->_sections['membs']['iteration'] <= $this->_sections['membs']['total'];
                 $this->_sections['membs']['index'] += $this->_sections['membs']['step'], $this->_sections['membs']['iteration']++):
$this->_sections['membs']['rownum'] = $this->_sections['membs']['iteration'];
$this->_sections['membs']['index_prev'] = $this->_sections['membs']['index'] - $this->_sections['membs']['step'];
$this->_sections['membs']['index_next'] = $this->_sections['membs']['index'] + $this->_sections['membs']['step'];
$this->_sections['membs']['first']      = ($this->_sections['membs']['iteration'] == 1);
$this->_sections['membs']['last']       = ($this->_sections['membs']['iteration'] == $this->_sections['membs']['total']);
?>
																<?php if ($this->_sections['membs']['index'] % 2 == 0): ?>
																<tr>
																	<td style="padding:2px 0;">
																		<div class="avatar">
																		<?php if ($this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['avatar'] != ""): ?>
																		<img src = "thumb.php?pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['avatar']; ?>
&amp;height=25&amp;width=25" alt="" />
																		<?php else: ?>
																		<img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg&amp;height=25&amp;width=25" alt="" />
																		<?php endif; ?>
																		</div>
																	</td>
																	<td style="width:204px;padding:0 0 0 5px;">
																		<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['name']; ?>

																	</td>
																	<td class="tools" style="width:26px;padding:0;">
										                               <a class="tool_del" href="admin_people_group.php?action=deassign&amp;user=<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['ID']; ?>
&amp;id=<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_admin_people_group_deassign']; ?>
" alt="<?php echo $this->_config[0]['vars']['dico_admin_people_group_deassign']; ?>
"></a>
																	</td>
	
																</tr>
																<?php endif; ?>
															<?php endfor; endif; ?>
		
															</table>
							
														</td>
														
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" style="background:white;width="100%">
	
															<?php unset($this->_sections['membs']);
$this->_sections['membs']['name'] = 'membs';
$this->_sections['membs']['loop'] = is_array($_loop=$this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['membs']['show'] = true;
$this->_sections['membs']['max'] = $this->_sections['membs']['loop'];
$this->_sections['membs']['step'] = 1;
$this->_sections['membs']['start'] = $this->_sections['membs']['step'] > 0 ? 0 : $this->_sections['membs']['loop']-1;
if ($this->_sections['membs']['show']) {
    $this->_sections['membs']['total'] = $this->_sections['membs']['loop'];
    if ($this->_sections['membs']['total'] == 0)
        $this->_sections['membs']['show'] = false;
} else
    $this->_sections['membs']['total'] = 0;
if ($this->_sections['membs']['show']):

            for ($this->_sections['membs']['index'] = $this->_sections['membs']['start'], $this->_sections['membs']['iteration'] = 1;
                 $this->_sections['membs']['iteration'] <= $this->_sections['membs']['total'];
                 $this->_sections['membs']['index'] += $this->_sections['membs']['step'], $this->_sections['membs']['iteration']++):
$this->_sections['membs']['rownum'] = $this->_sections['membs']['iteration'];
$this->_sections['membs']['index_prev'] = $this->_sections['membs']['index'] - $this->_sections['membs']['step'];
$this->_sections['membs']['index_next'] = $this->_sections['membs']['index'] + $this->_sections['membs']['step'];
$this->_sections['membs']['first']      = ($this->_sections['membs']['iteration'] == 1);
$this->_sections['membs']['last']       = ($this->_sections['membs']['iteration'] == $this->_sections['membs']['total']);
?>
																<?php if ($this->_sections['membs']['index'] % 2 == 1): ?>
																<tr>
																	<td style="padding:2px 0;">
																		<div class="avatar">
																		<?php if ($this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['avatar'] != ""): ?>
																		<img src = "thumb.php?pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['avatar']; ?>
&amp;height=25&amp;width=25" alt="" />
																		<?php else: ?>
																		<img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg&amp;height=25&amp;width=25" alt="" />
																		<?php endif; ?>
																		</div>
																	</td>
																	<td style="width:204px;padding:0 0 0 5px;">
																		<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['name']; ?>

																	</td>
																	<td class="tools" style="width:26px;padding:0;">
										                               <a class="tool_del" href="admin_people_group.php?action=deassign&amp;user=<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['members'][$this->_sections['membs']['index']]['ID']; ?>
&amp;id=<?php echo $this->_tpl_vars['ogroups'][$this->_sections['ogroup']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_admin_people_group_deassign']; ?>
" alt="<?php echo $this->_config[0]['vars']['dico_admin_people_group_deassign']; ?>
"></a>
																	</td>
																</tr>
																<?php endif; ?>
															<?php endfor; endif; ?>
		
															</table>
							
														</td>
														
													</tr>
													
												</table>
					
											</li>
											<?php endfor; endif; ?>
											
										</ul>
					
									</div> 								
								</div> 			
								<div class="clear_both"></div> 			
							</div> 		
									        
			        	    <?php if ($this->_tpl_vars['adminstate'] > 4): ?>
							<a href="#" onclick="javascript:$('#form_<?php echo $this->_tpl_vars['myprojects'][$this->_sections['project']['index']]['ID']; ?>
').toggle();" class="butn_link_b"><span><?php echo $this->_config[0]['vars']['dico_admin_people_group_addgroup']; ?>
</span></a><br />
								<div class="clear_both_b"></div>
								<div id = "form_<?php echo $this->_tpl_vars['myprojects'][$this->_sections['project']['index']]['ID']; ?>
" style = "display:none;">
			        			    
			        			    <div class="block_in_wrapper">

										<form class="main" method="post" action="admin_people_group.php?action=add">
	
											<fieldset>
	
												<div class="row"><label for="name"><?php echo $this->_config[0]['vars']['dico_admin_people_group_name']; ?>
:</label><input type="text" name="name" id="name" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_group_name']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
			
												<div class="row"><label for="desc"><?php echo $this->_config[0]['vars']['dico_admin_people_group_desc']; ?>
:</label><textarea name="desc" id="desc" required="0" rows="3" cols="1" ></textarea></div>
	
											    <div class="clear_both_b"></div>
	
												<div class="row">
													<label><?php echo $this->_config[0]['vars']['dico_admin_people_group_members']; ?>
:</label>
													<div style="float:left;">
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
									   	 			    <div class="row">
								       				 		<input type="checkbox" class="checkbox" value="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" name="assignto[]" id="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" <?php if ($this->_tpl_vars['users'][$this->_sections['user']['index']]['ID'] == $this->_tpl_vars['userid']): ?> checked="checked"<?php endif; ?> /><label for="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
</label><br />
										    		  	</div>
												    	<?php endfor; endif; ?>
												    </div>
												</div>
	
												<input type="hidden" name="assignme" value="1" />
	
											    <div class="clear_both_b"></div>
	
												<div class="row">
													<label>&nbsp;</label>
													<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_admin_people_group_button_add']; ?>
</button></div>
													<a href="#" onclick="javascript:$('#form_<?php echo $this->_tpl_vars['myprojects'][$this->_sections['project']['index']]['ID']; ?>
').toggle();" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_admin_people_group_button_cancel']; ?>
</span></a>
												</div>

											</fieldset>

										</form>

									</div> 
			        			    
			        		    </div>
			        	    <?php endif; ?>
					
									
						</div> 			
					</div> 				
				</div>
					
			</div>

		</div>

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
						<?php echo $this->_config[0]['vars']['dico_admin_people_group_confirme_delete_question']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_admin_people_group_button_delete']; ?>
</span></a>
							<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_admin_people_group_button_cancel']; ?>
</span></a>
						</div>

					</fieldset>

			</form>

		</div>
	
	</div>

	
	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
	
		$(\'#confirmbox\').jqm({
		});
	
		/*$("#accordion_projects").accordion({
			header: \'TABLE.resume\',
			selectedClass: \'open\',
			event: \'mouseover\'
		});*/

	    $("form").validate({
			rules: {
				name : { required: true, remote: "php_request/check_group.php" }
   			},
   			messages: {
				name: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '",
 			    	remote: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_group_unique']; ?>
<?php echo '"
 			    	
 				}
			},
			submitHandler: function() {
				form.submit();
			}
		});	
	    
	    $("form").bind("invalid-form.validate", function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_one_field_error']; ?>
<?php echo '\'
					: \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_many_fields_error_1']; ?>
<?php echo '\' + errors + \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_many_fields_error_2']; ?>
<?php echo '\';
					$("div.error span").html(message);
					$("div.error").show();
					$("div.infowin_left").show();
					systemeMessage(\'systemmsg\');
				}
		});
		
		
	});
	</script>
	'; ?>

	
	