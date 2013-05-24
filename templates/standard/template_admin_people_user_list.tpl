{include file="template_header.tpl" js_jquery142="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_user="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./admin_people_user.php?action=view">{#dico_admin_people_user_menu_view#}</a>

					<span>{#dico_admin_people_user_menu_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='userlist_timer'></span><span id="userlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<a href="javascript:void(0);" style="float:right">
										<img src="./templates/standard/img/symbols/print.png" alt="" />
									</a>
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
					

				</div>
					
			</div>

		</div>

	</div>
	
	{literal}
	<script type='text/javascript'>
		
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
        	
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:'admin_people_user.php?action=json_user',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:[
                    	'{/literal}{#dico_admin_people_user_colum_action#}{literal}',
                    	'{/literal}{#dico_admin_people_user_name#}{literal}',
                    	'{/literal}{#dico_admin_people_user_firstname#}{literal}',
                    	'{/literal}{#dico_admin_people_user_familyname#}{literal}',
                    	'{/literal}{#dico_admin_people_user_address1#}{literal}',
                    	'{/literal}{#dico_admin_people_user_email#}{literal}',
                    	'{/literal}{#dico_admin_people_user_permission#}{literal}',
                    	'{/literal}{#dico_admin_people_user_type#}{literal}',
                    	'{/literal}{#dico_admin_people_user_specialite#}{literal}',
                    	'{/literal}{#dico_admin_people_user_inami#}{literal}'
                    	],
                    colModel :[ 
                        {
                        	name:'ID',
                        	index:'ID',
                        	width:30,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:'name',
                        	index:'name',                         
                        	width:80,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        }, 
                        {
                        	name:'firstname',
                        	index:'firstname',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'familyname',
                        	index:'familyname',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'address1',
                        	index:'address1',
                        	width:300,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'email',
                        	index:'email',
                        	width:100,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'admin',
                        	index:'admin',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'type',
                        	index:'type',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'speciality',
                        	index:'speciality',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'inami',
                        	index:'inami',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
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
                    editurl: "admin_people_user.php?action=action_cost_center",
                    edit : {
						width:600,
					},
                    
                    
                  });
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:false,add:false,edit:false,search:false});
        	
        	jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false}); 
        	
        	jQuery("#colr").jqGrid('filterToolbar'); 
        	      
		}); 
	
		
	</script>
	{/literal}

