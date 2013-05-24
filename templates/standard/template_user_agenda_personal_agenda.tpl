{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_full_agenda="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<span>{#dico_user_agenda_menu_day#}</span>
				</div>
				
				<div id="calendar">
				</div>
					
			</div>

		</div>

	</div>
	
	<div id="left">
		
		<table id="left-drawer" cellpadding="0" cellspacing="0" style="width:100%;">
	    	<tr>
				<!-- CONTENT -->
    	    	<td id="left-drawer-menu" class="drawer-content">
    	    	
					<div id="calendar_list">
					
						<!-- div color1="2952a3" color2="5a94ce" id="color_block_1" class="calendar-item colorsel" onclick="$('#calendar').fullCalendar('next');">
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
						</div-->
						
						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select id = "slotminutes" style="width: 210px;" width="210" onchange="javascript:$('#calendar').fullCalendar('destroy');init();"/>
								<option {if $user.agenda_slotminutes == "1"}selected="selected"{/if} value="1">1 minute</option>
								<option {if $user.agenda_slotminutes == "5"}selected="selected"{/if} value="5">5 minutes</option>
								<option {if $user.agenda_slotminutes == "10"}selected="selected"{/if} value="10">10 minutes</option>
								<option {if $user.agenda_slotminutes == "15"}selected="selected"{/if} value="15">15 minutes</option>
								<option {if $user.agenda_slotminutes == "20"}selected="selected"{/if} value="20">20 minutes</option>
								<option {if $user.agenda_slotminutes == "30"}selected="selected"{/if} value="30">30 minutes</option>
								<option {if $user.agenda_slotminutes == "60"}selected="selected"{/if} value="60">60 minutes</option>
								<option {if $user.agenda_slotminutes == "120"}selected="selected"{/if} value="120">120 minutes</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select id = "mintime" style="width: 210px;" width="210" onchange="javascript:$('#calendar').fullCalendar('destroy');init();"/>
								<option {if $user.agenda_mintime == "0"}selected="selected"{/if} value="0">0:00</option>
								<option {if $user.agenda_mintime == "1"}selected="selected"{/if} value="1">1:00</option>
								<option {if $user.agenda_mintime == "2"}selected="selected"{/if} value="2">2:00</option>
								<option {if $user.agenda_mintime == "3"}selected="selected"{/if} value="3">3:00</option>
								<option {if $user.agenda_mintime == "4"}selected="selected"{/if} value="4">4:00</option>
								<option {if $user.agenda_mintime == "5"}selected="selected"{/if} value="5">5:00</option>
								<option {if $user.agenda_mintime == "6"}selected="selected"{/if} value="6">6:00</option>
								<option {if $user.agenda_mintime == "7"}selected="selected"{/if} value="7">7:00</option>
								<option {if $user.agenda_mintime == "8"}selected="selected"{/if} value="8">8:00</option>
								<option {if $user.agenda_mintime == "9"}selected="selected"{/if} value="9">9:00</option>
								<option {if $user.agenda_mintime == "10"}selected="selected"{/if} value="10">10:00</option>
								<option {if $user.agenda_mintime == "11"}selected="selected"{/if} value="11">11:00</option>
								<option {if $user.agenda_mintime == "12"}selected="selected"{/if} value="12">12:00</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select id = "maxtime" style="width: 210px;" width="210" onchange="javascript:$('#calendar').fullCalendar('destroy');init();"/>
								<option {if $user.agenda_maxtime == "13"}selected="selected"{/if} value="13">13:00</option>
								<option {if $user.agenda_maxtime == "14"}selected="selected"{/if} value="14">14:00</option>
								<option {if $user.agenda_maxtime == "15"}selected="selected"{/if} value="15">15:00</option>
								<option {if $user.agenda_maxtime == "16"}selected="selected"{/if} value="16">16:00</option>
								<option {if $user.agenda_maxtime == "17"}selected="selected"{/if} value="17">17:00</option>
								<option {if $user.agenda_maxtime == "18"}selected="selected"{/if} value="18">18:00</option>
								<option {if $user.agenda_maxtime == "19"}selected="selected"{/if} value="19">19:00</option>
								<option {if $user.agenda_maxtime == "20"}selected="selected"{/if} value="20">20:00</option>
								<option {if $user.agenda_maxtime == "21"}selected="selected"{/if} value="21">21:00</option>
								<option {if $user.agenda_maxtime == "22"}selected="selected"{/if} value="22">22:00</option>
								<option {if $user.agenda_maxtime == "23"}selected="selected"{/if} value="23">23:00</option>
								<option {if $user.agenda_maxtime == "24"}selected="selected"{/if} value="24">24:00</option>
							</select>
						</div>
						
					</div>
					<br/>
										
					<div class="footer">
						<p>&nbsp;<a target="_blank" href="http://www.mariquecalcus.com">www.mariquecalcus.com</a></p>
						<br/>
 					</div>
 					
				</td>
  			    	
				<td class="drawer-handle" onclick="togglePage(); $('#calendar').fullCalendar('render'); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
				
      		</tr>
		</table>
	</div>
	
	<div id="right">
	
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
							onSelect : function(date) {$('#calendar').fullCalendar('gotoDate', date.substring(0,4),date.substring(5,7)-1,date.substring(8,10))},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			{/literal}
		</div>
	
		<div class="clear_both_b"></div>

	</div>

	
	{literal}
	<script>
	
	function init(){
	
		$('#calendar').fullCalendar({
	   	 	header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaDay,agendaWeek,month'
			},
			firstDay: 1,
			defaultView: 'agendaDay',
			editable: {/literal}{$user.agenda_editable}{literal},
			allDaySlot:true,
			slotMinutes:parseInt($('#slotminutes').val()),
			firstHour:{/literal}{$user.agenda_firsthour}{literal},
			minTime:parseInt($('#mintime').val()),
			maxTime:parseInt($('#maxtime').val()),
			allDayDefault:false,
			timeFormat: { // for event elements
				'': 'H(:mm)' // default
			},
			axisFormat: 'H(:mm)',
			columnFormat: {
    			month: 'ddd',    // Mon
    			week: 'ddd d/M', // Mon 9/7
    			day: 'dddd d/M'  // Monday 9/7
    		},
    		buttonText: {
        		prev:     '&nbsp;&#9668;&nbsp;',  // left triangle
    			next:     '&nbsp;&#9658;&nbsp;',  // right triangle
    			prevYear: '&nbsp;&lt;&lt;&nbsp;', // <<
    			nextYear: '&nbsp;&gt;&gt;&nbsp;', // >>
    			today:    'Aujourd\'hui',
    			month:    'Mois',
    			week:     'Semaine',
    			day:      'Jour'
    		},
    		monthNames : ['Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
    		monthNamesShort : ['Jan', 'FŽv', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil','Aout', 'Sep', 'Oct', 'Nov', 'DŽc'],
    		dayNames : ['Dimanche', 'Lundi', 'Mardi', 'Mercredi','Jeudi', 'Vendredi', 'Samedi'],
    		dayNamesShort : ['Di', 'Lu', 'Ma', 'Me','Je', 'Ve', 'Sa'],
    		events: "./user_agenda.php?action=personal_agenda_gestion",
    		selectable: {/literal}{$user.agenda_selectable}{literal},
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:'+start+' '+end+' '+allDay);
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			});
		}
	
		$(document).ready(function(){
			init();
  		});
  	</script>
	{/literal}