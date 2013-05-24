<?php /* Smarty version 2.6.19, created on 2012-09-14 12:21:14
         compiled from template_primary_tabs_management_current.tpl */ ?>
<div id="menu">
	<ul id="primary_tabs">
		<?php if ($this->_tpl_vars['modules']['management_menu_current_adminstate'] == 3): ?>
		<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['menu_current']; ?>
">
				<a class="nodelete" href="management_menu_current.php"><?php echo $this->_config[0]['vars']['navigation_management_menu_current']; ?>
</a>
		</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_agenda_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['agenda']; ?>
">
				<a class="nodelete" href="management_agenda.php"><?php echo $this->_config[0]['vars']['navigation_management_agenda']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_patient_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['patient']; ?>
">
				<a class="nodelete" href="management_patient.php"><?php echo $this->_config[0]['vars']['navigation_management_patient']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_client_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['client']; ?>
">
				<a class="nodelete" href="management_client.php"><?php echo $this->_config[0]['vars']['navigation_management_client']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_addressbook_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['addressbook']; ?>
">
				<a class="nodelete" href="management_addressbook.php"><?php echo $this->_config[0]['vars']['navigation_management_addressbook']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_acte_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['acte']; ?>
">
				<a class="nodelete" href="management_acte.php"><?php echo $this->_config[0]['vars']['navigation_management_acte']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_cecodi_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['cecodi']; ?>
">
				<a class="nodelete" href="management_cecodi.php"><?php echo $this->_config[0]['vars']['navigation_management_cecodi']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_product_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['product']; ?>
">
				<a class="nodelete" href="management_product.php?action=manuel_flow"><?php echo $this->_config[0]['vars']['navigation_management_product']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_listing_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['listing']; ?>
">
				<a class="nodelete" href="management_listing.php"><?php echo $this->_config[0]['vars']['navigation_management_listing']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_planning_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['planning']; ?>
">
				<a class="nodelete" href="management_planning.php"><?php echo $this->_config[0]['vars']['navigation_management_planning']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_debt_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['planning']; ?>
">
				<a class="nodelete" href="management_debt.php"><?php echo $this->_config[0]['vars']['navigation_management_debt']; ?>
</a>
			</li>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_ouvrier_adminstate'] == 3): ?>
			<li class="nodelete <?php echo $this->_tpl_vars['mainmenu']['ouvrier']; ?>
">
				<a class="nodelete" href="management_ouvrier.php"><?php echo $this->_config[0]['vars']['navigation_management_ouvrier']; ?>
</a>
			</li>
		<?php endif; ?>
	</ul>
</div>