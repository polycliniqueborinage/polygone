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
	systemMsg('systemmsg');
	 </script>
	{/literal}



		<div class="block_b">
			<div class="in">
				<div class="headline">
				<h2><a href="javascript:void(0);" id="messages_toggle" class="win_block" onclick = "$('#messages').toggle();"><img src="./templates/standard/img/symbols/msgs.png" alt="" />
				<span>{#messages#} {$projectname}</span></a>
				</h2>
				</div>

				<div id = "messages" style = "">
				{if $messagenum > 0}

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
					<div id = "accordion_messages" >
					<ul>
					{section name=message loop=$messages}

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
								<td class="tools" style="width:5%"><a class="butn_reply" href="user_message.php?action=replyform&amp;mid={$messages[message].ID}&amp;id={$project.ID}" title="{#answer#}"></a></td>
								<td class="tools" style="width:5%"><a class="tool_del" href="user_message.php?action=del&amp;mid={$messages[message].ID}&amp;id={$project.ID}" title="{#delete#}"></a></td>
								<td class="b" style="width:180px;"><a href="user_message.php?action=showmessage&amp;mid={$messages[message].ID}&amp;id={$project.ID}">{$messages[message].title|truncate:20:"...":true}</a></td>
								<td class="c" style="width:120px;">{$messages[message].postdate}</td>
								<td class="d"><a href="manageuser.php?action=profile&amp;id={$messages[message].user}">{$messages[message].username|truncate:20:"...":true}</a></td>
								<td style="width:90px;">
								{if $messages[message].replies > 0}
								<a href = "user_message.php?action=showmessage&amp;mid={$messages[message].ID}&amp;id={$messages[message].project}#replies">{$messages[message].replies}</a>
								{else}
								{$messages[message].replies}
								{/if}
								</td>
								
								
								
								
							</table>

							{*Accordeon_Toggle End*}
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
								<div class="msgin">
								{$messages[message].text|nl2br}
								</div>
								
	
							
							<!-- If Files in Messages -->
							{if $messages[message].files[0][0] > 0}
								<table cellpadding="0" cellspacing="0" style="border-top:1px dashed;margin:15px 0" width="100%">
								<tr><td colspan="3" class="thead" style="padding:9px 0 3px 0;">{#files#}</td></tr>
								{section name = file loop=$messages[message].files}
									<tr class="{cycle values="bg_one,bg_two"}">
									<td style="width:26px;padding:2px 0;">
									<a href = "{$messages[message].files[file].datei}" {if $messages[message].files[file].imgfile == 1} rel="lytebox[]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text]" {/if}><img src = "templates/standard/img/symbols/files/{$messages[message].files[file].type}.png" alt="{$messages[message].files[file].name}" /></a>
									</td><td style="width:347px;padding:0 0 0 5px;">
									<a href = "{$messages[message].files[file].datei}"{if $messages[message].files[file].imgfile == 1} rel="lytebox[img{$messages[message].ID}]" {elseif $messages[message].files[file].imgfile == 2} rel = "lyteframe[text{$messages[message].ID}]"{/if}>{$messages[message].files[file].name}</a>
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
					</div> {*Accordion End*}

										{literal}
										<script type = "text/javascript">
										$("#accordion_messages").accordion({
								            header: 'TABLE.resume',
            								selectedClass: 'open',
            								event: 'mouseover'
        								});
										</script>
										{/literal}

				</div> {*Table_Body End*}

				{/if}

					{*Add Message*}
						<a href="#" onclick="javascript:$('#addmsg').toggle();" class="butn_link_b"><span>{#dico_user_menu_messages_add#}</span></a>
							<div class="clear_both_b"></div> {*required ... do not delete this row*}
						<div id = "addmsg" style = "display:none;">
						{include file="addmessageform.tpl" }
						</div>
					{*Add Message End*}

				</div>{*Messages end*}


			</div> {*IN end*}
		</div> {*Block B end*}

</div>

</div>

</div>