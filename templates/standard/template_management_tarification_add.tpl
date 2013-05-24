{include file="template_header.tpl" js_jquery="yes" js_jquery_selectable="yes" js_jquery_accordion="yes" js_jquery_datepicker="yes" js_jquery_form="yes" js_thickbox="yes" js_patient="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_patient_tarification_add#}</span> 

    				<a href="./management_patient_add.php">{#dico_management_patient_tarification_load#}</a>

	  				<a href="./management_patient_list.php">{#dico_management_patient_tarification_search#}</a>

	  				<a href="./management_patient_list.php">{#dico_management_patient_tarification_list_day#}</a>

	  				<a href="./management_patient_list.php">{#dico_management_patient_tarification_list_all#}</a>

				</div>
			
				<div class="ViewPane">
				
						<table width="100%">
							<tr>
								<td>
									<div class="block_a">


										<div class="in">
										
										<div class="block_in_wrapper">

										<form class="main" method="post" action="admin_people_group.php?action=addpro">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_patient_search_on_patient#}:</label>
													<input type="text" name="name" id="name" required="1" realname="{#dico_management_patient_search_on_patient#}" onkeyup="javascript:patientCompleteSearch(this.value);" />
												</div>
												<div class="row">
													<label for="name">{#dico_management_patient_search_on_titulaire#}:</label>
													<input type="text" name="name" id="name" required="1" realname="{#dico_management_patient_search_on_titulaire#}" onkeyup="javascript:titulaireCompleteSearch(this.value);"/>
												</div>
												
											</fieldset>
									
										</form>
									
										</div>
					
										<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_action#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_familyname#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_firstname#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_birthday#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_titulaire#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_privatephone#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_mobilephone#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="patientBox">
										
											<!--ul id="accordion_messages">
											
												<li class="bg_a">
												
													<table class="resume" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td class="b" style="width:2%"></td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_action#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_familyname#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_firstname#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_birthday#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_titulaire#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_privatephone#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_mobilephone#}</td>
														</tr>
													</table>
									
												</li>
												
											</ul-->
											
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
								
							
										</div>
									</div>
								</td>
								<td>
									<div class="block_a">
										<div class="in">
										

<div class="block_in_wrapper">

										<form class="main" method="post" action="admin_people_group.php?action=addpro">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_patient_search_on_patient#}:</label>
													<input type="text" name="name" id="name" required="1" realname="{#dico_management_patient_search_on_patient#}" onkeyup="javascript:patientCompleteSearch(this.value);" />
												</div>
												<div class="row">
													<label for="name">{#dico_management_patient_search_on_titulaire#}:</label>
													<input type="text" name="name" id="name" required="1" realname="{#dico_management_patient_search_on_titulaire#}" onkeyup="javascript:titulaireCompleteSearch(this.value);"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_action#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_familyname#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_firstname#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_birthday#}</td>
												<td class="b" style="width:20%">{#dico_management_patient_search_colum_titulaire#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_privatephone#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_mobilephone#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="patientBox">
										
											<!--ul id="accordion_messages">
											
												<li class="bg_a">
												
													<table class="resume" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td class="b" style="width:2%"></td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_action#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_familyname#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_firstname#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_birthday#}</td>
															<td class="b" style="width:20%">{#dico_management_patient_search_colum_titulaire#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_privatephone#}</td>
															<td class="b" style="width:10%">{#dico_management_patient_search_colum_mobilephone#}</td>
														</tr>
													</table>
									
												</li>
												
											</ul-->
											
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>										
										
										
							
										</div>
									</div>
								</td>
							</tr>
						</table>
				
						
					

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" medecin_search="yes"}

	{include file="template_right.tpl"}
