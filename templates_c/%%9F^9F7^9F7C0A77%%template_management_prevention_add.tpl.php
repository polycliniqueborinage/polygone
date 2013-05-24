<?php /* Smarty version 2.6.19, created on 2013-04-12 09:58:41
         compiled from template_management_prevention_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_prevention' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
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
			width: "95%",
			height: "220px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	'; ?>

	
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

    				<a href="./management_prevention.php?action=activation"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_activation']; ?>
</a>

					<?php if ($this->_tpl_vars['motif']['ID'] != ""): ?>
	  				<a href="./management_prevention.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['motif']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</span> 
					<?php endif; ?>

    				<a href="./management_prevention.php?action=timeplot"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_timeplot']; ?>
</a>

					<?php if ($this->_tpl_vars['motif']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_edit']; ?>
</span> 
					<?php endif; ?>

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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/product.png" alt="" />
									<?php if ($this->_tpl_vars['prevention']['ID'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_prevention_submenu_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['prevention']['ID'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_management_prevention_submenu_create']; ?>
</span>
									<?php endif; ?>
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_prevention.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type="hidden" value="<?php echo $this->_tpl_vars['motif']['ID']; ?>
" name="id" id="id" />

											<div class="row"><label for = "description" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_description']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['description']; ?>
" name = "description" id="description" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_description']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "main_text"><?php echo $this->_config[0]['vars']['dico_management_prevention_main_text']; ?>
:</label><textarea name="main_text" id="main_text" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_main_text']; ?>
" rows="3" cols="1" ><?php echo $this->_tpl_vars['motif']['main_text']; ?>
</textarea></div>
											
											<div class="row"><label for = "rappel"><?php echo $this->_config[0]['vars']['dico_management_prevention_rappel']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['rappel']; ?>
" name = "rappel" id="rappel" title ="<?php echo $this->_config[0]['vars']['dico_management_prevention_rappel']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "period" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_period']; ?>
<span class="mandatory">*</span>:</label>
												<input type = "text" value = "<?php echo $this->_tpl_vars['motif']['period']; ?>
" name = "period" id="period" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_period_title']; ?>
" onkeyup="javascript:periode = checkAmount(this, periode, 10, 0, false);" onfocus="javascript:this.select()" autocomplete="off"/>
											</div>
											
											<div class="row"><label for = "period_unit" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_period_unit']; ?>
<span class="mandatory">*</span>:</label>
												<select name = "period_unit" id = "period_unit" realname = "<?php echo $this->_config[0]['vars']['dico_management_prevention_period_unit']; ?>
"/>
												<?php if ($this->_tpl_vars['motif']['period_unit'] == ""): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_prevention_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['motif']['period_unit'] == 'jours'): ?>selected="selected"<?php endif; ?> value = "jours"><?php echo $this->_config[0]['vars']['dico_management_prevention_period_unit_day']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['period_unit'] == 'mois'): ?>selected="selected"<?php endif; ?> value = "mois"><?php echo $this->_config[0]['vars']['dico_management_prevention_period_unit_month']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['period_unit'] == 'annees'): ?>selected="selected"<?php endif; ?> value = "annees"><?php echo $this->_config[0]['vars']['dico_management_prevention_period_unit_year']; ?>
</option>
												</select>
											</div>

											<div class="row"><label for = "sender_name"><?php echo $this->_config[0]['vars']['dico_management_prevention_sender_name']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['sender_name']; ?>
" name = "sender_name" id="sender_name" title ="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_name']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_address1"><?php echo $this->_config[0]['vars']['dico_management_prevention_sender_address1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['sender_address1']; ?>
" name = "sender_address1" id="sender_address1" title ="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_address1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_zip1city1"><?php echo $this->_config[0]['vars']['dico_management_prevention_sender_zip1city1']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['sender_zip1city1']; ?>
" name = "sender_zip1city1" id="sender_zip1city1" title ="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_zip1city1']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_mail" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_sender_mail']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['sender_mail']; ?>
" name = "sender_mail" id="sender_mail" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_mail']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "sender_reply" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_sender_reply']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['sender_reply']; ?>
" name = "sender_reply" id="sender_reply" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_reply']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<?php if ($this->_tpl_vars['motif']['ID'] == ""): ?>
											<div class="row"><label for = "request" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_request']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['motif']['request']; ?>
" name = "request" id="request" title="<?php echo $this->_config[0]['vars']['dico_management_prevention_sender_request_title']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php endif; ?>

											<div class="row"><label for = "frequency" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency']; ?>
<span class="mandatory">*</span>:</label>
											<select name = "frequency" id = "frequency" title = "<?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_title']; ?>
"/>
												<?php if ($this->_tpl_vars['motif']['frequency'] == ""): ?>
													<option value = "" selected><?php echo $this->_config[0]['vars']['dico_management_prevention_chooseone']; ?>
</option>
												<?php endif; ?>
												<option <?php if ($this->_tpl_vars['motif']['frequency'] == 'annuelle'): ?>selected="selected"<?php endif; ?> value = "annuelle"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_year']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['frequency'] == 'semestrielle'): ?>selected="selected"<?php endif; ?> value = "semestrielle"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_6month']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['frequency'] == 'trimestrielle'): ?>selected="selected"<?php endif; ?> value = "trimestrielle"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_3month']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['frequency'] == 'mensuelle'): ?>selected="selected"<?php endif; ?> value = "mensuelle"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_month']; ?>
</option>
												<option <?php if ($this->_tpl_vars['motif']['frequency'] == 'hebdomadaire'): ?>selected="selected"<?php endif; ?> value = "hebdomadaire"><?php echo $this->_config[0]['vars']['dico_management_prevention_frequency_week']; ?>
</option>
												</select>
											</div>

											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_prevention_button_save']; ?>
</button></div>
											</div>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('prevention_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
	
		var periode=null;

		$(document).ready(function() {
	
			prevention = $("#id").val();
			
			//AUTOCOMPLETE
			$("#sender_zip1city1").autocomplete("php_request/localite_search.php", {
				minChars: 1,
				max: 6,
				scroll: false,
				autoFill: true,
				// remove if dont match
				mustMatch: false,
				matchContains: true
			});
			

		    $("form").validate({
			rules: {
	  			description : { required: true, remote: "php_request/check_prevention.php?id="+prevention },
	  			period: "required",
	  			period_unit: "required",
	  			signature: "required",
	    		sender_mail: { required: true, email: true },
	    		sender_reply: { required: true, email: true },
			    request: "required",
			    frequency: "required"
   			},
   			messages: {
				description: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	remote: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_prevention_unique']; ?>
<?php echo '"
 				},
				period: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				period_unit: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				signature: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				sender_mail: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
    				email: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_email']; ?>
<?php echo '"
 				},
				sender_reply: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
    				email: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_email']; ?>
<?php echo '"
 				},
				request: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				frequency: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				}			}
			
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