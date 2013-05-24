{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_jquery_autocomplete="yes" js_patient="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

{literal}
	<script type="text/javascript">	
		tinyMCE.init({
			mode : "exact",
			elements : "textcomment",  
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "70%",
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
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_patient.php?action=search">{#dico_management_patient_menu_search#}</a>

					{if $patient.ID != ""}
	  				<a href="./management_patient.php?action=add">{#dico_management_patient_menu_add#}</a>
					{/if}
					{if $patient.ID == ""}
					<span>{#dico_management_patient_menu_add#}</span> 
					{/if}

	  				<a href="./management_patient.php?action=list">{#dico_management_patient_menu_list#}</a>

					{if $patient.ID != ""}
					<span>{#dico_management_patient_menu_edit#}</span> 
					{/if}
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_error2#}</span>
						{/if}
					</div>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<!--<span>{#dico_management_patient_create#}</span></a>-->
									<span>{$title}</span></a>
								</h2>
						
							</div>
			
							<div id = "userprofile" style = "">
								
							
								<form id="form" class="main" method="post" action="management_patient.php?action=submit" enctype="multipart/form-data">
									<div id="tab_content">
										<ul>
											<li>
												<a href="#fragment-1"><span>{#dico_management_patient_subtab_general#}</span></a>
											</li>
											<li>
												<a href="#fragment-2"><span>{#dico_management_patient_subtab_info#}</span></a>
											</li>
											<li>
												<a href="#fragment-3"><span>{#dico_management_patient_subtab_comment#}</span></a>
											</li>
										</ul>
										
										<div id="fragment-1" class="block_in_wrapper">
							
											<fieldset>
					
												<div style="float:left;width:80%;">
												
													<div class="row"><input type = "hidden" value = "{$patient.ID}" name = "id" id="id" /></div>
													<div class="row"><input type = "hidden" value = "{$patient.titulaire_ID}" name = "titulaire_id" id="titulaire_id" /></div>
									
													<div class="row">
														<label for="btn_idcard">{#dico_management_patient_btn_idcard#}:</label><button id="btn_idcard" type="button" onclick="ReadCard()"><img src="templates/standard/img/48x48/Download.ico" alt=""/></button>
														<div style="float:left;" > 
															<applet
				                                        		codebase = "."
				                               	            	archive  = "beidlib.jar"
				                                            	code     = "be.belgium.eid.BEID_Applet.class"
				                                            	name     = "BEIDApplet"
				                                            	width    = "70"
				                                            	height   = "100"
				                                            	hspace   = "0"
				                                            	vspace   = "0"
				                                            	align    = "middle"
				                                        	>
				                                        		<param name="Reader" value="">
				                                   				<param name="OCSP" value="-1">
				                                        		<param name="CRL" value="-1">
				                                        		<param name="DisableWarning" value="true">
				                                        	</applet>										
														</div>																												
													</div>
									
													<div class="row"><label for="titulaire_name">{#dico_management_patient_titulaire_name#}:</label><input type = "text" value = "{$patient.titulaire_name}" name = "titulaire_name" id="titulaire_name" realname="{#dico_management_patient_titulaire_name#}" onfocus="javascript:this.select();" onkeyup="javascript:titulaireSimpleSearch('', this.value);" autocomplete="off"/></div>
													
													<div class="row"><label for = "familyname" class="mandatory">{#dico_management_patient_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$patient.familyname}" name = "familyname" id="familyname" realname="{#dico_management_patient_familyname#}" onfocus="javascript:this.select();" onkeyup="javascript:patientSimpleSearch('',this.value+' '+$('#firstname').val());" autocomplete="off"/></div>
		
													<div class="row"><label for = "firstname" class="mandatory">{#dico_management_patient_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$patient.firstname}" name = "firstname" id="firstname" realname="{#dico_management_patient_firstname#}" onfocus="javascript:this.select()" onkeyup="javascript:patientSimpleSearch('',$('#familyname').val()+' '+this.value);" autocomplete="off"/></div>
													
													<div class="row"><label for = "birthday" class="mandatory">{#dico_management_patient_birthday#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$patient.birthday}" name = "birthday" id="birthday" realname="{#dico_management_patient_birthday#}" onkeyup="javascript:valuebirthday = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class = "row">
														<label for = "gender">{#dico_management_patient_gender#}<span class="mandatory">*</span>:</label>
														<select name = "gender" id = "gender" realname = "{#dico_management_patient_gender#}"/>
														{if $patient.gender == ""}
															<option value = "" selected>{#dico_management_patient_chooseone#}</option>
														{/if}
														<option {if $patient.gender == "M"}selected="selected"{/if} value = "M">{#dico_management_patient_male#}</option>
														<option {if $patient.gender == "F"}selected="selected"{/if} value = "F">{#dico_management_patient_female#}</option>
														</select>
													</div>
		
													<div class="row">
														<label for = "nationality">{#dico_management_patient_nationality#}:</label>
														<select name = "nationality" id = "nationality" realname = "{#dico_management_patient_nationality#}" />
														{if $patient.nationality == ""}
															<option value = "" selected>{#dico_management_patient_chooseone#}</option>
														{/if}
														<option {if $patient.nationality == "be"}selected="selected"{/if} value = "be">{#dico_management_patient_be#}</option>
														<option {if $patient.nationality == "it"}selected="selected"{/if} value = "it">{#dico_management_patient_it#}</option>
														<option {if $patient.nationality == "tr"}selected="selected"{/if} value = "tr">{#dico_management_patient_tr#}</option>
														<option {if $patient.nationality == "de"}selected="selected"{/if} value = "de">{#dico_management_patient_de#}</option>
														<option {if $patient.nationality == "en"}selected="selected"{/if} value = "en">{#dico_management_patient_en#}</option>
														<option {if $patient.nationality == "es"}selected="selected"{/if} value = "es">{#dico_management_patient_es#}</option>
														<option {if $patient.nationality == "fr"}selected="selected"{/if} value = "fr">{#dico_management_patient_fr#}</option>
														<option {if $patient.nationality == "jp"}selected="selected"{/if} value = "jp">{#dico_management_patient_jp#}</option>
														<option {if $patient.nationality == "pl"}selected="selected"{/if} value = "pl">{#dico_management_patient_pl#}</option>
														<option {if $patient.nationality == "pt"}selected="selected"{/if} value = "pt">{#dico_management_patient_pt#}</option>
														<option {if $patient.nationality == "ro"}selected="selected"{/if} value = "ro">{#dico_management_patient_ro#}</option>
														<option {if $patient.nationality == "ru"}selected="selected"{/if} value = "ru">{#dico_management_patient_ru#}</option>
														<option {if $patient.nationality == "bg"}selected="selected"{/if} value = "bg">{#dico_management_patient_bg#}</option>
														<option {if $patient.nationality == "da"}selected="selected"{/if} value = "da">{#dico_management_patient_da#}</option>
														</select>
													</div>
													
													<div class="row"><label for = "niss">{#dico_management_patient_niss#}:</label><input type = "text" value = "{$patient.niss}" name = "niss" id="niss" realname="{#dico_management_patient_niss#}" onfocus="javascript:this.select()" autocomplete="off" onkeyup="javascript:valueniss = checkNumber(this, valueniss, 11, false);" onchange=document.getElementById("mutuelle_matricule").value=this.value;></div>
		
													<div class="row"><label for = "address1">{#dico_management_patient_address1#}:</label><input type = "text" value = "{$patient.address1}" name = "address1" id="address1" realname ="{#dico_management_patient_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class="row"><label for = "zip1city1">{#dico_management_patient_zip1city1#}:</label><input type = "text" value = "{$patient.zip1} {$patient.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_management_patient_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<!--<div class="row"><label for = "state1">{#dico_management_patient_state1#}:</label><input type = "text" value = "{$patient.state1}" name = "state1" id="state1" realname ="{#dico_management_patient_state1#}" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<!--<div class="row"><label for = "country1">{#dico_management_patient_country1#}:</label><input type = "text" value = "{$patient.country1}" name = "country1" id="country1" realname ="{#dico_management_patient_country1#}" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<!--<div class="row"><label for = "workphone">{#dico_management_patient_workphone#}:</label><input type = "text" value = "{$patient.workphone}" name = "workphone" id="workphone" realname ="{#dico_management_patient_workphone#}" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<div class="row"><label for = "privatephone">{#dico_management_patient_privatephone#}:</label><input type = "text" value = "{$patient.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_management_patient_privatephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<div class="row"><label for = "mobilephone">{#dico_management_patient_mobilephone#}:</label><input type = "text" value = "{$patient.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_management_patient_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
													<!--<div class="row"><label for = "fax">{#dico_management_patient_fax#}:</label><input type = "text" value = "{$patient.fax}" name = "fax" id="email" realname ="{#dico_management_patient_fax#}" onfocus="javascript:this.select()" autocomplete="off"/></div> -->
		
													<div class="row"><label for = "email">{#dico_management_patient_email#}:</label><input type = "text" value = "{$patient.email}" name = "email" id="email" realname ="{#dico_management_patient_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
													
													<div class=""><input type='checkbox' name='receive_mail' id='receive_mail' value='checked'/><label for = "receive_mail"> {#dico_management_patient_receive_mail#}</label></div>
		
													<div class="mutu">
													
														<div class="row"><label for = "mutuelle">{#dico_management_patient_mutuelle_code#}:</label>
															<select name = "mutuelle_code" id = "mutuelle_code" realname = "{#dico_management_patient_mutuelle_code#}">
																{if $patient.mutuel_code == ""}
																	<option value = "" selected>{#dico_management_patient_chooseone#}</option>
																{/if}
																{section name=mutuelle loop=$mutuelles}
																		<option value = "{$mutuelles[mutuelle].ID}" {if $patient.mutuel_code == $mutuelles[mutuelle].ID}selected{/if}>{$mutuelles[mutuelle].VALUE}</option>
																{/section}
															</select>
														</div>
			
														<div class="row"><label for = "mutuelle_matricule">{#dico_management_patient_mutuelle_matricule#}:</label><input type = "text" readonly value = "{$patient.mutuel_matricule}" name = "mutuelle_matricule" id="mutuelle_matricule" realname ="{#dico_management_patient_mutuelle_matricule#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
														<div class="row"><label for = "ct1ct2">{#dico_management_patient_ct1ct2#}:</label>
															<select name = "ct1ct2" id = "ct1ct2" realname = "{#dico_management_patient_ct1ct2#}">
																{if $patient.ct1ct2 == ""}
																	<option value = "" selected>{#dico_management_patient_chooseone#}</option>
																{/if}
																{section name=ct1ct2 loop=$ct1ct2s}
																	<option {if $patient.ct1ct2 == $ct1ct2s[ct1ct2].ID}selected="selected"{/if} value = "{$ct1ct2s[ct1ct2].ID}">{$ct1ct2s[ct1ct2].VALUE}</option>
																{/section}
															</select>
														</div>
		
														<div class=""><input type='checkbox' name='tiers_payant' id='tiers_payant' {$patient.tiers_payant} value='checked'/><label for = "tiers_payant"> {#dico_management_patient_tiers_payant#}</label></div>
													
														<div class="row"><label for = "sis">{#dico_management_patient_sis#}:</label><input type = "text" value = "{$patient.sis}" name = "sis" id="sis" realname ="{#dico_management_patient_sis#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
														
														<div class="row"><label for = "doctor">{#dico_management_patient_doctor#}:</label><input type = "text" value = "{$patient.doctor}" name = "doctor" id="doctor" realname ="{#dico_management_patient_doctor#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
		
														<div class=""><input type = "checkbox" value = "checked" name = "checkminimum" id="checkminimum" /><label>{#dico_management_patient_checkminimum#}</label></div>
														
														<div class="row"><label for = "fumeur">{#dico_management_patient_fumeur#}:</label><table><tr><td><input type = "radio" value = "oui" name = "fumeur" id="fumeur" {if $patient.fumeur == "oui"}checked{/if} realname ="{#dico_management_patient_fumeur#}" onfocus="javascript:this.select()" autocomplete="off"/>{#dico_management_patient_oui#}</td>
														                                                                                             <td><input type = "radio" value = "non" name = "fumeur" id="fumeur" {if $patient.fumeur == "non" || $patient.fumeur == ""}checked{/if} realname ="{#dico_management_patient_fumeur#}" onfocus="javascript:this.select()" autocomplete="off"/>{#dico_management_patient_non#}</td></tr></table></div>
														
														<div class="row"><label>{#dico_management_patient_obese#}</label><input type = "checkbox" name = "obese" id="obese" {$patient.obese} value='checked' /></div>
		
													</div>
													
					    		                    <div class="clear_both"></div>
					
												</div>
					
											</fieldset>
										</div>	{*fragment 1 end*}
										
										<div id="fragment-2" class="block_in_wrapper">
											<div class="row"><label for = "commentaire">{#dico_management_patient_subtab_comment#}:</label><input type = "text" value = "{$patient.commentaire}" name = "commentaire" id="commentaire" realname ="{#dico_management_patient_subtab_comment#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											<div class="clear_both_b"></div> {*required ... do not delete this row*}
											<div class=""><input type='checkbox' name='tiers_payant_info' id='tiers_payant_info' {$patient.tiers_payant_info} value='checked'/><label for = "tiers_payant_info"> {#dico_management_patient_tiers_payant_info#}</label></div>
											<div class=""><input type='checkbox' name='vipo_info' id='vipo_info' {$patient.vipo_info} value='checked'/><label for = "vipo_info"> {#dico_management_patient_vipo_info#}</label></div>
											<div class=""><input type='checkbox' name='mutuelle_info' id='mutuelle_info' {$patient.mutuelle_info} value='checked'/><label for = "mutuelle_info"> {#dico_management_patient_mutuelle_info#}</label></div>
											<div class=""><input type='checkbox' name='interdit_info' id='interdit_info' {$patient.interdit_info} value='checked'/><label for = "interdit_info"> {#dico_management_patient_interdit_info#}</label></div>
											
											<div class="clear_both_b"></div> {*required ... do not delete this row*}
											<hr>
											<div class="clear_both_b"></div> {*required ... do not delete this row*}
											
											<div class="row">
												<label for = "rating_rendez_vous_info">{#dico_management_patient_rating_rendez_vous_info#}:</label>
												<select name = "rating_rendez_vous_info" id = "rating_rendez_vous_info" realname = "{#dico_management_patient_rating_rendez_vous_info#}" />
												{if $patient.rating_rendez_vous_info == "0"}
													<option value = "" selected>{#dico_management_patient_chooseone#}</option>
												{/if}
												<option {if $patient.rating_rendez_vous_info == "1"}selected="selected"{/if} value = "1">{#dico_management_patient_rating_rdv_1#}</option>
												<option {if $patient.rating_rendez_vous_info == "2"}selected="selected"{/if} value = "2">{#dico_management_patient_rating_rdv_2#}</option>
												<option {if $patient.rating_rendez_vous_info == "3"}selected="selected"{/if} value = "3">{#dico_management_patient_rating_rdv_3#}</option>
												<option {if $patient.rating_rendez_vous_info == "4"}selected="selected"{/if} value = "4">{#dico_management_patient_rating_rdv_4#}</option>
												<option {if $patient.rating_rendez_vous_info == "5"}selected="selected"{/if} value = "5">{#dico_management_patient_rating_rdv_5#}</option>
												</select>
											</div>
											
											<div class="row">
												<label for = "rating_frequentation_info">{#dico_management_patient_rating_frequentation_info#}:</label>
												<select name = "rating_frequentation_info" id = "rating_frequentation_info" realname = "{#dico_management_patient_rating_frequentation_info#}" />
												{if $patient.rating_frequentation_info == "0"}
													<option value = "" selected>{#dico_management_patient_chooseone#}</option>
												{/if}
												<option {if $patient.rating_frequentation_info == "1"}selected="selected"{/if} value = "1">{#dico_management_patient_rating_frequentation_1#}</option>
												<option {if $patient.rating_frequentation_info == "2"}selected="selected"{/if} value = "2">{#dico_management_patient_rating_frequentation_2#}</option>
												<option {if $patient.rating_frequentation_info == "3"}selected="selected"{/if} value = "3">{#dico_management_patient_rating_frequentation_3#}</option>
												<option {if $patient.rating_frequentation_info == "4"}selected="selected"{/if} value = "4">{#dico_management_patient_rating_frequentation_4#}</option>
												<option {if $patient.rating_frequentation_info == "5"}selected="selected"{/if} value = "5">{#dico_management_patient_rating_frequentation_5#}</option>
												</select>
											</div>
											
											<div class="row">
												<label for = "rating_preference_info">{#dico_management_patient_rating_preference_info#}:</label>
												<select name = "rating_preference_info" id = "rating_preference_info" realname = "{#dico_management_patient_rating_preference_info#}" />
												{if $patient.rating_preference_info == "0"}
													<option value = "" selected>{#dico_management_patient_chooseone#}</option>
												{/if}
												<option {if $patient.rating_preference_info == "1"}selected="selected"{/if} value = "1">{#dico_management_patient_rating_preference_1#}</option>
												<option {if $patient.rating_preference_info == "2"}selected="selected"{/if} value = "2">{#dico_management_patient_rating_preference_2#}</option>
												<option {if $patient.rating_preference_info == "3"}selected="selected"{/if} value = "3">{#dico_management_patient_rating_preference_3#}</option>
												<option {if $patient.rating_preference_info == "4"}selected="selected"{/if} value = "4">{#dico_management_patient_rating_preference_4#}</option>
												<option {if $patient.rating_preference_info == "5"}selected="selected"{/if} value = "5">{#dico_management_patient_rating_preference_5#}</option>
												</select>
											</div>
											
											<div class="clear_both_b"></div> {*required ... do not delete this row*}
										</div>  {*fragment 2 end*}
										
										<div id="fragment-3" class="block_in_wrapper">
											
												<textarea id="textcomment" rows="1" cols="1" name="textcomment">{$patient.textcomment}</textarea>
												
											<div class="clear_both_b"></div> {*required ... do not delete this row*}
										</div>  {*fragment 3 end*}
									
								</div> {*block_in_wrapper end*}
					
								<div class="row">
									<label>&nbsp;</label>
									<div class="butn"><button type="submit">{#dico_management_patient_send#}</button></div>
								</div>
					
								</form>		
								<div class="clear_both"></div> {*required ... do not delete this row*}
						
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
			
					</div> {*Block B end*}			
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" titulaire_search="yes" patient_search="yes"}
	
	
	{literal}	
	
	<script type="text/javascript">

		
		var valuebirthday = null;
		
		$(document).ready(function() {
	
		$("#zip1city1").autocomplete("php_request/localite_search.php",
			{
			delay:10,
			minChars:1,
			matchSubset:1,
			matchContains:1,
			cacheLength:10,
			autoFill:true,
			lineSeparator:'#'
			}
		);
		
		$("#form").validate({
			rules: {
			    familyname: "required",
			    firstname: "required",
	    		birthday : { required:true, date: true},
			    gender: {required: function(element){return(!$('#checkminimum').is(':checked'));}},
			    mutuel_code: {required: function(element){return(!$("#checkminimum").is(':checked'));}},
			    mutuel_matricule: {required: function(element){return(!$("#checkminimum").is(':checked'));}},
			    ct1ct2: {required: function(element){return(!$("#checkminimum").is(':checked'));}},
	    		email: { email: true }
   			},
   			messages: {
				familyname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				firstname: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				gender: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				mutuel_code: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				mutuel_matricule: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				ct1ct2: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				birthday: {
 			    	date: "{/literal}{#dico_management_error_date#}{literal}",
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
				email: {
    				email: "{/literal}{#dico_management_error_email#}{literal}"
 				}
			}
		});
		
		
	});
	</script>
	{/literal}	
	
	{literal}
	<script type='text/javascript'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	{/literal}	
	
	
	
	
	
	
	
	
	
	
	
	
	
