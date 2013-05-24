{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_group="yes" js_jquery_validate="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				</div>
			
				<div class="ViewPane">
	
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					<div class="infowin_left" id = "systemmsg">
						{if $mode == "deleted"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_wasdeleted#}</span>
						{elseif $mode == "added"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_wasadded#}</span>
						{elseif $mode == "deassigned"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_deassigned#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
				
					{*Projects*}
					<div class="block_a">
	
						<div class="in">
			
							<div class="headline">
						
								<h2><a href="#" id="projects_toggle" class="win_block" onclick = "toggleBlock('projects');"><img src="./templates/standard/img/symbols/projects.png" alt="" />
									<span>{#dico_admin_people_group_group#}</span></a>
								</h2>
			
							</div>
	
						<div id="projects">
	
							<div class="table_head">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="a" style="width:5%"></td>
										<td class="a" style="width:3%"></td>
										<td class="b" style="width:30%">{#dico_admin_people_group_messages_colum_group#}</td>
										<td class="c" style="width:20%"></td>
										<td class="d" style="width:20%"></td>
									</tr>
								</table>
							</div>
	
							<div class="table_body">
				
								<div>
							
									<ul id="accordion_projects">
											
									{section name=ogroup loop=$ogroups}
	
										{*Color-Mix*}
										{if $smarty.section.ogroup.index % 2 == 0}
										<li class="bg_a">
										{else}
										<li class="bg_b">
										{/if}
		
											<table class="resume" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td class="a" style="width:5%;">
														<div class="accordion_toggle">
															<a class="" style="width:20px;" href="javascript:void(0);" onclick = ""></a>
														</div>
													</td>
													<td class="tools" style="width:3%;">
														<a class="tool_del" onclick="deleteConfirmBox({$ogroups[ogroup].ID})" title="{#dico_admin_people_group_delete#}"></a>
													</td>
													<td class="b" style="width:30%;">{$ogroups[ogroup].name}</td>
													<td class="c" style="width:20%;"></td>
													<td class="d" style="width:20%;"></td>
													</tr>
											</table>
	
											<div class="accordion_content">
													
												<table class="description" cellpadding="0" cellspacing="0"  width="100%">
													
													<tr valign="top">
															
														<td class="a" style="width:5%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="a" style="width:3%;"></td>
														<td class="b"  style="width:30%;">
															<h2>{#description#}</h2>
															<div style="overflow:auto;">
																{$ogroups[ogroup].desc}
															</div>
														</td>
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" style="background:white;width="100%">
	
															{section name = membs loop=$ogroups[ogroup].members}
																{if $smarty.section.membs.index % 2 == 0}
																<tr>
																	<td style="padding:2px 0;">
																		<div class="avatar">
																		{if $ogroups[ogroup].members[membs].avatar != ""}
																		<img src = "thumb.php?pic=files/{$cl_config}/avatar/{$ogroups[ogroup].members[membs].avatar}&amp;height=25&amp;width=25" alt="" />
																		{else}
																		<img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg&amp;height=25&amp;width=25" alt="" />
																		{/if}
																		</div>
																	</td>
																	<td style="width:204px;padding:0 0 0 5px;">
																		{$ogroups[ogroup].members[membs].name}
																	</td>
																	<td class="tools" style="width:26px;padding:0;">
										                               <a class="tool_del" href="admin_people_group.php?action=deassign&amp;user={$ogroups[ogroup].members[membs].ID}&amp;id={$ogroups[ogroup].ID}" title="{#dico_admin_people_group_deassign#}" alt="{#dico_admin_people_group_deassign#}"></a>
																	</td>
	
																</tr>
																{/if}
															{/section}
		
															</table>
							
														</td>
														
														<td class="c">
																
															<table cellpadding="0" cellspacing="0" style="background:white;width="100%">
	
															{section name = membs loop=$ogroups[ogroup].members}
																{if $smarty.section.membs.index % 2 == 1}
																<tr>
																	<td style="padding:2px 0;">
																		<div class="avatar">
																		{if $ogroups[ogroup].members[membs].avatar != ""}
																		<img src = "thumb.php?pic=files/{$cl_config}/avatar/{$ogroups[ogroup].members[membs].avatar}&amp;height=25&amp;width=25" alt="" />
																		{else}
																		<img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg&amp;height=25&amp;width=25" alt="" />
																		{/if}
																		</div>
																	</td>
																	<td style="width:204px;padding:0 0 0 5px;">
																		{$ogroups[ogroup].members[membs].name}
																	</td>
																	<td class="tools" style="width:26px;padding:0;">
										                               <a class="tool_del" href="admin_people_group.php?action=deassign&amp;user={$ogroups[ogroup].members[membs].ID}&amp;id={$ogroups[ogroup].ID}" title="{#dico_admin_people_group_deassign#}" alt="{#dico_admin_people_group_deassign#}"></a>
																	</td>
																</tr>
																{/if}
															{/section}
		
															</table>
							
														</td>
														
													</tr>
													
												</table>
					
											</li>
											{/section}
											
										</ul>
					
									</div> {*Accordion End*}
								
								</div> {*Table_Body End*}
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
			
							</div> {*projects end*}
		
							{*Add Project*}
		        
			        	    {if $adminstate > 4}
							<a href="#" onclick="javascript:$('#form_{$myprojects[project].ID}').toggle();" class="butn_link_b"><span>{#dico_admin_people_group_addgroup#}</span></a><br />
								<div class="clear_both_b"></div>
								<div id = "form_{$myprojects[project].ID}" style = "display:none;">
			        			    
			        			    <div class="block_in_wrapper">

										<form class="main" method="post" action="admin_people_group.php?action=add">
	
											<fieldset>
	
												<div class="row"><label for="name">{#dico_admin_people_group_name#}:</label><input type="text" name="name" id="name" realname="{#dico_admin_people_group_name#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
			
												<div class="row"><label for="desc">{#dico_admin_people_group_desc#}:</label><textarea name="desc" id="desc" required="0" rows="3" cols="1" ></textarea></div>
	
											    <div class="clear_both_b"></div>
	
												<div class="row">
													<label>{#dico_admin_people_group_members#}:</label>
													<div style="float:left;">
		    										    {section name=user loop=$users}
									   	 			    <div class="row">
								       				 		<input type="checkbox" class="checkbox" value="{$users[user].ID}" name="assignto[]" id="{$users[user].ID}" {if $users[user].ID == $userid} checked="checked"{/if} /><label for="{$users[user].ID}">{$users[user].name}</label><br />
										    		  	</div>
												    	{/section}
												    </div>
												</div>
	
												<input type="hidden" name="assignme" value="1" />
	
											    <div class="clear_both_b"></div>
	
												<div class="row">
													<label>&nbsp;</label>
													<div class="butn"><button type="submit">{#dico_admin_people_group_button_add#}</button></div>
													<a href="#" onclick="javascript:$('#form_{$myprojects[project].ID}').toggle();" class="butn_link"><span>{#dico_admin_people_group_button_cancel#}</span></a>
												</div>

											</fieldset>

										</form>

									</div> {*block_in_wrapper end*}

			        			    
			        		    </div>
			        	    {/if}
					
							{*Add Project End*}
		
						</div> {*IN end*}
			
					</div> {*Block A end*}
				
				</div>
					
			</div>

		</div>

	</div>
	
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
						{#dico_admin_people_group_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="delete"><span>{#dico_admin_people_group_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_admin_people_group_button_cancel#}</span></a>
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
	
		/*$("#accordion_projects").accordion({
			header: 'TABLE.resume',
			selectedClass: 'open',
			event: 'mouseover'
		});*/

	    $("form").validate({
			rules: {
				name : { required: true, remote: "php_request/check_group.php" }
   			},
   			messages: {
				name: {
 			    	required: "{/literal}{#dico_admin_error_required#}{literal}",
 			    	remote: "{/literal}{#dico_admin_error_group_unique#}{literal}"
 			    	
 				}
			},
			submitHandler: function() {
				form.submit();
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
		
		
	});
	</script>
	{/literal}
	
	
