<?php /* Smarty version 2.6.19, created on 2012-09-08 11:13:29
         compiled from template_user_sumehr_personal_search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_sumehr' => 'yes')));
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
						
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search']; ?>
</span> 
					<a href="./user_sumehr.php?action=module_analyse"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search_analyse']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name"><?php echo $this->_config[0]['vars']['dico_sumehr_patient_search']; ?>
:</label>
													<input type="text" name="patient" id="patient" realname="<?php echo $this->_config[0]['vars']['dico_sumehr_patient_search']; ?>
" onkeyup="javascript:sumehrCompleteSearchForUser(this.value,'personal');" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="tools"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_action']; ?>
</td>
												<td class="b" style="width:30%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_patient_familyname']; ?>
</td>
												<td class="b" style="width:30%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_patient_firstname']; ?>
</td>
												<td class="b" style="width:18%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_patient_birthdate']; ?>
</td>
												<td class="b" style="width:15%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_latest_date']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="search_box">
										
										</div> 										
									</div> 									
									<div class="clear_both"></div> 									
								</div>
			        		    
							</div> 						</div> 
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script>
	
  	</script>
	'; ?>
