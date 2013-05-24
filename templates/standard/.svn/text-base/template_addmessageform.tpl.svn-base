<div class="block_in_wrapper">

	<h2>{#dico_user_message_add#}</h2>

	<form class="main" method="post" enctype="multipart/form-data" action="user_message.php?action=submit&amp;id={$project.ID}">

		<fieldset>

			<div class="row"><label for="title">{#title#}:</label><input type="text" name="title" id="title" realname="{#title#}" /></div>
			<div class="row_editor"><textarea name="text" id="text" required="0" realname="{#text#}" rows="3" cols="1" ></textarea></div>
			<input type="hidden" name="mid" id="mid" value="{$mid}">
	
			<div class="clear_both_b"></div>

			<div class="row">
			
				<a href="#" onclick="javascript:$('#files').toggle();" class="butn_link">
					<span>
						<img src="templates/standard/img/symbols/files.png" alt=""/>{#dico_user_message_addfile#}
					</span>
				</a>
		
				<div id = "files" style = "display:none;clear:both;">
			
				   	<div class="clear_both_b"></div>
		
				   	<div class="row">
						<label for = "thefiles">{#attachfile#}</label>
						<select name = "thefiles" id = "thefiles">
						<option value = "0">{#chooseone#}</option>
						{section name = file loop=$files}
						<option value = "{$files[file].ID}">{$files[file].name}</option>
						{/section}
						</select>
					</div>
		
					<div class="clear_both_b"></div>
		
				<strong>{#or#} {#addfiles#}</strong>
		
				<div class="clear_both_b"></div>
		
				<div id = "inputs">
					<div class="row">
						<label for = "title">{#title#}:</label><input type = "text" name = "userfile1-title" id="title" />
					</div>
					<div class="row">
						<label for="file">{#file#}:</label><input type="file" class="file" name="userfile1" id="file" required="0" realname="{#file#}" size="20" />
					</div>
				</div>
			
				<input type = "hidden" name="desc" id="desc" value = "" />
			
				<div class="clear_both_b"></div>
		
			</div>
		
			<div class="butn"><button type="submit">{#send#}</button></div>
				<a href = "user_message.php" class="butn_link"><span>{#cancel#}</span></a>
			</div>
	
		</fieldset>

	</form>

</div> {*block_in_wrapper end*}
