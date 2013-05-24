{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_ajax="yes" js_time_plot="yes" js_prevention="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_management_no_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
   
    				<a href="./management_prevention.php">{#dico_management_prevention_menu_status#}</a>

    				<a href="./management_prevention.php?action=list">{#dico_management_prevention_menu_list#}</a>

    				<a href="./management_prevention.php?action=list_deleted">{#dico_management_prevention_menu_list_deleted#}</a>

    				<a href="./management_prevention.php?action=activation">{#dico_management_prevention_menu_activation#}</a>

    				<a href="./management_prevention.php?action=add">{#dico_management_prevention_menu_add#}</a>

					<span>{#dico_management_prevention_menu_timeplot#}</span> 

				</div>
				
				<div class="ViewPane">
				
					<div id="tab_content">
						
					
						<ul>
							{section name=motif loop=$motifs}
							<li>
								<a href="#fragment-{$motifs[motif].ID}"><span>{$motifs[motif].description|truncate:10:"...":true}</span></a>
							</li>
							{/section}
						</ul>
						
						{section name=motif loop=$motifs}
							<div id="fragment-{$motifs[motif].ID}" class="block_in_wrapper">
						        <div class="label">
						        {$motifs[motif].description}
						        </div>
						        <div id="timeplot{$motifs[motif].ID}" class="timeplot" style="height: 300px;"></div>
							</div>
						{/section}
					
					</div>
					
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl"}
	
	{section name=motif loop=$motifs}
		{literal}
		<script>
			var timeplot{/literal}{$motifs[motif].ID}{literal};
			var dataURL{/literal}{$motifs[motif].ID}{literal} = "management_prevention.php?action=timeplot_data&id={/literal}{$motifs[motif].ID}{literal}";
  		</script>
		{/literal}
	{/section}
	
	
	{literal}
	<script>
		
        
        function onLoad() {
        
		  	{/literal}
		  		{section name=motif loop=$motifs}
					{literal}
					
						var eventSource{/literal}{$motifs[motif].ID}{literal} = new Timeplot.DefaultEventSource();
						
						var timeGeometry{/literal}{$motifs[motif].ID}{literal} = new Timeplot.DefaultTimeGeometry({
						    gridColor: new Timeplot.Color("#000000"),
						    axisLabelsPlacement: "top"
					  	});
			
						var valueGeometry{/literal}{$motifs[motif].ID}{literal}_1 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#000000",
						    axisLabelsPlacement: "right",
							min: 0
					  	});

						var valueGeometry{/literal}{$motifs[motif].ID}{literal}_2 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#000000",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
						
						var valueGeometry{/literal}{$motifs[motif].ID}{literal}_3 = new Timeplot.DefaultValueGeometry({
						    gridColor: "#ff11dd",
						    axisLabelsPlacement: "left",
							min: 0
					  	});
						
						var plotInfo{/literal}{$motifs[motif].ID}{literal} = [
					    	Timeplot.createPlotInfo({
						      	id: "plot_{/literal}{$motifs[motif].ID}{literal}_1",
						      	dataSource: new Timeplot.ColumnSource(eventSource{/literal}{$motifs[motif].ID}{literal},1),
						      	valueGeometry: valueGeometry{/literal}{$motifs[motif].ID}{literal}_2,
						      	lineColor: "black",
						      	fillColor: "#eeeeee",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_{/literal}{$motifs[motif].ID}{literal}_2",
							    dataSource: new Timeplot.ColumnSource(eventSource{/literal}{$motifs[motif].ID}{literal},2),
						      	valueGeometry: valueGeometry{/literal}{$motifs[motif].ID}{literal}_1,
						      	lineColor: "green",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_{/literal}{$motifs[motif].ID}{literal}_3",
							    dataSource: new Timeplot.ColumnSource(eventSource{/literal}{$motifs[motif].ID}{literal},3),
						      	valueGeometry: valueGeometry{/literal}{$motifs[motif].ID}{literal}_1,
						      	lineColor: "#ff0000",
						      	showValues: true
					    	}),
						    Timeplot.createPlotInfo({
							    id: "plot_{/literal}{$motifs[motif].ID}{literal}_4",
							    dataSource: new Timeplot.ColumnSource(eventSource{/literal}{$motifs[motif].ID}{literal},4),
						      	valueGeometry: valueGeometry{/literal}{$motifs[motif].ID}{literal}_3,
						      	lineColor: "#ff11dd",
						      	showValues: true
					    	})
					  	];
				  	
				  		timeplot{/literal}{$motifs[motif].ID}{literal} = Timeplot.create(document.getElementById("timeplot{/literal}{$motifs[motif].ID}{literal}"), plotInfo{/literal}{$motifs[motif].ID}{literal});
		            	timeplot{/literal}{$motifs[motif].ID}{literal}.loadText(dataURL{/literal}{$motifs[motif].ID}{literal}, ",", eventSource{/literal}{$motifs[motif].ID}{literal});
		            	
					{/literal}
				{/section}
		  	{literal}

        }
        
        
        
		$(document).ready(function(){
			onLoad();
    		$("#tab_content").tabs();
  		});
  	</script>
	{/literal}
	
	


