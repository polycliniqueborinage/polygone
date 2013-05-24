{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_sumehr="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_sumehr_menu_search#}</span> 
					<a href="./user_sumehr.php?action=module_analyse">{#dico_sumehr_menu_search_analyse#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_sumehr_patient_search#}:</label>
													<input type="text" name="patient" id="patient" realname="{#dico_sumehr_patient_search#}" onkeyup="javascript:sumehrCompleteSearchForUser(this.value,'personal');" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="tools">{#dico_sumehr_search_colum_action#}</td>
												<td class="b" style="width:30%">{#dico_sumehr_search_colum_patient_familyname#}</td>
												<td class="b" style="width:30%">{#dico_sumehr_search_colum_patient_firstname#}</td>
												<td class="b" style="width:18%">{#dico_sumehr_search_colum_patient_birthdate#}</td>
												<td class="b" style="width:15%">{#dico_sumehr_search_colum_latest_date#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="search_box">
										
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl"}

	{include file="template_right.tpl"}

	{literal}
	<script>
	
  	</script>
	{/literal}
