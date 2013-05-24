<?php /* Smarty version 2.6.19, created on 2012-11-09 13:05:30
         compiled from template_management_comptabilite_overview_comparison.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes')));
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
    				<span><?php echo $this->_config[0]['vars']['dico_management_comptabilite_overview_comparison']; ?>
</span>
    				<a href="./management_comptabilite.php?action=modify_account"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_modify_account']; ?>
</a>
    				<a href="./management_comptabilite.php?action=display_graphe"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene']; ?>
</a>
    				<!--<a href="./management_comptabilite.php?action=display_histo"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene_histo']; ?>
</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_add']; ?>
</a>
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span><?php echo $this->_config[0]['vars']['dico_management_comptabilite_parametres']; ?>
</span>
									</a>
								</h2>
							</div>
			
							
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=comparison_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div>
										
											
											<div class="row"><label for = "mois">  <?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_mois']; ?>
: </label><input type = "text" name = "mois"   id="mois"   realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois']; ?>
"  value=<?php echo $this->_tpl_vars['mois']; ?>
   autocomplete="off" maxlength = "2"/></div>
											<div class="row"><label for = "annee1"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_annee']; ?>
:</label><input type = "text" name = "annee1" id="annee1" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee']; ?>
" value=<?php echo $this->_tpl_vars['annee1']; ?>
 autocomplete="off" maxlength = "4"/></div>
											<div class="row"><label for = "annee2"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_annee']; ?>
:</label><input type = "text" name = "annee2" id="annee2" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee']; ?>
" value=<?php echo $this->_tpl_vars['annee2']; ?>
 autocomplete="off" maxlength = "4"/></div>
											<div class="row"><label for = "numero_compte"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_numero_compte']; ?>
:</label><input type = "text" name = "numero_compte" id="numero_compte" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_numero_compte']; ?>
" value='<?php echo $this->_tpl_vars['account']; ?>
' autocomplete="off"/></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
											</div>
											
										</div>
			
									</fieldset>
									
								</form>
								
								</div>
			
								<div class="clear_both"></div> 								
								<div>
											
								</div>
								
								<div class="headline">
					
								<h2>
									<a href="management_comptabilite.php?action=print_comparison&mois=<?php echo $this->_tpl_vars['mois']; ?>
&annee1=<?php echo $this->_tpl_vars['annee1']; ?>
&annee2=<?php echo $this->_tpl_vars['annee2']; ?>
&account=<?php echo $this->_tpl_vars['account']; ?>
" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</h2>
								
								</div>
								
								<div>
								<?php unset($this->_sections['compte']);
$this->_sections['compte']['name'] = 'compte';
$this->_sections['compte']['loop'] = is_array($_loop=$this->_tpl_vars['comptes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['compte']['show'] = true;
$this->_sections['compte']['max'] = $this->_sections['compte']['loop'];
$this->_sections['compte']['step'] = 1;
$this->_sections['compte']['start'] = $this->_sections['compte']['step'] > 0 ? 0 : $this->_sections['compte']['loop']-1;
if ($this->_sections['compte']['show']) {
    $this->_sections['compte']['total'] = $this->_sections['compte']['loop'];
    if ($this->_sections['compte']['total'] == 0)
        $this->_sections['compte']['show'] = false;
} else
    $this->_sections['compte']['total'] = 0;
if ($this->_sections['compte']['show']):

            for ($this->_sections['compte']['index'] = $this->_sections['compte']['start'], $this->_sections['compte']['iteration'] = 1;
                 $this->_sections['compte']['iteration'] <= $this->_sections['compte']['total'];
                 $this->_sections['compte']['index'] += $this->_sections['compte']['step'], $this->_sections['compte']['iteration']++):
$this->_sections['compte']['rownum'] = $this->_sections['compte']['iteration'];
$this->_sections['compte']['index_prev'] = $this->_sections['compte']['index'] - $this->_sections['compte']['step'];
$this->_sections['compte']['index_next'] = $this->_sections['compte']['index'] + $this->_sections['compte']['step'];
$this->_sections['compte']['first']      = ($this->_sections['compte']['iteration'] == 1);
$this->_sections['compte']['last']       = ($this->_sections['compte']['iteration'] == $this->_sections['compte']['total']);
?>
									<div>
										<?php if ($this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['numero'] == 'Total'): ?>
											<h4><u><?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['numero']; ?>
 - <?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr']; ?>
</u></h4>
										<?php else: ?>
											<a target="_blank" href="management_comptabilite.php?action=show_details&numero_compte=<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['numero']; ?>
&annee=<?php echo $this->_tpl_vars['annee1']; ?>
"><h4><u><?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['numero']; ?>
 - <?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr']; ?>
</u></h4></a>
										<?php endif; ?>
										<table width="60%" border='1' cellpadding="0" cellspacing="0">
											<tr>
												<td align="center" width="25%">
												<?php echo $this->_config[0]['vars']['dico_management_comptabilite_cumul_annee']; ?>
 <?php echo $this->_tpl_vars['annee2']; ?>
  
												</td>
												<td align="center" width="25%">
												<?php echo $this->_config[0]['vars']['dico_management_comptabilite_cumul_annee']; ?>
 <?php echo $this->_tpl_vars['annee1']; ?>

												</td>
												<td align="center" width="25%">
												<?php echo $this->_config[0]['vars']['dico_management_comptabilite_delta']; ?>

												</td>
												<td align="center" width="25%">
												<?php echo $this->_config[0]['vars']['dico_management_comptabilite_delta_pourcentage']; ?>

												</td>
											</tr>
											
											<tr>
											<td align="center" width="25%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['prevcumul']; ?>

											</td>
											<td align="center" width="25%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul']; ?>

											</td>
											<td align="center" width="25%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['delta']; ?>

											</td>
											<td align="center" width="25%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['pourcentage']; ?>

											</td>
											</tr>
										</table>
										    
								    </div>
							    <?php endfor; endif; ?>
								</div>
								<div class="table_body">
								</div> 								
								</div> 			
							
							<div class="clear_both"></div> 			
						</div> 					
					</div> 	
					
				</div>
					
			</div>

	</div>
	

	<?php echo '

	'; ?>

	
	