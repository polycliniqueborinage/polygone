{include file="template_header.tpl" js_daterangepicker="yes" js_jquery191="yes" js_jquery142="yes" js_jquery_ui_171="yes" js_jqgrid="yes" js_product="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
    				<a href="./management_product.php?action=manuel_flow">{#dico_management_product_menu_manuel_flow#}</a>

	  				<a href="./management_product.php?action=search">{#dico_management_product_menu_search#}</a>

    				<a href="./management_product.php?action=add">{#dico_management_product_menu_add#}</a>

	  				<a href="./management_product.php?action=list">{#dico_management_product_menu_list#}</a>

					<span>{#dico_management_product_menu_flow_list#}</span> 

					<a href="./management_product.php?action=stock_critique">{#dico_management_product_menu_stock_critique#}</a>

    				<a href="./management_product.php?action=automatic_flow">{#dico_management_product_menu_automatic_flow#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
							
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/product.png" alt="" />
										<span id='productflowlist_timer'></span><span id="productflowlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									
									
									<a target='_new' href="management_product.php?action=pdf" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
									</a>
								</div>
								
								<div class="block_in_wrapper">

									<form id="form" class="main" method="post" action="./management_product.php?action=flowlist">
									
										<fieldset>
									
										<div>
		
											<label>{#dico_management_product_report_begda#}:</label>
											<input type = "text" value = "{$begda}" name = "begda" id="begda" class="text" realname="{#dico_management_product_report_begda#}" onkeyup="javascript:valuebegda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											<label>{#dico_management_product_report_endda#}:</label>
											<input type = "text" value = "{$endda}" name = "endda" id="endda" class="text" realname="{#dico_management_product_report_endda#}" onkeyup="javascript:valueendda = checkDate(this, '', '');" onfocus="javascript:this.select()" autocomplete="off"/>
											
											<!--<input type="submit" name="validate" id="valideate" value="{#dico_management_product_report_submit#}" onfocus="javascript:this.select()" autocomplete="off"/>-->
										</div>
											
										</fieldset>
								
									</form>
								
								</div>
								
								<div id="messagecookie">
								
					
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
                    url:'management_product.php?action=json_flow_list',
                    datatype: 'json', 
                    mtype: 'POST',
                    colNames:[
                    
                    	'{/literal}{#dico_management_product_search_colum_date#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_name#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_unit#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_size#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_es#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_sail_price#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_consumer_name#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_lot_number#}{literal}',
                    	'{/literal}{#dico_management_product_search_colum_comment#}{literal}'
                    	],
                    colModel :[ 
                        {
                        	name:'flowdate',
                        	index:'flowdate',
                        	width:40,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {	name:'name',
                        	index:'name',                         
                        	width:80,    
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        }, 
                        {
                        	name:'unit',
                        	index:'unit',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'size',
                        	index:'size',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'quantity',
                        	index:'quantity',
                        	width:50,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'sail_price',
                        	index:'sail_price',
                        	width:50,     
                        	hidden:false, 
                        	search:false,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'consumer_name',
                        	index:'consumer_name',
                        	width:50,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:false,
                        },  
                        {
                        	name:'lot_number',
                        	index:'lot_number',
                        	width:50,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:true, 
                        	resizable:true,
                        	editable:true,
                        },  
                        {
                        	name:'flowcomment',
                        	index:'flowcomment',
                        	width:50,     
                        	hidden:false, 
                        	search:true,         
                        	sortable:false, 
                        	resizable:true,
                        	editable:false,
                        },  
					], 
                    
                    pager: jQuery('#pcolr'), 
                    //reading the data at once
                    gridview: false,
                    rowNum:50, 
                    rowList:[10,20,30], 
                    sortname: 'flowdate', 
                    sortorder: "desc", 
                    viewrecords: true,
                    multiselect: false, 
                    width: 600, 
                    height: "300", 
                    caption: "Liste des transactions",
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
        
        	jQuery("#colr").jqGrid('navGrid','#pcolr',{del:false,add:false,edit:false,search:true});
        	
        	jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : true}); 
        	
        	jQuery("#colr").jqGrid('filterToolbar'); 
        	      
		}); 	
		
	
		jQuery(document).ready(function(){
    	   	jQuery('input.text').daterangepicker({
    	   		presetRanges: [
					{text: 'Aujourd\'hui', dateStart: 'today', dateEnd: 'today' },
					{text: 'Hier', dateStart: 'yesterday', dateEnd: 'yesterday' },
					{text: '1ere Quinzaine', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setDate(15); return x; } },
					{text: '2ere Quinzaine', dateStart: function(){ var x= Date.parse('today'); x.setDate(16); return x; }, dateEnd: function(){ return Date.parse('today').moveToLastDayOfMonth(); } },
					{text: 'Mois', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); return x; }, dateEnd: function(){ return Date.parse('today').moveToLastDayOfMonth(); } },
					{text: '1ere Quinzaine Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.setDate(15); return x; } },
					{text: '2ere Quinzaine Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(16); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x; } },
					{text: 'Mois Pr&eacute;c&eacute;dent', dateStart: function(){ var x= Date.parse('today'); x.setDate(1); x.setMonth(x.getMonth()-1); return x; }, dateEnd: function(){ var x= Date.parse('today'); x.setMonth(x.getMonth()-1); x.moveToLastDayOfMonth(); return x;  } }
				], 
    	   		dateFormat: 'yy-mm-dd', 
    	   		posX: 70, 
    	   		posY: 275,
				onClose: function(){
					document.forms.form.submit();
				}    	   		
    	   	}); 
	     });		
		
	</script>
	{/literal}

