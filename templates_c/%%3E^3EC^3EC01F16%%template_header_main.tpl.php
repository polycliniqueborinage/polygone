<?php /* Smarty version 2.6.19, created on 2012-09-08 09:14:07
         compiled from template_header_main.tpl */ ?>
<div id="site_background">
	<div id="sitebody">

		<div id="header">

			<div class="left">
				<h1 class="head"><a href="index.php"><?php echo $this->_tpl_vars['settings']['name']; ?>
</a></h1>
				<h2 class="head"><?php echo $this->_tpl_vars['settings']['subtitle']; ?>
</h2>
				<h1><?php echo $this->_tpl_vars['title']; ?>
</h1>
			</div>

			<div class="right">

			<?php if ($this->_tpl_vars['loggedin'] == 1): ?>
			<div class="button">
			
				<a class="<?php echo $this->_tpl_vars['mainclasses']['user']; ?>
" href="user_menu.php"><span><?php echo $this->_config[0]['vars']['navigation_first_menu_user']; ?>
</span></a>
				
                <?php if ($this->_tpl_vars['adminstate'] > 2): ?>
                <a class="<?php echo $this->_tpl_vars['mainclasses']['management_current']; ?>
" href="management_menu_current.php"><span><?php echo $this->_config[0]['vars']['navigation_first_menu_management_current']; ?>
</span></a>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['adminstate'] > 3): ?>
                <a class="<?php echo $this->_tpl_vars['mainclasses']['management_no_current']; ?>
" href="management_menu_no_current.php"><span><?php echo $this->_config[0]['vars']['navigation_first_menu_management_no_current']; ?>
</span></a>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['adminstate'] > 4): ?>
                <a class="<?php echo $this->_tpl_vars['mainclasses']['admin']; ?>
" href="admin_menu.php"><span><?php echo $this->_config[0]['vars']['navigation_first_menu_administration']; ?>
</span></a>
                <?php endif; ?>

				<a class="<?php echo $this->_tpl_vars['mainclasses']['logout']; ?>
" href="user_menu.php?action=logout"><span><?php echo $this->_config[0]['vars']['navigation_first_menu_logout']; ?>
</span></a>

			</div>
			<?php endif; ?>
			
			</div>

		</div>


		<div id="contentwrapper">
