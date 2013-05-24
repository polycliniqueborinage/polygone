{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_patient="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_patient_menu_search#}</span> 

    				<a href="./management_client.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_client.php?action=list">{#dico_management_patient_menu_list#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "display:none" id = "systemmsg">
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_client_deleted#}</span>
					</div>
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2><img src="./templates/standard/img/symbols/user.png" alt="{#dico_management_patient_submenu_search#}" />
										<span>{#dico_management_client_submenu_search#}</span>
									</h2>
								</div>
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="admin_people_group.php?action=addpro">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_client_search#}:</label>
													<input type="text" name="name" id="name" required="1" realname="{#dico_management_patient_search#}" onkeyup="javascript:clientCompleteSearch('',this.value);clientSimpleSearch('',this.value);" autocomplete="off" />
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%">{#dico_management_patient_search_colum_action#}</td>
												<td class="b" style="width:17%">{#dico_management_patient_search_colum_familyname#}</td>
												<td class="b" style="width:17%">{#dico_management_patient_search_colum_firstname#}</td>
												<td class="b" style="width:10%">{#dico_management_patient_search_colum_birthday#}</td>
												<td class="b" style="width:13%">{#dico_management_patient_search_colum_privatephone#}</td>
												<td class="b" style="width:13%">{#dico_management_patient_search_colum_mobilephone#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="clientBox">
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
	
	{include file="template_left.tpl" client_search="yes"}

	{include file="template_right.tpl"}
	
	<div class="jqmWindow" id="confirmbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
  		
		</div>
			  
		<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="detail" style="display:inline">
						{#dico_management_client_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteClient();" class="butn_link" id="delete"><span>{#dico_management_debt_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_management_debt_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>

	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$('#confirmbox').jqm({
		});
		
	});
	</script>
	{/literal}
