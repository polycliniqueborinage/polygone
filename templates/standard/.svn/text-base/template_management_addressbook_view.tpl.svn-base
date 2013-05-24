{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_thickbox="yes" js_addressbook="yes" js_form="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_addressbook.php?action=search">{#dico_management_addressbook_menu_search#}</a>

    				<a href="./management_addressbook.php?action=add">{#dico_management_addressbook_menu_add#}</a>

	  				<a href="./management_addressbook.php?action=list">{#dico_management_addressbook_menu_list#}</a>
						
					<span>{#dico_management_addressbook_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id="systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/addressbook.png" alt=""/>{#dico_management_addressbook_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/addressbook.png" alt=""/>{#dico_management_addressbook_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/detail.png" alt="" />
								<span>{$addressbook.company} {$addressbook.familyname} {$addressbook.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											{if $addressbook.type == "client"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_type#}:</b></td><td>{#dico_management_addressbook_client#}</td>
											</tr>
                       						{/if}

											{if $addressbook.type == "supplier"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_type#}:</b></td><td>{#dico_management_addressbook_supplier#}</td>
											</tr>
                       						{/if}
											
											{if $addressbook.type == "doctor"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_type#}:</b></td><td>{#dico_management_addressbook_doctor#}</td>
											</tr>
                       						{/if}
											
											{if $addressbook.type == "mutuel"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_type#}:</b></td><td>{#dico_management_addressbook_mutuel#}</td>
											</tr>
                       						{/if}

											{if $addressbook.type == "other"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_type#}:</b></td><td>{#dico_management_addressbook_other#}</td>
											</tr>
                       						{/if}
											
											{if $addressbook.type == "mutuel"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_code#}:</b></td><td>{$addressbook.ID}</td>
											</tr>
                       						{/if}

											{if $addressbook.type == "doctor"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_speciality#}:</b></td><td>{$addressbook.speciality}</td>
											</tr>
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_addressbook_inami#}:</b></td><td>{$addressbook.inami}</td>
											</tr>
                       						{/if}

											<tr valign="top">
                        						{if $addressbook.company}
                        							<td class="label"><b>{#dico_management_addressbook_company#}:</b></td><td>{$addressbook.company}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $addressbook.familyname}
                        							<td class="label"><b>{#dico_management_addressbook_familyname#}:</b></td><td>{$addressbook.familyname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $addressbook.firstname}
                        							<td class="label"><b>{#dico_management_addressbook_firstname#}:</b></td><td>{$addressbook.firstname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_addressbook_address1#}:</b></td><td>{$addressbook.address1} <br/>{$addressbook.zip1} {$addressbook.city1} <br/>{$addressbook.state1} <br/>{$addressbook.country1}</td>
											</tr>
											
											<tr valign="top">
                        						{if $addressbook.workphone}
                        							<td class="label"><b>{#dico_management_addressbook_workphone#}:</b></td><td>{$addressbook.workphone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $addressbook.mobilephone}
                        							<td class="label"><b>{#dico_management_addressbook_mobilephone#}:</b></td><td>{$addressbook.mobilephone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $addressbook.privatephone}
                        							<td class="label"><b>{#dico_management_addressbook_privatephone#}:</b></td><td>{$addressbook.privatephone}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $addressbook.fax}
                        							<td class="label"><b>{#dico_management_addressbook_fax#}:</b></td><td>{$addressbook.fax}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $addressbook.email}
                        							<td class="label"><b>{#dico_management_addressbook_email#}:</b></td><td><a href = "mailto:{$addressbook.email}">{$addressbook.email}</a></td>
                        						{/if}
											</tr>
											
											{if $addressbook.web}
												<tr><td class = "label"><b>{#dico_management_addressbook_web#}:</b></td><td><span style="display:block;clear:both;"><a target="_blank" href = "{$addressbook.web}">{$addressbook.web}</a></span></td></tr>
											{/if}

											{if $addressbook.tva}
												<tr><td class = "label"><b>{#dico_management_addressbook_tva#}:</b></td><td>{$addressbook.tva}</td></tr>
											{/if}

											{if $addressbook.textcomment}
												<tr><td class = "label"><b>{#dico_management_addressbook_textcomment#}:</b></td><td>{$addressbook.textcomment}</td></tr>
											{/if}

											<tr><td class="label"></td><td>
												<a href="management_addressbook.php?action=edit&id={$addressbook.ID}" class="butn_link"><span>{#dico_management_addressbook_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									<a href = "management_addressbook.php?action=vcard&amp;id={$addressbook.ID}" title="{#dico_user_addressbook_vcardexport#}"><img src = "templates/standard/img/symbols/files/text-x-vcard.png" alt="" /></a>

								</div> {*block_in_wrapper end*}

							</div>{*useraddressbooke end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" addressbook_search="yes"}
	