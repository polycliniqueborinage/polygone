<?php /* Smarty version 2.6.19, created on 2012-10-08 14:40:49
         compiled from template_management_patient_view.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_ui_171' => 'yes','js_patient' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_patient.php?action=search"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_search']; ?>
</a>

    				<a href="./management_patient.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_add']; ?>
</a>

	  				<a href="./management_patient.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_patient_menu_list']; ?>
</a>
						
					<span><?php echo $this->_config[0]['vars']['dico_management_patient_menu_view']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<?php if ($this->_tpl_vars['mode'] == 'saved'): ?>
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_patient_saved']; ?>
</span>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['mode'] == 'edited'): ?>
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_management_patient_edited']; ?>
</span>
						<?php endif; ?>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
									<span><?php echo $this->_tpl_vars['patient']['familyname']; ?>
 <?php echo $this->_tpl_vars['patient']['firstname']; ?>
</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">
							
								<div id="tab_content">
									<ul>
										<li>
											<a href="#fragment-1"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_general']; ?>
</span></a>
										</li>
										<li>
											<a href="#fragment-2"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_info']; ?>
</span></a>
										</li>
										<li>
											<a href="#fragment-3"><span><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
</span></a>
										</li>
									</ul>



									<div id="fragment-1" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_titulaire_name']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['titulaire']; ?>
</td>
											</tr>

											<tr valign="top">
                       							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_birthday']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['birthday']; ?>
</td>
											</tr>

											<?php if ($this->_tpl_vars['patient']['gender'] == 'M'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_gender']; ?>
:</b></td><td><?php echo $this->_config[0]['vars']['dico_management_patient_male']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['gender'] == 'F'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_gender']; ?>
:</b></td><td><?php echo $this->_config[0]['vars']['dico_management_patient_female']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['nationality'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_nationality']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['nationality']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['niss'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_niss']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['niss']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<tr valign="top">
                       							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_address1']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['address1']; ?>
 <br/><?php echo $this->_tpl_vars['patient']['zip1']; ?>
 <?php echo $this->_tpl_vars['patient']['city1']; ?>
 <br/><?php echo $this->_tpl_vars['patient']['state1']; ?>
 <br/><?php echo $this->_tpl_vars['patient']['country1']; ?>
</td>
											</tr>

											<!--
											<?php if ($this->_tpl_vars['patient']['workphone'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_workphone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['workphone']; ?>
</td>
											</tr>
                       						<?php endif; ?>
                       						-->
		
											<?php if ($this->_tpl_vars['patient']['privatephone'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_privatephone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['privatephone']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['mobilephone'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_mobilephone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['mobilephone']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['fax'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_fax']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['fax']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['email'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_email']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['email']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['mutuel_code'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_code']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['mutuel_code']; ?>
</td>
											</tr>
											<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['mutuel_matricule'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_matricule']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['mutuel_matricule']; ?>
</td>
											</tr>
											<?php endif; ?>
					
											<?php if ($this->_tpl_vars['patient']['ct1ct2'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_ct1ct2']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['ct1ct2']; ?>
</td>
											</tr>
											<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['sis'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_sis']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['sis']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<?php if ($this->_tpl_vars['patient']['doctor'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_doctor']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['doctor']; ?>
</td>
											</tr>
                       						<?php endif; ?>
                       						
                       						<?php if ($this->_tpl_vars['patient']['fumeur'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_fumeur']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['fumeur']; ?>
</td>
											</tr>
                       						<?php endif; ?>
                       						
                       						<?php if ($this->_tpl_vars['patient']['obese'] == 'checked'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_obese']; ?>
</b></td> 
											</tr>
                       						<?php endif; ?>

											<tr><td class="label"></td><td>
												<a href="management_patient.php?action=edit&id=<?php echo $this->_tpl_vars['patient']['ID']; ?>
" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_management_patient_button_edit']; ?>
</span></a>
											</td></tr>

										</table>
									
									<div class="clear_both_b"></div> 	
									</div> 	
									
									
									
									<div id="fragment-2" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_titulaire_name']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['titulaire']; ?>
</td>
											</tr>

										<?php if ($this->_tpl_vars['patient']['commentaire'] != ""): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['commentaire']; ?>
</td>
											</tr>
                       					<?php endif; ?>
                       					</table>
                       					<hr>
                       					<table cellpadding="0" cellspacing="0" width="100%">
										<?php if ($this->_tpl_vars['patient']['tiers_payant_info'] == 'checked'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_tiers_payant_info']; ?>
</b></td>
											</tr>
                       					<?php endif; ?>
                       					
                       					<?php if ($this->_tpl_vars['patient']['vipo_info'] == 'checked'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_vipo_info']; ?>
</b></td>
											</tr>
                       					<?php endif; ?>
                       					
                       					<?php if ($this->_tpl_vars['patient']['mutuelle_info'] == 'checked'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_mutuelle_info']; ?>
</b></td>
											</tr>
                       					<?php endif; ?>                       			
                       					
                       					<?php if ($this->_tpl_vars['patient']['interdit_info'] == 'checked'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_interdit_info']; ?>
</b></td>
											</tr>
                       					<?php endif; ?>
                       					</table>
                       					<?php if ($this->_tpl_vars['patient']['interdit_info'] == 'checked' || $this->_tpl_vars['patient']['mutuelle_info'] == 'checked' || $this->_tpl_vars['patient']['vipo_info'] == 'checked' || $this->_tpl_vars['patient']['tiers_payant_info'] == 'checked'): ?>
                       					<hr>
                       					<?php endif; ?>
                       					<table cellpadding="0" cellspacing="0" width="100%">
                       					<tr valign="top">
                    						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_rating_rendez_vous_info']; ?>
:</b></td>
                    						<td><?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '1'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_1']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '2'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_2']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '3'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_3']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '4'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_4']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '5'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_rdv_5']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_rendez_vous_info'] == '0'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_not_defined']; ?>

                    						    <?php endif; ?>
                    						</td>
										</tr>
										
										<tr valign="top">
                    						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_info']; ?>
:</b></td>
                    						<td><?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '1'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_1']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '2'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_2']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '3'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_3']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '4'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_4']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '5'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_frequentation_5']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_frequentation_info'] == '0'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_not_defined']; ?>

                    						    <?php endif; ?>
											</td>
										</tr>                       					
										
										<tr valign="top">
                    						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_info']; ?>
:</b></td>
                    						<td><?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '1'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_1']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '2'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_2']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '3'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_3']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '4'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_4']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '5'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_preference_5']; ?>

                    						    <?php endif; ?>
                    						    <?php if ($this->_tpl_vars['patient']['rating_preference_info'] == '0'): ?>
                    							<?php echo $this->_config[0]['vars']['dico_management_patient_rating_not_defined']; ?>

                    						    <?php endif; ?>
											</td>
										</tr>                       					

										</table>
									
									<div class="clear_both_b"></div> 	
									</div> 	
									
									
									
									<div id="fragment-3" class="block_in_wrapper">
									
										<table cellpadding="0" cellspacing="0" width="100%">
										
											<?php unset($this->_sections['tarification']);
$this->_sections['tarification']['name'] = 'tarification';
$this->_sections['tarification']['loop'] = is_array($_loop=$this->_tpl_vars['tarifications']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tarification']['show'] = true;
$this->_sections['tarification']['max'] = $this->_sections['tarification']['loop'];
$this->_sections['tarification']['step'] = 1;
$this->_sections['tarification']['start'] = $this->_sections['tarification']['step'] > 0 ? 0 : $this->_sections['tarification']['loop']-1;
if ($this->_sections['tarification']['show']) {
    $this->_sections['tarification']['total'] = $this->_sections['tarification']['loop'];
    if ($this->_sections['tarification']['total'] == 0)
        $this->_sections['tarification']['show'] = false;
} else
    $this->_sections['tarification']['total'] = 0;
if ($this->_sections['tarification']['show']):

            for ($this->_sections['tarification']['index'] = $this->_sections['tarification']['start'], $this->_sections['tarification']['iteration'] = 1;
                 $this->_sections['tarification']['iteration'] <= $this->_sections['tarification']['total'];
                 $this->_sections['tarification']['index'] += $this->_sections['tarification']['step'], $this->_sections['tarification']['iteration']++):
$this->_sections['tarification']['rownum'] = $this->_sections['tarification']['iteration'];
$this->_sections['tarification']['index_prev'] = $this->_sections['tarification']['index'] - $this->_sections['tarification']['step'];
$this->_sections['tarification']['index_next'] = $this->_sections['tarification']['index'] + $this->_sections['tarification']['step'];
$this->_sections['tarification']['first']      = ($this->_sections['tarification']['iteration'] == 1);
$this->_sections['tarification']['last']       = ($this->_sections['tarification']['iteration'] == $this->_sections['tarification']['total']);
?>
										
											<tr valign="top">
                        						<td>ID</td>
                        						<td>Date</td>
                        						<td>Caisse</td>
                        						<td>Etat</td>
                        						<td>A Payer</td>
                        						<td>Paye</td>
                        						<td>Cloture</td>
											</tr>

											<tr valign="top">
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['id']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['date']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['caisse']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['etat']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['a_payer']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['paye']; ?>
</td>
                        						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['cloture']; ?>
</td>
											</tr>
											
											<tr valign="top">
    	                    					<td>ID</td>
    	                    					<td>Cecodi</td>
    	                    					<td>cout</td>
    	                    					<td>cout_medecin</td>
    	                    					<td>cout_poly</td>
    	                    					<td>cout_mutuelle</td>
    	                    					<td>caisse</td>
											</tr>

											<?php unset($this->_sections['tarificationdetail']);
$this->_sections['tarificationdetail']['name'] = 'tarificationdetail';
$this->_sections['tarificationdetail']['loop'] = is_array($_loop=$this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tarificationdetail']['show'] = true;
$this->_sections['tarificationdetail']['max'] = $this->_sections['tarificationdetail']['loop'];
$this->_sections['tarificationdetail']['step'] = 1;
$this->_sections['tarificationdetail']['start'] = $this->_sections['tarificationdetail']['step'] > 0 ? 0 : $this->_sections['tarificationdetail']['loop']-1;
if ($this->_sections['tarificationdetail']['show']) {
    $this->_sections['tarificationdetail']['total'] = $this->_sections['tarificationdetail']['loop'];
    if ($this->_sections['tarificationdetail']['total'] == 0)
        $this->_sections['tarificationdetail']['show'] = false;
} else
    $this->_sections['tarificationdetail']['total'] = 0;
if ($this->_sections['tarificationdetail']['show']):

            for ($this->_sections['tarificationdetail']['index'] = $this->_sections['tarificationdetail']['start'], $this->_sections['tarificationdetail']['iteration'] = 1;
                 $this->_sections['tarificationdetail']['iteration'] <= $this->_sections['tarificationdetail']['total'];
                 $this->_sections['tarificationdetail']['index'] += $this->_sections['tarificationdetail']['step'], $this->_sections['tarificationdetail']['iteration']++):
$this->_sections['tarificationdetail']['rownum'] = $this->_sections['tarificationdetail']['iteration'];
$this->_sections['tarificationdetail']['index_prev'] = $this->_sections['tarificationdetail']['index'] - $this->_sections['tarificationdetail']['step'];
$this->_sections['tarificationdetail']['index_next'] = $this->_sections['tarificationdetail']['index'] + $this->_sections['tarificationdetail']['step'];
$this->_sections['tarificationdetail']['first']      = ($this->_sections['tarificationdetail']['iteration'] == 1);
$this->_sections['tarificationdetail']['last']       = ($this->_sections['tarificationdetail']['iteration'] == $this->_sections['tarificationdetail']['total']);
?>
											
												<tr valign="top">
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['id']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['cecodi']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['cout']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['cout_medecin']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['cout_poly']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['cout_mutuelle']; ?>
</td>
    	                    						<td><?php echo $this->_tpl_vars['tarifications'][$this->_sections['tarification']['index']]['tarification_details'][$this->_sections['tarificationdetail']['index']]['caisse']; ?>
</td>
												</tr>
						
						
											<?php endfor; endif; ?>
											
											<tr valign="top">
    	                    					<td></td>
											</tr>
											

											<?php endfor; endif; ?>
										
											<?php if ($this->_tpl_vars['patient']['textcomment'] != ""): ?>
												<tr valign="top">
	                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_management_patient_subtab_comment']; ?>
:</b></td><td><?php echo $this->_tpl_vars['patient']['textcomment']; ?>
</td>
												</tr>
                       						<?php endif; ?>
															
										
										</table>

										
									
									<div class="clear_both_b"></div> 	
									</div> 		
								
    
								</div>

							</div>
							<div class="clear_both"></div> 					
						</div> 					
					</div> 				
			
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('patient_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	
	<?php echo '
	<script type=\'text/javascript\'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	'; ?>

	
	
	
	
	