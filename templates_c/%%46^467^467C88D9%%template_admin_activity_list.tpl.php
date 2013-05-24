<?php /* Smarty version 2.6.19, created on 2011-01-27 14:24:20
         compiled from template_admin_activity_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_datepicker' => 'yes','js_rico' => 'yes','js_addressbook' => 'yes')));
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
						
    				<a href="./admin_activity.php?action=day"><?php echo $this->_config[0]['vars']['dico_admin_activity_day']; ?>
</a>

					<span><?php echo $this->_config[0]['vars']['dico_admin_activity_list']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div id="messagecookie">
								
									<span id='activitylist_timer' class='ricoSessionTimer'></span><span id="activitylist_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="activitylist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:7%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_date']; ?>
</td>
												<td class="b" style="width:21%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_user_name']; ?>
</td>
												<td class="b" style="width:21%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_object']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_type']; ?>
</td>
												<td class="b" style="width:10%"><?php echo $this->_config[0]['vars']['dico_admin_activity_search_colum_action']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="addressbookBox">
																
										</div> 										
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
		
		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{type:\'datetime\',width:160, dateFmt:\'dd/mm/yyyy HH:mm:ss\'},{filterUI:\'t\',width:100},{filterUI:\'t\',width:100},{filterUI:\'t\',width:100},{filterUI:\'t\',width:400}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'activitylist\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	'; ?>

