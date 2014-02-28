{include file="template_header.tpl" js_jquery132="yes" js_jquery191="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_common="yes" js_rico="yes" js_prevention="yes"}

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
								<!--
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
								-->
								<table width='97%'>
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
									<table id="colr">
									</table>
									<div id="pcolr"></div> 
									</td></tr>
								</table>	
								<div id="gridpager"></div> 
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	<!--
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
	-->
{literal}
	<script type='text/javascript'>
		var id_list = "";
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:'management_prevention.php?action=json_list_traite',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:[
                    	'{/literal}{#dico_management_prevention_colum_patient_familyname#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_patient_firstname#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_patient_address#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_patient_private_phone#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_patient_mobile_phone#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_patient_mail#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_modif_description#}{literal}',
                    	'{/literal}{#dico_management_prevention_colum_modif_date#}{literal}'
                    	],
                    colModel :[ 
                        {
                        	name:'nom',
                        	index:'nom',
                        	width:80,     
                        	hidden:false, 
                        	search:true,   
                        	stype:'text',      
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:'prenom',
                        	index:'prenom',                         
                        	width:80,    
                        	hidden:false, 
                        	search:true, 
                        	stype:'text',        
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        }, 
                        {
                        	name:'address',
                        	index:'address',
                        	width:200,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'telephone',
                        	index:'telephone',
                        	width:80,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'gsm',
                        	index:'gsm',
                        	width:80,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'mail',
                        	index:'mail',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'description',
                        	index:'description',
                        	width:170,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'date_derniere_modification',
                        	index:'date_derniere_modification',
                        	width:70,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },
					], 
                    
                     
                    //reading the data at once
                    gridview: false,
                    //rowNum:50, 
                    //rowList:[10,20,30], 
                    //sortname: 'familyname', 
                    //sortorder: "desc", 
                    pager: 'gridpager',
                    viewrecords: true,
                    multiselect: false, 
                    width: 1000, 
                    height: "300", 
                    caption: "Pr&eacute;vention Trait&eacute;s",
                    shrinkToFit :true,
                    //pager: '#pcolr', 
                    // fit screen size
                    autowidth: true,
                    // add row in the bottom
                    footerrow : false, 
                    //userDataOnFooter : false, 
                    altRows : true,
                    cellEdit: false,
                    //editurl: "admin_people_user.php?action=action_cost_center",
          
                    edit : {
						width:1000,
					},
                    
                    
                  });
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:false,add:false,edit:false,search:true}); 
        	//jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: false,searchOnEnter : false});
        	jQuery("#colr").jqGrid('filterToolbar', { searchOperators: true, stringResult: false, searchOnEnter: false }); 
        	      
		}); 
	
		
	</script>
	{/literal}