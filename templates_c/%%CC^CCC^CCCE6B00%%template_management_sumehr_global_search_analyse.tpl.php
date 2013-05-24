<?php /* Smarty version 2.6.19, created on 2012-09-17 15:06:12
         compiled from template_management_sumehr_global_search_analyse.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_sumehr' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
		
		<?php if ($this->_tpl_vars['modules']['management_sumehr_adminstate'] == 3): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_sumehr_adminstate'] == 4): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<a href="./management_sumehr.php?action=search"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search_analyse']; ?>
</span> 

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
													<input type="text" name="patient_search" id="patient_search" realname="<?php echo $this->_config[0]['vars']['dico_sumehr_patient_search']; ?>
" onkeyup="javascript:sumehrCompleteSearchAnalyse('',this.value,'',$('#doctor_search').val());" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
											
											<fieldset>
										
												<div class="row">
													<label for="name"><?php echo $this->_config[0]['vars']['dico_sumehr_doctor_search']; ?>
:</label>
													<input type="text" name="doctor_search" id="doctor_search" realname="<?php echo $this->_config[0]['vars']['dico_sumehr_doctor_search']; ?>
" onkeyup="javascript:sumehrCompleteSearchAnalyse('',$('#patient_search').val(),'',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
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
												<td class="b" style="width:35%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_analyse_patient']; ?>
</td>
												<td class="b" style="width:20%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_analyse_date']; ?>
</td>
												<td class="b" style="width:35%"><?php echo $this->_config[0]['vars']['dico_sumehr_search_colum_analyse_doctor']; ?>
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