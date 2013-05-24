<?php /* Smarty version 2.6.19, created on 2012-08-25 11:34:18
         compiled from template_admin_listing_prestations_medecins.tpl */ ?>
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

    				<a href="./admin_listing.php"><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_specialist']; ?>
</a>

					<!--<a href="./admin_listing.php?action=doctor"><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_doctor']; ?>
</a>-->

    				<a href="./admin_listing.php?action=till"><?php echo $this->_config[0]['vars']['dico_admin_listing_menu_till']; ?>
</a>
    				
    				<span><?php echo $this->_config[0]['vars']['navigation_title_admin_listing_prestations_medecins']; ?>
</span> 

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
									
									
									<a target='_new' href="admin_listing.php?action=print_prestations_medecins" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div class="block_in_wrapper">

									<form id="form" class="main" method="post" action="./admin_listing.php?action=prestations_medecins">
									
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
											<label><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_medecins_fields_filter']; ?>
:</label>
											<input type = "checkbox" name = "filter" id="filter" <?php if ($this->_tpl_vars['filter'] == 'on'): ?>checked<?php endif; ?> onchange="document.forms.form.submit()">
										
										</div>
											
										</fieldset>
								
									</form>
								
								</div>
								
								<div>
								
									<div>
										<table id="listing_doctor" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<!--<th class="b" style='width:20%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_prenom']; ?>
</th>-->
												<th class="b" style='width:20%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_nom']; ?>
</th>
												<!--<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_inami']; ?>
</th>-->
												<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_duration']; ?>
</th>
												<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_duration2']; ?>
</th>
												<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_duration3']; ?>
</th>
												<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_pourcentage']; ?>
</th>
												<th class="b" style='width:15%' align='left'><?php echo $this->_config[0]['vars']['dico_admin_listing_prestations_colum_medecin_pourcentage_cum']; ?>
</th>
											</tr>
											<?php unset($this->_sections['prestation']);
$this->_sections['prestation']['name'] = 'prestation';
$this->_sections['prestation']['loop'] = is_array($_loop=$this->_tpl_vars['prestations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prestation']['show'] = true;
$this->_sections['prestation']['max'] = $this->_sections['prestation']['loop'];
$this->_sections['prestation']['step'] = 1;
$this->_sections['prestation']['start'] = $this->_sections['prestation']['step'] > 0 ? 0 : $this->_sections['prestation']['loop']-1;
if ($this->_sections['prestation']['show']) {
    $this->_sections['prestation']['total'] = $this->_sections['prestation']['loop'];
    if ($this->_sections['prestation']['total'] == 0)
        $this->_sections['prestation']['show'] = false;
} else
    $this->_sections['prestation']['total'] = 0;
if ($this->_sections['prestation']['show']):

            for ($this->_sections['prestation']['index'] = $this->_sections['prestation']['start'], $this->_sections['prestation']['iteration'] = 1;
                 $this->_sections['prestation']['iteration'] <= $this->_sections['prestation']['total'];
                 $this->_sections['prestation']['index'] += $this->_sections['prestation']['step'], $this->_sections['prestation']['iteration']++):
$this->_sections['prestation']['rownum'] = $this->_sections['prestation']['iteration'];
$this->_sections['prestation']['index_prev'] = $this->_sections['prestation']['index'] - $this->_sections['prestation']['step'];
$this->_sections['prestation']['index_next'] = $this->_sections['prestation']['index'] + $this->_sections['prestation']['step'];
$this->_sections['prestation']['first']      = ($this->_sections['prestation']['iteration'] == 1);
$this->_sections['prestation']['last']       = ($this->_sections['prestation']['iteration'] == $this->_sections['prestation']['total']);
?>
											<tr>
												<!--<td style='width:20%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['prenom']; ?>
</td>-->
												<td style='width:20%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['nom']; ?>
</td>
												<!--<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['inami']; ?>
</td>-->
												<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['duration']; ?>
</td>
												<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['duration2']; ?>
</td>
												<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['duration3']; ?>
</td>
												<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['pourcentage']; ?>
</td>
												<td style='width:15%' align='left'><?php echo $this->_tpl_vars['prestations'][$this->_sections['prestation']['index']]['pourcentage_cum']; ?>
</td>
											</tr>
											<?php endfor; endif; ?>
										</table>
									</div>
									
									<div class="clear_both"></div> 									
								</div>
			        		    
							</div> 						</div> 					

				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
	
		var valuebegda = null;
		var valueendda = null;

		//Rico.loadModule(\'LiveGridAjax\',\'LiveGridMenu\',\'grayedout.css\');

		var orderGrid,buffer;
		//{type:\'date\'}
		
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

