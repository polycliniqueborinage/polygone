<?php /* Smarty version 2.6.19, created on 2012-09-18 13:08:50
         compiled from template_admin_people_user_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_admin_people_user_view.tpl', 218, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'no','js_ajax' => 'no','js_user' => 'yes','js_jqmodal' => 'no','password_strength' => 'no','js_jquery_validate' => 'no')));
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
						
					<span><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_view']; ?>
</span> 

	  				<a href="./admin_people_user.php?action=list"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_list']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<input type = "hidden" name = "selectedid" id  = "selectedid"/>

					<div class="infowin_left" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'deleted'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_user_wasdeleted']; ?>
</span>
						<?php elseif ($this->_tpl_vars['mode'] == 'added'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_user_wasadded']; ?>
</span>
						<?php elseif ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_user_wasedited']; ?>
</span>
				        <?php elseif ($this->_tpl_vars['mode'] == "de-assigned"): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_user_permissionswereedited']; ?>
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
	
					<div class="block_a" >
						
						<div class="in">
						
							<div class="headline">
								<h2><a href="javascript:void(0);" id="userhead_toggle" class="win_block" onclick = "toggleBlock('userhead');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_admin_people_user_administration']; ?>
</span></a>
								</h2>
							</div>
							
							<a href="#" onclick="javascript:$('#adduser').toggle();" class="butn_link_b"><span><?php echo $this->_config[0]['vars']['dico_admin_people_user_adduser']; ?>
</span></a><br />
							<div class="paging_wrapper" id="paging">
								<a href="./admin_people_user.php?action=view&letter=A">A</a>
								<a href="./admin_people_user.php?action=view&letter=B">B</a>
								<a href="./admin_people_user.php?action=view&letter=C">C</a>
								<a href="./admin_people_user.php?action=view&letter=D">D</a>
								<a href="./admin_people_user.php?action=view&letter=E">E</a>
								<a href="./admin_people_user.php?action=view&letter=F">F</a>
								<a href="./admin_people_user.php?action=view&letter=G">G</a>
								<a href="./admin_people_user.php?action=view&letter=H">H</a>
								<a href="./admin_people_user.php?action=view&letter=I">I</a>
								<a href="./admin_people_user.php?action=view&letter=J">J</a>
								<a href="./admin_people_user.php?action=view&letter=K">K</a>
								<a href="./admin_people_user.php?action=view&letter=L">L</a>
								<a href="./admin_people_user.php?action=view&letter=M">M</a>
								<a href="./admin_people_user.php?action=view&letter=N">N</a>
								<a href="./admin_people_user.php?action=view&letter=O">O</a>
								<a href="./admin_people_user.php?action=view&letter=P">P</a>
								<a href="./admin_people_user.php?action=view&letter=Q">Q</a>
								<a href="./admin_people_user.php?action=view&letter=R">R</a>
								<a href="./admin_people_user.php?action=view&letter=S">S</a>
								<a href="./admin_people_user.php?action=view&letter=T">T</a>
								<a href="./admin_people_user.php?action=view&letter=U">U</a>
								<a href="./admin_people_user.php?action=view&letter=V">V</a>
								<a href="./admin_people_user.php?action=view&letter=W">W</a>
								<a href="./admin_people_user.php?action=view&letter=X">X</a>
								<a href="./admin_people_user.php?action=view&letter=Y">Y</a>
								<a href="./admin_people_user.php?action=view&letter=Z">Z</a>
							</div>
							<div class="clear_both_b"></div> 
							
							<div id = "adduser" style = "display:none;">

								<div class="block_in_wrapper">

									<form id="adduserform" class="main" method="post" action="admin_people_user.php?action=add">
									
										<fieldset>
									
											<div class="clear_both"></div>
						                        <h2><?php echo $this->_config[0]['vars']['dico_user_profil_changepassword']; ?>
</h2>
					                        <br/>
			
											<div class="row"><label for="name"><?php echo $this->_config[0]['vars']['dico_admin_people_user_name']; ?>
<span class="mandatory">*</span>:</label><input type="text" name="name" id="name" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_name']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="row"><label for="pass"><?php echo $this->_config[0]['vars']['dico_admin_people_user_password']; ?>
<span class="mandatory">*</span>:</label><input type="text" name="pass" class="password_test" id="pass" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_password']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="row"><label for="familyname"><?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
<span class="mandatory">*</span>:</label><input type="text" name="familyname" id="familyname" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="row"><label for="firstname"><?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
<span class="mandatory">*</span>:</label><input type="text" name="firstname" id="firstname" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
	
											<div class="clear_both_b"></div>
	
											<div class="row">
											
												<label><?php echo $this->_config[0]['vars']['dico_admin_people_user_groups']; ?>
:</label>	
	
												<div style="float:left;">
													<?php unset($this->_sections['group']);
$this->_sections['group']['name'] = 'group';
$this->_sections['group']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['group']['show'] = true;
$this->_sections['group']['max'] = $this->_sections['group']['loop'];
$this->_sections['group']['step'] = 1;
$this->_sections['group']['start'] = $this->_sections['group']['step'] > 0 ? 0 : $this->_sections['group']['loop']-1;
if ($this->_sections['group']['show']) {
    $this->_sections['group']['total'] = $this->_sections['group']['loop'];
    if ($this->_sections['group']['total'] == 0)
        $this->_sections['group']['show'] = false;
} else
    $this->_sections['group']['total'] = 0;
if ($this->_sections['group']['show']):

            for ($this->_sections['group']['index'] = $this->_sections['group']['start'], $this->_sections['group']['iteration'] = 1;
                 $this->_sections['group']['iteration'] <= $this->_sections['group']['total'];
                 $this->_sections['group']['index'] += $this->_sections['group']['step'], $this->_sections['group']['iteration']++):
$this->_sections['group']['rownum'] = $this->_sections['group']['iteration'];
$this->_sections['group']['index_prev'] = $this->_sections['group']['index'] - $this->_sections['group']['step'];
$this->_sections['group']['index_next'] = $this->_sections['group']['index'] + $this->_sections['group']['step'];
$this->_sections['group']['first']      = ($this->_sections['group']['iteration'] == 1);
$this->_sections['group']['last']       = ($this->_sections['group']['iteration'] == $this->_sections['group']['total']);
?>
													<div class="row">
			    									    <input type="checkbox" class="checkbox" value="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" name="assignto[]" id="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" required="0" /><label for="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" style="width:210px;"><?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['name']; ?>
</label>
			    								    </div>
												    <?php endfor; endif; ?>
												</div>
											
											</div>
	
										    <div class="clear_both_b"></div>

											<div class="row"><label><?php echo $this->_config[0]['vars']['dico_admin_people_user_permissions']; ?>
:</label>
											<div class = "row"><label></label><input type="radio" class="checkbox" value="0" name="isadmin" checked /><label for="isadmin1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_no_login']; ?>
</label></div>
											<div class = "row"><label></label><input type="radio" class="checkbox" value="1" name="isadmin"  /><label for="isadmin1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_user']; ?>
</label></div>
											<div class = "row"><label></label><input type="radio" class="checkbox" value="3" name="isadmin"  /><label for="isadmin2"><?php echo $this->_config[0]['vars']['dico_admin_people_user_manager']; ?>
</label></div>
											<div class = "row"><label></label><input type="radio" class="checkbox" value="4" name="isadmin"  /><label for="isadmin2"><?php echo $this->_config[0]['vars']['dico_admin_people_user_manager_advanced']; ?>
</label></div>
											<div class = "row"><label></label><input type="radio" class="checkbox" value="5" name="isadmin"  /><label for="isadmin3"><?php echo $this->_config[0]['vars']['dico_admin_people_user_admin']; ?>
</label></div>
										
										</div>
	
									    <div class="clear_both_b"></div>

										<div class="row">
											<label>&nbsp;</label>
											<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_admin_people_user_addbutton']; ?>
</button></div>
											<a href="#" onclick = "javascript:$('#adduser').toggle();" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_admin_people_user_cancel']; ?>
</span></a>
										</div>

									</fieldset>
								</form>

								</div> 						
							</div>
										
							<div id = "userhead">
			
							<div class="table_head">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="a" style="width:5%;"></td>
										<td class="a" style="width:3%;"></td>
										<td class="a" style="width:3%;"></td>
										<td class="b" style="width:20%"><?php echo $this->_config[0]['vars']['dico_admin_people_user_name']; ?>
</td>
										<td class="c" style="width:20%"><?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
</td>
										<td class="d" style="width:20%"><?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
</td>
										<td class="e" style="width:20%"><?php echo $this->_config[0]['vars']['dico_admin_people_user_lastlogin']; ?>
</td>
									</tr>
								</table>
							</div>
			
							<div class="table_body">
								<div id = "accordion_users" >
									<ul>
									
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
					
																				<?php if ($this->_sections['user']['index'] % 2 == 0): ?>
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
													<td class="tools" style="width:6%;">
														<a class="tool_view" href="admin_people_user.php?action=detail&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_admin_people_user_detail']; ?>
"></a>
														<a class="tool_edit" href="admin_people_user.php?action=edit&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" title="<?php echo $this->_config[0]['vars']['dico_admin_people_user_edit']; ?>
"></a>
													</td>
													<td class="tools" style="width:3%;">
													<?php if ($this->_tpl_vars['users'][$this->_sections['user']['index']]['ID'] != $this->_tpl_vars['userid']): ?>
														<a class="tool_del" href="#" onclick="deleteConfirmBox(<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
)" title="<?php echo $this->_config[0]['vars']['dico_admin_people_user_delete']; ?>
"></a>
													<?php endif; ?>
													</td>
													<td class="b" style="width:20%"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
</td>
													<td class="c" style="width:20%"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['familyname']; ?>
</td>
													<td class="d" style="width:20%"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['firstname']; ?>
</td>
													<td class="e" style="width:20%"><?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['lastlogin']; ?>
</td>
												</tr>
											</table>
											
											<div class="accordion_content">
												<table class="description" cellpadding="0" cellspacing="0"  width="100%">
													<tr valign="top">
														<td class="a" style="width:5%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="b" style="width:30%;">
															<?php if ($this->_tpl_vars['users'][$this->_sections['user']['index']]['avatar'] != ""): ?>
															<a class="avatar" href="manageuser.php?action=profile&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
"><img src="thumb.php?pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['avatar']; ?>
" alt="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
" /></a>
															<?php else: ?>
															<a class="avatar" href="manageuser.php?action=profile&amp;id=<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
"><img src="thumb.php?pic=templates/standard/img/no_avatar.jpg" alt="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['name']; ?>
" /></a>
															<?php endif; ?>
														</td>
														<td class="c">
														<h2><?php echo $this->_config[0]['vars']['projects']; ?>
</h2>
								
															<form class="main" method="post" action="admin_people_user.php?action=massassign">
															<fieldset>

																<?php unset($this->_sections['proj']);
$this->_sections['proj']['name'] = 'proj';
$this->_sections['proj']['loop'] = is_array($_loop=$this->_tpl_vars['users'][$this->_sections['user']['index']]['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['proj']['show'] = true;
$this->_sections['proj']['max'] = $this->_sections['proj']['loop'];
$this->_sections['proj']['step'] = 1;
$this->_sections['proj']['start'] = $this->_sections['proj']['step'] > 0 ? 0 : $this->_sections['proj']['loop']-1;
if ($this->_sections['proj']['show']) {
    $this->_sections['proj']['total'] = $this->_sections['proj']['loop'];
    if ($this->_sections['proj']['total'] == 0)
        $this->_sections['proj']['show'] = false;
} else
    $this->_sections['proj']['total'] = 0;
if ($this->_sections['proj']['show']):

            for ($this->_sections['proj']['index'] = $this->_sections['proj']['start'], $this->_sections['proj']['iteration'] = 1;
                 $this->_sections['proj']['iteration'] <= $this->_sections['proj']['total'];
                 $this->_sections['proj']['index'] += $this->_sections['proj']['step'], $this->_sections['proj']['iteration']++):
$this->_sections['proj']['rownum'] = $this->_sections['proj']['iteration'];
$this->_sections['proj']['index_prev'] = $this->_sections['proj']['index'] - $this->_sections['proj']['step'];
$this->_sections['proj']['index_next'] = $this->_sections['proj']['index'] + $this->_sections['proj']['step'];
$this->_sections['proj']['first']      = ($this->_sections['proj']['iteration'] == 1);
$this->_sections['proj']['last']       = ($this->_sections['proj']['iteration'] == $this->_sections['proj']['total']);
?>

																<div class="row"><input type="checkbox" class="checkbox" value="<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['groups'][$this->_sections['proj']['index']]['ID']; ?>
" id="groups<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
-<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['groups'][$this->_sections['proj']['index']]['ID']; ?>
" name="groups[]" <?php if ($this->_tpl_vars['users'][$this->_sections['user']['index']]['groups'][$this->_sections['proj']['index']]['assigned'] == 1): ?>checked="checked"<?php endif; ?> />
																	<label style="width:270px;" for="groups<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
-<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['groups'][$this->_sections['proj']['index']]['ID']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_sections['user']['index']]['groups'][$this->_sections['proj']['index']]['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...", true) : smarty_modifier_truncate($_tmp, 40, "...", true)); ?>
</label></div>
																	<?php endfor; endif; ?>
																	<input type = "hidden" name = "id" value = "<?php echo $this->_tpl_vars['users'][$this->_sections['user']['index']]['ID']; ?>
" />
																	<div class="row">
																	<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_general_send']; ?>
</button></div>
																</div>
								
															</fieldset>
															</form>
								
														</td>
													</tr>
												</table>
											</div> 					
										</li>
										<?php endfor; endif; ?>
									</ul>
									
								</div> 
							</div> 			
							<div class="clear_both"></div> 			
						</div>			
						</div> 					</div> 
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
						<?php echo $this->_config[0]['vars']['dico_admin_people_user_confirme_delete_question']; ?>

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
	
	</div>

	<?php echo '
	<script type="text/javascript">
	
	$(document).ready(function() {

		$(".password_test").passStrength({
			userid:	"#name"
		});
	
		$(\'#confirmbox\').jqm({
		});
	
		/*$("#accordion_users").accordion({
			header: \'\',
			selectedClass: \'open\',
			event: \'mouseover\'
		});*/
		
		// VALIDATION
		//jQuery.validator.addMethod("password", function( value, element ) {
		//	var result = this.optional(element) || /\\d/.test(value) && /[a-z]/i.test(value);
		//	return result;
		//}, "");
		
		jQuery.validator.addMethod("password", function( password, element ) {
		
			var score = 0; 
	 		
	 		//password length
		 	score += password.length * 4;
		 	score += ( $.fn.checkRepetition(1,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(2,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(3,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(4,password).length - password.length ) * 1;
		 	
		 	//password has 3 numbers
		 	if (password.match(/(.*[0-9].*[0-9].*[0-9])/)){ score += 5;} 
		 			    
		 	//password has 2 symbols
		 	if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)){ score += 5 ;}
		 			    
		 	//password has Upper and Lower chars
		 	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){  score += 10;} 
		 			    
		 	//password has number and chars
		 	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){  score += 15;} 
		 			    //
		 	//password has number and symbol
		 	if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/)){  score += 15;} 
		 			    
		 	//password has char and symbol
		 	if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/)){score += 15;}
		 			    
		 	//password is just a numbers or chars
		 	if (password.match(/^\\w+$/) || password.match(/^\\d+$/) ){ score -= 10;}
	
			if ( score < 0 ){score = 0;}
		 	if ( score > 100 ){  score = 100;} 
		 			    
			if (score > 68 ){ return true; }
			else { return false; }
			
		}, "");
					
	    $("#adduserform").validate({
			rules: {
				name : { required: true, remote: "php_request/check_user.php" },
				pass : { required: true, minlength:6, password: true },
				familyname : { required: true },
				firstname : { required: true }
   			},
   			messages: {
				name: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '",
 			    	remote: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_user_unique']; ?>
<?php echo '"
 				},
				pass: {
 			    	minlength: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_minlength']; ?>
<?php echo '",
 			    	password: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_password']; ?>
<?php echo '",
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				familyname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				firstname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				}
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
					systemeMessage(\'systemmsg\',3000);
				}
		});
		
		
	});
	</script>
	'; ?>

	
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('user_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
