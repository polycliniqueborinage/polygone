{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_ajax="yes" js_workschedule="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./management_workschedule.php?action=list_dws">{#navigation_title_management_daily_wsr_liste#}</a>

					<a href="./management_workschedule.php?action=add_dws">{#navigation_title_management_daily_wsr_add#}</a>
    				
    				<a href="./management_workschedule.php?action=list_wsr">{#navigation_title_management_workschedule_liste#}</a>
    				
    				{if $wsr_id != ""}
						<span>{#navigation_title_management_workschedule_edit#}</span>
					{/if}
					{if $wsr_id == ""}
						<span>{#navigation_title_management_workschedule_add#}</span>
					{/if}    				
    				

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('wsredit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
									{if $wsr_id != ""}
										<span>{#navigation_title_management_workschedule_edit#}</span>
									{/if}
									{if $wsr_id == ""}
										<span>{#navigation_title_management_workschedule_add#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "wsredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_workschedule.php?action=submit_wsr" enctype="multipart/form-data">
						
									<input type = "hidden" value = "{$current_index}" name = 'current_index' id = 'current_index'>
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											
											<div class="row"><input type = "hidden" name = "check_all_filled" id="check_all_filled"  class="{$errors.check_all_filled}" /></div>
											
											<div class="row"><label for = "id"          class="name">{#dico_management_wsr_id#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$horaire[0].id}" name = "id" id="id" class="{$errors.id}" realname="{#dico_management_daily_wsr_id#}" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description" class="name">{#dico_management_wsr_description#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$horaire[0].description}" name = "description" id="description" class="{$errors.description}" realname="{#dico_management_daily_wsr_description#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "average" class="name">{#dico_management_wsr_column_avg_text#}<span class="mandatory"></span>:</label><input type = "text" name = "average" id="average" realname="{#dico_management_wsr_column_avg_text#}" autocomplete="off"/></div>
											
											<div class="clear_both"></div> {*required ... do not delete this row*}
											<br><br>
											
											{section name=dws loop=$dws}
												<input type="hidden" id="{$dws[dws].id}" name="{$dws[dws].id}" value="{$dws[dws].nb_hours}">
											{/section}

											<div class="table">
												<table id="weekly_wsr" name="weekly_wsr">
												<tr>
													<th>{#dico_management_wsr_index#}</th>
													<th>{#dico_management_wsr_jour1#}</th>
													<th>{#dico_management_wsr_jour2#}</th>
													<th>{#dico_management_wsr_jour3#}</th>
													<th>{#dico_management_wsr_jour4#}</th>
													<th>{#dico_management_wsr_jour5#}</th>
													<th>{#dico_management_wsr_jour6#}</th>
													<th>{#dico_management_wsr_jour7#}</th>
												</tr>
												{section name=horaire loop=$horaire}
												<tr>
													<td>{$horaire[horaire].index}</td>
													<td><select value = "{$horaire[horaire].day1}" name = "day1-{$horaire[horaire].index}" id="day1-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour1#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day1 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}	
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day2}" name = "day2-{$horaire[horaire].index}" id="day2-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour2#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day2 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day3}" name = "day3-{$horaire[horaire].index}" id="day3-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour3#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day3 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day4}" name = "day4-{$horaire[horaire].index}" id="day4-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour4#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day4 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day5}" name = "day5-{$horaire[horaire].index}" id="day5-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour5#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day5 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day6}" name = "day6-{$horaire[horaire].index}" id="day6-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour6#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day6 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
													<td><select value = "{$horaire[horaire].day7}" name = "day7-{$horaire[horaire].index}" id="day7-{$horaire[horaire].index}" realname="{#dico_management_wsr_jour7#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															{if $horaire[horaire].day7 == $dws[dws].id}
																<option value="{$dws[dws].id}" SELECTED>{$dws[dws].id}</option>
															{else}
																<option value="{$dws[dws].id}">{$dws[dws].id}</option>
															{/if}
														{/section}	
														</select>
													</td>
												</tr>	
												{/section}
												{if $current_index == 1 && $wsr_id == ""}
												<tr>
													<td>{$current_index}</td>
													<td><select name = "day1-{$current_index}" id="day1-{$current_index}" realname="{#dico_management_wsr_jour1#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day2-{$current_index}" id="day2-{$current_index}" realname="{#dico_management_wsr_jour2#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day3-{$current_index}" id="day3-{$current_index}" realname="{#dico_management_wsr_jour3#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day4-{$current_index}" id="day4-{$current_index}" realname="{#dico_management_wsr_jour4#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day5-{$current_index}" id="day5-{$current_index}" realname="{#dico_management_wsr_jour5#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day6-{$current_index}" id="day6-{$current_index}" realname="{#dico_management_wsr_jour6#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
													<td><select name = "day7-{$current_index}" id="day7-{$current_index}" realname="{#dico_management_wsr_jour7#}" onchange="javascript:setFillin();get_average();" autocomplete="off">
														<option value="">{#dico_management_wsr_choice#}</option>
														{section name=dws loop=$dws}
															<option value="{$dws[dws].id}">{$dws[dws].id}</option>
														{/section}	
														</select>
													</td>
												</tr>
												{/if}
												</table>
											</div>
											
											<div class="clear_both"></div> {*required ... do not delete this row*}
											<br><br>
			
											<div class="row">
												<label>&nbsp;</label>
												<div><a onclick="javascript:add_line();setFillin();get_average();"><img src="./templates/standard/img/16x16/application_add.png" alt="" />
													 <a onclick="javascript:delete_line();setFillin();get_average();"><img src="./templates/standard/img/16x16/application_delete.png" alt="" />
												</div>
											</div>

											<div class="clear_both"></div> {*required ... do not delete this row*}
											<br><br>
			
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><a><button type="submit">{#dico_management_protocol_button_send#}</button></a></div>
											</div>

										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
			
					</div> {*Block B end*}	
					
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" daily_wsr_search="yes"}
	
	{literal}
	<script type="text/javascript">
		var valuesize =  null;
		
		$(document).ready(function() {
		
		    $("form").validate({
			rules: {
	  			id: "required",
	  			description: "required",
	  			check_all_filled: "required"
   			},
   			messages: {
				id: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				description: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				check_all_filled: {
 			    	required: "{/literal}{#dico_management_error_required_all_days#}{literal}"
 				}			
 			},
			submitHandler: function() {
				form.submit();
			}
		});
		
	});
	</script>
	{/literal}
	
