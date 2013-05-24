{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_patient="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
 
	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_client.php?action=search">{#dico_management_patient_menu_search#}</a>

					{if $client.ID != ""}
	  				<a href="./management_client.php?action=add">{#dico_management_patient_menu_add#}</a>
					{/if}
					{if $client.ID == ""}
					<span>{#dico_management_patient_menu_edit#}</span> 
					{/if}

	  				<a href="./management_client.php?action=list">{#dico_management_patient_menu_list#}</a>

					{if $client.ID != ""}
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
									{if $client.ID != ""}
										<span>{#dico_management_client_submenu_edit#} {$client.familyname} {$client.firstname}</span>
									{/if}
									{if $client.ID == ""}
										<span>{#dico_management_client_submenu_create#}</span>
									{/if}
								</a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_client.php?action=submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
											
											<div class="row">
												<label for="btn_idcard">{#dico_management_patient_btn_idcard#}:</label><button id="btn_idcard" type="button" onclick="ReadCard()"><img src="templates/standard/img/48x48/Download.ico" alt=""/></button>
											</div>
											
											<div class="row"><label>&nbsp;</label><label>&nbsp;</label></div>
											
											<input type = "hidden" value = "{$client.ID}" name = "id" id="id" />
							
											<div class="row"><label for = "familyname" class="mandatory">{#dico_management_patient_familyname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$client.familyname}" name = "familyname" id="familyname" realname="{#dico_management_patient_familyname#}" onfocus="javascript:this.select()" onkeyup="javascript:clientSimpleSearch('', this.value + ' ' +  $('#firstname').val());" autocomplete="off"/></div>
							
											<div class="row"><label for = "firstname" class="mandatory">{#dico_management_patient_firstname#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$client.firstname}" name = "firstname" id="firstname" realname="{#dico_management_patient_firstname#}" onfocus="javascript:this.select()" onkeyup="javascript:clientSimpleSearch('', $('#familyname').val() + ' ' + this.value);" autocomplete="off"/></div>
											
											<div class="row"><label for = "birthday" class="mandatory">{#dico_management_patient_birthday#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$client.birthday}" name = "birthday" id="birthday" realname="{#dico_management_patient_birthday#}" onkeyup="javascript:valuebirthday = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class = "row">
												<label for = "gender">{#dico_management_patient_gender#}</label>
												<select name = "gender" id = "gender" realname = "{#dico_management_patient_gender#}"/>
												{if $patient.gender == ""}
													<option value = "" selected>{#dico_management_patient_chooseone#}</option>
												{/if}
												<option {if $client.gender == "M"}selected="selected"{/if} value = "M">{#dico_management_patient_male#}</option>
												<option {if $client.gender == "F"}selected="selected"{/if} value = "F">{#dico_management_patient_female#}</option>
												</select>
											</div>
                                            
											<div class="row"><label for = "address1">{#dico_management_patient_address1#}:</label><input type = "text" value = "{$client.address1}" name = "address1" id="address1" realname ="{#dico_management_patient_address1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "zip1city1">{#dico_management_patient_zip1city1#}:</label><input type = "text" value = "{$client.zip1} {$patient.city1}" name = "zip1city1" id="zip1city1" realname ="{#dico_management_patient_zip1city1#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "privatephone">{#dico_management_patient_privatephone#}:</label><input type = "text" value = "{$client.privatephone}" name = "privatephone" id="privatephone" realname ="{#dico_management_patient_privatephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "mobilephone">{#dico_management_patient_mobilephone#}:</label><input type = "text" value = "{$client.mobilephone}" name = "mobilephone" id="mobilephone" realname ="{#dico_management_patient_mobilephone#}" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "email">{#dico_management_patient_email#}:</label><input type = "text" value = "{$client.email}" name = "email" id="email" realname ="{#dico_management_patient_email#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
			    		                    <div class="clear_both"></div>
			
					                        <div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_patient_send#}</button></div>
											</div>
										</div>
			
										<div style="float:left;" >
											<applet
                                        		codebase = "."
                               	            	archive  = "beidlib.jar"
                                            	code     = "be.belgium.eid.BEID_Applet.class"
                                            	name     = "BEIDApplet"
                                            	width    = "140"
                                            	height   = "200"
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
	
	{include file="template_left.tpl" client_search="yes"}

	{literal}
	<script type="text/javascript">
	
		var valuebirthday = null;
		
		$(document).ready(function() {
		
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

			$("#form").validate({
				rules: {
				    familyname: "required",
				    firstname: "required",
		    		birthday : { date: true},
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

	</script>
	
	<script language="javascript">
    
	    function getIDData(){
			var strTemp;
	        var strTemp2;
	        var strTemp3;
	      	var nomPrenom;
	        strTemp = document.BEIDApplet.getCardNumber() + "&nbsp;";
	        //document.getElementById('cardNumberField').innerHTML = strTemp;
	        strTemp = document.BEIDApplet.getChipNumber() + "&nbsp;";
	        //document.getElementById('chipNumberField').innerHTML = strTemp;
	        strTemp = document.BEIDApplet.getValidityDateBegin() + "&nbsp;";
	        //document.getElementById('valBeginField').innerHTML = strTemp;
	        strTemp = document.BEIDApplet.getValidityDateEnd() + "&nbsp;";
	        //document.getElementById('valEndField').innerHTML = strTemp;
	        strTemp = document.BEIDApplet.getIssMunicipality() + "&nbsp;";
	        //document.getElementById('issMunicField').innerHTML = strTemp;
	        
	        strTemp = document.BEIDApplet.getNationalNumber();
	        //document.getElementById('niss').value = strTemp;
	        
	        strTemp = document.BEIDApplet.getName();
	        nomPrenom = strTemp;
	        document.getElementById('familyname').value = strTemp;
	
	        strTemp = document.BEIDApplet.getFirstName1();
	        strTemp2 = document.BEIDApplet.getFirstName2();
	        strTemp3 = document.BEIDApplet.getFirstName3();
	        document.getElementById('firstname').value = strTemp + " " + strTemp2 + " " + strTemp3;
	        nomPrenom += " " + strTemp + " " + strTemp2 + " " + strTemp3;
	
	        //document.getElementById('findPatientInput').value=nomPrenom;
	 		//patient_recherche_simple(nomPrenom);
	
	        //document.getElementById('titulaire').value = document.getElementById('nom').value + " " + document.getElementById('prenom').value;
	
	        strTemp = document.BEIDApplet.getNationality();
	        //document.getElementById('nationality').value = strTemp;
	
	        strTemp = document.BEIDApplet.getBirthLocation();
	        //document.getElementById('birthLocField').innerHTML = strTemp;
	        strTemp = document.BEIDApplet.getBirthDate();
	        strTemp = strTemp.substr(6, 2) + "/" + strTemp.substr(4, 2) + "/" + strTemp.substr(0, 4);
	        document.getElementById('birthday').value = strTemp;
	        strTemp = document.BEIDApplet.getSex();
	
	        document.getElementById('gender').value = strTemp; 
	        //document.getElementById('sexField').innerHTML = strTemp;
	        //document.BEIDApplet.getNobleCondition();
	        //document.BEIDApplet.getWhiteCane();
	        //document.BEIDApplet.getYellowCane();
	        //document.BEIDApplet.getExtendedMinority();
		}
	    
	    function getAddressData() {
			var strTemp;
	        var strTemp2;
	        var strTemp3;
	        strTemp = document.BEIDApplet.getStreet();
	        document.getElementById('address1').value = strTemp; 
	        //strTemp2 = document.BEIDApplet.getStreetNumber();
	        //strTemp3 = document.BEIDApplet.getBoxNumber();
	        //document.getElementById('numero').value = strTemp2 + "/" + strTemp3;
	        strTemp = document.BEIDApplet.getZip();
	        strTemp2 = document.BEIDApplet.getMunicipality();
	        document.getElementById('zip1city1').value = strTemp + " " + strTemp2;
	        strTemp = document.BEIDApplet.getCountry();
	        if(strTemp == "" && strTemp2 != ""){
	 			strTemp = "be";
			}
	        //document.getElementById('countryField').innerHTML = strTemp + "&nbsp;";
		}    
	    function ReadCard(){
			var retval;
	              var arr = new Array();
	        //EmptyScreen();
	        //document.getElementById('StatusField').innerHTML = "Lecture de la carte d'identité en cours...";
	        retval = document.BEIDApplet.InitLib(null);
	        if(retval == 0) {
				//document.getElementById('StatusField').innerHTML = "Reading Identity, please wait...";
	            getIDData();
	            //document.getElementById('StatusField').innerHTML = "Reading Address, please wait...";
	            getAddressData();
	            //document.getElementById('StatusField').innerHTML = "Reading Picture, please wait...";
	            retval = document.BEIDApplet.GetPicture();
	            if(retval != null) {
	                      
	                      var temp;
	                      var fin;
	                      
	                      temp="";
	                      fin ="";
	                      
	                      for(i=0; i<retval.length; i++)
	                      {
	                               temp = retval[i];
	                               fin += temp.toString(32);
	                      }
	                      
	                      document.getElementById('photo').value = fin;
	                
	          	}
	
	            document.BEIDApplet.ExitLib();
	            //document.getElementById('StatusField').innerHTML = "Lecture réussie";
			} else {
				//document.getElementById('StatusField').innerHTML = "Erreur lors de la lecture";
	        }
	        //var sURL = unescape(window.location.pathname);
	        //window.location.href = sURL;
		}
    </script>
	
	{/literal}