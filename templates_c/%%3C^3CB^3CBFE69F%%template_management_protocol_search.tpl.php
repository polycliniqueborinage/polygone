<?php /* Smarty version 2.6.19, created on 2012-09-08 12:10:06
         compiled from template_management_protocol_search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jqmodal' => 'yes','js_protocol' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
		
		<?php if ($this->_tpl_vars['modules']['management_protocol_adminstate'] == 3): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_protocol_adminstate'] == 4): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_search']; ?>
</span> 

    				<a href="./management_protocol.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_add']; ?>
</a>

	  				<a href="./management_protocol.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_protocol_menu_list']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name"><?php echo $this->_config[0]['vars']['dico_management_protocol_complete_search']; ?>
:</label>
													<input type="text" name="search" id="search" realname="<?php echo $this->_config[0]['vars']['dico_management_protocol_complete_search']; ?>
" onkeyup="javascript:protocolCompleteSearchForManager('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="width:2%"></td>
												<td class="tools"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_action']; ?>
</td>
												<td style="width:20%"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_patient']; ?>
</td>
												<td style="width:20%"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_user']; ?>
</td>
												<td style="width:20%"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_addressbook']; ?>
</td>
												<td style="width:8%"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_date']; ?>
</td>
												<td style="width:10%"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_attachment']; ?>
</td>
												<td class="tools"><?php echo $this->_config[0]['vars']['dico_management_protocol_search_colum_export']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="neutral">

										<div class="block">

											<div class="nosmooth" id="protocolBox">
											
											</div>

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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('medecin_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
						<?php echo $this->_config[0]['vars']['dico_management_protocol_confirme_delete_question']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteProtocol();" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_management_protocol_button_delete']; ?>
</span></a>
							<a href="#" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_management_protocol_button_cancel']; ?>
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
