<?php /* Smarty version 2.6.19, created on 2013-04-12 17:28:28
         compiled from template_admin_people_user_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_user' => 'yes','js_form' => 'yes','password_strength' => 'yes','js_jquery_validate' => 'yes')));
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
						
	  				<a href="./admin_people_user.php?action=view"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_view']; ?>
</a>
	  				<a href="./admin_people_user.php?action=list"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_list']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_edit']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id="systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_people_user_error1']; ?>
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
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<span><?php echo $this->_tpl_vars['user']['name']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="admin_people_user.php?action=submit&amp;id=<?php echo $this->_tpl_vars['user']['ID']; ?>
" enctype="multipart/form-data" <?php echo 'onsubmit="return validateCompleteForm(this,\'input_error\');"'; ?>
>
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "<?php echo $this->_tpl_vars['user']['ID']; ?>
" name = "id" id="id" />

											<div class="row"><label for="name"><?php echo $this->_config[0]['vars']['dico_admin_people_user_login']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['name']; ?>
" name = "name" id="name" class="<?php echo $this->_tpl_vars['errors']['name']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_name']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="familyname"><?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['familyname']; ?>
" name = "familyname" id="familyname" class="<?php echo $this->_tpl_vars['errors']['familyname']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="firstname"><?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['firstname']; ?>
" name = "firstname" id="firstname" class="<?php echo $this->_tpl_vars['errors']['firstname']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="birthday"><?php echo $this->_config[0]['vars']['dico_admin_people_user_birthday']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['birthday']; ?>
" name = "birthday" id="birthday" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_birthday']; ?>
" onfocus="javascript:this.select()" onkeyup="javascript:birthdayvalue = checkDate(this, '', '');" autocomplete="off" /></div>

											<div class="row"><label for = "avatar"><?php echo $this->_config[0]['vars']['dico_admin_people_user_avatar']; ?>
:</label><input type = "file" class="file" name = "userfile" id="avatar" size="20" /></div>
											
											<div class = "row">
												<label for = "gender"><?php echo $this->_config[0]['vars']['dico_admin_people_user_gender']; ?>
<span class="mandatory">*</span>:</label>
												<select name = "gender" id = "gender" realname = "<?php echo $this->_config[0]['vars']['dico_admin_people_user_gender']; ?>
" class="<?php echo $this->_tpl_vars['errors']['gender']; ?>
" />
												<?php if ($this->_tpl_vars['user']['gender'] == ""): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['user']['gender'] == 'm'): ?>selected="selected"<?php endif; ?> value = "m"><?php echo $this->_config[0]['vars']['dico_admin_people_user_male']; ?>
</option>
												<option <?php if ($this->_tpl_vars['user']['gender'] == 'f'): ?>selected="selected"<?php endif; ?> value = "f"><?php echo $this->_config[0]['vars']['dico_admin_people_user_female']; ?>
</option>
												</select>
											</div>

											<div class="row">
												<label for = "locale"><?php echo $this->_config[0]['vars']['dico_admin_people_user_locale']; ?>
:</label>
												<select name = "locale" id="locale">
													<option value = "" <?php if ($this->_tpl_vars['user']['locale'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
</option>
												<?php unset($this->_sections['lang']);
$this->_sections['lang']['name'] = 'lang';
$this->_sections['lang']['loop'] = is_array($_loop=$this->_tpl_vars['languages_fin']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang']['show'] = true;
$this->_sections['lang']['max'] = $this->_sections['lang']['loop'];
$this->_sections['lang']['step'] = 1;
$this->_sections['lang']['start'] = $this->_sections['lang']['step'] > 0 ? 0 : $this->_sections['lang']['loop']-1;
if ($this->_sections['lang']['show']) {
    $this->_sections['lang']['total'] = $this->_sections['lang']['loop'];
    if ($this->_sections['lang']['total'] == 0)
        $this->_sections['lang']['show'] = false;
} else
    $this->_sections['lang']['total'] = 0;
if ($this->_sections['lang']['show']):

            for ($this->_sections['lang']['index'] = $this->_sections['lang']['start'], $this->_sections['lang']['iteration'] = 1;
                 $this->_sections['lang']['iteration'] <= $this->_sections['lang']['total'];
                 $this->_sections['lang']['index'] += $this->_sections['lang']['step'], $this->_sections['lang']['iteration']++):
$this->_sections['lang']['rownum'] = $this->_sections['lang']['iteration'];
$this->_sections['lang']['index_prev'] = $this->_sections['lang']['index'] - $this->_sections['lang']['step'];
$this->_sections['lang']['index_next'] = $this->_sections['lang']['index'] + $this->_sections['lang']['step'];
$this->_sections['lang']['first']      = ($this->_sections['lang']['iteration'] == 1);
$this->_sections['lang']['last']       = ($this->_sections['lang']['iteration'] == $this->_sections['lang']['total']);
?>
													<option value = "<?php echo $this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['val']; ?>
" <?php if ($this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['val'] == $this->_tpl_vars['user']['locale']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['str']; ?>
</option>
												<?php endfor; endif; ?>
												</select>
											</div>
											
											<div class="row"><label for = "adress1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_address1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['address1']; ?>
" name = "address1" id="address1" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_address1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_zip1city1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['zip1']; ?>
 <?php echo $this->_tpl_vars['user']['city1']; ?>
" name = "zip1city1" id="zip1city1" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_zip1city1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_state1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['state1']; ?>
" name = "state1" id="state1" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_state1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_country1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['country1']; ?>
" name = "country1" id="country1" required="1" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_country1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "company"><?php echo $this->_config[0]['vars']['dico_admin_people_user_company']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['company']; ?>
" name = "company" id="company" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_company']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone"><?php echo $this->_config[0]['vars']['dico_admin_people_user_workphone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['workphone']; ?>
" name = "workphone" id="workphone" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_workphone']; ?>
" onfocus="javascript:this.select()" autocomplete="off" /></div>

											<div class="row"><label for = "privatephone"><?php echo $this->_config[0]['vars']['dico_admin_people_user_privatephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['privatephone']; ?>
" name = "privatephone" id="privatephone" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_privatephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off" /></div>

											<div class="row"><label for = "mobilephone"><?php echo $this->_config[0]['vars']['dico_admin_people_user_mobilephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['mobilephone']; ?>
" name = "mobilephone" id="mobilephone" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_mobilephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax"><?php echo $this->_config[0]['vars']['dico_admin_people_user_fax']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['fax']; ?>
" name = "fax" id="fax" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_fax']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email"><?php echo $this->_config[0]['vars']['dico_admin_people_user_email']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['email']; ?>
" name = "email" id="email" class="<?php echo $this->_tpl_vars['errors']['email']; ?>
" realname ="<?php echo $this->_config[0]['vars']['dico_admin_people_user_email']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class = "row"><label for = "web"><?php echo $this->_config[0]['vars']['dico_admin_people_user_web']; ?>
:</label><input type = "text" name = "web" id = "web" realname = "<?php echo $this->_config[0]['vars']['dico_admin_people_user_web']; ?>
" value = "<?php echo $this->_tpl_vars['user']['web']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row">
												<label for="length_consult"><?php echo $this->_config[0]['vars']['dico_admin_people_user_length_consult']; ?>
:</label>
												<select name = "length_consult" id="length_consult">
													<option value = "" <?php if ($this->_tpl_vars['user']['length_consult'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '25'): ?>selected="selected"<?php endif; ?> value="25">25 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['length_consult'] == '30'): ?>selected="selected"<?php endif; ?> value="30">30 <?php echo $this->_config[0]['vars']['dico_admin_people_user_minutes']; ?>
</option>
												</select>
											</div>
											
											<div class="row">
												<label for="type"><?php echo $this->_config[0]['vars']['dico_admin_people_user_type']; ?>
<span class="mandatory">*</span>:</label>
												<select name = "type" id="type" <?php echo 'onchange="javascript:changeType(this.value);"'; ?>
  class="<?php echo $this->_tpl_vars['errors']['type']; ?>
">
													<option value = "" <?php if ($this->_tpl_vars['user']['type'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'employee'): ?>selected="selected"<?php endif; ?> value = "employee"><?php echo $this->_config[0]['vars']['dico_admin_people_user_employee']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'specialist'): ?>selected="selected"<?php endif; ?> value = "specialiste"><?php echo $this->_config[0]['vars']['dico_admin_people_user_specialist']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'doctor_with_rate'): ?>selected="selected"<?php endif; ?> value = "doctor_with_rate"><?php echo $this->_config[0]['vars']['dico_admin_people_user_doctor_with_rate']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'doctor_without_rate'): ?>selected="selected"<?php endif; ?> value = "doctor_without_rate"><?php echo $this->_config[0]['vars']['dico_admin_people_user_doctor_without_rate']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'paramedical'): ?>selected="selected"<?php endif; ?> value = "paramedical"><?php echo $this->_config[0]['vars']['dico_admin_people_user_paramedical']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['type'] == 'other'): ?>selected="selected"<?php endif; ?> value = "other"><?php echo $this->_config[0]['vars']['dico_admin_people_user_other']; ?>
</option>
												</select>
											</div>
											
											<div class="row">
												<label for="length_consult"><?php echo $this->_config[0]['vars']['dico_admin_people_user_permissions']; ?>
:</label>
												<select name = "admin" id="admin">
													<option <?php if ($this->_tpl_vars['user']['admin'] == '0'): ?>selected="selected"<?php endif; ?> value="0"><?php echo $this->_config[0]['vars']['dico_admin_people_user_no_login']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['admin'] == '1'): ?>selected="selected"<?php endif; ?> value="1"><?php echo $this->_config[0]['vars']['dico_admin_people_user_user']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['admin'] == '3'): ?>selected="selected"<?php endif; ?> value="3"><?php echo $this->_config[0]['vars']['dico_admin_people_user_manager']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['admin'] == '4'): ?>selected="selected"<?php endif; ?> value="4"><?php echo $this->_config[0]['vars']['dico_admin_people_user_manager_advanced']; ?>
</option>
													<option <?php if ($this->_tpl_vars['user']['admin'] == '5'): ?>selected="selected"<?php endif; ?> value="5"><?php echo $this->_config[0]['vars']['dico_admin_people_user_admin']; ?>
</option>
												</select>
											</div>	
																					
											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_medical']; ?>
</h2>
											<br/>

											<div class="row"><label for = "speciality"><?php echo $this->_config[0]['vars']['dico_admin_people_user_specialite']; ?>
:</label>
												<select name = "speciality" id = "speciality" realname = "<?php echo $this->_config[0]['vars']['dico_admin_people_user_specialite']; ?>
">
													<?php if ($this->_tpl_vars['user']['speciality'] == ""): ?>
														<option value = "" selected><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
</option>
													<?php endif; ?>
													<?php unset($this->_sections['speciality']);
$this->_sections['speciality']['name'] = 'speciality';
$this->_sections['speciality']['loop'] = is_array($_loop=$this->_tpl_vars['specialities']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['speciality']['show'] = true;
$this->_sections['speciality']['max'] = $this->_sections['speciality']['loop'];
$this->_sections['speciality']['step'] = 1;
$this->_sections['speciality']['start'] = $this->_sections['speciality']['step'] > 0 ? 0 : $this->_sections['speciality']['loop']-1;
if ($this->_sections['speciality']['show']) {
    $this->_sections['speciality']['total'] = $this->_sections['speciality']['loop'];
    if ($this->_sections['speciality']['total'] == 0)
        $this->_sections['speciality']['show'] = false;
} else
    $this->_sections['speciality']['total'] = 0;
if ($this->_sections['speciality']['show']):

            for ($this->_sections['speciality']['index'] = $this->_sections['speciality']['start'], $this->_sections['speciality']['iteration'] = 1;
                 $this->_sections['speciality']['iteration'] <= $this->_sections['speciality']['total'];
                 $this->_sections['speciality']['index'] += $this->_sections['speciality']['step'], $this->_sections['speciality']['iteration']++):
$this->_sections['speciality']['rownum'] = $this->_sections['speciality']['iteration'];
$this->_sections['speciality']['index_prev'] = $this->_sections['speciality']['index'] - $this->_sections['speciality']['step'];
$this->_sections['speciality']['index_next'] = $this->_sections['speciality']['index'] + $this->_sections['speciality']['step'];
$this->_sections['speciality']['first']      = ($this->_sections['speciality']['iteration'] == 1);
$this->_sections['speciality']['last']       = ($this->_sections['speciality']['iteration'] == $this->_sections['speciality']['total']);
?>
														<option <?php if ($this->_tpl_vars['user']['speciality'] == "\"{".($this->_tpl_vars['specialities'][$this->_sections['speciality']['index']]).".ID"): ?>"}selected="selected"<?php endif; ?> value = "<?php echo $this->_tpl_vars['specialities'][$this->_sections['speciality']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['specialities'][$this->_sections['speciality']['index']]['VALUE']; ?>
</option>
													<?php endfor; endif; ?>
												</select>
											</div>
											
											<div class="row"><label for="inami"><?php echo $this->_config[0]['vars']['dico_admin_people_user_inami']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['inami']; ?>
" name = "inami" id="inami" maxlength="11"  class="<?php echo $this->_tpl_vars['errors']['inami']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_inami']; ?>
" onKeyUp='javascript:valueinami = checkNumber(this, valueinami, 11, false);' autocomplete='off' onfocus="javascript:this.select()"/></div>
											
											<div class="row"><label for="taux_acte"><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_acte']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['taux_acte']; ?>
" name = "taux_acte" id="taux_acte"  realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_acte']; ?>
" onKeyUp="javascript:valueacte = checkPourcent(this, valueacte, 2, 2);" autocomplete='off' onfocus="javascript:this.select()"/></div>
											
											<div class="row"><label for="taux_consultation"><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_consultation']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['taux_consultation']; ?>
" name = "taux_consultation" id="taux_consultation" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_consultation']; ?>
" onKeyUp="javascript:valueconsultation = checkPourcent(this, valueconsultation, 2, 2);" autocomplete='off' onfocus="javascript:this.select()"/></div>
											
											<div class="row"><label for="taux_prothese"><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_prothese']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['taux_prothese']; ?>
" name = "taux_prothese" id="taux_prothese" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_prothese']; ?>
" onKeyUp="javascript:valueprothese = checkPourcent(this, valueprothese, 2, 2);" autocomplete="off" onfocus="javascript:this.select()"/></div>

											<div class="row"><label for="code_analytique"><?php echo $this->_config[0]['vars']['dico_admin_people_user_code_analytique']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['code_analytique']; ?>
" name = "code_analytique" id="code_analytique" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_code_analytique']; ?>
" onKeyUp="javascript:valuecodeanalytique = checkNumber(this, valuecodeanalytique, 20, false);" autocomplete="off" onfocus="javascript:this.select()"/></div>

											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_timesheet']; ?>
</h2>
											<br/>

											<div class="row"><label for="hourly_cost"><?php echo $this->_config[0]['vars']['dico_admin_people_user_hourly_cost']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['hourly_cost']; ?>
" name = "hourly_cost" id="hourly_cost" maxlength="11"  class="<?php echo $this->_tpl_vars['errors']['hourly_cost']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_admin_people_user_hourly_cost']; ?>
" onKeyUp='javascript:valuehourly_cost = checkNumber(this, valueinami, 11, false);' autocomplete='off' onfocus="javascript:this.select()"/></div>

											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_changepassword']; ?>
</h2>
											<br/>
			
					                        <div class="row"><label for = "newpass">&nbsp</label></div>
					                        
					                        <div class="row"><label for = "newpass"><?php echo $this->_config[0]['vars']['dico_admin_people_user_newpass']; ?>
:</label><input type = "text" name = "newpass" class="password_test" id = "newpass" /></div>
					                        
											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_assign']; ?>
</h2>
											<br/>
			
					                        <div class="row"><label for = "newpass">&nbsp</label></div>
					                        
					                        <div class="row"><label for = "wsr_id"><?php echo $this->_config[0]['vars']['navigation_admin_workschedule']; ?>
:</label>
					                        	<select name = "wsr_id" id = "wsr_id">
					                        
					                        	<option value="0"></option>
					                        
					                        	<?php unset($this->_sections['wsr']);
$this->_sections['wsr']['name'] = 'wsr';
$this->_sections['wsr']['loop'] = is_array($_loop=$this->_tpl_vars['wsr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['wsr']['show'] = true;
$this->_sections['wsr']['max'] = $this->_sections['wsr']['loop'];
$this->_sections['wsr']['step'] = 1;
$this->_sections['wsr']['start'] = $this->_sections['wsr']['step'] > 0 ? 0 : $this->_sections['wsr']['loop']-1;
if ($this->_sections['wsr']['show']) {
    $this->_sections['wsr']['total'] = $this->_sections['wsr']['loop'];
    if ($this->_sections['wsr']['total'] == 0)
        $this->_sections['wsr']['show'] = false;
} else
    $this->_sections['wsr']['total'] = 0;
if ($this->_sections['wsr']['show']):

            for ($this->_sections['wsr']['index'] = $this->_sections['wsr']['start'], $this->_sections['wsr']['iteration'] = 1;
                 $this->_sections['wsr']['iteration'] <= $this->_sections['wsr']['total'];
                 $this->_sections['wsr']['index'] += $this->_sections['wsr']['step'], $this->_sections['wsr']['iteration']++):
$this->_sections['wsr']['rownum'] = $this->_sections['wsr']['iteration'];
$this->_sections['wsr']['index_prev'] = $this->_sections['wsr']['index'] - $this->_sections['wsr']['step'];
$this->_sections['wsr']['index_next'] = $this->_sections['wsr']['index'] + $this->_sections['wsr']['step'];
$this->_sections['wsr']['first']      = ($this->_sections['wsr']['iteration'] == 1);
$this->_sections['wsr']['last']       = ($this->_sections['wsr']['iteration'] == $this->_sections['wsr']['total']);
?>
					                        
					                        		<?php if ($this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['id'] == $this->_tpl_vars['user']['wsr_id']): ?>
					                        			<option value="<?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['id']; ?>
" SELECTED><?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['id']; ?>
 - <?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['description']; ?>
</option>
					                        		<?php else: ?>
					                        			<option value="<?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['id']; ?>
 - <?php echo $this->_tpl_vars['wsr'][$this->_sections['wsr']['index']]['description']; ?>
</option>
					                        		<?php endif; ?>
					                        
					                        	<?php endfor; endif; ?>
					                        	
					                        	</select>
					                        </div>
					                        
					                        <div class="row"><label for = "refdate"><?php echo $this->_config[0]['vars']['dico_management_wsr_refdate']; ?>
:</label><input type = "text" name = "wsr_refdate" id = "wsr_refdate" value="<?php echo $this->_tpl_vars['user']['wsr_refdate']; ?>
" onkeyup="javascript:wsr_refdatevalue = checkDate(this, '', '');" /></div>
					                        

											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_admin_people_user_send']; ?>
</button></div>
											</div>
										</div>
			
										<div style="float:left;" >
											<?php if ($this->_tpl_vars['user']['avatar'] != ""): ?>
											<div class="avatar"><img src = "thumb.php?pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" /></div>
											<?php else: ?>
											<div class="avatar"><img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
											<?php endif; ?>
										</div>
			
									</fieldset>
								</form>
			
								<div class="clear_both"></div> 								</div> 			
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

	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
	
		$(".password_test").passStrength({
			userid:	"#name"
		});

		user = $("#id").val();

		//AUTOCOMPLETE
		$("#zip1city1").autocomplete("php_request/localite_search.php", {
			minChars: 1,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#country1").autocomplete("php_request/country_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#state1").autocomplete("php_request/state_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
				
		// VALIDATION
		//jQuery.validator.addMethod("password", function( value, element ) {
		//	var result = this.optional(element) || /\\d/.test(value) && /[a-z]/i.test(value);
		//	return result;
		//}, "");
		
		jQuery.validator.addMethod("password", function( password, element ) {
		
			if (password=="") return true;
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
		 			    		
		$("#form").validate({
			rules: {
				name : { required: function(element){return ($("#admin").val() != \'0\');}, remote: "php_request/check_user.php?id="+user},
			    firstname: "required",
			    familyname: "required",
	    		birthday : { date: true},
				gender :  "required",
	    		email: { email: true },
	    		web: { url: true },
	    		newpass  : { minlength:6, password: true },
	    		type :  "required",
	    		inami  : { minlength:11, maxlength:11, required: function(element){return ($("#type").val() == \'specialiste\');} }
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
				firstname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				familyname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				gender: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				birthday: {
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_date']; ?>
<?php echo '",
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				email: {
    				email: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_email']; ?>
<?php echo '"
 				},
				web: {
    				url: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_web']; ?>
<?php echo '"
 				},
				type: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				inami: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '",
 			    	minlength: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_inami']; ?>
<?php echo '",
 			    	maxlength: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_inami']; ?>
<?php echo '"
 				},
				newpass: {
 			    	minlength: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_minlength']; ?>
<?php echo '",
 			    	password: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_password']; ?>
<?php echo '"
 				},
 				wsr_refdate: {
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_date']; ?>
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
