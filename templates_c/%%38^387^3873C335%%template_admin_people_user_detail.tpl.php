<?php /* Smarty version 2.6.19, created on 2012-09-18 13:46:33
         compiled from template_admin_people_user_detail.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes')));
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
						
	  				<a href="./admin_people_user.php?action=view"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_view']; ?>
</a>
	  				<a href="./admin_people_user.php?action=list"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_list']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_detail']; ?>
</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span><?php echo $this->_tpl_vars['user']['name']; ?>
</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_name']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['familyname']; ?>
 <?php echo $this->_tpl_vars['user']['firstname']; ?>
</td>
											</tr>
											
											<?php if ($this->_tpl_vars['user']['birthday']): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_birthday']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['birthday']; ?>
</td>
											</tr>
                       						<?php endif; ?>
											
											<?php if ($this->_tpl_vars['user']['gender'] == 'm'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_gender']; ?>
:</b></td><td><?php echo $this->_config[0]['vars']['dico_user_profil_male']; ?>
</td>
											</tr>
                       						<?php endif; ?>
											
											<?php if ($this->_tpl_vars['user']['gender'] == 'f'): ?>
											<tr valign="top">
                        						<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_gender']; ?>
:</b></td><td><?php echo $this->_config[0]['vars']['dico_user_profil_female']; ?>
</td>
											</tr>
                       						<?php endif; ?>

											<tr valign="top">
												<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_address1']; ?>
:</b></td>
												<td>
													<span style="display:block;clear:both;"><?php echo $this->_tpl_vars['user']['address1']; ?>
</span>
													<span style="display:block;clear:both;"><?php echo $this->_tpl_vars['user']['zip1']; ?>
 <?php echo $this->_tpl_vars['user']['city1']; ?>
</span>
													<span style="display:block;clear:both;"><?php echo $this->_tpl_vars['user']['state1']; ?>
</span>
													<span style="display:block;clear:both;"><?php echo $this->_tpl_vars['user']['country1']; ?>
</span>
												</td>
											</tr>
						
											<tr valign="top">
                        						<?php if ($this->_tpl_vars['user']['workphone']): ?>
                        							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_workphone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['workphone']; ?>
</td>
                        						<?php endif; ?>
											</tr>

											<tr valign="top">
                        						<?php if ($this->_tpl_vars['user']['mobilephone']): ?>
                        							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_mobilephone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['mobilephone']; ?>
</td>
                        						<?php endif; ?>
											</tr>

											<tr valign="top">
                        						<?php if ($this->_tpl_vars['user']['privatephone']): ?>
                        							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_privatephone']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['privatephone']; ?>
</td>
                        						<?php endif; ?>
											</tr>

											<tr valign="fax">
                        						<?php if ($this->_tpl_vars['user']['fax']): ?>
                        							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_fax']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['fax']; ?>
</td>
                        						<?php endif; ?>
											</tr>
										
											<tr valign="top">
                        						<?php if ($this->_tpl_vars['user']['email']): ?>
                        							<td class="label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_email']; ?>
:</b></td><td><a href = "mailto:<?php echo $this->_tpl_vars['user']['email']; ?>
"><?php echo $this->_tpl_vars['user']['email']; ?>
</a></td>
                        						<?php endif; ?>
											</tr>

											<?php if ($this->_tpl_vars['user']['web']): ?>
												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_web']; ?>
:</b></td><td><span style="display:block;clear:both;"><a target="_blank" href = "<?php echo $this->_tpl_vars['user']['web']; ?>
"><?php echo $this->_tpl_vars['user']['web']; ?>
</a></span></td></tr>
											<?php endif; ?>

											<?php if ($this->_tpl_vars['user']['company']): ?>
												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_user_profil_company']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['company']; ?>
</td></tr>
											<?php endif; ?>
						
												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_type']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['type']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_inami']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['inami']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_acte']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['taux_acte']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_consultation']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['taux_consultation']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_taux_prothese']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['taux_prothese']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_code_analytique']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['code_analytique']; ?>
</td></tr>

												<tr><td class = "label"><b><?php echo $this->_config[0]['vars']['dico_admin_people_user_hourly_cost']; ?>
:</b></td><td><?php echo $this->_tpl_vars['user']['hourly_cost']; ?>
</td></tr>

												<?php if ($this->_tpl_vars['agenda_count'] == -1): ?>
												<tr><td class = "label"><b>Agenda:</b></td><td><a href="admin_people_user.php?action=init_agenda&id=<?php echo $this->_tpl_vars['user']['ID']; ?>
">Initialise Agenda</a></td></tr>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['agenda_count'] != -1): ?>
												<tr><td class = "label"><b>Agenda entr&eacute;es:</b></td><td><?php echo $this->_tpl_vars['agenda_count']; ?>
</td></tr>
												<?php endif; ?>
												
												<tr><td class="label"></td><td>
												<a href="admin_people_user.php?action=edit&id=<?php echo $this->_tpl_vars['user']['ID']; ?>
" class="butn_link"><span><?php echo $this->_config[0]['vars']['dico_management_user_button_edit']; ?>
</span></a>
												</td>
												

										</table>
									
									</div>

									<div style="float:left;" >
										<?php if ($this->_tpl_vars['user']['avatar'] != ""): ?>
											<div class="avatar"><img src = "thumb.php?pic=files/<?php echo $this->_tpl_vars['cl_config']; ?>
/avatar/<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="" /></div>
										<?php else: ?>
											<div class="avatar"><img src = "thumb.php?pic=templates/standard/img/no_avatar.jpg" alt="" /></div>
										<?php endif; ?>
									</div>

									<div class="clear_both_b"></div> 
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('medecin_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_right.tpl", 'smarty_include_vars' => array('useronline' => 'no','chat' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	