{config_load file=lng.conf section = "strings" scope="global" }
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
	<title>{$title} @ {$settings.name}</title>
	
	<link rel="shortcut icon" href="templates/standard/img/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_main.css"/>

	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_form.css"/>

	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_poly.css" />
	
	{if $js_jquery == "yes"}
		{literal}
		<link rel="stylesheet" type="text/css" href="templates/standard/css/jquery-ui.css"/>
		<script type="text/javascript" src="include/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="include/js/jquery/ui/ui.core.js"></script>
		<script type = "text/javascript" src = "include/js/project/ajax.js" ></script>
		{/literal}
	{/if}

	{if $js_jquery132 == "yes"}
		{literal}
			<script type="text/javascript" src="include/js/jquery-1.3.2/jquery-1.3.2.min.js"></script>
		{/literal}
	{/if}
	
	{if $js_jquery142 == "yes"}
		{literal}
			<script type="text/javascript" src="include/js/jquery-1.4.2/jquery-1.4.2.min.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_ui_171 == "yes"}
		{literal}
			<link rel="stylesheet" href="templates/standard/css/jquery-ui-1.7.1-smoothness/jquery-ui-1.7.1.custom.css" type="text/css" title="ui-theme" />
			<script type="text/javascript" src="include/js/jquery-1.7.1/jquery-ui-1.7.1.custom.min.js"></script>
		{/literal}
	{/if}

	{if $js_ajax == "yes"}
		{literal}
			<script type = "text/javascript" src = "include/js/project/ajax.js" ></script>
		{/literal}
	{/if}

	{if $js_full_agenda == "yes"}
		{literal}
			<link rel="stylesheet" href="include/js/fullcalendar/fullcalendar.css" type="text/css" />
			<script type="text/javascript" src="include/js/fullcalendar/fullcalendar.js"></script>
		{/literal} 
	{/if}
	
	{if $js_datatable == "yes"}
		{literal}
			<link rel="stylesheet" href="include/js/dataTables-1.6 2/media/css/demo_table.css" type="text/css" title="ui-theme" />
			<script type="text/javascript" src="include/js/dataTables-1.6 2/media/js/jquery.dataTables.min.js"></script>
		{/literal}
	{/if}

	{if $js_daterangepicker == "yes"}
		{literal}
			<script type="text/javascript" src="include/js/daterangepicker/daterangepicker.jQuery.js"></script>
		{/literal}
	{/if}

	{if $js_jqgrid == "yes"}
		{literal}
		<link type="text/css" rel="stylesheet" href="include/js/jqgrid/css/ui.jqgrid.css" />
		<script type="text/javascript" src="include/js/jqgrid/src/i18n/grid.locale-en.js" ></script>
		<script type="text/javascript" src="include/js/jqgrid/js/jquery.jqGrid.min.js"></script>
		{/literal}
	{/if}

	{if $js_jqmodal == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jqmodal/jqModal.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_accordion == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery/ui/ui.accordion.js"></script>
		{/literal}
	{/if}
	
	{if $js_jquery_form == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery/jquery.form.js"></script>
		{/literal}
	{/if}
	
	{if $js_jquery_autocomplete == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery/jquery.autocomplete.js"></script>
		{/literal}
	{/if}
	
	{if $js_jquery_validate == "yes"}
		{literal}
		<!-- http://docs.jquery.com/Plugins/Validation/validate -->
		<script type="text/javascript" src="include/js/jquery-validate/jquery.validate.min.js"></script>
		{/literal}
	{/if}

	{if $tinymce == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/tiny_mce_back/tiny_mce.js"></script>
		{/literal}
	{/if}

	{if $tinymce_jquery == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/tiny_mce/tiny_mce.js"></script>
		{/literal}
	{/if}
	
	{if $js_time_line == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/timeline/timeline-api.js"></script>
   		{/literal}
	{/if}
	
	{if $js_time_plot == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/timeplot/1.1/timeplot-api.js" type="text/javascript"></script>
   		{/literal}
	{/if}
       
	{if $js_jquery_progressbar == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/progressbar/jquery.progressbar.min.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_fancybox == "yes"}
		{literal}
		<link type="text/css" rel="stylesheet" href="include/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.1.css" />
		<script type="text/javascript" src="include/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_prettyphoto == "yes"}
		{literal}
		<link type="text/css" rel="stylesheet" href="include/js/prettyPhoto/css/prettyPhoto.css" />
		<script type="text/javascript" src="include/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_date_parser == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery_datejs/build/date-fr-BE.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_timesheet == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery.timesheet/timesheet.js"></script>
		{/literal}
	{/if}

	{if $js_filtergrid == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/tablefilter.js"></script>
		{/literal}
	{/if}	

	{if $js_jquery_prettyphoto3 == "yes"}
		{literal}
		<link type="text/css" rel="stylesheet" href="include/js/prettyPhoto_3/css/prettyPhoto.css" />
		<script type="text/javascript" src="include/js/prettyPhoto_3/js/jquery.prettyPhoto.js"></script>
		{/literal}
	{/if}
	
	{if $password_strength == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/password_strength/password_strength_plugin.js"></script>
		<script type="text/javascript" src="include/js/password_strength/jquery.pwdstr-1.0.source.js"></script>
		{/literal}
	{/if}

	{if $js_jquery_multifile == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/multifile/jquery.multifile.pack.js"></script>
		{/literal}
	{/if}

	{if $js_fg_menu == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/fg-menu/fg.menu.js"></script>
		<link rel="stylesheet" href="include/js/fg-menu/theme/ui.all.css" />
		{/literal}
	{/if}

	{if $js_rico == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/rico/src/rico.js"></script>
		{/literal}
	{/if}

	{if $js_user == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/user.js"></script>
		{/literal}
	{/if}
	
	{if $js_patient == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/patient.js"></script>
		{/literal}
	{/if}
	
	{if $js_user_services == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/user_services.js"></script>
		{/literal}
	{/if}
	
	{if $js_addressbook == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/addressbook.js"></script>
		{/literal}
	{/if}
	
	{if $js_acte == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/acte.js"></script>
		{/literal}
	{/if}

	{if $js_cecodi == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/cecodi.js"></script>
		{/literal}
	{/if}

	{if $js_protocol == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/protocol.js"></script>
		{/literal}
	{/if}

	{if $js_sumehr == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/sumehr.js"></script>
		{/literal}
	{/if}

	{if $js_debt == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/debt.js"></script>
		<script type="text/javascript" src="include/js/project/patient.js"></script>
		{/literal}
	{/if}

	{if $js_ouvrier == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/ouvrier.js"></script>
		{/literal}
	{/if}

	{if $js_product == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/product.js"></script>
		{/literal}
	{/if}

	{if $js_prevention == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/prevention.js"></script>
		{/literal}
	{/if}

	{if $js_group == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/group.js"></script>
		{/literal}
	{/if}

	{if $js_form == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/form.js"></script>
		{/literal}
	{/if}

	{if $js_agenda == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/agenda.js"></script>
		{/literal}
	{/if}

	{if $js_planning == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/planning.js"></script>
		{/literal}
	{/if}

	{if $js_comptabilite == "yes"}  
		{literal}
			<script type="text/javascript" src="include/js/project/comptabilite.js"></script>
		{/literal}
	{/if}	

	{if $js_workschedule == "yes"}
		{literal}
			<script type="text/javascript" src="include/js/project/workschedule.js"></script>
		{/literal}
	{/if}	

	{if $js_new_datepicker == "yes"}
	        {literal}
	            <link rel="stylesheet" title="Style CSS" href="templates/standard/css/cwcalendar.css" type="text/css" media="all" />
	            <script src="include/js/project/new_datepicker.js"></script>
	        {/literal}
	    {/if}

	{if $js_statistique == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/statistique.js"></script>
		{/literal}
	{/if}

	{if $js_project == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/project/project.js"></script>
		{/literal}
	{/if}

	{if $js_thickbox == "yes"}
		{literal}
		<script type="text/javascript" src="include/js/jquery/thickbox-compressed.js"></script>
		{/literal}
	{/if}
	
	{if $js_jquery_datepicker == "yes"}
		{literal}
			<script src="include/js/jquery/ui/ui.datepicker.js"></script>
		{/literal}
	{/if}
	
	{if $js_jqgrid == "yes"}
		{literal}
			<script src="include/js/jquery.jqGrid-3.8.2/js/jquery.jqGrid.min.js"></script>
			<link rel="stylesheet" href="include/js/jquery.jqGrid-3.8.2/css/ui.jqgrid.css" />
		{/literal}
	{/if}
	
	{if $js_gantt_chart == "yes"}
		{literal}
			<link rel="stylesheet" href="templates/standard/css/gantt/gantt.css" />
			<link rel="stylesheet" href="templates/standard/css/gantt/menu.css" />
			<script src="include/js/gantt/gantt.js"></script>
			<script src="include/js/yui/container_core.js"></script>
			<script src="include/js/yui/menu.js"></script>
		{/literal}
	{/if}

	{if $js_google_visualization_api == "yes"}
		{literal}
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		{/literal}
	{/if}

	{if $js_ui_dropdown == "yes"}
		{literal}
			<script type="text/javascript" src="include/js/jquery.ui.dropdown/ui.dropdownchecklist.js"></script>
		{/literal}
	{/if}
	
</head>
<body class="{$workspaceclass}">

	{if $menu == "yes"}
		{include file="template_header_navigation.tpl"}   
	{/if}

	{if $showheader != "no"}
	{include file="template_header_main.tpl"}
	{/if}
	
