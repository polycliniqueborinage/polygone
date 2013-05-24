{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" }
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state">{#dico_management_comptabilite_display_state#}</a>
    				<a href="./management_comptabilite.php?action=overview_account">{#navigation_title_management_comptabilite_overview#}</a>
    				<span>{#dico_management_comptabilite_overview_comparison#}</span>
    				<a href="./management_comptabilite.php?action=modify_account">{#dico_management_comptabilite_modify_account#}</a>
    				<a href="./management_comptabilite.php?action=display_graphe">{#navigation_title_management_comptabilite_stat_comptagene#}</a>
    				<!--<a href="./management_comptabilite.php?action=display_histo">{#navigation_title_management_comptabilite_stat_comptagene_histo#}</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow">{#navigation_title_management_comptabilite_add#}</a>
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_comptabilite_parametres#}</span>
									</a>
								</h2>
							</div>
			
							
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=comparison_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div>
										
											
											<div class="row"><label for = "mois">  {#dico_comptabilite_upload_comptes_mois#}: </label><input type = "text" name = "mois"   id="mois"   realname="{#dico_management_comptabilite_mois#}"  value={$mois}   autocomplete="off" maxlength = "2"/></div>
											<div class="row"><label for = "annee1">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee1" id="annee1" realname="{#dico_management_comptabilite_annee#}" value={$annee1} autocomplete="off" maxlength = "4"/></div>
											<div class="row"><label for = "annee2">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee2" id="annee2" realname="{#dico_management_comptabilite_annee#}" value={$annee2} autocomplete="off" maxlength = "4"/></div>
											<div class="row"><label for = "numero_compte">{#dico_management_comptabilite_numero_compte#}:</label><input type = "text" name = "numero_compte" id="numero_compte" realname="{#dico_management_comptabilite_numero_compte#}" value='{$account}' autocomplete="off"/></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>
											
										</div>
			
									</fieldset>
									
								</form>
								
								</div>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								<div>
											
								</div>
								
								<div class="headline">
					
								<h2>
									<a href="management_comptabilite.php?action=print_comparison&mois={$mois}&annee1={$annee1}&annee2={$annee2}&account={$account}" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</h2>
								
								</div>
								
								<div>
								{section name=compte loop=$comptes}
									<div>
										{if $comptes[compte].numero == 'Total'}
											<h4><u>{$comptes[compte].numero} - {$comptes[compte].descr}</u></h4>
										{else}
											<a target="_blank" href="management_comptabilite.php?action=show_details&numero_compte={$comptes[compte].numero}&annee={$annee1}"><h4><u>{$comptes[compte].numero} - {$comptes[compte].descr}</u></h4></a>
										{/if}
										<table width="60%" border='1' cellpadding="0" cellspacing="0">
											<tr>
												<td align="center" width="25%">
												{#dico_management_comptabilite_cumul_annee#} {$annee2}  
												</td>
												<td align="center" width="25%">
												{#dico_management_comptabilite_cumul_annee#} {$annee1}
												</td>
												<td align="center" width="25%">
												{#dico_management_comptabilite_delta#}
												</td>
												<td align="center" width="25%">
												{#dico_management_comptabilite_delta_pourcentage#}
												</td>
											</tr>
											
											<tr>
											<td align="center" width="25%">
											{$comptes[compte].prevcumul}
											</td>
											<td align="center" width="25%">
											{$comptes[compte].cumul}
											</td>
											<td align="center" width="25%">
											{$comptes[compte].delta}
											</td>
											<td align="center" width="25%">
											{$comptes[compte].pourcentage}
											</td>
											</tr>
										</table>
										    
								    </div>
							    {/section}
								</div>
								<div class="table_body">
								</div> {*Table_Body End*}
								
								</div> {*block_in_wrapper end*}
			
							
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
					
					</div> {*Block B end*}	
					
				</div>
					
			</div>

	</div>
	

	{literal}

	{/literal}
	
	