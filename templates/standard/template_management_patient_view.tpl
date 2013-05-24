{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_patient="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_patient.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_patient.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_patient.php?action=list">{#dico_management_patient_menu_list#}</a>
						
					<span>{#dico_management_patient_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<span>{$patient.familyname} {$patient.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">
							
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

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_titulaire_name#}:</b></td><td>{$patient.titulaire}</td>
											</tr>

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_birthday#}:</b></td><td>{$patient.birthday}</td>
											</tr>

											{if $patient.gender == "M"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_gender#}:</b></td><td>{#dico_management_patient_male#}</td>
											</tr>
                       						{/if}

											{if $patient.gender == "F"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_gender#}:</b></td><td>{#dico_management_patient_female#}</td>
											</tr>
                       						{/if}

											{if $patient.nationality != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_nationality#}:</b></td><td>{$patient.nationality}</td>
											</tr>
                       						{/if}

											{if $patient.niss != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_niss#}:</b></td><td>{$patient.niss}</td>
											</tr>
                       						{/if}

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_address1#}:</b></td><td>{$patient.address1} <br/>{$patient.zip1} {$patient.city1} <br/>{$patient.state1} <br/>{$patient.country1}</td>
											</tr>

											<!--
											{if $patient.workphone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_workphone#}:</b></td><td>{$patient.workphone}</td>
											</tr>
                       						{/if}
                       						-->
		
											{if $patient.privatephone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_privatephone#}:</b></td><td>{$patient.privatephone}</td>
											</tr>
                       						{/if}

											{if $patient.mobilephone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_mobilephone#}:</b></td><td>{$patient.mobilephone}</td>
											</tr>
                       						{/if}

											{if $patient.fax != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_fax#}:</b></td><td>{$patient.fax}</td>
											</tr>
                       						{/if}

											{if $patient.email != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_email#}:</b></td><td>{$patient.email}</td>
											</tr>
                       						{/if}

											{if $patient.mutuel_code != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_mutuelle_code#}:</b></td><td>{$patient.mutuel_code}</td>
											</tr>
											{/if}

											{if $patient.mutuel_matricule != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_mutuelle_matricule#}:</b></td><td>{$patient.mutuel_matricule}</td>
											</tr>
											{/if}
					
											{if $patient.ct1ct2 != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_ct1ct2#}:</b></td><td>{$patient.ct1ct2}</td>
											</tr>
											{/if}

											{if $patient.sis != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_sis#}:</b></td><td>{$patient.sis}</td>
											</tr>
                       						{/if}

											{if $patient.doctor != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_doctor#}:</b></td><td>{$patient.doctor}</td>
											</tr>
                       						{/if}
                       						
                       						{if $patient.fumeur != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_fumeur#}:</b></td><td>{$patient.fumeur}</td>
											</tr>
                       						{/if}
                       						
                       						{if $patient.obese == "checked"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_obese#}</b></td> 
											</tr>
                       						{/if}

											<tr><td class="label"></td><td>
												<a href="management_patient.php?action=edit&id={$patient.ID}" class="butn_link"><span>{#dico_management_patient_button_edit#}</span></a>
											</td></tr>

										</table>
									
									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									</div> {*block_in_wrapper end*}	
									
									
									
									<div id="fragment-2" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_titulaire_name#}:</b></td><td>{$patient.titulaire}</td>
											</tr>

										{if $patient.commentaire != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_subtab_comment#}:</b></td><td>{$patient.commentaire}</td>
											</tr>
                       					{/if}
                       					</table>
                       					<hr>
                       					<table cellpadding="0" cellspacing="0" width="100%">
										{if $patient.tiers_payant_info == "checked"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_tiers_payant_info#}</b></td>
											</tr>
                       					{/if}
                       					
                       					{if $patient.vipo_info == "checked"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_vipo_info#}</b></td>
											</tr>
                       					{/if}
                       					
                       					{if $patient.mutuelle_info == "checked"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_mutuelle_info#}</b></td>
											</tr>
                       					{/if}                       			
                       					
                       					{if $patient.interdit_info == "checked"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_interdit_info#}</b></td>
											</tr>
                       					{/if}
                       					</table>
                       					{if $patient.interdit_info == "checked" || $patient.mutuelle_info == "checked" || $patient.vipo_info == "checked" || $patient.tiers_payant_info == "checked"}
                       					<hr>
                       					{/if}
                       					<table cellpadding="0" cellspacing="0" width="100%">
                       					<tr valign="top">
                    						<td class="label"><b>{#dico_management_patient_rating_rendez_vous_info#}:</b></td>
                    						<td>{if $patient.rating_rendez_vous_info == "1"}
                    							{#dico_management_patient_rating_rdv_1#}
                    						    {/if}
                    						    {if $patient.rating_rendez_vous_info == "2"}
                    							{#dico_management_patient_rating_rdv_2#}
                    						    {/if}
                    						    {if $patient.rating_rendez_vous_info == "3"}
                    							{#dico_management_patient_rating_rdv_3#}
                    						    {/if}
                    						    {if $patient.rating_rendez_vous_info == "4"}
                    							{#dico_management_patient_rating_rdv_4#}
                    						    {/if}
                    						    {if $patient.rating_rendez_vous_info == "5"}
                    							{#dico_management_patient_rating_rdv_5#}
                    						    {/if}
                    						    {if $patient.rating_rendez_vous_info == "0"}
                    							{#dico_management_patient_rating_not_defined#}
                    						    {/if}
                    						</td>
										</tr>
										
										<tr valign="top">
                    						<td class="label"><b>{#dico_management_patient_rating_frequentation_info#}:</b></td>
                    						<td>{if $patient.rating_frequentation_info == "1"}
                    							{#dico_management_patient_rating_frequentation_1#}
                    						    {/if}
                    						    {if $patient.rating_frequentation_info == "2"}
                    							{#dico_management_patient_rating_frequentation_2#}
                    						    {/if}
                    						    {if $patient.rating_frequentation_info == "3"}
                    							{#dico_management_patient_rating_frequentation_3#}
                    						    {/if}
                    						    {if $patient.rating_frequentation_info == "4"}
                    							{#dico_management_patient_rating_frequentation_4#}
                    						    {/if}
                    						    {if $patient.rating_frequentation_info == "5"}
                    							{#dico_management_patient_rating_frequentation_5#}
                    						    {/if}
                    						    {if $patient.rating_frequentation_info == "0"}
                    							{#dico_management_patient_rating_not_defined#}
                    						    {/if}
											</td>
										</tr>                       					
										
										<tr valign="top">
                    						<td class="label"><b>{#dico_management_patient_rating_preference_info#}:</b></td>
                    						<td>{if $patient.rating_preference_info == "1"}
                    							{#dico_management_patient_rating_preference_1#}
                    						    {/if}
                    						    {if $patient.rating_preference_info == "2"}
                    							{#dico_management_patient_rating_preference_2#}
                    						    {/if}
                    						    {if $patient.rating_preference_info == "3"}
                    							{#dico_management_patient_rating_preference_3#}
                    						    {/if}
                    						    {if $patient.rating_preference_info == "4"}
                    							{#dico_management_patient_rating_preference_4#}
                    						    {/if}
                    						    {if $patient.rating_preference_info == "5"}
                    							{#dico_management_patient_rating_preference_5#}
                    						    {/if}
                    						    {if $patient.rating_preference_info == "0"}
                    							{#dico_management_patient_rating_not_defined#}
                    						    {/if}
											</td>
										</tr>                       					

										</table>
									
									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									</div> {*block_in_wrapper end*}	
									
									
									
									<div id="fragment-3" class="block_in_wrapper">
									
										<table cellpadding="0" cellspacing="0" width="100%">
										
											{section name=tarification loop=$tarifications}
										
											<tr valign="top">
                        						<td>ID</td>
                        						<td>Date</td>
                        						<td>Caisse</td>
                        						<td>Etat</td>
                        						<td>A Payer</td>
                        						<td>Paye</td>
                        						<td>Cloture</td>
											</tr>

											<tr valign="top">
                        						<td>{$tarifications[tarification].id}</td>
                        						<td>{$tarifications[tarification].date}</td>
                        						<td>{$tarifications[tarification].caisse}</td>
                        						<td>{$tarifications[tarification].etat}</td>
                        						<td>{$tarifications[tarification].a_payer}</td>
                        						<td>{$tarifications[tarification].paye}</td>
                        						<td>{$tarifications[tarification].cloture}</td>
											</tr>
											
											<tr valign="top">
    	                    					<td>ID</td>
    	                    					<td>Cecodi</td>
    	                    					<td>cout</td>
    	                    					<td>cout_medecin</td>
    	                    					<td>cout_poly</td>
    	                    					<td>cout_mutuelle</td>
    	                    					<td>caisse</td>
											</tr>

											{section name=tarificationdetail loop=$tarifications[tarification].tarification_details}
											
												<tr valign="top">
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].id}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cecodi}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_medecin}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_poly}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_mutuelle}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].caisse}</td>
												</tr>
						
						
											{/section}
											
											<tr valign="top">
    	                    					<td></td>
											</tr>
											

											{/section}
										
											{if $patient.textcomment != ""}
												<tr valign="top">
	                        						<td class="label"><b>{#dico_management_patient_subtab_comment#}:</b></td><td>{$patient.textcomment}</td>
												</tr>
                       						{/if}
															
										
										</table>

										
									
									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									</div> {*block_in_wrapper end*}		
								
    
								</div>

							</div>{*userpatiente end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" patient_search="yes"}
	
	
	{literal}
	<script type='text/javascript'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	{/literal}
	
	
	
	
	
