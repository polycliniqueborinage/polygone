{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_jquery_autocomplete="yes" js_jquery_form="yes" js_jqmodal="yes" js_planning="yes"}
	
	<div id="middle">
    	
		{if $modules.management_planning_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_planning_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				
    				<a href="./management_planning.php?action=week">{#dico_planning_menu_week#}</a>
    				
    				<span>{#dico_planning_menu_archive#}</span>
    				
				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg" style="display:none">
						<span id = "upload_in_progress" class = "info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/loader-cal.gif" alt=""/>{#dico_user_agenda_upload_in_progress#}
						</span>
						<span id = "update_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_update_done#}
						</span>
						<span id = "delete_done" class="info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_delete_done#}
						</span>
						<span id = "add_done" class="info_in_green" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_user_agenda_add_done#}
						</span>
					</div>
				
					<div class="navigation-calendar">
						<a class="previousMajor" href="#" onclick="javascript:changeWeek(-7);return false;" title="{#dico_user_agenda_previous_week#}"></a>
						<a class="nextMajor" href="" onclick="javascript:changeWeek(7);return false;" title="{#dico_user_agenda_next_week#}"></a>
						<h2 id="title"></h2>
	  				</div>

				</div>
				
				<table id="mothertable" cellpadding="0" cellspacing="0" width="100%">
							
					<tr>
							
						<td id="maincell" valign="top">
							
							<div id="gridcontainer">
							
								<table id="tablecontainer" style="height:6048px;" border="0" cellpadding="0" cellspacing="0">
								
									<tr>
													
										<!--ouvrier -->
										<td class="gridcontainerworker">
											<div class="workers" id="worker" style="height: 6048px; top: 0px; left: 0pt;">
											</div>
										</td>
										
										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_1">
												</div>
												<div id="chipday_1">
												</div>
											</div>
										</td>
																									
										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_2">
												</div>
												<div id="chipday_2">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_3">
												</div>
												<div id="chipday_3">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_4">
												</div>
												<div id="chipday_4">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_5">
												</div>
												<div id="chipday_5">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_6">
												</div>
												<div id="chipday_6">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div class="grid">
												<div class="eventowner" id="eventowner_7">
												</div>
												<div id="chipday_7">
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
	
	{include file="template_left.tpl" patient_search="no" template="week" color_schedule3="yes"}
	
	{include file="template_right.tpl" calendar_week="yes"}
	
	<div class="jqmWindow" id="editbox">
		<div class="jqmConfirmWindow">
		    <div id="add_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_planning_addbox_title#}</h1>
  			</div>
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_planning_editbox_title#}</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<input type="hidden" size="15" name="planning_id_edit" id="planning_id_edit" value=""/>
					<input type="hidden" size="15" name="ouvrier_id_edit" id="ouvrier_id_edit" value=""/>
					<input type="hidden" size="15" name="dayofweek_edit" id="dayofweek_edit" value=""/>
					<input type="hidden" size="15" name="date_edit" id="date_edit" value=""/>
					<fieldset>
						<div class="row">
							<label>{#dico_planning_ouvrier#}:</label>
							<div id="ouvrier_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_hour#}:</label>
							<input id="planning_hour_edit" type="text" size="15" name="planning_hour_edit" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_default_salaire_horaire#}:</label>
							<div id="ouvrier_salaire_horaire_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_horaire#}:</label>
							<input id="planning_salaire_horaire_edit" type="text" size="15" name="planning_salaire_horaire_edit" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_default_bonus_recurrent#}:</label>
							<div id="ouvrier_bonus_recurrent_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_bonus_recurrent#}:</label>
							<input id="planning_bonus_recurrent_edit" type="text" size="15" name="planning_bonus_recurrent_edit" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_default_cout_recurrent#}:</label>
							<div id="ouvrier_cout_recurrent_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_cout_recurrent#}:</label>
							<input id="planning_cout_recurrent_edit" type="text" size="15" name="planning_cout_recurrent_edit" value=""/>
						</div>
						<div class="row">
							<label>&nbsp;</label>
							
							<a href="#" onclick="javascript:savePlanning();" class="butn_link"><span>{#dico_button_save#}</span></a>
							
							<a href="#" onclick="javascript:$('#editbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	
	<div class="jqmWindow" id="viewbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_planning_viewbox_title#}</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<input type="hidden" size="15" name="planning_id_view" id="planning_id_view" value=""/>
					<fieldset>
						<div class="row">
							<label>{#dico_planning_ouvrier#}:</label>
							<div id="ouvrier_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_hour#}:</label>
							<div id="planning_hour_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_default_salaire_horaire#}:</label>
							<div id="ouvrier_salaire_horaire_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_horaire#}:</label>
							<div id="planning_salaire_horaire_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_default_bonus_recurrent#}:</label>
							<div id="ouvrier_bonus_recurrent_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_bonus_recurrent#}:</label>
							<div id="planning_bonus_recurrent_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_default_cout_recurrent#}:</label>
							<div id="ouvrier_cout_recurrent_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_cout_recurrent#}:</label>
							<div id="planning_cout_recurrent_view"></div>
						</div>
						<div class="row">
							<label>&nbsp;</label>
							<div id="edit_button">
								<a href="#" onclick="javascript:editPlanning($('#planning_id_view').val());" class="butn_link"><span>{#dico_button_edit#}</span></a>
							</div>
							<a href="#" onclick="javascript:deletePlanningBox($('#planning_id_view').val());" class="butn_link"><span>{#dico_button_delete#}</span></a>
							<a href="#" onclick="javascript:$('#viewbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="confirmbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_user_agenda_confirm_delete_task#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:deleteConsultation('week');$('#agendaconfirmbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_user_agenda_addbox_button_del#}</span></a>
						<a href="#" onclick="javascript:$('#agendaconfirmbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	{literal}
	<script>
		$(document).ready(function(){
		
			changeWeek(0);
		
			$("#worker").sortable({
				placeholder: 'ui-state-highlight',
				stop: function(event, ui) {
					var order = $('#worker').sortable('serialize');
					$.ajax({
				  		type: "POST",
				  		url: "management_ouvrier.php?action=updateorder&"+order,
				  		success: function(data){
				  			changeWeek(0);
				  		}
					});
				}
			});
			$("#worker").disableSelection();
			
			$('#viewbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
	      			$("#planning_hour_view").html('');
			    	$("#ouvrier_salaire_horaire_view").html('');
	      			$("#planning_salaire_horaire_view").html('');
	      			$("#ouvrier_bonus_recurrent_view").html('');
	     	 		$("#planning_bonus_recurrent_view").html('');
	     	 		$("#ouvrier_cout_recurrent_view").html('');
	     	 		$("#ouvrier_cout_recurrent_view").html('');
	     	 		$("#planning_cout_recurrent_view").html('');
	     	 		$("#planning_id_view").val('');
		    	}
			});
			
			$('#editbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	
	      			$("#planning_hour_edit").val('');
			    	$("#ouvrier_salaire_horaire_edit").html('');
	      			$("#planning_salaire_horaire_edit").val('');
	      			$("#ouvrier_bonus_recurrent_edit").html('');
	     	 		$("#planning_bonus_recurrent_edit").val('');
	     	 		$("#ouvrier_cout_recurrent_edit").html('');
	     	 		$("#planning_cout_recurrent_edit").val('');
	     	 		$("#planning_id_edit").val('');
	     	 		$("#ouvrier_id_edit").val('');
	     	 		$("#dayofweek_edit").val('');
			    	
		    	}
			});

	   		
  		});
  	</script>
	{/literal}