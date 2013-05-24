{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" }
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state">{#dico_management_comptabilite_display_state#}</a>
    				<span>{#navigation_title_management_comptabilite_overview#}</span>
    				<a href="./management_comptabilite.php?action=comparison_account">{#dico_management_comptabilite_comparison_account#}</a>
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
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=overview_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div>
										
											
											<div class="row"><label for = "annee">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee" id="annee" realname="{#dico_management_comptabilite_annee#}" value={$annee} autocomplete="off" maxlength = "4"/></div>
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
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" width="10%">
										{#dico_comptabilite_upload_comptes_mois#}
										</td>
									</tr>
								</table>
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" width="5%">
										{#dico_management_comptabilite_debit#}  
										</td>
										<td align="center" width="5%">
										{#dico_management_comptabilite_credit#}
										</td>
									</tr>
									<tr>
										<td align="center" width="5%">
										{#dico_management_comptabilite_debit#} {#dico_management_comptabilite_cumule#}  
										</td>
										<td align="center" width="5%">
										{#dico_management_comptabilite_credit#} {#dico_management_comptabilite_cumule#}
										</td>
									</tr>
								</table>
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="right" width="10%">
										{#dico_management_comptabilite_solde_cumul#}
										</td>
									</tr>
								</table>			
								</div>
								<div>
								{section name=compte loop=$comptes}
									<div>
										{if $comptes[compte].number == 0}
											<h4><u>{$comptes[compte].number} - {$comptes[compte].descr}</u></h4>
										{else}
											<a target="_blank" href="management_comptabilite.php?action=show_comparison&annee1={$annee}&account={$comptes[compte].number}"><h4><u>{$comptes[compte].number} - {$comptes[compte].descr}</u></h4></a>
										{/if}
										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="center" width="8%">
											{$comptes[compte].descr_jan}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_feb}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_mar}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_apr}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_may}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_jun}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_jul}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_aug}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_sep}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_oct}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_nov}
											</td>
											<td align="center" width="8%">
											{$comptes[compte].descr_dec}
											</td>
											</tr>
										</table>
										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_jan}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_jan}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_feb}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_feb}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_mar}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_mar}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_apr}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_apr}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_may}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_may}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_jun}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_jun}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_jul}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_jul}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_aug}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_aug}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_sep}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_sep}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_oct}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_oct}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_nov}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_nov}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].debit_dec}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].credit_dec}
											</font></td>
											</tr>
											
											<tr>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_jan}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_jan}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_feb}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_feb}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_mar}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_mar}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_apr}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_apr}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_may}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_may}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_jun}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_jun}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_jul}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_jul}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_aug}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_aug}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_sep}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_sep}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_oct}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_oct}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_nov}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_nov}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_deb_dec}
											</font></td>
											<td align="right" width="4%"><font size='1'>
											{$comptes[compte].cumul_cre_dec}
											</font></td>
											</tr>
										</table>

										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_jan}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_feb}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_mar}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_apr}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_may}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_jun}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_jul}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_aug}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_sep}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_oct}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_nov}
											</font></td>
											<td align="right" width="8%"><font size='1'>
											{$comptes[compte].solde_cum_dec}
											</font></td>
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
	
	