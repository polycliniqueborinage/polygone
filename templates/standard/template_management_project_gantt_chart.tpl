{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_project="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				{if $modules.management_menu_no_currentadmin_state == 4}
					<li class="nodelete {$mainmenu.menu_no_current}">
						<a class="nodelete" href="management_menu_no_current.php">{#navigation_management_menu_no_current#}</a>
					</li>
					{/if}
					
    				<a href="./management_client.php?action=search">{#dico_management_patient_menu_search#}</a>

    				<a href="./management_client.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_client.php?action=list">{#dico_management_patient_menu_list#}</a>
						
					<span>{#dico_management_patient_menu_view#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						{if $mode == "saved"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_saved#}</span>
						{/if}
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/user.png" alt=""/>{#dico_management_patient_edited#}</span>
						{/if}
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
			
						<div class="in">
			
							<div class="headline">
								
								<h2><a href="javascript:void(0);" id="userprofile_toggle" class="win_block" onclick = "toggleBlock('userprofile');"><img src="./templates/standard/img/symbols/user.png" alt="" />
								<span>{$patient.familyname} {$patient.firstname}</span></a>
								</h2>
						
							</div>

							<div id = "userprofile" style = "">
							
								<div id="tab_content">
									<ul>
										<li>
											<a href="#fragment-1"><span>{#dico_management_patient_subtab_general#}</span></a>
										</li>
										<li>
											<a href="#fragment-2"><span>{#dico_management_patient_subtab_info#}</span></a>
										</li>
										<li>
											<a href="#fragment-3"><span>{#dico_management_patient_subtab_comment#}</span></a>
										</li>
									</ul>



									<div id="fragment-1" class="block_in_wrapper">





<script type="text/javascript">
{literal}

// init variable
var current_id ='';
var temp = '';

function initUI(){
	var view = Get_Cookie("project_management_view");
	
	var YSB = YAHOO.ext.SplitBar;
	var resizer = new YSB('resizer', 'grid_space', null, YSB.LEFT);
	resizer.setAdapter(new YSB.AbsoluteLayoutAdapter("project_container"));
	resizer.minSize = 100;
	resizer.maxSize = 900;
	resizer.onMoved.subscribe(adjustGantt);
	resizer.setCurrentSize(700);
	var gantt = getEl('gantt_area');
    gantt.setStyle('margin-left', 704);
        
	if (view == "pm_only") {
		// tabs
		$('#tabs').tabs({ selected: 0 });
		SUGAR.gantt.PMOnly();
	}
	else if (view == "cs_only") {
		// tabs
		$('#tabs').tabs({ selected: 1 });
		SUGAR.gantt.CSOnly();
	}
	else if (view == "cd_only") {
		// tabs
		$('#tabs').tabs({ selected: 2 });
		SUGAR.gantt.CDOnly();
	}
	else {	
		// tabs
		$('#tabs').tabs({ selected: 0 });
		SUGAR.gantt.PMOnly();
    }

}

function adjustGantt(splitbar, newSize){
    var gantt = getEl('gantt_area');
    if(splitbar.el.id == 'resizer'){
        gantt.setStyle('margin-left', newSize+4);
    }
}


function loadUI(){

 	// autocomplete
	// autocomplete source language
	$(".source_language").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		max: 100,
		extraParams: {
	       type: function() { return 'source_language'; },
	       resource: function() { return $('#resource_'+current_id).val(); },
	       worktype: function() { return $('#worktype_'+current_id).val(); },
	       id: function() { return '{/literal}{$ID}{literal}' },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.language_label,
					result: row.language_value
				}
			});
		},
		formatItem: function(item) {
			return item.language_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});

	// autocomplete target language
	$(".target_language").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		max: 100,
		extraParams: {
	       type: function() { return 'target_language'; },
	       resource: function() { return $('#resource_'+current_id).val(); },
	       worktype: function() { return $('#worktype_'+current_id).val(); },
	       id: function() { return '{/literal}{$ID}{literal}' },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.language_label,
					result: row.language_value
				}
			});
		},
		formatItem: function(item) {
			return item.language_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});

	// autocomplete worktype
	$(".worktype").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		max: 100,
		extraParams: {
	       type: function() { return 'worktype'; },
	       resource: function() { return $('#resource_'+current_id).val(); },
	       language: function() { return $('#language_'+current_id).val(); },
	       id: function() { return '{/literal}{$ID}{literal}' },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.worktype_label,
					result: row.worktype_value
				}
			});
		},
		formatItem: function(item) {
			return item.worktype_label;
		}
	}).result(function(e, item) {
		$('#unit_'+current_id).val(item.unit);
		$('#cost_unit_'+current_id).val(item.cost_unit);
		$('#currency_'+current_id).val(item.currency);
		$('#rate_'+current_id).val(item.rate);
		javascript:SUGAR.grid.save(current_id);
	});
	
	// autocomplete unit
	$(".unit").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'unit'; },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.unit_label,
					result: row.unit_value
				}
			});
		},
		formatItem: function(item) {
			return item.unit_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});
	
	// autocomplete currency
	$(".currency").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'currency'; },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.currency_label,
					result: row.currency_value
				}
			});
		},
		formatItem: function(item) {
			return item.currency_label;
		}
	}).result(function(e, item) {
		$('#rate_'+current_id).val(item.rate);
		updatecost(current_id);
		javascript:SUGAR.grid.save(current_id);
	});
	
	// autocomplete time
	var start_time_data = "08:00,12:00,18:00".split(",");
	$(".time").autocomplete(start_time_data, {
		cacheLength :0,
		minChars: 0,
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});
	
	// autocomplete resource_type
	$(".resource_used").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'resource_used'; },
	       resource: function() { return $('#resource_'+current_id).val(); },
	       id: function() { return '{/literal}{$ID}{literal}' },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.resource_used_label,
					result: row.resource_used_value
				}
			});
		},
		formatItem: function(item) {
			return item.resource_used_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});
		
	// autocomplete initial_cost
	$(".initial_cost").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'initial_cost'; },
	       task_id: function() { return $('#obj_id_'+current_id).val(); },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.initial_cost_label,
					result: row.initial_cost_value
				}
			});
		},
		formatItem: function(item) {
			return item.initial_cost_label;
		}
	});
		
	// autocomplete revised_cost
	$(".revised_cost").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'revised_cost'; },
	       task_id: function() { return $('#obj_id_'+current_id).val(); },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.revised_cost_label,
					result: row.revised_cost_value
				}
			});
		},
		formatItem: function(item) {
			return item.revised_cost_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});
	
	// autocomplete final_cost
	$(".final_cost").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		cacheLength :0,
		extraParams: {
	       type: function() { return 'final_cost'; },
	       task_id: function() { return $('#obj_id_'+current_id).val(); },
	   },
		minChars: 0,
		dataType: "json",
		parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.final_cost_label,
					result: row.final_cost_value
				}
			});
		},
		formatItem: function(item) {
			return item.final_cost_label;
		}
	}).result(function(e, item) {
		javascript:SUGAR.grid.save(current_id);
	});
	
	
	// autocomplete description
	$(".description").autocomplete("index.php?action=ajax&module=Project&query=1&to_pdf=true", {
		extraParams: {
	       type: function() { return 'description'; },
	   	},
		dataType: "json",
	   	parse: function(data) {
			return $.map(data, function(row) {
				return {
					data: row,
					value: row.description_label,
					result: row.description_value
				}
			});
		},
		formatItem: function(item) {
			return item.description_label;
		},
		max: 10,
		highlight: false,
		scroll: true,
		scrollHeight: 300,
		}).result(function(e, item) {
			$('#description_'+current_id+'_divlink').html(item.description_label);
			javascript:SUGAR.grid.save(current_id);
	});

	
	/* date
	*
	*/
	// start date
	$(".startdate").datepicker({
		firstDay: 1 ,
		beforeShowDay: noSunday, 
		dateFormat: 'dd/mm/yy',
		minDate: new Date({/literal}{$PROJECT->estimated_start_date_year}{literal},{/literal}{$PROJECT->estimated_start_date_month}{literal},{/literal}{$PROJECT->estimated_start_date_day}{literal}),
		maxDate: new Date({/literal}{$PROJECT->estimated_end_date_year}{literal},{/literal}{$PROJECT->estimated_end_date_month}{literal},{/literal}{$PROJECT->estimated_end_date_day}{literal}),
		onSelect: function(dateText, inst) {
			$('#date_finish_'+current_id).datepicker('option', 'minDate', $('#date_start_'+current_id).datepicker( 'getDate' ));
			SUGAR.grid.newProcessStartDate(current_id);
			javascript:SUGAR.grid.save(current_id);
		}
		
	});

	// finish date
	$(".finishdate").datepicker({
		firstDay: 1 ,
		dateFormat: 'dd/mm/yy',
		minDate: new Date({/literal}{$PROJECT->estimated_start_date_year}{literal},{/literal}{$PROJECT->estimated_start_date_month}{literal},{/literal}{$PROJECT->estimated_start_date_day}{literal}),
		maxDate: new Date({/literal}{$PROJECT->estimated_end_date_year}{literal},{/literal}{$PROJECT->estimated_end_date_month}{literal},{/literal}{$PROJECT->estimated_end_date_day}{literal}),
		beforeShowDay: noSunday, 
		onSelect: function(dateText, inst) {
			SUGAR.grid.newProcessFinishDate(current_id);
			javascript:SUGAR.grid.save(current_id);
		}
		
	});
	
	
	/* TIME
	*
	*/
	$('.time').timeEntry({
	
		show24Hours: true, 
	    separator: ':',
		ampmPrefix: ' ', 
		timeSteps: [1, 15, 1],
		spinnerImage: ''
	
	}).change(function() {
    	javascript:SUGAR.grid.save();
	});
		
};


function loadCalendar(){
	{/literal}
	{if $TASKCOUNT != 0}
		for (i = 1; i <= {$TASKCOUNT}; i++) 
			$('#date_finish_'+i).datepicker('option', 'minDate', $('#date_start_'+i).datepicker( 'getDate' ));
	{/if}
	{literal}
}

function noSunday(date){
	var day = date.getDay();
    return [(day > 0), ''];
};

 
$().ready(function() {
	loadUI();
	loadCalendar();
});

YAHOO.util.Event.on(window, 'load', initUI);
var resources = new Array();
  
{/literal}
</script>

<div id="tabs">
    <ul>
        <li><a href="#fragment-1" onclick="javascript:SUGAR.gantt.PMOnly()"><span>Project Management</span></a></li>
        <li><a href="#fragment-2" onclick="javascript:SUGAR.gantt.CSOnly()"><span>Cost Summary</span></a></li>
        <li><a href="#fragment-3" onclick="javascript:SUGAR.gantt.CDOnly()"><span>Cost Detail</span></a></li>
    </ul>
    
    <div id="fragment-1">
    
	    {if $PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="ProjectTemplate" onclick="window.location.href ='index.php?module=Project&action=ProjectTemplatesDetailView&record={$PROJECT->id}'" />
		{/if}

	    {if !$PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="Project" onclick="window.location.href ='index.php?module=Project&action=DetailView&record={$PROJECT->id}'" />
			<input class="button" type="button" name="button" value="Export to PDF" onclick="SUGAR.grid.exportToPDF();"/>
			<input class="button" type="button" name="button" value="Resources" onclick="window.open('index.php?module=Project&show_js=1&action=ResourceReport&record={$PROJECT->id}','','width=700,height=700,resizable=1,scrollbars=1')" />
			<input class="button" type="button" name="button" value="Calendar" onclick="window.open('index.php?module=Project&show_js=1&action=CalendarReport&day=25&hour=0&month=10&year=2009&view=shared','','width=700,height=700,resizable=1,scrollbars=1')" />
		{/if}

		<table class='tabDetailView' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tbody>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Name: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Job number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->job_number}</td>
					<td class="tabDetailViewDL" width="8.33%"> PO number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->po_number}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Start Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_start_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> End Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_end_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> Dead line date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->deadline_date}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Assigned To: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->assigned_user_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Team: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->team_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Account: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->account_name}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Priority: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->priority}</td>
					<td class="tabDetailViewDL" width="8.33%"> Status: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->status}</td>
					<td class="tabDetailViewDL"> </td>
					<td class="tabDetailViewDF"> </td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Length of material to be worked on: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->length}</td>
					<td class="tabDetailViewDL" width="8.33%"> Units: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->unit}</td>
					<td class="tabDetailViewDL"> </td>
					<td class="tabDetailViewDF"> </td>
				</tr>
			</tbody>
		</table>
	</div>

	<div id="fragment-2" style="display: none;">
    
	    {if $PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="ProjectTemplate" onclick="window.location.href ='index.php?module=Project&action=ProjectTemplatesDetailView&record={$PROJECT->id}'" />
		{/if}

	    {if !$PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="Project" onclick="window.location.href ='index.php?module=Project&action=DetailView&record={$PROJECT->id}'" />
			<input class="button" type="button" name="button" value="Export to PDF" onclick="SUGAR.grid.exportToPDF();"/>
			<input class="button" type="button" name="button" value="Resources" onclick="window.open('index.php?module=Project&show_js=1&action=ResourceReport&record={$PROJECT->id}','','width=700,height=700,resizable=1,scrollbars=1')" />
			<input class="button" type="button" name="button" value="Calendar" onclick="window.open('index.php?module=Project&show_js=1&action=CalendarReport&day=25&hour=0&month=10&year=2009&view=shared','','width=700,height=700,resizable=1,scrollbars=1')" />
		{/if}

		<table class='tabDetailView' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tbody>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Name: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Job number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->job_number}</td>
					<td class="tabDetailViewDL" width="8.33%"> PO number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->po_number}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Start Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_start_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> End Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_end_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> Dead line date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->deadline_date}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Assigned To: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->assigned_user_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Team: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->team_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Account: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->account_name}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Priority: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->priority}</td>
					<td class="tabDetailViewDL" width="8.33%"> Status: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->status}</td>
					<td class="tabDetailViewDL"> </td>
					<td class="tabDetailViewDF"> </td>
				</tr>
			</tbody>
		</table>
		
		<table class='tabDetailView' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tbody>
				<tr>
					<td class="tabDetailViewDL" width="25%"> </td>
					<td class="tabDetailViewDF" width="15%">Ini</td>
					<td class="tabDetailViewDF" width="15%">Rev</td>
					<td class="tabDetailViewDF" width="15%">Fin</td>
					<td class="tabDetailViewDF" width="15%">Var (Fin - Ini)</td>
					<td class="tabDetailViewDF" width="15%">Var (Fin - Rev)</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total Revenue Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_rev}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_fin}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_revenue_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_revenue_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total External Cost Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_external_cost_gbp_sum_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_external_cost_gbp_sum_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Gross Profit Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_gbp_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Gross Profit Percentage Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_percent_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_percent_gbp_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total Internal Cost Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_internal_cost_gbp_sum_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_internal_cost_gbp_sum_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Net Profit Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_gbp_fin_ini}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Net Profit Percentage Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_percent_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_percent_gbp_fin_ini}</td>
				</tr>
			</tbody>
		</table>
		
	</div>

	<div id="fragment-3" style="display: none;">
    
	    {if $PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="ProjectTemplate" onclick="window.location.href ='index.php?module=Project&action=ProjectTemplatesDetailView&record={$PROJECT->id}'" />
		{/if}

	    {if !$PROJECT->is_template}
	    	<input class="button" type="button" name="button" value="Project" onclick="window.location.href ='index.php?module=Project&action=DetailView&record={$PROJECT->id}'" />
			<input class="button" type="button" name="button" value="Export to PDF" onclick="SUGAR.grid.exportToPDF();"/>
			<input class="button" type="button" name="button" value="Resources" onclick="window.open('index.php?module=Project&show_js=1&action=ResourceReport&record={$PROJECT->id}','','width=700,height=700,resizable=1,scrollbars=1')" />
			<input class="button" type="button" name="button" value="Calendar" onclick="window.open('index.php?module=Project&show_js=1&action=CalendarReport&day=25&hour=0&month=10&year=2009&view=shared','','width=700,height=700,resizable=1,scrollbars=1')" />
		{/if}

		<table class='tabDetailView' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tbody>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Name: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Job number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->job_number}</td>
					<td class="tabDetailViewDL" width="8.33%"> PO number: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->po_number}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Start Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_start_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> End Date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->estimated_end_date}</td>
					<td class="tabDetailViewDL" width="8.33%"> Dead line date: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->deadline_date}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Assigned To: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->assigned_user_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Team: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->team_name}</td>
					<td class="tabDetailViewDL" width="8.33%"> Account: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->account_name}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="8.33%"> Priority: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->priority}</td>
					<td class="tabDetailViewDL" width="8.33%"> Status: </td>
					<td class="tabDetailViewDF" width="25%">{$PROJECT->status}</td>
					<td class="tabDetailViewDL"> </td>
					<td class="tabDetailViewDF"> </td>
				</tr>
			</tbody>
		</table>
		
		<table class='tabDetailView' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tbody>
				<tr>
					<td class="tabDetailViewDL" width="25%"> </td>
					<td class="tabDetailViewDF" width="15%">Ini</td>
					<td class="tabDetailViewDF" width="15%">Rev</td>
					<td class="tabDetailViewDF" width="15%">Fin</td>
					<td class="tabDetailViewDF" width="15%">Var (Fin - Ini)</td>
					<td class="tabDetailViewDF" width="15%">Var (Fin - Rev)</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total Revenue Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_rev}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->total_revenue_fin}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_revenue_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_revenue_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total External Cost Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_external_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_external_cost_gbp_sum_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_external_cost_gbp_sum_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Gross Profit Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_gross_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_gbp_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Gross Profit Percentage Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_gross_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_percent_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_gross_profit_percent_gbp_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Total Internal Cost Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_internal_cost_gbp_sum}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_internal_cost_gbp_sum_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_internal_cost_gbp_sum_fin_rev}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Net Profit Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_net_profit_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_gbp_fin_ini}</td>
				</tr>
				<tr>
					<td class="tabDetailViewDL" width="25%">Net Profit Percentage Ini</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->initial_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->revised_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->final_net_profit_percent_gbp}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_percent_gbp_fin_ini}</td>
					<td class="tabDetailViewDF" width="15%">{$PROJECT->variance_net_profit_percent_gbp_fin_ini}</td>
				</tr>
			</tbody>
		</table>
		
	</div>

</div>



<table width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr>
<td style="padding-bottom: 2px;">

<form name="EditView" id="EditView" method="post" action="index.php">

<input type="hidden" name="module" value="Project" />
<input type="hidden" name="record" value="{$ID}" />
<input type="hidden" name="team_id" value="{$TEAM}" />
<input type="hidden" name="is_template" value="{$IS_TEMPLATE}" />
<input type="hidden" name="to_pdf" id="to_pdf" value="1">
<input type="hidden" name="action" id="action" value="SaveGrid" />
<input type="hidden" name="numRowsToSave"  id="numRowsToSave" value="">
<input type="hidden" name="numRowToSave"  id="numRowToSave" value="">
<input type="hidden" name="project_id" value="{$ID}">
<input type="hidden" name="project_name" value="{$PROJECT->name}">
<input type="hidden" name="project_start" value="{$PROJECT->estimated_start_date}">
<input type="hidden" name="project_owner" value="{$PROJECT->assigned_user_id}">
<input type="hidden" name="project_end" value="{$PROJECT->estimated_end_date}">
<input type="hidden" name="deletedRows"  id="deletedRows" value="">
<input type="hidden" name="layout" value="ProjectGrid">

<input name="calendar_start" id="calendar_start" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');SUGAR.gantt.createTable('biweek', this.value, '{$BG_COLOR}');" type="hidden" tabindex='2' value="{$PROJECT->estimated_start_date}" /><br />
<input name="gantt_chart_start_date" id="gantt_chart_start_date" type="hidden" onChange="SUGAR.gantt.createTable(document.getElementById('gantt_chart_view').value, this.value, '{$BG_COLOR}');" value="{$PROJECT->estimated_start_date}" />
<input name="gantt_chart_view" id="gantt_chart_view" type="hidden" value="biweek" />

<div id="projectButtonsDiv">

	<span id = "grid_buttons_span">
	{if $SELECTED_VIEW <= 1 && $CANEDIT}
			<a valign="bottom" title="{$MOD.LBL_INSERT_BUTTON}"><img src='{$IMAGE_PATH}ProjectInsertRows.gif' onClick="javascript: $('.CS').hide();$('.CD').hide();$('.PM').show();SUGAR.grid.insertRow();loadUI();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_INDENT_BUTTON}"><img src='{$IMAGE_PATH}ProjectIndent.gif' onClick="javascript:SUGAR.grid.indentSelectedRows();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_OUTDENT_BUTTON}"><img src='{$IMAGE_PATH}ProjectOutdent.gif' onClick="javascript:SUGAR.grid.addToOutdent();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_COPY_BUTTON}"><img src='{$IMAGE_PATH}ProjectCopy.gif' onClick="javascript:SUGAR.grid.copyRow();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_CUT_BUTTON}"><img src='{$IMAGE_PATH}ProjectCut.gif' onClick="javascript:SUGAR.grid.cutRow();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_PASTE_BUTTON}"><img src='{$IMAGE_PATH}ProjectPaste.gif' onClick="javascript:SUGAR.grid.pasteRow();loadUI();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_DELETE_BUTTON}"><img src='{$IMAGE_PATH}ProjectDelete.gif' onClick="javascript:SUGAR.grid.deleteRows();SUGAR.grid.save();"></img></a>
			<a valign="bottom" title="{$MOD.LBL_EXPAND_ALL_BUTTON}"><img src='{$IMAGE_PATH}ProjectExpandAll.gif' onClick="javascript:SUGAR.grid.expandAll()"></img></a>
			<a valign="bottom" title="{$MOD.LBL_COLLAPSE_ALL_BUTTON}"><img src='{$IMAGE_PATH}ProjectCollapseAll.gif' onClick="javascript:SUGAR.grid.collapseAll()"></img></a>
	{/if}
		<a id="saveGridLink" title="{$MOD.LBL_SAVE_BUTTON}"><img src='{$IMAGE_PATH}ProjectSave.gif' onClick="javascript:SUGAR.grid.save()"></img></a>
	</span>
	
	<span id = "gantt_buttons_span">
		<a title="{$MOD.LBL_WEEK_BUTTON}"><img src='{$IMAGE_PATH}ProjectWeek.gif' onClick="SUGAR.gantt.createTable('week', document.getElementById('gantt_chart_start_date').value, '{$BG_COLOR}');"></img></a>
		<a title="{$MOD.LBL_BIWEEK_BUTTON}"><img src='{$IMAGE_PATH}Project2Weeks.gif' onClick="SUGAR.gantt.createTable('biweek', document.getElementById('gantt_chart_start_date').value, '{$BG_COLOR}');"></img></a>
		<a title="{$MOD.LBL_MONTH_BUTTON}"><img src='{$IMAGE_PATH}ProjectMonth.gif' onClick="SUGAR.gantt.createTable('month', document.getElementById('gantt_chart_start_date').value, '{$BG_COLOR}');"></img></a>
	</span>		

	<input type="hidden" name="selected_view" id="selected_view" value="{$SELECTED_VIEW}" />
	<select id="gridViewSelect" onChange="SUGAR.grid.changeView()">
		<option value=0>{$MOD.LBL_FILTER_VIEW}...</option>
		<option value=1>{$MOD.LBL_FILTER_ALL_TASKS}</option> 
		<option value=2>{$MOD.LBL_FILTER_COMPLETED_TASKS}</option> 
		<option value=3>{$MOD.LBL_FILTER_INCOMPLETE_TASKS}</option> 
		<option value=4>{$MOD.LBL_FILTER_MILESTONES}</option> 
		<option value=5>{$MOD.LBL_FILTER_RESOURCE}</option> 
		<option value=6>{$MOD.LBL_FILTER_DATE_RANGE}</option> 
		<option value=7>{$MOD.LBL_LIST_OVERDUE_TASKS}</option> 
		<option value=8>{$MOD.LBL_LIST_UPCOMING_TASKS}</option> 
		<option value=9>{$MOD.LBL_FILTER_MY_TASKS}</option> 
		<option value=10>{$MOD.LBL_FILTER_MY_OVERDUE_TASKS}</option> 
		<option value=11>{$MOD.LBL_FILTER_MY_UPCOMING_TASKS}</option> 

	</select>
	<input {if $SELECTED_VIEW != 5 }style="display:none" {/if} type="input" {if $SELECTED_VIEW == 5} value="{$VIEW_FILTER_RESOURCE}"{/if} name="view_filter_resource" id="view_filter_resource" value="" />	
	
	<span id="view_filter_6_start_span" {if $SELECTED_VIEW != 6}style="display:none"{/if}>{$MOD.LBL_FILTER_DATE_RANGE_START}:</span>
	<input name=view_filter_date_start id=view_filter_date_start onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" {if $SELECTED_VIEW != 6 } style="display:none" {/if} type="input" tabindex='2' size='11' maxlength='10' value='{$VIEW_FILTER_DATE_START}' /> 
	<span id="view_filter_6_finish_span" {if $SELECTED_VIEW != 6}style="display:none"{/if}>{$MOD.LBL_FILTER_DATE_RANGE_FINISH}: </span>
	<input name=view_filter_date_finish id=view_filter_date_finish onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" {if $SELECTED_VIEW !=  6 } style="display:none" {/if} type="input" tabindex='2' size='11' maxlength='10' value='{$VIEW_FILTER_DATE_FINISH}'/> 
	
	{if $SELECTED_VIEW == 6}
		<script type="text/javascript">
		Calendar.setup ({literal}{{/literal}
			inputField : "view_filter_date_start", ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : "view_filter_date_start", singleClick : true, step : 1{literal}}{/literal});
		Calendar.setup ({literal}{{/literal}
			inputField : "view_filter_date_finish", ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : "view_filter_date_finish", singleClick : true, step : 1{literal}}{/literal});
		</script>
	{/if}
	<span id="view_filter_button_span"></span>
	{if $SELECTED_VIEW == 5 || $SELECTED_VIEW == 6}
		<input class="button" type=button id="view_filter_button" value="{$MOD.LBL_FILTER_VIEW}" onclick="document.forms['EditView'].action.value='EditGridView';document.forms['EditView'].to_pdf.value	= '0';document.getElementById('EditView').submit();" />
	{/if}
	
	
	<input class="button" type="button" name="button" value="{$MOD.LBL_GRID_ONLY}" onclick="javascript:SUGAR.gantt.gridOnly()" />
	<input class="button" type="button" name="button" value="{$MOD.LBL_GANTT_ONLY}" onclick="javascript:SUGAR.gantt.ganttOnly()" />
	<input class="button" type="button" name="button" value="{$MOD.LBL_GRID_GANTT}" onclick="javascript:SUGAR.gantt.gridGanttView()" />
	
</div>

<p/>

<div id="project_container">
	<div id="grid_space">
		<div>
			<table id="projectTable" border="1" cellpadding="0" cellspacing="0">
				<tr align=center height="50">
					<th width="2%" class="PM CS CD color1">{$MOD.LBL_TASK_ID}</th>
					<th width="2%" class="PM color1">Stage</th>
					<th width="2%" class="PM CS CD color1" nowrap>{$MOD.LBL_TASK_NAME}</th>
					<th width="2%" class="PM CS CD color1">{$MOD.LBL_RESOURCE_NAMES}</th>	
					<th width="2%" class="PM color1">Studio</th>
					<th width="2%" class="CS CD color1">Internal<br/>External</th>
					<th width="2%" class="PM CS CD color1">Source</th>
					<th width="2%" class="PM CS CD color1">Target</th>
					<th width="2%" class="PM CS CD color1">WorkType</th>	
					<th width="2%" class="PM CS CD color1">Status</th>

					<th width="2%" class="PM color3">Cost</th>
					<th width="2%" class="PM color3" colspan="2">{$MOD.LBL_DURATION}</th>
					<th width="2%" class="PM color3">Start<br/>Date</th>
					<th width="2%" class="PM color3">Start<br/>Time</th>
					<th width="2%" class="PM color3">Finish<br/>date</th>
					<th width="2%" class="PM color3">Finish<br/>Time</th>
					<th width="2%" class="PM color3">{$MOD.LBL_PREDECESSORS}</th>

					<th width="2%" class="CS color5">Initial<br/>Cost</th>
					<th width="2%" class="CS color5">Revised<br/>Cost</th>
					<th width="2%" class="CS color5">Final<br/>Cost</th>
					<th width="2%" class="CS color5">Variance:<br/>Initial-Final</th>
					<th width="2%" class="CS color5">Variance:<br/>Revised-Final</th>
					<th width="2%" class="CS color5">PIR#</th>
					<th width="2%" class="CS color5">Payment<br/>Date</th>

					<th width="2%" class="CD color7">Initial<br/>Quantity</th>
					<th width="2%" class="CD color7">Revised<br/>Quantity</th>
					<th width="2%" class="CD color7">Final<br/>Quantity</th>
					<th width="2%" class="CD color7">Actual<br/>Effort<br/>Timesheet</th>		
					<th width="2%" class="CD color7">Units</th>		
					<th width="2%" class="CD color7">Cost<br/>Per<br/>Unit</th>		
					<th width="2%" class="CD color7">Currency</th>		
					<th width="2%" class="CD color7">FX<br/>Rate</th>		
					<th width="2%" class="CD color7">Initial<br/>Cost<br/>(Currency)</th>
					<th width="2%" class="CD color7">Revised<br/>Cost<br/>(Currency)</th>
					<th width="2%" class="CD color7">Final<br/>Cost<br/>(Currency)</th>
					<th width="2%" class="CD color7">Supplier<br/>Invoice<br/>number</th>
					<th width="2%" class="CD color7">PIR#</th>
					
				</tr>	
				{foreach from=$TASKS item="TASK" }
				<tr id="project_task_row_{$TASK->project_task_id}" height="23" class='complete_{$TASK->percent_complete}'>
					
					<!-- ID -->
					<td class="PM CS CD color1" align="center" onClick="SUGAR.grid.clickedRow({$TASK->project_task_id}, event);">
						<div id='id_{$TASK->project_task_id}_divlink' style="display:inline;">{$TASK->project_task_id}{if $TASK->milestone_flag == 1}*{/if}</div>
						<input type="hidden" name="mapped_row_{$TASK->project_task_id}" id="mapped_row_{$TASK->project_task_id}" value="{$TASK->project_task_id}">
						<input type="hidden" name="parent_{$TASK->project_task_id}" id="parent_{$TASK->project_task_id}" value="{$TASK->parent_task_id}">
						<input type="hidden" name="obj_id_{$TASK->project_task_id}" id="obj_id_{$TASK->project_task_id}" value="{$TASK->id}">
						<input type="hidden" id="save_in_progress_{$TASK->project_task_id}" value="no">
						<input type="hidden" name="is_milestone_{$TASK->project_task_id}" id="is_milestone_{$TASK->project_task_id}" value="{$TASK->milestone_flag}">
					</td>
					
					<!-- STAGE -->
					<td class="PM color1">
						<select  {if !$CANEDIT}disabled{/if} style="border:0" name="stage_{$TASK->project_task_id}" id="stage_{$TASK->project_task_id}" onchange="javascript:SUGAR.grid.save({$TASK->project_task_id});">
							{literal}}{/literal} ">
							{if '"JS"' == $TASK->stage}
							<option value="JS" selected>JS</option>
							{else}
							<option value="JS">JS</option>
							{/if}
							{if 'PP' == $TASK->stage}
							<option value="PP" selected>PP</option>
							{else}
							<option value="PP">PP</option>
							{/if}
							{if 'PR' == $TASK->stage}
							<option value="PR" selected>PR</option>
							{else}
							<option value="PR">PR</option>
							{/if}
							{if 'CE' == $TASK->stage}
							<option value="CE" selected>CE</option>
							{else}
							<option value="CE">CE</option>
							{/if}
							{if 'PO' == $TASK->stage}
							<option value="PO" selected>PO</option>
							{else}
							<option value="PO">PO</option>
							{/if}
							{if 'JW' == $TASK->stage}
							<option value="JW" selected>JW</option>
							{else}
							<option value="JW">JW</option>
							{/if}
						</select>
					</td>

					<!-- Task Description -->
					<td class="PM CS CD color1" nowrap ondblclick="current_id={$TASK->project_task_id};SUGAR.grid.toggle('description_{$TASK->project_task_id}_div', 'description_{$TASK->project_task_id}', 'description_{$TASK->project_task_id}_divlink');">
						<div id='description_{$TASK->project_task_id}_div' style="display:none;">
							<input class="description" {if !$CANEDIT}readonly="readonly"{/if} name=description_{$TASK->project_task_id} type=text maxlength=50 style="border:0"  size=40 id=description_{$TASK->project_task_id} value="{$TASK->name}" onkeyup='javascript:SUGAR.grid.save({$TASK->project_task_id});' 
								onblur="SUGAR.grid.blurEvent({$TASK->project_task_id}, 'description_{$TASK->project_task_id}_div','description_{$TASK->project_task_id}', 'description_{$TASK->project_task_id}_divlink');">
							<input type="hidden" name="description_divlink_input_{$TASK->project_task_id}" id="description_divlink_input_{$TASK->project_task_id}" value="{$TASK->name}">
						</div>
						<div id='description_{$TASK->project_task_id}_divlink' style="display:inline;width:250px">{$TASK->name}</div>			
					</td>
					
					<!-- Resource -->
					<td class="PM CS CD color1">
						<input type='hidden' name="resource_full_name_{$TASK->project_task_id}" id="resource_full_name_{$TASK->project_task_id}">
						<input type='hidden' name="resource_type_{$TASK->project_task_id}" id="resource_type_{$TASK->project_task_id}">
						<select class='supplier' {if !$CANEDIT}disabled{/if} style='border:0' name=resource_{$TASK->project_task_id} id=resource_{$TASK->project_task_id}
						 onChange="javascript:current_id={$TASK->project_task_id};
							SUGAR.grid.updateResourceFullNameAndType({$TASK->project_task_id});
							SUGAR.grid.updateResourceUsed({$TASK->project_task_id});
							SUGAR.grid.calculateEndDate(document.getElementById('date_start_{$TASK->project_task_id}').value, document.getElementById('duration_{$TASK->project_task_id}').value, {$TASK->project_task_id});
						 	SUGAR.grid.calculateDatesAfterAddingPredecessors({$TASK->project_task_id});
							SUGAR.grid.updateAllDependentsAfterDateChanges({$TASK->project_task_id});
							//SUGAR.grid.updateAncestorsTimeData({$TASK->project_task_id});
							SUGAR.gantt.changeTask({$TASK->project_task_id});
							SUGAR.grid.save({$TASK->project_task_id});">
							<option value="">----</option>
							{foreach from=$RESOURCES item="RESOURCE"}
								{if $RESOURCE->id == $TASK->resource_id}
									<option value="{$RESOURCE->id}" selected>{$RESOURCE->name}</option>
									{assign var=resource_full_name value=$RESOURCE->name}
									{assign var=resource_type value=$RESOURCE->object_name}
								{else}
									<option value="{$RESOURCE->id}">{$RESOURCE->name}</option>
								{/if}
							{/foreach}
						</select>
					</td>
					
					<!-- Studio -->
					<td class="PM color1">
						<input type='hidden' name="studio_full_name_{$TASK->project_task_id}" id="studio_full_name_{$TASK->project_task_id}">
						<select class='studio' {if !$CANEDIT}disabled{/if} style='border:0' name=studio_{$TASK->project_task_id} id=studio_{$TASK->project_task_id}
						 	onChange="javascript:current_id={$TASK->project_task_id};
							SUGAR.grid.save({$TASK->project_task_id});">
							<option value="">----</option>
							{foreach from=$STUDIOS item="STUDIO"}
								{if $RESOURCE->id == $TASK->resource_id}
									<option value="{$STUDIO->id}" selected>{$STUDIO->name}</option>
									
								{else}
									<option value="{$STUDIO->id}">{$STUDIO->name}</option>
								{/if}
							{/foreach}
						</select>
					</td>
					
					<!-- resource_used internal / external -->
					<td class="CS CD color1">
						<input type='text' class='resource_used small' name='resource_used_{$TASK->project_task_id}' id='resource_used_{$TASK->project_task_id}' value="{$TASK->resource_used}" onclick="javascript:current_id={$TASK->project_task_id}" onkeyup='javascript:SUGAR.grid.save({$TASK->project_task_id});'>
					</td>

					<!-- Source Language -->
					<td class="PM CS CD color1">
						<input type='text' class='source_language small' name='source_language_{$TASK->project_task_id}' id='source_language_{$TASK->project_task_id}' value="{$TASK->source_language}" onclick="javascript:current_id={$TASK->project_task_id}" onkeyup="javascript:SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Target Language -->
					<td class="PM CS CD color1">
						<input type='text' class='target_language small' name='target_language_{$TASK->project_task_id}' id='target_language_{$TASK->project_task_id}' value="{$TASK->target_language}" onclick="javascript:current_id={$TASK->project_task_id}" onkeyup="javascript:SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Worktype -->
					<td class="PM CS CD color1">
						<input type='text' class='worktype small' name='worktype_{$TASK->project_task_id}' id='worktype_{$TASK->project_task_id}' value="{$TASK->worktype}" onclick="javascript:current_id={$TASK->project_task_id}" onkeyup="javascript:SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- %Status / complete -->
					<td class="PM CS CD color1">
						<select  {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} style='border:0' name='status_{$TASK->project_task_id}' id='status_{$TASK->project_task_id}'  onchange="javascript:$('#percent_complete_{$TASK->project_task_id}').val(this.value);if(this.value!=100) $('#project_task_row_{$TASK->project_task_id}').removeClass('complete_100');if(this.value==100) $('#project_task_row_{$TASK->project_task_id}').addClass('complete_100');if(this.value==100 && $('#resource_used_{$TASK->project_task_id}').val()!='EXT' ) $('#final_effort_{$TASK->project_task_id}').val($('#actual_effort_{$TASK->project_task_id}').html()) ; if(this.value==100) updatecost({$TASK->project_task_id}); if(this.value==100) updateNextTaskStartDate({$TASK->project_task_id});SUGAR.grid.updateAncestorsPercentComplete({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});SUGAR.gantt.changeTask({$TASK->project_task_id});">
							{if '0' == $TASK->status}
							<option value="0" selected>Not started</option>
							{else}
							<option value="0">Not started</option>
							{/if}
							{if '50' == $TASK->status}
							<option value="50" selected>In Progress</option>
							{else}
							<option value="50">In Progress</option>
							{/if}
							{if '100' == $TASK->status}
							<option value="100" selected>Completed</option>
							{else}
							<option value="100">Completed</option>
							{/if}
						</select>
						<input type='hidden' name='percent_complete_{$TASK->project_task_id}' id='percent_complete_{$TASK->project_task_id}' value='{$TASK->percent_complete}'>
					</td>
					
					<!-- %Cost - calculed -->
					<td class="PM color3" style="cursor:default" align="center">
						<div style="display:inline;">{$TASK->cost_c}</div>
					</td>
					
					<!-- %Duration -->
					<td class="PM color3">
						<input  {if !$CANEDIT}readonly="readonly"{/if} type=text  style="border:0;" size=3 name=duration_{$TASK->project_task_id} id=duration_{$TASK->project_task_id} value="{$TASK->duration}" 
							onkeyup="javascript:temp = checkAmount(this, temp, 2, 0, false);if (SUGAR.grid.validateDuration(this)) {literal}{{/literal} 
							SUGAR.grid.calculateEndDate(document.getElementById('date_start_{$TASK->project_task_id}').value, this.value, {$TASK->project_task_id});
							SUGAR.grid.updateAllDependentsAfterDateChanges({$TASK->project_task_id});
							//SUGAR.grid.updateAncestorsTimeData({$TASK->project_task_id});
							SUGAR.gantt.changeTask({$TASK->project_task_id});
							{literal}}{/literal} ;SUGAR.grid.save();">
					</td>
					
					<!-- %Duration -->
					<td class="PM color3">
						<!--Need the hidden duration unit so that even when a resource logs in and the duration_unit select is disabled, we can still export to PDF via this hidden field-->
						<input type='hidden' name="duration_unit_hidden_{$TASK->project_task_id}" id="duration_unit_hidden_{$TASK->project_task_id}" value="{$TASK->duration_unit}">
						<select  {if !$CANEDIT}disabled{/if} style='border:0' name=duration_unit_{$TASK->project_task_id} id=duration_unit_{$TASK->project_task_id} onChange="SUGAR.grid.changeDurationUnits('{$TASK->project_task_id}');SUGAR.grid.save();">
							{foreach from=$DURATION_UNITS item="DURATION_UNIT" key="DURATION_UNIT_KEY"}
								{if $DURATION_UNIT == $TASK->duration_unit}
									<option value="{$DURATION_UNIT_KEY}" selected>{$DURATION_UNIT}</option>
								{else}
									<option value="{$DURATION_UNIT_KEY}">{$DURATION_UNIT}</option>
								{/if}
							{/foreach}
						</select>
					</td>
					
					<!-- %Start date-->
					<td class="PM color3">					
						<input class="startdate" {if !$CANEDIT}readonly="readonly"{/if} name='date_start_{$TASK->project_task_id}' id='date_start_{$TASK->project_task_id}' style="border:0" onchange="parseDate(this, '{$CALENDAR_DATEFORMAT}');" type="text" tabindex='2' size='11' maxlength='10' value="{$TASK->date_start}" onclick="javascript:current_id={$TASK->project_task_id}"> 
					</td>	

					<!-- %Start time-->
					<td class="PM color3">					
						<input class="time" {if !$CANEDIT}readonly="readonly"{/if} name='time_start_{$TASK->project_task_id}' id='time_start_{$TASK->project_task_id}' style="border:0"	type="text" tabindex='2' size='7' maxlength='7' value="{$TASK->time_start}" onkeyup="javascript:SUGAR.grid.save();"> 
					</td>	
					
					<!-- %END date-->
					<td class="PM color3">					
						<input class='finishdate' {if !$CANEDIT}readonly="readonly"{/if} name='date_finish_{$TASK->project_task_id}' id='date_finish_{$TASK->project_task_id}' style="border:0" onchange="parseDate(this, '{$CALENDAR_DATEFORMAT}');" type="text" tabindex='2' size='11' maxlength='10' value="{$TASK->date_finish}" onclick="javascript:current_id={$TASK->project_task_id}"> 
					</td>

					<!-- %END time-->
					<td class="PM color3">					
						<input class="time" {if !$CANEDIT}readonly="readonly"{/if} name='time_finish_{$TASK->project_task_id}' id='time_finish_{$TASK->project_task_id}' style="border:0"	type="text" tabindex='2' size='7' maxlength='7' value="{$TASK->time_finish}" onkeyup="javascript:SUGAR.grid.save();"> 
					</td>
					
					<!-- Predecessors -->
					<td class="PM color3">
						<input class="predecessors"  {if !$CANEDIT}readonly="readonly"{/if} type=text size=10  style='border:0' name='predecessors_{$TASK->project_task_id}' id='predecessors_{$TASK->project_task_id}' value="{$TASK->predecessors}"
						onblur="if (SUGAR.grid.validatePredecessors(this)){literal}{{/literal}
							SUGAR.grid.setDependencyCheckRow({$TASK->project_task_id});
							SUGAR.grid.validateDependencyCycles({$TASK->project_task_id});
							SUGAR.grid.validatePredecessorIsNotAncestorOrChild({$TASK->project_task_id});
							if (SUGAR.grid.dependencyCheckFail != 1){literal}{{/literal}
								SUGAR.grid.updatePredecessorsAndDependents({$TASK->project_task_id});
								SUGAR.grid.calculateDatesAfterAddingPredecessors({$TASK->project_task_id});
								SUGAR.grid.updateAllDependentsAfterDateChanges({$TASK->project_task_id});
								//SUGAR.grid.updateAncestorsTimeData({$TASK->project_task_id});
								SUGAR.gantt.changeTask({$TASK->project_task_id});
								SUGAR.grid.save({$TASK->project_task_id});
							{literal}}{/literal}
						{literal}}{/literal}
						SUGAR.grid.dependencyCheckFail = 0;
						//SUGAR.grid.calculateEndDate(document.getElementById('date_start_{$TASK->project_task_id}').value, document.getElementById('duration_{$TASK->project_task_id}').value, {$TASK->project_task_id});">
					</td>
					
					<!-- %initial Cost - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<input class="initial_cost_gbp small" readonly="readonly" type=text size=10 style="border:0" name='initial_cost_gbp_{$TASK->project_task_id}' id='initial_cost_gbp_{$TASK->project_task_id}' value="{$TASK->initial_cost_gbp}">
					</td>
					
					<!-- %revised Cost - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<input class="revised_cost_gbp small" readonly="readonly" type=text size=10 style="border:0" name='revised_cost_gbp_{$TASK->project_task_id}' id='revised_cost_gbp_{$TASK->project_task_id}' value="{$TASK->revised_cost_gbp}">
					</td>
					
					<!-- %final Cost - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<input class="final_cost_gbp small" readonly="readonly" type=text size=10 style="border:0" name='final_cost_gbp_{$TASK->project_task_id}' id='final_cost_gbp_{$TASK->project_task_id}' value="{$TASK->final_cost_gbp}">
					</td>
					
					<!-- %Variance Initial Final - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<input class="variance_initial_final_gbp small" readonly="readonly" type=text size=10 style="border:0" name='variance_initial_final_gbp_{$TASK->project_task_id}' id='variance_initial_final_gbp_{$TASK->project_task_id}' value="{$TASK->variance_initial_final_gbp}">
					</td>
					
					<!-- %Variance Revised Final - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<input class="variance_revised_final_gbp small" readonly="readonly" type=text size=10 style="border:0" name='variance_revised_final_gbp_{$TASK->project_task_id}' id='variance_revised_final_gbp_{$TASK->project_task_id}' value="{$TASK->variance_revised_final_gbp}">
					</td>
					
					<!-- %PIR - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<div id='pir_calculed_{$TASK->project_task_id}' style="display:inline;">{$TASK->pir}</div>
					</td>
					
					<!-- %Payment date - calculed -->
					<td class="CS color5" style="cursor:default" align="center">
						<div style="display:inline;">{$TASK->payment_date}</div>
					</td>

					<!-- Initial<br/>Estimated<br/>Quantity -->
					<td class="CD color7" id=optional_{$TASK->project_task_id}>
						<input class="small"  {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size='10' style='border:0' name='estimated_effort_{$TASK->project_task_id}' id='estimated_effort_{$TASK->project_task_id}' value='{$TASK->estimated_effort}' onclick='javascript:temp=this.value;' onkeyup='javascript:temp = checkAmount(this, temp, 5, 2, false);updatecost({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});'>
					</td>
					
					<!-- Revised Estimated Quantity -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='revised_effort_{$TASK->project_task_id}' id='revised_effort_{$TASK->project_task_id}' value="{$TASK->revised_effort}" onclick='javascript:temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 5, 2, false);updatecost({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Final Quantity -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='final_effort_{$TASK->project_task_id}' id='final_effort_{$TASK->project_task_id}' value="{$TASK->final_effort}" onclick='javascript:temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 5, 2, false);updatecost({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Actual Effort Timesheet - calculeted -->
					<td class="CD color7" style="cursor:default" align="center">
						<div id="actual_effort_{$TASK->project_task_id}" style="display:inline;">{$TASK->actual_c}</div>
					</td>
					
					<!-- Units -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="unit small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name=unit_{$TASK->project_task_id} id=unit_{$TASK->project_task_id} value="{$TASK->unit}" onkeyup="javascript:SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Cost Per Units -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small"  {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name="cost_unit_{$TASK->project_task_id}" id="cost_unit_{$TASK->project_task_id}" value="{$TASK->cost_unit}" onclick='javascript:temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 5, 2, false);updatecost({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});">
					</td>
	
					<!-- Currency -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="currency small"  {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name=currency_{$TASK->project_task_id} id=currency_{$TASK->project_task_id} value="{$TASK->currency}" onclick="javascript:current_id={$TASK->project_task_id}" onkeyup="javascript:SUGAR.grid.save({$TASK->project_task_id});">
					</td>
					
					<!-- Rate -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small"  {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='rate_{$TASK->project_task_id}' id='rate_{$TASK->project_task_id}' value="{$TASK->rate}" onclick='javascript:temp=this.value;' onkeyup='javascript:temp = checkAmount(this, temp, 5, 4, false);updatecost({$TASK->project_task_id});SUGAR.grid.save({$TASK->project_task_id});'>
					</td>
					
					<!-- %Initial Cost Currency - calculed -->
					<td class="CD color7" style="cursor:default" align="center">
						<input class="initial_cost small" readonly="readonly" type=text size=10 style="border:0" name='initial_cost_{$TASK->project_task_id}' id='initial_cost_{$TASK->project_task_id}' onclick='javascript:current_id={$TASK->project_task_id};' value="{$TASK->initial_cost}">
					</td>
					
					<!-- Revised Cost Currency - calculed but editable -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="revised_cost small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='revised_cost_{$TASK->project_task_id}' id='revised_cost_{$TASK->project_task_id}' value="{$TASK->revised_cost}" onclick='javascript:current_id={$TASK->project_task_id};temp=this.value;' onkeyup='javascript:temp = checkAmount(this, temp, 10, 2, false);SUGAR.grid.save({$TASK->project_task_id});'>
					</td>
	
					<!-- Final Cost Currency - calculed but editable -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="final_cost small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='final_cost_{$TASK->project_task_id}' id='final_cost_{$TASK->project_task_id}' value="{$TASK->final_cost}" onclick='javascript:current_id={$TASK->project_task_id};temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 10, 2, false);SUGAR.grid.save({$TASK->project_task_id});">
					</td>

					<!-- Supplier Invoice number -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='supplier_invoice_number_{$TASK->project_task_id}' id='supplier_invoice_number_{$TASK->project_task_id}' value="{$TASK->supplier_invoice_number}" onclick='javascript:temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 10, 0, false);SUGAR.grid.save({$TASK->project_task_id});">
					</td>
	
					<!-- PIR -->
					<td class="CD color7" id="optional_{$TASK->project_task_id}" style="display: none;">
						<input class="small" {if $CURRENT_USER != $TASK->resource_id && !$CANEDIT}readonly="readonly"{/if} type=text size=10 style="border:0" name='pir_{$TASK->project_task_id}' id='pir_{$TASK->project_task_id}' value="{$TASK->pir}" onclick='javascript:temp=this.value;' onkeyup="javascript:temp = checkAmount(this, temp, 10, 0, false);$('#pir_calculed_{$TASK->project_task_id}').html(this.value);SUGAR.grid.save({$TASK->project_task_id});">
					</td>
					
				</tr>
				<script type="text/javascript">
					document.getElementById('resource_full_name_{$TASK->project_task_id}').value="{$resource_full_name}";
					document.getElementById('resource_type_{$TASK->project_task_id}').value="{$resource_type}";
					SUGAR.grid.setUpIndentedRow("{$TASK->project_task_id}", "{$TASK->parent_task_id}");
				</script>
				{assign var=resource_full_name value=""}
				{assign var=resource_type value=""}
				{/foreach}
				
				
				{if $TASKCOUNT != -1}
				<tr align=center height="50">
					<th width="2%" class="PM CS CD color1"></th>
					<th width="2%" class="PM color1"></th>
					<th width="auto" class="PM CS CD color1" nowrap></th>
					<th width="2%" class="PM CS CD color1"></th>	
					<th width="2%" class="PM color1"></th>	
					<th width="2%" class="CS CD color1"></th>
					<th width="2%" class="PM CS CD color1"></th>
					<th width="2%" class="PM CS CD color1"></th>
					<th width="2%" class="PM CS CD color1"></th>	
					<th width="2%" class="PM CS CD color1"></th>

					<th width="2%" class="PM color3"></th>
					<th width="2%" class="PM color3" colspan="2"></th>
					<th width="2%" class="PM color3"></th>
					<th width="2%" class="PM color3"></th>
					<th width="2%" class="PM color3"></th>
					<th width="2%" class="PM color3"></th>
					<th width="2%" class="PM color3"></th>

					<th width="2%" id="initial_cost_gbp_sum" class="CS color5">{$INITIALCOSTGBPSUM}</th>
					<th width="2%" id="revised_cost_gbp_sum" class="CS color5">{$REVISEDCOSTGBPSUM}</th>
					<th width="2%" id="final_cost_gbp_sum" class="CS color5">{$FINALCOSTGBPSUM}</th>
					<th width="2%" id="variance_initial_final_sum" class="CS color5">{$VARIANCEINITIALFINALSUM}</th>
					<th width="2%" id="variance_revised_final_sum" class="CS color5">{$VARIANCEREVISEDFINALSUM}</th>
					<th width="2%" class="CS color5"></th>
					<th width="2%" class="CS color5"></th>

					<th width="2%" class="CD color7"></th>
					<th width="2%" class="CD color7"></th>
					<th width="2%" class="CD color7"></th>
					<th width="2%" class="CD color7"></th>		
					<th width="2%" class="CD color7"></th>		
					<th width="2%" class="CD color7"></th>		
					<th width="2%" class="CD color7"></th>		
					<th width="2%" class="CD color7"></th>		
					<th width="2%" id="initial_cost_sum" class="CD color7">{$INITIALCOSTSUM}</th>
					<th width="2%" id="revised_cost_sum" class="CD color7">{$REVISEDCOSTSUM}</th>
					<th width="2%" id="final_cost_sum" class="CD color7">{$FINALCOSTSUM}</th>
					<th width="2%" class="CD color7"></th>
					<th width="2%" class="CD color7"></th>
					
				</tr>
				{/if}
				
				
			</table>
			<script type="text/javascript">
				document.getElementById('gridViewSelect').selectedIndex = document.getElementById('selected_view').value;
			</script>
			
		<br /><br />
	</div>
	</div>
	
	
	<div id="gantt_area" style="dispay:none">
		<div id="gantt_space"></div>
	</div>
		<br /><br />
	
	<div id="resizer" style="dispay:none"></div>

</div>
</form>
<div id="task_detail_area_div" name="task_detail_area_div" width="100%" style="display:none;border:1px">
<img src="themes/default/images/img_loading.gif" border="0" />
</div>
<iframe id="task_detail_area_iframe" name="task_detail_area_iframe" width="100%" style="display:none;border:0px">
</iframe>

<script type="text/javascript">
{foreach from=$RESOURCES item="RESOURCE"}
	var resourceObj = new Object();
	resourceObj.id = '{$RESOURCE->id}';
	resourceObj.full_name = '{$RESOURCE->name}';
	resourceObj.type = '{$RESOURCE->object_name}';
	resources.push(resourceObj);
{/foreach}
var durationOptions = new Array();
{foreach from=$DURATION_UNITS item="DURATION_UNIT" key= "DURATION_UNIT_KEY"}
	var durationOptionObj = new Object();
	durationOptionObj.key = "{$DURATION_UNIT_KEY}"
	durationOptionObj.value = "{$DURATION_UNIT}"
	durationOptions.push(durationOptionObj);
{/foreach}
var holidays = new Array();
{foreach from=$HOLIDAYS item="HOLIDAY"}
	var holidayObj = new Object();
	holidayObj.resource = '{$HOLIDAY->person_id}';
	holidayObj.date = '{$HOLIDAY->holiday_date}';
	holidays.push(holidayObj);
{/foreach}
SUGAR.grid.gridNotLoaded();
//dac use jquery calendar
//SUGAR.grid.setupCalendar(null,  "{$CALENDAR_DATEFORMAT}", "{$BG_COLOR}", "projectTable", "{$IMAGE_PATH}");
SUGAR.grid.setUpCurrentUser('{$CURRENT_USER}', '{$OWNER}');
SUGAR.grid.setupHolidays(holidays);
SUGAR.grid.setupResourceOptions(resources);
SUGAR.grid.setupDurationUnitsOptions(durationOptions);
SUGAR.grid.adjustInitialIndentedRows();
SUGAR.grid.buildPredecessorsAndDependents();
SUGAR.grid.gridLoaded();
SUGAR.gantt.createTable('biweek', $('#calendar_start').val(), "{$BG_COLOR}");
{if $TASKCOUNT == 0}
for (i = 0; i < 3; i++)
	SUGAR.grid.insertRow();
{/if}

$('#fragment-2').show();
$('#fragment-3').show();

</script>
{$JAVASCRIPT}





										
									</div> {*block_in_wrapper end*}	
									
									
									
									<div id="fragment-2" class="block_in_wrapper">

										<table cellpadding="0" cellspacing="0" width="100%">
								
											<tr valign="top">
                       							<td class="label"><b>{#dico_management_patient_titulaire_name#}:</b></td><td>{$patient.titulaire}</td>
											</tr>

										</table>
									
									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									</div> {*block_in_wrapper end*}	
									
									
									
									<div id="fragment-3" class="block_in_wrapper">
									
										<table cellpadding="0" cellspacing="0" width="100%">
										
											{section name=tarification loop=$tarifications}
										
											<tr valign="top">
                        						<td>ID</td>
                        						<td>Date</td>
                        						<td>Caisse</td>
                        						<td>Etat</td>
                        						<td>A Payer</td>
                        						<td>Paye</td>
                        						<td>Cloture</td>
											</tr>

											<tr valign="top">
                        						<td>{$tarifications[tarification].id}</td>
                        						<td>{$tarifications[tarification].date}</td>
                        						<td>{$tarifications[tarification].caisse}</td>
                        						<td>{$tarifications[tarification].etat}</td>
                        						<td>{$tarifications[tarification].a_payer}</td>
                        						<td>{$tarifications[tarification].paye}</td>
                        						<td>{$tarifications[tarification].cloture}</td>
											</tr>
											
											<tr valign="top">
    	                    					<td>ID</td>
    	                    					<td>Cecodi</td>
    	                    					<td>cout</td>
    	                    					<td>cout_medecin</td>
    	                    					<td>cout_poly</td>
    	                    					<td>cout_mutuelle</td>
    	                    					<td>caisse</td>
											</tr>

											{section name=tarificationdetail loop=$tarifications[tarification].tarification_details}
											
												<tr valign="top">
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].id}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cecodi}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_medecin}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_poly}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].cout_mutuelle}</td>
    	                    						<td>{$tarifications[tarification].tarification_details[tarificationdetail].caisse}</td>
												</tr>
						
						
											{/section}
											
											<tr valign="top">
    	                    					<td></td>
											</tr>
					

											{/section}
										
										</table>

										
									
									<div class="clear_both_b"></div> {*required ... do not delete this row*}
	
									</div> {*block_in_wrapper end*}		
										
									
											
    
								</div>

							</div>{*userpatiente end*}

							<div class="clear_both"></div> {*required ... do not delete this row*}
					
						</div> {*IN end*}
					
					</div> {*Block B end*}				
			
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" patient_search="yes"}
	
	
	{literal}
	<script type='text/javascript'>
		
		$(document).ready(function(){
    		$("#tab_content").tabs();
		});

		
	</script>
	{/literal}
	
	
	
	
	