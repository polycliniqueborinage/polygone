<?php /* Smarty version 2.6.19, created on 2013-01-30 20:44:20
         compiled from template_user_agenda_timeline.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_time_line' => 'yes','js_jquery_datepicker' => 'yes','js_agenda' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_user.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
	  				<a href="./user_agenda.php?action=day"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_day']; ?>
</a>
    				<a href="./user_agenda.php?action=week"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_week']; ?>
</a>
	  				<a href="./user_agenda.php?action=list"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_list']; ?>
</a>
	  				<a href="./user_agenda.php?action=fulllist"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_fulllist']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_timeline']; ?>
</span> 
	  				<a href="./user_agenda.php?action=schedule"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_schedule']; ?>
</a>
	  				<a href="./user_agenda.php?action=task_add"><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_task_add']; ?>
</a>
				</div>
				
				<div class="ViewPane">
				
				
				<div id="my-timeline" style="height: 450px; border: 1px solid #aaa"></div>
				
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('patient_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('calendar' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	<?php echo '
	<script>
	
		var resizeTimerID = null;
    	    function onResize() {
    	        if (resizeTimerID == null) {
        	        resizeTimerID = window.setTimeout(function() {
            	        resizeTimerID = null;
            	        tl.layout();
            	    }, 500);
            	}
        }
		
		
		$(document).ready(function(){
			
			var eventSource = new Timeline.DefaultEventSource();
				
			var bandInfos = [
			
			Timeline.createHotZoneBandInfo({
		        zones: [
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_1']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_1']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_2']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_2']; ?>
<?php echo ' 18:00:00 ",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_3']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_3']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_4']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_4']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_5']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_5']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day_6']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day_6']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day1']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day1']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day2']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day2']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day3']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day3']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day4']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day4']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day5']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day5']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "'; ?>
<?php echo $this->_tpl_vars['day6']; ?>
<?php echo ' 06:00:00",
    	            	end:      "'; ?>
<?php echo $this->_tpl_vars['day6']; ?>
<?php echo ' 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	}
    		    	],
				    eventSource:    eventSource,
				    trackHeight:    1.1,
				    trackGap:       0.2,
				    date:           "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 09:00:00",
		    	    width:          "70%", 
    			    intervalUnit:   Timeline.DateTime.HOUR, 
    			    intervalPixels: 30
			    }),
    			Timeline.createBandInfo({
	   				showEventText:  false,
			        trackHeight:    0.5,
    			    trackGap:       0.2,
   					eventSource:    eventSource,
			        date:           "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 09:00:00",
        			width:          "30%", 
        			intervalUnit:   Timeline.DateTime.DAY, 
        			intervalPixels: 80
    			})
  			];
  			
  			bandInfos[1].syncWith = 0;
			bandInfos[1].highlight = true;
			
           	bandInfos[0].decorators = [
            	new Timeline.SpanHighlightDecorator({
                	startDate:  "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 06:00:00",
                    endDate:    "'; ?>
<?php echo $this->_tpl_vars['day']; ?>
<?php echo ' 18:00:00",
                    color:      "#FFC080",
                    opacity:    30,
                    startLabel: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_agenda_morning']; ?>
<?php echo '",
                    endLabel:   "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_agenda_evening']; ?>
<?php echo '",
            	})
           	];
  		
			tl = Timeline.create(document.getElementById("my-timeline"), bandInfos);
			
			Timeline.loadXML("user_agenda_gestion.php", function(xml, url) { eventSource.loadXML(xml, url); });
		
  		
  		});
  	</script>
	'; ?>

	
	

