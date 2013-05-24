<?php /* Smarty version 2.6.19, created on 2012-10-05 11:08:16
         compiled from template_admin_project_default.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery142' => 'yes','js_ajax' => 'yes','js_jquery_ui_171' => 'yes','js_google_visualization_api' => 'yes','js_fg_menu' => 'yes','js_timesheet' => 'no','js_jquery_date_parser' => 'yes','js_ui_dropdown' => 'yes','js_jquery_timesheet' => 'yes')));
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
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_menu_dashboard']; ?>
</span> 
					<a href="./admin_project.php?action=list_cost_center"><?php echo $this->_config[0]['vars']['dico_admin_project_cost_center_menu_list']; ?>
</a>
					<a href="./admin_project.php?action=list_project_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_task_menu_list']; ?>
</a>
					<a href="./admin_project.php?action=stat_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</a>
				</div>
			
				<div class="ViewPane">
				
					<div class="block_a">
									
						<div class="in">
										
							<div class="headline">
			
								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('timesheetdiv');"></a>
								<div class="clear_both"></div> 												
								<div style="position:relative;">
									<div class="win_tools">
										<h2>Timesheet</h2>
									</div>
								</div>
																			   
							</div>
										
							<div id="timesheetdiv">
								<div id="timesheet"></div>
							</div>			
							
						</div>
										
					</div>
								
				
																<div class="block_b" style="">
									
									<div class="in">
										
										<div class="headline">
			
											<a href="#" id="chartdiv_toggle" class="win_block" onclick = "toggleBlock('chartdiv');"></a>
												
											<div class="clear_both"></div> 												
											<div style="position:relative;">
												<div class="win_tools">
													<h2>Rapport : Heures prest&eacute;es</h2>
												</div>
											</div>
																			   
										</div>
										
										<div id="chartdiv">
											<div id="chart"></div>				
										</div>			
							
									</div>
										
								</div>


				</div>
					
			</div>

		</div>

	</div>
	
	<div id="watermark"></div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('calendar_week' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script type=\'text/javascript\'>
	
		jQuery(document).ready(function(){
		
			$(\'#chart\').timeSheetGoogleChart({
   				url: \'user_project.php?action=google_json\',
   				url_resource: \'user_project.php?action=resource_json\',
   				header: {
					day: true,
					week: true,
					month: true,
					trimestre: true,
					semestre: true,
					year:true,
					resource_selected:true
				},
   			});
   			

			$(\'#timesheet\').timeSheet({
   				url: \'user_project.php?action=timesheet_json\',
   				url_save: \'user_project.php?action=timesheet_add\',
   				editable : \'false\'
   			});
   			
		});
		 
	</script>
	
	<script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load(\'visualization\', \'1\', {\'packages\':[\'corechart\']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      //google.setOnLoadCallback(drawMouseoverVisualization);
      var barsVisualization;
  
  		function drawMouseoverVisualization(data) {
    		
    		barsVisualization = new google.visualization.ColumnChart(document.getElementById(\'chart_image\'));
      
	    	barsVisualization.draw(
	    		data, 
	    		{
	    			isStacked: true,
	    			width:810, 
            		height:400,
            		hAxis: {title: "Year"},
            		vAxis: {title: "Hours"},
            	}
            );
	  
	    	// Add our over/out handlers.
	    	google.visualization.events.addListener(barsVisualization, \'onmouseover\', barMouseOver);
	    	google.visualization.events.addListener(barsVisualization, \'onmouseout\', barMouseOut);
	
		  	function barMouseOver(e) {
	    		barsVisualization.setSelection([e]);
	  		}
	  
	  		function barMouseOut(e) {
	    		barsVisualization.setSelection([{\'row\': null, \'column\': null}]);
	  		}
    	}
    
    </script>
	'; ?>