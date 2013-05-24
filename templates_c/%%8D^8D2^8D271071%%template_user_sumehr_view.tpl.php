<?php /* Smarty version 2.6.19, created on 2012-09-10 08:27:04
         compiled from template_user_sumehr_view.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_jqmodal' => 'yes','js_jquery_prettyphoto' => 'no','js_jquery_prettyphoto3' => 'yes','js_rico' => 'yes','js_sumehr' => 'yes','js_protocol' => 'yes')));
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

    				<a href="./user_sumehr.php?action=search"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_view']; ?>
</span>
					<a href="./user_sumehr.php?action=module_analyse"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search_analyse']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'saved'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_systemmsg_saved']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/protocol.png" alt=""/><?php echo $this->_config[0]['vars']['dico_systemmsg_edited']; ?>
</span>
						<?php endif; ?>
					</div>
					
					<?php $_from = $this->_tpl_vars['sumehrs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sumehr']):
        $this->_foreach['outer']['iteration']++;
?>
					<div class="block_a" >
					
						<div class="in">
			
							<div class="headline">
								<h2>
																			<a href="javascript:void(0);" class="win_block" id="sumehr_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
_toggle" onclick = "toggleBlock('sumehr_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
');">
																		<img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['dico_sumehr_submenu_view']; ?>
 <?php echo $this->_tpl_vars['sumehr']['0']['user_firstname']; ?>
 <?php echo $this->_tpl_vars['sumehr']['0']['user_familyname']; ?>
 <?php echo $this->_config[0]['vars']['dico_sumehr_submenu_view_and']; ?>
 <?php echo $this->_tpl_vars['sumehr']['0']['patient_firstname']; ?>
 <?php echo $this->_tpl_vars['sumehr']['0']['patient_familyname']; ?>
</span>
									</a>
								</h2>
							</div>
							
															<div class="block" id="sumehr_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
" style="">
														
								<div id="tab_content_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
">
									<ul>
										<li>
											<a href="#fragment_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
"><span><?php echo $this->_config[0]['vars']['dico_sumehr_management_subtab_general']; ?>
</span></a>
										</li>
									</ul>

									<div id="fragment_<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
" class="block_in_wrapper">
									
										<?php $_from = $this->_tpl_vars['sumehr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
											<div class = "protocol" style = "">
			
												<div class="block_in_wrapper">
			
													<h3><?php echo $this->_tpl_vars['item']['datetime']; ?>

													<?php $_from = $this->_tpl_vars['item']['permissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
														<?php echo $this->_tpl_vars['permission']['name']; ?>

													<?php endforeach; endif; unset($_from); ?>
													</h3>
													
													<?php echo $this->_tpl_vars['item']['sumehr_report_text_short']; ?>

													
													<ul>
													<?php $_from = $this->_tpl_vars['item']['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
														<li><img alt='' src='./templates/standard/images/butn-<?php echo $this->_tpl_vars['file']['extension']; ?>
-hover.png'/> <a target='_blank' href='user_sumehr.php?action=download_file&key=<?php echo $this->_tpl_vars['file']['key']; ?>
&patient_id=<?php echo $this->_tpl_vars['item']['patient_id']; ?>
&user_id=<?php echo $this->_tpl_vars['item']['user_id']; ?>
'><?php echo $this->_tpl_vars['file']['name']; ?>
 (<?php echo $this->_tpl_vars['file']['size']; ?>
Ko)</a></li>
													<?php endforeach; endif; unset($_from); ?>
													</ul>
													
													<br/>

													<?php if ($this->_tpl_vars['item']['datetime'] != ""): ?>
														<a href="#" class="butn_link" onclick="javascript:loadtabFromUser(<?php echo $this->_tpl_vars['sumehr']['0']['patient_id']; ?>
,<?php echo $this->_tpl_vars['sumehr']['0']['user_id']; ?>
,'<?php echo $this->_tpl_vars['item']['sumehr_report_id']; ?>
','<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
','<?php echo $this->_tpl_vars['item']['datetime']; ?>
');return false;"><span><?php echo $this->_config[0]['vars']['dico_button_view']; ?>
</span></a>
														<?php if ($this->_tpl_vars['sumehr']['0']['user_id'] == $this->_tpl_vars['user_id']): ?>
														<a href="user_sumehr.php?action=edit&patient_id=<?php echo $this->_tpl_vars['item']['patient_id']; ?>
&report_id=<?php echo $this->_tpl_vars['item']['sumehr_report_id']; ?>
" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_button_edit']; ?>
</span></a>
														<?php endif; ?>
														<br/>
													<?php endif; ?>
													
												</div> 			
											</div>	
									  	<?php endforeach; endif; unset($_from); ?>
											
										<div class="clear_both"></div> 			
																				<a href="user_sumehr.php?action=edit&patient_id=<?php echo $this->_tpl_vars['sumehr']['0']['patient_id']; ?>
" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_button_add_report']; ?>
</span></a>
																				
									</div>
									
								</div>

							</div>
							
					
						</div> 					
					</div> 				
					<?php endforeach; endif; unset($_from); ?>
					
					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/protocol.png" alt="" />
										<span id='sumehrlist_timer'></span><span id="sumehrlist_bookmark">&nbsp;</span>
									</a>
								</h2>
								<a href="javascript:void(0);" style="float:right">
									<img src="./templates/standard/img/symbols/print.png" alt="" />
								</a>
							</div>
								
							<div id="messagecookie">
								
								<div class="table_head">
									
									<table id="sumehrlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td class="b" style="width:15%">#</td>
											<td class="b" style="width:15%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_user']; ?>
</td>
											<td class="b" style="width:15%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_doctor']; ?>
</td>
											<td class="b" style="width:15%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_protocol_date']; ?>
</td>
											<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_export']; ?>
</td>
										</tr>
									</table>
									
								</div>
					
								<div class="table_body">
									
									<div id="protocolBox">
																
									</div> 										
								</div> 									
								<div class="clear_both"></div> 									
							</div>
			        		    
						</div> 					
					</div> 				
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div class="jqmWindow" id="confirmbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1><?php echo $this->_config[0]['vars']['dico_general_delete']; ?>
</h1>
  			</div>
  		
		</div>
			  
		<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="detail" style="display:inline">
						<?php echo $this->_config[0]['vars']['dico_sumehr_confirme_delete_question']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteSumehrReport()" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_button_delete']; ?>
</span></a>
							<a href="#" onclick="javascript:jQuery('#confirmbox').jqmHide();return false;" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_button_cancel']; ?>
</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
	
		jQuery(document).ready(function(){
		
			'; ?>

    		<?php $_from = $this->_tpl_vars['sumehrs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sumehr']):
        $this->_foreach['outer']['iteration']++;
?>
    		<?php echo '
    		jQuery("#tab_content_'; ?>
<?php echo $this->_tpl_vars['sumehr']['0']['sumehr_report_id']; ?>
<?php echo '").tabs();
			'; ?>

			<?php endforeach; endif; unset($_from); ?>
			<?php echo '
			
			jQuery("#confirmbox").jqm({});
		});
		
		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		
		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     
    			columnSpecs:  [{width:50},{filterUI:\'t\',width:200},{filterUI:\'t\',width:200},{filterUI:\'t\',width:130},{width:130}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'sumehrlist\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		 
	</script>
	'; ?>


		