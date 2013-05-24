{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_progressbar="yes" js_jqmodal="yes" js_prevention="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./management_prevention.php">{#dico_management_prevention_menu_status#}</a>

    				<a href="./management_prevention.php?action=list">{#dico_management_prevention_menu_list#}</a>

    				<a href="./management_prevention.php?action=list_deleted">{#dico_management_prevention_menu_list_deleted#}</a>

					<span>{#dico_management_prevention_menu_activation#}</span> 

    				<a href="./management_prevention.php?action=add">{#dico_management_prevention_menu_add#}</a>

    				<a href="./management_prevention.php?action=timeplot">{#dico_management_prevention_menu_timeplot#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "error1"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_error1#}</span>
						{/if}
						{if $mode == "error2"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_error2#}</span>
						{/if}
						{if $mode == "delete"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_motif_deleted#}</span>
						{/if}
						{if $mode == "added"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_motif_added#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_prevention_motif_edited#}</span>
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

								<a href="#" id="activation_toggle" class="win_block" onclick = "toggleBlock('activation');"></a>
									
								<div class="clear_both"></div> {*required ... do not delete this row*}
									
								<div style="position:relative;">
									
										<div class="win_tools">
											<h2>
												<img src="./templates/standard/img/symbols/detail.png" alt="" />
												<span>{#dico_management_prevention_submenu_activation#}</span>
											</h2>
										</div>
									</div>
																   
							   	</div>

								<div class="projects">

									<div class="block" id="activation">

										<div class="nosmooth" id="sm_myprojects">
				
											<table cellpadding="0" cellspacing="0" border="0">

												<thead>
					
													<tr>
						
														<th class="tools"></th>
														<th></th>
														<th></th>
														<th></th>
														<th class="a"></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
												
													</tr>
							
												</thead>

												<tfoot>
												<tr>
												<td colspan="5"></td>
												</tr>
												</tfoot>
					
												{section name=motif loop=$motifs}

												{*Color-Mix*}
												{if $smarty.section.motif.index % 2 == 0}
												<tbody class="color-a" id="task_{$tasks[task].ID}">
												{else}
												<tbody class="color-b" id="task_{$tasks[task].ID}">
												{/if}
											
												<tr>
												<td class="tools">
													<a class="tool_view" href="#" onclick="javascript:view_motif_box({$motifs[motif].ID})" title="{#dico_management_prevention_detail#}" ></a>
													<a class="tool_edit" href="management_prevention.php?action=edit&id={$motifs[motif].ID}" title="{#dico_management_prevention_edit#}" ></a>
													<a class="tool_del" href="#" onclick="javascript:delete_motif_confirmbox({$motifs[motif].ID})" title="{#dico_management_prevention_delete#}" ></a>
												</td>
												<td>
												{$motifs[motif].description}
												</td>
												<td><a class="tool_print" href="#" onclick="javascript:print_courriel_test({$motifs[motif].ID})" title="{#dico_management_prevention_print_test#}" /></td>
                    				        	{if $motifs[motif].lasteddate!=$today}
												<td><a class="tool_laught" href="#" onclick="javascript:start_motif_batch({$motifs[motif].ID},{$motifs[motif].time_avg})" title="{#dico_management_prevention_batch#} {$motifs[motif].lasteddate}" /></td>
												{elseif $motifs[motif].lasteddate==$today}
												<td><a class="tool_laught_lock" href="javascript:void(0);" title="{#dico_management_prevention_batch#} {$motifs[motif].lasteddate}" /></td>
												{/if}
												<td><span class="progressBar" id="spaceused{$motifs[motif].ID}">0%</span></td>
                    				        	<td><span id="first_insertion{$motifs[motif].ID}">{$motifs[motif].first_insertion}</span> {#dico_management_prevention_first_insertion#}</td>
												<td><span id="to_call_back{$motifs[motif].ID}">{$motifs[motif].to_call_back}</span> {#dico_management_prevention_to_call_back#}</td>
												<td><span id="init_contact{$motifs[motif].ID}">{$motifs[motif].init_contact}</span> {#dico_management_prevention_init_contact#}</td>
												<td><span id="still_exist{$motifs[motif].ID}">{$motifs[motif].still_exist}</span> {#dico_management_prevention_still_exist#}</td>
												<td><span id="deleted{$motifs[motif].ID}">{$motifs[motif].deleted}</span> {#dico_management_prevention_deleted#}</td>
											</tr>

											
											</tbody>
											{/section}
	
											</table>

									</div>
										
								</div>
								
							</div>
								
						</div>
					
					</div>
					
				</div>
					
			</div>

		</div>

	</div>
	
	
	<div class="jqmWindow" id="viewbox">
	
	</div>
	
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
						{#dico_management_prevention_confirme_delete_motif#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:delete_motif();" class="butn_link" id="delete"><span>{#dico_management_prevention_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_management_prevention_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	{include file="template_left.tpl"}
	
	{literal}
	<script type="text/javascript">
	
		var progress_key = '';

		$(document).ready(function() {
		
			$('#confirmbox').jqm({ });
	
			$('#viewbox').jqm({ });

			$(".progressBar").progressBar({ barImage: './templates/standard/img/progressbar/progressbg_orange.gif', showText: false} );
		
		});
		
	</script>
	{/literal}