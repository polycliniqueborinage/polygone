<?php /* Smarty version 2.6.19, created on 2012-10-08 14:40:34
         compiled from template_management_patient_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_ui_171' => 'yes','js_jquery_autocomplete' => 'yes','js_patient' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
	<script type="text/javascript">	
		tinyMCE.init({
			mode : "exact",
			elements : "textcomment",  
			theme : "advanced",
			language: "'; ?>
<?php echo $this->_tpl_vars['locale']; ?>
<?php echo '",
			width: "70%",
			height: "10px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			//theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			//cleanup: true,
			//auto_reset_designmode: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	
	</script>
	'; ?>


	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_patient.php?action=search"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_search']; ?>
</a>

					<?php if ($this->_tpl_vars['patient']['ID'] != ""): ?>
	  				<a href="./management_patient.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_add']; ?>
</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['patient']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_patient_menu_add']; ?>
</span> 
					<?php endif; ?>

	  				<a href="./management_patient.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_list']; ?>
</a>

					<?php if ($this->_tpl_vars['patient']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_patient_menu_edit']; ?>
</span> 
					<?php endif; ?>
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_patient_error1']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error2'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_patient_error2']; ?>
</span>
						<?php endif; ?>
					</div>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<!--<span><?php echo $this->_config[0]['vars']['dico_management_patient_create']; ?>
</span></a>-->
									<span><?php echo $this->_tpl_vars['title']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "userprofile" style = "">
								
							
								<form id="form" class="main" method="post" action="management_patient.php?action=submit" enctype="multipart/form-data">
									<div id="tab_content">
										<ul>
											<li>
												<a href="#fragment-1"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_general']; ?>
</span></a>
											</li>
											<li>
												<a href="#fragment-2"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_info']; ?>
</span></a>
											</li>
											<li>
												<a href="#fragment-3"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
</span></a>
											</li>
										</ul>
										
										<div id="fragment-1" class="block_in_wrapper">
							
											<fieldset>
					
												<div style="float:left;width:80%;">
												
													<div class="row"><input type = "hidden" value = "<?php echo $this->_tpl_vars['patient']['ID']; ?>
" name = "id" id="id" /></div>
													<div class="row"><input type = "hidden" value = "<?php echo $this->_tpl_vars['patient']['titulaire_ID']; ?>
" name = "titulaire_id" id="titulaire_id" /></div>
									
													<div class="row">
														<label for="btn_idcard"><?php echo $this->_config[0]['vars']['dico_management_patient_btn_idcard']; ?>
:</label><button id="btn_idcard" type="button" onclick="ReadCard()"><img src="templates/standard/img/48x48/Download.ico" alt=""/></button>
														<div style="float:left;" > 
															<applet
				                                        		codebase = "."
				                               	            	archive  = "beidlib.jar"
				                                            	code     = "be.belgium.eid.BEID_Applet.class"
				                                            	name     = "BEIDApplet"
				                                            	width    = "70"
				                                            	height   = "100"
				                                            	hspace   = "0"
				                                            	vspace   = "0"
				                                            	align    = "middle"
				                                        	>
				                                        		<param name="Reader" value="">
				                                   				<param name="OCSP" value="-1">
				                                        		<param name="CRL" value="-1">
				                                        		<param name="DisableWarning" value="true">
				                                        	</applet>										
														</div>																												
													</div>
									
													<div class="row"><label for="titulaire_name"><?php echo $this->_config[0]['vars']['dico_management_patient_titulaire_name']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['titulaire_name']; ?>
" name = "titulaire_name" id="titulaire_name" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_titulaire_name']; ?>
" onfocus="javascript:this.select();" onkeyup="javascript:titulaireSimpleSearch('', this.value);" autocomplete="off"/></div>
													
													<div class="row"><label for = "familyname" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_patient_familyname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['familyname']; ?>
" name = "familyname" id="familyname" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_familyname']; ?>
" onfocus="javascript:this.select();" onkeyup="javascript:patientSimpleSearch('',this.value+' '+$('#firstname').val());" autocomplete="off"/></div>
		
													<div class="row"><label for = "firstname" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_patient_firstname']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['firstname']; ?>
" name = "firstname" id="firstname" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_firstname']; ?>
" onfocus="javascript:this.select()" onkeyup="javascript:patientSimpleSearch('',$('#familyname').val()+' '+this.value);" autocomplete="off"/></div>
													
													<div class="row"><label for = "birthday" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_patient_birthday']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['birthday']; ?>
" name = "birthday" id="birthday" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_birthday']; ?>
" onkeyup="javascript:valuebirthday = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class = "row">
														<label for = "gender"><?php echo $this->_config[0]['vars']['dico_management_patient_gender']; ?>
<span class="mandatory">*</span>:</label>
														<select name = "gender" id = "gender" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_gender']; ?>
"/>
														<?php if ($this->_tpl_vars['patient']['gender'] == ""): ?>
															<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
														<?php endif; ?>
														<option <?php if ($this->_tpl_vars['patient']['gender'] == 'M'): ?>selected="selected"<?php endif; ?> value = "M"><?php echo $this->_config[0]['vars']['dico_management_patient_male']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['gender'] == 'F'): ?>selected="selected"<?php endif; ?> value = "F"><?php echo $this->_config[0]['vars']['dico_management_patient_female']; ?>
</option>
														</select>
													</div>
		
													<div class="row">
														<label for = "nationality"><?php echo $this->_config[0]['vars']['dico_management_patient_nationality']; ?>
:</label>
														<select name = "nationality" id = "nationality" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_nationality']; ?>
" />
														<?php if ($this->_tpl_vars['patient']['nationality'] == ""): ?>
															<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
														<?php endif; ?>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'be'): ?>selected="selected"<?php endif; ?> value = "be"><?php echo $this->_config[0]['vars']['dico_management_patient_be']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'it'): ?>selected="selected"<?php endif; ?> value = "it"><?php echo $this->_config[0]['vars']['dico_management_patient_it']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'tr'): ?>selected="selected"<?php endif; ?> value = "tr"><?php echo $this->_config[0]['vars']['dico_management_patient_tr']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'de'): ?>selected="selected"<?php endif; ?> value = "de"><?php echo $this->_config[0]['vars']['dico_management_patient_de']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'en'): ?>selected="selected"<?php endif; ?> value = "en"><?php echo $this->_config[0]['vars']['dico_management_patient_en']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'es'): ?>selected="selected"<?php endif; ?> value = "es"><?php echo $this->_config[0]['vars']['dico_management_patient_es']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'fr'): ?>selected="selected"<?php endif; ?> value = "fr"><?php echo $this->_config[0]['vars']['dico_management_patient_fr']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'jp'): ?>selected="selected"<?php endif; ?> value = "jp"><?php echo $this->_config[0]['vars']['dico_management_patient_jp']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'pl'): ?>selected="selected"<?php endif; ?> value = "pl"><?php echo $this->_config[0]['vars']['dico_management_patient_pl']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'pt'): ?>selected="selected"<?php endif; ?> value = "pt"><?php echo $this->_config[0]['vars']['dico_management_patient_pt']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'ro'): ?>selected="selected"<?php endif; ?> value = "ro"><?php echo $this->_config[0]['vars']['dico_management_patient_ro']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'ru'): ?>selected="selected"<?php endif; ?> value = "ru"><?php echo $this->_config[0]['vars']['dico_management_patient_ru']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'bg'): ?>selected="selected"<?php endif; ?> value = "bg"><?php echo $this->_config[0]['vars']['dico_management_patient_bg']; ?>
</option>
														<option <?php if ($this->_tpl_vars['patient']['nationality'] == 'da'): ?>selected="selected"<?php endif; ?> value = "da"><?php echo $this->_config[0]['vars']['dico_management_patient_da']; ?>
</option>
														</select>
													</div>
													
													<div class="row"><label for = "niss"><?php echo $this->_config[0]['vars']['dico_management_patient_niss']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['niss']; ?>
" name = "niss" id="niss" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_niss']; ?>
" onfocus="javascript:this.select()" autocomplete="off" onkeyup="javascript:valueniss = checkNumber(this, valueniss, 11, false);" onchange=document.getElementById("mutuelle_matricule").value=this.value;></div>
		
													<div class="row"><label for = "address1"><?php echo $this->_config[0]['vars']['dico_management_patient_address1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['address1']; ?>
" name = "address1" id="address1" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_address1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class="row"><label for = "zip1city1"><?php echo $this->_config[0]['vars']['dico_management_patient_zip1city1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['zip1']; ?>
 <?php echo $this->_tpl_vars['patient']['city1']; ?>
" name = "zip1city1" id="zip1city1" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_zip1city1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<!--<div class="row"><label for = "state1"><?php echo $this->_config[0]['vars']['dico_management_patient_state1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['state1']; ?>
" name = "state1" id="state1" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_state1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<!--<div class="row"><label for = "country1"><?php echo $this->_config[0]['vars']['dico_management_patient_country1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['country1']; ?>
" name = "country1" id="country1" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_country1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<!--<div class="row"><label for = "workphone"><?php echo $this->_config[0]['vars']['dico_management_patient_workphone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['workphone']; ?>
" name = "workphone" id="workphone" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_workphone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<div class="row"><label for = "privatephone"><?php echo $this->_config[0]['vars']['dico_management_patient_privatephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['privatephone']; ?>
" name = "privatephone" id="privatephone" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_privatephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class="row"><label for = "mobilephone"><?php echo $this->_config[0]['vars']['dico_management_patient_mobilephone']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['mobilephone']; ?>
" name = "mobilephone" id="mobilephone" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_mobilephone']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<!--<div class="row"><label for = "fax"><?php echo $this->_config[0]['vars']['dico_management_patient_fax']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['fax']; ?>
" name = "fax" id="email" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_fax']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<div class="row"><label for = "email"><?php echo $this->_config[0]['vars']['dico_management_patient_email']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['email']; ?>
" name = "email" id="email" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_email']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
													
													<div class=""><input type='checkbox' name='receive_mail' id='receive_mail' value='checked'/><label for = "receive_mail"> <?php echo $this->_config[0]['vars']['dico_management_patient_receive_mail']; ?>
</label></div>
		
													<div class="mutu">
													
														<div class="row"><label for = "mutuelle"><?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_code']; ?>
:</label>
															<select name = "mutuelle_code" id = "mutuelle_code" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_code']; ?>
">
																<?php if ($this->_tpl_vars['patient']['mutuel_code'] == ""): ?>
																	<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
																<?php endif; ?>
																<?php unset($this->_sections['mutuelle']);
$this->_sections['mutuelle']['name'] = 'mutuelle';
$this->_sections['mutuelle']['loop'] = is_array($_loop=$this->_tpl_vars['mutuelles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mutuelle']['show'] = true;
$this->_sections['mutuelle']['max'] = $this->_sections['mutuelle']['loop'];
$this->_sections['mutuelle']['step'] = 1;
$this->_sections['mutuelle']['start'] = $this->_sections['mutuelle']['step'] > 0 ? 0 : $this->_sections['mutuelle']['loop']-1;
if ($this->_sections['mutuelle']['show']) {
    $this->_sections['mutuelle']['total'] = $this->_sections['mutuelle']['loop'];
    if ($this->_sections['mutuelle']['total'] == 0)
        $this->_sections['mutuelle']['show'] = false;
} else
    $this->_sections['mutuelle']['total'] = 0;
if ($this->_sections['mutuelle']['show']):

            for ($this->_sections['mutuelle']['index'] = $this->_sections['mutuelle']['start'], $this->_sections['mutuelle']['iteration'] = 1;
                 $this->_sections['mutuelle']['iteration'] <= $this->_sections['mutuelle']['total'];
                 $this->_sections['mutuelle']['index'] += $this->_sections['mutuelle']['step'], $this->_sections['mutuelle']['iteration']++):
$this->_sections['mutuelle']['rownum'] = $this->_sections['mutuelle']['iteration'];
$this->_sections['mutuelle']['index_prev'] = $this->_sections['mutuelle']['index'] - $this->_sections['mutuelle']['step'];
$this->_sections['mutuelle']['index_next'] = $this->_sections['mutuelle']['index'] + $this->_sections['mutuelle']['step'];
$this->_sections['mutuelle']['first']      = ($this->_sections['mutuelle']['iteration'] == 1);
$this->_sections['mutuelle']['last']       = ($this->_sections['mutuelle']['iteration'] == $this->_sections['mutuelle']['total']);
?>
																		<option value = "<?php echo $this->_tpl_vars['mutuelles'][$this->_sections['mutuelle']['index']]['ID']; ?>
" <?php if ($this->_tpl_vars['patient']['mutuel_code'] == $this->_tpl_vars['mutuelles'][$this->_sections['mutuelle']['index']]['ID']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['mutuelles'][$this->_sections['mutuelle']['index']]['VALUE']; ?>
</option>
																<?php endfor; endif; ?>
															</select>
														</div>
			
														<div class="row"><label for = "mutuelle_matricule"><?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_matricule']; ?>
:</label><input type = "text" readonly value = "<?php echo $this->_tpl_vars['patient']['mutuel_matricule']; ?>
" name = "mutuelle_matricule" id="mutuelle_matricule" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_matricule']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
														<div class="row"><label for = "ct1ct2"><?php echo $this->_config[0]['vars']['dico_management_patient_ct1ct2']; ?>
:</label>
															<select name = "ct1ct2" id = "ct1ct2" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_ct1ct2']; ?>
">
																<?php if ($this->_tpl_vars['patient']['ct1ct2'] == ""): ?>
																	<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
																<?php endif; ?>
																<?php unset($this->_sections['ct1ct2']);
$this->_sections['ct1ct2']['name'] = 'ct1ct2';
$this->_sections['ct1ct2']['loop'] = is_array($_loop=$this->_tpl_vars['ct1ct2s']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ct1ct2']['show'] = true;
$this->_sections['ct1ct2']['max'] = $this->_sections['ct1ct2']['loop'];
$this->_sections['ct1ct2']['step'] = 1;
$this->_sections['ct1ct2']['start'] = $this->_sections['ct1ct2']['step'] > 0 ? 0 : $this->_sections['ct1ct2']['loop']-1;
if ($this->_sections['ct1ct2']['show']) {
    $this->_sections['ct1ct2']['total'] = $this->_sections['ct1ct2']['loop'];
    if ($this->_sections['ct1ct2']['total'] == 0)
        $this->_sections['ct1ct2']['show'] = false;
} else
    $this->_sections['ct1ct2']['total'] = 0;
if ($this->_sections['ct1ct2']['show']):

            for ($this->_sections['ct1ct2']['index'] = $this->_sections['ct1ct2']['start'], $this->_sections['ct1ct2']['iteration'] = 1;
                 $this->_sections['ct1ct2']['iteration'] <= $this->_sections['ct1ct2']['total'];
                 $this->_sections['ct1ct2']['index'] += $this->_sections['ct1ct2']['step'], $this->_sections['ct1ct2']['iteration']++):
$this->_sections['ct1ct2']['rownum'] = $this->_sections['ct1ct2']['iteration'];
$this->_sections['ct1ct2']['index_prev'] = $this->_sections['ct1ct2']['index'] - $this->_sections['ct1ct2']['step'];
$this->_sections['ct1ct2']['index_next'] = $this->_sections['ct1ct2']['index'] + $this->_sections['ct1ct2']['step'];
$this->_sections['ct1ct2']['first']      = ($this->_sections['ct1ct2']['iteration'] == 1);
$this->_sections['ct1ct2']['last']       = ($this->_sections['ct1ct2']['iteration'] == $this->_sections['ct1ct2']['total']);
?>
																	<option <?php if ($this->_tpl_vars['patient']['ct1ct2'] == $this->_tpl_vars['ct1ct2s'][$this->_sections['ct1ct2']['index']]['ID']): ?>selected="selected"<?php endif; ?> value = "<?php echo $this->_tpl_vars['ct1ct2s'][$this->_sections['ct1ct2']['index']]['ID']; ?>
"><?php echo $this->_tpl_vars['ct1ct2s'][$this->_sections['ct1ct2']['index']]['VALUE']; ?>
</option>
																<?php endfor; endif; ?>
															</select>
														</div>
		
														<div class=""><input type='checkbox' name='tiers_payant' id='tiers_payant' <?php echo $this->_tpl_vars['patient']['tiers_payant']; ?>
 value='checked'/><label for = "tiers_payant"> <?php echo $this->_config[0]['vars']['dico_management_patient_tiers_payant']; ?>
</label></div>
													
														<div class="row"><label for = "sis"><?php echo $this->_config[0]['vars']['dico_management_patient_sis']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['sis']; ?>
" name = "sis" id="sis" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_sis']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
														
														<div class="row"><label for = "doctor"><?php echo $this->_config[0]['vars']['dico_management_patient_doctor']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['doctor']; ?>
" name = "doctor" id="doctor" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_doctor']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
														<div class=""><input type = "checkbox" value = "checked" name = "checkminimum" id="checkminimum" /><label><?php echo $this->_config[0]['vars']['dico_management_patient_checkminimum']; ?>
</label></div>
														
														<div class="row"><label for = "fumeur"><?php echo $this->_config[0]['vars']['dico_management_patient_fumeur']; ?>
:</label><table><tr><td><input type = "radio" value = "oui" name = "fumeur" id="fumeur" <?php if ($this->_tpl_vars['patient']['fumeur'] == 'oui'): ?>checked<?php endif; ?> realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_fumeur']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/><?php echo $this->_config[0]['vars']['dico_management_patient_oui']; ?>
</td>
														                                                                                             <td><input type = "radio" value = "non" name = "fumeur" id="fumeur" <?php if ($this->_tpl_vars['patient']['fumeur'] == 'non' || $this->_tpl_vars['patient']['fumeur'] == ""): ?>checked<?php endif; ?> realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_fumeur']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/><?php echo $this->_config[0]['vars']['dico_management_patient_non']; ?>
</td></tr></table></div>
														
														<div class="row"><label><?php echo $this->_config[0]['vars']['dico_management_patient_obese']; ?>
</label><input type = "checkbox" name = "obese" id="obese" <?php echo $this->_tpl_vars['patient']['obese']; ?>
 value='checked' /></div>
		
													</div>
													
					    		                    <div class="clear_both"></div>
					
												</div>
					
											</fieldset>
										</div>											
										<div id="fragment-2" class="block_in_wrapper">
											<div class="row"><label for = "commentaire"><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['patient']['commentaire']; ?>
" name = "commentaire" id="commentaire" realname ="<?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="clear_both_b"></div> 											<div class=""><input type='checkbox' name='tiers_payant_info' id='tiers_payant_info' <?php echo $this->_tpl_vars['patient']['tiers_payant_info']; ?>
 value='checked'/><label for = "tiers_payant_info"> <?php echo $this->_config[0]['vars']['dico_management_patient_tiers_payant_info']; ?>
</label></div>
											<div class=""><input type='checkbox' name='vipo_info' id='vipo_info' <?php echo $this->_tpl_vars['patient']['vipo_info']; ?>
 value='checked'/><label for = "vipo_info"> <?php echo $this->_config[0]['vars']['dico_management_patient_vipo_info']; ?>
</label></div>
											<div class=""><input type='checkbox' name='mutuelle_info' id='mutuelle_info' <?php echo $this->_tpl_vars['patient']['mutuelle_info']; ?>
 value='checked'/><label for = "mutuelle_info"> <?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_info']; ?>
</label></div>
											<div class=""><input type='checkbox' name='interdit_info' id='interdit_info' <?php echo $this->_tpl_vars['patient']['interdit_info']; ?>
 value='checked'/><label for = "interdit_info"> <?php echo $this->_config[0]['vars']['dico_management_patient_interdit_info']; ?>
</label></div>
											
											<div class="clear_both_b"></div> 											<hr>
											<div class="clear_both_b"></div> 											
											<div class="row">
												<label for = "rating_rendez_vous_info"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rendez_vous_info']; ?>
:</label>
												<select name = "rating_rendez_vous_info" id = "rating_rendez_vous_info" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rendez_vous_info']; ?>
" />
												<?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '0'): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '1'): ?>selected="selected"<?php endif; ?> value = "1"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_1']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '2'): ?>selected="selected"<?php endif; ?> value = "2"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_2']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '3'): ?>selected="selected"<?php endif; ?> value = "3"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_3']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '4'): ?>selected="selected"<?php endif; ?> value = "4"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_4']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '5'): ?>selected="selected"<?php endif; ?> value = "5"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_5']; ?>
</option>
												</select>
											</div>
											
											<div class="row">
												<label for = "rating_frequentation_info"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_info']; ?>
:</label>
												<select name = "rating_frequentation_info" id = "rating_frequentation_info" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_info']; ?>
" />
												<?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '0'): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '1'): ?>selected="selected"<?php endif; ?> value = "1"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_1']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '2'): ?>selected="selected"<?php endif; ?> value = "2"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_2']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '3'): ?>selected="selected"<?php endif; ?> value = "3"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_3']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '4'): ?>selected="selected"<?php endif; ?> value = "4"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_4']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '5'): ?>selected="selected"<?php endif; ?> value = "5"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_5']; ?>
</option>
												</select>
											</div>
											
											<div class="row">
												<label for = "rating_preference_info"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_info']; ?>
:</label>
												<select name = "rating_preference_info" id = "rating_preference_info" realname = "<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_info']; ?>
" />
												<?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '0'): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_patient_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '1'): ?>selected="selected"<?php endif; ?> value = "1"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_1']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '2'): ?>selected="selected"<?php endif; ?> value = "2"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_2']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '3'): ?>selected="selected"<?php endif; ?> value = "3"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_3']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '4'): ?>selected="selected"<?php endif; ?> value = "4"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_4']; ?>
</option>
												<option <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '5'): ?>selected="selected"<?php endif; ?> value = "5"><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_5']; ?>
</option>
												</select>
											</div>
											
											<div class="clear_both_b"></div> 										</div>  										
										<div id="fragment-3" class="block_in_wrapper">
											
												<textarea id="textcomment" rows="1" cols="1" name="textcomment"><?php echo $this->_tpl_vars['patient']['textcomment']; ?>
</textarea>
												
											<div class="clear_both_b"></div> 										</div>  									
								</div> 					
								<div class="row">
									<label>&nbsp;</label>
									<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_patient_send']; ?>
</button></div>
								</div>
					
								</form>		
								<div class="clear_both"></div> 						
							</div>			
							<div class="clear_both"></div> 			
						</div> 			
					</div> 			
			
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('titulaire_search' => 'yes','patient_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	<?php echo '	
	
	<script type="text/javascript">

		
		var valuebirthday = null;
		
		$(document).ready(function() {
	
		$("#zip1city1").autocomplete("php_request/localite_search.php",
			{
			delay:10,
			minChars:1,
			matchSubset:1,
			matchContains:1,
			cacheLength:10,
			autoFill:true,
			lineSeparator:\'#\'
			}
		);
		
		$("#form").validate({
			rules: {
			    familyname: "required",
			    firstname: "required",
	    		birthday : { required:true, date: true},
			    gender: {required: function(element){return(!$(\'#checkminimum\').is(\':checked\'));}},
			    mutuel_code: {required: function(element){return(!$("#checkminimum").is(\':checked\'));}},
			    mutuel_matricule: {required: function(element){return(!$("#checkminimum").is(\':checked\'));}},
			    ct1ct2: {required: function(element){return(!$("#checkminimum").is(\':checked\'));}},
	    		email: { email: true }
   			},
   			messages: {
				familyname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				firstname: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				gender: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				mutuel_code: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				mutuel_matricule: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				ct1ct2: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				birthday: {
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_date']; ?>
<?php echo '",
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				email: {
    				email: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_email']; ?>
<?php echo '"
 				}
			}
		});
		
		
	});
	</script>
	'; ?>
	
	
	<?php echo '
	<script type=\'text/javascript\'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	'; ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	