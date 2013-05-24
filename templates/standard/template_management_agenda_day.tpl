{include file="template_header.tpl" jsload2="calendar" jsload = "ajax" jsload3 = "lightbox" stage = "index"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
   
    				
						
				</div>
			
				<div class="ViewPane">
				
				MENU	

				</div>
					
				<div id="calendarSideBar">
  					<div id="cal1Container"></div>
  					<div id="textContainer"><?=$textComment?></div>
				</div>
					
			</div>

		</div>

	</div>`
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div id="left">
		<table id="left-drawer" cellpadding="0" cellspacing="0">
	    	<tr>
				<!-- CONTENT -->
    	    	<td class="drawer-content">
    	    	
					<br/>
					
					<div id="footer">
						<p>targoo@gmail.com bmangel@gmail.com</p>
						<br/>
						<img src='../images/96x96/appointment.png'>
 					</div>
				</td>
  			    	
				<td class="drawer-handle" onclick="toggleSidebars(); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
				
      		</tr>
		</table>
	</div>
	
	<div id="right" class ="content_right">

		<div class="calender_wrapper">
			<div id = "calendar"></div>
			<div class="clock">
				<span id = "digitalclock"></span>
			</div>
		</div>
		<br /><br/>
		<div class="clear_both_b"></div>
		
		<div class="right_in">
		<h2>{#usersonline#}</h2>
		<div id = "onlinelist"></div>
		</div>
		
		<div class="clear_both_b"></div>
		
		<div class="right_in">
		<h2 onclick="$('query').focus();">{#search#}<span id="indicator1" style="display:none;"><img src="templates/standard/img/symbols/indicator_arrows.gif" alt="{#searching#}" /></span></h2>
		</div>
		<form id = "search" class = "main" style="clear:both;" method = "get" action = "managesearch.php" {literal} onsubmit="return validateStandard(this,'input_error');"{/literal}>
		<fieldset>
		<div class = "row">
		<input type="text" class = "text" id="query" name="query" /></div>
		
		<div id="choices"></div>
		<input type = "hidden" name = "action" value = "search" />
		</fieldset>
		<div class="butn"><button type="submit">{#gosearch#}</button></div>
		</form>
		
		
		{literal}
		  <script type = "text/javascript">
		  new Ajax.Autocompleter('query', 'choices', 'managesearch.php?action=ajaxsearch', {paramName:'query',minChars: 2,indicator: 'indicator1'});
		  calctime();
		   		addContentLoadListener( function() {
				var cal = 	new CalendarJS();
					cal.dayname = {/literal}["{#monday#}","{#tuesday#}","{#wednesday#}","{#thursday#}","{#friday#}","{#saturday#}","{#sunday#}"];
					cal.monthname = ["{#january#}","{#february#}","{#march#}","{#april#}","{#may#}","{#june#}","{#july#}","{#august#}","{#september#}","{#october#}","{#november#}","{#december#}"];
					cal.tooltip = ["{#prevmonth#}","{#nextmonth#}"{literal}];
					cal.init("calendar");
			} );
		
			 var on = new Ajax.PeriodicalUpdater("onlinelist","manageuser.php?action=onlinelist",{method:'get',evalScripts:true,frequency:35});
			</script>
		{/literal}

	</div>

{include file="footer.tpl"}