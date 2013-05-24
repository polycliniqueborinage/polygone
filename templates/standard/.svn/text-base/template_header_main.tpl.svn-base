<div id="site_background">
	<div id="sitebody">

		<div id="header">

			<div class="left">
				<h1 class="head"><a href="index.php">{$settings.name}</a></h1>
				<h2 class="head">{$settings.subtitle}</h2>
				<h1>{$title}</h1>
			</div>

			<div class="right">

			{if $loggedin == 1}
			<div class="button">
			
				<a class="{$mainclasses.user}" href="user_menu.php"><span>{#navigation_first_menu_user#}</span></a>
				
                {if $adminstate > 2}
                <a class="{$mainclasses.management_current}" href="management_menu_current.php"><span>{#navigation_first_menu_management_current#}</span></a>
                {/if}

                {if $adminstate > 3}
                <a class="{$mainclasses.management_no_current}" href="management_menu_no_current.php"><span>{#navigation_first_menu_management_no_current#}</span></a>
                {/if}

                {if $adminstate > 4}
                <a class="{$mainclasses.admin}" href="admin_menu.php"><span>{#navigation_first_menu_administration#}</span></a>
                {/if}

				<a class="{$mainclasses.logout}" href="user_menu.php?action=logout"><span>{#navigation_first_menu_logout#}</span></a>

			</div>
			{/if}
			
			</div>

		</div>


		<div id="contentwrapper">

