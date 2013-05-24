{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_rico="yes" js_protocol="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./user_protocol.php?action=personal_search">{#dico_user_protocol_menu_personal_search#}</a>

    				<a href="./user_protocol.php?action=global_search">{#dico_user_protocol_menu_global_search#}</a>

					<span>{#dico_user_protocol_menu_list#}</span>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/protocol.png" alt="" />
										<span id='protocollist_timer'></span><span id="protocollist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<a href="javascript:void(0);" style="float:right">
										<img src="./templates/standard/img/symbols/print.png" alt="" />
									</a>
								</div>
								
								<div id="messagecookie">
								
									<div class="table_head">
										<table id="protocollist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:16%">{#dico_management_protocol_search_colum_patient#}</td>
												<td class="b" style="width:15%">{#dico_management_protocol_search_colum_user#}</td>
												<td class="b" style="width:15%">{#dico_management_protocol_search_colum_addressbook#}</td>
												<td class="b" style="width:15%">{#dico_management_protocol_search_colum_date#}</td>
												<td class="b" style="width:10%">{#dico_management_protocol_search_colum_export#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="protocolBox">
																
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
    			columnSpecs:  [{filterUI:'t',width:250},{filterUI:'t',width:250},{filterUI:'t',width:250},{filterUI:'t',width:200}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('protocollist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}
