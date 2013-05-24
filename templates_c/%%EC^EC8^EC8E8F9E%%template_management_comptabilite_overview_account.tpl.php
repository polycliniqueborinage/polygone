<?php /* Smarty version 2.6.19, created on 2012-11-09 12:56:42
         compiled from template_management_comptabilite_overview_account.tpl */ ?>
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
    				<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_overview']; ?>
</span>
    				<a href="./management_comptabilite.php?action=comparison_account"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_comparison_account']; ?>
</a>
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
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=overview_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div>
										
											
											<div class="row"><label for = "annee"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_annee']; ?>
:</label><input type = "text" name = "annee" id="annee" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee']; ?>
" value=<?php echo $this->_tpl_vars['annee']; ?>
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
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" width="10%">
										<?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_mois']; ?>

										</td>
									</tr>
								</table>
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" width="5%">
										<?php echo $this->_config[0]['vars']['dico_management_comptabilite_debit']; ?>
  
										</td>
										<td align="center" width="5%">
										<?php echo $this->_config[0]['vars']['dico_management_comptabilite_credit']; ?>

										</td>
									</tr>
									<tr>
										<td align="center" width="5%">
										<?php echo $this->_config[0]['vars']['dico_management_comptabilite_debit']; ?>
 <?php echo $this->_config[0]['vars']['dico_management_comptabilite_cumule']; ?>
  
										</td>
										<td align="center" width="5%">
										<?php echo $this->_config[0]['vars']['dico_management_comptabilite_credit']; ?>
 <?php echo $this->_config[0]['vars']['dico_management_comptabilite_cumule']; ?>

										</td>
									</tr>
								</table>
								<table width="10%" border='1' cellpadding="0" cellspacing="0">
									<tr>
										<td align="right" width="10%">
										<?php echo $this->_config[0]['vars']['dico_management_comptabilite_solde_cumul']; ?>

										</td>
									</tr>
								</table>			
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
										<?php if ($this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['number'] == 0): ?>
											<h4><u><?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['number']; ?>
 - <?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr']; ?>
</u></h4>
										<?php else: ?>
											<a target="_blank" href="management_comptabilite.php?action=show_comparison&annee1=<?php echo $this->_tpl_vars['annee']; ?>
&account=<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['number']; ?>
"><h4><u><?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['number']; ?>
 - <?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr']; ?>
</u></h4></a>
										<?php endif; ?>
										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_jan']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_feb']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_mar']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_apr']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_may']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_jun']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_jul']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_aug']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_sep']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_oct']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_nov']; ?>

											</td>
											<td align="center" width="8%">
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['descr_dec']; ?>

											</td>
											</tr>
										</table>
										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_jan']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_jan']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_feb']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_feb']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_mar']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_mar']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_apr']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_apr']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_may']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_may']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_jun']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_jun']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_jul']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_jul']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_aug']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_aug']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_sep']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_sep']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_oct']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_oct']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_nov']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_nov']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['debit_dec']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['credit_dec']; ?>

											</font></td>
											</tr>
											
											<tr>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_jan']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_jan']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_feb']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_feb']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_mar']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_mar']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_apr']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_apr']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_may']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_may']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_jun']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_jun']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_jul']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_jul']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_aug']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_aug']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_sep']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_sep']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_oct']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_oct']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_nov']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_nov']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_deb_dec']; ?>

											</font></td>
											<td align="right" width="4%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['cumul_cre_dec']; ?>

											</font></td>
											</tr>
										</table>

										<table width="100%" border='1' cellpadding="0" cellspacing="0">
											<tr>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_jan']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_feb']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_mar']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_apr']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_may']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_jun']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_jul']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_aug']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_sep']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_oct']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_nov']; ?>

											</font></td>
											<td align="right" width="8%"><font size='1'>
											<?php echo $this->_tpl_vars['comptes'][$this->_sections['compte']['index']]['solde_cum_dec']; ?>

											</font></td>
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

	
	