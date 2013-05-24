<?php /* Smarty version 2.6.19, created on 2012-09-14 13:49:16
         compiled from template_user_agenda_personal_agenda.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_ui_171' => 'yes','js_full_agenda' => 'yes')));
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
    				<span><?php echo $this->_config[0]['vars']['dico_user_agenda_menu_day']; ?>
</span>
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
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1 minute</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '30'): ?>selected="selected"<?php endif; ?> value="30">30 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '60'): ?>selected="selected"<?php endif; ?> value="60">60 minutes</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_slotminutes'] == '120'): ?>selected="selected"<?php endif; ?> value="120">120 minutes</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select id = "mintime" style="width: 210px;" width="210" onchange="javascript:$('#calendar').fullCalendar('destroy');init();"/>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '0'): ?>selected="selected"<?php endif; ?> value="0">0:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '1'): ?>selected="selected"<?php endif; ?> value="1">1:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '2'): ?>selected="selected"<?php endif; ?> value="2">2:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '3'): ?>selected="selected"<?php endif; ?> value="3">3:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '4'): ?>selected="selected"<?php endif; ?> value="4">4:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '5'): ?>selected="selected"<?php endif; ?> value="5">5:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '6'): ?>selected="selected"<?php endif; ?> value="6">6:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '7'): ?>selected="selected"<?php endif; ?> value="7">7:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '8'): ?>selected="selected"<?php endif; ?> value="8">8:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '9'): ?>selected="selected"<?php endif; ?> value="9">9:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '10'): ?>selected="selected"<?php endif; ?> value="10">10:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '11'): ?>selected="selected"<?php endif; ?> value="11">11:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_mintime'] == '12'): ?>selected="selected"<?php endif; ?> value="12">12:00</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select id = "maxtime" style="width: 210px;" width="210" onchange="javascript:$('#calendar').fullCalendar('destroy');init();"/>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '13'): ?>selected="selected"<?php endif; ?> value="13">13:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '14'): ?>selected="selected"<?php endif; ?> value="14">14:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '15'): ?>selected="selected"<?php endif; ?> value="15">15:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '16'): ?>selected="selected"<?php endif; ?> value="16">16:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '17'): ?>selected="selected"<?php endif; ?> value="17">17:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '18'): ?>selected="selected"<?php endif; ?> value="18">18:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '19'): ?>selected="selected"<?php endif; ?> value="19">19:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '20'): ?>selected="selected"<?php endif; ?> value="20">20:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '21'): ?>selected="selected"<?php endif; ?> value="21">21:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '22'): ?>selected="selected"<?php endif; ?> value="22">22:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '23'): ?>selected="selected"<?php endif; ?> value="23">23:00</option>
								<option <?php if ($this->_tpl_vars['user']['agenda_maxtime'] == '24'): ?>selected="selected"<?php endif; ?> value="24">24:00</option>
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
				<?php echo '
				<script type = "text/javascript">
					$(document).ready(function() {
						$(\'#mycal_mini\').datepicker({
							inline : true,
							changeFirstDay: false,
							numberOfMonths: 2,
							prevText: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_previous']; ?>
<?php echo '\',
							nextText: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_next']; ?>
<?php echo '\',
							monthNamesShort: [\'Jan\', \'Feb\', \'Mar\', \'Apr\', \'May\', \'Jun\', \'Jul\', \'Aug\', \'Sep\', \'Oct\', \'Nov\', \'Dec\'],
							monthNames: [\''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_january']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_february']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_march']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_april']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_may']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_june']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_july']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_august']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_september']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_october']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_november']; ?>
<?php echo '\', \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_december']; ?>
<?php echo '\'],
							dayNamesMin: [\'Di\',\'Lu\',\'Ma\',\'Me\',\'Je\',\'Ve\',\'Sa\'],
							dateFormat: \'yy-mm-dd\',
							onSelect : function(date) {$(\'#calendar\').fullCalendar(\'gotoDate\', date.substring(0,4),date.substring(5,7)-1,date.substring(8,10))},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			'; ?>

		</div>
	
		<div class="clear_both_b"></div>

	</div>

	
	<?php echo '
	<script>
	
	function init(){
	
		$(\'#calendar\').fullCalendar({
	   	 	header: {
				left: \'prev,next today\',
				center: \'title\',
				right: \'agendaDay,agendaWeek,month\'
			},
			firstDay: 1,
			defaultView: \'agendaDay\',
			editable: '; ?>
<?php echo $this->_tpl_vars['user']['agenda_editable']; ?>
<?php echo ',
			allDaySlot:true,
			slotMinutes:parseInt($(\'#slotminutes\').val()),
			firstHour:'; ?>
<?php echo $this->_tpl_vars['user']['agenda_firsthour']; ?>
<?php echo ',
			minTime:parseInt($(\'#mintime\').val()),
			maxTime:parseInt($(\'#maxtime\').val()),
			allDayDefault:false,
			timeFormat: { // for event elements
				\'\': \'H(:mm)\' // default
			},
			axisFormat: \'H(:mm)\',
			columnFormat: {
    			month: \'ddd\',    // Mon
    			week: \'ddd d/M\', // Mon 9/7
    			day: \'dddd d/M\'  // Monday 9/7
    		},
    		buttonText: {
        		prev:     \'&nbsp;&#9668;&nbsp;\',  // left triangle
    			next:     \'&nbsp;&#9658;&nbsp;\',  // right triangle
    			prevYear: \'&nbsp;&lt;&lt;&nbsp;\', // <<
    			nextYear: \'&nbsp;&gt;&gt;&nbsp;\', // >>
    			today:    \'Aujourd\\\'hui\',
    			month:    \'Mois\',
    			week:     \'Semaine\',
    			day:      \'Jour\'
    		},
    		monthNames : [\'Janvier\', \'F&eacute;vrier\', \'Mars\', \'Avril\', \'Mai\', \'Juin\', \'Juillet\',\'Aout\', \'Septembre\', \'Octobre\', \'Novembre\', \'Decembre\'],
    		monthNamesShort : [\'Jan\', \'FŽv\', \'Mar\', \'Avr\', \'Mai\', \'Juin\', \'Juil\',\'Aout\', \'Sep\', \'Oct\', \'Nov\', \'DŽc\'],
    		dayNames : [\'Dimanche\', \'Lundi\', \'Mardi\', \'Mercredi\',\'Jeudi\', \'Vendredi\', \'Samedi\'],
    		dayNamesShort : [\'Di\', \'Lu\', \'Ma\', \'Me\',\'Je\', \'Ve\', \'Sa\'],
    		events: "./user_agenda.php?action=personal_agenda_gestion",
    		selectable: '; ?>
<?php echo $this->_tpl_vars['user']['agenda_selectable']; ?>
<?php echo ',
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt(\'Event Title:\'+start+\' \'+end+\' \'+allDay);
				if (title) {
					calendar.fullCalendar(\'renderEvent\',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar(\'unselect\');
			},
			});
		}
	
		$(document).ready(function(){
			init();
  		});
  	</script>
	'; ?>