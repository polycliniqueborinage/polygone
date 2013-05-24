<ul id='accordion_messages'>

	{section name=protocol loop=$protocols}
	
		{if $smarty.section.protocol.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:20%'>{$protocols[protocol].patient}</td>
			<td class='b' style='width:20%'>{$protocols[protocol].user_sender}</td>
			<td class='b' style='width:20%'>{$protocols[protocol].user_recipient}</td>
			<td class='b' style='width:20%'>{$protocols[protocol].date}</td>
			<td class="tools">
			<a class="tool_html" href='#' title='{$export_html}' onclick="javascript:exportProtocol({$protocols[protocol].ID},'html')"/>
			<a class="tool_pdf" href='#' title='{$export_pdf}' onclick="javascript:exportProtocol({$protocols[protocol].ID},'pdf')"/>
			<a class="tool_rtf" href='#' title='{$export_rtf}' onclick="javascript:exportProtocol({$protocols[protocol].ID},'rtf')"/>
			<a class="tool_xml" href='#' title='{$export_xml}' onclick="javascript:exportProtocol({$protocols[protocol].ID},'xml')"/>
			</td>
			</table>
			</li>

	{/section}	
	
	{section name=sumehr loop=$sumehrs}
	
		{if $smarty.section.sumehr.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools">
				<a class="tool_view" href='user_sumehr.php?action=view&patient_id={$sumehrs[sumehr].patient_id}' title='{$detail_alt}'/>
			</td>
			<td class='b' style='width:30%'>{$sumehrs[sumehr].patient_familyname}</td>
			<td class='b' style='width:30%'>{$sumehrs[sumehr].patient_firstname}</td>
			<td class='b' style='width:18%'>{$sumehrs[sumehr].patient_birthdate}</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].latest_modification_date}</td>
			</table>
			</li>

	{/section}
	
	{section name=exam loop=$exams}
	
		{if $smarty.section.exam.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools">
				<a class="tool_view" href='user_sumehr.php?action=view_analyse&patient_id={$exams[exam].patient_id}&examen_id={$exams[exam].examen_id}' title='{$detail_alt}'/>
			</td>
			<td class='b' style='width:35%'>{$exams[exam].patient_prenom} {$exams[exam].patient_nom}</td>
			<td class='b' style='width:20%'>{$exams[exam].examen_date}</td>
			<td class='b' style='width:35%'>Dr {$exams[exam].medecin_prenom} {$exams[exam].medecin_nom}</td>
			</table>
			</li>

	{/section}
	
</ul>

	