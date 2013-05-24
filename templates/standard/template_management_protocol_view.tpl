{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_protocol="yes"}

	<div id="middle">
    	
		{if $modules.management_protocol_adminstate == 3}
		{include file="template_primary_tabs_management_current.tpl"} 
		{/if}
		{if $modules.management_protocol_adminstate == 4}
		{include file="template_primary_tabs_management_no_current.tpl"} 
		{/if}
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_protocol.php?action=search">{#dico_management_protocol_menu_search#}</a>

    				<a href="./management_protocol.php?action=add">{#dico_management_protocol_menu_add#}</a>

	  				<a href="./management_protocol.php?action=list">{#dico_management_protocol_menu_list#}</a>
						
					<span>{#dico_management_protocol_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_management_protocol_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/protocol.png" alt=""/>{#dico_management_protocol_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="protocol_toggle" class="win_block" onclick = "toggleBlock('protocol');"><img src="./templates/standard/img/symbols/protocol.png" alt="" />
								<span>{#dico_management_protocol_submenu_view#}</span></a>
								</h2>
						
							</div>

							<div id = "protocol" style = "">

								<div class="block_in_wrapper">

									<div style="float:left;width:80%;">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											{$protocol}
											
											{if protocol_files}
											<b>Fichiers attach&eacute;s</b>
											<br/>
											{/if}
											
											{section name=protocol_file loop=$protocol_files}
	
												<a target='_blank' title='{$protocol_files[protocol_file].name}' href='management_protocol.php?action=download_file&id={$protocol_files[protocol_file].ID}&key={$protocol_files[protocol_file].key}' class='tool_{$protocol_files[protocol_file].extension}'>{$protocol_files[protocol_file].name}</a>
												<br/>
											
											{/section}
									
											<tr><td class="label"></td><td>
												<a href="management_protocol.php?action=edit&id={$id}" class="butn_link"><span>{#dico_management_protocol_button_edit#}</span></a>
											</td></tr>

										</table>
									
									</div>

									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
								</div> {*block_in_wrapper end*}

							</div>{*userprotocole end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" medecin_search="yes"}
	
	
	
	