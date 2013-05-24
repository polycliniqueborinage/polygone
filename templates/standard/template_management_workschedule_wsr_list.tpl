{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes"  js_workschedule="yes"  js_jquery_ui_171="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes" js_jqmodal="yes" js_rico="yes" }

	<div id="middle">
		
		{include file="template_primary_tabs_admin.tpl"}  
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./management_workschedule.php?action=list_dws">{#navigation_title_management_daily_wsr_liste#}</a>
					
					<a href="./management_workschedule.php?action=add_dws">{#navigation_title_management_daily_wsr_add#}</a>
    				
    				<span>{#navigation_title_management_workschedule_liste#}</span>
    				
    				<a href="./management_workschedule.php?action=add_wsr">{#navigation_title_management_workschedule_add#}</a>


				</div>
				
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="headline">
									<h2>
										<a href="javascript:void(0);" id="useredit_toggle">
										<img src="./templates/standard/img/symbols/user.png" alt="" />
										<span id='clientlist_timer'></span><span id="clientlist_bookmark">&nbsp;</span>
										</a>
										<a href="management_workschedule.php?action=wsr_pdf" style="float:right">
										<img src="./templates/standard/img/16x16/printer.png" alt="" />
										</a>
									</h2>
								</div>

								<div id="messagecookie">
								
									<div class="table_head">
										<table id="wsr_list" class="ricoLiveGrid" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td style="width:10%">{#dico_management_patient_search_colum_action#}</td>
												<td style="width:20%">{#dico_management_wsr_column_id#}</td>
												<td style="width:50%">{#dico_management_wsr_column_description#}</td>
												<td style="width:20%">{#dico_management_wsr_column_nbweeks#}</td>
											</tr>
										</table>
									</div>
									
									<div class="table_body">
									
										<div id="wsrBox">
																
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" wsr_search="yes"}

	<div class="jqmWindow" id="confirmbox" name="confirmbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_general_delete#}</h1>
  			</div>
  		
		</div>
			  
		<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
					
						<div id="detail" style="display:inline">
						{#dico_management_workschedule_confirm_delete_question#}
						</div>
						
						<div class="clear_both_b"></div>
						
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" onclick="javascript:deleteWsr(wsr_id);" class="butn_link" id="delete"><span>{#dico_management_debt_button_delete#}</span></a>
							<a href="#" onclick="javascript:jQuery('#confirmbox').jqmHide();" class="butn_link" id="cancel"><span>{#dico_management_debt_button_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

		</div>
	
	</div>
	
	{literal}
	<script>

		jQuery(document).ready(function(){
		
			
			jQuery('#confirmbox').jqm({
			});
	   		
  		});
  	</script>
	{/literal}

	{literal}
	<script type='text/javascript'>
		
		Rico.loadModule('LiveGridAjax','LiveGridMenu','grayedout.css');

		var orderGrid,buffer;
		//{type:'date'}

		Rico.onLoad( function() {
			var opts = {  
			    useUnformattedColWidth: true,
			    FilterLocation:   -1,     // put filter on a new header row
    			columnSpecs:  [{width:50},{filterUI:'t',width:100},{filterUI:'t',width:300}, {filterUI:'t',width:100}]
		  	};
	  	
			buffer=new Rico.Buffer.AjaxSQL('include/js/rico/ricoXMLquery.php', {TimeOut:0});
	
			orderGrid=new Rico.LiveGrid ('wsr_list', buffer, opts);
		
			orderGrid.menu=new Rico.GridMenu();
		
		});
		
		
	</script>
	{/literal}
