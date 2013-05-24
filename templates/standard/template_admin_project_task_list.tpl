{include file="template_header.tpl" js_jquery142="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_project="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<a href="./admin_project.php">{#dico_admin_project_menu_dashboard#}</a>
					<a href="./admin_project.php?action=list_cost_center">{#dico_admin_project_cost_center_menu_list#}</a>
					<span>{#dico_admin_project_project_task_menu_list#}</span> 
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<a href="./admin_project.php?action=stat_costs_cc">{#dico_admin_project_project_stat_cost_cc#}</a>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>
					<a href="./admin_project.php?action=stat_costs_task">{#dico_admin_project_project_stat_cost_task#}</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
						
						<div class="in">
						
							<div class="headline">
								<h2><a href="javascript:void(0);" id="userhead_toggle" class="win_block" onclick = "toggleBlock('userhead');"><img src="./templates/standard/img/symbols/.png" alt="" />
								<span>{#dico_admin_project_task_administration#}</span></a>
								</h2>
							</div>

							<table width='97%'>
								<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
								<table id="colr">
								</table>
								<div id="pcolr"></div> 
								</td></tr>
							</table>
									
							
			
						</div> {*IN end*}
					
					</div> {*Block A end*}

				</div> {*ViewPane*}
					
			</div>

		</div>

	</div>
	
	
	{include file="template_left.tpl" user_search="no"}

	{literal}
	<script type='text/javascript'>
		
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
        	
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:'admin_project.php?action=json_project_task',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:['CC Code', 'CC name', 'Code Tache', 'Nom tache','Description'],
                    colModel :[ 
                        {
                        	name:'cost_center_code',
                        	index:'cost_center.code',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        	edittype:"select",
                        	editoptions:{value:"{/literal}{$cost_centers_string}{literal}"},
                        },
                        {
                        	name:'cost_center_name',
                        	index:'cost_center.name',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },
                        {
                        	name:'project_task_code',
                        	index:'project_task.code',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'project_task_name',
                        	index:'project_task.name',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:'project_task_description',
                        	index:'project_task.description',                         
                        	width:300,    
                        	hidden:false, 
                        	search:false,         
                        	sortable:false, 
                        	resizable:true,
                        	editable:true,
                        	editoptions:{size:30},
                        }, 
					], 
					
					edit:{
						height: 300,
						width: 700,
					},
					
                    
                    pager: jQuery('#pcolr'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:30, 
                    rowList:[10,20,30], 
                    sortname: 'project_task_name', 
                    sortorder: "desc", 
                    viewrecords: true,
                    multiselect: false, 
                    width: 600, 
                    height: "300", 
                    caption: "Taches",
                    shrinkToFit :true,
                    // fit screen size
                    autowidth: true,
                    // add row in the bottom
                    footerrow : false, 
                    userDataOnFooter : false, 
                    altRows : true,
                    cellEdit: false,
                    editurl: "admin_project.php?action=action_project_task",
                  });
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:true,add:true,edit:true,search:false}); 
        	jQuery("#colr").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
			
			
        	      
		}); 
	
		
	</script>
	{/literal}
