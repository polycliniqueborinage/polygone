<?php /* Smarty version 2.6.19, created on 2012-09-08 09:13:59
         compiled from template_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'template_header.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "lng.conf",'section' => 'strings','scope' => 'global'), $this);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
	<title><?php echo $this->_tpl_vars['title']; ?>
 @ <?php echo $this->_tpl_vars['settings']['name']; ?>
</title>
	
	<link rel="shortcut icon" href="templates/standard/img/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_main.css"/>

	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_form.css"/>

	<link rel="stylesheet" type="text/css" href="templates/standard/css/style_poly.css" />
	
	<?php if ($this->_tpl_vars['js_jquery'] == 'yes'): ?>
		<?php echo '
		<link rel="stylesheet" type="text/css" href="templates/standard/css/jquery-ui.css"/>
		<script type="text/javascript" src="include/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="include/js/jquery/ui/ui.core.js"></script>
		<script type = "text/javascript" src = "include/js/project/ajax.js" ></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery132'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="include/js/jquery-1.3.2/jquery-1.3.2.min.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jquery142'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="include/js/jquery-1.4.2/jquery-1.4.2.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_ui_171'] == 'yes'): ?>
		<?php echo '
			<link rel="stylesheet" href="templates/standard/css/jquery-ui-1.7.1-smoothness/jquery-ui-1.7.1.custom.css" type="text/css" title="ui-theme" />
			<script type="text/javascript" src="include/js/jquery-1.7.1/jquery-ui-1.7.1.custom.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_ajax'] == 'yes'): ?>
		<?php echo '
			<script type = "text/javascript" src = "include/js/project/ajax.js" ></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_full_agenda'] == 'yes'): ?>
		<?php echo '
			<link rel="stylesheet" href="include/js/fullcalendar/fullcalendar.css" type="text/css" />
			<script type="text/javascript" src="include/js/fullcalendar/fullcalendar.js"></script>
		'; ?>
 
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_datatable'] == 'yes'): ?>
		<?php echo '
			<link rel="stylesheet" href="include/js/dataTables-1.6 2/media/css/demo_table.css" type="text/css" title="ui-theme" />
			<script type="text/javascript" src="include/js/dataTables-1.6 2/media/js/jquery.dataTables.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_daterangepicker'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="include/js/daterangepicker/daterangepicker.jQuery.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jqgrid'] == 'yes'): ?>
		<?php echo '
		<link type="text/css" rel="stylesheet" href="include/js/jqgrid/css/ui.jqgrid.css" />
		<script type="text/javascript" src="include/js/jqgrid/src/i18n/grid.locale-en.js" ></script>
		<script type="text/javascript" src="include/js/jqgrid/js/jquery.jqGrid.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jqmodal'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jqmodal/jqModal.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_accordion'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery/ui/ui.accordion.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jquery_form'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery/jquery.form.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jquery_autocomplete'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery/jquery.autocomplete.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jquery_validate'] == 'yes'): ?>
		<?php echo '
		<!-- http://docs.jquery.com/Plugins/Validation/validate -->
		<script type="text/javascript" src="include/js/jquery-validate/jquery.validate.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['tinymce'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/tiny_mce_back/tiny_mce.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['tinymce_jquery'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/tiny_mce/tiny_mce.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_time_line'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/timeline/timeline-api.js"></script>
   		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_time_plot'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/timeplot/1.1/timeplot-api.js" type="text/javascript"></script>
   		'; ?>

	<?php endif; ?>
       
	<?php if ($this->_tpl_vars['js_jquery_progressbar'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/progressbar/jquery.progressbar.min.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_fancybox'] == 'yes'): ?>
		<?php echo '
		<link type="text/css" rel="stylesheet" href="include/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.1.css" />
		<script type="text/javascript" src="include/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_prettyphoto'] == 'yes'): ?>
		<?php echo '
		<link type="text/css" rel="stylesheet" href="include/js/prettyPhoto/css/prettyPhoto.css" />
		<script type="text/javascript" src="include/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_date_parser'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery_datejs/build/date-fr-BE.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_timesheet'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery.timesheet/timesheet.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_filtergrid'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/tablefilter.js"></script>
		'; ?>

	<?php endif; ?>	

	<?php if ($this->_tpl_vars['js_jquery_prettyphoto3'] == 'yes'): ?>
		<?php echo '
		<link type="text/css" rel="stylesheet" href="include/js/prettyPhoto_3/css/prettyPhoto.css" />
		<script type="text/javascript" src="include/js/prettyPhoto_3/js/jquery.prettyPhoto.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['password_strength'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/password_strength/password_strength_plugin.js"></script>
		<script type="text/javascript" src="include/js/password_strength/jquery.pwdstr-1.0.source.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_jquery_multifile'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/multifile/jquery.multifile.pack.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_fg_menu'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/fg-menu/fg.menu.js"></script>
		<link rel="stylesheet" href="include/js/fg-menu/theme/ui.all.css" />
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_rico'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/rico/src/rico.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_user'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/user.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_patient'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/patient.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_addressbook'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/addressbook.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_acte'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/acte.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_cecodi'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/cecodi.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_protocol'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/protocol.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_sumehr'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/sumehr.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_debt'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/debt.js"></script>
		<script type="text/javascript" src="include/js/project/patient.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_ouvrier'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/ouvrier.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_product'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/product.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_prevention'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/prevention.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_group'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/group.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_form'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/form.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_agenda'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/agenda.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_planning'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/planning.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_comptabilite'] == 'yes'): ?>  
		<?php echo '
			<script type="text/javascript" src="include/js/project/comptabilite.js"></script>
		'; ?>

	<?php endif; ?>	

	<?php if ($this->_tpl_vars['js_workschedule'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="include/js/project/workschedule.js"></script>
		'; ?>

	<?php endif; ?>	

	<?php if ($this->_tpl_vars['js_new_datepicker'] == 'yes'): ?>
	        <?php echo '
	            <link rel="stylesheet" title="Style CSS" href="templates/standard/css/cwcalendar.css" type="text/css" media="all" />
	            <script src="include/js/project/new_datepicker.js"></script>
	        '; ?>

	    <?php endif; ?>

	<?php if ($this->_tpl_vars['js_statistique'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/statistique.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_project'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/project/project.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_thickbox'] == 'yes'): ?>
		<?php echo '
		<script type="text/javascript" src="include/js/jquery/thickbox-compressed.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jquery_datepicker'] == 'yes'): ?>
		<?php echo '
			<script src="include/js/jquery/ui/ui.datepicker.js"></script>
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_jqgrid'] == 'yes'): ?>
		<?php echo '
			<script src="include/js/jquery.jqGrid-3.8.2/js/jquery.jqGrid.min.js"></script>
			<link rel="stylesheet" href="include/js/jquery.jqGrid-3.8.2/css/ui.jqgrid.css" />
		'; ?>

	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['js_gantt_chart'] == 'yes'): ?>
		<?php echo '
			<link rel="stylesheet" href="templates/standard/css/gantt/gantt.css" />
			<link rel="stylesheet" href="templates/standard/css/gantt/menu.css" />
			<script src="include/js/gantt/gantt.js"></script>
			<script src="include/js/yui/container_core.js"></script>
			<script src="include/js/yui/menu.js"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_google_visualization_api'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['js_ui_dropdown'] == 'yes'): ?>
		<?php echo '
			<script type="text/javascript" src="include/js/jquery.ui.dropdown/ui.dropdownchecklist.js"></script>
		'; ?>

	<?php endif; ?>
	
</head>
<body class="<?php echo $this->_tpl_vars['workspaceclass']; ?>
">

	<?php if ($this->_tpl_vars['menu'] == 'yes'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header_navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
	<?php endif; ?>

	<?php if ($this->_tpl_vars['showheader'] != 'no'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header_main.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	