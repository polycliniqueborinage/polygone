{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_input_control="yes" js_jquery_autocomplete="no" js_form="yes" js_jqmodal="yes" js_planning="yes"}
	
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

    				<span>{#dico_planning_menu_week#}</span>

    				<a href="./management_planning.php?action=search">{#dico_planning_menu_search#}</a>

    				<!-- a href="./management_planning.php?action=archive">{#dico_planning_menu_archive#}</a-->
    				
				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg" style="display:none">
						<span id = "upload_in_progress" class = "info_in_yellow" style="display:none">
							<img src="templates/standard/images/symbols/loader-cal.gif" alt=""/>{#dico_planning_alert_upload_in_progress#}
						</span>
						<span id = "save_new_version" class="info_in_green" style="display:none">
							<img src="templates/standard/images/symbols/miles.png" alt=""/>{#dico_planning_alert_save_new_version#}
						</span>
					</div>
				
					<div class="navigation-calendar">
						<h2 id="title">{#dico_planning_curren_week#}</h2>
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
											<div style="height: 40px; top: 0px; left: 0pt;"></div>
											<div class="workers" id="worker" style="height: 6048px; top: 0px; left: 0pt;">
											</div>
										</td>
										
										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(1);return false;" title="Suppression du planning du lundi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Lundi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_1">
												</div>
												<div id="chipday_1">
												</div>
											</div>
										</td>
																									
										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(2);return false;" title="Suppression du planning du mardi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Mardi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_2">
												</div>
												<div id="chipday_2">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(3);return false;" title="Suppression du planning du mercredi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Mercredi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_3">
												</div>
												<div id="chipday_3">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(4);return false;" title="Suppression du planning du jeudi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Jeudi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_4">
												</div>
												<div id="chipday_4">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(5);return false;" title="Suppression du planning du vendredi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Vendredi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_5">
												</div>
												<div id="chipday_5">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(6);return false;" title="Suppression du planning du samedi" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Samedi
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_6">
												</div>
												<div id="chipday_6">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;">
												<a href="#" onclick="javascript:openDayDeleteBox(7);return false;" title="Suppression du planning du dimanche" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
												Dimanche
											</div>
											<div class="grid">
												<div class="eventowner" id="eventowner_7">
												</div>
												<div id="chipday_7">
												</div>
											</div>
										</td>

										<td class="gridcontainercell">
											<div style="height: 40px; top: 0px; left: 0pt;"></div>
											<div class="grid">
												<div class="eventowner" id="worker_total">
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
	
	{include file="template_left.tpl" planning_search="yes" patient_search="no" template="week"}
	
	{include file="template_right.tpl" calendar_week="no" planning="yes"}
	
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
					<input type="hidden" size="15" name="version_id_edit" id="version_id_edit" value=""/>
					<fieldset>
						<div class="row">
							<label>{#dico_planning_ouvrier#}:</label>
							<div id="ouvrier_edit"></div> 
						</div>
						<div class="row">
							<label>{#dico_planning_hour#}:</label>
							<input id="planning_hour_edit" type="text" size="15" name="planning_hour_edit" value="" onkeyup="javascript:hour = checkAmount(this, hour, 10, 2, false);$('#planning_salaire_edit').val(parseFloat(this.value) * parseFloat($('#ouvrier_salaire_horaire_edit').html()));"/>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_horaire#}:</label>
							<div id="ouvrier_salaire_horaire_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_daily#}:</label>
							<input id="planning_salaire_edit" type="text" size="15" name="planning_salaire_edit" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_default_bonus_recurrent#}:</label>
							<div id="ouvrier_bonus_recurrent_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_bonus_recurrent#}:</label>
							<input id="planning_bonus_recurrent_edit" type="text" size="15" name="planning_bonus_recurrent_edit" value="" onkeyup="javascript:bonus_recurrent = checkAmount(this, bonus_recurrent, 10, 2, false);"/>
						</div>
						<div class="row">
							<label>{#dico_planning_bonus_recurrent_comment#}:</label>
							<input id="planning_bonus_recurrent_edit_comment" type="text" size="15" name="planning_bonus_recurrent_edit_comment" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_default_cout_recurrent#}:</label>
							<div id="ouvrier_cout_recurrent_edit"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_cout_recurrent#}:</label>
							<input id="planning_cout_recurrent_edit" type="text" size="15" name="planning_cout_recurrent_edit" value="" onkeyup="javascript:cout_recurrent = checkAmount(this, cout_recurrent, 10, 2, false);"/>
						</div>
						<div class="row">
							<label>{#dico_planning_cout_recurrent_comment#}:</label>
							<input id="planning_cout_recurrent_edit_comment" type="text" size="15" name="planning_cout_recurrent_edit_comment" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_revenue#}:</label>
							<input id="planning_revenue_edit" type="text" size="15" name="planning_revenue_edit" value="" onkeyup="javascript:revenue = checkAmount(this, revenue, 10, 2, false);"/>
						</div>
						<div class="row">
							<label>{#dico_planning_chantier#}:</label>
							<input id="planning_resource_edit" type="text" size="15" name="planning_resource_edit" value=""/>
							<input id="planning_resource_id_edit" type="hidden" size="15" name="planning_resource_id_edit" value=""/>
						</div>
						<div class="row">
							<label>{#dico_planning_comment#}:</label>
							<input id="planning_comment_edit" type="text" size="15" name="planning_comment_edit" value=""/>
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
							<div id="ouvrier_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_hour#}:</label>
							<div id="planning_hour_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_horaire#}:</label>
							<div id="ouvrier_salaire_horaire_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_salaire_daily#}:</label>
							<div id="planning_salaire_view"></div>
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
							<label>{#dico_planning_bonus_recurrent_comment#}:</label>
							<div id="planning_bonus_recurrent_view_comment"></div>
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
							<label>{#dico_planning_cout_recurrent_comment#}:</label>
							<div id="planning_cout_recurrent_view_comment"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_revenue#}:</label>
							<div id="planning_revenue_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_chantier#}:</label>
							<div id="planning_resource_view"></div>
						</div>
						<div class="row">
							<label>{#dico_planning_comment#}:</label>
							<div id="planning_comment_view"></div>
						</div>
						<div class="row">
							<label>&nbsp;</label>
							<div id="edit_button">
								<a href="#" onclick="javascript:openEditPlanningBox($('#planning_id_view').val());" class="butn_link"><span>{#dico_button_edit#}</span></a>
							</div>
							<a href="#" onclick="javascript:openDeleteBox($('#planning_id_view').val());" class="butn_link"><span>{#dico_button_delete#}</span></a>
							<a href="#" onclick="javascript:$('#viewbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="savebox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_save#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_save_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
							<label>{#dico_planning_saved_name#}:</label>
							<input id="planning_save_name" type="text" size="30" name="planning_save_name" value=""/>
					</div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:saveNewVersion();$('#savebox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_save#}</span></a>
						<a href="#" onclick="javascript:$('#savebox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div class="jqmWindow" id="loadbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_load#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_load_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<!-->a href="#" onclick="javascript:saveVersion();$('#savebox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_save_as#}</span></a-->
						<a href="#" onclick="javascript:loadVersion();$('#loadbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_ok#}</span></a>
						<a href="#" onclick="javascript:$('#loadbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<div class="jqmWindow" id="deletebox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_delete_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:deletePlanning();$('#deletebox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
						<a href="#" onclick="javascript:$('#deletebox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div class="jqmWindow" id="deleteallbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_delete_all_entry_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:deleteAllPlanning();$('#deleteallbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
						<a href="#" onclick="javascript:$('#deleteallbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div class="jqmWindow" id="deletedaybox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_delete_day_entry_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:deleteDayPlanning();$('#deletedaybox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
						<a href="#" onclick="javascript:$('#deletedaybox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	<div class="jqmWindow" id="deleteuserbox">
		<div class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
		</div>
		<div class="block_in_wrapper">
			<form class="main" method="post" action="#">
				<fieldset>
					<div id="detail" style="display:inline">
						{#dico_planning_confirm_delete_user_entry_question#}	
					</div>
					<div class="clear_both_b"></div>
					<div class="row">
						<label>&nbsp;</label>
						<a href="#" onclick="javascript:deleteUserPlanning();$('#deleteuserbox').jqmHide();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
						<a href="#" onclick="javascript:$('#deleteuserbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	
	{literal}
	<script>
	
		var hour = null;
		var bonus_recurrent = null;
		var cout_recurrent = null;
		var revenue = null;

		$(document).ready(function(){
		
			loadWeek();
			
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
			    	$("#ouvrier_salaire_horaire_view").html('');
	      			$("#planning_salaire_horaire_view").html('');
	      			$("#ouvrier_bonus_recurrent_view").html('');
	     	 		$("#planning_bonus_recurrent_view").html('');
	     	 		$("#ouvrier_cout_recurrent_view").html('');
	     	 		$("#planning_cout_recurrent_view").html('');
	     	 		$("#planning_id_view").val('');
		    	}
			});
			
			$('#editbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	
	     	 		$("#planning_id_edit").val('');
	     	 		$("#ouvrier_id_edit").val('');
	     	 		$("#dayofweek_edit").val('');
	     	 		$("#date_edit").val('');
	     	 		$("#version_id_edit").val('');
	     	 		
					$("#ouvrier_edit").html('');
	     	 		$("#planning_hour_edit").val('');

			    	$("#ouvrier_salaire_horaire_edit").html('');
	      			$("#planning_salaire_horaire_edit").val('');
	      			$("#ouvrier_bonus_recurrent_edit").html('');
	     	 		$("#planning_bonus_recurrent_edit").val('');
	     	 		$("#planning_bonus_recurrent_edit_comment").val('');
	     	 		$("#ouvrier_cout_recurrent_edit").html('');
	     	 		$("#planning_cout_recurrent_edit").val('');
	     	 		$("#planning_cout_recurrent_edit_comment").val('');
	     	 		
	     	 		$("#planning_revenue_edit").val('');
	     	 		$("#planning_resource_edit").val('');
	     	 		$("#planning_resource_id_edit").val('');
	     	 		$("#planning_comment_edit").val('');
			    	
		    	}
			});

			$('#savebox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	
	     	 		$("#planning_id_edit").val('');
	     	 		$("#planning_save_name").val('');
	     	 		
		    	}
			});

			$('#loadbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
		    	}
			});
			
			$('#deletebox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
		    	}
			});
			
			$('#deleteallbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
		    	}
			});

			$('#deletedaybox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
		    	}
			});

			$('#deleteuserbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
		    	}
			});
	   		
  		});
  	</script>
	{/literal}