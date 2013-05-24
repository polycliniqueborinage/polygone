{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_rico="yes" js_addressbook="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
    				<a href="./user_agenda.php">{#dico_user_agenda_menu_day#}</a>
    				<a href="./user_agenda.php?action=week">{#dico_user_agenda_menu_week#}</a>
	  				<a href="./user_agenda.php?action=list">{#dico_user_agenda_menu_list#}</a>
					<span>{#dico_user_agenda_menu_fulllist#}</span>
	  				<a href="./user_agenda.php?action=timeline">{#dico_user_agenda_menu_timeline#}</a>
	  				<a href="./user_agenda.php?action=schedule">{#dico_user_agenda_menu_schedule#}</a>
	  				<a href="./user_agenda.php?action=task_add">{#dico_user_agenda_menu_task_add#}</a>
				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div id="messagecookie">
								
									<span id='activitylist_timer' class='ricoSessionTimer'></span><span id="listing_user_agenda_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="listing_user_agenda" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" >{#dico_user_agenda_addbox_patient#}</td>
												<td class="b" >{#dico_user_agenda_addbox_start#}</td>
												<td class="b" >{#dico_user_agenda_addbox_end#}</td>
												<td class="b" >{#dico_user_agenda_addbox_date#}</td>
												<td class="b" >{#dico_user_agenda_addbox_motif#}</td>
												<td class="b" >{#dico_user_agenda_addbox_location#}</td>
												<td class="b" >{#dico_user_agenda_addbox_comment#}</td>
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
    			columnSpecs:  [{filterUI:'t',width:200},{width:80},{width:80},{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:200}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('listing_user_agenda', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

