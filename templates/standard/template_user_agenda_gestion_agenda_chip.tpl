{section name=agenda loop=$agendas}
<div class="chip" dayofweek="{$dayofweek}" day="{$agendas[agenda].date}" id="chip{$agendas[agenda].ID}" style="height: {$agendas[agenda].length}px; width: {$agendas[agenda].size}%; background-color: {$agendas[agenda].color2}; top: {$agendas[agenda].top}px; left: {$agendas[agenda].left}%;" ondblclick="javascript:viewConsultation({$agendas[agenda].ID});">
	<div class="title" style="background-color: {$agendas[agenda].color1};">
		{if $templ == "day"}
			<span class="timelabel">{$agendas[agenda].start} - {$agendas[agenda].end} -  {$agendas[agenda].patient} - {$agendas[agenda].motif}</span>
		{/if}
		{if $templ == "week"}
			<span class="timelabel">{$agendas[agenda].patient}</span>
		{/if}
	</div>
	<div class="content">Product showcase</div>
	<div class="resizeChip" unselectable="on" style="-moz-user-select: none;"/>
</div>

{/section}