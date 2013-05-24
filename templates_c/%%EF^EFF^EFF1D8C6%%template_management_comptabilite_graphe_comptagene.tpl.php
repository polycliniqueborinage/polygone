<?php /* Smarty version 2.6.19, created on 2012-11-09 12:49:13
         compiled from template_management_comptabilite_graphe_comptagene.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_management_comptabilite_graphe_comptagene.tpl', 59, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_time_plot' => 'yes','js_prevention' => 'yes')));
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
   					<a href="./management_comptabilite.php?action=display_state"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_display_state']; ?>
</a>
    				<a href="./management_comptabilite.php?action=overview_account"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_overview']; ?>
</a>
    				<a href="./management_comptabilite.php?action=comparison_account"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_comparison_account']; ?>
</a>
    				<a href="./management_comptabilite.php?action=modify_account"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_modify']; ?>
</a>
    				<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene']; ?>
</span>
    				<!--<a href="./management_comptabilite.php?action=display_histo"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene_histo']; ?>
</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_add']; ?>
</a> 

				</div>
			
				<div class="ViewPane">
							
					<div id="tab_content">
							
						<div class="headline">
					
							<h2><a href="javascript:void(0);" id="parametres_toggle" class="win_block" onclick = "toggleBlock('parametres');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_graphique_parametres']; ?>
</span></a>
							</h2>
						
						</div>						
						<div id = "parametres" style = "">
			
							<div class="block_in_wrapper">
								<div style="float:left;width:80%;">
									
								<form id="formdate" class="main" action="./management_comptabilite.php?action=display_graphe" method="post" enctype="multipart/form-data">
									
									<div class="row"><table><tr><td><label for = "mois_de"> <?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_de']; ?>
: </label></td><td><input type = "text" readonly name = "mois_de"  id="mois_de" value=<?php echo $this->_tpl_vars['mois_de']; ?>
 realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_de']; ?>
" value = "01" autocomplete="off"/></td><td><label for = "mois_a"> <?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_a']; ?>
: </label></td><td><input type = "text" name = "mois_a"  id="mois_a" maxlength = "2" value=<?php echo $this->_tpl_vars['mois_a']; ?>
 realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_a']; ?>
" autocomplete="off"/></td></tr></div>
									<div class="row"><tr><td><label for = "annee_de"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_de']; ?>
:</label></td><td><input type = "text" name = "annee_de" id="annee_de" value=<?php echo $this->_tpl_vars['annee_de']; ?>
 maxlength = "4" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_de']; ?>
" autocomplete="off"/></td><td><label for = "annee_a"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_a']; ?>
:</label></td><td><input type = "text" name = "annee_a" id="annee_a" maxlength = "4" value=<?php echo $this->_tpl_vars['annee_a']; ?>
 realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_a']; ?>
" autocomplete="off"/></td></tr></table></div>
										
									<div class="row">
										<label>&nbsp;</label>
										<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
									</div>	 
										
								</form>	
										
								</div>
							<div class="clear_both"></div> 							</div> 			
						</div>					
					
						<ul>
							<?php unset($this->_sections['graphe']);
$this->_sections['graphe']['name'] = 'graphe';
$this->_sections['graphe']['loop'] = is_array($_loop=$this->_tpl_vars['graphe']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['graphe']['show'] = true;
$this->_sections['graphe']['max'] = $this->_sections['graphe']['loop'];
$this->_sections['graphe']['step'] = 1;
$this->_sections['graphe']['start'] = $this->_sections['graphe']['step'] > 0 ? 0 : $this->_sections['graphe']['loop']-1;
if ($this->_sections['graphe']['show']) {
    $this->_sections['graphe']['total'] = $this->_sections['graphe']['loop'];
    if ($this->_sections['graphe']['total'] == 0)
        $this->_sections['graphe']['show'] = false;
} else
    $this->_sections['graphe']['total'] = 0;
if ($this->_sections['graphe']['show']):

            for ($this->_sections['graphe']['index'] = $this->_sections['graphe']['start'], $this->_sections['graphe']['iteration'] = 1;
                 $this->_sections['graphe']['iteration'] <= $this->_sections['graphe']['total'];
                 $this->_sections['graphe']['index'] += $this->_sections['graphe']['step'], $this->_sections['graphe']['iteration']++):
$this->_sections['graphe']['rownum'] = $this->_sections['graphe']['iteration'];
$this->_sections['graphe']['index_prev'] = $this->_sections['graphe']['index'] - $this->_sections['graphe']['step'];
$this->_sections['graphe']['index_next'] = $this->_sections['graphe']['index'] + $this->_sections['graphe']['step'];
$this->_sections['graphe']['first']      = ($this->_sections['graphe']['iteration'] == 1);
$this->_sections['graphe']['last']       = ($this->_sections['graphe']['iteration'] == $this->_sections['graphe']['total']);
?>
							<li>
								<a href="#fragment-<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "...", true) : smarty_modifier_truncate($_tmp, 10, "...", true)); ?>
</span></a>
							</li>
							<?php endfor; endif; ?>
						</ul>
						
						<?php unset($this->_sections['graphe']);
$this->_sections['graphe']['name'] = 'graphe';
$this->_sections['graphe']['loop'] = is_array($_loop=$this->_tpl_vars['graphe']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['graphe']['show'] = true;
$this->_sections['graphe']['max'] = $this->_sections['graphe']['loop'];
$this->_sections['graphe']['step'] = 1;
$this->_sections['graphe']['start'] = $this->_sections['graphe']['step'] > 0 ? 0 : $this->_sections['graphe']['loop']-1;
if ($this->_sections['graphe']['show']) {
    $this->_sections['graphe']['total'] = $this->_sections['graphe']['loop'];
    if ($this->_sections['graphe']['total'] == 0)
        $this->_sections['graphe']['show'] = false;
} else
    $this->_sections['graphe']['total'] = 0;
if ($this->_sections['graphe']['show']):

            for ($this->_sections['graphe']['index'] = $this->_sections['graphe']['start'], $this->_sections['graphe']['iteration'] = 1;
                 $this->_sections['graphe']['iteration'] <= $this->_sections['graphe']['total'];
                 $this->_sections['graphe']['index'] += $this->_sections['graphe']['step'], $this->_sections['graphe']['iteration']++):
$this->_sections['graphe']['rownum'] = $this->_sections['graphe']['iteration'];
$this->_sections['graphe']['index_prev'] = $this->_sections['graphe']['index'] - $this->_sections['graphe']['step'];
$this->_sections['graphe']['index_next'] = $this->_sections['graphe']['index'] + $this->_sections['graphe']['step'];
$this->_sections['graphe']['first']      = ($this->_sections['graphe']['iteration'] == 1);
$this->_sections['graphe']['last']       = ($this->_sections['graphe']['iteration'] == $this->_sections['graphe']['total']);
?>
							<div id="fragment-<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
" class="block_in_wrapper">
						        <div class="label">
						        <?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['description']; ?>

						        </div>
						        <div id="timeplot<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
" class="timeplot" style="height: 300px;"></div>
						        <div class="block_in_wrapper">
							        <div class="label">
							        	<h3><?php echo $this->_config[0]['vars']['dico_management_comptabilite_legende']; ?>
</h3>
							        </div>
							        <?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie1'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe1']; ?>
</font><br></div>
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe2']; ?>
</font><br></div>
							        <div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe3']; ?>
</font><br></div>
							        <div class="row"><font color='#FF00FF'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe4']; ?>
</font><br></div>
							        <div class="row"><font color='#FFFF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe5']; ?>
</font><br></div>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie2'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe61_cgs']; ?>
</font><br></div>
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe62_cgs']; ?>
</font><br></div>
							        <div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe63_cgs']; ?>
</font><br></div>
							        <div class="row"><font color='#FF00FF'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe64_cgs']; ?>
</font><br></div>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie3'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe60_vad']; ?>
</font><br></div>
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe70_vad']; ?>
</font><br></div>
							        <div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe72_vad']; ?>
</font><br></div>
							        <div class="row"><font color='#0000FF'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe74_vad']; ?>
</font><br></div>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie4'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_benefice']; ?>
</font><br></div>
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_benefice_fr']; ?>
</font><br></div>
							        <div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_marge_brute']; ?>
</font><br></div>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie5'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe60_vad']; ?>
</font><br></div>
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe70_vad']; ?>
 + <?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe72_vad']; ?>
 + <?php echo $this->_config[0]['vars']['dico_management_comptabilite_classe74_vad']; ?>
</font><br></div>
							        <div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_delta']; ?>
</font><br></div>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie6'): ?>
							        <div class="row"><font color='#000000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_chiffre_daffaire']; ?>
</font><br></div>
							        <!--<div class="row"><font color='#00FF00'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_chiffre_daffaire_prec']; ?>
</font><br></div>-->
							        <div class="row"><font color='#FF0000'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_couts_directs']; ?>
</font><br></div>
							        <!--<div class="row"><font color='#FF00FF'><?php echo $this->_config[0]['vars']['dico_management_comptabilite_couts_directs_prec']; ?>
</font><br></div>-->
									
									<?php endif; ?>
					
								</div>
								<?php if ($this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID'] == 'serie6'): ?>
								<div class="block_in_wrapper">
							        <div class="label">
							        	<h3><?php echo $this->_config[0]['vars']['dico_management_comptabilite_bep_status']; ?>
</h3>
							        </div>
							        
							        <div class="row">
									<table border="1">
									<th><?php echo $this->_config[0]['vars']['dico_management_comptabilite_bep_status']; ?>
</th>
									<th><?php echo $this->_config[0]['vars']['dico_management_comptabilite_current_month']; ?>
</th>
									<th><?php echo $this->_config[0]['vars']['dico_management_comptabilite_chiffre_daffaire']; ?>
</th>
									<th><?php echo $this->_config[0]['vars']['dico_management_comptabilite_couts_directs']; ?>
</th>
									<th><?php echo $this->_config[0]['vars']['dico_management_comptabilite_delta']; ?>
</th>									
									<?php unset($this->_sections['pointmort']);
$this->_sections['pointmort']['name'] = 'pointmort';
$this->_sections['pointmort']['loop'] = is_array($_loop=$this->_tpl_vars['pointmort']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pointmort']['show'] = true;
$this->_sections['pointmort']['max'] = $this->_sections['pointmort']['loop'];
$this->_sections['pointmort']['step'] = 1;
$this->_sections['pointmort']['start'] = $this->_sections['pointmort']['step'] > 0 ? 0 : $this->_sections['pointmort']['loop']-1;
if ($this->_sections['pointmort']['show']) {
    $this->_sections['pointmort']['total'] = $this->_sections['pointmort']['loop'];
    if ($this->_sections['pointmort']['total'] == 0)
        $this->_sections['pointmort']['show'] = false;
} else
    $this->_sections['pointmort']['total'] = 0;
if ($this->_sections['pointmort']['show']):

            for ($this->_sections['pointmort']['index'] = $this->_sections['pointmort']['start'], $this->_sections['pointmort']['iteration'] = 1;
                 $this->_sections['pointmort']['iteration'] <= $this->_sections['pointmort']['total'];
                 $this->_sections['pointmort']['index'] += $this->_sections['pointmort']['step'], $this->_sections['pointmort']['iteration']++):
$this->_sections['pointmort']['rownum'] = $this->_sections['pointmort']['iteration'];
$this->_sections['pointmort']['index_prev'] = $this->_sections['pointmort']['index'] - $this->_sections['pointmort']['step'];
$this->_sections['pointmort']['index_next'] = $this->_sections['pointmort']['index'] + $this->_sections['pointmort']['step'];
$this->_sections['pointmort']['first']      = ($this->_sections['pointmort']['iteration'] == 1);
$this->_sections['pointmort']['last']       = ($this->_sections['pointmort']['iteration'] == $this->_sections['pointmort']['total']);
?>
									<tr>
											<td bgcolor="<?php echo $this->_tpl_vars['pointmort'][$this->_sections['pointmort']['index']]['state']; ?>
"></td>
											<td align="center"><?php echo $this->_tpl_vars['pointmort'][$this->_sections['pointmort']['index']]['date']; ?>
</td>
											<td align="center"><?php echo $this->_tpl_vars['pointmort'][$this->_sections['pointmort']['index']]['ca']; ?>
</td>
											<td align="center"><?php echo $this->_tpl_vars['pointmort'][$this->_sections['pointmort']['index']]['cd']; ?>
</td>
											<td align="center"><?php echo $this->_tpl_vars['pointmort'][$this->_sections['pointmort']['index']]['diff']; ?>
</td>
									</tr>
									<?php endfor; endif; ?>
									</table>
									</div>
									
								</div>	
								<?php endif; ?>
							</div>
						<?php endfor; endif; ?>
					
					</div>
					
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php unset($this->_sections['graphe']);
$this->_sections['graphe']['name'] = 'graphe';
$this->_sections['graphe']['loop'] = is_array($_loop=$this->_tpl_vars['graphe']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['graphe']['show'] = true;
$this->_sections['graphe']['max'] = $this->_sections['graphe']['loop'];
$this->_sections['graphe']['step'] = 1;
$this->_sections['graphe']['start'] = $this->_sections['graphe']['step'] > 0 ? 0 : $this->_sections['graphe']['loop']-1;
if ($this->_sections['graphe']['show']) {
    $this->_sections['graphe']['total'] = $this->_sections['graphe']['loop'];
    if ($this->_sections['graphe']['total'] == 0)
        $this->_sections['graphe']['show'] = false;
} else
    $this->_sections['graphe']['total'] = 0;
if ($this->_sections['graphe']['show']):

            for ($this->_sections['graphe']['index'] = $this->_sections['graphe']['start'], $this->_sections['graphe']['iteration'] = 1;
                 $this->_sections['graphe']['iteration'] <= $this->_sections['graphe']['total'];
                 $this->_sections['graphe']['index'] += $this->_sections['graphe']['step'], $this->_sections['graphe']['iteration']++):
$this->_sections['graphe']['rownum'] = $this->_sections['graphe']['iteration'];
$this->_sections['graphe']['index_prev'] = $this->_sections['graphe']['index'] - $this->_sections['graphe']['step'];
$this->_sections['graphe']['index_next'] = $this->_sections['graphe']['index'] + $this->_sections['graphe']['step'];
$this->_sections['graphe']['first']      = ($this->_sections['graphe']['iteration'] == 1);
$this->_sections['graphe']['last']       = ($this->_sections['graphe']['iteration'] == $this->_sections['graphe']['total']);
?>
		<?php echo '
		<script>
			var timeplot'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ';
			var dataURL'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = "management_comptabilite.php?action=display_graphe_data&id='; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '&annee_de='; ?>
<?php echo $this->_tpl_vars['annee_de']; ?>
<?php echo '&annee_a='; ?>
<?php echo $this->_tpl_vars['annee_a']; ?>
<?php echo '&mois_de='; ?>
<?php echo $this->_tpl_vars['mois_de']; ?>
<?php echo '&mois_a='; ?>
<?php echo $this->_tpl_vars['mois_a']; ?>
<?php echo '";
  		</script>
		'; ?>

	<?php endfor; endif; ?>
	
	
	<?php echo '
	<script>
		
        
        function onLoad() {
        
		  	'; ?>

		  		<?php unset($this->_sections['graphe']);
$this->_sections['graphe']['name'] = 'graphe';
$this->_sections['graphe']['loop'] = is_array($_loop=$this->_tpl_vars['graphe']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['graphe']['show'] = true;
$this->_sections['graphe']['max'] = $this->_sections['graphe']['loop'];
$this->_sections['graphe']['step'] = 1;
$this->_sections['graphe']['start'] = $this->_sections['graphe']['step'] > 0 ? 0 : $this->_sections['graphe']['loop']-1;
if ($this->_sections['graphe']['show']) {
    $this->_sections['graphe']['total'] = $this->_sections['graphe']['loop'];
    if ($this->_sections['graphe']['total'] == 0)
        $this->_sections['graphe']['show'] = false;
} else
    $this->_sections['graphe']['total'] = 0;
if ($this->_sections['graphe']['show']):

            for ($this->_sections['graphe']['index'] = $this->_sections['graphe']['start'], $this->_sections['graphe']['iteration'] = 1;
                 $this->_sections['graphe']['iteration'] <= $this->_sections['graphe']['total'];
                 $this->_sections['graphe']['index'] += $this->_sections['graphe']['step'], $this->_sections['graphe']['iteration']++):
$this->_sections['graphe']['rownum'] = $this->_sections['graphe']['iteration'];
$this->_sections['graphe']['index_prev'] = $this->_sections['graphe']['index'] - $this->_sections['graphe']['step'];
$this->_sections['graphe']['index_next'] = $this->_sections['graphe']['index'] + $this->_sections['graphe']['step'];
$this->_sections['graphe']['first']      = ($this->_sections['graphe']['iteration'] == 1);
$this->_sections['graphe']['last']       = ($this->_sections['graphe']['iteration'] == $this->_sections['graphe']['total']);
?>
					<?php echo '
					
						var eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = new Timeplot.DefaultEventSource();
						
						var timeGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = new Timeplot.DefaultTimeGeometry({
						    gridColor: new Timeplot.Color("#000000"),
						    axisLabelsPlacement: "top"
					  	});
			
						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#000000",
						    axisLabelsPlacement: "right",
							min: 0
					  	});

						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#FF0000",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
						
						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#00FF00",
						    axisLabelsPlacement: "right",
							min: 0
					  	});
					  	
					  	var valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_4 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#FF00FF",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
					  	
					  	var valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_5 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#FFFF00",
						    axisLabelsPlacement: "right",
							min: 0
					  	});
					  	
						if(\''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie3\' || \''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie4\' || \''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie5\'){
						var plotInfo'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',1),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2,
						      	lineColor: "#000000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',2),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "#FF0000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',3),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3,
						      	lineColor: "#00FF00",
						      	showValues: true
					    	})
					  	];
				  		}
				  		
						if(\''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie1\'){
						var plotInfo'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',1),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "#000000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',2),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2,
						      	lineColor: "#FF0000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',3),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3,
						      	lineColor: "#00FF00",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_4",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',4),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_4,
						      	lineColor: "#FF00FF",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_5",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',5),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_5,
						      	lineColor: "#ffff00",
						      	showValues: true
					    	})
					  	];
				  		}
				  		if(\''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie2\'){ 
						var plotInfo'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',1),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "#000000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',2),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2,
						      	lineColor: "#FF0000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',3),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_3,
						      	lineColor: "#00FF00",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_4",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',4),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_4,
						      	lineColor: "#FF00FF",
						      	showValues: true
					    	})
					  	];
				  		}
				  		if(\''; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '\' == \'serie6\'){ 
						var plotInfo'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',1),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "#000000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ',2),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '_2,
						      	lineColor: "#FF0000",
						      	showValues: true
					    	})
					  	];
				  		}				  		
				  		timeplot'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ' = Timeplot.create(document.getElementById("timeplot'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '"), plotInfo'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ');
		            	timeplot'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo '.loadText(dataURL'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ', ",", eventSource'; ?>
<?php echo $this->_tpl_vars['graphe'][$this->_sections['graphe']['index']]['ID']; ?>
<?php echo ');
		            	
					'; ?>

				<?php endfor; endif; ?>
		  	<?php echo '

        }
        
        
        
		$(document).ready(function(){
			onLoad();
    		$("#tab_content").tabs();
  		});
  	</script>
	'; ?>

	
	

