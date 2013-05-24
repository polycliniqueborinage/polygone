{include file="template_header.tpl" js_rico="yes" js_addressbook="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./management_addressbook.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_addressbook.php?action=add">{#dico_management_patient_menu_add#}</a>

					<span>{#dico_management_addressbook_menu_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/addressbook.png" alt="" />
										<span id='addressbooklist_timer'></span><span id="addressbooklist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>
								
								<div id="messagecookie">
								
									<div class="table_head">
										<table id="addressbooklist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:9%">{#dico_management_addressbook_search_colum_action#}</td>
												<td class="b" style="width:7%">{#dico_management_addressbook_search_colum_type#}</td>
												<td class="b" style="width:5%">{#dico_management_addressbook_search_colum_code#}</td>
												<td class="b" style="width:21%">{#dico_management_addressbook_search_colum_compagny#}</td>
												<td class="b" style="width:13%">{#dico_management_addressbook_search_colum_familyname#}</td>
												<td class="b" style="width:13%">{#dico_management_addressbook_search_colum_firstname#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_workphone#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_mobilephone#}</td>
												<td class="b" style="width:10%">{#dico_management_addressbook_search_colum_privatephone#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="addressbookBox">
																
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
    			columnSpecs:  [{width:50},{filterUI:'t',width:80}, {filterUI:'t',width:80}, {filterUI:'t',width:150}, {filterUI:'t',width:150},{filterUI:'t',width:135},{filterUI:'t',width:135},{filterUI:'t',width:135},{filterUI:'t',width:135}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('addressbooklist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

