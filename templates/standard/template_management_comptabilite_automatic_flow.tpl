{include file="template_header.tpl" js_jquery="yes" js_jquery_autocomplete="yes" js_product="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state">{#dico_management_comptabilite_display_state#}</a>
    				<a href="./management_comptabilite.php?action=overview_account">{#navigation_title_management_comptabilite_overview#}</a>
    				<a href="./management_comptabilite.php?action=comparison_account">{#dico_management_comptabilite_comparison_account#}</a>
    				<a href="./management_comptabilite.php?action=modify_account">{#navigation_title_management_comptabilite_modify#}</a>
					<a href="./management_comptabilite.php?action=display_graphe">{#navigation_title_management_comptabilite_stat_comptagene#}</a>
					<!--<a href="./management_comptabilite.php?action=display_histo">{#navigation_title_management_comptabilite_stat_comptagene_histo#}</a>-->
					<span>{#navigation_title_management_comptabilite_add#}</span>
    				
				</div>
			
				<div class="ViewPane">
				
					{if $mode == 1}
					<div class="infowin_left" id = "systemmsg">
						<div>
							<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_comptabilite_uploaded#}</span>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
					{/if}
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/files.png" alt="" />
									<span>{#dico_management_comptabilite_submenu_upload#}</span></a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
								
								<form id="form" class="main" method="post" action="management_comptabilite.php?action=automatic_flow_submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "filetoupload">{#dico_product_file_upload#}:</label><input type = "file" class="file" name = "filetoupload" id="filetoupload" size="20" /></div>
											<div class="row"><label for = "mois"> {#dico_comptabilite_upload_comptes_mois#}: </label><input type = "text" name = "mois"  id="mois"  size = "2" maxlength = "2" onblur="javascript:checkMois(this.value);" /></div>
											<div class="row"><label for = "annee">{#dico_comptabilite_upload_comptes_annee#}:</label><input type = "text" name = "annee" id="annee" size = "4" maxlength = "4" onblur="javascript:checkAnnee(this.value);"/></div>
											<div class="row"><label for = "methode">{#dico_comptabilite_upload_ernstandyoung#}:</label><input type = "radio" name = "methode" id="methode" value="ernstandyoung" size=1/></div>
											<div class="row"><label for = "methode">{#dico_comptabilite_upload_autremethode#}: </label><input type = "radio" name = "methode" id="methode" value="autre" size=1 CHECKED/></div>
											
											<div class="clear_both"></div>
					                        
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>
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
	<script type="text/javascript">
	
	function checkMois(mois){
		if(mois == '1' ||
		   mois == '2' ||
		   mois == '3' ||
		   mois == '4' ||
		   mois == '5' ||
		   mois == '6' ||
		   mois == '7' ||
		   mois == '8' ||
		   mois == '9')
		
		   mois = "0" + mois;
		
		if(!(mois == "01" ||
		     mois == "02" ||
		     mois == "03" ||
		     mois == "04" ||
		     mois == "05" ||
		     mois == "06" ||
		     mois == "07" ||
		     mois == "08" ||
		     mois == "09" ||
		     mois == "10" ||
		     mois == "11" ||
		     mois == "12")){
		     
			alert("Le mois est incorrect.");
			mois = "";
		}        
	}
	function checkAnnee(annee){
		var error = 0;
		if(annee.length < 4)
			error = 1;
		if(!(annee.charAt(0) == '1' || annee.charAt(0) == '2'))
			error = 1;
		if(!(annee.charAt(1) == '0' || annee.charAt(1) == '1' || annee.charAt(1) == '2'  || annee.charAt(1) == '3'  ||
		     annee.charAt(1) == '4' || annee.charAt(1) == '5' || annee.charAt(1) == '6'  || annee.charAt(1) == '7'  ||
		     annee.charAt(1) == '8' || annee.charAt(1) == '9'))
		    error  = 1;
		if(!(annee.charAt(2) == '0' || annee.charAt(2) == '1' || annee.charAt(2) == '2'  || annee.charAt(2) == '3'  ||
		     annee.charAt(2) == '4' || annee.charAt(2) == '5' || annee.charAt(2) == '6'  || annee.charAt(2) == '7'  ||
		     annee.charAt(2) == '8' || annee.charAt(2) == '9'))
		    error  = 1;          
		if(!(annee.charAt(3) == '0' || annee.charAt(3) == '1' || annee.charAt(3) == '2'  || annee.charAt(3) == '3'  ||
		     annee.charAt(3) == '4' || annee.charAt(3) == '5' || annee.charAt(3) == '6'  || annee.charAt(3) == '7'  ||
		     annee.charAt(3) == '8' || annee.charAt(3) == '9'))
		    error  = 1;              	
		
		if(error == 1)
			alert("L'annŽe est incorrecte.");        
	}
	
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
		
  		$("#birthday").mask("99/99/9999");
  		$("#workphone").mask("(9999) 99 99 99");
  		$("#mobilephone").mask("(9999) 99 99 99");
  		$("#privatephone").mask("(9999) 99 99 99");
  		$("#fax").mask("(9999) 99 99 99");		
		
	});
	</script>
	{/literal}
	
	
	
	
	