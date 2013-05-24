<?php /* Smarty version 2.6.19, created on 2012-11-09 09:40:01
         compiled from template_primary_tabs_management_no_current.tpl */ ?>
<div id="menu">
	<ul id="primary_tabs">
		<?php if ($this->_tpl_vars['modules']['management_menu_no_current_adminstate'] == 4): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['menu_no_current']; ?>
">
				<a class="nodelete" href="management_menu_no_current.php"><?php echo $this->_config[0]['vars']['navigation_management_menu_no_current']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_protocol_adminstate'] == 4): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['protocol']; ?>
">
				<a class="nodelete" href="management_protocol.php"><?php echo $this->_config[0]['vars']['navigation_management_protocol']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_sumher_adminstate'] == 4): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['sumehr']; ?>
">
				<a class="nodelete" href="management_sumehr.php"><?php echo $this->_config[0]['vars']['navigation_management_sumehr']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_user_adminstate'] == 4): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['user']; ?>
">
				<a class="nodelete" href="management_user.php"><?php echo $this->_config[0]['vars']['navigation_management_user']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_prevention_adminstate'] == 4): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['prevention']; ?>
">
				<a class="nodelete" href="management_prevention.php"><?php echo $this->_config[0]['vars']['navigation_management_prevention']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_project_adminstate'] == 4): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['project']; ?>
">
			<a class="nodelete" href="management_project.php"><?php echo $this->_config[0]['vars']['navigation_management_project']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_debt_adminstate'] == 4): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['debt']; ?>
">
			<a class="nodelete" href="management_debt.php"><?php echo $this->_config[0]['vars']['navigation_management_debt']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_sumehr_adminstate'] == 4): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['sumehr']; ?>
">
			<a class="nodelete" href="management_sumehr.php"><?php echo $this->_config[0]['vars']['navigation_management_sumehr']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_planning_adminstate'] == 4): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['planning']; ?>
">
			<a class="nodelete" href="management_planning.php"><?php echo $this->_config[0]['vars']['navigation_management_planning']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_ouvrier_adminstate'] == 4): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['ouvrier']; ?>
">
				<a class="nodelete" href="management_ouvrier.php"><?php echo $this->_config[0]['vars']['navigation_management_ouvrier']; ?>
</a>
			</li>
		<?php endif; ?>
	</ul>
</div>