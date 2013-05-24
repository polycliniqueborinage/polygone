<?php /* Smarty version 2.6.19, created on 2013-04-26 10:43:56
         compiled from template_user_agenda_task_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_daterangepicker' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
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
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php?action=day"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_day']; ?>
</a>
    				<a href="./user_agenda.php?action=week"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_week']; ?>
</a>
	  				<a href="./user_agenda.php?action=list"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_list']; ?>
</a>
	  				<a href="./user_agenda.php?action=fulllist"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_fulllist']; ?>
</a>
	  				<a href="./user_agenda.php?action=timeline"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_timeline']; ?>
</a>
	  				<a href="./user_agenda.php?action=schedule"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_schedule']; ?>
</a>
					<?php if ($this->_tpl_vars['task']['ID'] != ""): ?>
	  				<a href="./user_agenda.php?action=task_add"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_add']; ?>
</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['task']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_add']; ?>
</span> 
					<?php endif; ?>
					<?php if ($this->_tpl_vars['task']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_edit']; ?>
</span> 
					<?php endif; ?>
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/images/symbols/task.png" alt="" />
									<?php if ($this->_tpl_vars['task']['ID'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_user_agenda_task_submenu_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['task']['ID'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_user_agenda_task_submenu_create']; ?>
</span>
									<?php endif; ?>
								</a>
								</h2>
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="user_agenda.php?action=task_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type="hidden" value="<?php echo $this->_tpl_vars['task']['ID']; ?>
" name="id" id="id" />

											<div class="row"><label for = "end_date" class="mandatory"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_end_date']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['task']['end_date']; ?>
" name = "end_date" id="end_date" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_end_date']; ?>
" onkeyup="javascript:valueenddate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for = "title" class="mandatory"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_title']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['task']['title']; ?>
" name = "title" id="title" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_title']; ?>
" autocomplete="off"/></div>

											<div class="row"><label for = "textcomment"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_textcomment']; ?>
:</label><textarea name="textcomment" id="textcomment" realname="<?php echo $this->_config[0]['vars']['dico_user_agenda_task_textcomment']; ?>
" rows="3" cols="1" ><?php echo $this->_tpl_vars['task']['textcomment']; ?>
</textarea></div>

											<div class = "row">
												<label for = "type" class="mandatory"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_reminder']; ?>
:</label>
												<select name = "reminder" id = "reminder" realname = "<?php echo $this->_config[0]['vars']['dico_user_agenda_task_reminder']; ?>
" />
													<option <?php if ($this->_tpl_vars['task']['reminder'] == ""): ?>selected="selected"<?php endif; ?> value = ""><?php echo $this->_config[0]['vars']['dico_user_agenda_task_reminder_no']; ?>
</option>
													<option <?php if ($this->_tpl_vars['task']['reminder'] == '0'): ?>selected="selected"<?php endif; ?> value = "0"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_reminder_today']; ?>
</option>
													<option <?php if ($this->_tpl_vars['task']['reminder'] == "-1"): ?>selected="selected"<?php endif; ?> value = "-1"><?php echo $this->_config[0]['vars']['dico_user_agenda_task_reminder_yesterday']; ?>
</option>
												</select>
											</div>

											<div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn">
												<button type="submit">
												<?php if ($this->_tpl_vars['task']['ID'] != ""): ?>
												<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_update']; ?>

												<?php endif; ?>
												<?php if ($this->_tpl_vars['task']['ID'] == ""): ?>
												<?php echo $this->_config[0]['vars']['dico_user_agenda_addbox_button_add']; ?>

												<?php endif; ?>
												</button>
												</div>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('product_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
		var valuesize =  null;
		var valuedose =  null;
		var valuestok =  null;
		var product = null;
		var valuestartingstok = null;

		$(document).ready(function() {
	
			product = $("#id").val();

		    $("form").validate({
			rules: {
	  			end_date : { required: true, date:true },
	  			title: "required"
   			},
   			messages: {
				end_date: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '",
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_date']; ?>
<?php echo '"
 				},
				title: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
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
					systemeMessage(\'systemmsg\',6000);
				}
		});
		
		
		$(document).ready(function(){
    	   	$(\'#end_date\').daterangepicker({
    	   		dateFormat: \'dd/mm/yy\', 
    	   		posX: 270, 
    	   		posY: 275,
    	   		presetRanges: [
					{text: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_today']; ?>
<?php echo '\', dateStart: \'today\', dateEnd: \'today\' },
					{text: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_tomorrow']; ?>
<?php echo '\', dateStart: \'tomorrow\', dateEnd: \'tomorrow\' },
					{text: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_next_week']; ?>
<?php echo '\', dateStart: \'today+7days\', dateEnd: \'today+7days\' },
					{text: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_next_month']; ?>
<?php echo '\', dateStart: function(){ return Date.parse(\'today\').moveToLastDayOfMonth().add(1).days(); }, dateEnd: function(){ return Date.parse(\'today\').moveToLastDayOfMonth().add(1).days(); }  }
							],
				presets: {
					specificDate: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_specific_date']; ?>
<?php echo '\' 
					}
    	   	}); 
	     });	
		
		
	});
	</script>
	'; ?>