{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" js_new_datepicker="yes" js_jquery_validate="yes" tinymce="yes"}
	
	
	{literal}
	<script type="text/javascript">	
		tinyMCE.init({
			mode : "exact",
			elements : "textcomment",  
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "40%",
			height: "10px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			//theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			//cleanup: true,
			//auto_reset_designmode: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	
	</script>
	{/literal}
	
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					
					<a href="./user_services.php?action=teamcalendar">{#navigation_title_user_services_teamcalendar#}</a>
					<a href="./user_services.php?action=leave_overview">{#navigation_title_user_services_pending_requests#}</a>
					<a href="./user_services.php?action=quota_overview">{#navigation_title_user_services_quotas#}</a>
    				<span>{#navigation_title_user_services_leaverequest#}</span>
    				{if $ismanager == 'X'}
    					<a href="./user_services.php?action=tasks_overview">{#navigation_user_mss#}</a>
    					<a href="./user_services.php?action=my_teams_calendar">{#navigation_title_user_services_myteamscalendar#}</a>
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
					
								<h2>
								<span>{#navigation_title_user_services_leaverequest#}</span>
								</h2>
							</div>
							
								<form id="form" class="main" method="post" enctype="multipart/form-data" action="user_services.php?action=submit_absence_request" onsubmit="checkDate();">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "begda">{#dico_user_myservices_begda#}:</label><input type = "text" name = "begda" id="begda" realname="{#dico_user_myservices_begda#}" autocomplete="off" onclick='fPopCalendar("begda")'/></div>
											<div class="row"><label for = "endda">{#dico_user_myservices_endda#}:</label><input type = "text" name = "endda" id="endda" realname="{#dico_user_myservices_endda#}" autocomplete="off" onclick='fPopCalendar("endda")'/></div>
											<div class="row"><label for = "absencetype">{#dico_user_myservices_absencetype#}:</label>
												<select name = "absenceid" id="absenceid" realname="{#dico_user_myservices_absencetype#}" autocomplete="off" onchange="display_hours(this.options[this.selectedIndex].value);">
													<option value="">{#dico_user_myservices_absencechoice#}</option>
													{section name=absences loop=$absences}
														<option value="{$absences[absences].id}">{$absences[absences].id} - {$absences[absences].description}</option>	
													{/section}	
												</select>
											</div>
											{section name=absences loop=$absences}
												<input type = "hidden" name = "type_{$absences[absences].id}"     id="type_{$absences[absences].id}"    value={$absences[absences].type}>
												<input type = "hidden" name = "comment_{$absences[absences].id}"  id="comment_{$absences[absences].id}" value={$absences[absences].comment}>	
											{/section}
											
											<div class="row" id="beghour" name="beghour" style="display:none"><label for = "beghr">{#dico_user_myservices_beghr#}:</label><input type = "text" name = "beghr" id="beghr" value="00:00" realname="{#dico_user_myservices_beghr#}"/></div>
											<div class="row" id="endhour" name="beghour" style="display:none"><label for = "endhr">{#dico_user_myservices_endhr#}:</label><input type = "text" name = "endhr" id="endhr" value="00:00" realname="{#dico_user_myservices_endhr#}"/></div>
											<div class="row" id="comment" name="comment" style="display:none"><label for = "endhr">{#dico_user_myservices_comment#}:</label><textarea name = "textcomment" id="textcomment" realname="{#dico_user_myservices_comment#}"></textarea></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
						</div> {*IN end*}
			
					</div> {*Block B end*}	
					
				</div>
					
			</div>

		</div>

	</div>
	
	{literal}
		
		<script language="javascript" type="text/javascript">			
			function display_hours(absenceid){ 
			
			var typename 	= "type_"+absenceid;
			var commentname = "comment_"+absenceid;
			
				if (document.getElementById(typename).value == 'H'){
					document.getElementById("beghour").style.display = 'block';
					document.getElementById("endhour").style.display = 'block';
				}
				else{
					document.getElementById("beghour").style.display = 'none';
					document.getElementById("endhour").style.display = 'none';
				}
				
				if (document.getElementById(commentname).value == 'R'){
					document.getElementById("comment").style.display = 'block';
				}
				else{
					document.getElementById("comment").style.display = 'none';
				}
			}
			
			$("#form").validate({
			rules: {
			    begda: 			"required",
			    endda: 			"required",
	    		absencetype : 	"required"
   			},
   			messages: {
				begda: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				endda: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				absencetype: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				}
			}
		});
			
			function checkDate(){ 
				var error = 0;
				if(document.getElementById("begda").value != '' && document.getElementById("endda").value != ''){
					if(document.getElementById("begda").value > document.getElementById("endda").value ){
						begda = document.getElementById("begda").value;
						endda = document.getElementById("endda").value;
						alert(begda.substr(8, 2)+'.'+begda.substr(5, 2)+'.'+begda.substr(0, 4)+' > '+endda.substr(8, 2)+'.'+endda.substr(5, 2)+'.'+endda.substr(0, 4)+' ...');
						document.getElementById("endda").value = '';
						error = 1;
					}
				}
				
				if(document.getElementById("beghr").value != '' && document.getElementById("endhr").value != ''){
					if(document.getElementById("beghr").value > document.getElementById("endhr").value ){
						beghr = document.getElementById("beghr").value;
						endhr = document.getElementById("endhr").value;
						alert(beghr+' > '+endhr+' ...');
						document.getElementById("endhr").value = '00:00';
						error = 1;
					}
				}
				
				if(error == 1)
					return false;
				else
					return true;	
			}
			
		</script> 
	{/literal}
	
