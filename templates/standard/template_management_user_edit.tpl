{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_user="yes" js_form="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./management_user.php">{#dico_management_user_menu_search#}</a>

					{if $user.ID != ""}
	  				<a href="./management_user.php?action=add">{#dico_management_user_menu_add#}</a>
					{/if}
					{if $user.ID == ""}
					<span>{#dico_management_user_menu_add#}</span> 
					{/if}

	  				<a href="./management_user.php?action=list">{#dico_management_user_menu_list#}</a>

					{if $user.ID != ""}
					<span>{#dico_management_user_menu_edit#}</span> 
					{/if}


				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id="systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_user_error1#}</span>
						{/if}
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									{if $user.ID != ""}
										<span>{#dico_management_user_submenu_edit#} {$user.familyname} {$user.firstname}<span>
									{/if}
									{if $user.ID == ""}
										<span>{#dico_management_user_submenu_create#}</span>
									{/if}
									</a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_user.php?action=submit&amp;id={$user.ID}" enctype="multipart/form-data" {literal}onsubmit="return validateCompleteForm(this,'input_error');"{/literal}>
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<input type = "hidden" value = "{$user.ID}" name = "id" id="id" />
											
											<div class="row"><label for="familyname">{#dico_admin_people_user_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$user.familyname}" name = "familyname" id="familyname" class="{$errors.familyname}" realname="{#dico_admin_people_user_familyname#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="firstname">{#dico_admin_people_user_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$user.firstname}" name = "firstname" id="firstname" class="{$errors.firstname}" realname="{#dico_admin_people_user_firstname#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="birthday">{#dico_admin_people_user_birthday#}:</label><input type = "text" value = "{$user.birthday}" name = "birthday" id="birthday" realname="{#dico_admin_people_user_birthday#}" onfocus="javascript:this.select()" onkeyup="javascript:birthdayvalue = checkDate(this, '', '');" autocomplete="off" /></div>

											<div class = "row">
												<label for = "gender">{#dico_admin_people_user_gender#}<span class="mandatory">*</span>:</label>
												<select name = "gender" id = "gender" realname = "{#dico_admin_people_user_gender#}" class="{$errors.gender}" />
												{if $user.gender == ""}
													<option value = "" selected>{#dico_admin_people_user_chooseone#}</option>
												{/if}
												<option {if $user.gender == "m"}selected="selected"{/if} value = "m">{#dico_admin_people_user_male#}</option>
												<option {if $user.gender == "f"}selected="selected"{/if} value = "f">{#dico_admin_people_user_female#}</option>
												</select>
											</div>

											<div class="row">
												<label for = "locale">{#dico_admin_people_user_locale#}:</label>
												<select name = "locale" id="locale">
													<option value = "" {if $user.locale == ""}selected="selected"{/if}>{#dico_admin_people_user_chooseone#}</option>
												{section name = lang loop=$languages_fin}
													<option value = "{$languages_fin[lang].val}" {if $languages_fin[lang].val == $user.locale}selected="selected"{/if}>{$languages_fin[lang].str}</option>
												{/section}
												</select>
											</div>
											
											<div class="row"><label for = "adress1">{#dico_admin_people_user_address1#}:</label><input type = "text" value = "{$user.address1}" name = "address1" id="address1" realname ="{#dico_admin_people_user_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1">{#dico_admin_people_user_zip1city1#}:</label><input type = "text" value = "{$user.zip1} {$user.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_admin_people_user_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1">{#dico_admin_people_user_state1#}:</label><input type = "text" value = "{$user.state1}" name = "state1" id="state1" realname ="{#dico_admin_people_user_state1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1">{#dico_admin_people_user_country1#}:</label><input type = "text" value = "{$user.country1}" name = "country1" id="country1" required="1" realname ="{#dico_admin_people_user_country1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "company">{#dico_admin_people_user_company#}:</label><input type = "text" value = "{$user.company}" name = "company" id="company" realname ="{#dico_admin_people_user_company#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone">{#dico_admin_people_user_workphone#}:</label><input type = "text" value = "{$user.workphone}" name = "workphone" id="workphone" realname ="{#dico_admin_people_user_workphone#}" onfocus="javascript:this.select()" autocomplete="off" /></div>

											<div class="row"><label for = "privatephone">{#dico_admin_people_user_privatephone#}:</label><input type = "text" value = "{$user.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_admin_people_user_privatephone#}" onfocus="javascript:this.select()" autocomplete="off" /></div>

											<div class="row"><label for = "mobilephone">{#dico_admin_people_user_mobilephone#}:</label><input type = "text" value = "{$user.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_admin_people_user_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax">{#dico_admin_people_user_fax#}:</label><input type = "text" value = "{$user.fax}" name = "fax" id="fax" realname ="{#dico_admin_people_user_fax#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email">{#dico_admin_people_user_email#}:</label><input type = "text" value = "{$user.email}" name = "email" id="email" class="{$errors.email}" realname ="{#dico_admin_people_user_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class = "row"><label for = "web">{#dico_admin_people_user_web#}:</label><input type = "text" name = "web" id = "web" realname = "{#dico_admin_people_user_web#}" value = "{$user.web}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="clear_both"></div>
			    		                    <h2>{#dico_admin_people_user_medical#}</h2>
											<br/>

											<div class="row">
												<label for="type">{#dico_admin_people_user_type#}<span class="mandatory">*</span>:</label>
												<select name = "type" id="type" {literal}onchange="javascript:changeType(this.value);"{/literal}  class="{$errors.type}">
													<option value = "" {if $user.type == ""}selected="selected"{/if}>{#dico_admin_people_user_chooseone#}</option>
													<option {if $user.type == "specialist"}selected="selected"{/if} value = "specialiste">{#dico_admin_people_user_specialist#}</option>
													<option {if $user.type == "doctor_with_rate"}selected="selected"{/if} value = "doctor_with_rate">{#dico_admin_people_user_doctor_with_rate#}</option>
													<option {if $user.type == "doctor_without_rate"}selected="selected"{/if} value = "doctor_without_rate">{#dico_admin_people_user_doctor_without_rate#}</option>
													<option {if $user.type == "paramedical"}selected="selected"{/if} value = "paramedical">{#dico_admin_people_user_paramedical#}</option>
													<option {if $user.type == "other"}selected="selected"{/if} value = "other">{#dico_admin_people_user_other#}</option>
												</select>
											</div>
											
											<div class="row"><label for = "speciality">{#dico_admin_people_user_specialite#}:</label>
												<select name = "speciality" id = "speciality" realname = "{#dico_admin_people_user_specialite#}">
													{if $user.speciality == ""}
														<option value = "" selected>{#dico_admin_people_user_chooseone#}</option>
													{/if}
													{section name=speciality loop=$specialities}
														
														<option {if $user.speciality == $specialities[speciality].ID} selected="selected"{/if} value = "{$specialities[speciality].ID}">{$specialities[speciality].VALUE}</option>
													{/section}
												</select>
											</div>
											
											<div class="row"><label for="inami">{#dico_admin_people_user_inami#}:</label><input type = "text" value = "{$user.inami}" name = "inami" id="inami" maxlength="11"  class="{$errors.inami}" realname="{#dico_admin_people_user_inami#}" onKeyUp='javascript:valueinami = checkNumber(this, valueinami, 11, false);' autocomplete='off' onfocus="javascript:this.select()"/></div>
											    
											<div class="clear_both"></div>
			    		                    <h2>{#dico_admin_people_user_agenda#}</h2>
											<br/>
											
											<div class="row"><label for="agenda_slotminutes">{#dico_user_profil_agenda_slotminutes#}:</label>
												<select name="agenda_slotminutes" id="agenda_slotminutes" realname="{#dico_user_profil_agenda_slotminutes#}">
													<option {if $user.agenda_slotminutes == "1"}selected="selected"{/if} value="1">1 minute</option>
													<option {if $user.agenda_slotminutes == "5"}selected="selected"{/if} value="5">5 minutes</option>
													<option {if $user.agenda_slotminutes == "10"}selected="selected"{/if} value="10">10 minutes</option>
													<option {if $user.agenda_slotminutes == "15"}selected="selected"{/if} value="15">15 minutes</option>
													<option {if $user.agenda_slotminutes == "20"}selected="selected"{/if} value="20">20 minutes</option>
													<option {if $user.agenda_slotminutes == "30"}selected="selected"{/if} value="30">30 minutes</option>
													<option {if $user.agenda_slotminutes == "60"}selected="selected"{/if} value="60">60 minutes</option>
													<option {if $user.agenda_slotminutes == "120"}selected="selected"{/if} value="120">120 minutes</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_mintime">{#dico_user_profil_agenda_mintime#}:</label>
												<select name="agenda_mintime" id="agenda_mintime" realname="{#dico_user_profil_agenda_mintime#}">
													<option {if $user.agenda_mintime == "0"}selected="selected"{/if} value="0">0:00</option>
													<option {if $user.agenda_mintime == "1"}selected="selected"{/if} value="1">1:00</option>
													<option {if $user.agenda_mintime == "2"}selected="selected"{/if} value="2">2:00</option>
													<option {if $user.agenda_mintime == "3"}selected="selected"{/if} value="3">3:00</option>
													<option {if $user.agenda_mintime == "4"}selected="selected"{/if} value="4">4:00</option>
													<option {if $user.agenda_mintime == "5"}selected="selected"{/if} value="5">5:00</option>
													<option {if $user.agenda_mintime == "6"}selected="selected"{/if} value="6">6:00</option>
													<option {if $user.agenda_mintime == "7"}selected="selected"{/if} value="7">7:00</option>
													<option {if $user.agenda_mintime == "8"}selected="selected"{/if} value="8">8:00</option>
													<option {if $user.agenda_mintime == "9"}selected="selected"{/if} value="9">9:00</option>
													<option {if $user.agenda_mintime == "10"}selected="selected"{/if} value="10">10:00</option>
													<option {if $user.agenda_mintime == "11"}selected="selected"{/if} value="11">11:00</option>
													<option {if $user.agenda_mintime == "12"}selected="selected"{/if} value="12">12:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_maxtime">{#dico_user_profil_agenda_maxtime#}:</label>
												<select name="agenda_maxtime" id="agenda_maxtime" realname="{#dico_user_profil_agenda_maxtime#}">
													<option {if $user.agenda_maxtime == "13"}selected="selected"{/if} value="13">13:00</option>
													<option {if $user.agenda_maxtime == "14"}selected="selected"{/if} value="14">14:00</option>
													<option {if $user.agenda_maxtime == "15"}selected="selected"{/if} value="15">15:00</option>
													<option {if $user.agenda_maxtime == "16"}selected="selected"{/if} value="16">16:00</option>
													<option {if $user.agenda_maxtime == "17"}selected="selected"{/if} value="17">17:00</option>
													<option {if $user.agenda_maxtime == "18"}selected="selected"{/if} value="18">18:00</option>
													<option {if $user.agenda_maxtime == "19"}selected="selected"{/if} value="19">19:00</option>
													<option {if $user.agenda_maxtime == "20"}selected="selected"{/if} value="20">20:00</option>
													<option {if $user.agenda_maxtime == "21"}selected="selected"{/if} value="21">21:00</option>
													<option {if $user.agenda_maxtime == "22"}selected="selected"{/if} value="22">22:00</option>
													<option {if $user.agenda_maxtime == "23"}selected="selected"{/if} value="23">23:00</option>
													<option {if $user.agenda_maxtime == "24"}selected="selected"{/if} value="24">24:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_firsthour">{#dico_user_profil_agenda_firsthour#}:</label>
												<select name="agenda_firsthour" id="agenda_firsthour" realname="{#dico_user_profil_agenda_maxtime#}">
													<option {if $user.agenda_firsthour == "0"}selected="selected"{/if} value="0">0:00</option>
													<option {if $user.agenda_firsthour == "1"}selected="selected"{/if} value="1">1:00</option>
													<option {if $user.agenda_firsthour == "2"}selected="selected"{/if} value="2">2:00</option>
													<option {if $user.agenda_firsthour == "3"}selected="selected"{/if} value="3">3:00</option>
													<option {if $user.agenda_firsthour == "4"}selected="selected"{/if} value="4">4:00</option>
													<option {if $user.agenda_firsthour == "5"}selected="selected"{/if} value="5">5:00</option>
													<option {if $user.agenda_firsthour == "6"}selected="selected"{/if} value="6">6:00</option>
													<option {if $user.agenda_firsthour == "7"}selected="selected"{/if} value="7">7:00</option>
													<option {if $user.agenda_firsthour == "8"}selected="selected"{/if} value="8">8:00</option>
													<option {if $user.agenda_firsthour == "9"}selected="selected"{/if} value="9">9:00</option>
													<option {if $user.agenda_firsthour == "10"}selected="selected"{/if} value="10">10:00</option>
													<option {if $user.agenda_firsthour == "11"}selected="selected"{/if} value="11">11:00</option>
													<option {if $user.agenda_firsthour == "12"}selected="selected"{/if} value="12">12:00</option>
													<option {if $user.agenda_firsthour == "13"}selected="selected"{/if} value="13">13:00</option>
													<option {if $user.agenda_firsthour == "14"}selected="selected"{/if} value="14">14:00</option>
													<option {if $user.agenda_firsthour == "15"}selected="selected"{/if} value="15">15:00</option>
													<option {if $user.agenda_firsthour == "16"}selected="selected"{/if} value="16">16:00</option>
													<option {if $user.agenda_firsthour == "17"}selected="selected"{/if} value="17">17:00</option>
													<option {if $user.agenda_firsthour == "18"}selected="selected"{/if} value="18">18:00</option>
													<option {if $user.agenda_firsthour == "19"}selected="selected"{/if} value="19">19:00</option>
													<option {if $user.agenda_firsthour == "20"}selected="selected"{/if} value="20">20:00</option>
													<option {if $user.agenda_firsthour == "21"}selected="selected"{/if} value="21">21:00</option>
													<option {if $user.agenda_firsthour == "22"}selected="selected"{/if} value="22">22:00</option>
													<option {if $user.agenda_firsthour == "23"}selected="selected"{/if} value="23">23:00</option>
													<option {if $user.agenda_firsthour == "24"}selected="selected"{/if} value="24">24:00</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_sessionminutes">{#dico_user_profil_agenda_sessionminutes#}:</label>
												<select name="agenda_sessionminutes" id="agenda_sessionminutes" realname="{#dico_user_profil_agenda_sessionminutes#}">
													<option {if $user.agenda_sessionminutes == "1"}selected="selected"{/if} value="1">1 minute</option>
													<option {if $user.agenda_sessionminutes == "5"}selected="selected"{/if} value="5">5 minutes</option>
													<option {if $user.agenda_sessionminutes == "10"}selected="selected"{/if} value="10">10 minutes</option>
													<option {if $user.agenda_sessionminutes == "15"}selected="selected"{/if} value="15">15 minutes</option>
													<option {if $user.agenda_sessionminutes == "20"}selected="selected"{/if} value="20">20 minutes</option>
													<option {if $user.agenda_sessionminutes == "30"}selected="selected"{/if} value="30">30 minutes</option>
													<option {if $user.agenda_sessionminutes == "60"}selected="selected"{/if} value="60">60 minutes</option>
													<option {if $user.agenda_sessionminutes == "120"}selected="selected"{/if} value="120">120 minutes</option>
												</select>
											</div>
											
											<div class="row"><label for="agenda_permission">{#dico_user_profil_agenda_permission#}:</label>
												<select name="agenda_permission" id="agenda_permission" realname="{#dico_user_profil_agenda_permission#}">
													<option {if $user.agenda_permission == "read"}selected="selected"{/if} value="read">Read</option>
													<option {if $user.agenda_permission == "write"}selected="selected"{/if} value="write">Read/Write</option>
												</select>
											</div>
											
											<div class="clear_both"></div>
			    		                    <h2>{#dico_admin_people_user_default_group#}</h2>
											<br/>
											
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
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_admin_people_user_send#}</button></div>
											</div>
										</div>
			
										<div style="float:left;" >
											{if $user.avatar != ""}
											<div class="avatar"><img src = "thumb.php?pic=files/{$cl_config}/avatar/{$user.avatar}" alt="" /></div>
											{else}
											<div class="avatar"><img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
											{/if}
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
	
	{include file="template_left.tpl" medecin_search="no"}

	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		user = $("#id").val();

		//AUTOCOMPLETE
		$("#zip1city1").autocomplete("php_request/localite_search.php", {
			minChars: 1,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#country1").autocomplete("php_request/country_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
		
		$("#state1").autocomplete("php_request/state_search.php", {
			minChars: 0,
			max: 6,
			scroll: false,
			autoFill: true,
			// remove if dont match
			mustMatch: false,
			matchContains: true
		});
				
		// VALIDATION
		jQuery.validator.addMethod("password", function( value, element ) {
			var result = this.optional(element) || /\d/.test(value) && /[a-z]/i.test(value);
			return result;
		}, "");
		
		$("#form").validate({
			rules: {
			    firstname: "required",
			    familyname: "required",
	    		birthday : { date: true},
				gender :  "required",
	    		email: { email: true },
	    		type :  "required",
	    		web: { url: true }
   			},
   			messages: {
				firstname: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				familyname: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				gender: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				birthday: {
 			    	date: "{/literal}{#dico_admin_error_date#}{literal}",
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				email: {
    				email: "{/literal}{#dico_admin_error_email#}{literal}"
 				},
				type: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				web: {
    				url: "{/literal}{#dico_admin_error_web#}{literal}"
 				}
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
	