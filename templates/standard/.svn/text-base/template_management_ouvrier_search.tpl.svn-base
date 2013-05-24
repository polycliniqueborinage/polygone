{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_ouvrier="yes"}

	<div id="middle">
		
		{if $modules.management_ouvrier_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_ouvrier_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_ouvrier_menu_search#}</span> 
						
    				<a href="./management_ouvrier.php?action=add">{#dico_ouvrier_menu_add#}</a>

    				<a href="./management_ouvrier.php?action=list">{#dico_ouvrier_menu_list#}</a>

				</div>
				
				<div class="ViewPane">
				
					<div class="infowin_left" style = "display:none" id = "systemmsg">
					</div>
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2><a href="javascript:void(0);" id="product_toggle" class="win_block" onclick = "toggleBlock('ouvrier');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<span>{#dico_ouvrier_submenu_search#}</span></a>
								</h2>
						
							</div>
								
							<div class="block_in_wrapper">

								<form class="main" method="post" action="#">
										
									<fieldset>
										
										<div class="row">
											<label for="name">{#dico_ouvrier_complete_search#}:</label>
											<input type="text" name="search" id="search" realname="{#dico_ouvrier_complete_search#}" onkeyup="javascript:ouvrierCompleteSearch('',this.value);ouvrierSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
										</div>
												
									</fieldset>
									
								</form>
									
							</div>
					
							<div id="ouvrier">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="tools" style="width:9%">{#dico_ouvrier_search_colum_action#}</td>
												<td class="b" style="width:20%">{#dico_ouvrier_search_colum_familyname#}</td>
												<td class="b" style="width:20%">{#dico_ouvrier_search_colum_firstname#}</td>
												<td class="b" style="width:17%">{#dico_ouvrier_search_colum_salaire_horaire#}</td>
												<td class="b" style="width:16%">{#dico_ouvrier_search_colum_bonus_recurrent#}</td>
												<td class="b" style="width:16%">{#dico_ouvrier_search_colum_cout_recurrent#}</td>

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
	
	{include file="template_left.tpl" ouvrier_search="yes"}

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
						{#dico_ouvier_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteOuvrier();" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
	
		$("#search").focus();
		
		$('#confirmbox').jqm({
		});
	});
	</script>
	{/literal}

