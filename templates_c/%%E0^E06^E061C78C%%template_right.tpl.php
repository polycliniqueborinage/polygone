<?php /* Smarty version 2.6.19, created on 2012-09-08 09:14:07
         compiled from template_right.tpl */ ?>
<div id="right">

	<?php if ($this->_tpl_vars['planning'] == 'yes'): ?>
	
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
								<option <?php if ($this->_tpl_vars['pixels_per_minute'] == 'da'): ?>selected="selected"<?php endif; ?> value = "20">petit</option>
								<option <?php if ($this->_tpl_vars['pixels_per_minute'] == 'da'): ?>selected="selected"<?php endif; ?> value = "40">moyen</option>
								<option <?php if ($this->_tpl_vars['pixels_per_minute'] == 'da'): ?>selected="selected"<?php endif; ?> value = "80">grand</option>
							</select>
						</div>

						
					</div>
					<br/>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['calendar_day'] == 'yes'): ?>
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
							onSelect : function(date) {try{changeDay(date,\'calendar_day\');}catch(err){};},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			'; ?>

	</div>
	
	<div class="clear_both_b"></div>
	<?php endif; ?>	
	
	
	<?php if ($this->_tpl_vars['calendar_week'] == 'yes'): ?>
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
							onSelect : function(date) {try{changeDay(date,\'calendar_week\');}catch(err){};},
							changeMonth: false,
							changeYear: false
						});
					});
				</script>
			'; ?>

	</div>
	
	<div class="clear_both_b"></div>
	<?php endif; ?>
		
		
	<?php if ($this->_tpl_vars['calendar_light'] == 'yes'): ?>
	<div class="content-right-in">
		<h2><a id="mycaltoggle" class="win-up" href="javascript:blindtoggle('mycal_mini');toggleClass('mycaltoggle','win-up','win-down');">calendar</a></h2>
		<div id="mycal_mini" class="cal"></div>
				<?php echo '
				<script type = "text/javascript">
					$(document).ready(function() {
						$(\'#mycal_mini\').datepicker({
							changeMonth: false,
							changeYear: false,
							prevText: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_previous']; ?>
<?php echo '\',
							nextText: \''; ?>
<?php echo $this->_config[0]['vars']['dico_general_calendar_next']; ?>
<?php echo '\',
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
							monthNamesShort: [\'Jan\', \'Feb\', \'Mar\', \'Apr\', \'May\', \'Jun\', \'Jul\', \'Aug\', \'Sep\', \'Oct\', \'Nov\', \'Dec\'],
							dayNamesMin: [\'Di\',\'Lu\',\'Ma\',\'Me\',\'Je\',\'Ve\',\'Sa\'],
							dateFormat: \'yy-mm-dd\'
						});
					});
				</script>
			'; ?>

	</div>
	<?php endif; ?>	

	
	
	
		
	<?php if ($this->_tpl_vars['useronline'] == 'yes'): ?>
	<div class="right_in">
			<h2><?php echo $this->_config[0]['vars']['general_usersonline']; ?>
</h2>
			<div id = "onlinelist">
				<ul>
				<?php unset($this->_sections['onlinelist']);
$this->_sections['onlinelist']['name'] = 'onlinelist';
$this->_sections['onlinelist']['loop'] = is_array($_loop=$this->_tpl_vars['onlinelist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['onlinelist']['show'] = true;
$this->_sections['onlinelist']['max'] = $this->_sections['onlinelist']['loop'];
$this->_sections['onlinelist']['step'] = 1;
$this->_sections['onlinelist']['start'] = $this->_sections['onlinelist']['step'] > 0 ? 0 : $this->_sections['onlinelist']['loop']-1;
if ($this->_sections['onlinelist']['show']) {
    $this->_sections['onlinelist']['total'] = $this->_sections['onlinelist']['loop'];
    if ($this->_sections['onlinelist']['total'] == 0)
        $this->_sections['onlinelist']['show'] = false;
} else
    $this->_sections['onlinelist']['total'] = 0;
if ($this->_sections['onlinelist']['show']):

            for ($this->_sections['onlinelist']['index'] = $this->_sections['onlinelist']['start'], $this->_sections['onlinelist']['iteration'] = 1;
                 $this->_sections['onlinelist']['iteration'] <= $this->_sections['onlinelist']['total'];
                 $this->_sections['onlinelist']['index'] += $this->_sections['onlinelist']['step'], $this->_sections['onlinelist']['iteration']++):
$this->_sections['onlinelist']['rownum'] = $this->_sections['onlinelist']['iteration'];
$this->_sections['onlinelist']['index_prev'] = $this->_sections['onlinelist']['index'] - $this->_sections['onlinelist']['step'];
$this->_sections['onlinelist']['index_next'] = $this->_sections['onlinelist']['index'] + $this->_sections['onlinelist']['step'];
$this->_sections['onlinelist']['first']      = ($this->_sections['onlinelist']['iteration'] == 1);
$this->_sections['onlinelist']['last']       = ($this->_sections['onlinelist']['iteration'] == $this->_sections['onlinelist']['total']);
?>
					<li><a title="<?php echo $this->_tpl_vars['onlinelist'][$this->_sections['onlinelist']['index']]['familyname']; ?>
 <?php echo $this->_tpl_vars['onlinelist'][$this->_sections['onlinelist']['index']]['firstname']; ?>
  " href = "#"><?php echo $this->_tpl_vars['onlinelist'][$this->_sections['onlinelist']['index']]['name']; ?>
</a></li>
				<?php endfor; endif; ?>
				</ul>
			</div>
	</div>
		
	<div class="clear_both_b"></div>
	<?php endif; ?>	
	
	
	<?php if ($this->_tpl_vars['chat'] == 'yes'): ?>
	<div class="right_in">
		<h2><?php echo $this->_config[0]['vars']['general_chat']; ?>
</h2>
		<div>
			<ul id="chat-resume">
			</ul>
		</div>
		<form id="daddy-shoutbox-form" action="include/js/shoutbox/jquery-shoutbox/daddy-shoutbox.php?action=add" method="post"> 
	    <input type="hidden" name="nickname" value="<?php echo $this->_tpl_vars['username']; ?>
" />
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
	
	<?php echo '
	<script type="text/javascript">
        var count = 1;
        var files = \'include/js/shoutbox/jquery-shoutbox/\';
        var lastTime = 0;
        
        function prepare(response) {
          var d = new Date();
          count++;
          d.setTime(response.time*1000);
          var mytime = d.getHours()+\':\'+d.getMinutes()+\':\'+d.getSeconds();
          var string = \'<div class="shoutbox-list" id="list-\'+count+\'">\'
              + \'<span class="shoutbox-list-time">\'+mytime+\'</span>\'
              + \'<span class="shoutbox-list-nick">\'+response.nickname+\':</span>\'
              + \'<span class="shoutbox-list-message">\'+response.message+\'</span>\'
              +\'</div>\';
          
          return string;
        }
        
        function success(response, status)  { 
          if(status == \'success\') {
            lastTime = response.time;
            $(\'#daddy-shoutbox-response\').html(\'<img src="\'+files+\'images/accept.png" />\');
            $(\'#daddy-shoutbox-list\').prepend(prepare(response));
            $(\'input[@name=message]\').attr(\'value\', \'\').focus();
            $(\'#list-\'+count).fadeIn(\'slow\');
            timeoutID = setTimeout(refresh, 3000);
          }
        }
        
        function validate(formData, jqForm, options) {
          for (var i=0; i < formData.length; i++) { 
              if (!formData[i].value) {
                  alert(\'Please fill in all the fields\'); 
                  $(\'input[@name=\'+formData[i].name+\']\').css(\'background\', \'red\');
                  return false; 
              } 
          } 
          $(\'#daddy-shoutbox-response\').html(\'<img src="\'+files+\'images/loader.gif" />\');
          clearTimeout(timeoutID);
        }

        function refresh() {
          $.getJSON(files+"daddy-shoutbox.php?action=view&time="+lastTime, function(json) {
            if(json.length) {
              for(i=0; i < json.length; i++) {
                $(\'#daddy-shoutbox-list\').prepend(prepare(json[i]));
                $(\'#list-\' + count).fadeIn(\'slow\');
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
              dataType:       \'json\',
              beforeSubmit:   validate,
              success:        success
            }; 
            $(\'#daddy-shoutbox-form\').ajaxForm(options);
            timeoutID = setTimeout(refresh, 100);
        });
  	</script>
	'; ?>
	

	<?php endif; ?>	
	
	
</div>
