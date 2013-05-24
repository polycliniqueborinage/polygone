<?php /* Smarty version 2.6.19, created on 2012-11-09 13:24:28
         compiled from template_management_comptabilite_modify_account.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_ajax' => 'yes','js_jquery_autocomplete' => 'yes','js_product' => 'yes','js_form' => 'yes','js_jquery_validate' => 'yes','tinymce' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			language: "'; ?>
<?php echo $this->_tpl_vars['locale']; ?>
<?php echo '",
			width: "95%",
			height: "30px",
			//plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			plugins : "inlinepopups,style,advimage,advlink,media,visualchars,xhtmlxtras,safari,template",
			//theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,link,unlink,|,forecolor,|,charmap,media",
			theme_advanced_buttons1 : "bold,italic,underline,|,fontsizeselect,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,forecolor,|,charmap",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_path : false,
			theme_advanced_resizing : true,
			theme_advanced_resizing_use_cookie : false,
			theme_advanced_resizing_max_width : "55%",
			extended_valid_elements : "a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			force_br_newlines : true,
			cleanup: true,
			cleanup_on_startup: true,
			force_p_newlines : false,
			convert_newlines_to_brs : true,
			forced_root_block : false
		});
	</script>
	'; ?>

	
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
    				<span><?php echo $this->_config[0]['vars']['dico_management_comptabilite_modify_account']; ?>
</span>
    				<a href="./management_comptabilite.php?action=display_graphe"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene']; ?>
</a>
    				<!--<a href="./management_comptabilite.php?action=display_histo"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene_histo']; ?>
</a>-->
    				<a href="./management_comptabilite.php?action=automatic_flow"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_add']; ?>
</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<?php if ($this->_tpl_vars['message'] != ''): ?>
					<div class="infowin_left" id = "systemmsg">
						<div>
							<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_tpl_vars['message']; ?>
</span>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
					<?php endif; ?>
					
						
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
			
							<div id = "classes" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=search_account" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											
											<div class="row"><label for = "mois"> <?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_mois']; ?>
: </label><input type = "text" name = "mois"  id="mois"  realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois']; ?>
" value=<?php echo $this->_tpl_vars['mois']; ?>
 autocomplete="off" maxlength = "2"/></div>
											<div class="row"><label for = "annee"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_annee']; ?>
:</label><input type = "text" name = "annee" id="annee" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee']; ?>
" value=<?php echo $this->_tpl_vars['annee']; ?>
 autocomplete="off" maxlength = "4"/></div>
											
											<div class="row"><label for = "numero_compte"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_numero_compte']; ?>
:</label><input type = "text" name = "numero_compte" id="numero_compte" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_numero_compte']; ?>
" value='<?php echo $this->_tpl_vars['compte']['numero']; ?>
' autocomplete="off"/></div>
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
											</div>
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> 								
								</div> 			
							</div>			
							<div class="clear_both"></div> 			
						</div> 
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('detail_comptes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span><?php echo $this->_config[0]['vars']['dico_management_comptabilite_details_compte']; ?>
</span>
									</a>
								</h2>
							</div>
			
							<div id = "classes" style="">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="./management_comptabilite.php?action=modify_account_submit" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<input type = "hidden" name = "mois_h"          id="mois_h"          realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_mois']; ?>
"          value=<?php echo $this->_tpl_vars['mois']; ?>
            autocomplete="off" maxlength = "2"/>
											<input type = "hidden" name = "annee_h"         id="annee_h"         realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_annee']; ?>
"         value=<?php echo $this->_tpl_vars['annee']; ?>
           autocomplete="off" maxlength = "4"/>
											<input type = "hidden" name = "numero_compte_h" id="numero_compte_h" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_numero_compte']; ?>
" value='<?php echo $this->_tpl_vars['compte']['numero']; ?>
' autocomplete="off"/>
											<?php echo $this->_tpl_vars['message']; ?>

											<div class="row"><label for = "denomination"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_denomiation_compte']; ?>
:</label><input type = "text" name = "libelle" id="libelle" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_denomiation_compte']; ?>
" value = '<?php echo $this->_tpl_vars['compte']['libelle']; ?>
' autocomplete="off"/></div>
											<div class="row"><label for = "debit"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_debit']; ?>
:</label><input type = "text" name = "debit" id="debit" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_debit']; ?>
" value = '<?php echo $this->_tpl_vars['compte']['debit']; ?>
' autocomplete="off"/></div>
											<div class="row"><label for = "credit"><?php echo $this->_config[0]['vars']['dico_management_comptabilite_credit']; ?>
:</label><input type = "text" name = "credit" id="credit" realname="<?php echo $this->_config[0]['vars']['dico_management_comptabilite_cedit']; ?>
" value = '<?php echo $this->_tpl_vars['compte']['credit']; ?>
' autocomplete="off"/></div>
											
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
											</div>											
											
										</div>
			
										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> 								
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
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('product_search' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '

	'; ?>

	
	