<div id="menu">
	<ul id="primary_tabs">
		{if $modules.management_menu_no_current_adminstate == 4}
		<li class="nodelete {$mainmenu.menu_no_current}">
				<a class="nodelete" href="management_menu_no_current.php">{#navigation_management_menu_no_current#}</a>
		</li>
		{/if}
		{if $modules.management_protocol_adminstate == 4}
			<li class="nodelete {$mainmenu.protocol}">
				<a class="nodelete" href="management_protocol.php">{#navigation_management_protocol#}</a>
			</li>
		{/if}
		{if $modules.management_sumher_adminstate == 4}
			<li class="nodelete {$mainmenu.sumehr}">
				<a class="nodelete" href="management_sumehr.php">{#navigation_management_sumehr#}</a>
			</li>
		{/if}
		{if $modules.management_user_adminstate == 4}
			<li class="nodelete {$mainmenu.user}">
				<a class="nodelete" href="management_user.php">{#navigation_management_user#}</a>
			</li>
		{/if}
		{if $modules.management_prevention_adminstate == 4}
			<li class="nodelete {$mainmenu.prevention}">
				<a class="nodelete" href="management_prevention.php">{#navigation_management_prevention#}</a>
			</li>
		{/if}
		{if $modules.management_project_adminstate == 4}
		<li class="nodelete {$mainmenu.project}">
			<a class="nodelete" href="management_project.php">{#navigation_management_project#}</a>
		</li>
		{/if}
		{if $modules.management_debt_adminstate == 4}
		<li class="nodelete {$mainmenu.debt}">
			<a class="nodelete" href="management_debt.php">{#navigation_management_debt#}</a>
		</li>
		{/if}
		{if $modules.management_sumehr_adminstate == 4}
		<li class="nodelete {$mainmenu.sumehr}">
			<a class="nodelete" href="management_sumehr.php">{#navigation_management_sumehr#}</a>
		</li>
		{/if}
		{if $modules.management_planning_adminstate == 4}
		<li class="nodelete {$mainmenu.planning}">
			<a class="nodelete" href="management_planning.php">{#navigation_management_planning#}</a>
		</li>
		{/if}
		{if $modules.management_ouvrier_adminstate == 4}
			<li class="nodelete {$mainmenu.ouvrier}">
				<a class="nodelete" href="management_ouvrier.php">{#navigation_management_ouvrier#}</a>
			</li>
		{/if}
	</ul>
</div>