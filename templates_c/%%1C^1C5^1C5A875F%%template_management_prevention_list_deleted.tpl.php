<?php /* Smarty version 2.6.19, created on 2013-04-12 09:46:11
         compiled from template_management_prevention_list_deleted.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_common' => 'yes','js_rico' => 'yes','js_prevention' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="print">
	</div>
	

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

					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list_deleted']; ?>
</span> 

    				<a href="./management_prevention.php?action=activation"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_activation']; ?>
</a>

    				<a href="./management_prevention.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</a>

    				<a href="./management_prevention.php?action=timeplot"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_timeplot']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'delete'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_prevention_contact_deleted']; ?>
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
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/flow.png" alt="" />
										<span id='preventionlistdeleted_timer'></span><span id="preventionlistdeleted_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>
								
								<div id="useredit">
								
									<div class="table_head">
										<table id="preventionlistdeleted" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_familyname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_firstname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_address']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_private_phone']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_mobile_phone']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_patient_mail']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_modif_description']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_management_prevention_colum_modif_date']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										
									</div> 									
									<div class="clear_both"></div> 									
								</div>
			        		    
							</div> 						</div> 					

				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
	
		var id_list = "";
		
		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{filterUI:\'t\',width:100},{filterUI:\'t\',width:100},{filterUI:\'t\',width:300},{width:90},{width:90},{width:50},{filterUI:\'t\',width:150},{filterUI:\'t\',width:200}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'preventionlistdeleted\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	'; ?>

