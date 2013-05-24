<div id="menu">
	<ul id="primary_tabs">
		{if $modules.user_menu_adminstate == 1}
			<li class="nodelete {$mainmenu.menu}">
				<a class="nodelete" href="index.php">{#navigation_user_menu#}</a>
			</li>
		{/if}
		{if $modules.user_agenda_adminstate == 1}
			<li class="nodelete {$mainmenu.agenda}">
				<a class="nodelete" href="user_agenda.php?action=personal_agenda">{#navigation_user_agenda#}</a>
			</li>
		{/if}
		{if $modules.user_profil_adminstate == 1}
			<li class="nodelete {$mainmenu.profil}">
				<a class="nodelete" href="user_profil.php">{#navigation_user_profil#}</a>
			</li>
		{/if}
		{if $modules.user_protocol_adminstate == 1}
			<li class="nodelete {$mainmenu.protocol}">
				<a class="nodelete" href="user_protocol.php">{#navigation_user_protocol#}</a>
			</li>
		{/if}
		{if $modules.user_sumehr_adminstate == 1}
			<li class="nodelete {$mainmenu.sumehr}">
				<a class="nodelete" href="user_sumehr.php">{#navigation_user_sumehr#}</a>
			</li>
		{/if}
		{if $modules.user_project_adminstate == 1}
			<li class="nodelete {$mainmenu.project}">
				<a class="nodelete" href="user_project.php">{#navigation_user_project#}</a>
			</li>
		{/if}
		{if $modules.user_project_adminstate == 1}
			<li class="nodelete {$mainmenu.userservices}">
				<a class="nodelete" href="user_services.php">{#navigation_user_services#}</a>
			</li>
		{/if}
	</ul>
</div>