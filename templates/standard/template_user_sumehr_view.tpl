{include file="template_header.tpl" js_jquery191="yes" js_jqgrid="yes" js_jquery_ui_171="yes" js_ajax="yes" js_jqmodal="yes" js_jquery_prettyphoto="no" js_jquery_prettyphoto3="yes" js_sumehr="yes" js_protocol="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./user_sumehr.php?action=search">{#dico_sumehr_menu_search#}</a>
					<span>{#dico_sumehr_menu_view#}</span>
					<a href="./user_sumehr.php?action=module_analyse">{#dico_sumehr_menu_search_analyse#}</a>

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
								<h2>
									{*if $sumehr.0.user_id == $user_id*}
										<a href="javascript:void(0);" class="win_block" id="sumehr_{$sumehr.0.sumehr_report_id}_toggle" onclick = "toggleBlock('sumehr_{$sumehr.0.sumehr_report_id}');">
									{*else}
										<a href="javascript:void(0);" class="win_none" id="sumehr_{$sumehr.0.sumehr_report_id}_toggle" onclick = "toggleBlock('sumehr_{$sumehr.0.sumehr_report_id}');">
									{/if*}
									<img src="./templates/standard/img/symbols/protocol.png" alt="" />
									<span>{#dico_sumehr_submenu_view#} {$sumehr.0.user_firstname} {$sumehr.0.user_familyname} {#dico_sumehr_submenu_view_and#} {$sumehr.0.patient_firstname} {$sumehr.0.patient_familyname}</span>
									</a>
								</h2>
							</div>
							
							{*if $sumehr.0.user_id == $user_id*}
								<div class="block" id="sumehr_{$sumehr.0.sumehr_report_id}" style="">
							{*else}
								<div class="block" id="sumehr_{$sumehr.0.sumehr_report_id}" style="display: none;">
							{/if*}
							
								<div id="tab_content_{$sumehr.0.sumehr_report_id}">
									<ul>
										<li>
											<a href="#fragment_{$sumehr.0.sumehr_report_id}"><span>{#dico_sumehr_management_subtab_general#}</span></a>
										</li>
									</ul>

									<div id="fragment_{$sumehr.0.sumehr_report_id}" class="block_in_wrapper">
									
										{foreach key=key item=item from=$sumehr}
											<div class = "protocol" style = "">
			
												<div class="block_in_wrapper">
			
													<h3>{$item.datetime}
													{foreach item=permission from=$item.permissions}
														{$permission.name}
													{/foreach}
													</h3>
													
													{$item.sumehr_report_text_short}
													
													<ul>
													{foreach item=file from=$item.files}
														<li><img alt='' src='./templates/standard/images/butn-{$file.extension}-hover.png'/> <a target='_blank' href='user_sumehr.php?action=download_file&key={$file.key}&patient_id={$item.patient_id}&user_id={$item.user_id}'>{$file.name} ({$file.size}Ko)</a></li>
													{/foreach}
													</ul>
													
													<br/>

													{if $item.datetime != ""}
														<a href="#" class="butn_link" onclick="javascript:loadtabFromUser({$sumehr.0.patient_id},{$sumehr.0.user_id},'{$item.sumehr_report_id}','{$sumehr.0.sumehr_report_id}','{$item.datetime}');return false;"><span>{#dico_button_view#}</span></a>
														{if $sumehr.0.user_id == $user_id}
														<a href="user_sumehr.php?action=edit&patient_id={$item.patient_id}&report_id={$item.sumehr_report_id}" class="butn_link"><span>{#dico_button_edit#}</span></a>
														{/if}
														<br/>
													{/if}
													
												</div> {*block_in_wrapper end*}
			
											</div>	
									  	{/foreach}
											
										<div class="clear_both"></div> {*required ... do not delete this row*}
			
										{*if $sumehr.0.user_id == $user_id*}
										<a href="user_sumehr.php?action=edit&patient_id={$sumehr.0.patient_id}" class="butn_link"><span>{#dico_button_add_report#}</span></a>
										{*/if*}
										
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
								<!--	
									<table id="sumehrlist" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td class="b" style="width:15%">#</td>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_user#}</td>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_doctor#}</td>
											<td class="b" style="width:15%">{#dico_sumehr_search_colum_protocol_date#}</td>
											<td class="b" style="width:10%">{#dico_sumehr_search_colum_export#}</td>
										</tr>
									</table>
								-->	
								
								<table width='97%'>
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
									<table id="colr">
									</table>
									<div id="pcolr" class="scroll"></div> 
									</td></tr>
								</table>	
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
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
		
			{/literal}
    		{foreach name=outer item=sumehr from=$sumehrs}
    		{literal}
    		jQuery("#tab_content_{/literal}{$sumehr.0.sumehr_report_id}{literal}").tabs();
			{/literal}
			{/foreach}
			{literal}
			
			jQuery("#confirmbox").jqm({});
		});
		/*
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		
		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     
    			columnSpecs:  [{width:50},{filterUI:'t',width:200},{filterUI:'t',width:200},{filterUI:'t',width:130},{width:130}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('sumehrlist', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		 */
		 
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:'user_sumehr.php?action=json_view&patient_id='+{/literal}{$patient_id}{literal},
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:[
                    	'{/literal}#{literal}',
                    	'{/literal}{#dico_sumehr_search_colum_user#}{literal}',
                    	'{/literal}{#dico_sumehr_search_colum_doctor#}{literal}',
                    	'{/literal}{#dico_sumehr_search_colum_protocol_date#}{literal}',
                    	'{/literal}{#dico_sumehr_search_colum_export#}{literal}'
                    	],
                    colModel :[ 
                        {
                        	name:'id',
                        	index:'id',
                        	width:10,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:'user',
                        	index:'user',                         
                        	width:100,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        }, 
                        {
                        	name:'doctor',
                        	index:'doctor',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'protocole_date',
                        	index:'protocole_date',
                        	width:80,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'export',
                        	index:'export',
                        	width:80,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
					], 
                    
                    rowNum:12000, 
                    rowList:[200,400,600],
                    viewrecords: true,
                    multiselect: false, 
                    width: "1000", 
                    height: "300", 
                    caption: "Protocoles",
                    shrinkToFit :true,
                    // fit screen size
                    autowidth: true,
                    // add row in the bottom
                    footerrow : false, 
                    userDataOnFooter : true, 
                    altRows : true,
                    cellEdit: false,
                    repeatitems:false,
                    pager:'#pcolr',
                    
                    edit : {
						width:1000,
					},
                    
                    
                  });
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:false,add:false,edit:false,search:true});	
        }); 		 
		 
	</script>
	{/literal}

		
