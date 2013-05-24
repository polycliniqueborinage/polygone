
<table  id="timeline1" cellpadding="0" cellspacing="1" border="0" class="thecal" width="100%">

{*calender head bereich*}
	<thead class="calhead">
		<tr>
			<th><a class="scroll_left" href = "javascript:changecalendar('user_menu.php?action=newcal&y={$py}&m={$pm}');"></a></th>
			<th colspan="5" align="center">
				{*lokalisierter monat + jahr ausgeben*}
				{$mstring} {$y}
			</th>
			<th><a class="scroll_right" href = "javascript:changecalendar('user_menu.php?action=newcal&y={$ny}&m={$nm}');"></a></th>
	</tr>
	{*tagesnamen ausgeben*}
	<tr class="dayhead">
		<th>{$langfile.monday}</th>
		<th>{$langfile.tuesday}</th>
		<th>{$langfile.wednesday}</th>
		<th>{$langfile.thursday}</th>
		<th>{$langfile.friday}</th>
		<th>{$langfile.saturday}</th>
		<th>{$langfile.sunday}</th>
	</tr>
	</thead>
	
	<tbody class = "content">

	{section name = week loop=$weeks}
		
		<tr valign="top">
		
		{*tage der aktuellen woche durchlaufen*}
		{section name = day loop=$weeks[week]}
		
			{**}
			{if $weeks[week][day].currmonth == 1}
				{*wenn es heute is, hervorheben*}			
				{if $thism == $m and $thisy == $y and $thisd == $weeks[week][day].val}
				<td class="today" id = "{$weeks[week][day].val}"><a onclick="javascript:changeDay('{$weeks[week][day].date}','week_day');return false;" href="./user_agenda.php?action=day">{$weeks[week][day].val}</a>
				{else}
				<td class="second" id = "{$weeks[week][day].val}"><a href="./user_agenda.php?action=day" onclick="javascript:changeDay('{$weeks[week][day].date}','week_day');return false;">{$weeks[week][day].val}</a>
				{/if}
			{else}
				<td class="othermonth" id = "{$weeks[week][day].val}">{$weeks[week][day].val}
			{/if}
			
			{*only output tasks/milestones if the day belongs to the current month*}
			{if $weeks[week][day].currmonth == 1}

			<div class="calcontent">
			
					{*Agenda*}
					{if $weeks[week][day].agendasnum > 0}

						<a href="./user_agenda.php?action=day" onclick="javascript:changeDay('{$weeks[week][day].date}','week_day');return false;">
							<img src = "templates/standard/images/symbols/miles.png" alt = "">
						</a>

					{/if}

					{*Milestones des tages*}
					{if $weeks[week][day].milesnum > 0}
						<a href = "#miles{$weeks[week][day].val}" id = "mileslink{$weeks[week][day].val}" ><img src = "templates/standard/images/symbols/miles.png" alt = ""></a>
						<div id = "miles{$weeks[week][day].val}" style = "display:none;">
							<div class="modaltitle">
								<img src="./templates/standard/images/symbols/miles.png" alt="" />{$langfile.milestones} {$m}.{$weeks[week][day].val}.{$y}
								<a class="winclose" href="javascript:Control.Modal.close();"></a>
							</div>
							<div class="inmodal">
								<div class="miles">
									<div class="block">
									<table class="acc_modal" id="acc_m" cellpadding="0" cellspacing="0" border="0">
										<colgroup>
											<col class="m_a" />
											<col class="m_b" />
											<col class="m_c" />
										</colgroup>
										<thead>
											<th></th>
											<th>{$langfile.milestone}</th>
											<th class="tools">{$langfile.daysleft}</th>
										</thead>
										{section name = stone loop=$weeks[week][day].milestones}
											{if $smarty.section.stone.index % 2 == 0}
											<tbody class="color-a" id="mile_m_{$weeks[week][day].milestones[stone].ID}">
											{else}
											<tbody class="color-b" id="mile_m_{$weeks[week][day].milestones[stone].ID}">
											{/if}	
											<tr {if $weeks[week][day].milestones[stone].daysleft < 0} class="marker-late"{elseif $weeks[week][day].milestones[stone].daysleft == 0} class="marker-today"{/if}>		
												<td class="icon"><img src="./templates/standard/images/symbols/miles.png" alt="" /></td>				
												<td>
													<div class="toggle-in">
														<span class="acc-toggle" onclick="javascript:accord_m.activate($$('#acc_m .accordion_toggle')[{$smarty.section.stone.index}]);toggleAccordeon('acc_m',this);"></span>
														<a href="managemilestone.php?action=showmilestone&amp;msid={$weeks[week][day].milestones[stone].ID}&amp;id={$weeks[week][day].milestones[stone].project}" title="{$weeks[week][day].milestones[stone].title}">
															{$weeks[week][day].milestones[stone].name|truncate:30:"...":true}
														</a>
													</div>
												</td>
												<td class="tools">{$weeks[week][day].milestones[stone].daysleft}</td>
											</tr>

											<tr class="acc">												
												<td colspan="3">
												<div class="accordion_toggle"></div>				
													<div class="accordion_content">											
														<div class="content_in">
																{$weeks[week][day].milestones[stone].desc}
														</div>											
													</div>
												</td>													
											</tr>
										</tbody>											
										{/section}
									</table>
									</div>
								</div>										
							</div>
						</div>

					{/if}
					
					
					{*Tasks*}
					{if $weeks[week][day].tasksnum > 0}
						<a href = "#tasks{$weeks[week][day].val}" id = "tasklink{$weeks[week][day].val}" ><img src = "templates/standard/images/symbols/task.png" alt = ""></a>
						<div id = "tasks{$weeks[week][day].val}" style = "display:none;">
							<div class="modaltitle">
								<img src="./templates/standard/images/symbols/tasklist.png" alt="" />{$langfile.tasklist} {$m}.{$weeks[week][day].val}.{$y}
								<a class="winclose" href="javascript:Control.Modal.close();"></a>
							</div>						
							<div class="inmodal">
								<div class="tasks">
									<div class="block">

									<table class="acc_modal" id="acc_mb_{$weeks[week][day].val}" cellpadding="0" cellspacing="0" border="0">
										<colgroup>
											<col class="m_a" />
											<col class="m_b" />
											<col class="m_c" />
										</colgroup>
										<thead>
											<th></th>
											<th>{$langfile.task}</th>
											<th class="tools">{$langfile.daysleft}</th>
										</thead>
										{section name = task loop=$weeks[week][day].tasks}	
											{if $smarty.section.task.index % 2 == 0}
											<tbody class="color-a" id="task_m_{$weeks[week][day].tasks[task].ID}">
											{else}
											<tbody class="color-b" id="task_m_{$weeks[week][day].tasks[task].ID}">
											{/if}			
											<tr {if $weeks[week][day].tasks[task].daysleft < 0} class="marker-late"{elseif $weeks[week][day].tasks[task].daysleft == 0} class="marker-today"{/if}>		
												<td class="icon"><img src="./templates/standard/images/symbols/task.png" alt="" /></td>				
												<td>
													<div class="toggle-in">
														<span class="acc-toggle" onclick="javascript:accord_mb_{$weeks[week][day].val}.activate($$('#acc_mb_{$weeks[week][day].val} .accordion_toggle')[{$smarty.section.task.index}]);toggleAccordeon('acc_mb_{$weeks[week][day].val}',this);"></span>
														<a href="managetask.php?action=showtask&amp;tid={$weeks[week][day].tasks[task].ID}&amp;id={$weeks[week][day].tasks[task].project}" title="{$weeks[week][day].tasks[task].title}">
															{$weeks[week][day].tasks[task].title|truncate:30:"...":true}
														</a>
													</div>
												</td>
												<td class="tools">{$weeks[week][day].tasks[task].daysleft}</td>
											</tr>

											<tr class="acc">												
												<td colspan="3">
												<div class="accordion_toggle"></div>				
													<div class="accordion_content">											
														<div class="content_in">
																{$weeks[week][day].tasks[task].text}
														</div>											
													</div>
												</td>													
											</tr>
										</tbody>
																		
										{/section}
											
									</table>
									</div>
								</div>
							</div>
						</div>

						
					{/if} {*Tasks End*}
			</div> {*calcontent End*}
			
				
			
			{/if}
			
			</td>
			
	
		{*ende des tages*}
		{/section}
		</tr>
		
	{*ende der woche*}
	{/section}

	</tbody>
</table>
{*loading indicator off*}
