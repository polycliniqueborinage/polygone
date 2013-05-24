{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_workschedule="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./admin_grh.php?action=list_usergroup">{#navigation_title_admin_usergroup_liste#}</a>
				
    				<a href="./admin_grh.php?action=add_usergroup">{#navigation_title_admin_usergroup_add#}</a>
    			
    				<span>{#navigation_title_admin_usergroup_assignment_add#}</span>
    				
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
									<span>{#navigation_title_admin_usergroup_assignment_add#}</span>
								</a>
								</h2>
							</div>
			
							<div id = "addassignment" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="admin_grh.php?action=submit_assignment" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">

											<div class="row">
											<label for = "group" class="name">{#dico_admin_grh_usergroup_groupe#}:</label>
											<select name="group" id="group" realname="{#dico_admin_grh_usergroup_groupe#}" autocomplete="off">
											<option value="0" SELECTED="true">{#dico_management_wsr_choice#}</option>			
											{section name=groupe loop=$groupes}
												<option value="{$groupes[groupe].id}">{$groupes[groupe].description}</option>
											{/section}
											</select>
											</div>
											
											<div class="row">
											<label for = "member" class="name">{#dico_admin_grh_usergroup_member#}:</label>
											<select name="member" id="member" realname="{#dico_admin_grh_usergroup_member#}" autocomplete="off">
											<option value="0" SELECTED="true">{#dico_management_wsr_choice#}</option>			
											{section name=user loop=$users}
												<option value="{$users[user].ID}">{$users[user].familyname} {$users[user].firstname}</option>
											{/section}
											
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
	
