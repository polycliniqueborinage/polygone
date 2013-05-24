{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_patient="yes"}

	<div id="middle">
    	
		{if $modules.management_ouvrier_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_ouvrier_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_ouvrier.php">{#dico_ouvrier_menu_search#}</a>
						
    				<a href="./management_ouvrier.php?action=add">{#dico_ouvrier_menu_add#}</a>

	  				<a href="./management_ouvrier.php?action=list">{#dico_ouvrier_menu_list#}</a>
						
					<span>{#dico_ouvrier_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_ouvrier_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_ouvrier_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span>{#dico_ouvrier_submenu_view#} {$ouvrier.familyname} {$ouvrier.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">
							
								<div id="tab_content">

									<div id="fragment-1" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b>{#dico_ouvrier_name#}:</b></td><td>{$ouvrier.nom} {$ouvrier.prenom}</td>
											</tr>

											<tr valign="top">
                       							<td class="label"><b>{#dico_ouvrier_salaire_horaire#}:</b></td><td>{$ouvrier.salaire_horaire}</td>
											</tr>
											
											<tr valign="top">
                       							<td class="label"><b>{#dico_ouvrier_bonus_recurrent#}:</b></td><td>{$ouvrier.bonus_recurrent}</td>
											</tr>
											
											<tr valign="top">
                       							<td class="label"><b>{#dico_ouvrier_cout_recurrent#}:</b></td><td>{$ouvrier.cout_recurrent}</td>
											</tr>
											
											<tr>
												<td class="label"></td><td>
													<a href="management_ouvrier.php?action=edit&id={$ouvrier.ID}" class="butn_link"><span>{#dico_button_edit#}</span></a>
												</td>
											</tr>
											
							
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
	
	