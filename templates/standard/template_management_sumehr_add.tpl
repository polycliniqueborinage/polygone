{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_sumehr="yes" js_form="yes" js_jquery191="yes" js_jquery_validate="yes" js_jquery_multifile="yes" tinymce_jquery="yes"}

	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "advanced",
			plugins : "layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			// Theme options
			theme_advanced_buttons1 : "fullscreen,|,template,|,newdocument,|,justifyleft,justifycenter,justifyright,justifyfull,|,undo,redo",
			theme_advanced_buttons2 : "bold,italic,underline,|bullist,numlist,|,outdent,indent,|,charmap,|,forecolor,formatselect,fontsizeselect",
			theme_advanced_buttons3 : "",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			template_templates : [
				{
					title : "Template1",
					src : "./management_sumehr.php?action=template&id=1",
					description : "Adds Editor Name and Staff ID"
				},
				{
					title : "Template2",
					src : "./management_sumehr.php?action=template&id=2",
					description : "Adds an editing timestamp."
				}
			],
		
		});
	</script>
	{/literal} 
	
	<div id="middle">
    	
		{if $modules.management_sumehr_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_sumehr_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_sumehr.php?action=search">{#dico_sumehr_menu_search#}</a>

					{if $sumehr.ID != ""}
					<span>{#dico_sumehr_menu_edit#}</span> 
					{/if}
					{if $sumehr.ID == ""}
					<span>{#dico_sumehr_menu_add#}</span> 
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
								<h2><a href="javascript:void(0);" id="protocoledit_toggle" class="win_block" onclick = "toggleBlock('protocoledit');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									{if $sumehr.ID != ""}
										<span>{#dico_sumehr_submenu_edit#} {$patient.patient_prenom} {$patient.patient_nom}</span>
									{/if}
									{if $sumehr.ID == ""}
										<span>{#dico_sumehr_submenu_create#} {$patient.patient_prenom} {$patient.patient_nom}</span>
									{/if}
									</a>
								</h2>
							</div>
			
							<div id = "protocoledit" class="block_in_wrapper">

									<form id="form" class="main" method="post" action="management_sumehr.php?action=submit" enctype="multipart/form-data">
						
										<fieldset>
			
											<div style="float:left;width:80%;">
										
												<input type = "hidden" value = "{$sumehr.ID}" name = "id" id="id" />
												<input type = "hidden" value = "{$sumehrReport.ID}" name = "report_id" id="report_id" />
												<input type = "hidden" value = "{$patient.patient_id}" name = "patient_id" id="patient_id" />
												<input type = "hidden" value = "{$user.ID}" name = "user_id" id="user_id" />

												<div class="row"><label for = "date" class="mandatory">{#dico_management_protocol_date#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$sumehrReport.date}" name = "date" id="date" realname="{#dico_management_protocol_date#}" onkeyup="javascript:valuedate = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
												<div class="row"><textarea name="text" style="width:100%">{$sumehrReport.text}</textarea></div>
											
												<div style="padding:10px;margin-bottom:10px">
													<input name = "file[]" id="file" type="file" class="multi"/>
													
													<div class="MultiFile-label">
														{section name=sumehrReportFile loop=$sumehrReportFiles}
															<div id="div_{$sumehrReportFiles[sumehrReportFile].ID}">
																<div style="display:none">
																	<input id="input_{$sumehrReportFiles[sumehrReportFile].ID}" type="checkbox" name="delete[]" value="{$sumehrReportFiles[sumehrReportFile].ID}"/>
																</div>
																<a href="#" class="MultiFile-remove" onclick="$('#input_{$sumehrReportFiles[sumehrReportFile].ID}').attr('checked', 'checked');$('#div_{$sumehrReportFiles[sumehrReportFile].ID}').hide();return false;">x</a>
																<span title="File selected: calendar-6.x-2.2.tar.gz" class="MultiFile-title">{$sumehrReportFiles[sumehrReportFile].name}</span>
																<br/>
															</div>
													    {/section}
													</div>
												</div>
												
												<div class="clear_both"></div>

												<table width="100%">
												{section name=group loop=$groups}
												
												        {if $smarty.section.group.index % 2 == 0}
															<tr>
															<td>
				    										    <input type="checkbox" class="checkbox" value="{$groups[group].ID}" name="assignto[]" id="{$groups[group].ID}" {if $groups[group].assigned == 1}checked="checked"{/if} /><label for="{$groups[group].ID}" style="width:210px;">{$groups[group].name}</label>
															</td>
        												{else}
															<td>
				    										    <input type="checkbox" class="checkbox" value="{$groups[group].ID}" name="assignto[]" id="{$groups[group].ID}" {if $groups[group].assigned == 1}checked="checked"{/if} /><label for="{$groups[group].ID}" style="width:210px;">{$groups[group].name}</label>
															</td>
															</tr>
        												{/if}
												
										    	{/section}
										    	</table>
												
												<div class="clear_both"></div>
			
					                        	<div class="row">
													<div class="butn"><button type="submit" onclick="javascript:window.onbeforeunload = null;">{#dico_button_send#}</button></div>
													<a href="management_sumehr.php?action=view&patient_id={$patient.patient_id}&user_id={$user.ID}}" class="butn_link"><span>{#dico_button_cancel#}</span></a>
												</div>
											</div>
			
											<div style="float:left;" >
																						
											</div>
			
										</fieldset>
									
									</form>
			
									<div class="clear_both"></div> {*required ... do not delete this row*}
								
									</div> {*block_in_wrapper end*}
			
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
			
							</div> {*IN end*}
			
					</div> {*Block A end*}
					
						
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" patient_search="yes" user_search="yes" addressbook_search="yes"}
	
	
	{literal}
	<script type="text/javascript">
	var date='';
	
	$(document).ready(function() {
	
		// fix date validation for chrome
		jQuery.extend(jQuery.validator.methods, {
			date: function (value, element) {
				var isChrome = window.chrome;
				// make correction for chrome
				if (isChrome) {
					var d = new Date();
					return this.optional(element) || 
					!/Invalid|NaN/.test(new Date(d.toLocaleDateString(value)));
				}
				// leave default behavior
				else {
					return this.optional(element) || 
					!/Invalid|NaN/.test(new Date(value));
				}
			}
		});	
	
	
		/** Confirms when closing the window **/
		window.onbeforeunload = checkClose;
	
	    $("form").validate({
			rules: {
				date : { required:true, date: true}
   			},
   			messages: {
				date: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}",
 			    	date: "{/literal}{#dico_management_error_date#}{literal}",
 				},
			},
			submitHandler: function() {
				form.submit();
			}
		});	
	    
	    $("form").bind("invalid-form.validate", function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? '{/literal}{#dico_management_error_one_field_error#}{literal}'
					: '{/literal}{#dico_management_error_many_fields_error_1#}{literal}' + errors + '{/literal}{#dico_management_error_many_fields_error_2#}{literal}';
					$("div.error span").html(message);
					$("div.error").show();
					$("div.infowin_left").show();
					systemeMessage('systemmsg',3000);
				}
		});
		
		
	});
	</script>
	{/literal}