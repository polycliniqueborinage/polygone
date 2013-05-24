<table cellpadding="0" cellspacing="0" border="0">

	<thead>
					
	<tr>
						
	<th class="tools"></th>
	<th>{$start}</th>
	<th>{$end}</th>
	<th>{$patient}</th>
	<th>{$motif}</th>
	<th>{$location}</th>
	<th>{$comment}</th>
												
	</tr>
							
	</thead>

	<tfoot>
	<tr>
	<td colspan="5"></td>
	</tr>
	</tfoot>
												
{section name=agenda loop=$agendas}

{*Color-Mix*}

	{if $smarty.section.agenda.index % 2 == 0}
	<tbody class="color-a">
	{else}
	<tbody class="color-b">
	{/if}
	
	<tr>
	<td class="tools">
		<a class="tool_view" href="#" onclick="javascript:viewConsultation({$agendas[agenda].ID});" title="{#dico_management_prevention_detail#}" ></a>
		<a class="tool_edit" onclick="javascript:editConsultation({$agendas[agenda].ID});"  title="{#dico_management_prevention_edit#}" ></a>
		<a class="tool_del" href="#" onclick="javascript:deleteConsultationBox({$agendas[agenda].ID});" title="{#dico_management_prevention_delete#}" ></a>
	</td>
	<td>
	{$agendas[agenda].start}
	</td>
	<td>
	{$agendas[agenda].end}
    </td>
	<td>
	{$agendas[agenda].patient}
    </td>
	<td>
	{$agendas[agenda].motif}
    </td>
	<td>
	{$agendas[agenda].location}
    </td>
	<td>
	{$agendas[agenda].comment|truncate:30:"...":true}
    </td>
    </tr>
	</tbody>
												
													
{/section}

	</table>
