<div id="right">

	{if $planning == "yes"}
	
					<div id="calendar_list">
					
						<div color1="2952a3" color2="5a94ce" id="color_block_1" class="calendar-item colorsel" onclick="activeColorBlock('color_block_1')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #2952a3;"></div>
								<div class="control"></div>
							</div>
							<div class="title">blue</div>
						</div>
						
						<div color1="E51717" color2="e35353" id="color_block_2" class="calendar-item" onclick="activeColorBlock('color_block_2')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #E51717;"></div>
								<div class="control"></div>
							</div>
							<div class="title">red</div>
						</div>

						<div color1="2ca10b" color2="80d369" id="color_block_3" class="calendar-item" onclick="activeColorBlock('color_block_3')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #2ca10b;"></div>
								<div class="control"></div>
							</div>
							<div class="title">green</div>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select name = "pixels_per_slot" id = "pixels_per_slot" onchange="javascript:changeWeek(0);"/>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "20">petit</option>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "40">moyen</option>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "80">grand</option>
							</select>
						</div>

						
					</div>
					<br/>
	{/if}

	{if $calendar_day == "yes"}
	<div class="content-right-in">
		<h2><a id="mycaltoggle" class="win-up" href="javascript:blindtoggle('mycal_mini');toggleClass('mycaltoggle','win-up','win-down');">calendar</a></h2>
		<div id="mycal_mini" class="cal"></div>
				{literal}
				<script type = "text/javascript">
					$(document).ready(function() {
						$('#mycal_mini').datepicker({
							inline : true,
							changeFirstDay: false,
							numberOfMonths: 2,
							prevText: '{/literal}{#dico_general_calendar_previous#}{literal}',
							nextText: '{/literal}{#dico_general_calendar_next#}{literal}',
							monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
							monthNames: ['{/literal}{#dico_general_calendar_january#}{literal}', '{/literal}{#dico_general_calendar_february#}{literal}', '{/literal}{#dico_general_calendar_march#}{literal}', '{/literal}{#dico_general_calendar_april#}{literal}', '{/literal}{#dico_general_calendar_may#}{literal}', '{/literal}{#dico_general_calendar_june#}{literal}', '{/literal}{#dico_general_calendar_july#}{literal}', '{/literal}{#dico_general_calendar_august#}{literal}', '{/literal}{#dico_general_calendar_september#}{literal}', '{/literal}{#dico_general_calendar_october#}{literal}', '{/literal}{#dico_general_calendar_november#}{literal}', '{/literal}{#dico_general_calendar_december#}{literal}'],
							dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
							dateFormat: 'yy-mm-dd',
							onSelect : function(date) {try{changeDay(date,'calendar_day');}catch(err){};},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			{/literal}
	</div>
	
	<div class="clear_both_b"></div>
	{/if}	
	
	
	{if $calendar_week == "yes"}
	<div class="content-right-in">
		<h2><a id="mycaltoggle" class="win-up" href="javascript:blindtoggle('mycal_mini');toggleClass('mycaltoggle','win-up','win-down');">calendar</a></h2>
		<div id="mycal_mini" class="cal"></div>
				{literal}
				<script type = "text/javascript">
					$(document).ready(function() {
						$('#mycal_mini').datepicker({
							inline : true,
							changeFirstDay: false,
							numberOfMonths: 2,
							prevText: '{/literal}{#dico_general_calendar_previous#}{literal}',
							nextText: '{/literal}{#dico_general_calendar_next#}{literal}',
							monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
							monthNames: ['{/literal}{#dico_general_calendar_january#}{literal}', '{/literal}{#dico_general_calendar_february#}{literal}', '{/literal}{#dico_general_calendar_march#}{literal}', '{/literal}{#dico_general_calendar_april#}{literal}', '{/literal}{#dico_general_calendar_may#}{literal}', '{/literal}{#dico_general_calendar_june#}{literal}', '{/literal}{#dico_general_calendar_july#}{literal}', '{/literal}{#dico_general_calendar_august#}{literal}', '{/literal}{#dico_general_calendar_september#}{literal}', '{/literal}{#dico_general_calendar_october#}{literal}', '{/literal}{#dico_general_calendar_november#}{literal}', '{/literal}{#dico_general_calendar_december#}{literal}'],
							dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
							dateFormat: 'yy-mm-dd',
							onSelect : function(date) {try{changeDay(date,'calendar_week');}catch(err){};},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			{/literal}
	</div>
	
	<div class="clear_both_b"></div>
	{/if}
		
		
	{if $calendar_light == "yes"}
	<div class="content-right-in">
		<h2><a id="mycaltoggle" class="win-up" href="javascript:blindtoggle('mycal_mini');toggleClass('mycaltoggle','win-up','win-down');">calendar</a></h2>
		<div id="mycal_mini" class="cal"></div>
				{literal}
				<script type = "text/javascript">
					$(document).ready(function() {
						$('#mycal_mini').datepicker({
							changeMonth: false,
							changeYear: false,
							prevText: '{/literal}{#dico_general_calendar_previous#}{literal}',
							nextText: '{/literal}{#dico_general_calendar_next#}{literal}',
							monthNames: ['{/literal}{#dico_general_calendar_january#}{literal}', '{/literal}{#dico_general_calendar_february#}{literal}', '{/literal}{#dico_general_calendar_march#}{literal}', '{/literal}{#dico_general_calendar_april#}{literal}', '{/literal}{#dico_general_calendar_may#}{literal}', '{/literal}{#dico_general_calendar_june#}{literal}', '{/literal}{#dico_general_calendar_july#}{literal}', '{/literal}{#dico_general_calendar_august#}{literal}', '{/literal}{#dico_general_calendar_september#}{literal}', '{/literal}{#dico_general_calendar_october#}{literal}', '{/literal}{#dico_general_calendar_november#}{literal}', '{/literal}{#dico_general_calendar_december#}{literal}'],
							monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
							dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
							dateFormat: 'yy-mm-dd'
						});
					});
				</script>
			{/literal}
	</div>
	{/if}	

	
	
	
		
	{if $useronline == "yes"}
	<div class="right_in">
			<h2>{#general_usersonline#}</h2>
			<div id = "onlinelist">
				<ul>
				{section name=onlinelist loop=$onlinelist}
					<li><a title="{$onlinelist[onlinelist].familyname} {$onlinelist[onlinelist].firstname}  " href = "#">{$onlinelist[onlinelist].name}</a></li>
				{/section}
				</ul>
			</div>
	</div>
		
	<div class="clear_both_b"></div>
	{/if}	
	
	
	{if $chat == "yes"}
	<div class="right_in">
		<h2>{#general_chat#}</h2>
		<div>
			<ul id="chat-resume">
			</ul>
		</div>
		<form id="daddy-shoutbox-form" action="include/js/shoutbox/jquery-shoutbox/daddy-shoutbox.php?action=add" method="post"> 
	    <input type="hidden" name="nickname" value="{$username}" />
	    <input type="text" name="message" />
	    <input type="submit" value="Submit" />
	    <span id="daddy-shoutbox-response"></span>
	    </form>
			
	</div>
	
	<div class="right_in">
		<div id="daddy-shoutbox">
	        <div id="daddy-shoutbox-list"></div>
        </div>
	</div>
	
	{literal}
	<script type="text/javascript">
        var count = 1;
        var files = 'include/js/shoutbox/jquery-shoutbox/';
        var lastTime = 0;
        
        function prepare(response) {
          var d = new Date();
          count++;
          d.setTime(response.time*1000);
          var mytime = d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
          var string = '<div class="shoutbox-list" id="list-'+count+'">'
              + '<span class="shoutbox-list-time">'+mytime+'</span>'
              + '<span class="shoutbox-list-nick">'+response.nickname+':</span>'
              + '<span class="shoutbox-list-message">'+response.message+'</span>'
              +'</div>';
          
          return string;
        }
        
        function success(response, status)  { 
          if(status == 'success') {
            lastTime = response.time;
            $('#daddy-shoutbox-response').html('<img src="'+files+'images/accept.png" />');
            $('#daddy-shoutbox-list').prepend(prepare(response));
            $('input[@name=message]').attr('value', '').focus();
            $('#list-'+count).fadeIn('slow');
            timeoutID = setTimeout(refresh, 3000);
          }
        }
        
        function validate(formData, jqForm, options) {
          for (var i=0; i < formData.length; i++) { 
              if (!formData[i].value) {
                  alert('Please fill in all the fields'); 
                  $('input[@name='+formData[i].name+']').css('background', 'red');
                  return false; 
              } 
          } 
          $('#daddy-shoutbox-response').html('<img src="'+files+'images/loader.gif" />');
          clearTimeout(timeoutID);
        }

        function refresh() {
          $.getJSON(files+"daddy-shoutbox.php?action=view&time="+lastTime, function(json) {
            if(json.length) {
              for(i=0; i < json.length; i++) {
                $('#daddy-shoutbox-list').prepend(prepare(json[i]));
                $('#list-' + count).fadeIn('slow');
              }
              var j = i-1;
              lastTime = json[j].time;
            }
            //alert(lastTime);
          });
          timeoutID = setTimeout(refresh, 3000);
        }
        
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            var options = { 
              dataType:       'json',
              beforeSubmit:   validate,
              success:        success
            }; 
            $('#daddy-shoutbox-form').ajaxForm(options);
            timeoutID = setTimeout(refresh, 100);
        });
  	</script>
	{/literal}	

	{/if}	
	
	
</div>

