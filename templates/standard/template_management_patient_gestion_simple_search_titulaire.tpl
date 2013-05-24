<ul id='accordion_messages'>

{section name=titulaire loop=$titulaires}
	
	{if $smarty.section.titulaire.index % 2 == 0}
		<li class="bg_a">
	{else}
		<li class="bg_b">
	{/if}
	
	<a href="#" onclick="javascript:titulaireAutoComplete('', {$titulaires[titulaire].ID})">{$titulaires[titulaire].familyname} {$titulaires[titulaire].firstname}</a>

	</li>
	
{/section}
</ul>