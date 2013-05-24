{foreach from=$ouvriers key=id item=ouvrier}

	{if $ouvrier.ID != ''}
		<div style="height: {$height}px;" class="selectableitem2">
			<a href="#" onclick="javascript:openUserDeleteBox({$ouvrier.ID});return false;" title="Suppression" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
			{$ouvrier.week_hour} H
		</div>
		<div style="height: {$height}px;" class="selectableitem2 zebra2">
			<a href="management_planning.php?action=simple_pdf&ouvrier_ID={$ouvrier.ID}" title="PDF" target="_blank" class="pdf">&nbsp;&nbsp;&nbsp;&nbsp;</a>
			{$ouvrier.week_salaire_net}
		</div>
	{/if}
	
	{if $ouvrier.ID == ''}
		<div style="height: {$height}px;" class="selectableitem2">
			<a href="#" onclick="javascript:openAllDeleteBox();return false;" title="" class="del">&nbsp;&nbsp;&nbsp;&nbsp;</a>
			{$ouvrier.week_hour} H
		</div>
		<div style="height: {$height}px;" class="selectableitem2 zebra2">
			<a href="management_planning.php?action=global_pdf" title="PDF" target="_blank" class="pdf">&nbsp;&nbsp;&nbsp;&nbsp;</a>
			{$ouvrier.week_salaire_net}
		</div>
	{/if}

{/foreach}