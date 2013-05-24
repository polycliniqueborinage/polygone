<div id="menu">
	<ul id="primary_tabs">
		{if $modules.admin_menu_adminstate == 5}
			<li class="nodelete {$mainmenu.menu_no_current}">
					<a class="nodelete" href="admin_menu.php">{#navigation_admin_menu#}</a>
			</li>
		{/if}
		{if $modules.admin_people_group_adminstate == 5}
			<li class="nodelete {$mainmenu.group}">
				<a class="nodelete" href="admin_people_group.php">{#navigation_admin_people_group#}</a>
			</li>
		{/if}
		{if $modules.admin_people_user_adminstate == 5}
			<li class="nodelete {$mainmenu.user}">
				<a class="nodelete" href="admin_people_user.php">{#navigation_admin_people_user#}</a>
			</li>
		{/if}
		{if $modules.admin_project_adminstate == 5}
			<li class="nodelete {$mainmenu.project}">
				<a class="nodelete" href="admin_project.php">{#navigation_admin_project#}</a>
			</li>
		{/if}
		{if $modules.admin_listing_adminstate == 5}
			<li class="nodelete {$mainmenu.listing}">
				<a class="nodelete" href="admin_listing.php">{#navigation_admin_listing#}</a>
			</li>
		{/if}
		{* {if $modules.admin_statistique_adminstate == 5}
			<li class="nodelete {$mainmenu.statistique}">
				<a class="nodelete" href="admin_statistique.php">{#navigation_admin_statistique#}</a>
			</li>
		{/if}*}
		{if $modules.admin_system_adminstate == 5}
			<li class="nodelete {$mainmenu.system}">
				<a class="nodelete" href="admin_system.php">{#navigation_admin_system#}</a>
			</li>
		{/if}
		{if $modules.admin_activity_adminstate == 5}
			<li class="nodelete {$mainmenu.activity}">
				<a class="nodelete" href="admin_activity.php">{#navigation_admin_activity#}</a>
			</li>
		{/if}
		{if $modules.admin_mailing_adminstate == 5}
			<li class="nodelete {$mainmenu.mailing}">
				<a class="nodelete" href="admin_mailing.php">{#navigation_admin_mailing#}</a>
			</li>
		{/if}
		{if $modules.admin_workschedule_adminstate == 5}
			<li class="nodelete {$mainmenu.workschedule}">
				<a class="nodelete" href="management_workschedule.php">{#navigation_admin_workschedule#}</a>
			</li>
		{/if}
		{if $modules.admin_comptabilite_adminstate == 5}
		<li class="nodelete {$mainmenu.comptabilite}">
			<a class="nodelete" href="management_comptabilite.php">{#navigation_management_comptabilite#}</a>
		</li>
		{/if}
		{if $modules.admin_comptabilite_adminstate == 5}
		<li class="nodelete {$mainmenu.grh}">
			<a class="nodelete" href="admin_grh.php">{#navigation_admin_grh#}</a>
		</li>
		{/if}
	</ul>
</div>
