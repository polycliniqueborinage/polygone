{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_ui_171="yes" js_patient="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_client.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_client.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_client.php?action=list">{#dico_management_patient_menu_list#}</a>
						
					<span>{#dico_management_patient_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "added"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_client_added#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_client_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span>{$client.familyname} {$client.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">
							
								<div id="tab_content">
									<ul>
										<li>
											<a href="#fragment-1"><span>{#dico_management_patient_subtab_general#}</span></a>
										</li>
									</ul>

									<div id="fragment-1" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_birthday#}:</b></td><td>{$client.birthday}</td>
											</tr>

											{if $client.gender == "M"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_gender#}:</b></td><td>{#dico_management_patient_male#}</td>
											</tr>
                       						{/if}

											{if $client.gender == "F"}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_gender#}:</b></td><td>{#dico_management_patient_female#}</td>
											</tr>
                       						{/if}

											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_address1#}:</b></td><td>{$client.address1} <br/>{$client.zip1} {$client.city1} <br/>{$patient.state1} <br/>{$patient.country1}</td>
											</tr>

											{if $client.workphone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_workphone#}:</b></td><td>{$client.workphone}</td>
											</tr>
                       						{/if}

											{if $client.privatephone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_privatephone#}:</b></td><td>{$client.privatephone}</td>
											</tr>
                       						{/if}

											{if $client.mobilephone != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_mobilephone#}:</b></td><td>{$client.mobilephone}</td>
											</tr>
                       						{/if}

											{if $client.email != ""}
											<tr valign="top">
                        						<td class="label"><b>{#dico_management_patient_email#}:</b></td><td>{$client.email}</td>
											</tr>
                       						{/if}

											<tr><td class="label"></td><td>
												<a href="management_client.php?action=edit&id={$client.ID}" class="butn_link"><span>{#dico_management_patient_button_edit#}</span></a>
											</td></tr>

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
	
	{include file="template_left.tpl" client_search="yes"}
	
	
	{literal}
	<script type='text/javascript'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	{/literal}
	
	
	
	
	