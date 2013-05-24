{include file="template_header.tpl" js_jquery142="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_project="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<a href="./admin_project.php">{#dico_admin_project_menu_dashboard#}</a>
					<span>{#dico_admin_project_cost_center_menu_list#}</span> 
					<a href="./admin_project.php?action=list_project_task">{#dico_admin_project_project_task_menu_list#}</a>
					<a href="./admin_project.php?action=stat_cc">{#dico_admin_project_project_stat_cc#}</a>
					<a href="./admin_project.php?action=stat_task">{#dico_admin_project_project_stat_task#}</a>

				</div>
			
				<div class="ViewPane">
				
					<input type = "hidden" name = "selectedid" id  = "selectedid"/>

					<div class="infowin_left" id = "systemmsg">
						{if $mode == "deleted"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_admin_people_user_wasdeleted#}</span>
						{elseif $mode == "added"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_admin_people_user_wasadded#}</span>
						{elseif $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_admin_people_user_wasedited#}</span>
				        {elseif $mode == "de-assigned"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_admin_people_user_permissionswereedited#}</span>
				        {/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
	
					<div class="block_a" >
						
						<div class="in">
						
							<div class="headline">
								<h2><a href="javascript:void(0);" id="userhead_toggle" class="win_block" onclick = "toggleBlock('userhead');"><img src="./templates/standard/img/symbols/.png" alt="" />
								<span>{#dico_admin_project_cost_center_administration#}</span></a>
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
						{#dico_admin_people_user_confirme_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="delete"><span>{#dico_admin_people_group_button_delete#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_admin_people_group_button_cancel#}</span></a>
						</div>

					</fieldset>

			</form>

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
                    url:'admin_project.php?action=json_cost_center',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:['Code CC','Nom','Description'],
                    colModel :[ 
                        {
                        	name:'code',
                        	index:'code',
                        	width:30,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'name',
                        	index:'name',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:'description',
                        	index:'description',                         
                        	width:300,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        }, 
					], 
                    
                    pager: jQuery('#pcolr'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:50, 
                    rowList:[10,20,30], 
                    sortname: 'name', 
                    sortorder: "desc", 
                    viewrecords: true,
                    multiselect: false, 
                    width: 600, 
                    height: "300", 
                    caption: "Cost Center",
                    shrinkToFit :true,
                    // fit screen size
                    autowidth: true,
                    // add row in the bottom
                    footerrow : false, 
                    userDataOnFooter : false, 
                    altRows : true,
                    cellEdit: false,
                    editurl: "admin_project.php?action=action_cost_center",
                    
                    edit : {
						width:600,
					},
                    
                    
                  });
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:true,add:true,edit:true,search:false}); 
        	jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
        	      
		}); 
	
		
	</script>
	{/literal}
