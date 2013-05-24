{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes"  js_patient="yes" js_jqmodal="yes" js_rico="yes" }

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./management_client.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_client.php?action=add">{#dico_management_patient_menu_add#}</a>

					<span>{#dico_management_patient_menu_list#}</span> 

				</div>
				
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='clientlist_timer'></span><span id="clientlist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="clientlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="width:10%">{#dico_management_patient_search_colum_action#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_firstname#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_familyname#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_birthday#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_privatephone#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_mobilephone#}</td>
												<td style="width:15%">{#dico_management_patient_search_colum_mail#}</td>
											</tr>
										</table>
									</div>
									
									<div class="table_body">
									
										<div id="clientBox">
																
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
	
	{include file="template_left.tpl" client_search="yes"}

	{include file="template_right.tpl"}

	{literal}
	<script type='text/javascript'>
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:50},{filterUI:'t',width:130},{filterUI:'t',width:130}, {filterUI:'t',width:90},{filterUI:'t',width:110},{filterUI:'t',width:110},{filterUI:'t',width:170},{width:50},{filterUI:'t',width:120},{filterUI:'t',width:130},{filterUI:'t',width:130}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('clientlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		
	</script>
	{/literal}
