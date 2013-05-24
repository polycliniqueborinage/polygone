<?php /* Smarty version 2.6.19, created on 2013-05-24 09:17:40
         compiled from template_user_leaverequest.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','js_new_datepicker' => 'yes','tinymce' => 'yes')));
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
			width: "40%",
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					
					<a href="./user_services.php?action=teamcalendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_teamcalendar']; ?>
</a>
					<a href="./user_services.php?action=leave_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_pending_requests']; ?>
</a>
					<a href="./user_services.php?action=quota_overview"><?php echo $this->_config[0]['vars']['navigation_title_user_services_quotas']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_leaverequest']; ?>
</span>
    				<?php if ($this->_tpl_vars['ismanager'] == 'X'): ?>
    					<a href="./user_services.php?action=tasks_overview"><?php echo $this->_config[0]['vars']['navigation_user_mss']; ?>
</a>
    					<a href="./user_services.php?action=my_teams_calendar"><?php echo $this->_config[0]['vars']['navigation_title_user_services_myteamscalendar']; ?>
</a>
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
					
								<h2>
								<span><?php echo $this->_config[0]['vars']['navigation_title_user_services_leaverequest']; ?>
</span>
								</h2>
							</div>
							
								<form id="form" class="main" method="post" enctype="multipart/form-data" action="user_services.php?action=submit_absence_request" onsubmit="checkDate();">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "begda"><?php echo $this->_config[0]['vars']['dico_user_myservices_begda']; ?>
:</label><input type = "text" name = "begda" id="begda" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_begda']; ?>
" autocomplete="off" onclick='fPopCalendar("begda")'/></div>
											<div class="row"><label for = "endda"><?php echo $this->_config[0]['vars']['dico_user_myservices_endda']; ?>
:</label><input type = "text" name = "endda" id="endda" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_endda']; ?>
" autocomplete="off" onclick='fPopCalendar("endda")'/></div>
											<div class="row"><label for = "absencetype"><?php echo $this->_config[0]['vars']['dico_user_myservices_absencetype']; ?>
:</label>
												<select name = "absenceid" id="absenceid" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_absencetype']; ?>
" autocomplete="off" onchange="display_hours(this.options[this.selectedIndex].value);">
													<option value=""><?php echo $this->_config[0]['vars']['dico_user_myservices_absencechoice']; ?>
</option>
													<?php unset($this->_sections['absences']);
$this->_sections['absences']['name'] = 'absences';
$this->_sections['absences']['loop'] = is_array($_loop=$this->_tpl_vars['absences']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['absences']['show'] = true;
$this->_sections['absences']['max'] = $this->_sections['absences']['loop'];
$this->_sections['absences']['step'] = 1;
$this->_sections['absences']['start'] = $this->_sections['absences']['step'] > 0 ? 0 : $this->_sections['absences']['loop']-1;
if ($this->_sections['absences']['show']) {
    $this->_sections['absences']['total'] = $this->_sections['absences']['loop'];
    if ($this->_sections['absences']['total'] == 0)
        $this->_sections['absences']['show'] = false;
} else
    $this->_sections['absences']['total'] = 0;
if ($this->_sections['absences']['show']):

            for ($this->_sections['absences']['index'] = $this->_sections['absences']['start'], $this->_sections['absences']['iteration'] = 1;
                 $this->_sections['absences']['iteration'] <= $this->_sections['absences']['total'];
                 $this->_sections['absences']['index'] += $this->_sections['absences']['step'], $this->_sections['absences']['iteration']++):
$this->_sections['absences']['rownum'] = $this->_sections['absences']['iteration'];
$this->_sections['absences']['index_prev'] = $this->_sections['absences']['index'] - $this->_sections['absences']['step'];
$this->_sections['absences']['index_next'] = $this->_sections['absences']['index'] + $this->_sections['absences']['step'];
$this->_sections['absences']['first']      = ($this->_sections['absences']['iteration'] == 1);
$this->_sections['absences']['last']       = ($this->_sections['absences']['iteration'] == $this->_sections['absences']['total']);
?>
														<option value="<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
 - <?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['description']; ?>
</option>	
													<?php endfor; endif; ?>	
												</select>
											</div>
											<?php unset($this->_sections['absences']);
$this->_sections['absences']['name'] = 'absences';
$this->_sections['absences']['loop'] = is_array($_loop=$this->_tpl_vars['absences']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['absences']['show'] = true;
$this->_sections['absences']['max'] = $this->_sections['absences']['loop'];
$this->_sections['absences']['step'] = 1;
$this->_sections['absences']['start'] = $this->_sections['absences']['step'] > 0 ? 0 : $this->_sections['absences']['loop']-1;
if ($this->_sections['absences']['show']) {
    $this->_sections['absences']['total'] = $this->_sections['absences']['loop'];
    if ($this->_sections['absences']['total'] == 0)
        $this->_sections['absences']['show'] = false;
} else
    $this->_sections['absences']['total'] = 0;
if ($this->_sections['absences']['show']):

            for ($this->_sections['absences']['index'] = $this->_sections['absences']['start'], $this->_sections['absences']['iteration'] = 1;
                 $this->_sections['absences']['iteration'] <= $this->_sections['absences']['total'];
                 $this->_sections['absences']['index'] += $this->_sections['absences']['step'], $this->_sections['absences']['iteration']++):
$this->_sections['absences']['rownum'] = $this->_sections['absences']['iteration'];
$this->_sections['absences']['index_prev'] = $this->_sections['absences']['index'] - $this->_sections['absences']['step'];
$this->_sections['absences']['index_next'] = $this->_sections['absences']['index'] + $this->_sections['absences']['step'];
$this->_sections['absences']['first']      = ($this->_sections['absences']['iteration'] == 1);
$this->_sections['absences']['last']       = ($this->_sections['absences']['iteration'] == $this->_sections['absences']['total']);
?>
												<input type = "hidden" name = "type_<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
"     id="type_<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
"    value=<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['type']; ?>
>
												<input type = "hidden" name = "comment_<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
"  id="comment_<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['id']; ?>
" value=<?php echo $this->_tpl_vars['absences'][$this->_sections['absences']['index']]['comment']; ?>
>	
											<?php endfor; endif; ?>
											
											<div class="row" id="beghour" name="beghour" style="display:none"><label for = "beghr"><?php echo $this->_config[0]['vars']['dico_user_myservices_beghr']; ?>
:</label><input type = "text" name = "beghr" id="beghr" value="00:00" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_beghr']; ?>
"/></div>
											<div class="row" id="endhour" name="beghour" style="display:none"><label for = "endhr"><?php echo $this->_config[0]['vars']['dico_user_myservices_endhr']; ?>
:</label><input type = "text" name = "endhr" id="endhr" value="00:00" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_endhr']; ?>
"/></div>
											<div class="row" id="comment" name="comment" style="display:none"><label for = "endhr"><?php echo $this->_config[0]['vars']['dico_user_myservices_comment']; ?>
:</label><textarea name = "textcomment" id="textcomment" realname="<?php echo $this->_config[0]['vars']['dico_user_myservices_comment']; ?>
"></textarea></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
											</div>
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
						</div> 			
					</div> 	
					
				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
		
		<script language="javascript" type="text/javascript">			
			function display_hours(absenceid){ 
			
			var typename 	= "type_"+absenceid;
			var commentname = "comment_"+absenceid;
			
				if (document.getElementById(typename).value == \'H\'){
					document.getElementById("beghour").style.display = \'block\';
					document.getElementById("endhour").style.display = \'block\';
				}
				else{
					document.getElementById("beghour").style.display = \'none\';
					document.getElementById("endhour").style.display = \'none\';
				}
				
				if (document.getElementById(commentname).value == \'R\'){
					document.getElementById("comment").style.display = \'block\';
				}
				else{
					document.getElementById("comment").style.display = \'none\';
				}
			}
			
			$("#form").validate({
			rules: {
			    begda: 			"required",
			    endda: 			"required",
	    		absencetype : 	"required"
   			},
   			messages: {
				begda: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				endda: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				},
				absencetype: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_required']; ?>
<?php echo '"
 				}
			}
		});
			
			function checkDate(){ 
				var error = 0;
				if(document.getElementById("begda").value != \'\' && document.getElementById("endda").value != \'\'){
					if(document.getElementById("begda").value > document.getElementById("endda").value ){
						begda = document.getElementById("begda").value;
						endda = document.getElementById("endda").value;
						alert(begda.substr(8, 2)+\'.\'+begda.substr(5, 2)+\'.\'+begda.substr(0, 4)+\' > \'+endda.substr(8, 2)+\'.\'+endda.substr(5, 2)+\'.\'+endda.substr(0, 4)+\' ...\');
						document.getElementById("endda").value = \'\';
						error = 1;
					}
				}
				
				if(document.getElementById("beghr").value != \'\' && document.getElementById("endhr").value != \'\'){
					if(document.getElementById("beghr").value > document.getElementById("endhr").value ){
						beghr = document.getElementById("beghr").value;
						endhr = document.getElementById("endhr").value;
						alert(beghr+\' > \'+endhr+\' ...\');
						document.getElementById("endhr").value = \'00:00\';
						error = 1;
					}
				}
				
				if(error == 1)
					return false;
				else
					return true;	
			}
			
		</script> 
	'; ?>

	