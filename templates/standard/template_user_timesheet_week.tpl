{include file="template_header.tpl" js_jquery142="yes" js_ajax="yes" js_jquery_ui_171="yes" js_google_visualization_api="yes" js_fg_menu="yes" js_timesheet="no" js_jquery_date_parser="yes" js_ui_dropdown="yes" js_jquery_timesheet="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					<span>Timesheet</span>
				</div>
			
				<div class="ViewPane">
				
					<div class="block_a">
									
						<div class="in">
										
							<div class="headline">
			
								<a href="#" id="agenda_toggle" class="win_block" onclick = "toggleBlock('timesheetdiv');"></a>
								<div class="clear_both"></div> {*required ... do not delete this row*}
												
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
								
				
								{*GRAPH1*}
								<div class="block_b" style="">
									
									<div class="in">
										
										<div class="headline">
			
											<a href="#" id="chartdiv_toggle" class="win_block" onclick = "toggleBlock('chartdiv');"></a>
												
											<div class="clear_both"></div> {*required ... do not delete this row*}
												
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
	
	{include file="template_left.tpl"}
	
	{include file="template_right.tpl" calendar_week="no"}
	
	{literal}
	<script type='text/javascript'>
	
		jQuery(document).ready(function(){
		
			$('#chart').timeSheetGoogleChart({
   				url: 'user_project.php?action=google_json',
   				url_resource: 'user_project.php?action=resource_json',
   				header: {
					day: true,
					week: true,
					month: true,
					trimestre: false,
					semestre: false,
					year:false,
					resource_selected:false
				},
   			});
   			

			$('#timesheet').timeSheet({
   				url: 'user_project.php?action=timesheet_json',
   				url_save: 'user_project.php?action=timesheet_add',
   				editable : 'true'
   			});
   			
   			
		});
		 
	</script>
	
	<script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1', {'packages':['corechart']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      //google.setOnLoadCallback(drawMouseoverVisualization);
      var barsVisualization;
  
  		function drawMouseoverVisualization(data) {
    		
    		barsVisualization = new google.visualization.ColumnChart(document.getElementById('chart_image'));
      
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
	    	google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
	    	google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);
	
		  	function barMouseOver(e) {
	    		barsVisualization.setSelection([e]);
	  		}
	  
	  		function barMouseOut(e) {
	    		barsVisualization.setSelection([{'row': null, 'column': null}]);
	  		}
    	}
    
    </script>
	{/literal}	
	
	 