<?php /* Smarty version 2.6.19, created on 2012-09-10 08:39:24
         compiled from template_user_sumehr_add.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_sumehr' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','js_jquery_multifile' => 'yes','tinymce_jquery' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "advanced",
			plugins : "layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			// Theme options
			theme_advanced_buttons1 : "fullscreen,|,template,|,newdocument,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo",
			theme_advanced_buttons2 : "bold,italic,underline,|bullist,numlist,|,outdent,indent,|,charmap,|,forecolor,formatselect,fontsizeselect",
			theme_advanced_buttons3 : "",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			template_templates : [
				{
					title : "Template1",
					src : "./management_sumehr.php?action=template&id=1",
					description : "Adds Editor Name and Staff ID"
				},
				{
					title : "Template2",
					src : "./management_sumehr.php?action=template&id=2",
					description : "Adds an editing timestamp."
				}
			],
		
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

    				<a href="./user_sumehr.php?action=search"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search']; ?>
</a>

					<?php if ($this->_tpl_vars['sumehr']['ID'] != ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_edit']; ?>
</span> 
					<?php endif; ?>
					<?php if ($this->_tpl_vars['sumehr']['ID'] == ""): ?>
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_add']; ?>
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
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
								<h2><a href="javascript:void(0);" id="protocoledit_toggle" class="win_block" onclick = "toggleBlock('protocoledit');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<?php if ($this->_tpl_vars['sumehr']['ID'] != ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_sumehr_submenu_edit']; ?>
 <?php echo $this->_tpl_vars['patient']['patient_prenom']; ?>
 <?php echo $this->_tpl_vars['patient']['patient_nom']; ?>
</span>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['sumehr']['ID'] == ""): ?>
										<span><?php echo $this->_config[0]['vars']['dico_sumehr_submenu_create']; ?>
 <?php echo $this->_tpl_vars['patient']['patient_prenom']; ?>
 <?php echo $this->_tpl_vars['patient']['patient_nom']; ?>
</span>
									<?php endif; ?>
									</a>
								</h2>
							</div>
			
							<div id = "protocoledit" class="block_in_wrapper">

									<form id="form" class="main" method="post" action="user_sumehr.php?action=submit" enctype="multipart/form-data">
						
										<fieldset>
			
											<div style="float:left;width:80%;">
										
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['sumehr']['ID']; ?>
" name = "id" id="id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['sumehrReport']['ID']; ?>
" name = "report_id" id="report_id" />
												<input type = "hidden" value = "<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
" name = "patient_id" id="patient_id" />

												<div class="row"><label for = "date" class="mandatory"><?php echo $this->_config[0]['vars']['dico_management_protocol_date']; ?>
<span class="mandatory">*</span>:</label><input type = "text" value = "<?php echo $this->_tpl_vars['sumehrReport']['date']; ?>
" name = "date" id="date" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_date']; ?>
" onkeyup="javascript:valuedate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
												<div class="row"><textarea name="text" style="width:100%"><?php echo $this->_tpl_vars['sumehrReport']['text']; ?>
</textarea></div>
											
												<div style="padding:10px;margin-bottom:10px">
													<input name = "file[]" id="file" type="file" class="multi"/>
													
													<div class="MultiFile-label">
														<?php unset($this->_sections['sumehrReportFile']);
$this->_sections['sumehrReportFile']['name'] = 'sumehrReportFile';
$this->_sections['sumehrReportFile']['loop'] = is_array($_loop=$this->_tpl_vars['sumehrReportFiles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sumehrReportFile']['show'] = true;
$this->_sections['sumehrReportFile']['max'] = $this->_sections['sumehrReportFile']['loop'];
$this->_sections['sumehrReportFile']['step'] = 1;
$this->_sections['sumehrReportFile']['start'] = $this->_sections['sumehrReportFile']['step'] > 0 ? 0 : $this->_sections['sumehrReportFile']['loop']-1;
if ($this->_sections['sumehrReportFile']['show']) {
    $this->_sections['sumehrReportFile']['total'] = $this->_sections['sumehrReportFile']['loop'];
    if ($this->_sections['sumehrReportFile']['total'] == 0)
        $this->_sections['sumehrReportFile']['show'] = false;
} else
    $this->_sections['sumehrReportFile']['total'] = 0;
if ($this->_sections['sumehrReportFile']['show']):

            for ($this->_sections['sumehrReportFile']['index'] = $this->_sections['sumehrReportFile']['start'], $this->_sections['sumehrReportFile']['iteration'] = 1;
                 $this->_sections['sumehrReportFile']['iteration'] <= $this->_sections['sumehrReportFile']['total'];
                 $this->_sections['sumehrReportFile']['index'] += $this->_sections['sumehrReportFile']['step'], $this->_sections['sumehrReportFile']['iteration']++):
$this->_sections['sumehrReportFile']['rownum'] = $this->_sections['sumehrReportFile']['iteration'];
$this->_sections['sumehrReportFile']['index_prev'] = $this->_sections['sumehrReportFile']['index'] - $this->_sections['sumehrReportFile']['step'];
$this->_sections['sumehrReportFile']['index_next'] = $this->_sections['sumehrReportFile']['index'] + $this->_sections['sumehrReportFile']['step'];
$this->_sections['sumehrReportFile']['first']      = ($this->_sections['sumehrReportFile']['iteration'] == 1);
$this->_sections['sumehrReportFile']['last']       = ($this->_sections['sumehrReportFile']['iteration'] == $this->_sections['sumehrReportFile']['total']);
?>
															<div id="div_<?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['ID']; ?>
">
																<div style="display:none">
																	<input id="input_<?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['ID']; ?>
" type="checkbox" name="delete[]" value="<?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['ID']; ?>
"/>
																</div>
																<a href="#" class="MultiFile-remove" onclick="$('#input_<?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['ID']; ?>
').attr('checked', 'checked');$('#div_<?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['ID']; ?>
').hide();return false;">x</a>
																<span title="File selected: calendar-6.x-2.2.tar.gz" class="MultiFile-title"><?php echo $this->_tpl_vars['sumehrReportFiles'][$this->_sections['sumehrReportFile']['index']]['name']; ?>
</span>
																<br/>
															</div>
													    <?php endfor; endif; ?>
													</div>
												</div>
												
												<div class="clear_both"></div>

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
													<div class="butn"><button type="submit" onclick="javascript:window.onbeforeunload = null;"><?php echo $this->_config[0]['vars']['dico_button_send']; ?>
</button></div>
													<a href="user_sumehr.php?action=view&patient_id=<?php echo $this->_tpl_vars['patient']['patient_id']; ?>
&user_id=<?php echo $this->_tpl_vars['user']['ID']; ?>
}" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_button_cancel']; ?>
</span></a>
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
	
		/** Confirms when closing the window **/
		window.onbeforeunload = checkClose;
	
	    $("form").validate({
			rules: {
				date : { required:true, date: true}
   			},
   			messages: {
				date: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '",
 			    	date: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_date']; ?>
<?php echo '",
 				},
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
