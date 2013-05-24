<?php /* Smarty version 2.6.19, created on 2012-11-20 11:24:38
         compiled from template_admin_system.tpl */ ?>
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
					<div class="infowin_left"  id="systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/system.png" alt=""/><?php echo $this->_config[0]['vars']['dico_admin_system_settingschanged']; ?>
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
						<span><?php echo $this->_config[0]['vars']['dico_admin_system_submenu_view']; ?>
</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							<form class="main" method="post" action="admin_system.php?action=editsets" enctype="multipart/form-data" <?php echo 'onsubmit="return validateCompleteForm(this);"'; ?>
>
							<fieldset>
		
							<div class="row"><label for = "name"><?php echo $this->_config[0]['vars']['dico_admin_system_globaltitle']; ?>
:</label><input type = "text" value = "<?php echo $this->_tpl_vars['settings']['name']; ?>
" name = "name" id="name" realname = "dico_admin_system_globaltitle" /></div>
							<div class="row"><label for = "subtitle"><?php echo $this->_config[0]['vars']['dico_admin_system_subtitle']; ?>
:</label><input type="text" value="<?php echo $this->_tpl_vars['settings']['subtitle']; ?>
" name="subtitle" id="subtitle" realname = "dico_admin_system_subtitle" /></div>
					
							
							<div class="row">
							<label for = "locale">dico_admin_system_locale</label>
							<select name = "locale" id="locale" realname = "<?php echo $this->_config[0]['vars']['locale']; ?>
">
								<?php unset($this->_sections['lang']);
$this->_sections['lang']['name'] = 'lang';
$this->_sections['lang']['loop'] = is_array($_loop=$this->_tpl_vars['languages_fin']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang']['show'] = true;
$this->_sections['lang']['max'] = $this->_sections['lang']['loop'];
$this->_sections['lang']['step'] = 1;
$this->_sections['lang']['start'] = $this->_sections['lang']['step'] > 0 ? 0 : $this->_sections['lang']['loop']-1;
if ($this->_sections['lang']['show']) {
    $this->_sections['lang']['total'] = $this->_sections['lang']['loop'];
    if ($this->_sections['lang']['total'] == 0)
        $this->_sections['lang']['show'] = false;
} else
    $this->_sections['lang']['total'] = 0;
if ($this->_sections['lang']['show']):

            for ($this->_sections['lang']['index'] = $this->_sections['lang']['start'], $this->_sections['lang']['iteration'] = 1;
                 $this->_sections['lang']['iteration'] <= $this->_sections['lang']['total'];
                 $this->_sections['lang']['index'] += $this->_sections['lang']['step'], $this->_sections['lang']['iteration']++):
$this->_sections['lang']['rownum'] = $this->_sections['lang']['iteration'];
$this->_sections['lang']['index_prev'] = $this->_sections['lang']['index'] - $this->_sections['lang']['step'];
$this->_sections['lang']['index_next'] = $this->_sections['lang']['index'] + $this->_sections['lang']['step'];
$this->_sections['lang']['first']      = ($this->_sections['lang']['iteration'] == 1);
$this->_sections['lang']['last']       = ($this->_sections['lang']['iteration'] == $this->_sections['lang']['total']);
?>
								<option value = "<?php echo $this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['val']; ?>
" <?php if ($this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['val'] == $this->_tpl_vars['settings']['locale']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['languages_fin'][$this->_sections['lang']['index']]['str']; ?>
</option>
								<?php endfor; endif; ?>
							</select>
							</div>
		
							<div class="row">
							<label for="timezone"><?php echo $this->_config[0]['vars']['dico_admin_system_timezone']; ?>
:</label>
							<select name="timezone" id="timezone" required="1" realname="<?php echo $this->_config[0]['vars']['timezone']; ?>
">
							<?php unset($this->_sections['timezone']);
$this->_sections['timezone']['name'] = 'timezone';
$this->_sections['timezone']['loop'] = is_array($_loop=$this->_tpl_vars['timezones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['timezone']['show'] = true;
$this->_sections['timezone']['max'] = $this->_sections['timezone']['loop'];
$this->_sections['timezone']['step'] = 1;
$this->_sections['timezone']['start'] = $this->_sections['timezone']['step'] > 0 ? 0 : $this->_sections['timezone']['loop']-1;
if ($this->_sections['timezone']['show']) {
    $this->_sections['timezone']['total'] = $this->_sections['timezone']['loop'];
    if ($this->_sections['timezone']['total'] == 0)
        $this->_sections['timezone']['show'] = false;
} else
    $this->_sections['timezone']['total'] = 0;
if ($this->_sections['timezone']['show']):

            for ($this->_sections['timezone']['index'] = $this->_sections['timezone']['start'], $this->_sections['timezone']['iteration'] = 1;
                 $this->_sections['timezone']['iteration'] <= $this->_sections['timezone']['total'];
                 $this->_sections['timezone']['index'] += $this->_sections['timezone']['step'], $this->_sections['timezone']['iteration']++):
$this->_sections['timezone']['rownum'] = $this->_sections['timezone']['iteration'];
$this->_sections['timezone']['index_prev'] = $this->_sections['timezone']['index'] - $this->_sections['timezone']['step'];
$this->_sections['timezone']['index_next'] = $this->_sections['timezone']['index'] + $this->_sections['timezone']['step'];
$this->_sections['timezone']['first']      = ($this->_sections['timezone']['iteration'] == 1);
$this->_sections['timezone']['last']       = ($this->_sections['timezone']['iteration'] == $this->_sections['timezone']['total']);
?>
							<option value="<?php echo $this->_tpl_vars['timezones'][$this->_sections['timezone']['index']]; ?>
" <?php if ($this->_tpl_vars['timezones'][$this->_sections['timezone']['index']] == $this->_tpl_vars['settings']['timezone']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['timezones'][$this->_sections['timezone']['index']]; ?>
</option>
							<?php endfor; endif; ?>
							</select>
							</div>
		
							<div class="row">
							<label for = "template"><?php echo $this->_config[0]['vars']['dico_admin_system_template']; ?>
:</label>
							<select name="template" id="template" required = "1" realname = "<?php echo $this->_config[0]['vars']['template']; ?>
" >
							<?php unset($this->_sections['tem']);
$this->_sections['tem']['name'] = 'tem';
$this->_sections['tem']['loop'] = is_array($_loop=$this->_tpl_vars['templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tem']['show'] = true;
$this->_sections['tem']['max'] = $this->_sections['tem']['loop'];
$this->_sections['tem']['step'] = 1;
$this->_sections['tem']['start'] = $this->_sections['tem']['step'] > 0 ? 0 : $this->_sections['tem']['loop']-1;
if ($this->_sections['tem']['show']) {
    $this->_sections['tem']['total'] = $this->_sections['tem']['loop'];
    if ($this->_sections['tem']['total'] == 0)
        $this->_sections['tem']['show'] = false;
} else
    $this->_sections['tem']['total'] = 0;
if ($this->_sections['tem']['show']):

            for ($this->_sections['tem']['index'] = $this->_sections['tem']['start'], $this->_sections['tem']['iteration'] = 1;
                 $this->_sections['tem']['iteration'] <= $this->_sections['tem']['total'];
                 $this->_sections['tem']['index'] += $this->_sections['tem']['step'], $this->_sections['tem']['iteration']++):
$this->_sections['tem']['rownum'] = $this->_sections['tem']['iteration'];
$this->_sections['tem']['index_prev'] = $this->_sections['tem']['index'] - $this->_sections['tem']['step'];
$this->_sections['tem']['index_next'] = $this->_sections['tem']['index'] + $this->_sections['tem']['step'];
$this->_sections['tem']['first']      = ($this->_sections['tem']['iteration'] == 1);
$this->_sections['tem']['last']       = ($this->_sections['tem']['iteration'] == $this->_sections['tem']['total']);
?>
							<option value="<?php echo $this->_tpl_vars['templates'][$this->_sections['tem']['index']]; ?>
" <?php if ($this->_tpl_vars['settings']['template'] == $this->_tpl_vars['templates'][$this->_sections['tem']['index']]): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['templates'][$this->_sections['tem']['index']]; ?>
</option>
							<?php endfor; endif; ?>
							</select>
							</div>
		
							<div class="row">
							<label>&nbsp;</label>
							<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_admin_system_button_save']; ?>
</button></div>
							</div>
		
		
							</fieldset>
							</form>
		
						</div> 						</div> 					</div> 				</div> 				
			

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
	