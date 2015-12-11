{include file="template_header.tpl" js_jquery191="yes" js_jquery142="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_product="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
         
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

	  				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>
	  				
	  				<a href="./management_product.php?action=flowlist">{#dico_management_product_menu_flow_list#}</a>
	  				
	  				<span>{#dico_management_product_menu_stock_critique#}</span>

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/product.png" alt="" />
										<span id='productlist_timer'></span><span id="productlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<a href="management_product.php?action=pdfstockcritique" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div id="useredit">
					
								
								<table width='97%'>
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
									<table id="colr">
									</table>
									<div id="pcolr"></div> 
									</td></tr>
								</table>
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
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
                    url:'management_product.php?action=jsonStockCritique',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:[
                    
                    	'{/literal}{#dico_management_product_search_colum_name#}{literal}',
                    	'{/literal}{#dico_management_product_sail_price#}{literal}',
                    	'{/literal}{#dico_management_product_stock#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_current_stock#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_commande#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_command_price#}{literal}'
                    	],
                    colModel :[  
                        {	name:'product_name',
                        	index:'product_name',                         
                        	width:80,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },
                        {
                        	name:'price',
                        	index:'price',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'stock_minimum',
                        	index:'stock_minimum',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'current_stock',
                        	index:'current_stock',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'commande',
                        	index:'commande',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'stock_sail_price',
                        	index:'stock_sail_price',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
					], 
                    
                    pager: jQuery('#pcolr'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:50, 
                    rowList:[10,20,30], 
                    sortname: 'product_name', 
                    sortorder: "desc", 
                    viewrecords: true,
                    multiselect: false, 
                    width: 600, 
                    height: "300", 
                    caption: "Stock critique",
                    shrinkToFit :true,
                    // fit screen size
                    autowidth: true,
                    // add row in the bottom
                    footerrow : false, 
                    userDataOnFooter : false, 
                    altRows : true,
                    cellEdit: false,
                    //editurl: "admin_people_user.php?action=action_cost_center",
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

