{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_debt="yes"}

	<div id="middle">
    	
		{if $modules.management_debt_adminstate == 3}
			{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_debt_adminstate == 4}
			{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_debt.php?action=search">{#dico_management_debt_menu_search#}</a>

    				<a href="./management_debt.php?action=add">{#dico_management_debt_menu_add#}</a>

	  				<a href="./management_debt.php?action=list">{#dico_management_debt_menu_list#}</a>
						
    				<a href="./management_debt.php?action=contact_list">{#dico_management_debt_menu_contact_list#}</a>

					<span>{#dico_management_debt_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/debt.png" alt=""/>{#dico_management_debt_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/debt.png" alt=""/>{#dico_management_debt_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/debt.png" alt="" />
								<span>{#dico_management_debt_submenu_view#} {$debt.familyname} {$debt.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_debt_amount#}:</b></td><td>{$debt.amount} {#dico_general_devise#}</td>
											</tr>

											<tr valign="top">
                        						{if $debt.creation_date}
                        							<td class="label"><b>{#dico_management_debt_creation_date#}:</b></td><td>{$debt.creation_date}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $debt.familyname}
                        							<td class="label"><b>{#dico_management_debt_familyname#}:</b></td><td>{$debt.familyname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $debt.firstname}
                        							<td class="label"><b>{#dico_management_debt_firstname#}:</b></td><td>{$debt.firstname}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_debt_address1#}:</b></td><td>{$debt.address1} <br/>{$debt.zip1} {$debt.city1} <br/>{$debt.state1} <br/>{$debt.country1}</td>
											</tr>
											
											<tr valign="top">
                        						{if $debt.workphone}
                        							<td class="label"><b>{#dico_management_debt_workphone#}:</b></td><td>{$debt.workphone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $debt.mobilephone}
                        							<td class="label"><b>{#dico_management_debt_mobilephone#}:</b></td><td>{$debt.mobilephone}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $debt.privatephone}
                        							<td class="label"><b>{#dico_management_debt_privatephone#}:</b></td><td>{$debt.privatephone}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $debt.fax}
                        							<td class="label"><b>{#dico_management_debt_fax#}:</b></td><td>{$debt.fax}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $debt.email}
                        							<td class="label"><b>{#dico_management_debt_email#}:</b></td><td><a href = "mailto:{$debt.email}">{$debt.email}</a></td>
                        						{/if}
											</tr>
											
											{if $debt.textcomment_addressbook}
												<tr><td class = "label"><b>{#dico_management_debt_textcomment_addressbook#}:</b></td><td>{$debt.textcomment_addressbook}</td></tr>
											{/if}
											
											{if $debt.textcomment_debt}
												<tr><td class = "label"><b>{#dico_management_debt_textcomment_debt#}:</b></td><td>{$debt.textcomment_debt}</td></tr>
											{/if}
											

											<tr><td class="label"></td><td>
												<a href="management_debt.php?action=edit&id={$debt.ID}" class="butn_link"><span>{#dico_management_debt_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	

								</div> {*block_in_wrapper end*}

							</div>{*userdebte end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" debt_search="yes"}
	