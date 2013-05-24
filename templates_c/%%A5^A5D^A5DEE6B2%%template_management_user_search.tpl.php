<?php /* Smarty version 2.6.19, created on 2012-09-14 13:37:20
         compiled from template_management_user_search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_user' => 'yes')));
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
						
					<span><?php echo $this->_config[0]['vars']['dico_management_addressbook_menu_search']; ?>
</span> 
	  				<a href="./management_user.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_addressbook_menu_add']; ?>
</a>
	  				<a href="./management_user.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_addressbook_menu_list']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2><img src="./templates/standard/img/symbols/user.png" alt="<?php echo $this->_config[0]['vars']['ddico_management_user_submenu_search']; ?>
" />
										<span><?php echo $this->_config[0]['vars']['dico_management_user_submenu_search']; ?>
</span>
									</h2>
								</div>

								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name"><?php echo $this->_config[0]['vars']['dico_management_user_complete_search']; ?>
:</label>
													<input type="text" name="search" id="search" realname="<?php echo $this->_config[0]['vars']['dico_management_user_complete_search']; ?>
" onkeyup="javascript:userCompleteSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%"><?php echo $this->_config[0]['vars']['dico_management_user_search_colum_action']; ?>
</td>
												<td class="b" style="width:29%"><?php echo $this->_config[0]['vars']['dico_management_user_search_colum_login']; ?>
</td>
												<td class="b" style="width:30%"><?php echo $this->_config[0]['vars']['dico_management_user_search_colum_familyname']; ?>
</td>
												<td class="b" style="width:30%"><?php echo $this->_config[0]['vars']['dico_management_user_search_colum_firstname']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="neutral">

										<div class="block" id="milestone">

											<div class="nosmooth" id="userBox">
											
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('user_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>