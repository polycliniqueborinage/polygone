{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_comptabilite="yes" js_jquery_ui_171="yes" js_input_control="yes" js_jquery_autocomplete="yes" js_jqmodal="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	{literal}
	<script type="text/javascript">
	function setup(){}
	function setup1(){	
		tinyMCE.init({
			mode : "exact",
			elements : "classe_faits, classe_conclusions, classe_actions",  
			theme : "advanced",
			language: "{/literal}{$locale}{literal}",
			width: "70%",
			height: "10px",
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
			//theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			cleanup: true,
			//auto_reset_designmode: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	}	
	function closeEditor()
    {
    }
	
	</script>
	{/literal}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<span>{#dico_management_comptabilite_display_state#}</span>
    				<a href="./management_comptabilite.php?action=overview_account">{#navigation_title_management_comptabilite_overview#}</a>
    				<a href="./management_comptabilite.php?action=comparison_account">{#dico_management_comptabilite_comparison_account#}</a>
    				<a href="./management_comptabilite.php?action=modify_account">{#navigation_title_management_comptabilite_modify#}</a>
    				<a href="./management_comptabilite.php?action=display_graphe">{#navigation_title_management_comptabilite_stat_comptagene#}</a>
    				<!--<a href="./management_comptabilite.php?action=display_histo">{#navigation_title_management_comptabilite_stat_comptagene_histo#}</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow">{#navigation_title_management_comptabilite_add#}</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
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
			
								<form id="form" class="main" method="post" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											
											<div class="row"><label for = "mois"> {#dico_comptabilite_upload_comptes_mois#}: </label><input type = "text" name = "mois"  id="mois"  value = "{$compta.mois}" realname="{#dico_management_comptabilite_mois#}"  autocomplete="off" maxlength = "2"/></div>
											<div class="row"><label for = "annee">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee" id="annee" value = "{$compta.annee}" realname="{#dico_management_comptabilite_annee#}" autocomplete="off" maxlength = "4"/></div>
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
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_comptabilite_classes#}</span>
									</a>
									<br>
									<a href="management_comptabilite.php?action=print_state&mois={$compta.mois}&annee={$compta.annee}" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
									<a href="management_comptabilite.php?action=print_comment&id_classe=*" style="float:right">
										<img src="./templates/standard/img/16x16/book_open.png" alt="" />
									</a>
								</h2>
							</div>
			
							<div id = "classes" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:100%;">
											<div class="row"><h3><label>{#dico_management_comptabilite_element#}</label><label>{#dico_management_comptabilite_courant#}</label><label>{#dico_management_comptabilite_cumule#}</label><label>{#dico_management_comptabilite_rapport#}</label></h3></div>
											<div class="row"><label for = "classe1"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=1">{#dico_management_comptabilite_classe1#}:</a></label><input type = "text" readonly name = "classe1" id="classe1" realname="{#dico_management_comptabilite_classe1#}" value = "{$compta.classe1}" autocomplete="off"/><input type = "text" readonly name = "classe1_cumul" id="classe1_cumul" realname="{#dico_management_comptabilite_classe1_cumul#}" value = "{$compta.classe1_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe1_cumul_rapp" id="classe1_cumul_rapp" realname="{#dico_management_comptabilite_classe1_cumul#}" value = "{$compta.classe1_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:closeEditor();openClasseComment(1);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe1_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe1_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe1_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=1" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe2"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=2">{#dico_management_comptabilite_classe2#}:</a></label><input type = "text" readonly name = "classe2" id="classe2" realname="{#dico_management_comptabilite_classe2#}" value = "{$compta.classe2}" autocomplete="off"/><input type = "text" readonly name = "classe2_cumul" id="classe2_cumul" realname="{#dico_management_comptabilite_classe2_cumul#}" value = "{$compta.classe2_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe2_cumul_rapp" id="classe2_cumul_rapp" realname="{#dico_management_comptabilite_classe2_cumul#}" value = "{$compta.classe2_cumul_rapp}" autocomplete="off"/>											
											<a href="#" onclick="javascript:closeEditor();openClasseComment(2);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe2_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe2_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe2_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=2" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe3"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=3">{#dico_management_comptabilite_classe3#}:</a></label><input type = "text" readonly name = "classe3" id="classe3" realname="{#dico_management_comptabilite_classe3#}" value = "{$compta.classe3}" autocomplete="off"/><input type = "text" readonly name = "classe3_cumul" id="classe3_cumul" realname="{#dico_management_comptabilite_classe3_cumul#}" value = "{$compta.classe3_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe3_cumul_rapp" id="classe3_cumul_rapp" realname="{#dico_management_comptabilite_classe3_cumul#}" value = "{$compta.classe3_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:closeEditor();openClasseComment(3);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe3_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe3_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe3_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=3" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe4"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=4">{#dico_management_comptabilite_classe4#}:</a></label><input type = "text" readonly name = "classe4" id="classe4" realname="{#dico_management_comptabilite_classe4#}" value = "{$compta.classe4}" autocomplete="off"/><input type = "text" readonly name = "classe4_cumul" id="classe4_cumul" realname="{#dico_management_comptabilite_classe4_cumul#}" value = "{$compta.classe4_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe4_cumul_rapp" id="classe4_cumul_rapp" realname="{#dico_management_comptabilite_classe4_cumul#}" value = "{$compta.classe4_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:closeEditor();openClasseComment(4);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe4_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe4_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe4_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=4" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe5"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=5">{#dico_management_comptabilite_classe5#}:</a></label><input type = "text" readonly name = "classe5" id="classe5" realname="{#dico_management_comptabilite_classe5#}" value = "{$compta.classe5}" autocomplete="off"/><input type = "text" readonly name = "classe5_cumul" id="classe5_cumul" realname="{#dico_management_comptabilite_classe5_cumul#}" value = "{$compta.classe5_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe5_cumul_rapp" id="classe5_cumul_rapp" realname="{#dico_management_comptabilite_classe5_cumul#}" value = "{$compta.classe5_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(5);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe5_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe5_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe5_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=5" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "benefice" onclick="openInfoBenefice();"><b>{#dico_management_comptabilite_benefice#}:</B></label><input type = "text" readonly name = "benefice" id="benefice" realname="{#dico_management_comptabilite_benefice#}" value = "{$compta.benefice}" autocomplete="off"/><input type = "text" readonly name = "benefice_cumul" id="benefice_cumul" realname="{#dico_management_comptabilite_benefice_cumul#}" value = "{$compta.benefice_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "benefice_cumul_rapp" id="benefice_cumul_rapp" realname="{#dico_management_comptabilite_benefice_cumul#}" value = "{$compta.benefice_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(6);setup();return false;" title="Commentaire" class="del">
											{if $compta.benefice_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.benefice_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.benefice_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=6" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><br></div>
											
											
											<div class="row"><label for = "classe60vad"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=60">{#dico_management_comptabilite_classe60_vad#}:</a></label><input type = "text" readonly name = "classe60vad" id="classe60vad" realname="{#dico_management_comptabilite_classe60_vad#}" value = "{$compta.classe60_vad}" autocomplete="off"/><input type = "text" readonly name = "classe5_cumul"     id="classe60vad_cumul" realname="{#dico_management_comptabilite_classe60_vad_cumul#}" value = "{$compta.classe60_vad_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe60vad_cumul_rapp"     id="classe60vad_cumul_rapp" realname="{#dico_management_comptabilite_classe60_vad_cumul#}" value = "{$compta.classe60_vad_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(7);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe60_vad_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe60_vad_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe60_vad_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=7" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe61cgs"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=61">{#dico_management_comptabilite_classe61_cgs#}:</a></label><input type = "text" readonly name = "classe61cgs" id="classe61cgs" realname="{#dico_management_comptabilite_classe61_cgs#}" value = "{$compta.classe61_cgs}" autocomplete="off"/><input type = "text" readonly name = "classe5_cumul"     id="classe61cgs_cumul" realname="{#dico_management_comptabilite_classe61_cgs_cumul#}" value = "{$compta.classe61_cgs_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe5_cumul_rapp"     id="classe61cgs_cumul_rapp" realname="{#dico_management_comptabilite_classe61_cgs_cumul#}" value = "{$compta.classe61_cgs_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(8);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe61_cgs_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe61_cgs_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe61_cgs_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=8" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe62cgs"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=62">{#dico_management_comptabilite_classe62_cgs#}:</a></label><input type = "text" readonly name = "classe62cgs" id="classe62cgs" realname="{#dico_management_comptabilite_classe62_cgs#}" value = "{$compta.classe62_cgs}" autocomplete="off"/><input type = "text" readonly name = "classe62cgs_cumul" id="classe62cgs_cumul" realname="{#dico_management_comptabilite_classe62_cgs_cumul#}" value = "{$compta.classe62_cgs_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe62cgs_cumul_rapp" id="classe62cgs_cumul_rapp" realname="{#dico_management_comptabilite_classe62_cgs_cumul#}" value = "{$compta.classe62_cgs_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(9);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe62_cgs_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe62_cgs_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe62_cgs_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=9" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe63cgs"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=63">{#dico_management_comptabilite_classe63_cgs#}:</a></label><input type = "text" readonly name = "classe63cgs" id="classe63cgs" realname="{#dico_management_comptabilite_classe63_cgs#}" value = "{$compta.classe63_cgs}" autocomplete="off"/><input type = "text" readonly name = "classe63cgs_cumul" id="classe63cgs_cumul" realname="{#dico_management_comptabilite_classe63_cgs_cumul#}" value = "{$compta.classe63_cgs_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe63cgs_cumul_rapp" id="classe63cgs_cumul_rapp" realname="{#dico_management_comptabilite_classe63_cgs_cumul#}" value = "{$compta.classe63_cgs_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(10);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe63_cgs_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe63_cgs_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe63_cgs_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=10" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe64cgs"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=64">{#dico_management_comptabilite_classe64_cgs#}:</a></label><input type = "text" readonly name = "classe64cgs" id="classe64cgs" realname="{#dico_management_comptabilite_classe64_cgs#}" value = "{$compta.classe64_cgs}" autocomplete="off"/><input type = "text" readonly name = "classe64cgs_cumul" id="classe64cgs_cumul" realname="{#dico_management_comptabilite_classe64_cgs_cumul#}" value = "{$compta.classe64_cgs_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe64cgs_cumul_rapp" id="classe64cgs_cumul_rapp" realname="{#dico_management_comptabilite_classe64_cgs_cumul#}" value = "{$compta.classe64_cgs_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(11);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe64_cgs_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe64_cgs_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe64_cgs_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=11" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe65"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=65">   {#dico_management_comptabilite_classe65#}:    </a></label><input type = "text" readonly name = "classe65"    id="classe65"    realname="{#dico_management_comptabilite_classe65#}"     value = "{$compta.classe65}"     autocomplete="off"/><input type = "text" readonly name = "classe65_cumul"    id="classe65_cumul"    realname="{#dico_management_comptabilite_classe65_cumul#}"     value = "{$compta.classe65_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "classe65_cumul_rapp"    id="classe65_cumul_rapp"    realname="{#dico_management_comptabilite_classe65_cumul#}"     value = "{$compta.classe65_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(12);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe65_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe65_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe65_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=12" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe66"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=66">   {#dico_management_comptabilite_classe66#}:    </a></label><input type = "text" readonly name = "classe66"    id="classe66"    realname="{#dico_management_comptabilite_classe66#}"     value = "{$compta.classe66}"     autocomplete="off"/><input type = "text" readonly name = "classe66_cumul"    id="classe66_cumul"    realname="{#dico_management_comptabilite_classe66_cumul#}"     value = "{$compta.classe66_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "classe66_cumul_rapp"    id="classe66_cumul_rapp"    realname="{#dico_management_comptabilite_classe66_cumul#}"     value = "{$compta.classe66_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(13);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe66_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe66_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe66_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=13" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe67"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=67">   {#dico_management_comptabilite_classe67#}:    </a></label><input type = "text" readonly name = "classe67"    id="classe67"    realname="{#dico_management_comptabilite_classe67#}"     value = "{$compta.classe67}"     autocomplete="off"/><input type = "text" readonly name = "classe67_cumul"    id="classe67_cumul"    realname="{#dico_management_comptabilite_classe67_cumul#}"     value = "{$compta.classe67_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "classe67_cumul_rapp"    id="classe67_cumul_rapp"    realname="{#dico_management_comptabilite_classe67_cumul#}"     value = "{$compta.classe67_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(14);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe67_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe67_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe67_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=14" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe70vad"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=70">{#dico_management_comptabilite_classe70_vad#}:</a></label><input type = "text" readonly name = "classe70vad" id="classe70vad" realname="{#dico_management_comptabilite_classe70_vad#}" value = "{$compta.classe70_vad}" autocomplete="off"/><input type = "text" readonly name = "classe70vad_cumul" id="classe70vad_cumul" realname="{#dico_management_comptabilite_classe70_vad_cumul#}" value = "{$compta.classe70_vad_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe70vad_cumul_rapp" id="classe70vad_cumul_rapp" realname="{#dico_management_comptabilite_classe70_vad_cumul#}" value = "{$compta.classe70_vad_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(15);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe70_vad_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe70_vad_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe70_vad_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=15" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe72vad"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=72">{#dico_management_comptabilite_classe72_vad#}:</a></label><input type = "text" readonly name = "classe72vad" id="classe72vad" realname="{#dico_management_comptabilite_classe72_vad#}" value = "{$compta.classe72_vad}" autocomplete="off"/><input type = "text" readonly name = "classe72vad_cumul" id="classe72vad_cumul" realname="{#dico_management_comptabilite_classe72_vad_cumul#}" value = "{$compta.classe72_vad_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe72vad_cumul_rapp" id="classe72vad_cumul_rapp" realname="{#dico_management_comptabilite_classe72_vad_cumul#}" value = "{$compta.classe72_vad_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(15);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe72_vad_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe72_vad_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe72_vad_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=15" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe74vad"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=74">{#dico_management_comptabilite_classe74_vad#}:</a></label><input type = "text" readonly name = "classe74vad" id="classe74vad" realname="{#dico_management_comptabilite_classe74_vad#}" value = "{$compta.classe74_vad}" autocomplete="off"/><input type = "text" readonly name = "classe74vad_cumul" id="classe74vad_cumul" realname="{#dico_management_comptabilite_classe74_vad_cumul#}" value = "{$compta.classe74_vad_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "classe74vad_cumul_rapp" id="classe74vad_cumul_rapp" realname="{#dico_management_comptabilite_classe74_vad_cumul#}" value = "{$compta.classe74_vad_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(16);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe74_vad_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe74_vad_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe74_vad_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=16" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe75"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=75">   {#dico_management_comptabilite_classe75#}:    </a></label><input type = "text" readonly name = "classe75"    id="classe75"    realname="{#dico_management_comptabilite_classe75#}"     value = "{$compta.classe75}"     autocomplete="off"/><input type = "text" readonly name = "classe75_cumul"    id="classe75_cumul"    realname="{#dico_management_comptabilite_classe75_cumul#}"     value = "{$compta.classe75_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "classe75_cumul_rapp"    id="classe75_cumul_rapp"    realname="{#dico_management_comptabilite_classe75_cumul#}"     value = "{$compta.classe75_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(17);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe75_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe75_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe75_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=17" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "classe76"><a target="_blank" href="management_comptabilite.php?action=show_comparison&mois={$compta.mois}&annee1={$compta.annee}&account=76">   {#dico_management_comptabilite_classe76#}:    </a></label><input type = "text" readonly name = "classe76"    id="classe76"    realname="{#dico_management_comptabilite_classe76#}"     value = "{$compta.classe76}"     autocomplete="off"/><input type = "text" readonly name = "classe76_cumul"    id="classe76_cumul"    realname="{#dico_management_comptabilite_classe76_cumul#}"     value = "{$compta.classe76_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "classe76_cumul_rapp"    id="classe76_cumul_rapp"    realname="{#dico_management_comptabilite_classe76_cumul#}"     value = "{$compta.classe76_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(18);setup();return false;" title="Commentaire" class="del">
											{if $compta.classe76_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.classe76_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.classe76_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=18" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											
											<div class="row"><label for = "benefice_fr" onclick="openInfoBeneficeFR();"><b>{#dico_management_comptabilite_benefice_fr#}:</B></label><input type = "text" readonly name = "benefice_fr" id="benefice_fr" realname="{#dico_management_comptabilite_benefice_fr#}" value = "{$compta.benefice_fr}" autocomplete="off"/><input type = "text" readonly name = "benefice_fr_cumul" id="benefice_fr_cumul" realname="{#dico_management_comptabilite_benefice_fr_cumul#}" value = "{$compta.benefice_fr_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "benefice_fr_cumul_rapp" id="benefice_fr_cumul_rapp" realname="{#dico_management_comptabilite_benefice_fr_cumul#}" value = "{$compta.benefice_fr_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(19);setup();return false;" title="Commentaire" class="del">
											{if $compta.benefice_fr_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.benefice_fr_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.benefice_fr_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=19" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "marge_brute" onclick="openInfoMargeBrute();"><b>{#dico_management_comptabilite_marge_brute#}:</B></label><input type = "text" readonly name = "marge_brute" id="marge_brute" realname="{#dico_management_comptabilite_marge_brute#}" value = "{$compta.marge_brute}" autocomplete="off"/><input type = "text" readonly name = "marge_brute_cumul" id="marge_brute_cumul" realname="{#dico_management_comptabilite_marge_brute_cumul#}" value = "{$compta.marge_brute_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "marge_brute_cumul_rapp" id="marge_brute_cumul_rapp" realname="{#dico_management_comptabilite_marge_brute_cumul#}" value = "{$compta.marge_brute_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(20);setup();return false;" title="Commentaire" class="del">
											{if $compta.marge_brute_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.marge_brute_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.marge_brute_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=20" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><br></div>
											
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
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('coeficients');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#dico_management_comptabilite_coeficients#}</span>
									</a>
								</h2>
							</div>
			
							<div id = "coeficients" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form3" class="main" method="post" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:100%;">
										
											<div class="row"><h3><label>{#dico_management_comptabilite_element#}</label><label>{#dico_management_comptabilite_courant#}</label><label>{#dico_management_comptabilite_cumule#}</label><label>{#dico_management_comptabilite_rapport#}</label></h3></div>
											
											<div class="row"><label for = "vad" onclick="openInfoVAD();">   {#dico_management_comptabilite_vad#}:   </label><input type = "text" readonly name = "vad"    id="vad"    realname="{#dico_management_comptabilite_vad#}"    value = "{$compta.vad}"    autocomplete="off"/><input type = "text" readonly name = "vad_cumul"    id="vad_cumul"    realname="{#dico_management_comptabilite_vad_cumul#}"    value = "{$compta.vad_cumul}"    autocomplete="off"/>
											<input type = "text" readonly name = "vad_cumul_rapp"    id="vad_cumul_rapp"    realname="{#dico_management_comptabilite_vad_cumul#}"    value = "{$compta.vad_cumul_rapp}"    autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(21);setup();return false;" title="Commentaire" class="del">
											{if $compta.vad_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.vad_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.vad_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=21" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "cgs" onclick="openInfoCGS();">   {#dico_management_comptabilite_cgs#}:   </label><input type = "text" readonly name = "cgs"    id="cgs"    realname="{#dico_management_comptabilite_cgs#}"    value = "{$compta.cgs}"    autocomplete="off"/><input type = "text" readonly name = "cgs_cumul"    id="cgs_cumul"    realname="{#dico_management_comptabilite_cgs_cumul#}"    value = "{$compta.cgs_cumul}"    autocomplete="off"/>
											<input type = "text" readonly name = "cgs_cumul_rapp"    id="cgs_cumul_rapp"    realname="{#dico_management_comptabilite_cgs_cumul#}"    value = "{$compta.cgs_cumul_rapp}"    autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(22);setup();return false;" title="Commentaire" class="del">
											{if $compta.cgs_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.cgs_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.cgs_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=22" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "tee" onclick="openInfoTEE();">   {#dico_management_comptabilite_tee#}:   </label><input type = "text" readonly name = "tee"    id="tee"    realname="{#dico_management_comptabilite_tee#}"    value = "{$compta.tee}"    autocomplete="off"/><input type = "text" readonly name = "tee_cumul"    id="tee_cumul"    realname="{#dico_management_comptabilite_tee_cumul#}"    value = "{$compta.tee_cumul}"    autocomplete="off"/>
											<input type = "text" readonly name = "tee_cumul_rapp"    id="tee_cumul_rapp"    realname="{#dico_management_comptabilite_tee_cumul#}"    value = "{$compta.tee_cumul_rapp}"    autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(23);setup();return false;" title="Commentaire" class="del">
											{if $compta.tee_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.tee_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.tee_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=23" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "fr" onclick="openInfoFR();">    {#dico_management_comptabilite_fr#}:    </label><input type = "text" readonly name = "fr"     id="fr"     realname="{#dico_management_comptabilite_fr#}"     value = "{$compta.fr}"     autocomplete="off"/><input type = "text" readonly name = "fr_cumul"     id="fr_cumul"     realname="{#dico_management_comptabilite_fr_cumul#}"     value = "{$compta.fr_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "fr_cumul_rapp"     id="fr_cumul_rapp"     realname="{#dico_management_comptabilite_fr_cumul#}"     value = "{$compta.fr_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(24);setup();return false;" title="Commentaire" class="del">
											{if $compta.fr_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.fr_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.fr_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=24" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "bfr" onclick="openInfoBFR();">   {#dico_management_comptabilite_bfr#}:   </label><input type = "text" readonly name = "bfr"    id="bfr"    realname="{#dico_management_comptabilite_bfr#}"    value = "{$compta.bfr}"    autocomplete="off"/><input type = "text" readonly name = "bfr_cumul"    id="bfr_cumul"    realname="{#dico_management_comptabilite_bfr_cumul#}"    value = "{$compta.bfr_cumul}"    autocomplete="off"/>
											<input type = "text" readonly name = "bfr_cumul_rapp"    id="bfr_cumul_rapp"    realname="{#dico_management_comptabilite_bfr_cumul#}"    value = "{$compta.bfr_cumul_rapp}"    autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(25);setup();return false;" title="Commentaire" class="del">
											{if $compta.bfr_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.bfr_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.bfr_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=25" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "tr" onclick="openInfoTR();">    {#dico_management_comptabilite_tr#}:    </label><input type = "text" readonly name = "tr"     id="tr"     realname="{#dico_management_comptabilite_tr#}"     value = "{$compta.tr}"     autocomplete="off"/><input type = "text" readonly name = "tr_cumul"     id="tr_cumul"     realname="{#dico_management_comptabilite_tr_cumul#}"     value = "{$compta.tr_cumul}"     autocomplete="off"/>
											<input type = "text" readonly name = "tr_cumul_rapp"     id="tr_cumul_rapp"     realname="{#dico_management_comptabilite_tr_cumul#}"     value = "{$compta.tr_cumul_rapp}"     autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(26);setup();return false;" title="Commentaire" class="del">
											{if $compta.tr_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.tr_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.tr_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=26" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "vadbfr" onclick="openInfoVADBFR();">{#dico_management_comptabilite_vadbfr#}:</label><input type = "text" readonly name = "vadbfr" id="vadbfr" realname="{#dico_management_comptabilite_vadbfr#}" value = "{$compta.vadbfr}" autocomplete="off"/><input type = "text" readonly name = "vadbfr_cumul" id="vadbfr_cumul" realname="{#dico_management_comptabilite_vadbfr_cumul#}" value = "{$compta.vadbfr_cumul}" autocomplete="off"/>
											<input type = "text" readonly name = "vadbfr_cumul_rapp" id="vadbfr_cumul_rapp" realname="{#dico_management_comptabilite_vadbfr_cumul#}" value = "{$compta.vadbfr_cumul_rapp}" autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(27);setup();return false;" title="Commentaire" class="del">
											{if $compta.vadbfr_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.vadbfr_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.vadbfr_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=27" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "tef" onclick="openInfoTEF();">   {#dico_management_comptabilite_tef#}:   </label><input type = "text" readonly name = "tef"    id="tef"    realname="{#dico_management_comptabilite_tef#}"    value = "{$compta.tef}"    autocomplete="off"/><input type = "text" readonly name = "tef_cumul"    id="tef_cumul"    realname="{#dico_management_comptabilite_tef_cumul#}"    value = "{$compta.tef_cumul}"    autocomplete="off"/>
											<input type = "text" readonly name = "tef_cumul_rapp"    id="tef_cumul_rapp"    realname="{#dico_management_comptabilite_tef_cumul#}"    value = "{$compta.tef_cumul_rapp}"    autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(28);setup();return false;" title="Commentaire" class="del">
											{if $compta.tef_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.tef_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.tef_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=28" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
											</div>
											<div class="row"><label for = "cash" onclick="openInfoCash();">  {#dico_management_comptabilite_cash#}:  </label><input type = "text" readonly name = "cash"   id="cash"   realname="{#dico_management_comptabilite_cash#}"   value = "{$compta.cash}"   autocomplete="off"/><input type = "text" readonly name = "cash_cumul"   id="cash_cumul"   realname="{#dico_management_comptabilite_cash_cumul#}"   value = "{$compta.cash_cumul}"   autocomplete="off"/>
											<input type = "text" readonly name = "cash_cumul_rapp"   id="cash_cumul_rapp"   realname="{#dico_management_comptabilite_cash_cumul#}"   value = "{$compta.cash_cumul_rapp}"   autocomplete="off"/>
											<a href="#" onclick="javascript:openClasseComment(29);setup();return false;" title="Commentaire" class="del">
											{if $compta.cash_cumul_indicateur < 0}
											<img src="./templates/standard/img/16x16/flag_red.png" alt="" />
											{/if}
											{if $compta.cash_cumul_indicateur == 0}
											<img src="./templates/standard/img/16x16/flag_yellow.png" alt="" />
											{/if}
											{if $compta.cash_cumul_indicateur > 0}
											<img src="./templates/standard/img/16x16/flag_green.png" alt="" />
											{/if}
											</a>
											<a href="management_comptabilite.php?action=print_comment&id_classe=29" style="float:right">
												<img src="./templates/standard/img/16x16/book_open.png" alt="" />
											</a>
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

	<div class="jqmWindow" id="editbox">
		<div class="jqmConfirmWindow">
		    <div id="add_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_planning_addbox_title#}</h1>
  			</div>
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_planning_editbox_title#}</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
				<form class="main" method="post" action="#">
					<input type="hidden" size="15" name="classe_id" id="classe_id"/>
					<fieldset>
						<div class="row">
							<label>{#dico_management_comptabilite_nom#}:</label>
							<input id="classe_nom" type="text" name="classe_nom" value=""/> 
						</div>
						<div class="row">
							<label>{#dico_management_comptabilite_faits#}:</label>
							<input id="classe_faits" type="text" name="classe_faits" value=""/> 
							<!--<textarea id="classe_faits" rows="1" cols="1" name="classe_faits"></textarea>-->
						</div>
						<div class="row">
							<label>{#dico_management_comptabilite_conclusions#}:</label>
							<input id="classe_conclusions" type="text" name="classe_conclusions" value=""/> 
							<!--<textarea id="classe_conclusions" rows="1" cols="1" name="classe_conclusions"></textarea>-->
						</div>
						<div class="row">
							<label>{#dico_management_comptabilite_actions#}:</label>
							<input id="classe_actions" type="text" size="15" name="classe_actions" value=""/> 
							<!--<textarea id="classe_actions" rows="1" cols="1" name="classe_actions"></textarea>-->
						</div>
						<div class="row">
							<label>&nbsp;</label>
							
							<a href="#" onclick="javascript:saveComment();" class="butn_link"><span>{#dico_button_save#}</span></a>
							
							<a href="#" onclick="javascript:$('#editbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infobenefice">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_benefice#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_benefice#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infobeneficefr">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_benefice_fr#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_beneficefr_part1#}<br>{#dico_management_comptabilite_info_beneficefr_part2#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infomargebrute">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_marge_brute#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_marge_brute#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infovad">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_vad#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_vad#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infocgs">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_cgs#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_cgs#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infotee">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_tee#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_tee#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infofr">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_fr#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_fr#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infobfr">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_bfr#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_bfr#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infotr">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_tr#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_tr#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infovadbfr">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_vadbfr#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_vadbfr#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infotef">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_tef#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_tef#}</label>
					</fieldset>
			</div>
		</div>
	</div>
	
	<div class="jqmWindow" id="infocash">
		<div class="jqmConfirmWindow">
		    <div id="update_title" class="jqmConfirmTitle clearfix">
    			<h1>{#dico_management_comptabilite_cash#}:</h1>
  			</div>
			<br/>
			<div class="block_in_wrapper">
					<fieldset>
						<label>{#dico_management_comptabilite_info_cash#}</label>
					</fieldset>
			</div>
		</div>
	</div>


	{literal}
	<script>

		$(document).ready(function(){
		
			
			$('#editbox').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infobeneficefr').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infobenefice').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infomargebrute').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infovad').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infocgs').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infotee').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infofr').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infobfr').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infotr').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infovadbfr').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infotef').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
			
			$('#infocash').jqm({
				onHide: function(h) {
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window			    	
		    	}
			});
	   		
  		});
  	</script>
	{/literal}
	
	