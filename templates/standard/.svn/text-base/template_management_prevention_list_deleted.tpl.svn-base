{include file="template_header.tpl" js_jquery132="yes" js_common="yes" js_rico="yes" js_prevention="yes"}

	<div id="print">
	</div>
	

	<div id="middle">
		
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_prevention.php">{#dico_management_prevention_menu_status#}</a>

    				<a href="./management_prevention.php?action=list">{#dico_management_prevention_menu_list#}</a>

					<span>{#dico_management_prevention_menu_list_deleted#}</span> 

    				<a href="./management_prevention.php?action=activation">{#dico_management_prevention_menu_activation#}</a>

    				<a href="./management_prevention.php?action=add">{#dico_management_prevention_menu_add#}</a>

    				<a href="./management_prevention.php?action=timeplot">{#dico_management_prevention_menu_timeplot#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "delete"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_contact_deleted#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/flow.png" alt="" />
										<span id='preventionlistdeleted_timer'></span><span id="preventionlistdeleted_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>
								
								<div id="useredit">
								
									<div class="table_head">
										<table id="preventionlistdeleted" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b">{#dico_management_prevention_colum_patient_familyname#}</td>
												<td class="b">{#dico_management_prevention_colum_patient_firstname#}</td>
												<td class="b">{#dico_management_prevention_colum_patient_address#}</td>
												<td class="b">{#dico_management_prevention_colum_patient_private_phone#}</td>
												<td class="b">{#dico_management_prevention_colum_patient_mobile_phone#}</td>
												<td class="b">{#dico_management_prevention_colum_patient_mail#}</td>
												<td class="b">{#dico_management_prevention_colum_modif_description#}</td>
												<td class="b">{#dico_management_prevention_colum_modif_date#}</td>
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
	
		var id_list = "";
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{filterUI:'t',width:100},{filterUI:'t',width:100},{filterUI:'t',width:300},{width:90},{width:90},{width:50},{filterUI:'t',width:150},{filterUI:'t',width:200}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('preventionlistdeleted', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
	</script>
	{/literal}

