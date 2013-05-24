{include file="template_header.tpl" js_jquery="yes" js_jquery_accordion="yes" js_jquery_datepicker="yes" js_jquery_form="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
				</div>
			
				<div class="ViewPane">
				
					<input type = "hidden" name = "selectedid" id  = "selectedid"/> {*required object for focus cells*}

					<div class="infowin_left" style = "display:none;" id = "systemmsg">
						{if $mode == "edited"}
						<span class="info_in_yellow"><img src="templates/standard/img/symbols/system.png" alt=""/>{#settingschanged#}</span>
						{elseif $mode == "imported"}
						<span class="info_in_green"><img src="templates/standard/img/symbols/basecamp-import.png" alt=""/>{#importsuccess#}<br />
						{#projects#}: {$procount}
						</span>
						{/if}
					</div>

					<script>
						systemeMessage('systemmsg');
					</script>
		
					<div class="block_b">
					<div class="in">
						<div class="headline">
						<h2><a href="#" id="admin_toggle" class="win_block" onclick = "toggleBlock('admin');"><img src="./templates/standard/img/symbols/system.png" alt="" />
						<span>{#dico_admin_statistique_graphe#}</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							JE SUIS LES STATS
		
						</div> {*block_in_wrapper end*}
						</div> {*admin end*}
					</div> {*IN end*}
					</div> {*Block C end*}
					
				
					<div class="block_c">
					<div class="in">
						<div class="headline">
						<h2><a href="#" id="admin_toggle" class="win_block" onclick = "toggleBlock('admin');"><img src="./templates/standard/img/symbols/system.png" alt="" />
						<span>{#dico_admin_statistique_table#}</span></a>
						</h2>
						</div>
						<div id="admin">
						<div class="block_in_wrapper">
		
							JE SUIS LES STATS
		
						</div> {*block_in_wrapper end*}
						</div> {*admin end*}
					</div> {*IN end*}
					</div> {*Block C end*}
			

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl"}

	{include file="template_right.tpl"}
	