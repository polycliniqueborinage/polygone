{include file="template_header.tpl" js_jquery="yes" js_cecodi="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_cecodi.php?action=search">{#dico_management_cecodi_menu_search#}</a>

    				<a href="./management_cecodi.php?action=add">{#dico_management_cecodi_menu_add#}</a>

	  				<a href="./management_cecodi.php?action=list">{#dico_management_cecodi_menu_list#}</a>
						
					<span>{#dico_management_cecodi_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id="systemmsg">
						{if $mode == "saved"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/cecodi.png" alt=""/>{#dico_management_cecodi_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/cecodi.png" alt=""/>{#dico_management_cecodi_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/detail.png" alt="" />
								<span>{$cecodi.company} {$cecodi.familyname} {$cecodi.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											{if $cecodi.type == "client"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_type#}:</b></td><td>{#dico_management_cecodi_client#}</td>
											</tr>
                       						{/if}

											{if $cecodi.type == "supplier"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_type#}:</b></td><td>{#dico_management_cecodi_supplier#}</td>
											</tr>
                       						{/if}
											
											{if $cecodi.type == "medecin"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_type#}:</b></td><td>{#dico_management_cecodi_medecin#}</td>
											</tr>
                       						{/if}
											
											{if $cecodi.type == "mutuel"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_type#}:</b></td><td>{#dico_management_cecodi_mutuel#}</td>
											</tr>
                       						{/if}

											{if $cecodi.type == "other"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_type#}:</b></td><td>{#dico_management_cecodi_other#}</td>
											</tr>
                       						{/if}
											
											{if $cecodi.type == "mutuel"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_cecodi_code#}:</b></td><td>{$cecodi.ID}</td>
											</tr>
                       						{/if}

											<tr valign="top">
                        						{if $cecodi.company}
                        							<td class="label"><b>{#dico_management_cecodi_company#}:</b></td><td>{$cecodi.company}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $cecodi.familyname}
                        							<td class="label"><b>{#dico_management_cecodi_familyname#}:</b></td><td>{$cecodi.familyname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $cecodi.firstname}
                        							<td class="label"><b>{#dico_management_cecodi_firstname#}:</b></td><td>{$cecodi.firstname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_cecodi_address1#}:</b></td><td>{$cecodi.address1} <br/>{$cecodi.zip1} {$cecodi.city1} <br/>{$cecodi.state1} <br/>{$cecodi.country1}</td>
											</tr>
											
											<tr valign="top">
                        						{if $cecodi.workphone}
                        							<td class="label"><b>{#dico_management_cecodi_workphone#}:</b></td><td>{$cecodi.workphone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $cecodi.mobilephone}
                        							<td class="label"><b>{#dico_management_cecodi_mobilephone#}:</b></td><td>{$cecodi.mobilephone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $cecodi.privatephone}
                        							<td class="label"><b>{#dico_management_cecodi_privatephone#}:</b></td><td>{$cecodi.privatephone}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $cecodi.fax}
                        							<td class="label"><b>{#dico_management_cecodi_fax#}:</b></td><td>{$cecodi.fax}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $cecodi.email}
                        							<td class="label"><b>{#dico_management_cecodi_email#}:</b></td><td><a href = "mailto:{$cecodi.email}">{$cecodi.email}</a></td>
                        						{/if}
											</tr>
											
											{if $cecodi.web}
												<tr><td class = "label"><b>{#dico_management_cecodi_web#}:</b></td><td><span style="display:block;clear:both;"><a target="_blank" href = "{$cecodi.web}">{$cecodi.web}</a></span></td></tr>
											{/if}

											{if $cecodi.tva}
												<tr><td class = "label"><b>{#dico_management_cecodi_tva#}:</b></td><td>{$cecodi.tva}</td></tr>
											{/if}

											{if $cecodi.textcomment}
												<tr><td class = "label"><b>{#dico_management_cecodi_textcomment#}:</b></td><td>{$cecodi.textcomment}</td></tr>
											{/if}

											<tr><td class="label"></td><td>
												<a href="management_cecodi.php?action=edit&id={$cecodi.ID}" class="butn_link"><span>{#dico_management_cecodi_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									<a href = "management_cecodi.php?action=vcard&amp;id={$cecodi.ID}" title="{#dico_user_cecodi_vcardexport#}"><img src = "templates/standard/img/symbols/files/text-x-vcard.png" alt="" /></a>

								</div> {*block_in_wrapper end*}

							</div>{*usercecodie end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" cecodi_search="yes"}
	