<?php /* Smarty version 2.6.19, created on 2012-09-17 15:06:24
         compiled from template_management_sumehr_view_analyse.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_jqmodal' => 'yes','js_jquery_prettyphoto' => 'no','js_jquery_prettyphoto3' => 'yes','js_rico' => 'yes','js_sumehr' => 'yes','js_protocol' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php if ($this->_tpl_vars['modules']['management_sumehr_adminstate'] == 3): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
		<?php if ($this->_tpl_vars['modules']['management_sumehr_adminstate'] == 4): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
		<?php endif; ?>
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_sumehr.php?action=search"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search']; ?>
</a>
										<a href="./management_sumehr.php?action=module_analyse"><?php echo $this->_config[0]['vars']['dico_sumehr_menu_search_analyse']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_sumehr_menu_view_analyse']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								<h2><a href="javascript:void(0);" id="protocol_toggle" class="win_block" onclick = "toggleBlock('protocol');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['dico_sumehr_submenu_view_analyse']; ?>
 <?php echo $this->_tpl_vars['exams']['0']['examen_date']; ?>
 <?php echo $this->_config[0]['vars']['dico_sumehr_submenu_view_analyse_pour']; ?>
 <?php echo $this->_tpl_vars['exams']['0']['patient_prenom']; ?>
 <?php echo $this->_tpl_vars['exams']['0']['patient_nom']; ?>
 <?php echo $this->_config[0]['vars']['dico_sumehr_submenu_view_analyse_demandee']; ?>
 <?php echo $this->_tpl_vars['exams']['0']['medecin_prenom']; ?>
 <?php echo $this->_tpl_vars['exams']['0']['medecin_nom']; ?>
</span></a>
								</h2>
							</div>
							
							<div id = "" style = "">
								<h3><?php echo $this->_tpl_vars['exams']['0']['groupe_label']; ?>
</h3><br>
								<table width="100%">
								<tr>
									<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_code']; ?>
</th>
									<th style='width:30%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_label']; ?>
</th>
									<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_reference']; ?>
</th>
									<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_unite']; ?>
</th>
									<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_info']; ?>
</th>
									<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_resultat']; ?>
</th>
								</tr>
								<?php unset($this->_sections['exam']);
$this->_sections['exam']['name'] = 'exam';
$this->_sections['exam']['loop'] = is_array($_loop=$this->_tpl_vars['exams']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exam']['show'] = true;
$this->_sections['exam']['max'] = $this->_sections['exam']['loop'];
$this->_sections['exam']['step'] = 1;
$this->_sections['exam']['start'] = $this->_sections['exam']['step'] > 0 ? 0 : $this->_sections['exam']['loop']-1;
if ($this->_sections['exam']['show']) {
    $this->_sections['exam']['total'] = $this->_sections['exam']['loop'];
    if ($this->_sections['exam']['total'] == 0)
        $this->_sections['exam']['show'] = false;
} else
    $this->_sections['exam']['total'] = 0;
if ($this->_sections['exam']['show']):

            for ($this->_sections['exam']['index'] = $this->_sections['exam']['start'], $this->_sections['exam']['iteration'] = 1;
                 $this->_sections['exam']['iteration'] <= $this->_sections['exam']['total'];
                 $this->_sections['exam']['index'] += $this->_sections['exam']['step'], $this->_sections['exam']['iteration']++):
$this->_sections['exam']['rownum'] = $this->_sections['exam']['iteration'];
$this->_sections['exam']['index_prev'] = $this->_sections['exam']['index'] - $this->_sections['exam']['step'];
$this->_sections['exam']['index_next'] = $this->_sections['exam']['index'] + $this->_sections['exam']['step'];
$this->_sections['exam']['first']      = ($this->_sections['exam']['iteration'] == 1);
$this->_sections['exam']['last']       = ($this->_sections['exam']['iteration'] == $this->_sections['exam']['total']);
?>
									
									<tr>
										<td class='b' style='width:14%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_code']; ?>
</td>
										<td class='b' style='width:30%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_label']; ?>
</td>
										<td class='b' style='width:14%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_reference']; ?>
</td>
										<td class='b' style='width:14%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_unite']; ?>
</td>
										<td class='b' style='width:14%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_info']; ?>
</td>
										<td class='b' style='width:14%'><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index']]['analyse_resultat']; ?>
</td>
									</tr>
									
									<?php if ($this->_sections['exam']['index_next'] != $this->_sections['exam']['max']): ?>
										<?php if ($this->_tpl_vars['exams'][$this->_sections['exam']['index']]['groupe_label'] != $this->_tpl_vars['exams'][$this->_sections['exam']['index_next']]['groupe_label']): ?>
											</table><BR>
											<h3><?php echo $this->_tpl_vars['exams'][$this->_sections['exam']['index_next']]['groupe_label']; ?>
</h3><br>
											<table width="100%">
											<tr>
												<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_code']; ?>
</th>
												<th style='width:30%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_label']; ?>
</th>
												<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_reference']; ?>
</th>
												<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_unite']; ?>
</th>
												<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_info']; ?>
</th>
												<th style='width:14%' align='left'><?php echo $this->_config[0]['vars']['dico_sumehr_tableheader_analyse_resultat']; ?>
</th>
											</tr>
										<?php endif; ?>
									<?php endif; ?>
									
								<?php endfor; endif; ?>
							
							</div>
							
					
						</div> 					
					</div> 				

				</div>
					
			</div>

		</div>

	</div>
	
	