{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_jquery_autocomplete="yes" js_jquery_form="yes" js_jqmodal="yes" js_agenda="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<span>{#dico_user_agenda_menu_day#}</span>
    				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
	  				<a href="./user_agenda.php?action=list">{#dico_user_agenda_menu_list#}</a>
	  				<a href="./user_agenda.php?action=fulllist">{#dico_user_agenda_menu_fulllist#}</a>
	  				<a href="./user_agenda.php?action=timeline">{#dico_user_agenda_menu_timeline#}</a>
	  				<a href="./user_agenda.php?action=schedule">{#dico_user_agenda_menu_schedule#}</a>
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
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

						<a class="thisday" href="#" onclick="javascript:changeDay('d','day');return false;" title="{#dico_user_agenda_today#}"></a>
						<a class="previousMajor" href="#" onclick="javascript:changeDay(-7,'day');return false;" title="{#dico_user_agenda_previous_week#}"></a>
						<a class="previousMinor" href="" onclick="javascript:changeDay(-1,'day');return false;" title="{#dico_user_agenda_previous_day#}"></a>
						<a class="nextMajor" href="" onclick="javascript:changeDay(7,'day');return false;" title="{#dico_user_agenda_next_week#}"></a>
						<a class="nextMinor" href="" onclick="javascript:changeDay(1,'day');return false;" title="{#dico_user_agenda_next_day#}"></a>
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
													
										<!--Morning hours -->
										<td class="gridcontainerhour">
										
											<div class="hours" id="hoursrow_0" style="height: 6048px; top: 0px; left: 0pt;"/>
										
										</td>
										
										<td class="gridcontainercell">
											
											<div class="grid">
											
												<div class="eventowner" id="eventowner_0" style="display=none;"></div>
												
												<div id="chipday_0" style="z-index:10"></div>
												
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
	
	{include file="template_left.tpl" patient_search="no" template="day" color_schedule1="yes"}
	
	{include file="template_right.tpl" calendar_day="yes"}
	
	<div class="jqmWindow" id="agendaaddbox">
		<div class="jqmConfirmWindow">
		    <div id="add_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_addbox_title#}</h1>
  			</div>
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_updatebox_title#}</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		{#dico_user_agenda_addbox_from#} <div class="startconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_to#} <div class="endconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_length#} <div class="length" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_time#}
 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient#}:</label><input type="text" name="patient" id="patient" realname="{#dico_user_agenda_addbox_patient#}" onfocus="javascript:this.select()"  onkeyup="javascript:patientAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationPatient"></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif#}:</label><input type="text" name="motif" id="motif" realname="{#dico_user_agenda_addbox_motif#}" onfocus="javascript:this.select()" onkeyup="javascript:motifAutoComplete(this.value,'');" autocomplete="off"/></div>
						<div id="overlayInformationMotif"></div>
						<div class="row"><label for="location">{#dico_user_agenda_addbox_location#}:</label><input type="text" name="location" id="location" realname="{#dico_user_agenda_addbox_location#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
						<div class="row"><label for="desc">{#dico_user_agenda_addbox_comment#}:</label><textarea name="comment" id="comment" rows="3" cols="1" ></textarea></div>
						<input type="hidden" size="15" name="id" id="id" value=""/>
						<input type="hidden" size="15" name="motif_id" id="motif_id" value=""/>
						<input type="hidden" size="15" name="patient_id" id="patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="add"><span id="add_button">{#dico_user_agenda_addbox_button_add#}</span><span id="update_button">{#dico_user_agenda_addbox_button_update#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	
	<div class="jqmWindow" id="agendaviewbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_viewbox_title#}</h1>
  			</div>
			<div id="detail" style="display:inline">
 		 		{#dico_user_agenda_addbox_from#} <div id="detail_start" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_to#} <div id="detail_end" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_length#} <div id="detail_length" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_time#}
 			</div>
			<br/>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<fieldset>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient#}:</label><div id="detail_patient"></div></div>
						<div class="row"><label for="patient">{#dico_user_agenda_addbox_patient_addresse#}:</label><div id="detail_patient_addresse"></div></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif#}:</label><div id="detail_motif"></div></div>
						<div class="row"><label for="motif">{#dico_user_agenda_addbox_motif_description#}:</label><div id="detail_motif_description"></div></div>
						<div class="row"><label for="location">{#dico_user_agenda_addbox_location#}:</label><div id="detail_location"></div></div>
						<div class="row"><label for="desc">{#dico_user_agenda_addbox_comment#}:</label><div id="detail_comment"></div></div>
						<input type="hidden" size="15" name="detail_id" id="detail_id" value=""/>
						<input type="hidden" size="15" name="detail_motif_id" id="detail_motif_id" value=""/>
						<input type="hidden" size="15" name="detail_patient_id" id="detail_patient_id" value=""/>
						<div class="row">
							<label>&nbsp;</label>
							<div id="edit_button">
								<a href="#" onclick="javascript:editConsultation($('#detail_id').val());" class="butn_link"><span>{#dico_user_agenda_addbox_button_edit#}</span></a>
							</div>
							<a href="#" onclick="javascript:deleteConsultationBox($('#detail_id').val());" class="butn_link"><span>{#dico_user_agenda_addbox_button_del#}</span></a>
							<a href="#" onclick="javascript:$('#agendaviewbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="agendaconfirmbox">
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
						<a href="#" onclick="javascript:deleteConsultation('day');$('#agendaconfirmbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_user_agenda_addbox_button_del#}</span></a>
						<a href="#" onclick="javascript:$('#agendaconfirmbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	{literal}
	<script>
		$(document).ready(function(){
		
			changeDay(0,'day');
			
			$('#agendaconfirmbox').jqm({
			});

			$('#agendaviewbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$("#detail_start").html('');
	      			$("#detail_end").html('');
	      			$("#detail_length").html('');
	     	 		$("#detail_patient").html('');
	     	 		$("#detail_motif").html('');
	     	 		$("#detail_location").html('');
	     	 		$("#detail_comment").html('');
	     	 		$("#detail_patient_addresse").html('');
	     	 		$("#detail_motif_description").html('');
	     	 		$("#detail_id").val('');
	     	 		$("#detail_patient_id").val('');
	     	 		$("#detail_motif_id").val('');
		    	}
			});
			
			$('#agendaaddbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	$('.selectableitem_'+dayofweekCurrent).removeClass("ui-selected");
			    	if (add == true) {
			    		if ($('#id').val()!=''){
			    			modifConsultation($('#id').val(),$('#patient').val(),$('#patient_id').val(),$('#motif').val(),$('#motif_id').val(),$('#location').val(),$('#comment').val(),'day');
			    		} else {
	    	    			addConsultation(dayConsultCurrent,topCurrent,lengthCurrent,$('#patient').val(),$('#patient_id').val(),$('#motif').val(),$('#motif_id').val(),$('#location').val(),$('#comment').val(),'day');
			    		}
			    		add = false;
			    	}
			    	$('#id').val('');
			    	$('#patient').val('');
			    	$('#patient_id').val('');
			    	$('#motif').val('');
			    	$('#motif_id').val('');
			    	$('#location').val('');
			    	$('#comment').val('');
			    	$('#overlayInformationPatient').html('');
			    	$('#overlayInformationMotif').html('');
		    	}
			});

	   		
  		});
  	</script>
	{/literal}