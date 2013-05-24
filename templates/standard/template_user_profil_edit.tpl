{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_user="yes" js_form="yes" password_strength="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_user_profil_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_user_profil_error2#}</span>
						{/if}
						{if $mode == "error3"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_user_profil_error3#}</span>
						{/if}
						{if $mode == "error4"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_user_profil_error4#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<span>{$user.name}</span></a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
								
								<form id="form" class="main" method="post" action="user_profil.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<div class="row"><label for="name">{#dico_user_profil_login#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$user.name}" name = "name" id="name" class="{$errors.name}" realname="{#dico_user_profil_name#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="firstname">{#dico_user_profil_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$user.firstname}" name = "firstname" id="firstname" class="{$errors.firstname}" realname="{#dico_user_profil_firstname#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row"><label for="familyname">{#dico_user_profil_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$user.familyname}" name = "familyname" id="familyname" class="{$errors.familyname}" realname="{#dico_user_profil_familyname#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for="birthday">{#dico_user_profil_birthday#}:</label><input type = "text" value = "{$user.birthday}" name = "birthday" id="birthday" class="{$errors.birthday}" realname="{#dico_user_profil_birthday#}" onkeyup="javascript:birthdayvalue = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "avatar">{#dico_user_profil_avatar#}:</label><input type = "file" class="file" name = "userfile" id="avatar" size="20" /></div>
											
											<div class = "row">
												<label for = "gender">{#dico_user_profil_gender#}<span class="mandatory">*</span>:</label>
												<select name = "gender" id = "gender" realname = "{#dico_user_profil_gender#}" class="{$errors.gender}"/>
												{if $user.gender == ""}
													<option value = "" selected>{#dico_user_profil_chooseone#}</option>
												{/if}
												<option {if $user.gender == "m"}selected="selected"{/if} value = "m">{#dico_user_profil_male#}</option>
												<option {if $user.gender == "f"}selected="selected"{/if} value = "f">{#dico_user_profil_female#}</option>
												</select>
											</div>

											<div class="row">
												<label for = "locale">{#dico_user_profil_locale#}:</label>
												<select name = "locale" required="0" id="locale">
													<option value = "" {if $user.locale == ""}selected="selected"{/if}>{#dico_user_profil_chooseone#}</option>
												{section name = lang loop=$languages_fin}
													<option value = "{$languages_fin[lang].val}" {if $languages_fin[lang].val == $user.locale}selected="selected"{/if}>{$languages_fin[lang].str}</option>
												{/section}
												</select>
											</div>
											
											<div class="row"><label for = "address1">{#dico_user_profil_address1#}:</label><input type = "text" value = "{$user.address1}" name = "address1" id="address1" realname ="{#dico_user_profil_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1">{#dico_user_profil_zip1city1#}:</label><input type = "text" value = "{$user.zip1} {$user.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_user_profil_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "state1">{#dico_user_profil_state1#}:</label><input type = "text" value = "{$user.state1}" name = "state1" id="state1" realname ="{#dico_user_profil_state1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "country1">{#dico_user_profil_country1#}:</label><input type = "text" value = "{$user.country1}" name = "country1" id="country1" realname ="{#dico_user_profil_country1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "workphone">{#dico_user_profil_workphone#}:</label><input type = "text" value = "{$user.workphone}" name = "workphone" id="workphone" realname ="{#dico_user_profil_workphone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "mobilephone">{#dico_user_profil_mobilephone#}:</label><input type = "text" value = "{$user.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_user_profil_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "privatephone">{#dico_user_profil_privatephone#}:</label><input type = "text" value = "{$user.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_user_profil_privatephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "fax">{#dico_user_profil_fax#}:</label><input type = "text" value = "{$user.fax}" name = "fax" id="fax" realname ="{#dico_user_profil_fax#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email">{#dico_user_profil_email#}:</label><input type="text" name="email" id="email" value = "{$user.email}" class="{$errors.email}" realname ="{#dico_user_profil_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class = "row"><label for = "web">{#dico_user_profil_web#}:</label><input type = "text" name = "web" id = "web" realname = "{#dico_user_profil_web#}" value = "{$user.web}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "company">{#dico_user_profil_company#}:</label><input type = "text" value = "{$user.company}" name = "company" id="company"  realname ="{#dico_user_profil_company#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

			    		                    <div class="clear_both"></div>
					                        <h2>{#dico_user_profil_agenda_config#}</h2>
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

			    		                    <div class="clear_both"></div>
					                        <h2>{#dico_user_profil_changepassword#}</h2>
					                        <br/>
			
					                        <div class="row"><label for = "oldpass">{#dico_user_profil_oldpass#}:</label><input type = "password" name = "oldpass" id = "oldpass" /></div>
					                        <div class="row"><label for = "newpass">{#dico_user_profil_newpass#}:</label><input class="password_test" type = "password" name = "newpass" id = "newpass" /></div>
					                        <div class="row"><label for = "repeatpass">{#dico_user_profil_repeatpass#}:</label><input type = "password" name = "repeatpass" id = "repeatpass"/></div>
					                        <div class="row"><label for = "repeatpass">{#dico_user_profil_hacktime#}:</label><span id="info"></span></div>
			
			

											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_user_profil_send#}</button></div>
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
	
	{include file="template_left.tpl" medecin_search="yes"}

	{include file="template_right.tpl" useronline="no" chat="no"}
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$('#repeatpass').pwdstr('#info');
		
		$(".password_test").passStrength({
			userid:	"#name"
		});
	
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
		//jQuery.validator.addMethod("password", function( value, element ) {
		//	var result = this.optional(element) || /\d/.test(value) && /[a-z]/i.test(value);
		//	return result;
		//}, "");
		
		jQuery.validator.addMethod("password", function( password, element ) {
		
			if (password=="") return true;
			var score = 0; 
	 		
	 		//password length
		 	score += password.length * 4;
		 	score += ( $.fn.checkRepetition(1,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(2,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(3,password).length - password.length ) * 1;
		 	score += ( $.fn.checkRepetition(4,password).length - password.length ) * 1;
		 	
		 	//password has 3 numbers
		 	if (password.match(/(.*[0-9].*[0-9].*[0-9])/)){ score += 5;} 
		 			    
		 	//password has 2 symbols
		 	if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)){ score += 5 ;}
		 			    
		 	//password has Upper and Lower chars
		 	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){  score += 10;} 
		 			    
		 	//password has number and chars
		 	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){  score += 15;} 
		 			    //
		 	//password has number and symbol
		 	if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/)){  score += 15;} 
		 			    
		 	//password has char and symbol
		 	if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/)){score += 15;}
		 			    
		 	//password is just a numbers or chars
		 	if (password.match(/^\w+$/) || password.match(/^\d+$/) ){ score -= 10;}
	
			if ( score < 0 ){score = 0;}
		 	if ( score > 100 ){  score = 100;} 
		 			    
			if (score > 68 ){ return true; }
			else { return false; }
			
			}, "");
		 			    
		
		$("#form").validate({
			rules: {
			    name: "required",
			    firstname: "required",
			    familyname: "required",
	    		birthday : { date: true },
				gender :  "required",
	    		email: { email: true },
	    		web : { url: true},
	    		oldpass  : { remote: "php_request/check_password.php", required: function(element){return $("#newpass").val() != '';} },
	    		newpass  : { minlength:6, password: true, required: function(element){return $("#oldpass").val() != '';} },
	    		repeatpass  : { equalTo:"#newpass" }
   			},
   			messages: {
				email: {
    				email: "{/literal}{#dico_user_error_email#}{literal}"
 				},
				name: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				},
				firstname: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				},
				familyname: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				},
				gender: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}"
 				},
				birthday: {
 			    	date: "{/literal}{#dico_user_error_date#}{literal}"
 				},
				web: {
 			    	url: "{/literal}{#dico_user_error_web#}{literal}"
 				},
				oldpass: {
 			    	remote: "{/literal}{#dico_user_error_oldpass#}{literal}",
 			    	required: "{/literal}{#dico_user_error_required#}{literal}" 
 				},
				newpass: {
 			    	minlength: "{/literal}{#dico_user_error_minlength#}{literal}",
 			    	required: "{/literal}{#dico_user_error_required#}{literal}",
 			    	password: "{/literal}{#dico_user_error_password#}{literal}"
 				},
				repeatpass: {
 			    	equalTo: "{/literal}{#dico_user_error_equalTo#}{literal}"
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
	
	
	
	
	