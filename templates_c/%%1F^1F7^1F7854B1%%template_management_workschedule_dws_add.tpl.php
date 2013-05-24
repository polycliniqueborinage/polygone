<?php /* Smarty version 2.6.19, created on 2012-12-14 12:33:28
         compiled from template_management_workschedule_dws_add.tpl */ ?>
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

					<a href="./management_workschedule.php?action=list_dws"><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_liste']; ?>
</a>

    				<?php if ($this->_tpl_vars['daily_wsr']['id'] != ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_edit']; ?>
</span>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['daily_wsr']['id'] == ""): ?>
						<span><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_add']; ?>
</span>
					<?php endif; ?>
    				
    				<a href="./management_workschedule.php?action=list_wsr"><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_liste']; ?>
</a>
    				
    				<a href="./management_workschedule.php?action=add_wsr"><?php echo $this->_config[0]['vars']['navigation_title_management_workschedule_add']; ?>
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
									<?php if ($this->_tpl_vars['daily_wsr']['id'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_edit']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['daily_wsr']['id'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['navigation_title_management_daily_wsr_add']; ?>
</span>
									<?php endif; ?>
								</a>
								</h2>
							</div>
			
							<div id = "dwsedit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_workschedule.php?action=submit_dws" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "id"          class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_id']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['id']; ?>
" name = "id" id="id" class="<?php echo $this->_tpl_vars['errors']['id']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_id']; ?>
" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description" class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_description']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['description']; ?>
" name = "description" id="description" class="<?php echo $this->_tpl_vars['errors']['description']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_description']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<?php if ($this->_tpl_vars['daily_wsr']['begtime'] == ''): ?>
												<div class="row"><label for = "begtime"     class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begtime']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "begtime" id="begtime" class="<?php echo $this->_tpl_vars['errors']['begtime']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begtime']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php else: ?>
												<div class="row"><label for = "begtime"     class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begtime']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['begtime']; ?>
" name = "begtime" id="begtime" class="<?php echo $this->_tpl_vars['errors']['begtime']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begtime']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php endif; ?>
											
											<?php if ($this->_tpl_vars['daily_wsr']['endtime'] == ''): ?>
												<div class="row"><label for = "endtime"     class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endtime']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "endtime" id="endtime" class="<?php echo $this->_tpl_vars['errors']['endtime']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endtime']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php else: ?>
												<div class="row"><label for = "endtime"     class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endtime']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['endtime']; ?>
" name = "endtime" id="endtime" class="<?php echo $this->_tpl_vars['errors']['endtime']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endtime']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php endif; ?>
											
											<?php if ($this->_tpl_vars['daily_wsr']['begbreak'] == ''): ?>
												<div class="row"><label for = "begbreak"    class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begbreak']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "begbreak" id="begbreak" class="<?php echo $this->_tpl_vars['errors']['begbreak']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begbreak']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php else: ?>
												<div class="row"><label for = "begbreak"    class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begbreak']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['begbreak']; ?>
" name = "begbreak" id="begbreak" class="<?php echo $this->_tpl_vars['errors']['begbreak']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_begbreak']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php endif; ?>
											
											<?php if ($this->_tpl_vars['daily_wsr']['endbreak'] == ''): ?>
												<div class="row"><label for = "endbreak"    class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endbreak']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "endbreak" id="endbreak" class="<?php echo $this->_tpl_vars['errors']['endbreak']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endbreak']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php else: ?>
												<div class="row"><label for = "endbreak"    class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endbreak']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['endbreak']; ?>
" name = "endbreak" id="endbreak" class="<?php echo $this->_tpl_vars['errors']['endbreak']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_management_daily_wsr_endbreak']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<?php endif; ?>
											
											<div class="row"><label for = "nb_hours"    class="name"><?php echo $this->_config[0]['vars']['dico_management_daily_wsr_nb_hours']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['daily_wsr']['nb_hours']; ?>
" name = "nb_hours" id="nb_hours" class="<?php echo $this->_tpl_vars['errors']['nb_hours']; ?>
" realname="<?php echo $this->_config[0]['vars']['dico_mvanagement_daily_wsr_nb_hours']; ?>
" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
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
	  			id: "required",
	  			description: "required",
	  			begtime: "required",
	  			endtime: "required",
	  			begbreak: "required",
	  			endbreak: "required",
	  			nb_hours: "required"
   			},
   			messages: {
				id: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				description: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				begtime: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},		
 				endtime: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},	
 				begbreak: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				endbreak: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
 				nb_hours: {
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

	