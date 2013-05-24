{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jqmodal="yes" js_rico="yes" js_ouvrier="yes"}

	<div id="middle">
		
		{if $modules.management_ouvrier_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_ouvrier_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_ouvrier.php">{#dico_ouvrier_menu_search#}</a>
						
    				<a href="./management_ouvrier.php?action=add">{#dico_ouvrier_menu_add#}</a>

					<span>{#dico_ouvrier_menu_list#}</span> 

				</div>
				
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='ouvrierlist_timer'></span><span id="ouvrierlist_bookmark">&nbsp;</span>
										</a>
									</h2>
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="ouvrierlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:10%">{#dico_ouvrier_search_colum_action#}</td>
												<td class="b" style="width:18%">{#dico_ouvrier_search_colum_familyname#}</td>
												<td class="b" style="width:18%">{#dico_ouvrier_search_colum_firstname#}</td>
												<td class="b" style="width:18%">{#dico_ouvrier_search_colum_salaire_horaire#}</td>
												<td class="b" style="width:18%">{#dico_ouvrier_search_colum_bonus_recurrent#}</td>
												<td class="b" style="width:18%">{#dico_ouvrier_search_colum_cout_recurrent#}</td>
											</tr>
										</table>
									</div>
									
									<div class="table_body">
									
										<div id="patientBox">
																
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

	<div class="jqmWindow" id="viewbox">
	
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
    			columnSpecs:  [{width:50},{filterUI:'t',width:200},{filterUI:'t',width:200}, {width:110},{width:110},{width:110}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('ouvrierlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
	</script>
	{/literal}
