{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jquery_autocomplete="yes" js_thickbox="yes" js_acte="yes" js_form="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_acte.php?action=search">{#dico_management_acte_menu_search#}</a>

    				<a href="./management_acte.php?action=add">{#dico_management_acte_menu_add#}</a>

	  				<a href="./management_acte.php?action=list">{#dico_management_acte_menu_list#}</a>
						
					<span>{#dico_management_acte_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "edited"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_acte_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span>{#dico_management_acte_submenu_view#} "{$acte.code}"</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                        						{if $acte.code}
                        							<td class="label"><b>{#dico_management_acte_code#}:</b></td><td>{$acte.code}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.description}
                        							<td class="label"><b>{#dico_management_acte_description#}:</b></td><td>{$acte.description}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.cecodis}
                        							<td class="label"><b>{#dico_management_acte_cecodis#}:</b></td><td>{$acte.cecodis}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.couttr}
                        							<td class="label"><b>{#dico_management_acte_couttr#}:</b></td><td>{$acte.couttr}</td>
                        						{/if}
											</tr>
											
											<tr valign="top">
                        						{if $acte.couttp}
                        							<td class="label"><b>{#dico_management_acte_couttp#}:</b></td><td>{$acte.couttp}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.coutvp}
                        							<td class="label"><b>{#dico_management_acte_coutvp#}:</b></td><td>{$acte.coutvp}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.coutsm}
                        							<td class="label"><b>{#dico_management_acte_coutsm#}:</b></td><td>{$acte.coutsm}</td>
                        						{/if}
											</tr>

											<tr valign="top">
                        						{if $acte.length}
                        							<td class="label"><b>{#dico_management_acte_length#}:</b></td><td>{$acte.length}</td>
                        						{/if}
											</tr>

											<tr><td class="label"></td><td>
												<a href="management_acte.php?action=edit&id={$acte.ID}" class="butn_link"><span>{#dico_management_acte_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
								</div> {*block_in_wrapper end*}

							</div>{*useractee end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" acte_search="yes"}
	
	
	
	