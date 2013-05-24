<?php /* Smarty version 2.6.19, created on 2011-01-26 13:07:55
         compiled from template_user_profil_edit.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_user' => 'yes','js_form' => 'yes','password_strength' => 'yes','js_jquery_validate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_profil_error1']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error2'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_profil_error2']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error3'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_profil_error3']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error4'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_user_profil_error4']; ?>
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
								
								<form id="form" class="main" method="post" action="user_profil.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<div class="row"><label for="name"><?php echo $this->_config[0]['vars']['dico_user_profil_login']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['name']; ?>
" name = "name" id="name" class="<?php echo $this->_tpl_vars['errors']['name']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_name']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="firstname"><?php echo $this->_config[0]['vars']['dico_user_profil_firstname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['firstname']; ?>
" name = "firstname" id="firstname" class="<?php echo $this->_tpl_vars['errors']['firstname']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_firstname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="familyname"><?php echo $this->_config[0]['vars']['dico_user_profil_familyname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['familyname']; ?>
" name = "familyname" id="familyname" class="<?php echo $this->_tpl_vars['errors']['familyname']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_familyname']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="birthday"><?php echo $this->_config[0]['vars']['dico_user_profil_birthday']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['birthday']; ?>
" name = "birthday" id="birthday" class="<?php echo $this->_tpl_vars['errors']['birthday']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_user_profil_birthday']; ?>
" onkeyup="javascript:birthdayvalue = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "avatar"><?php echo $this->_config[0]['vars']['dico_user_profil_avatar']; ?>
:</label><input type = "file" class="file" name = "userfile" id="avatar" size="20" /></div>
											
											<div class = "row">
												<label for = "gender"><?php echo $this->_config[0]['vars']['dico_user_profil_gender']; ?>
<span class="mandatory">*</span>:</label>
												<select name = "gender" id = "gender" realname = "<?php echo $this->_config[0]['vars']['dico_user_profil_gender']; ?>
" class="<?php echo $this->_tpl_vars['errors']['gender']; ?>
"/>
												<?php if ($this->_tpl_vars['user']['gender'] == ""): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_user_profil_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['user']['gender'] == 'm'): ?>selected="selected"<?php endif; ?> value = "m"><?php echo $this->_config[0]['vars']['dico_user_profil_male']; ?>
</option>
												<option <?php if ($this->_tpl_vars['user']['gender'] == 'f'): ?>selected="selected"<?php endif; ?> value = "f"><?php echo $this->_config[0]['vars']['dico_user_profil_female']; ?>
</option>
												</select>
											</div>

											<div class="row">
												<label for = "locale"><?php echo $this->_config[0]['vars']['dico_user_profil_locale']; ?>
:</label>
												<select name = "locale" required="0" id="locale">
													<option value = "" <?php if ($this->_tpl_vars['user']['locale'] == ""): ?>selected="selected"<?php endif; ?>><?php echo $this->_config[0]['vars']['dico_user_profil_chooseone']; ?>
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
											
											<div class="row"><label for = "address1"><?php echo $this->_config[0]['vars']['dico_user_profil_address1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['address1']; ?>
" name = "address1" id="address1" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_address1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1"><?php echo $this->_config[0]['vars']['dico_user_profil_zip1city1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['zip1']; ?>
 <?php echo $this->_tpl_vars['user']['city1']; ?>
" name = "zip1city1" id="zip1city1" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_zip1city1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1"><?php echo $this->_config[0]['vars']['dico_user_profil_state1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['state1']; ?>
" name = "state1" id="state1" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_state1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1"><?php echo $this->_config[0]['vars']['dico_user_profil_country1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['country1']; ?>
" name = "country1" id="country1" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_country1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone"><?php echo $this->_config[0]['vars']['dico_user_profil_workphone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['workphone']; ?>
" name = "workphone" id="workphone" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_workphone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "mobilephone"><?php echo $this->_config[0]['vars']['dico_user_profil_mobilephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['mobilephone']; ?>
" name = "mobilephone" id="mobilephone" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_mobilephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "privatephone"><?php echo $this->_config[0]['vars']['dico_user_profil_privatephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['privatephone']; ?>
" name = "privatephone" id="privatephone" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_privatephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax"><?php echo $this->_config[0]['vars']['dico_user_profil_fax']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['fax']; ?>
" name = "fax" id="fax" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_fax']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email"><?php echo $this->_config[0]['vars']['dico_user_profil_email']; ?>
:</label><input type="text" name="email" id="email" value = "<?php echo $this->_tpl_vars['user']['email']; ?>
" class="<?php echo $this->_tpl_vars['errors']['email']; ?>
" realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_email']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class = "row"><label for = "web"><?php echo $this->_config[0]['vars']['dico_user_profil_web']; ?>
:</label><input type = "text" name = "web" id = "web" realname = "<?php echo $this->_config[0]['vars']['dico_user_profil_web']; ?>
" value = "<?php echo $this->_tpl_vars['user']['web']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "company"><?php echo $this->_config[0]['vars']['dico_user_profil_company']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['user']['company']; ?>
" name = "company" id="company"  realname ="<?php echo $this->_config[0]['vars']['dico_user_profil_company']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

			    		                    <div class="clear_both"></div>
					                        <h2><?php echo $this->_config[0]['vars']['dico_user_profil_agenda_config']; ?>
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

			    		                    <div class="clear_both"></div>
					                        <h2><?php echo $this->_config[0]['vars']['dico_user_profil_changepassword']; ?>
</h2>
					                        <br/>
			
					                        <div class="row"><label for = "oldpass"><?php echo $this->_config[0]['vars']['dico_user_profil_oldpass']; ?>
:</label><input type = "password" name = "oldpass" id = "oldpass" /></div>
					                        <div class="row"><label for = "newpass"><?php echo $this->_config[0]['vars']['dico_user_profil_newpass']; ?>
:</label><input class="password_test" type = "password" name = "newpass" id = "newpass" /></div>
					                        <div class="row"><label for = "repeatpass"><?php echo $this->_config[0]['vars']['dico_user_profil_repeatpass']; ?>
:</label><input type = "password" name = "repeatpass" id = "repeatpass"/></div>
					                        <div class="row"><label for = "repeatpass"><?php echo $this->_config[0]['vars']['dico_user_profil_hacktime']; ?>
:</label><span id="info"></span></div>
			
			

											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_user_profil_send']; ?>
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

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('useronline' => 'no','chat' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
	
		$(\'#repeatpass\').pwdstr(\'#info\');
		
		$(".password_test").passStrength({
			userid:	"#name"
		});
	
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
			    name: "required",
			    firstname: "required",
			    familyname: "required",
	    		birthday : { date: true },
				gender :  "required",
	    		email: { email: true },
	    		web : { url: true},
	    		oldpass  : { remote: "php_request/check_password.php", required: function(element){return $("#newpass").val() != \'\';} },
	    		newpass  : { minlength:6, password: true, required: function(element){return $("#oldpass").val() != \'\';} },
	    		repeatpass  : { equalTo:"#newpass" }
   			},
   			messages: {
				email: {
    				email: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_email']; ?>
<?php echo '"
 				},
				name: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				},
				firstname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				},
				familyname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				},
				gender: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_admin_error_required']; ?>
<?php echo '"
 				},
				birthday: {
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_date']; ?>
<?php echo '"
 				},
				web: {
 			    	url: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_web']; ?>
<?php echo '"
 				},
				oldpass: {
 			    	remote: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_oldpass']; ?>
<?php echo '",
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '" 
 				},
				newpass: {
 			    	minlength: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_minlength']; ?>
<?php echo '",
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '",
 			    	password: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_password']; ?>
<?php echo '"
 				},
				repeatpass: {
 			    	equalTo: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_equalTo']; ?>
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

	
	
	
	
	