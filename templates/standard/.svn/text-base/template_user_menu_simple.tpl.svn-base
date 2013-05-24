{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_ajax="yes" js_jquery_datepicker="yes" js_jquery_form="yes" js_agenda="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
				</div>
			
				<div class="ViewPane">
				
					{*Messages*}
					{if $msgnum > 0}{if $adminstate > 0}
					
					<div class="block_a">
						
							<div class="in">
							
							   <div class="headline">
								  	
								  	<a href="#" id="messagecookie_toggle" class="win_block" onclick = "toggleBlock('messagecookie');"></a>
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
									<div style="position:relative;">
									
										<div class="win_tools">
											<h2>
												<a href="user_message.php" title="{#dico_user_menu_messages_title#}">
													<img src="./templates/standard/img/symbols/msgs.png" alt="" />
													<span>{#dico_user_menu_messages_span#}</span>
												</a>
											</h2>
										</div>
									</div>
									
								</div>
					
								<div id="messagecookie">
									
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="a" style="width:5%"></td>
												<td class="a" style="width:5%"></td>
												<td class="b" style="width:20%">{#dico_user_menu_messages_colum_message#}</td>
												<td class="c" style="width:20%">{#dico_user_menu_messages_colum_group#}</td>
												<td class="d" style="width:20%">{#dico_user_menu_messages_colum_sendby#}</td>
												<td class="e" style="width:20%">{#dico_user_menu_messages_colum_on#}</td>
												<td>{#dico_user_menu_messages_colum_replies#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div>
										
										<ul id="accordion_messages">
											
											{section name=message loop=$messages}
					
											{*Color-Mix*}
											{if $smarty.section.message.index % 2 == 0}
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
																<td class="a" style="width:5%;">
																	<a class="butn_reply" href="user_message.php?action=add&amp;mid={$messages[message].ID}&amp;id={$messages[message].group}" title="{#dico_user_menu_messages_answer#}"></a>
																</td>
																<td class="b" style="width:20%;">{$messages[message].title|truncate:25:"...":true}</td>
																<td class="c" style="width:20%;">{$messages[message].pname|truncate:20:"...":true}</td>
																<td class="d" style="width:20%;">{$messages[message].username|truncate:20:"...":true}</td>
																<td class="e" style="width:20%;">{$messages[message].postdate}</td>
																<td style="">{$messages[message].replies}</td>
															</tr>
													</table>
														
													<div id="messages_focus{$messages[message].ID}" class="focus_off">

														<div class="accordion_content">
														
															<table class="description" cellpadding="0" cellspacing="0" width="100%">
																<tr valign="top">
																	<td class="a"></td>
		
																	<td class="b" style="width:180px;">
																	{if $messages[message].avatar != ""}
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=files/{$cl_config}/avatar/{$messages[message].avatar}" alt="" /></div>
																	{else}
																	<div class="avatar"><img src = "thumb.php?width=80&amp;height=80&amp;pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
																	{/if}
																	</td>
		
																	<td class="message">
																	
																		<div class="msgin">{$messages[message].text|nl2br}</div>
																		
																		<!-- MESSAGE TEXT -->
																		{if $messages[message].tagnum > 1}<br /><strong>{#tags#}:</strong>
																		{section name = tag loop=$messages[message].tagsarr}
																			<a href = "managetags.php?action=gettag&tag={$messages[message].tagsarr[tag]}&amp;id={$messages[message].group}">{$messages[message].tagsarr[tag]}</a>
																		{/section}
																		{/if}
					
																		<!-- MESSAGE FILE -->
																		{if $messages[message].files[0][0] > 0}
																		<table cellpadding="0" cellspacing="0" style="border-top:1px dashed;margin:15px 0;width=100%">
																			<tr><td colspan="3" class="thead" style="padding:9px 0 3px 0;">{#dico_user_menu_messages_file#}</td></tr>
																			{section name = file loop=$messages[message].files}
																			<tr class="{cycle values="bg_one,bg_two"}">
																				<td style="width:10%;padding:2px 0;">
																					<a href = "{$messages[message].files[file].datei}" {if $messages[message].files[file].imgfile == 1} rel="lytebox[]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text]" {/if}><img src = "templates/standard/img/symbols/files/{$messages[message].files[file].type}.png" alt="{$messages[message].files[file].name}" /></a>
																				</td>
																				<td style="width:90%;padding:0 0 0 5px;">
																					<a href = "{$messages[message].files[file].datei}" {if $messages[message].files[file].imgfile == 1} rel="lytebox[img{$messages[message].ID}]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text{$messages[message].ID}]"{/if}>{$messages[message].files[file].name}</a>
																				</td>
																				<td class="tools" style="width:26px;padding:0;">
																				</td>
																			</tr>
																			{/section}
																		</table>
																		{/if}
																		
																	</td>
																</tr>
															</table>
														
														</div> {*Accordion_Content End*}
							
													</div> {*Focus End*}
					
											</li>
											{/section}
											
											</ul>
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
							</div> {*IN end*}
						</div> {*Block A end*}
					
					{/if}{/if}
					{*Messages End*}		

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" acte_search="no" patient_search="no" product_search="yes" debt_search="yes" user_search="no" addressbook_search="no"}

	{include file="template_right.tpl" useronline="no" chat="no" calendar_light="no"}
	