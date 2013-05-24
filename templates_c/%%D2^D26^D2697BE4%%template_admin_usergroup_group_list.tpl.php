<?php /* Smarty version 2.6.19, created on 2013-04-12 16:14:44
         compiled from template_admin_usergroup_group_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_workschedule' => 'yes','js_jquery_ui_171' => 'yes','js_jquery_autocomplete' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes','js_jqmodal' => 'yes','js_rico' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_admin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<span><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_liste']; ?>
</span>

    				<a href="./admin_grh.php?action=add_usergroup"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_add']; ?>
</a>
    				
    				<a href="./admin_grh.php?action=add_assignment"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_add']; ?>
</a>
    				
    				<a href="./admin_grh.php?action=list_assignment"><?php echo $this->_config[0]['vars']['navigation_title_admin_usergroup_assignment_list']; ?>
</a>
    				
				</div>
				
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='clientlist_timer'></span><span id="clientlist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="usergrouplist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="width:10%"><?php echo $this->_config[0]['vars']['dico_management_patient_search_colum_action']; ?>
</td>
												<td style="width:45%"><?php echo $this->_config[0]['vars']['dico_admin_usergroup_description']; ?>
</td>
												<td style="width:45%"><?php echo $this->_config[0]['vars']['dico_admin_usergroup_leader']; ?>
</td>
											</tr>
										</table>
									</div>
									
									<div class="table_body">
									
										<div id="usergroupBox">
																
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

	<div class="jqmWindow" id="confirmbox" name="confirmbox">
	
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
						<?php echo $this->_config[0]['vars']['dico_management_workschedule_confirm_delete_question']; ?>

						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteUserGroup(id);" class="butn_link" id="delete"><span><?php echo $this->_config[0]['vars']['dico_management_debt_button_delete']; ?>
</span></a>
							<a href="#" onclick="javascript:jQuery('#confirmbox').jqmHide();" class="butn_link" id="cancel"><span><?php echo $this->_config[0]['vars']['dico_management_debt_button_cancel']; ?>
</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	<?php echo '
	<script>

		jQuery(document).ready(function(){
		
			
			jQuery(\'#confirmbox\').jqm({
			});
	   		
  		});
  	</script>
	'; ?>


	<?php echo '
	<script type=\'text/javascript\'>
		
		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:45},{filterUI:\'t\',width:250}, {filterUI:\'t\',width:250}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'usergrouplist\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		
	</script>
	'; ?>
