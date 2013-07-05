{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_jquery_autocomplete="yes" js_form="yes" js_jquery_validate="yes" }
	
	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
					
					{if $multipleteams == 'X'}
    					<a href="./user_services.php?action=team_calendar">{#navigation_title_user_services_teamcalendar#}</a>
    				{else}
    					<span>{#navigation_title_user_services_teamcalendar#}</span>
    				{/if}	
    				<a href="./user_services.php?action=leave_overview">{#navigation_title_user_services_pending_requests#}</a>
    				<a href="./user_services.php?action=quota_overview">{#navigation_title_user_services_quotas#}</a>
    				<a href="./user_services.php?action=absence_request">{#navigation_title_user_services_leaverequest#}</a>
    				{if $ismanager == 'X'}
    					<a href="./user_services.php?action=tasks_overview">{#navigation_user_mss#}</a>
    					{if $multipleteams == 'X'}
	    					<span>{#navigation_title_user_services_myteamscalendar#}</span>
	    				{else}		
	    					<a href="./user_services.php?action=my_teams_calendar">{#navigation_title_user_services_myteamscalendar#}</a>
	    				{/if}
    				{/if}
    				
    				
				</div>
			
				<div class="ViewPane">
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2>
									<a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('classes');"><img src="./templates/standard/img/symbols/product.png" alt="" />
										<span>{#navigation_title_user_services_teamcalendar#}</span>
									</a>
								</h2>
							</div>
			
							
			
								<div class="block_in_wrapper">
			
									<fieldset>

										<div>
											<div class="row"><center>
											<a href="user_services.php?action=team_calendar&date={$prev_date}">
												<img src="./templates/standard/img/16x16/arrow_left.png" alt="" />
											</a>
											{$mois} {$annee}
											<a href="user_services.php?action=team_calendar&date={$next_date}">
												<img src="./templates/standard/img/16x16/arrow_right.png" alt="" />
											</a>
											</center></div>
										</div>
			
									</fieldset>
									
								
								</div>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								{if $multipleteams == 'X'}
									{section name=myteam loop=$myteams}
										<input id='{$myteams[myteam].id}' type='checkbox' CHECKED onchange="hidediv({$myteams[myteam].id}, {$nb_max_members})" /> {$myteams[myteam].description} <br> 
									{/section}
								{/if}
								
								<div>
								<table cellpadding="0" cellspacing="0" border=1 style="width:100%">
								
									<tr style="display:block;width:100%">
										<th  style="width:15%;"></th>
										{section name=date loop=$dates}
											<th align="center" style="width:{$size}%">
												{$dates[date]}
											</th>
										{/section}
									</tr>
									
									{section name=groupmember loop=$groupmembers}
									<!--<div>-->
									
									<tr id='group-{$groupmembers[groupmember].user_group_id}-line-{$smarty.section.groupmember.iteration}' style="display:block;width:100%">
										<td align="left" style="width:15%">
											{if $groupmembers[groupmember].ID == $groupchief.ID}
												<b><u>
											{/if}	
											
											{if $myuserid == $groupmembers[groupmember].ID}
												{$groupmembers[groupmember].firstname} {$groupmembers[groupmember].familyname}
											{else}	
												{$groupmembers[groupmember].firstname} {$groupmembers[groupmember].familyname} ({$groupmembers[groupmember].user_group})
											{/if}		
													
											{if $groupmembers[groupmember].ID == $groupchief.ID}
												</u></b>
											{/if}  
										</td>
										{section name=day loop=$groupmembers[groupmember] start=11 max=$max}
											{if $smarty.section.day.iteration % 8 == 1}
											{assign var=id 		 value=$smarty.section.day.index-6}
											{assign var=descr	 value=$smarty.section.day.index-5}
											{assign var=begtime  value=$smarty.section.day.index-4}
											{assign var=endtime  value=$smarty.section.day.index-3}
											{assign var=begbreak value=$smarty.section.day.index-2}
											{assign var=endbreak value=$smarty.section.day.index-1}
											<td  align="center" style="background-color:{$groupmembers[groupmember][day.index_next].daycolor};width:{$size}%" 
											    onmouseover="document.getElementById('divdetails-{$smarty.section.groupmember.iteration}-{$smarty.section.day.iteration}').style.display = 'block';document.getElementById('divabs-{$smarty.section.groupmember.iteration}-{$smarty.section.day.iteration}').style.display = 'block'"
											    onmouseout ="document.getElementById('divdetails-{$smarty.section.groupmember.iteration}-{$smarty.section.day.iteration}').style.display = 'none';document.getElementById('divabs-{$smarty.section.groupmember.iteration}-{$smarty.section.day.iteration}').style.display = 'none'">
											{$groupmembers[groupmember][day].nb_hours}
											</td>
											{/if}
										{/section}
									</tr>
									<!--</div>-->
									{/section}
									
								</table>
								
								<br>
								
								<div id="details">
								{section name=groupmember loop=$groupmembers}
									{section name=day loop=$groupmembers[groupmember] start=11 max=$max}
										{if $smarty.section.day.iteration % 8 == 1}
											{assign var=id 		 value=$smarty.section.day.index-6}
											{assign var=descr	 value=$smarty.section.day.index-5}
											{assign var=begtime  value=$smarty.section.day.index-4}
											{assign var=endtime  value=$smarty.section.day.index-3}
											{assign var=begbreak value=$smarty.section.day.index-2}
											{assign var=endbreak value=$smarty.section.day.index-1}
											{assign var=cursor1	 value=$smarty.section.day.index-3}
											{assign var=cursor	 value=$cursor1/8}
										<div id="divdetails-{$smarty.section.groupmember.iteration}-{$smarty.section.day.iteration}" style="display: none; background-color: {$groupmembers[groupmember][day.index_next].daycolor};">
											<u>{$cursor} {$mois} {$annee} - {$groupmembers[groupmember][$descr].description}</u><br>
											{#dico_user_teamcalendar_horaire#}: {$groupmembers[groupmember][$begtime].begtime} - {$groupmembers[groupmember][$endtime].endtime}<br>
											{#dico_user_teamcalendar_break#}: {$groupmembers[groupmember][$begbreak].begbreak} - {$groupmembers[groupmember][$endbreak].endbreak}<br> 
										</div>
										{/if}
									{/section}
								{/section}	
								</div>
								
								<div id="absences">
								{section name=absence loop=$absences}
									{section name=day loop=$absences[absence]}
										
										{assign var=part1  	 value=$smarty.section.day.index+1}
										{assign var=part2  	 value=$part1*8}
										{assign var=part3  	 value=$part2+1}
										{assign var=id 		 value=$part3-8}
									
										<div id="divabs-{$smarty.section.absence.iteration}-{$id}" style="display: none">
											
											{section name=abs loop=$absences[absence][day]}
											{if $smarty.section.abs.iteration == 1}
												<br>
												<u>{#dico_user_teamcalendar_absence#}</u>
												<br>
											{/if}
											{$absences[absence][day][abs].absenceid}: 
												{if $absences[absence][day][abs].beghr == '00:00:00' && $absences[absence][day][abs].endhr == '00:00:00'}
													{#dico_user_teamcalendar_allday#}
												{else}
													{$absences[absence][day][abs].beghr} - {$absences[absence][day][abs].endhr} 
												{/if}
											<br>
											{/section} 
										</div>
									{/section}
								{/section}	
								</div>
											
								</div>
								
								<div class="table_body">
								</div> {*Table_Body End*}
							
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
					
					</div> {*Block B end*}	
					
				</div>
					
			</div>

	</div>
	

	{literal}
		<script type='text/javascript'>
			function hidediv(id, max){ 
				for(i=1; i<=max; i++)
				if(document.getElementById('group-'+id+'-line-'+i)){ 
					if(document.getElementById(id).checked)
						document.getElementById('group-'+id+'-line-'+i).style.display = 'block';
					else 
						document.getElementById('group-'+id+'-line-'+i).style.display = 'none';
				}
				
			}
		</script>
	{/literal}
	
	
