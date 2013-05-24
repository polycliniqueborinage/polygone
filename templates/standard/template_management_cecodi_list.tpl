{include file="template_header.tpl" js_jquery="yes" js_rico="yes" js_cecodi="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./management_cecodi.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_cecodi.php?action=add">{#dico_management_patient_menu_add#}</a>

					<span>{#dico_management_cecodi_menu_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/cecodi.png" alt="" />
										<span id='cecodilist_timer'></span><span id="cecodilist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>
								
								<div id="messagecookie">
								
									<div class="table_head">
										<table id="cecodilist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%">{#dico_management_cecodi_search_colum_action#}</td>
												<td class="b" style="width:7%">{#dico_management_cecodi_code#}</td>
												<td class="b" style="width:5%">{#dico_management_cecodi_age#}</td>
												<td class="b" style="width:21%">{#dico_management_cecodi_description#}</td>
												<td class="b" style="width:13%">{#dico_management_cecodi_condition#}</td>
												<td class="b" style="width:13%">{#dico_management_cecodi_type#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_hono_travailleur#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_a_vipo#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_b_tiers_payant#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_kdb#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_bc#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_amount_tp#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_amount_tr#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_amount_vp#}</td>
												<td class="b" style="width:10%">{#dico_management_cecodi_amount_tpfortr#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="cecodiBox">
																
										</div> {*Accordion End*}
										
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
    			columnSpecs:  [{width:50},{filterUI:'t',width:70},{filterUI:'t',width:70},{filterUI:'t',width:120},{filterUI:'t',width:120},{filterUI:'t',width:90},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40},{filterUI:'t',width:40}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('cecodilist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

