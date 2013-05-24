<?php /* Smarty version 2.6.19, created on 2012-10-05 12:48:47
         compiled from template_admin_project_task_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery142' => 'yes','js_jquery_ui_171' => 'yes','js_jqgrid' => 'yes','js_project' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_admin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<a href="./admin_project.php"><?php echo $this->_config[0]['vars']['dico_admin_project_menu_dashboard']; ?>
</a>
					<a href="./admin_project.php?action=list_cost_center"><?php echo $this->_config[0]['vars']['dico_admin_project_cost_center_menu_list']; ?>
</a>
					<span><?php echo $this->_config[0]['vars']['dico_admin_project_project_task_menu_list']; ?>
</span> 
					<a href="./admin_project.php?action=stat_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_cc"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_cc']; ?>
</a>
					<a href="./admin_project.php?action=stat_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_task']; ?>
</a>
					<a href="./admin_project.php?action=stat_costs_task"><?php echo $this->_config[0]['vars']['dico_admin_project_project_stat_cost_task']; ?>
</a>

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
						
						<div class="in">
						
							<div class="headline">
								<h2><a href="javascript:void(0);" id="userhead_toggle" class="win_block" onclick = "toggleBlock('userhead');"><img src="./templates/standard/img/symbols/.png" alt="" />
								<span><?php echo $this->_config[0]['vars']['dico_admin_project_task_administration']; ?>
</span></a>
								</h2>
							</div>

							<table width='97%'>
								<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
								<table id="colr">
								</table>
								<div id="pcolr"></div> 
								</td></tr>
							</table>
									
							
			
						</div> 					
					</div> 
				</div> 					
			</div>

		</div>

	</div>
	
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array('user_search' => 'no')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php echo '
	<script type=\'text/javascript\'>
		
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
        	
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:\'admin_project.php?action=json_project_task\',
                    datatype: \'json\', 
                    mtype: \'POST\',
                    colNames:[\'CC Code\', \'CC name\', \'Code Tache\', \'Nom tache\',\'Description\'],
                    colModel :[ 
                        {
                        	name:\'cost_center_code\',
                        	index:\'cost_center.code\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        	edittype:"select",
                        	editoptions:{value:"'; ?>
<?php echo $this->_tpl_vars['cost_centers_string']; ?>
<?php echo '"},
                        },
                        {
                        	name:\'cost_center_name\',
                        	index:\'cost_center.name\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },
                        {
                        	name:\'project_task_code\',
                        	index:\'project_task.code\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'project_task_name\',
                        	index:\'project_task.name\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:\'project_task_description\',
                        	index:\'project_task.description\',                         
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
					
                    
                    pager: jQuery(\'#pcolr\'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:30, 
                    rowList:[10,20,30], 
                    sortname: \'project_task_name\', 
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
        
        	jQuery("#colr").jqGrid(\'navGrid\',\'#pcolr\',{del:true,add:true,edit:true,search:false}); 
        	jQuery("#colr").jqGrid(\'filterToolbar\',{stringResult: true,searchOnEnter : false}); 
			
			
        	      
		}); 
	
		
	</script>
	'; ?>
