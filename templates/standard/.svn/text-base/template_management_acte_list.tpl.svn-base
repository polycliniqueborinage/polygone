{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_rico="yes" js_acte="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_acte.php?action=manuel_flow">{#dico_management_patient_menu_manuel_flow#}</a>

	  				<a href="./management_acte.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_acte.php?action=add">{#dico_management_patient_menu_add#}</a>

					<span>{#dico_management_patient_menu_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div id="messagecookie">
								
									<span id='ex2_timer' class='ricoSessionTimer'></span><span id="ex2_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="ex2" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%">{#dico_management_acte_search_colum_action#}</td>
												<td class="b" style="width:15%">{#dico_management_acte_search_colum_code#}</td>
												<td class="b" style="width:24%">{#dico_management_acte_search_colum_description#}</td>
												<td class="b" style="width:15%">{#dico_management_acte_search_colum_cecodis#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_couttr#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_couttp#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_coutvp#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_coutsm#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_length#}</td>
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
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [,{filterUI:'t',width:100},{filterUI:'t',width:250}, {filterUI:'t',width:200},{filterUI:'t',width:80},{filterUI:'t',width:80},{filterUI:'t',width:80},{filterUI:'t',width:80},{filterUI:'t',width:80}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('ex2', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

