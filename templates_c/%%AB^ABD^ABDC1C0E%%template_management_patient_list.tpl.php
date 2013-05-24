<?php /* Smarty version 2.6.19, created on 2013-02-08 13:42:13
         compiled from template_management_patient_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jqmodal' => 'yes','js_rico' => 'yes','js_patient' => 'yes')));
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
						
	  				<a href="./management_patient.php?action=search"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_search']; ?>
</a>

    				<a href="./management_patient.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_add']; ?>
</a>

					<span><?php echo $this->_config[0]['vars']['dico_management_patient_menu_list']; ?>
</span> 

				</div>
				
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='patientlist_timer'></span><span id="patientlist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="patientlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_action']; ?>
</td>
												<td class="b" style="width:17%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_familyname']; ?>
</td>
												<td class="b" style="width:18%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_firstname']; ?>
</td>
												<td class="b" style="width:18%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_birthday']; ?>
</td>
												<td class="b" style="width:18%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_titulaire']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_mutuelle']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_ct1_ct2']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_tp']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_matricule']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_privatephone']; ?>
</td>
												<td class="b" style="width:12%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_mobilephone']; ?>
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

	<div class="jqmWindow" id="viewbox">
	
	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
		
		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:50},{filterUI:\'t\',width:100},{filterUI:\'t\',width:100}, {filterUI:\'t\',width:90},{filterUI:\'t\',width:160},{filterUI:\'t\',width:50},{filterUI:\'t\',width:75},{width:50},{filterUI:\'t\',width:120},{filterUI:\'t\',width:130},{filterUI:\'t\',width:130}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'patientlist\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		jQuery(document).ready(function() {
		
			jQuery(\'#viewbox\').jqm({ });
		
		});
		
	</script>
	'; ?>
