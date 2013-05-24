{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_jqmodal="yes" js_jquery_prettyphoto="no" js_jquery_prettyphoto3="yes" js_rico="yes" js_sumehr="yes" js_protocol="yes"}

	<div id="middle">
    	
		{if $modules.management_sumehr_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_sumehr_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_sumehr.php?action=search">{#dico_sumehr_menu_search#}</a>
					<span>{#dico_sumehr_menu_view#}</span> 
					<a href="./management_sumehr.php?action=module_analyse">{#dico_sumehr_menu_search_analyse#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_systemmsg_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_systemmsg_edited#}</span>
						{/if}
					</div>
					
					{foreach name=outer item=sumehr from=$sumehrs}
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								<h2><a href="javascript:void(0);" id="protocol_toggle" class="win_block" onclick = "toggleBlock('protocol');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<span>{#dico_sumehr_submenu_view#} {$sumehr.0.user_firstname} {$sumehr.0.user_familyname} {#dico_sumehr_submenu_view_and#} {$sumehr.0.patient_firstname} {$sumehr.0.patient_familyname}</span></a>
								</h2>
							</div>
							
							<div id = "" style = "">
							
								<div id="tab_content">
									<ul>
										<li>
											<a href="#fragment-1"><span>{#dico_sumehr_management_subtab_general#}</span></a>
										</li>
									</ul>

									<div id="fragment-1" class="block_in_wrapper">
									
										{foreach key=key item=item from=$sumehr}
											<div class = "protocol" style = "">
			
												<div class="block_in_wrapper">
			
													<h3>{$item.datetime}
													{foreach item=permission from=$item.permissions}
														{$permission.name}
													{/foreach}
													</h3>
													
													{$item.sumehr_report_text_short}
													
													{foreach item=file from=$item.files}
														<li><img alt='' src='./templates/standard/images/butn-{$file.extension}-hover.png'/> <a target='_blank' href='management_sumehr.php?action=download_file&key={$file.key}&patient_id={$item.patient_id}&user_id={$item.user_id}'>{$file.name} ({$file.size}Ko)</a></li>
													{/foreach}
													
													<br/>

													{if $item.datetime != ""}
														<a href="#" class="butn_link" onclick="javascript:loadtabFromManagement({$sumehr.0.patient_id},{$sumehr.0.user_id},'{$item.sumehr_report_id}','{$item.datetime}');return false;"><span>{#dico_button_view#}</span></a>
														
														<a href="management_sumehr.php?action=edit&patient_id={$item.patient_id}&user_id={$item.user_id}&report_id={$item.sumehr_report_id}" class="butn_link"><span>{#dico_button_edit#}</span></a>
	
														<a onclick="javascript:deleteConfirmBox({$item.sumehr_report_id})" class="butn_link"><span>{#dico_button_delete#}</span></a>
														<br/>
													{/if}
													
													
												</div> {*block_in_wrapper end*}
			
											</div>	
									  	{/foreach}
											
										<div class="clear_both"></div> {*required ... do not delete this row*}
			
										<a href="management_sumehr.php?action=edit&patient_id={$sumehr.0.patient_id}&user_id={$sumehr.0.user_id}" class="butn_link"><span>{#dico_button_add_report#}</span></a>
									
									</div>
									
								</div>

							</div>
							
					
						</div> {*IN end*}
					
					</div> {*Block A end*}				
					{/foreach}

					<div class="block_b">
						
						<div class="in">
								
							<div class="headline">
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/protocol.png" alt="" />
										<span id='sumehrlist_timer'></span><span id="sumehrlist_bookmark">&nbsp;</span>
									</a>
								</h2>
								<a href="javascript:void(0);" style="float:right">
									<img src="./templates/standard/img/symbols/print.png" alt="" />
								</a>
							</div>
								
							<div id="messagecookie">
								
								<div class="table_head">
									
									<table id="sumehrlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_user#}</td>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_doctor#}</td>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_protocol_date#}</td>
											<td class="b" style="width:10%">{#dico_sumehr_search_colum_export#}</td>
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
					
					</div> {*Block B end*}
				
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl"}
	
	<div class="jqmWindow" id="confirmbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
  		
		</div>
			  
		<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="detail" style="display:inline">
						{#dico_sumehr_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteSumehrReport()" class="butn_link" id="delete"><span>{#dico_button_delete#}</span></a>
							<a href="#" onclick="javascript:jQuery('#confirmbox').jqmHide();return false;" class="butn_link" id="cancel"><span>{#dico_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	
	{literal}
	<script type='text/javascript'>
	
		jQuery(document).ready(function(){
    		jQuery("#tab_content").tabs({
				add: function(event, ui) {
	        		jQuery("#tab_content").tabs('select', '#' + ui.panel.id);
	    		}
			});
			jQuery("#confirmbox").jqm({});
		});
		
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:130},{width:130}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('sumehrlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});

		 
	</script>
	{/literal}
		