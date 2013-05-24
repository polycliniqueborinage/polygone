{include file="template_header.tpl" js_jquery="yes" js_jquery_autocomplete="yes" js_product="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state">{#dico_management_comptabilite_display_state#}</a>
    				<a href="./management_comptabilite.php?action=modify_account">{#navigation_title_management_comptabilite_modify#}</a>
    				<a href="./management_comptabilite.php?action=overview_account">{#dico_management_comptabilite_overview_account#}</a>
    				<a href="./management_comptabilite.php?action=comparison_account">{#dico_management_comptabilite_comparison_account#}</a>
					<a href="./management_comptabilite.php?action=display_graphe">{#navigation_title_management_comptabilite_stat_comptagene#}</a>
					<span>{#navigation_title_management_comptabilite_stat_comptagene_histo#}</span>
					<a href="./management_comptabilite.php?action=automatic_flow">{#navigation_title_management_comptabilite_add#}</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
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
					
								<h2><a href="javascript:void(0);" id="parametres_toggle" class="win_block" onclick = "toggleBlock('parametres');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span>{#navigation_title_management_comptabilite_graphique_parametres#}</span></a>
								</h2>
						
							</div>
			
							<div id = "parametres" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
									<form id="form" class="main" action="./management_comptabilite.php?action=display_histo" method="post" enctype="multipart/form-data">
									
										<div class="row"><table><tr><td><label for = "mois_de"> {#dico_management_comptabilite_mois_de#}: </label></td><td><input type = "text" readonly name = "mois_de"  id="mois_de"  realname="{#dico_management_comptabilite_mois_de#}" value = "01" autocomplete="off"/></td><td><label for = "mois_a"> {#dico_management_comptabilite_mois_a#}: </label></td><td><input type = "text" name = "mois_a"  id="mois_a" maxlength = "2" realname="{#dico_management_comptabilite_mois_a#}"  value = {$mois_a} autocomplete="off"/></td></tr></div>
										<div class="row"><tr><td><label for = "annee_de">{#dico_management_comptabilite_annee_de#}:</label></td><td><input type = "text" name = "annee_de" id="annee_de" maxlength = "4" realname="{#dico_management_comptabilite_annee_de#}" value = {$annee_de} autocomplete="off"/></td><td><label for = "annee_a">{#dico_management_comptabilite_annee_a#}:</label></td><td><input type = "text" name = "annee_a" id="annee_a" maxlength = "4" realname="{#dico_management_comptabilite_annee_a#}" value = {$annee_a} autocomplete="off"/></td></tr></table></div>
										
										<div class="row">
											<label>&nbsp;</label>
											<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
										</div>	 
									
									</form>	
										
									</div>
								<div class="clear_both"></div> {*required ... do not delete this row*}
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="benefice_toggle" class="win_block" onclick = "toggleBlock('benefice');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span>{#navigation_title_management_comptabilite_graphique_benefice#}</span></a>
								</h2>
						
							</div>
			
							<div id = "benefice" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "{$graphe.adresse_ben}" alt="" border="0"/>
										</center>	 
										
									</div>
								<div class="clear_both"></div> {*required ... do not delete this row*}
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
						
						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="classe6_toggle" class="win_block" onclick = "toggleBlock('classe6');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span>{#navigation_title_management_comptabilite_graphique_classe6#}</span></a>
								</h2>
						
							</div>
			
							<div id = "classe6" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "{$graphe.adresse_classe60}" alt="" border="0"/>
										</center>	 
										
									</div>
								<div class="clear_both"></div> {*required ... do not delete this row*}
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="classe7_toggle" class="win_block" onclick = "toggleBlock('classe7');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span>{#navigation_title_management_comptabilite_graphique_classe7#}</span></a>
								</h2>
						
							</div>
			
							<div id = "classe7" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "{$graphe.adresse_classe7}" alt="" border="0"/>
										</center>	 
										
									</div>
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
	<script type="text/javascript">

	$(document).ready(function() {
	
		$("#form").validate({
			rules: {
			    filetoupload: "required",
			    mois: "required",
			    annee: "required"
   			},
   			messages: {
				filetoupload: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				},
 				mois: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				},
 				annee: {
 			    	required: "{/literal}{#dico_user_error_required#}{literal}"
 				}
			}
		});
		
	    $("form").bind("invalid-form.validate", function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? '{/literal}{#dico_management_error_one_field_error#}{literal}'
					: '{/literal}{#dico_management_error_many_fields_error_1#}{literal}' + errors + '{/literal}{#dico_management_error_many_fields_error_2#}{literal}';
					$("div.error span").html(message);
					$("div.error").show();
					$("div.infowin_left").show();
					systemeMessage('systemmsg');
				}
		});
		
	});
	</script>
	{/literal}
	
	
	
	
	