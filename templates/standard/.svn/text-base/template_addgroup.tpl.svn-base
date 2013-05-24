<div class="block_in_wrapper">

	<form class="main" method="post" action="admin_people_group.php?action=addpro">
	
		<fieldset>
	
			<div class="row"><label for="name">{#dico_admin_people_group_name#}:</label><input type="text" name="name" id="name" required="1" realname="{#dico_admin_people_group_name#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
			
			<div class="row"><label for="desc">{#dico_admin_people_group_description#}:</label><textarea name="desc" id="desc" required="0" rows="3" cols="1" ></textarea></div>
	
		    <div class="clear_both_b"></div>
	
			<div class="row">
				<label>{#dico_admin_people_group_members#}:</label>
				<div style="float:left;">
		        {section name=user loop=$users}
			        <div class="row">
			        	<input type="checkbox" class="checkbox" value="{$users[user].ID}" name="assignto[]" id="{$users[user].ID}" required="0" {if $users[user].ID == $userid} checked="checked"{/if} /><label for="{$users[user].ID}">{$users[user].name}</label><br />
			      	</div>
			    {/section}
			    </div>
			</div>
	
			<input type="hidden" name="assignme" value="1" />
	
		    <div class="clear_both_b"></div>
	
			<div class="row">
				<label>&nbsp;</label>
				<div class="butn"><button type="submit">{#addbutton#}</button></div>
				<a href="#" onclick="javascript:$('#form_{$myprojects[project].ID}').toggle();" class="butn_link"><span>{#cancel#}</span></a>
			</div>


		</fieldset>

	</form>

</div> {*block_in_wrapper end*}