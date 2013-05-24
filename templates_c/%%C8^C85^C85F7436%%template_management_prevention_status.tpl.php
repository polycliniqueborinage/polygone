<?php /* Smarty version 2.6.19, created on 2012-10-09 16:00:53
         compiled from template_management_prevention_status.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_datepicker' => 'yes','js_prevention' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_status']; ?>
</span> 

    				<a href="./management_prevention.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list']; ?>
</a>

    				<a href="./management_prevention.php?action=list_deleted"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list_deleted']; ?>
</a>

    				<a href="./management_prevention.php?action=activation"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_activation']; ?>
</a>

    				<a href="./management_prevention.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</a>

    				<a href="./management_prevention.php?action=timeplot"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_timeplot']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="detail_toggle" class="win_block" onclick = "toggleBlock('detail');"><img src="./templates/standard/img/symbols/detail.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_management_prevention_submenu_status']; ?>
</span></a>
								</h2>
						
							</div>							
							
							
							<div id = "detail" class="projects">

								<div class="projectwrapper">
									
									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				
										<tr>

											<td>

													<div class="block">
													<table cellpadding="0" cellspacing="0" border="0">

				<colgroup>
					<col class="a" />
					<col class="b" />
				</colgroup>

				<thead><tr><th colspan="2"></th></tr></thead>
				<tfoot><tr><td colspan="2"></td></tr></tfoot>

                <tbody class="color-b">
				    <tr>
					   <td><strong><?php echo $this->_config[0]['vars']['dico_management_prevention_status_to_contact']; ?>
:</strong></td>
					   <td class="right"><?php echo $this->_tpl_vars['status']['to_contact']; ?>
</td>
				    </tr>
				</tbody>

                <tbody class="color-a">
					<tr>
						<td><strong><?php echo $this->_config[0]['vars']['dico_management_prevention_status_contacted']; ?>
:</strong></td>
						<td class="right"><?php echo $this->_tpl_vars['status']['contacted']; ?>
</td>
					</tr>
				</tbody>

				<tbody class="color-b">
					<tr>
						<td><strong><?php echo $this->_config[0]['vars']['dico_management_prevention_status_call_back']; ?>
:</strong></td>
						<td class="right"><?php echo $this->_tpl_vars['status']['call_back']; ?>
</td>
					</tr>
				</tbody>

				<tbody class="color-a">
					<tr>
						<td><strong><?php echo $this->_config[0]['vars']['dico_management_prevention_status_deleted']; ?>
:</strong></td>
						<td class="right"><?php echo $this->_tpl_vars['status']['deleted']; ?>
</td>
					</tr>
				</tbody>

				<tbody class="color-b">
					<tr>
						<td><strong><?php echo $this->_config[0]['vars']['dico_management_prevention_status_number_motif']; ?>
:</strong></td>
						<td class="right"><?php echo $this->_tpl_vars['status']['number_motif']; ?>
</td>
					</tr>
				</tbody>
				

			</table>


		</div> 
</td>
</tr>
</table>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('prevention_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	