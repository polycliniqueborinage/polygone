{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes"  js_jquery_ui_171="yes" js_jqgrid="yes" js_sumehr="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
	  				<a href="./user_sumehr.php">{#dico_user_sumehr_menu_search#}</a>
					<span>{#dico_user_sumehr_menu_list#}</span> 

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/protocol.png" alt="" />
										<span id='protocollist_timer'></span><span id="sumehrlist_bookmark">&nbsp;</span>
										</a>
									</h2>
									<a href="javascript:void(0);" style="float:right">
										<img src="./templates/standard/img/symbols/print.png" alt="" />
									</a>
								</div>
								
								<div id="messagecookie">
									
									<table id="colr"></table>
									<div id="pcolr"></div> 
									
									Invoice Detail
									<table id="colr2"></table>
									<div id="pcolr2"></div>
									
									<div class="clear_both"></div>
									
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
				url:'user_sumehr.php?action=grid', 
				datatype: 'json', 
				mtype: 'POST', 
				colNames:['Link','Patient','Date de Naissance','ID',], 
				colModel :[  
					{name:'patient_link', index:'date_naissance', width:40, hidden:false, search:false, sortable:false},  
					{name:'patient', index:'nom', width:200, search:true, resizable:true},  
					{name:'patient_date_naissance', index:'date_naissance', width:100, hidden:false, resizable:true, formatter:'date', formatoptions:{srcformat:"Y-m-d",newformat:"d-M-Y"}},  
					{name:'patient_id', index:'patient_id', width:100, hidden:false, resizable:false, formatter:'number'},  
				], 
				pager: jQuery('#pcolr'), 
				//reading the data at once
				gridview: false,
    			rowNum:10, 
    			rowList:[10,20,30], 
    			sortname: 'nom', 
    			sortorder: "asc", 
    			viewrecords: true,
    			//multiselect: false, 
    			width: 1000, 
    			height: "150", 
    			caption: "List",
    			shrinkToFit :false,
    			autowidth: true,
    			// add row in the bottom
    			footerrow : true, 
    			userDataOnFooter : true, 
    			altRows : true 
  			});
  			
  			jQuery("#colr").jqGrid('navGrid','#pcolr', { edit:false,add:false,del:false,search:true,refresh:true }, {}, {}, {}, {multipleSearch:true}, {} ); 
  			
  			jQuery("#colr").jqGrid('navButtonAdd','#pcolr',{ caption: "Columns", title: "Reorder Columns", onClickButton : function (){ jQuery("#colr").jqGrid('columnChooser'); } }); 
  			
  			jQuery("#colr").jqGrid('gridResize',{minWidth:350,maxWidth:1500,minHeight:80, maxHeight:350});
		}); 
	</script>
	{/literal}
