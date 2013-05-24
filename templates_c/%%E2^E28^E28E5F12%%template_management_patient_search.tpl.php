<?php /* Smarty version 2.6.19, created on 2012-10-08 14:40:11
         compiled from template_management_patient_search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jqmodal' => 'yes','js_patient' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span><?php echo $this->_config[0]['vars']['dico_management_patient_menu_search']; ?>
</span> 

    				<a href="./management_patient.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_add']; ?>
</a>

	  				<a href="./management_patient.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_list']; ?>
</a>
 
				</div>
			
				<div class="ViewPane">
				
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2><img src="./templates/standard/img/symbols/search.png" alt="<?php echo $this->_config[0]['vars']['dico_management_patient_submenu_search']; ?>
" />
										<span><?php echo $this->_config[0]['vars']['dico_management_patient_submenu_search']; ?>
</span>
									</h2>
								</div>
								
								<div class="block_in_wrapper">

										<form class="main" method="post">
										
											<fieldset>
										
												<div class="row">
													<label for="name"><?php echo $this->_config[0]['vars']['dico_management_patient_search']; ?>
:</label>
													<input type="text" name="name" id="name" required="1" realname="<?php echo $this->_config[0]['vars']['dico_management_patient_search']; ?>
" onkeyup="javascript:patientCompleteSearch('',this.value);patientSimpleSearch('',this.value);" autocomplete="off" />
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_action']; ?>
</td>
												<td class="b" style="width:17%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_familyname']; ?>
</td>
												<td class="b" style="width:17%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_firstname']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_birthday']; ?>
</td>
												<td class="b" style="width:19%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_titulaire']; ?>
</td>
												<td class="b" style="width:13%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_privatephone']; ?>
</td>
												<td class="b" style="width:13%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_mobilephone']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="patientBox">
											
											
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array()));
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
						<?php echo $this->_config[0]['vars']['dico_management_patient_confirme_delete_question']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deletePatient(patient_id);" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_management_debt_button_delete']; ?>
</span></a>
							<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_management_debt_button_cancel']; ?>
</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
		

	<?php echo '
	<script type="text/javascript">
	$(document).ready(function() {
	
		$(\'#confirmbox\').jqm({
		});
		
	});
	</script>
	'; ?>
