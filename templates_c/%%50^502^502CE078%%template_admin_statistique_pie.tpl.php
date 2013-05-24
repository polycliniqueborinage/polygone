<?php /* Smarty version 2.6.19, created on 2012-11-20 11:24:38
         compiled from template_admin_statistique_pie.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_accordion' => 'yes','js_jquery_datepicker' => 'yes','js_jquery_form' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_admin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				</div>
			
				<div class="ViewPane">
				
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> 
					<div class="infowin_left" style = "display:none;" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/system.png" alt=""/><?php echo $this->_config[0]['vars']['settingschanged']; ?>
</span>
						<?php elseif ($this->_tpl_vars['mode'] == 'imported'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/basecamp-import.png" alt=""/><?php echo $this->_config[0]['vars']['importsuccess']; ?>
<br />
						<?php echo $this->_config[0]['vars']['projects']; ?>
: <?php echo $this->_tpl_vars['procount']; ?>

						</span>
						<?php endif; ?>
					</div>

					<script>
						systemeMessage('systemmsg');
					</script>
		
					<div class="block_b">
					<div class="in">
						<div class="headline">
						<h2><a href="#" id="admin_toggle" class="win_block" onclick = "toggleBlock('admin');"><img src="./templates/standard/img/symbols/system.png" alt="" />
						<span><?php echo $this->_config[0]['vars']['dico_admin_statistique_graphe']; ?>
</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							JE SUIS LES STATS
		
						</div> 						</div> 					</div> 					</div> 					
				
					<div class="block_c">
					<div class="in">
						<div class="headline">
						<h2><a href="#" id="admin_toggle" class="win_block" onclick = "toggleBlock('admin');"><img src="./templates/standard/img/symbols/system.png" alt="" />
						<span><?php echo $this->_config[0]['vars']['dico_admin_statistique_table']; ?>
</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							JE SUIS LES STATS
		
						</div> 						</div> 					</div> 					</div> 			

				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	