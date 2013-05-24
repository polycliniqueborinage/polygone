<ul id='accordion_messages'>

{section name=patient loop=$patients}
	
	{if $smarty.section.patient.index % 2 == 0}
		<li class="bg_a">
	{else}
		<li class="bg_b">
	{/if}
	
	<a href="#" onclick="javascript:patientAutoComplete({$patients[patient].ID})" title="{$patients[patient].creation_date} {$patients[patient].amount} {#dico_general_devise#}">{$patients[patient].familyname} {$patients[patient].firstname} ({$patients[patient].amount} {#dico_general_devise#})</a>

	</li>
	
{/section}
</ul>