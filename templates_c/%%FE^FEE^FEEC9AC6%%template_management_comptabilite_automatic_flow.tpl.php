<?php /* Smarty version 2.6.19, created on 2012-11-09 12:38:48
         compiled from template_management_comptabilite_automatic_flow.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery' => 'yes','js_jquery_autocomplete' => 'yes','js_product' => 'yes','js_jquery_validate' => 'yes')));
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
					<a href="./management_comptabilite.php?action=display_graphe"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene']; ?>
</a>
					<!--<a href="./management_comptabilite.php?action=display_histo"><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_stat_comptagene_histo']; ?>
</a>-->
					<span><?php echo $this->_config[0]['vars']['navigation_title_management_comptabilite_add']; ?>
</span>
    				
				</div>
			
				<div class="ViewPane">
				
					<?php if ($this->_tpl_vars['mode'] == 1): ?>
					<div class="infowin_left" id = "systemmsg">
						<div>
							<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/><?php echo $this->_config[0]['vars']['dico_comptabilite_uploaded']; ?>
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
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('useredit');"><img src="./templates/standard/img/symbols/files.png" alt="" />
									<span><?php echo $this->_config[0]['vars']['dico_management_comptabilite_submenu_upload']; ?>
</span></a>
								</h2>
						
							</div>
			
							<div id = "useredit" style = "">
			
								<div class="block_in_wrapper">
								
								<form id="form" class="main" method="post" action="management_comptabilite.php?action=automatic_flow_submit" enctype="multipart/form-data">
						
									<fieldset>
			
										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "filetoupload"><?php echo $this->_config[0]['vars']['dico_product_file_upload']; ?>
:</label><input type = "file" class="file" name = "filetoupload" id="filetoupload" size="20" /></div>
											<div class="row"><label for = "mois"> <?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_mois']; ?>
: </label><input type = "text" name = "mois"  id="mois"  size = "2" maxlength = "2" onblur="javascript:checkMois(this.value);" /></div>
											<div class="row"><label for = "annee"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_comptes_annee']; ?>
:</label><input type = "text" name = "annee" id="annee" size = "4" maxlength = "4" onblur="javascript:checkAnnee(this.value);"/></div>
											<div class="row"><label for = "methode"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_ernstandyoung']; ?>
:</label><input type = "radio" name = "methode" id="methode" value="ernstandyoung" size=1/></div>
											<div class="row"><label for = "methode"><?php echo $this->_config[0]['vars']['dico_comptabilite_upload_autremethode']; ?>
: </label><input type = "radio" name = "methode" id="methode" value="autre" size=1 CHECKED/></div>
											
											<div class="clear_both"></div>
					                        
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit"><?php echo $this->_config[0]['vars']['dico_management_protocol_button_send']; ?>
</button></div>
											</div>
										</div>
										
			
									</fieldset>
								</form>
			
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
	
	function checkMois(mois){
		if(mois == \'1\' ||
		   mois == \'2\' ||
		   mois == \'3\' ||
		   mois == \'4\' ||
		   mois == \'5\' ||
		   mois == \'6\' ||
		   mois == \'7\' ||
		   mois == \'8\' ||
		   mois == \'9\')
		
		   mois = "0" + mois;
		
		if(!(mois == "01" ||
		     mois == "02" ||
		     mois == "03" ||
		     mois == "04" ||
		     mois == "05" ||
		     mois == "06" ||
		     mois == "07" ||
		     mois == "08" ||
		     mois == "09" ||
		     mois == "10" ||
		     mois == "11" ||
		     mois == "12")){
		     
			alert("Le mois est incorrect.");
			mois = "";
		}        
	}
	function checkAnnee(annee){
		var error = 0;
		if(annee.length < 4)
			error = 1;
		if(!(annee.charAt(0) == \'1\' || annee.charAt(0) == \'2\'))
			error = 1;
		if(!(annee.charAt(1) == \'0\' || annee.charAt(1) == \'1\' || annee.charAt(1) == \'2\'  || annee.charAt(1) == \'3\'  ||
		     annee.charAt(1) == \'4\' || annee.charAt(1) == \'5\' || annee.charAt(1) == \'6\'  || annee.charAt(1) == \'7\'  ||
		     annee.charAt(1) == \'8\' || annee.charAt(1) == \'9\'))
		    error  = 1;
		if(!(annee.charAt(2) == \'0\' || annee.charAt(2) == \'1\' || annee.charAt(2) == \'2\'  || annee.charAt(2) == \'3\'  ||
		     annee.charAt(2) == \'4\' || annee.charAt(2) == \'5\' || annee.charAt(2) == \'6\'  || annee.charAt(2) == \'7\'  ||
		     annee.charAt(2) == \'8\' || annee.charAt(2) == \'9\'))
		    error  = 1;          
		if(!(annee.charAt(3) == \'0\' || annee.charAt(3) == \'1\' || annee.charAt(3) == \'2\'  || annee.charAt(3) == \'3\'  ||
		     annee.charAt(3) == \'4\' || annee.charAt(3) == \'5\' || annee.charAt(3) == \'6\'  || annee.charAt(3) == \'7\'  ||
		     annee.charAt(3) == \'8\' || annee.charAt(3) == \'9\'))
		    error  = 1;              	
		
		if(error == 1)
			alert("L\'annŽe est incorrecte.");        
	}
	
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
		
  		$("#birthday").mask("99/99/9999");
  		$("#workphone").mask("(9999) 99 99 99");
  		$("#mobilephone").mask("(9999) 99 99 99");
  		$("#privatephone").mask("(9999) 99 99 99");
  		$("#fax").mask("(9999) 99 99 99");		
		
	});
	</script>
	'; ?>

	
	
	
	
	