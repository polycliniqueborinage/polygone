<?php /* Smarty version 2.6.19, created on 2012-09-12 16:14:35
         compiled from template_admin_listing_specialist.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_daterangepicker' => 'yes','js_rico' => 'yes','js_listing' => 'yes')));
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
						
					<span><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_specialist']; ?>
</span> 

    				<!--<a href="./admin_listing.php?action=doctor"><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_doctor']; ?>
</a>-->

    				<a href="./admin_listing.php?action=till"><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_till']; ?>
</a>
    				
    				<a href="./admin_listing.php?action=prestations_medecins"><?php echo $this->_config[0]['vars']['navigation_title_admin_listing_prestations_medecins']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/listing.png" alt="" />
										<span id='productflowlist_timer'></span><span id="productflowlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									
									
									<a target='_new' href="admin_listing.php?action=specialist_pdf" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div class="block_in_wrapper">

									<form id="form" class="main" method="post" action="./admin_listing.php?action=specialist">
									
										<fieldset>
									
										<div>
		
											<label><?php echo $this->_config[0]['vars']['dico_management_product_report_begda']; ?>
:</label>
											<input type = "text" value = "<?php echo $this->_tpl_vars['date_start']; ?>
" name = "date_start" id="date_start" class="text" realname="<?php echo $this->_config[0]['vars']['dico_management_product_report_begda']; ?>
" onkeyup="javascript:valuebegda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											<label><?php echo $this->_config[0]['vars']['dico_management_product_report_endda']; ?>
:</label>
											<input type = "text" value = "<?php echo $this->_tpl_vars['date_end']; ?>
" name = "date_end" id="date_end" class="text" realname="<?php echo $this->_config[0]['vars']['dico_management_product_report_endda']; ?>
" onkeyup="javascript:valueendda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											
										</div>
											
										</fieldset>
								
									</form>
								
								</div>
								
								<div id="messagecookie">
								
									<span id='listing_specialist_timer' class='ricoSessionTimer'></span><span id="listing_specialist_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="listing_specialist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_close']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_date']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_patient_familyname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_patient_firstname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_patient_type']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_patient_ct1ct2']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_doctor_familyname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_doctor_firstname']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_description']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_cecodi']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_cost']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_cost_poly']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_pourcent']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_cost_doctor']; ?>
</td>
												<td class="b"><?php echo $this->_config[0]['vars']['dico_admin_listing_doctor_colum_prestation_tm']; ?>
</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
										
									</div> 									
									<div class="clear_both"></div> 									
								</div>
			        		    
							</div> 							
						</div> 
				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
	
		var valuebegda = null;
		var valueendda = null;

		Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:85},{width:85},{filterUI:\'t\',width:70},{filterUI:\'t\',width:70},{filterUI:\'t\',width:60},{filterUI:\'t\',width:30},{filterUI:\'t\',width:80},{filterUI:\'t\',width:80},{filterUI:\'t\',width:100},{filterUI:\'t\',width:60},{filterUI:\'t\',width:50},{filterUI:\'t\',width:50},{filterUI:\'t\',width:50},{filterUI:\'t\',width:50},{filterUI:\'t\',width:50}]
		  	};
		  	
			buffer=new Rico.Buffer.AjaxSQL(\'include/js/rico/ricoXMLquery.php\', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid (\'listing_specialist\', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		jQuery(document).ready(function(){
    	   	jQuery(\'input.text\').daterangepicker({
    	   		presetRanges: [
					{text: \'Aujourd\\\'hui\', dateStart: \'today\', dateEnd: \'today\' },
					{text: \'Hier\', dateStart: \'yesterday\', dateEnd: \'yesterday\' },
					{text: \'1ere Quinzaine\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(1); return x; }, dateEnd: function(){ var x= Date.parse(\'today\'); x.setDate(15); return x; } },
					{text: \'2ere Quinzaine\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(16); return x; }, dateEnd: function(){ return Date.parse(\'today\').moveToLastDayOfMonth(); } },
					{text: \'Mois\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(1); return x; }, dateEnd: function(){ return Date.parse(\'today\').moveToLastDayOfMonth(); } },
					{text: \'1ere Quinzaine Mois Pr&eacute;c&eacute;dent\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse(\'today\'); x.setMonth(x.getMonth()-1); x.setDate(15); return x; } },
					{text: \'2ere Quinzaine Mois Pr&eacute;c&eacute;dent\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(16); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse(\'today\'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x; } },
					{text: \'Mois Pr&eacute;c&eacute;dent\', dateStart: function(){ var x= Date.parse(\'today\'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse(\'today\'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x;  } }
				], 
    	   		dateFormat: \'dd/mm/yy\', 
    	   		posX: 70, 
    	   		posY: 275,
				onClose: function(){
					document.forms.form.submit();
				}    	   		
    	   	}); 
	     });	
		
	</script>
	'; ?>

