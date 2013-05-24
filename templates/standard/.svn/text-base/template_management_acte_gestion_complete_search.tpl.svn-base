<ul id='accordion_messages'>

{section name=acte loop=$actes}
	
	{if $smarty.section.acte.index % 2 == 0}
		<li class="bg_a">
	{else}
		<li class="bg_b">
	{/if}
	
	<table cellpadding='0' cellspacing='0' width='100%'>
	<tr>
	<td class='b' style='width:2%'></td>
	<td class='b' style='width:3%'><a href='#' title='dd' onclick="javascript:deleteConfirmBox({$actes[acte].ID})"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
	<td class='b' style='width:3%'><a href='management_acte.php?action=view&id={$actes[acte].ID}' title='dd'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
	<td class='b' style='width:3%'><a href='management_acte.php?action=edit&id={$actes[acte].ID}' title='dd'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
	<td class='b' style='width:15%'>{$actes[acte].code}</td>
	<td class='b' style='width:24%'>{$actes[acte].description}</td>
	<td class='b' style='width:15%'>{$actes[acte].cecodis}</td>
	<td class='b' style='width:7%'>{$actes[acte].couttr}</td>
	<td class='b' style='width:7%'>{$actes[acte].couttp}</td>
	<td class='b' style='width:7%'>{$actes[acte].coutvp}</td>
	<td class='b' style='width:7%'>{$actes[acte].coutsm}</td>
	<td class='b' style='width:7%'>{$actes[acte].length}</td>
	</table>
	</li>

{/section}
</ul>