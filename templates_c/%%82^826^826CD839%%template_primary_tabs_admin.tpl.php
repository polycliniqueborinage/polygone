<?php /* Smarty version 2.6.19, created on 2013-02-15 09:56:39
         compiled from template_primary_tabs_admin.tpl */ ?>
<div id="menu">
	<ul id="primary_tabs">
		<?php if ($this->_tpl_vars['modules']['admin_menu_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['menu_no_current']; ?>
">
					<a class="nodelete" href="admin_menu.php"><?php echo $this->_config[0]['vars']['navigation_admin_menu']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_people_group_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['group']; ?>
">
				<a class="nodelete" href="admin_people_group.php"><?php echo $this->_config[0]['vars']['navigation_admin_people_group']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_people_user_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['user']; ?>
">
				<a class="nodelete" href="admin_people_user.php"><?php echo $this->_config[0]['vars']['navigation_admin_people_user']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_project_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['project']; ?>
">
				<a class="nodelete" href="admin_project.php"><?php echo $this->_config[0]['vars']['navigation_admin_project']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_listing_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['listing']; ?>
">
				<a class="nodelete" href="admin_listing.php"><?php echo $this->_config[0]['vars']['navigation_admin_listing']; ?>
</a>
			</li>
		<?php endif; ?>
				<?php if ($this->_tpl_vars['modules']['admin_system_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['system']; ?>
">
				<a class="nodelete" href="admin_system.php"><?php echo $this->_config[0]['vars']['navigation_admin_system']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_activity_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['activity']; ?>
">
				<a class="nodelete" href="admin_activity.php"><?php echo $this->_config[0]['vars']['navigation_admin_activity']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_mailing_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['mailing']; ?>
">
				<a class="nodelete" href="admin_mailing.php"><?php echo $this->_config[0]['vars']['navigation_admin_mailing']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_workschedule_adminstate'] == 5): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['workschedule']; ?>
">
				<a class="nodelete" href="management_workschedule.php"><?php echo $this->_config[0]['vars']['navigation_admin_workschedule']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_comptabilite_adminstate'] == 5): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['comptabilite']; ?>
">
			<a class="nodelete" href="management_comptabilite.php"><?php echo $this->_config[0]['vars']['navigation_management_comptabilite']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['admin_comptabilite_adminstate'] == 5): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['grh']; ?>
">
			<a class="nodelete" href="admin_grh.php"><?php echo $this->_config[0]['vars']['navigation_admin_grh']; ?>
</a>
		</li>
		<?php endif; ?>
	</ul>
</div>