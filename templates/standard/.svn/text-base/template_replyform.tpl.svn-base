{include file="template_header.tpl" js_jquery="yes" js_jquery_selectable="yes" js_jquery_accordion="yes" js_jquery_datepicker="yes" tinymce="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
				</div>
			
				<div class="ViewPane">
					
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

		<div class="block_b">
			<div class="in">
				<div class="headline">
				<h2><a href="javascript:void(0);" id="messages_toggle" class="win_block" onclick = "$('#messages').toggle;"><img src="./templates/standard/img/symbols/msg_reply.png" alt="" />
				<span>{#dico_user_menu_messages_answer#}</span></a>
				</h2>
				</div>


				<div id = "messages" style = "">
				<div class="block_in_wrapper">

					<form class="main" method="post"  enctype="multipart/form-data" action="user_message.php?action=reply&amp;id={$project.ID}">
					<fieldset>

						<div class="row"><label for="title">{#dico_user_menu_messages_colum_message#}:</label><input type="text" name="title" id="title" realname="{#dico_user_menu_messages_colum_message#}" /></div>
						<div class="row_editor"><textarea name="text" id="text"  realname="{#dico_user_menu_messages_colum_text#}" rows="3" cols="1"></textarea></div>
					
						<input type="hidden" value="{$message.ID}" name="mid" />

						<div class="clear_both_b"></div>

	<div class="row">
	<a href="#" onclick = "javascript:$('#files').toggle();" class="butn_link"><span>
	<img src="templates/standard/img/symbols/files.png" alt=""/>{#dico_user_menu_messages_attachfiles#}
	</span></a>



	<div id = "files" style = "display:none;clear:both;">
	   	<div class="clear_both_b"></div>

	   	<div class="row">
		<label for = "thefiles">{#dico_user_menu_messages_attachfile#}</label>
		<select name = "thefiles" id = "thefiles">
		<option value = "0">{#dico_user_menu_messages_chooseone#}</option>
		{section name = file loop=$files}
		<option value = "{$files[file].ID}">{$files[file].name}</option>
		{/section}
		</select>
		</div>

		<div class="clear_both_b"></div>

		<strong>{#or#} {#addfile#}</strong>

		<div class="clear_both_b"></div>


		<div class="row"><label for = "numfiles">{#count#}:</label>
		<select name = "numfiles" id = "numfiles" onchange = "make_inputs(this.value);">
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
<label for="file">{#file#}:</label><input type="file" class="file" name="userfile1" id="file" required="0" realname="{#file#}" size="20" /></div>
</div><input type = "hidden" name="desc" id="desc" value = "" />

		<div class="clear_both_b"></div>

	</div>
						<div class="clear_both_b"></div>
						<div class="row">
						<div class="butn"><button type="submit">{#send#}</button></div>
						</div>

					</fieldset>
					</form>



				</div> {*block_in_wrapper end*}
				</div>{*Messages end*}



			</div> {*IN end*}
		</div> {*Block B end*}


</div> {*Content_left end*}
{include file="footer.tpl"}