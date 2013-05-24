<?php /* Smarty version 2.6.19, created on 2012-09-26 10:57:18
         compiled from template_admin_people_user_list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery142' => 'yes','js_jquery_ui_171' => 'yes','js_jqgrid' => 'yes','js_user' => 'yes')));
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
						
	  				<a href="./admin_people_user.php?action=view"><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_view']; ?>
</a>

					<span><?php echo $this->_config[0]['vars']['dico_admin_people_user_menu_list']; ?>
</span> 

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
								
			        		    
							</div> 						</div> 					

				</div>
					
			</div>

		</div>

	</div>
	
	<?php echo '
	<script type=\'text/javascript\'>
		
		jQuery(document).ready(function(){
            
        	jQuery("#colr").jqGrid({
        	
                    // display all
                    scroll: 1,
                    //Column Reordering
                    sortable: true,
                    url:\'admin_people_user.php?action=json_user\',
                    datatype: \'json\', 
                    mtype: \'POST\',
                    colNames:[
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_colum_action']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_name']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_firstname']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_familyname']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_address1']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_email']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_permission']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_type']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_specialite']; ?>
<?php echo '\',
                    	\''; ?>
<?php echo $this->_config[0]['vars']['dico_admin_people_user_inami']; ?>
<?php echo '\'
                    	],
                    colModel :[ 
                        {
                        	name:\'ID\',
                        	index:\'ID\',
                        	width:30,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {	name:\'name\',
                        	index:\'name\',                         
                        	width:80,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        }, 
                        {
                        	name:\'firstname\',
                        	index:\'firstname\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'familyname\',
                        	index:\'familyname\',
                        	width:100,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'address1\',
                        	index:\'address1\',
                        	width:300,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'email\',
                        	index:\'email\',
                        	width:100,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'admin\',
                        	index:\'admin\',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'type\',
                        	index:\'type\',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'speciality\',
                        	index:\'speciality\',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:\'inami\',
                        	index:\'inami\',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
					], 
                    
                    pager: jQuery(\'#pcolr\'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:50, 
                    rowList:[10,20,30], 
                    sortname: \'name\', 
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
        
        	jQuery("#colr").jqGrid(\'navGrid\',\'#pcolr\',{del:false,add:false,edit:false,search:false});
        	
        	jQuery("#toolbar").jqGrid(\'filterToolbar\',{stringResult: true,searchOnEnter : false}); 
        	
        	jQuery("#colr").jqGrid(\'filterToolbar\'); 
        	      
		}); 
	
		
	</script>
	'; ?>

