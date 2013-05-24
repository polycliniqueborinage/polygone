{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_rico="yes" js_addressbook="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./admin_mailing.php?action=day">{#dico_admin_mailing_day#}</a>

					<span>{#dico_admin_mailing_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div id="messagecookie">
								
									<span id='activitylist_timer' class='ricoSessionTimer'></span><span id="mailinglist_bookmark">&nbsp;</span>
								
									<div class="table_head">
										<table id="mailinglist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b">{#dico_admin_mailing_search_colum_rubric#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_user_name#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_user_email#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_subject#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_content#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_date#}</td>
												<td class="b">{#dico_admin_mailing_search_colum_mailsend#}</td>
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
    			columnSpecs:  [{filterUI:'t',width:100},{filterUI:'t',width:100},{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:200}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('mailinglist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

