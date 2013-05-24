{include file="template_header.tpl" js_jquery="yes" js_jquery_selectable="yes" js_jquery_accordion="yes" js_jquery_datepicker="yes" tinymce="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "display:none;" id = "systemmsg">
					{if $mode == "added"}
					<span class="info_in_green"><img src="templates/standard/img/symbols/msg.png" alt=""/>{#messagewasadded#}</span>
					{elseif $mode == "edited"}
					<span class="info_in_yellow"><img src="templates/standard/img/symbols/msg.png" alt=""/>{#messagewasedited#}</span>
					{elseif $mode == "deleted"}
					<span class="info_in_red"><img src="templates/standard/img/symbols/msg.png" alt=""/>{#messagewasdeleted#}</span>
					{elseif $mode == "replied"}
					<span class="info_in_green"><img src="templates/standard/img/symbols/msg_reply.png" alt=""/>{#replywasadded#}</span>
					{/if}
					</div>
					{literal}
					<script type = "text/javascript">
						systemeMessage('systemmsg');
					</script>
					{/literal}
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					{section name  = project loop=$myprojects}
					<div class="block_a">
			
						<div class="in">
						
							<div class="headline">
								<a href="javascript:void(0);" id="messages{$myprojects[project].ID}_toggle" class="win_block" onclick = "$('#messages{$myprojects[project].ID}').toggle();"><img src="./templates/standard/img/symbols/msgs.png" alt="" /></a>

								<div style="position:relative;">
									<div class="win_tools">
										<h2>
											<a href="user_message.php?action=showproject&id={$myprojects[project].ID}" title="{#myprojects#}">
											<img src="./templates/standard/img/symbols/projects.png" alt="" />
											<span>{$myprojects[project].name}</span>
											</a>
										</h2>
									</div>
								</div>
							</div>

							<div id = "messages{$myprojects[project].ID}" style = "">


								<div class="table_head">
					
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td class="a" style="width:5%"></td>
										<td class="a" style="width:5%"></td>
										<td class="a" style="width:5%"></td>
										<td class="b" style="width:180px;">{#dico_user_menu_messages_colum_message#}</td>
										<td class="c" style="width:120px;">{#dico_user_menu_messages_colum_on#}</td>
										<td class="d">{#dico_user_menu_messages_colum_sendby#}</td>
										<td style="width:90px;">{#dico_user_menu_messages_colum_replies#}</td>
									</tr>
								</table>
								
								</div>


								<div class="table_body">
	
									<div id = "accordion_messages{$myprojects[project].ID}" class=="accordion_messages">
			
										<ul>
										{section name=message loop=$myprojects[project].messages}

											{*Color-Mix*}
											{if $smarty.section.message.index % 2 == 0}
											<li class="bg_a">
											{else}
											<li class="bg_b">
											{/if}

												<table class="resume" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td class="a" style="width:5%">
															<div class="accordion_toggle">
																<a class="" style="width:20px;" href="javascript:void(0);" onclick = ""></a>
															</div>
														</td>
														<td class="tools" style="width:5%"><a class="butn_reply" href="user_message.php?action=replyform&amp;mid={$myprojects[project].messages[message].ID}&amp;id={$myprojects[project].ID}" title="{#dico_user_menu_messages_answer#}"></a></td>
														<td class="tools" style="width:5%"><a class="tool_del" href="user_message.php?action=del&amp;mid={$myprojects[project].messages[message].ID}&amp;id={$myprojects[project].ID}" title="{#dico_user_menu_messages_delete#}"></a></td>
														<td class="b" style="width:180px;"><a href="user_message.php?action=showmessage&amp;mid={$myprojects[project].messages[message].ID}&amp;id={$myprojects[project].ID}">{$myprojects[project].messages[message].title|truncate:20:"...":true}</a></td>
														<td class="c" style="width:120px;">{$myprojects[project].messages[message].postdate}</td>
														<td class="d"><a href="manageuser.php?action=profile&amp;id={$myprojects[project].messages[message].user}">{$myprojects[project].messages[message].username|truncate:20:"...":true}</a></td>
														<td style="width:90px;">
															{if $messages[message].replies > 0}
															<a href = "user_message.php?action=showmessage&amp;mid={$myprojects[project].messages[message].ID}&amp;id={$myprojects[project].ID}#replies">{$myprojects[project].messages[message].replies}</a>
															{else}
															{$myprojects[project].messages[message].replies}
															{/if}
														</td>
								
													</tr>
												</table>

												<div class="link_in_toggle"></div>

												{*Accordeon_Toggle End*}
												<div class="accordion_content">
						
													<table class="description" cellpadding="0" cellspacing="0" width="100%">
											
														<tr valign="top">
												
															<td class="a"></td>
															<td class="b" style="width:180px;">

																{if $myprojects[project].messages[message].avatar != ""}
																<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=files/{$cl_config}/avatar/{$myprojects[project].messages[message].avatar}" alt="" /></div>
																{else}
																<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
																{/if}
															</td>
															<td class="message">
																<div class="msgin">{$myprojects[project].messages[message].text}</div>
																{if $myprojects[project].messages[message].files[0][0] > 0}
																<table cellpadding="0" cellspacing="0" style="border-top:1px dashed;margin:15px 0" width="100%">
																	<tr><td colspan="3" class="thead" style="padding:9px 0 3px 0;">{#files#}</td></tr>
																		{section name = file loop=$myprojects[project].messages[message].files}
															<tr class="{cycle values="bg_one,bg_two"}">
									<td style="width:26px;padding:2px 0;">
									<a href = "{$myprojects[project].messages[message].files[file].datei}" {if $myprojects[project].messages[message].files[file].imgfile == 1} rel="lytebox[]" {elseif $myprojects[project].messages[message].files[file].imgfile == 2} rel = "lyteframe[text]" {/if}><img src = "templates/standard/img/symbols/files/{$myprojects[project].messages[message].files[file].type}.png" alt="{$myprojects[project].messages[message].files[file].name}" /></a>
									</td><td style="width:347px;padding:0 0 0 5px;">
									<a href = "{$myprojects[project].messages[message].files[file].datei}"{if $myprojects[project].messages[message].files[file].imgfile == 1} rel="lytebox[img{$myprojects[project].messages[message].ID}]" {elseif $myprojects[project].messages[message].files[file].imgfile == 2} rel = "lyteframe[text{$myprojects[project].messages[message].ID}]"{/if}>{$myprojects[project].messages[message].files[file].name}</a>
									</td>
									<td class="tools" style="width:26px;padding:0;">
	                                <a class="tool_del" href="#" title="{#delete#}"></a>
									</td>
									</tr>
								{/section}
								</table>
								{/if}
							</td>
							</tr>
							</table>
							</div> {*Accordion_Content End*}
									
							
					</li>
					{/section}
					</ul>
					</div> 
					{*Accordion End*}
									
				</div> {*Table_Body End*}



					{*Add Message*}
					<div class="clear_both_b"></div> {*required ... do not delete this row*}
	{*Add Message*}
						<a href="#" onclick = "javascript:$('#addmsg{$myprojects[project].ID}').toggle();" class="butn_link_b"><span>{#dico_user_menu_messages_add#}</span></a>
						<div class="clear_both_b"></div> {*required ... do not delete this row*}
						<div id = "addmsg{$myprojects[project].ID}" style = "display:none;">
						<div class="block_in_wrapper">

	<h2>{#dico_user_menu_messages_add#}</h2>

	<form class="main" method="post" enctype="multipart/form-data" action="managemessage.php?action=add&amp;id={$myprojects[project].ID}" {literal} onsubmit="return validateCompleteForm(this,'input_error');"{/literal} >
	<fieldset>

	<div class="row"><label for="title">{#dico_user_menu_messages_colum_message#}:</label><input type="text" name="title" id="title" realname="{#dico_user_menu_messages_colum_message#}" /></div>
	<div class="row_editor"><textarea name="text" id="text{$myprojects[project].ID}"  realname="{#text#}" rows="3" cols="1" ></textarea></div>

	<div class="clear_both_b"></div>

	<div class="row">
	<a href="#" onclick = "javascript:$('#files{$myprojects[project].ID}').toggle();" class="butn_link"><span>
	<img src="templates/standard/img/symbols/files.png" alt=""/>{#attachfiles#}
	</span></a>



	<div id = "files{$myprojects[project].ID}" style = "display:none;clear:both;">
	   	<div class="clear_both_b"></div>

	   	<div class="row">
		<label for = "thefiles">{#attachfile#}</label>
		<select name = "thefiles" id = "thefiles">
		<option value = "0">{#chooseone#}</option>
		{section name = file loop=$myprojects[project].files}
		<option value = "{$myprojects[project].files[file].ID}">{$myprojects[project].files[file].name}</option>
		{/section}
		</select>
		</div>

		<div class="clear_both_b"></div>

		<strong>{#or#} {#addfiles#}</strong>

		<div class="clear_both_b"></div>

		<div class="row"><label for = "numfiles{$myprojects[project].ID}">{#count#}:</label>
		<select name = "numfiles" id = "numfiles{$myprojects[project].ID}" onchange = "make_inputs(this.value);">
		<option value = "1" selected="selected">1</option>
		<option value = "2">2</option>
		<option value = "3">3</option>
		<option value = "4">4</option>
		<option value = "5">5</option>
		<option value = "6">6</option>
		<option value = "7">7</option>
		<option value = "8">8</option>
		<option value = "9">9</option>
		<option value = "10">10</option>
		</select>
		</div>

	<div id = "inputs">

<div class="row"><label for = "title">{#title#}:</label><input type = "text" name = "userfile1-title" id="title" /></div>
		<div class="row">
<label for="file">{#dico_user_menu_messages_file#}:</label><input type="file" class="file" name="userfile1" id="file" required="0" realname="{#dico_user_menu_messages_file#}" size="20" /></div>
</div><input type = "hidden" name="desc" id="desc" value = "" />

		<div class="clear_both_b"></div>

	</div>


	<div class="butn"><button type="submit">{#send#}</button></div>
	<a href = "javascript:blindtoggle('addmsg{$myprojects[project].ID}');" class="butn_link"><span>{#cancel#}</span></a>
	</div>

	</fieldset>
	</form>

</div> {*block_in_wrapper end*}

						</div>
					{*Add Message End*}
					{*Add Message End*}

				</div>{*Messages end*}


			</div> {*IN end*}
		</div> {*Block B end*}
{/section}



</div> {*Content_left end*}

