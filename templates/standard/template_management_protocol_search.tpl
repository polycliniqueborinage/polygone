{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_protocol="yes"}

	<div id="middle">
		
		{if $modules.management_protocol_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_protocol_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_protocol_menu_search#}</span> 

    				<a href="./management_protocol.php?action=add">{#dico_management_protocol_menu_add#}</a>

	  				<a href="./management_protocol.php?action=list">{#dico_management_protocol_menu_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_protocol_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_management_protocol_complete_search#}" onkeyup="javascript:protocolCompleteSearchForManager('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="width:2%"></td>
												<td class="tools">{#dico_management_protocol_search_colum_action#}</td>
												<td style="width:20%">{#dico_management_protocol_search_colum_patient#}</td>
												<td style="width:20%">{#dico_management_protocol_search_colum_user#}</td>
												<td style="width:20%">{#dico_management_protocol_search_colum_addressbook#}</td>
												<td style="width:8%">{#dico_management_protocol_search_colum_date#}</td>
												<td style="width:10%">{#dico_management_protocol_search_colum_attachment#}</td>
												<td class="tools">{#dico_management_protocol_search_colum_export#}</td>
											</tr>
										</table>
									</div>
					
									<div class="neutral">

										<div class="block">

											<div class="nosmooth" id="protocolBox">
											
											</div>

										</div>

									</div>
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" medecin_search="no"}

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
						{#dico_management_protocol_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteProtocol();" class="butn_link" id="delete"><span>{#dico_management_protocol_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_management_protocol_button_cancel#}</span></a>
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
