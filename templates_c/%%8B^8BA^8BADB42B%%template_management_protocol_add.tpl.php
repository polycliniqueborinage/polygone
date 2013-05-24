<?php /* Smarty version 2.6.19, created on 2012-09-14 13:07:14
         compiled from template_management_protocol_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_protocol' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','js_jquery_multifile' => 'yes','tinymce' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "'; ?>
<?php echo $this->_tpl_vars['locale']; ?>
<?php echo '",
			width: "100%",
			height: "320px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			inline_styles : false,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	'; ?>

	
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

					<?php if ($this->_tpl_vars['protocol']['ID'] != ""): ?>
	  				<a href="./management_protocol.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_add']; ?>
</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['protocol']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_add']; ?>
</span> 
					<?php endif; ?>

	  				<a href="./management_protocol.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_list']; ?>
</a>

					<?php if ($this->_tpl_vars['protocol']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_edit']; ?>
</span> 
					<?php endif; ?>
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'error1'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_protocol_error1']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'error2'): ?>
						<span class="info_in_red"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_protocol_error2']; ?>
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
								<h2><a href="javascript:void(0);" id="protocoledit_toggle" class="win_block" onclick = "toggleBlock('protocoledit');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<?php if ($this->_tpl_vars['protocol']['ID'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_protocol_submenu_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['protocol']['ID'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_protocol_submenu_create']; ?>
</span>
									<?php endif; ?>
									</a>
								</h2>
							</div>
			
							<div id = "protocoledit" class="block_in_wrapper">
			
									<form id="form" class="main" method="post" action="management_protocol.php?action=submit" enctype="multipart/form-data">
						
										<fieldset>
			
											<div style="float:left;width:80%;">
										
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['ID']; ?>
" name = "id" id="id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['patient_ID']; ?>
" name = "patient_id" id="patient_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_sender_ID']; ?>
" name = "user_sender_id" id="user_sender_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient1_ID']; ?>
" name = "user_recipient1_id" id="user_recipient1_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient2_ID']; ?>
" name = "user_recipient2_id" id="user_recipient2_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient3_ID']; ?>
" name = "user_recipient3_id" id="user_recipient3_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient4_ID']; ?>
" name = "user_recipient4_id" id="user_recipient4_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient5_ID']; ?>
" name = "user_recipient5_id" id="user_recipient5_id" />
											
												<div class="row"><label class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_protocol_patient']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['patient']; ?>
" name = "patient" id="patient" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_patient']; ?>
" onkeyup="javascript:patientAutoComplete('',this.value)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row"><label class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_protocol_user']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_sender']; ?>
" name = "user_sender" id="user_sender" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_user']; ?>
" onkeyup="javascript:userSenderAutoComplete('',this.value)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient1_div"><label><?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient1']; ?>
" name = "user_recipient1" id="user_recipient1" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
" onkeyup="javascript:userRecipientAutoComplete('',this.value,1)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient2_div" style="display:<?php echo $this->_tpl_vars['protocol']['user_recipient2_display']; ?>
"><label><?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient2']; ?>
" name = "user_recipient2" id="user_recipient2" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
" onkeyup="javascript:userRecipientAutoComplete('',this.value,2)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient3_div" style="display:<?php echo $this->_tpl_vars['protocol']['user_recipient3_display']; ?>
"><label><?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient3']; ?>
" name = "user_recipient3" id="user_recipient3" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
" onkeyup="javascript:userRecipientAutoComplete('',this.value,3)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient4_div" style="display:<?php echo $this->_tpl_vars['protocol']['user_recipient4_display']; ?>
"><label><?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient4']; ?>
" name = "user_recipient4" id="user_recipient4" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
" onkeyup="javascript:userRecipientAutoComplete('',this.value,4)" onfocus="javascript:this.select()" autocomplete="off"/></div>
												<div class="row" id="user_recipient5_div" style="display:<?php echo $this->_tpl_vars['protocol']['user_recipient5_display']; ?>
"><label><?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['user_recipient5']; ?>
" name = "user_recipient5" id="user_recipient5" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_addressbook']; ?>
" onkeyup="javascript:userRecipientAutoComplete('',this.value,5)" onfocus="javascript:this.select()" autocomplete="off"/></div>

												<div class="row"><label for = "date" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_protocol_date']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['protocol']['date']; ?>
" name = "date" id="date" class="<?php echo $this->_tpl_vars['errors']['date']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_date']; ?>
" onkeyup="javascript:valuedate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>

												<div class="row"><textarea name="text" id="text" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_text']; ?>
" rows="10" cols="1" ><?php echo $this->_tpl_vars['protocol']['text']; ?>
</textarea></div>
											
												<div class="clear_both"></div>

												<div style="background-color:#EFEFEF;padding:10px;margin-bottom:10px">
													<input name = "file[]" id="file" type="file" class="multi"/>
													
													<div class="MultiFile-label">
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
															<div id="div_<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
">
																<div style="display:none">
																	<input id="input_<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
" type="checkbox" name="delete[]" value="<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
"/>
																</div>
																<a href="#" class="MultiFile-remove" onclick="$('#input_<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
').attr('checked', 'checked');$('#div_<?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['ID']; ?>
').hide();return false;">x</a>
																<span title="File selected: calendar-6.x-2.2.tar.gz" class="MultiFile-title"><?php echo $this->_tpl_vars['protocol_files'][$this->_sections['protocol_file']['index']]['name']; ?>
</span>
																<br/>
															</div>
													    <?php endfor; endif; ?>
													</div>
												</div>	

												<div class="clear_both"></div>

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
" <?php if ($this->_tpl_vars['groups'][$this->_sections['group']['index']]['assigned'] == 1): ?>checked="checked"<?php endif; ?> /><label for="<?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['ID']; ?>
" style="width:210px;"><?php echo $this->_tpl_vars['groups'][$this->_sections['group']['index']]['name']; ?>
</label>
	    								    	</div>
										    	<?php endfor; endif; ?>
												
												<div class="clear_both"></div>
												
					                        	<div class="row">
													<label>&nbsp;</label>
													<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_send']; ?>
</button></div>
												</div>
											</div>
			
											<div style="float:left;" >
																						
											</div>
			
										</fieldset>
									
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('patient_search' => 'yes','user_search' => 'yes','addressbook_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	<?php echo '
	<script type="text/javascript">
	var date=\'\';
	$(document).ready(function() {
	
		// VALIDATION
		jQuery.validator.addMethod("patient_id", function( value, element ) {
			return $("#patient_id").val() != \'\';
		}, "");
		// VALIDATION
		jQuery.validator.addMethod("user_sender_id", function( value, element ) {
			return $("#user_sender_id").val() != \'\';
		}, "");
	
	    $("form").validate({
			rules: {
				patient  : { required:true , patient_id: true },
				user_sender  : { required:true , user_sender_id: true },
				date : { required:true, date: true}
   			},
   			messages: {
				patient: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	patient_id: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_patient_id']; ?>
<?php echo '"
 				},
				user_sender: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	user_id: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_user_id']; ?>
<?php echo '"
 				},
				date: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_date']; ?>
<?php echo '",
 				},
				addressbook: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	addressbook_id: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_patient_id']; ?>
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
					systemeMessage(\'systemmsg\',3000);
				}
		});
		
	});
	</script>
	'; ?>