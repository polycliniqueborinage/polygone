<ul id='accordion_messages'>
{section name=acte loop=$actes}
	
	{if $smarty.section.acte.index % 2 == 0}
		<li class="bg_a">
	{else}
		<li class="bg_b">
	{/if}
	
	<a href="#" onclick="javascript:acteAutoComplete({$actes[acte].ID})" title="">{$actes[acte].code}</a>

	</li>
{/section}
</ul>