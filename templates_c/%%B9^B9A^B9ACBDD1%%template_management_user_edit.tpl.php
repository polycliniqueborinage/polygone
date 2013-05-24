<?php /* Smarty version 2.6.19, created on 2012-09-17 17:31:38
         compiled from template_management_user_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_user' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes')));
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
						
	  				<a href="./management_user.php"><?php echo $this->_config[0]['vars']['dico_management_user_menu_search']; ?>
</a>

					<?php if ($this->_tpl_vars['user']['ID'] != ""): ?>
	  				<a href="./management_user.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_user_menu_add']; ?>
</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['user']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_user_menu_add']; ?>
</span> 
					<?php endif; ?>

	  				<a href="./management_user.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_user_menu_list']; ?>
</a>

					<?php if ($this->_tpl_vars['user']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_user_menu_edit']; ?>
</span> 
					<?php endif; ?>


				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id="systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_user_error1']; ?>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<?php if ($this->_tpl_vars['user']['ID'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_user_submenu_edit']; ?>
 <?php echo $this->_tpl_vars['user']['familyname']; ?>
 <?php echo $this->_tpl_vars['user']['firstname']; ?>
<span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['user']['ID'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_user_submenu_create']; ?>
</span>
									<?php endif; ?>
									</a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_user.php?action=submit&amp;id=<?php echo $this->_tpl_vars['user']['ID']; ?>
" enctype="multipart/form-data" <?php echo 'onsubmit="return validateCompleteForm(this,\'input_error\');"'; ?>
>
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "<?php echo $this->_tpl_vars['user']['ID']; ?>
" name = "id" id="id" />
											
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
											
											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_medical']; ?>
</h2>
											<br/>

											<div class="row">
												<label for="type"><?php echo $this->_config[0]['vars']['dico_admin_people_user_type']; ?>
<span class="mandatory">*</span>:</label>
												<select name = "type" id="type" <?php echo 'onchange="javascript:changeType(this.value);"'; ?>
  class="<?php echo $this->_tpl_vars['errors']['type']; ?>
">
													<option value = "" <?php if ($this->_tpl_vars['user']['type'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['dico_admin_people_user_chooseone']; ?>
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
														
														<option <?php if ($this->_tpl_vars['user']['speciality'] == $this->_tpl_vars['specialities'][$this->_sections['speciality']['index']]['ID']): ?> selected="selected"<?php endif; ?> value = "<?php echo $this->_tpl_vars['specialities'][$this->_sections['speciality']['index']]['ID']; ?>
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
											    
											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_agenda']; ?>
</h2>
											<br/>
											
											<div class="row"><label for="agenda_slotminutes"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_slotminutes']; ?>
:</label>
												<select name="agenda_slotminutes" id="agenda_slotminutes" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_slotminutes']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1 minute</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '30'): ?>selected="selected"<?php endif; ?> value="30">30 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '60'): ?>selected="selected"<?php endif; ?> value="60">60 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '120'): ?>selected="selected"<?php endif; ?> value="120">120 minutes</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_mintime"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_mintime']; ?>
:</label>
												<select name="agenda_mintime" id="agenda_mintime" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_mintime']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '0'): ?>selected="selected"<?php endif; ?> value="0">0:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '2'): ?>selected="selected"<?php endif; ?> value="2">2:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '3'): ?>selected="selected"<?php endif; ?> value="3">3:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '4'): ?>selected="selected"<?php endif; ?> value="4">4:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '6'): ?>selected="selected"<?php endif; ?> value="6">6:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '7'): ?>selected="selected"<?php endif; ?> value="7">7:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '8'): ?>selected="selected"<?php endif; ?> value="8">8:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '9'): ?>selected="selected"<?php endif; ?> value="9">9:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '11'): ?>selected="selected"<?php endif; ?> value="11">11:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '12'): ?>selected="selected"<?php endif; ?> value="12">12:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_maxtime"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_maxtime']; ?>
:</label>
												<select name="agenda_maxtime" id="agenda_maxtime" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_maxtime']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '13'): ?>selected="selected"<?php endif; ?> value="13">13:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '14'): ?>selected="selected"<?php endif; ?> value="14">14:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '16'): ?>selected="selected"<?php endif; ?> value="16">16:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '17'): ?>selected="selected"<?php endif; ?> value="17">17:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '18'): ?>selected="selected"<?php endif; ?> value="18">18:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '19'): ?>selected="selected"<?php endif; ?> value="19">19:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '21'): ?>selected="selected"<?php endif; ?> value="21">21:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '22'): ?>selected="selected"<?php endif; ?> value="22">22:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '23'): ?>selected="selected"<?php endif; ?> value="23">23:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '24'): ?>selected="selected"<?php endif; ?> value="24">24:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_firsthour"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_firsthour']; ?>
:</label>
												<select name="agenda_firsthour" id="agenda_firsthour" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_maxtime']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '0'): ?>selected="selected"<?php endif; ?> value="0">0:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '2'): ?>selected="selected"<?php endif; ?> value="2">2:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '3'): ?>selected="selected"<?php endif; ?> value="3">3:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '4'): ?>selected="selected"<?php endif; ?> value="4">4:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '6'): ?>selected="selected"<?php endif; ?> value="6">6:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '7'): ?>selected="selected"<?php endif; ?> value="7">7:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '8'): ?>selected="selected"<?php endif; ?> value="8">8:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '9'): ?>selected="selected"<?php endif; ?> value="9">9:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '11'): ?>selected="selected"<?php endif; ?> value="11">11:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '12'): ?>selected="selected"<?php endif; ?> value="12">12:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '13'): ?>selected="selected"<?php endif; ?> value="13">13:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '14'): ?>selected="selected"<?php endif; ?> value="14">14:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '16'): ?>selected="selected"<?php endif; ?> value="16">16:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '17'): ?>selected="selected"<?php endif; ?> value="17">17:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '18'): ?>selected="selected"<?php endif; ?> value="18">18:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '19'): ?>selected="selected"<?php endif; ?> value="19">19:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '21'): ?>selected="selected"<?php endif; ?> value="21">21:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '22'): ?>selected="selected"<?php endif; ?> value="22">22:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '23'): ?>selected="selected"<?php endif; ?> value="23">23:00</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_firsthour'] == '24'): ?>selected="selected"<?php endif; ?> value="24">24:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_sessionminutes"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_sessionminutes']; ?>
:</label>
												<select name="agenda_sessionminutes" id="agenda_sessionminutes" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_sessionminutes']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1 minute</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '30'): ?>selected="selected"<?php endif; ?> value="30">30 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '60'): ?>selected="selected"<?php endif; ?> value="60">60 minutes</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_sessionminutes'] == '120'): ?>selected="selected"<?php endif; ?> value="120">120 minutes</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_permission"><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_permission']; ?>
:</label>
												<select name="agenda_permission" id="agenda_permission" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_agenda_permission']; ?>
">
													<option <?php if ($this->_tpl_vars['user']['agenda_permission'] == 'read'): ?>selected="selected"<?php endif; ?> value="read">Read</option>
													<option <?php if ($this->_tpl_vars['user']['agenda_permission'] == 'write'): ?>selected="selected"<?php endif; ?> value="write">Read/Write</option>
												</select>
											</div>
											
											<div class="clear_both"></div>
			    		                    <h2><?php echo $this->_config[0]['vars']['dico_admin_people_user_default_group']; ?>
</h2>
											<br/>
											
											<table width="100%">
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
													<?php if ($this->_sections['group']['index'] % 2 == 0): ?>
															<tr>
															<td>
				    										    <input type="checkbox" class="checkbox" value="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" name="assignto[]" id="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" <?php if ($this->_tpl_vars['groups'][$this->_sections['group']['index']]['assigned'] == 1): ?>checked="checked"<?php endif; ?> /><label for="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" style="width:210px;"><?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['name']; ?>
</label>
															</td>
        											<?php else: ?>
															<td>
				    										    <input type="checkbox" class="checkbox" value="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" name="assignto[]" id="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" <?php if ($this->_tpl_vars['groups'][$this->_sections['group']['index']]['assigned'] == 1): ?>checked="checked"<?php endif; ?> /><label for="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" style="width:210px;"><?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['name']; ?>
</label>
															</td>
															</tr>
        											<?php endif; ?>
										    	<?php endfor; endif; ?>
										    </table>
												
											<div class="clear_both"></div>
											    
											    
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('medecin_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
	
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
		jQuery.validator.addMethod("password", function( value, element ) {
			var result = this.optional(element) || /\\d/.test(value) && /[a-z]/i.test(value);
			return result;
		}, "");
		
		$("#form").validate({
			rules: {
			    firstname: "required",
			    familyname: "required",
	    		birthday : { date: true},
				gender :  "required",
	    		email: { email: true },
	    		type :  "required",
	    		web: { url: true }
   			},
   			messages: {
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
				type: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				web: {
    				url: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_web']; ?>
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

	