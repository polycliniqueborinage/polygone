<div class="block_in_wrapper">

	<form class="main" method="post" action="admin_people_user.php?action=add">
	<fieldset>

		<div class="row"><label for="name">{#dico_admin_people_user_name#}<span class="mandatory">*</span>:</label><input type="text" name="name" id="name" required="1" realname="{#dico_admin_people_user_name#}" /></div>
		<div class="row"><label for="pass">{#dico_admin_people_user_password#}<span class="mandatory">*</span>:</label><input type="text" name="pass" id="pass" required="1" realname="{#dico_admin_people_user_password#}" /></div>
		<div class="row"><label for="email">{#dico_admin_people_user_familyname#}<span class="mandatory">*</span>:</label><input type="text" name="familyname" id="familyname" required="0" realname="{#dico_admin_people_user_familyname#}" /></div>
		<div class="row"><label for="email">{#dico_admin_people_user_firstname#}<span class="mandatory">*</span>:</label><input type="text" name="firstname" id="firstname" required="0" realname="{#dico_admin_people_user_firstname#}" /></div>

		<div class="clear_both_b"></div>

		<div class="row"><label>{#dico_admin_people_user_groups#}:</label>
		<div style="float:left;">
		{section name=project loop=$projects}
			<div class="row">
	        <input type="checkbox" class="checkbox" value="{$projects[project].ID}" name="assignto[]" id="{$projects[project].ID}" required="0" /><label for="{$projects[project].ID}" style="width:210px;">{$projects[project].name}</label>
	        </div>
	    {/section}
	    </div>

	    <div class="clear_both_b"></div>

		<div class="row"><label>{#dico_admin_people_user_permissions#}:</label>
		<div class = "row"><label></label><input type="radio" class="checkbox" value="1" name="isadmin" id="isadmin1" required="0" checked /><label for="isadmin1">{#dico_admin_people_user_user#}</label></div>
		<div class = "row"><label></label><input type="radio" class="checkbox" value="3" name="isadmin" id="isadmin2" required="0" /><label for="isadmin2">{#dico_admin_people_user_manager#}</label></div>
		<div class = "row"><label></label><input type="radio" class="checkbox" value="5" name="isadmin" id="isadmin3" required="0" /><label for="isadmin3">{#dico_admin_people_user_admin#}</label></div>
		</div>

	    <div class="clear_both_b"></div>

		<div class="row">
		<label>&nbsp;</label>
		<div class="butn"><button type="submit">{#dico_admin_people_user_addbutton#}</button></div>
		<a href="#" onclick = "javascript:$('#adduser').toggle();" class="butn_link"><span>{#dico_admin_people_user_cancel#}</span></a>
		</div>


	</fieldset>
	</form>

</div> {*block_in_wrapper end*}