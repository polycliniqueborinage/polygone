{section name=agenda loop=$agendas}

<div class="chip" id="chip{$agendas[agenda].ID}" onclick="" ondblclick="#">
	<div class="chipbody edit" style="background-color: rgb(102, 140, 217);">
		<dl style="border-color: rgb(41, 82, 163); height: 50px;">
			<dt id="moveChip" style="background-color: rgb(41, 82, 163);">
				<b unselectable="on" style="">
					<span class="timelabel">{$agendas[agenda].start} - {$agendas[agenda].end} - calcus david antoine</span>
				</b>
			</dt>
			<div><span style="cursor: pointer;" onclick="#">{$agendas[agenda].length}</span></div>
			<div id="resizeChip">---</div>
		</dl>
	</div>
</div>
	
{/section}