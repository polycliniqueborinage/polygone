{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_daterangepicker="yes" js_rico="yes" js_listing="yes"}
			
	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_listing_menu_mutuelle#}</span> 

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
									
									
									<a target='_new' href="management_listing.php?action=mutuelle_pdf" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div class="block_in_wrapper">

									<form id="form" class="main" method="post" action="./management_listing.php?action=mutuelle">
									
										<fieldset>
									
										<div>
		
											<label>{#dico_management_product_report_begda#}:</label>
											<input type = "text" value = "{$date_start}" name = "date_start" id="date_start" class="text" realname="{#dico_management_product_report_begda#}" onkeyup="javascript:valuebegda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											<label>{#dico_management_product_report_endda#}:</label>
											<input type = "text" value = "{$date_end}" name = "date_end" id="date_end" class="text" realname="{#dico_management_product_report_endda#}" onkeyup="javascript:valueendda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>

										</div>
											
										</fieldset>
								
									</form>
								
								</div>
								
								<div id="messagecookie">
								
									<span id='listing_mutuelle_timer' class='ricoSessionTimer'></span><span id="listing_mutuelle_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="listing_mutuelle" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b">{#dico_management_listing_mutuelle_colum_ID#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_close_date#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_act#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_mutuelle#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_patient_family_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_patient_first_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_patient_matricul#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_patient_ct1ct2#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_titulaire_family_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_titulaire_first_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_titulaire_matricul#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_doctor_family_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_doctor_first_name#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_cecodi#}</td>
												<td class="b">{#dico_management_listing_mutuelle_colum_amount#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	
	{literal}
	<script type='text/javascript'>
	
		var valuebegda = null;
		var valueendda = null;

		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{filterUI:'t',width:60},{width:100},{width:100},{filterUI:'t',width:40},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:60},{filterUI:'t',width:120}]
		  	};
		  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('listing_mutuelle', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		jQuery(document).ready(function(){
    	   	jQuery('input.text').daterangepicker({
    	   		presetRanges: [
					{text: 'Aujourd\'hui', dateStart: 'today', dateEnd: 'today' },
					{text: 'Hier', dateStart: 'yesterday', dateEnd: 'yesterday' },
					{text: '1ere Quinzaine', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setDate(15); return x; } },
					{text: '2ere Quinzaine', dateStart: function(){ var x= Date.parse('today'); x.setDate(16); return x; }, dateEnd: function(){ return Date.parse('today').moveToLastDayOfMonth(); } },
					{text: 'Mois', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); return x; }, dateEnd: function(){ return Date.parse('today').moveToLastDayOfMonth(); } },
					{text: '1ere Quinzaine Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.setDate(15); return x; } },
					{text: '2ere Quinzaine Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(16); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x; } },
					{text: 'Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x;  } }
				], 
    	   		dateFormat: 'dd/mm/yy', 
    	   		posX: 70, 
    	   		posY: 275,
				onClose: function(){
					document.forms.form.submit();
				}    	   		
    	   	}); 
	     });
		
	</script>
	{/literal}