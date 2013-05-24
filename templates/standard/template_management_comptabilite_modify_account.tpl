{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_product="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	{literal}
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "95%",
			height: "30px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	{/literal}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state">{#dico_management_comptabilite_display_state#}</a>
    				<a href="./management_comptabilite.php?action=overview_account">{#navigation_title_management_comptabilite_overview#}</a>
    				<a href="./management_comptabilite.php?action=comparison_account">{#dico_management_comptabilite_comparison_account#}</a>
    				<span>{#dico_management_comptabilite_modify_account#}</span>
    				<a href="./management_comptabilite.php?action=display_graphe">{#navigation_title_management_comptabilite_stat_comptagene#}</a>
    				<!--<a href="./management_comptabilite.php?action=display_histo">{#navigation_title_management_comptabilite_stat_comptagene_histo#}</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow">{#navigation_title_management_comptabilite_add#}</a>
    				
				</div>
			
				<div class="ViewPane">
				
					{if $message != ''}
					<div class="infowin_left" id = "systemmsg">
						<div>
							<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{$message}</span>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
					{/if}
					
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_comptabilite_parametres#}</span>
									</a>
								</h2>
							</div>
			
							<div id = "classes" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=search_account" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											
											<div class="row"><label for = "mois"> {#dico_comptabilite_upload_comptes_mois#}: </label><input type = "text" name = "mois"  id="mois"  realname="{#dico_management_comptabilite_mois#}" value={$mois} autocomplete="off" maxlength = "2"/></div>
											<div class="row"><label for = "annee">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee" id="annee" realname="{#dico_management_comptabilite_annee#}" value={$annee} autocomplete="off" maxlength = "4"/></div>
											
											<div class="row"><label for = "numero_compte">{#dico_management_comptabilite_numero_compte#}:</label><input type = "text" name = "numero_compte" id="numero_compte" realname="{#dico_management_comptabilite_numero_compte#}" value='{$compte.numero}' autocomplete="off"/></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}

						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('detail_comptes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_comptabilite_details_compte#}</span>
									</a>
								</h2>
							</div>
			
							<div id = "classes" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=modify_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type = "hidden" name = "mois_h"          id="mois_h"          realname="{#dico_management_comptabilite_mois#}"          value={$mois}            autocomplete="off" maxlength = "2"/>
											<input type = "hidden" name = "annee_h"         id="annee_h"         realname="{#dico_management_comptabilite_annee#}"         value={$annee}           autocomplete="off" maxlength = "4"/>
											<input type = "hidden" name = "numero_compte_h" id="numero_compte_h" realname="{#dico_management_comptabilite_numero_compte#}" value='{$compte.numero}' autocomplete="off"/>
											{$message}
											<div class="row"><label for = "denomination">{#dico_management_comptabilite_denomiation_compte#}:</label><input type = "text" name = "libelle" id="libelle" realname="{#dico_management_comptabilite_denomiation_compte#}" value = '{$compte.libelle}' autocomplete="off"/></div>
											<div class="row"><label for = "debit">{#dico_management_comptabilite_debit#}:</label><input type = "text" name = "debit" id="debit" realname="{#dico_management_comptabilite_debit#}" value = '{$compte.debit}' autocomplete="off"/></div>
											<div class="row"><label for = "credit">{#dico_management_comptabilite_credit#}:</label><input type = "text" name = "credit" id="credit" realname="{#dico_management_comptabilite_cedit#}" value = '{$compte.credit}' autocomplete="off"/></div>
											
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>											
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
					
					</div> {*Block B end*}	
					
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" product_search="yes"}

	{literal}

	{/literal}
	
	