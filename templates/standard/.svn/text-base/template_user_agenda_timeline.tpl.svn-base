{include file="template_header.tpl" js_jquery="yes" js_time_line="yes" js_jquery_datepicker="yes" js_agenda="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
	  				<a href="./user_agenda.php?action=day">{#dico_user_agenda_menu_day#}</a>
    				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
	  				<a href="./user_agenda.php?action=list">{#dico_user_agenda_menu_list#}</a>
	  				<a href="./user_agenda.php?action=fulllist">{#dico_user_agenda_menu_fulllist#}</a>
    				<span>{#dico_user_agenda_menu_timeline#}</span> 
	  				<a href="./user_agenda.php?action=schedule">{#dico_user_agenda_menu_schedule#}</a>
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
				</div>
				
				<div class="ViewPane">
				
				
				<div id="my-timeline" style="height: 450px; border: 1px solid #aaa"></div>
				
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" patient_search="no"}
	
	{include file="template_right.tpl" calendar="yes"}
	
	
	{literal}
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
    	       	 		start:    "{/literal}{$day}{literal} 06:00:00",
    	            	end:      "{/literal}{$day}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_1}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_1}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_2}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_2}{literal} 18:00:00 ",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_3}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_3}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_4}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_4}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_5}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_5}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day_6}{literal} 06:00:00",
    	            	end:      "{/literal}{$day_6}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day1}{literal} 06:00:00",
    	            	end:      "{/literal}{$day1}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day2}{literal} 06:00:00",
    	            	end:      "{/literal}{$day2}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day3}{literal} 06:00:00",
    	            	end:      "{/literal}{$day3}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day4}{literal} 06:00:00",
    	            	end:      "{/literal}{$day4}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day5}{literal} 06:00:00",
    	            	end:      "{/literal}{$day5}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	},
    	       	 	{
    	       	 		start:    "{/literal}{$day6}{literal} 06:00:00",
    	            	end:      "{/literal}{$day6}{literal} 18:00:00",
    	            	magnify:  5,
    	            	unit:     Timeline.DateTime.MINUTE,
	                    multiple: 15
    	        	}
    		    	],
				    eventSource:    eventSource,
				    trackHeight:    1.1,
				    trackGap:       0.2,
				    date:           "{/literal}{$day}{literal} 09:00:00",
		    	    width:          "70%", 
    			    intervalUnit:   Timeline.DateTime.HOUR, 
    			    intervalPixels: 30
			    }),
    			Timeline.createBandInfo({
	   				showEventText:  false,
			        trackHeight:    0.5,
    			    trackGap:       0.2,
   					eventSource:    eventSource,
			        date:           "{/literal}{$day}{literal} 09:00:00",
        			width:          "30%", 
        			intervalUnit:   Timeline.DateTime.DAY, 
        			intervalPixels: 80
    			})
  			];
  			
  			bandInfos[1].syncWith = 0;
			bandInfos[1].highlight = true;
			
           	bandInfos[0].decorators = [
            	new Timeline.SpanHighlightDecorator({
                	startDate:  "{/literal}{$day}{literal} 06:00:00",
                    endDate:    "{/literal}{$day}{literal} 18:00:00",
                    color:      "#FFC080",
                    opacity:    30,
                    startLabel: "{/literal}{#dico_user_agenda_morning#}{literal}",
                    endLabel:   "{/literal}{#dico_user_agenda_evening#}{literal}",
            	})
           	];
  		
			tl = Timeline.create(document.getElementById("my-timeline"), bandInfos);
			
			Timeline.loadXML("user_agenda_gestion.php", function(xml, url) { eventSource.loadXML(xml, url); });
		
  		
  		});
  	</script>
	{/literal}
	
	


