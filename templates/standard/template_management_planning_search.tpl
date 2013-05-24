{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_planning="yes"}

	<div id="middle">
		
		{if $modules.management_planning_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_planning_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_planning.php">{#dico_planning_menu_week#}</a>

    				<span>{#dico_planning_menu_search#}</span>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								<div class="headline">
									<h2>
										<img alt="" src="./templates/standard/images/symbols/agenda.png" alt="{#dico_management_debt_submenu_search#}" />
										<span>{#dico_planning_submenu_search#}</span>
									</h2>
								</div>
								
								<div id="useredit" class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_planning_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_planning_complete_search#}" onkeyup="javascript:planningCompleteSearch('',this.value);planningSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%">{#dico_management_debt_search_colum_action#}</td>
												<td class="b" style="width:69%">{#dico_planning_search_colum_planning_name#}</td>
												<td class="b" style="width:20%">{#dico_planning_search_colum_planning_time#}</td>
											</tr>
										</table>
									</div>
									
									<div class="neutral">

										<div class="block" id="milestone">

											<div class="nosmooth" id="searchBox">
											
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
	
	{include file="template_left.tpl" planning_search="yes"}

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
						{#dico_planning_confirm_delete_version_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteVersionPlanning();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
		

	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$('#search').focus();
		
		$('#confirmbox').jqm({
		});
		
	});
	</script>
	{/literal}
	
