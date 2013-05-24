{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_addressbook="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_addressbook_menu_search#}</span> 

    				<a href="./management_addressbook.php?action=add">{#dico_management_addressbook_menu_add#}</a>

	  				<a href="./management_addressbook.php?action=list">{#dico_management_addressbook_menu_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2><img src="./templates/standard/img/symbols/addressbook.png" alt="{#dico_management_addressbook_submenu_search#}" />
										<span>{#dico_management_addressbook_submenu_search#}</span>
									</h2>
								</div>

								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_addressbook_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_management_addressbook_complete_search#}" onkeyup="javascript:addressbookCompleteSearch('',this.value);addressbookSimpleSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%">{#dico_management_addressbook_search_colum_action#}</td>
												<td class="b" style="width:7%">{#dico_management_addressbook_search_colum_type#}</td>
												<td class="b" style="width:5%">{#dico_management_addressbook_search_colum_code#}</td>
												<td class="b" style="width:21%">{#dico_management_addressbook_search_colum_compagny#}</td>
												<td class="b" style="width:13%">{#dico_management_addressbook_search_colum_familyname#}</td>
												<td class="b" style="width:13%">{#dico_management_addressbook_search_colum_firstname#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_workphone#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_mobilephone#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_privatephone#}</td>
											</tr>
										</table>
									</div>
					
									<div class="neutral">

										<div class="block" id="milestone">

											<div class="nosmooth" id="addressbookBox">
											
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
	
	{include file="template_left.tpl" addressbook_search="yes"}

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
						{#dico_management_addressbook_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteAddressbook();" class="butn_link" id="delete"><span>{#dico_management_addressbook_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_management_addressbook_button_cancel#}</span></a>
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
