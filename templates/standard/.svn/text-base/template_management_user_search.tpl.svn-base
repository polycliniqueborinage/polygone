{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_user="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_addressbook_menu_search#}</span> 
	  				<a href="./management_user.php?action=add">{#dico_management_addressbook_menu_add#}</a>
	  				<a href="./management_user.php?action=list">{#dico_management_addressbook_menu_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2><img src="./templates/standard/img/symbols/user.png" alt="{#ddico_management_user_submenu_search#}" />
										<span>{#dico_management_user_submenu_search#}</span>
									</h2>
								</div>

								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_user_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_management_user_complete_search#}" onkeyup="javascript:userCompleteSearch('',this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%">{#dico_management_user_search_colum_action#}</td>
												<td class="b" style="width:29%">{#dico_management_user_search_colum_login#}</td>
												<td class="b" style="width:30%">{#dico_management_user_search_colum_familyname#}</td>
												<td class="b" style="width:30%">{#dico_management_user_search_colum_firstname#}</td>
											</tr>
										</table>
									</div>
					
									<div class="neutral">

										<div class="block" id="milestone">

											<div class="nosmooth" id="userBox">
											
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
	
	{include file="template_left.tpl" user_search="no"}

	{include file="template_right.tpl"}
