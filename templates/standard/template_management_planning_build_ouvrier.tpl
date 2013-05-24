{foreach from=$ouvriers key=id item=ouvrier}
	{if $id != '9999999'}
	<div class="worker" id="worker_{$ouvrier.ID}" style="height: {$height}px;background:#E00000}">
		<div style="float:left">
			<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
		</div>
		<div style="float:left">
			<span>{$ouvrier.nom}</span>
			<span>{$ouvrier.prenom}</span>
		</div>
	</div>
	{/if}
{/foreach}
