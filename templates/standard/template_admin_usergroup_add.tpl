{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_workschedule="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./admin_grh.php?action=list_usergroup">{#navigation_title_admin_usergroup_liste#}</a>

    				{if $ug.id != ""}
						<span>{#navigation_title_admin_usergroup_edit#}</span>
					{/if}
					{if $ug.id == ""}
						<span>{#navigation_title_admin_usergroup_add#}</span>
					{/if}
    				
    				<a href="./admin_grh.php?action=add_assignment">{#navigation_title_admin_usergroup_assignment_add#}</a>
    				
    				<a href="./admin_grh.php?action=list_assignment">{#navigation_title_admin_usergroup_assignment_list#}</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('dwsedit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
									{if $ug.id != ""}
										<span>{#navigation_title_admin_usergroup_edit#}</span>
									{/if}
									{if $ug.id == ""}
										<span>{#navigation_title_admin_usergroup_add#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "dwsedit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="admin_grh.php?action=submit_usergroup" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										<input type = "hidden" value = "{$ug.id}" name = "id" id="id" class="{$errors.id}" realname="{#dico_management_daily_wsr_id#}" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/>

											<div class="row"><label for = "description" class="name">{#dico_admin_grh_usergroup_description#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$ug.description}" name = "description" id="description" class="{$errors.description}" realname="{#dico_admin_grh_usergroup_description#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											<div class="row">
											<label for = "leader" class="name">{#dico_admin_grh_usergroup_leader#}:</label>
											<select name="leader" id="leader" realname="{#dico_admin_grh_usergroup_leader#}" autocomplete="off">
														
											{section name=user loop=$users}
												{if $users[user].id == $ug.leader}
													<option value="{$users[user].ID}" SELECTED="true">{$users[user].familyname} {$users[user].firstname}</option>
												{else}
													<option value="{$users[user].ID}">{$users[user].familyname} {$users[user].firstname}</option>
												{/if}
											{/section}
											<option value="0" SELECTED="true">{#dico_management_wsr_choice#}</option>
											</select>
											</div>
			
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
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
	
	{include file="template_left.tpl" daily_wsr_search="yes"}
	
		{literal}
	<script type="text/javascript">
		var valuesize =  null;
		
		$(document).ready(function() {
		
		    $("form").validate({
			rules: {
	  			description: "required",
	  			
   			},
   			messages: {
 				description: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				}
 			},
			submitHandler: function() {
				form.submit();
			}
		});
		
	});
	</script>
	{/literal}
	
