{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./admin_people_user.php?action=view">{#dico_admin_people_user_menu_view#}</a>
	  				<a href="./admin_people_user.php?action=list">{#dico_admin_people_user_menu_list#}</a>
					<span>{#dico_admin_people_user_menu_detail#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span>{$user.name}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                        						<td class="label"><b>{#dico_user_profil_name#}:</b></td><td>{$user.familyname} {$user.firstname}</td>
											</tr>
											
											{if $user.birthday}
											<tr valign="top">
                        						<td class="label"><b>{#dico_user_profil_birthday#}:</b></td><td>{$user.birthday}</td>
											</tr>
                       						{/if}
											
											{if $user.gender == "m"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_user_profil_gender#}:</b></td><td>{#dico_user_profil_male#}</td>
											</tr>
                       						{/if}
											
											{if $user.gender == "f"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_user_profil_gender#}:</b></td><td>{#dico_user_profil_female#}</td>
											</tr>
                       						{/if}

											<tr valign="top">
												<td class="label"><b>{#dico_user_profil_address1#}:</b></td>
												<td>
													<span style="display:block;clear:both;">{$user.address1}</span>
													<span style="display:block;clear:both;">{$user.zip1} {$user.city1}</span>
													<span style="display:block;clear:both;">{$user.state1}</span>
													<span style="display:block;clear:both;">{$user.country1}</span>
												</td>
											</tr>
						
											<tr valign="top">
                        						{if $user.workphone}
                        							<td class="label"><b>{#dico_user_profil_workphone#}:</b></td><td>{$user.workphone}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $user.mobilephone}
                        							<td class="label"><b>{#dico_user_profil_mobilephone#}:</b></td><td>{$user.mobilephone}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $user.privatephone}
                        							<td class="label"><b>{#dico_user_profil_privatephone#}:</b></td><td>{$user.privatephone}</td>
                        						{/if}
											</tr>

											<tr valign="fax">
                        						{if $user.fax}
                        							<td class="label"><b>{#dico_user_profil_fax#}:</b></td><td>{$user.fax}</td>
                        						{/if}
											</tr>
										
											<tr valign="top">
                        						{if $user.email}
                        							<td class="label"><b>{#dico_user_profil_email#}:</b></td><td><a href = "mailto:{$user.email}">{$user.email}</a></td>
                        						{/if}
											</tr>

											{if $user.web}
												<tr><td class = "label"><b>{#dico_user_profil_web#}:</b></td><td><span style="display:block;clear:both;"><a target="_blank" href = "{$user.web}">{$user.web}</a></span></td></tr>
											{/if}

											{if $user.company}
												<tr><td class = "label"><b>{#dico_user_profil_company#}:</b></td><td>{$user.company}</td></tr>
											{/if}
						
												<tr><td class = "label"><b>{#dico_admin_people_user_type#}:</b></td><td>{$user.type}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_inami#}:</b></td><td>{$user.inami}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_taux_acte#}:</b></td><td>{$user.taux_acte}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_taux_consultation#}:</b></td><td>{$user.taux_consultation}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_taux_prothese#}:</b></td><td>{$user.taux_prothese}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_code_analytique#}:</b></td><td>{$user.code_analytique}</td></tr>

												<tr><td class = "label"><b>{#dico_admin_people_user_hourly_cost#}:</b></td><td>{$user.hourly_cost}</td></tr>

												{if $agenda_count == -1}
												<tr><td class = "label"><b>Agenda:</b></td><td><a href="admin_people_user.php?action=init_agenda&id={$user.ID}">Initialise Agenda</a></td></tr>
												{/if}
												{if $agenda_count != -1}
												<tr><td class = "label"><b>Agenda entr&eacute;es:</b></td><td>{$agenda_count}</td></tr>
												{/if}
												
												<tr><td class="label"></td><td>
												<a href="admin_people_user.php?action=edit&id={$user.ID}" class="butn_link"><span>{#dico_management_user_button_edit#}</span></a>
												</td>
												

										</table>
									
									</div>

									<div style="float:left;" >
										{if $user.avatar != ""}
											<div class="avatar"><img src = "thumb.php?pic=files/{$cl_config}/avatar/{$user.avatar}" alt="" /></div>
										{else}
											<div class="avatar"><img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
										{/if}
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}

								</div> {*block_in_wrapper end*}

							</div>{*userprofile end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}						
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" medecin_search="no"}
	
	{include file="template_right.tpl" useronline="no" chat="no"}
	