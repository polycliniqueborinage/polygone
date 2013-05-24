<?php /* Smarty version 2.6.19, created on 2013-04-12 09:46:28
         compiled from template_management_prevention_timeplot.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'template_management_prevention_timeplot.tpl', 35, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_header.tpl", 'smarty_include_vars' => array('js_jquery132' => 'yes','js_jquery_ui_171' => 'yes','js_ajax' => 'yes','js_time_plot' => 'yes','js_prevention' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="middle">
    	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_primary_tabs_management_no_current.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
   
    				<a href="./management_prevention.php"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_status']; ?>
</a>

    				<a href="./management_prevention.php?action=list"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list']; ?>
</a>

    				<a href="./management_prevention.php?action=list_deleted"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_list_deleted']; ?>
</a>

    				<a href="./management_prevention.php?action=activation"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_activation']; ?>
</a>

    				<a href="./management_prevention.php?action=add"><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_add']; ?>
</a>

					<span><?php echo $this->_config[0]['vars']['dico_management_prevention_menu_timeplot']; ?>
</span> 

				</div>
				
				<div class="ViewPane">
				
					<div id="tab_content">
						
					
						<ul>
							<?php unset($this->_sections['motif']);
$this->_sections['motif']['name'] = 'motif';
$this->_sections['motif']['loop'] = is_array($_loop=$this->_tpl_vars['motifs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['motif']['show'] = true;
$this->_sections['motif']['max'] = $this->_sections['motif']['loop'];
$this->_sections['motif']['step'] = 1;
$this->_sections['motif']['start'] = $this->_sections['motif']['step'] > 0 ? 0 : $this->_sections['motif']['loop']-1;
if ($this->_sections['motif']['show']) {
    $this->_sections['motif']['total'] = $this->_sections['motif']['loop'];
    if ($this->_sections['motif']['total'] == 0)
        $this->_sections['motif']['show'] = false;
} else
    $this->_sections['motif']['total'] = 0;
if ($this->_sections['motif']['show']):

            for ($this->_sections['motif']['index'] = $this->_sections['motif']['start'], $this->_sections['motif']['iteration'] = 1;
                 $this->_sections['motif']['iteration'] <= $this->_sections['motif']['total'];
                 $this->_sections['motif']['index'] += $this->_sections['motif']['step'], $this->_sections['motif']['iteration']++):
$this->_sections['motif']['rownum'] = $this->_sections['motif']['iteration'];
$this->_sections['motif']['index_prev'] = $this->_sections['motif']['index'] - $this->_sections['motif']['step'];
$this->_sections['motif']['index_next'] = $this->_sections['motif']['index'] + $this->_sections['motif']['step'];
$this->_sections['motif']['first']      = ($this->_sections['motif']['iteration'] == 1);
$this->_sections['motif']['last']       = ($this->_sections['motif']['iteration'] == $this->_sections['motif']['total']);
?>
							<li>
								<a href="#fragment-<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "...", true) : smarty_modifier_truncate($_tmp, 10, "...", true)); ?>
</span></a>
							</li>
							<?php endfor; endif; ?>
						</ul>
						
						<?php unset($this->_sections['motif']);
$this->_sections['motif']['name'] = 'motif';
$this->_sections['motif']['loop'] = is_array($_loop=$this->_tpl_vars['motifs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['motif']['show'] = true;
$this->_sections['motif']['max'] = $this->_sections['motif']['loop'];
$this->_sections['motif']['step'] = 1;
$this->_sections['motif']['start'] = $this->_sections['motif']['step'] > 0 ? 0 : $this->_sections['motif']['loop']-1;
if ($this->_sections['motif']['show']) {
    $this->_sections['motif']['total'] = $this->_sections['motif']['loop'];
    if ($this->_sections['motif']['total'] == 0)
        $this->_sections['motif']['show'] = false;
} else
    $this->_sections['motif']['total'] = 0;
if ($this->_sections['motif']['show']):

            for ($this->_sections['motif']['index'] = $this->_sections['motif']['start'], $this->_sections['motif']['iteration'] = 1;
                 $this->_sections['motif']['iteration'] <= $this->_sections['motif']['total'];
                 $this->_sections['motif']['index'] += $this->_sections['motif']['step'], $this->_sections['motif']['iteration']++):
$this->_sections['motif']['rownum'] = $this->_sections['motif']['iteration'];
$this->_sections['motif']['index_prev'] = $this->_sections['motif']['index'] - $this->_sections['motif']['step'];
$this->_sections['motif']['index_next'] = $this->_sections['motif']['index'] + $this->_sections['motif']['step'];
$this->_sections['motif']['first']      = ($this->_sections['motif']['iteration'] == 1);
$this->_sections['motif']['last']       = ($this->_sections['motif']['iteration'] == $this->_sections['motif']['total']);
?>
							<div id="fragment-<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
" class="block_in_wrapper">
						        <div class="label">
						        <?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['description']; ?>

						        </div>
						        <div id="timeplot<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
" class="timeplot" style="height: 300px;"></div>
							</div>
						<?php endfor; endif; ?>
					
					</div>
					
				</div>
					
			</div>

		</div>

	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php unset($this->_sections['motif']);
$this->_sections['motif']['name'] = 'motif';
$this->_sections['motif']['loop'] = is_array($_loop=$this->_tpl_vars['motifs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['motif']['show'] = true;
$this->_sections['motif']['max'] = $this->_sections['motif']['loop'];
$this->_sections['motif']['step'] = 1;
$this->_sections['motif']['start'] = $this->_sections['motif']['step'] > 0 ? 0 : $this->_sections['motif']['loop']-1;
if ($this->_sections['motif']['show']) {
    $this->_sections['motif']['total'] = $this->_sections['motif']['loop'];
    if ($this->_sections['motif']['total'] == 0)
        $this->_sections['motif']['show'] = false;
} else
    $this->_sections['motif']['total'] = 0;
if ($this->_sections['motif']['show']):

            for ($this->_sections['motif']['index'] = $this->_sections['motif']['start'], $this->_sections['motif']['iteration'] = 1;
                 $this->_sections['motif']['iteration'] <= $this->_sections['motif']['total'];
                 $this->_sections['motif']['index'] += $this->_sections['motif']['step'], $this->_sections['motif']['iteration']++):
$this->_sections['motif']['rownum'] = $this->_sections['motif']['iteration'];
$this->_sections['motif']['index_prev'] = $this->_sections['motif']['index'] - $this->_sections['motif']['step'];
$this->_sections['motif']['index_next'] = $this->_sections['motif']['index'] + $this->_sections['motif']['step'];
$this->_sections['motif']['first']      = ($this->_sections['motif']['iteration'] == 1);
$this->_sections['motif']['last']       = ($this->_sections['motif']['iteration'] == $this->_sections['motif']['total']);
?>
		<?php echo '
		<script>
			var timeplot'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ';
			var dataURL'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ' = "management_prevention.php?action=timeplot_data&id='; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '";
  		</script>
		'; ?>

	<?php endfor; endif; ?>
	
	
	<?php echo '
	<script>
		
        
        function onLoad() {
        
		  	'; ?>

		  		<?php unset($this->_sections['motif']);
$this->_sections['motif']['name'] = 'motif';
$this->_sections['motif']['loop'] = is_array($_loop=$this->_tpl_vars['motifs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['motif']['show'] = true;
$this->_sections['motif']['max'] = $this->_sections['motif']['loop'];
$this->_sections['motif']['step'] = 1;
$this->_sections['motif']['start'] = $this->_sections['motif']['step'] > 0 ? 0 : $this->_sections['motif']['loop']-1;
if ($this->_sections['motif']['show']) {
    $this->_sections['motif']['total'] = $this->_sections['motif']['loop'];
    if ($this->_sections['motif']['total'] == 0)
        $this->_sections['motif']['show'] = false;
} else
    $this->_sections['motif']['total'] = 0;
if ($this->_sections['motif']['show']):

            for ($this->_sections['motif']['index'] = $this->_sections['motif']['start'], $this->_sections['motif']['iteration'] = 1;
                 $this->_sections['motif']['iteration'] <= $this->_sections['motif']['total'];
                 $this->_sections['motif']['index'] += $this->_sections['motif']['step'], $this->_sections['motif']['iteration']++):
$this->_sections['motif']['rownum'] = $this->_sections['motif']['iteration'];
$this->_sections['motif']['index_prev'] = $this->_sections['motif']['index'] - $this->_sections['motif']['step'];
$this->_sections['motif']['index_next'] = $this->_sections['motif']['index'] + $this->_sections['motif']['step'];
$this->_sections['motif']['first']      = ($this->_sections['motif']['iteration'] == 1);
$this->_sections['motif']['last']       = ($this->_sections['motif']['iteration'] == $this->_sections['motif']['total']);
?>
					<?php echo '
					
						var eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ' = new Timeplot.DefaultEventSource();
						
						var timeGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ' = new Timeplot.DefaultTimeGeometry({
						    gridColor: new Timeplot.Color("#000000"),
						    axisLabelsPlacement: "top"
					  	});
			
						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_1 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#000000",
						    axisLabelsPlacement: "right",
							min: 0
					  	});

						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_2 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#000000",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
						
						var valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_3 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#ff11dd",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
						
						var plotInfo'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ' = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ',1),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_2,
						      	lineColor: "black",
						      	fillColor: "#eeeeee",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_2",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ',2),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "green",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_3",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ',3),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_1,
						      	lineColor: "#ff0000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_4",
							    dataSource: new Timeplot.ColumnSource(eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ',4),
						      	valueGeometry: valueGeometry'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '_3,
						      	lineColor: "#ff11dd",
						      	showValues: true
					    	})
					  	];
				  	
				  		timeplot'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ' = Timeplot.create(document.getElementById("timeplot'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '"), plotInfo'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ');
		            	timeplot'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo '.loadText(dataURL'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ', ",", eventSource'; ?>
<?php echo $this->_tpl_vars['motifs'][$this->_sections['motif']['index']]['ID']; ?>
<?php echo ');
		            	
					'; ?>

				<?php endfor; endif; ?>
		  	<?php echo '

        }
        
        
        
		$(document).ready(function(){
			onLoad();
    		$("#tab_content").tabs();
  		});
  	</script>
	'; ?>

	
	

