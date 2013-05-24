<?php /* Smarty version 2.6.19, created on 2011-05-23 23:48:36
         compiled from template_management_comptabilite_histogramme_comptagene.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_autocomplete' => 'yes','js_product' => 'yes','js_jquery_validate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_comptabilite.php?action=display_state"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_display_state']; ?>
</a>
    				<a href="./management_comptabilite.php?action=modify_account"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_modify']; ?>
</a>
					<a href="./management_comptabilite.php?action=display_graphe"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene_histo']; ?>
</span>
					<a href="./management_comptabilite.php?action=automatic_flow"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_add']; ?>
</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="parametres_toggle" class="win_block" onclick = "toggleBlock('parametres');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_graphique_parametres']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "parametres" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
									<form id="form" class="main" action="./management_comptabilite.php?action=display_histo" method="post" enctype="multipart/form-data">
									
										<div class="row"><table><tr><td><label for = "mois_de"> <?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_de']; ?>
: </label></td><td><input type = "text" readonly name = "mois_de"  id="mois_de"  realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_de']; ?>
" value = "01" autocomplete="off"/></td><td><label for = "mois_a"> <?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_a']; ?>
: </label></td><td><input type = "text" name = "mois_a"  id="mois_a" maxlength = "2" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois_a']; ?>
"  value = <?php echo $this->_tpl_vars['mois_a']; ?>
 autocomplete="off"/></td></tr></div>
										<div class="row"><tr><td><label for = "annee_de"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_de']; ?>
:</label></td><td><input type = "text" name = "annee_de" id="annee_de" maxlength = "4" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_de']; ?>
" value = <?php echo $this->_tpl_vars['annee_de']; ?>
 autocomplete="off"/></td><td><label for = "annee_a"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_a']; ?>
:</label></td><td><input type = "text" name = "annee_a" id="annee_a" maxlength = "4" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee_a']; ?>
" value = <?php echo $this->_tpl_vars['annee_a']; ?>
 autocomplete="off"/></td></tr></table></div>
										
										<div class="row">
											<label>&nbsp;</label>
											<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
										</div>	 
									
									</form>	
										
									</div>
								<div class="clear_both"></div> 								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="benefice_toggle" class="win_block" onclick = "toggleBlock('benefice');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_graphique_benefice']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "benefice" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "<?php echo $this->_tpl_vars['graphe']['adresse_ben']; ?>
" alt="" border="0"/>
										</center>	 
										
									</div>
								<div class="clear_both"></div> 								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 						
						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="classe6_toggle" class="win_block" onclick = "toggleBlock('classe6');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_graphique_classe6']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "classe6" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "<?php echo $this->_tpl_vars['graphe']['adresse_classe60']; ?>
" alt="" border="0"/>
										</center>	 
										
									</div>
								<div class="clear_both"></div> 								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 						
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="classe7_toggle" class="win_block" onclick = "toggleBlock('classe7');"><img src="./templates/standard/img/symbols/flow.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_graphique_classe7']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "classe7" style = "">
			
								<div class="block_in_wrapper">
									<div style="float:left;width:80%;">
									
										<center>
											<img src = "<?php echo $this->_tpl_vars['graphe']['adresse_classe7']; ?>
" alt="" border="0"/>
										</center>	 
										
									</div>
								<div class="clear_both"></div> 								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 			
					</div> 			
			
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('product_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php echo '
	<script type="text/javascript">

	$(document).ready(function() {
	
		$("#form").validate({
			rules: {
			    filetoupload: "required",
			    mois: "required",
			    annee: "required"
   			},
   			messages: {
				filetoupload: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				},
 				mois: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				},
 				annee: {
 			    	required: "'; ?>
<?php echo $this->_config[0]['vars']['dico_user_error_required']; ?>
<?php echo '"
 				}
			}
		});
		
	    $("form").bind("invalid-form.validate", function(e, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_one_field_error']; ?>
<?php echo '\'
					: \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_many_fields_error_1']; ?>
<?php echo '\' + errors + \''; ?>
<?php echo $this->_config[0]['vars']['dico_management_error_many_fields_error_2']; ?>
<?php echo '\';
					$("div.error span").html(message);
					$("div.error").show();
					$("div.infowin_left").show();
					systemeMessage(\'systemmsg\');
				}
		});
		
	});
	</script>
	'; ?>

	
	
	
	
	