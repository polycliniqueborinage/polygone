{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_statistique="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				</div>
			
				<div class="ViewPane">
	
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					<div class="infowin_left" id = "systemmsg">
						{if $mode == "deleted"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_wasdeleted#}</span>
						{elseif $mode == "added"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_wasadded#}</span>
						{elseif $mode == "deassigned"}
						<span class="info_in_red"><img src="templates/standard/img/symbols/projects.png" alt=""/>{#dico_admin_people_group_deassigned#}</span>
						{/if}
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg');
					</script>
				
					<div class="block_a">
	
						<div class="in">
			
							<div class="headline">
						
								<h2><a href="#" id="projects_toggle" class="win_block" onclick = "toggleBlock('projects');"><img src="./templates/standard/img/symbols/projects.png" alt="" />
									<span>{#dico_admin_statistique_graphe#}</span></a>
								</h2>
			
							</div>
		
						</div> {*IN end*}
			
					</div> {*Block A end*}
					
					<div class="block_c">
	
						<div class="in">
			
							<div class="headline">
						
								<h2><a href="#" id="projects_toggle" class="win_block" onclick = "toggleBlock('projects');"><img src="./templates/standard/img/symbols/projects.png" alt="" />
									<span>{#dico_admin_statistique_table#}</span></a>
								</h2>
			
							</div>
		
						</div> {*IN end*}
			
					</div> {*Block B end*}
				
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" statistique_pourcent="yes"}
