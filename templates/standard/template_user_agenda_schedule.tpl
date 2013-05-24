{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_jquery_autocomplete="yes" js_jquery_form="yes" js_jqmodal="yes" js_agenda="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php?action=day">{#dico_user_agenda_menu_day#}</a>
	  				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
	  				<a href="./user_agenda.php?action=list">{#dico_user_agenda_menu_list#}</a>
	  				<a href="./user_agenda.php?action=fulllist">{#dico_user_agenda_menu_fulllist#}</a>
	  				<a href="./user_agenda.php?action=timeline">{#dico_user_agenda_menu_timeline#}</a>
    				<span>{#dico_user_agenda_menu_schedule#}</span>
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg" style="display:none">
						<span id = "upload_in_progress" class = "info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/loader-cal.gif" alt=""/>{#dico_user_agenda_upload_in_progress#}
						</span>
						<span id = "update_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_schedule_update_done#}
						</span>
						<span id = "delete_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_delete_done#}
						</span>
						<span id = "add_done" class="info_in_green" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_add_done#}
						</span>
					</div>
				
					<div class="navigation-calendar">

						<a class="thisday" href="#" onclick="javascript:changeDay('d','week');return false;" title="{#dico_user_agenda_today#}"></a>
						<a class="previousMajor" href="#" onclick="javascript:changeDay(-7,'week');return false;" title="{#dico_user_agenda_previous_week#}"></a>
						<a class="nextMajor" href="" onclick="javascript:changeDay(7,'week');return false;" title="{#dico_user_agenda_next_week#}"></a>
						<h2 id="title"></h2>

	  				</div>

				</div>
				
				<table id="mothertable" cellpadding="0" cellspacing="0" width="100%">
							
					<tr>
							
						<td id="maincell" valign="top">
							
							<div id="chipdayresume">
							</div>
							
							<div id="gridcontainer">
							
								<table id="tablecontainer" style="height:6048px;" border="0" cellpadding="0" cellspacing="0">
								
									<tr>
													
										<!--Morning trash -->
										<td id="trash" style="width:1px;">
												
											<div id="trashrow" class="dropzone" style="height: 6048px; top: 0px; left: 0pt;">
													
												<div style="height: 252px;"><a name="key_00"></a></div>
												<div style="height: 252px;"><a name="key_01"></a></div>
												<div style="height: 252px;"><a name="key_02"></a></div>
												<div style="height: 252px;"><a name="key_03"></a></div>
												<div style="height: 252px;"><a name="key_04"></a></div>
												<div style="height: 252px;"><a name="key_05"></a></div>
												<div style="height: 252px;"><a name="key_06"></a></div>
												<div style="height: 252px;"><a name="key_07"></a></div>
												<div style="height: 252px;"><a name="key_08"></a></div>
												<div style="height: 252px;"><a name="key_09"></a></div>
												<div style="height: 252px;"><a name="key_10"></a></div>
												<div style="height: 252px;"><a name="key_11"></a></div>
												<div style="height: 252px;"><a name="key_12"></a></div>
												<div style="height: 252px;"><a name="key_13"></a></div>
												<div style="height: 252px;"><a name="key_14"></a></div>
												<div style="height: 252px;"><a name="key_15"></a></div>
												<div style="height: 252px;"><a name="key_16"></a></div>
												<div style="height: 252px;"><a name="key_17"></a></div>
												<div style="height: 252px;"><a name="key_18"></a></div>
												<div style="height: 252px;"><a name="key_19"></a></div>
												<div style="height: 252px;"><a name="key_20"></a></div>
												<div style="height: 252px;"><a name="key_21"></a></div>
												<div style="height: 252px;"><a name="key_22"></a></div>
												<div style="height: 252px;"><a name="key_23"></a></div>
													
											</div>
															
										</td>
													
										<!-- 1 -->
										<td style="width:40px;">
											<div id="hoursrow_1" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_1" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_1" id="1#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>
										
										<!--Morning hours -->
										<td style="width:40px;">
											<div id="hoursrow_2" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_2" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_2" id="2#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>

										<!--3 -->
										<td style="width:40px;">
											<div id="hoursrow_3" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_3" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_3" id="3#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>

										<!--4 -->
										<td style="width:40px;">
											<div id="hoursrow_4" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_4" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_4" id="4#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>
												
										<!-- 5 -->
										<td style="width:40px;">
											<div id="hoursrow_5" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_5" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_5" id="5#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>
										
										<!-- 6 -->
										<td style="width:40px;">
											<div id="hoursrow_6" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_6" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_6" id="6#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>
										
										<!-- 7 -->
										<td style="width:40px;">
											<div id="hoursrow_7" style="height: 6048px; top: 0px; left: 0pt;"/>
										</td>
										<td class="gridcontainercell" style="width:auto;height:6048px;">
											<div class="grid" style="height: 6048px;">
												<div class="decowner" style="z-index: 1;height: 6048px;">
													{section name = construct loop=$construct}
													<div class="hrule hruleeven"></div>
													<div class="hrule hruleodd"></div>
													{/section}
												</div>
												<div id = "eventowner_7" class="eventownerlarge" style="z-index: 1;display=none; height:6048px">
													{section name = construct loop=$construct}
													<div class="selectableitem_7" id="7#day_{$construct[construct]*2+1}"></div>
													{/section}
												</div>
											</div>
										</td>
																									
									</tr>
								
								</table>
							
							</div>
							
						</td>
					
					</tr>
				
				</table>
				
					
				<div id="calendarSideBar">
  					<div id="cal1Container"></div>
  					<div id="textContainer"><?=$textComment?></div>
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" color_schedule2="yes" template="schedule"}
	
	{include file="template_right.tpl" calendar="no"}
	
	
	{literal}
	<script>
		$(document).ready(function(){
		
			changeDay(0,'schedule');
	   		
  		});
  	</script>
	{/literal}