<?php /* Smarty version 2.6.19, created on 2013-02-15 09:50:55
         compiled from template_primary_tabs_user.tpl */ ?>
<div id="menu">
	<ul id="primary_tabs">
		<?php if ($this->_tpl_vars['modules']['user_menu_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['menu']; ?>
">
				<a class="nodelete" href="index.php"><?php echo $this->_config[0]['vars']['navigation_user_menu']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_agenda_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['agenda']; ?>
">
				<a class="nodelete" href="user_agenda.php?action=personal_agenda"><?php echo $this->_config[0]['vars']['navigation_user_agenda']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_profil_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['profil']; ?>
">
				<a class="nodelete" href="user_profil.php"><?php echo $this->_config[0]['vars']['navigation_user_profil']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_protocol_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['protocol']; ?>
">
				<a class="nodelete" href="user_protocol.php"><?php echo $this->_config[0]['vars']['navigation_user_protocol']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_sumehr_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['sumehr']; ?>
">
				<a class="nodelete" href="user_sumehr.php"><?php echo $this->_config[0]['vars']['navigation_user_sumehr']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_project_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['project']; ?>
">
				<a class="nodelete" href="user_project.php"><?php echo $this->_config[0]['vars']['navigation_user_project']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['user_project_adminstate'] == 1): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['userservices']; ?>
">
				<a class="nodelete" href="user_services.php"><?php echo $this->_config[0]['vars']['navigation_user_services']; ?>
</a>
			</li>
		<?php endif; ?>
	</ul>
</div>