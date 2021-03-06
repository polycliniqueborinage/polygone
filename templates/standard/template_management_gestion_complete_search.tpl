<ul id='accordion_messages'>

	{section name=planning loop=$plannings}
    
        {if $smarty.section.planning.index % 2 == 0}
            <li class="bg_a">
        {else}
            <li class="bg_b">
        {/if}
    
            <table cellpadding='0' cellspacing='0' width='100%'>
            <tr>
            <td class='b' style='width:2%'></td>
            <td class="tools" style='width:9%'>
                <a class="tool_del"  href='#' title='{$delete_alt}' onclick="javascript:openDeletePlanningVersionBox({$plannings[planning].ID})"/>
            </td>
            <td style='width:69%'>{$plannings[planning].name}</td>
            <td style='width:20%'>{$plannings[planning].time}</td>
            </tr>
            </table>
            </li>

    {/section}
    
	{section name=ouvrier loop=$ouvriers}
	
		{if $smarty.section.ouvrier.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools" style='width:9%'>
				<a class="tool_del" href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$ouvriers[ouvrier].ID})"/>
				<a class="tool_view" href='management_ouvrier.php?action=view&id={$ouvriers[ouvrier].ID}' title='{$detail_alt}'/>
				<a class="tool_edit" href='management_ouvrier.php?action=edit&id={$ouvriers[ouvrier].ID}' title='{$edit_alt}'/>
			</td>
			<td style='width:20%'>{$ouvriers[ouvrier].ouvrier_nom}</td>
			<td style='width:20%'>{$ouvriers[ouvrier].ouvrier_prenom}</td>
			<td style='width:17%'>{$ouvriers[ouvrier].ouvrier_salaire_horaire}</td>
			<td style='width:16%'>{$ouvriers[ouvrier].ouvrier_bonus_recurrent}</td>
			<td style='width:16%'>{$ouvriers[ouvrier].ouvrier_cout_recurrent}</td>
			
			</table>
			</li>

	{/section}

	{section name=product loop=$products}
	
		{if $smarty.section.product.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools" style='width:9%'>
				<a class="tool_del" href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$products[product].ID})"/>
				<a class="tool_view" href='management_product.php?action=view&id={$products[product].ID}' title='{$detail_alt}'/>
				<a class="tool_edit" href='management_product.php?action=edit&id={$products[product].ID}' title='{$edit_alt}'/>
			</td>
			<td style='width:17%'>{$products[product].name}</td>
			<td style='width:16%'>{$products[product].unit}</td>
			<td style='width:15%'>{$products[product].size}</td>
			<td style='width:10%'>{$products[product].current_stock}</td>
			<td style='width:20%'>{$products[product].sail_price_htva}</td>
			<td style='width:10%'>{$products[product].tva}</td>
			<td style='width:20%'>{$products[product].sail_price}</td>
			</table>
			</li>

	{/section}
	
	{section name=debt loop=$debts}
	
		{if $smarty.section.debt.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_del" href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$debts[debt].ID})"/>
			<a class="tool_view" href='management_debt.php?action=view&id={$debts[debt].ID}' title='{$detail_alt}'/>
			<a class="tool_edit" href='management_debt.php?action=edit&id={$debts[debt].ID}' title='{$edit_alt}'/>
		</td>
		<td class='b' style='width:17%'>{$debts[debt].amount} Euro</td>
		<td class='b' style='width:18%'>{$debts[debt].creation_date}</td>
		<td class='b' style='width:18%'>{$debts[debt].familyname} {$debts[debt].firstname}</td>
		<td class='b' style='width:12%'>{$debts[debt].workphone}</td>
		<td class='b' style='width:12%'>{$debts[debt].mobilephone}</td>
		<td class='b' style='width:12%'>{$debts[debt].privatephone}</td>
		</table>
		</li>
	
	{/section}
	
	{section name=user loop=$users}
	
		{if $smarty.section.users.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_view" href='management_user.php?action=detail&id={$users[user].ID}' title='{$detail_alt}'/>
			<a class="tool_edit" href='management_user.php?action=edit&id={$users[user].ID}' title='{$edit_alt}'/>
		</td>
		<td class='b' style='width:29%'>{$users[user].name}</td>
		<td class='b' style='width:30%'>{$users[user].familyname}</td>
		<td class='b' style='width:30%'>{$users[user].firstname}</td>
		</table>
		</li>
	
	{/section}
	
	{section name=addressbook loop=$addressbooks}
	
		{if $smarty.section.addressbook.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
		
		<table cellpadding='0' cellspacing='0' width='100%'>
		<tr>
		<td class='b' style='width:2%'></td>
		<td class="tools">
			<a class="tool_del" href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$addressbooks[addressbook].ID})"/>
			<a class="tool_view" href='management_addressbook.php?action=view&id={$addressbooks[addressbook].ID}' title='{$detail_alt}'/>
			<a class="tool_edit" href='management_addressbook.php?action=edit&id={$addressbooks[addressbook].ID}' title='{$edit_alt}'/>
		</td>
		<td class='b' style='width:7%'>{$addressbooks[addressbook].type}</td>
		<td class='b' style='width:5%'>{$addressbooks[addressbook].ID}</td>
		<td class='b' style='width:21%'>{$addressbooks[addressbook].company}</td>
		<td class='b' style='width:13%'>{$addressbooks[addressbook].familyname}</td>
		<td class='b' style='width:13%'>{$addressbooks[addressbook].firstname}</td>
		<td class='b' style='width:10%'>{$addressbooks[addressbook].workphone}</td>
		<td class='b' style='width:10%'>{$addressbooks[addressbook].mobilephone}</td>
		<td class='b' style='width:10%'>{$addressbooks[addressbook].privatephone}</td>
		</table>
		</li>
	
	{/section}

	{section name=protocol loop=$protocols}
	
		{if $smarty.section.protocol.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class="tools">
				<a class="tool_del" href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$protocols[protocol].ID})"/>
				<a class="tool_view" href='management_protocol.php?action=view&id={$protocols[protocol].ID}' title='{$detail_alt}'/>
				<a class="tool_edit" href='management_protocol.php?action=edit&id={$protocols[protocol].ID}' title='{$edit_alt}'/>
			</td>
			<td style='width:20%'>{$protocols[protocol].patient}</td>
			<td style='width:20%'>{$protocols[protocol].user_sender}</td>
			<td style='width:20%'>{$protocols[protocol].user_recipient}</td>
			<td style='width:8%'>{$protocols[protocol].date}</td>
			<td style='width:10%'>
				{$protocols[protocol].attachment}
			</td>
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
				<a class="tool_view" href='management_sumehr.php?action=view&patient_id={$sumehrs[sumehr].patient_id}&user_id={$sumehrs[sumehr].user_id}' title='{$detail_alt}'/>
				<a class="tool_edit" href='management_sumehr.php?action=edit&patient_id={$sumehrs[sumehr].patient_id}&user_id={$sumehrs[sumehr].user_id}' title='{$edit_alt}'/>
			</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].patient_familyname}</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].patient_firstname}</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].patient_birthdate}</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].user}</td>
			<td class='b' style='width:15%'>{$sumehrs[sumehr].latest_modification_date}</td>
			<td class="tools">
				{if $sumehrs[sumehr].sumehr_id != ''}
					<a class="tool_html" href='#' title='{$export_html}' onclick="javascript:exportSumehr({$sumehrs[sumehr].patient_id},'html')"/>
					<a class="tool_pdf" href='#' title='{$export_pdf}' onclick="javascript:exportSumehr({$sumehrs[sumehr].patient_id},'pdf')"/>
					<a class="tool_rtf" href='#' title='{$export_rtf}' onclick="javascript:exportSumehr({$sumehrs[sumehr].patient_id},'rtf')"/>
					<a class="tool_xml" href='#' title='{$export_xml}' onclick="javascript:exportSumehr({$sumehrs[sumehr].patient_id},'xml')"/>
				{/if}
			</td>
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
				<a class="tool_view" href='management_sumehr.php?action=view_analyse&patient_id={$exams[exam].patient_id}&examen_id={$exams[exam].examen_id}' title='{$detail_alt}'/>
			</td>
			<td class='b' style='width:35%'>{$exams[exam].patient_prenom} {$exams[exam].patient_nom}</td>
			<td class='b' style='width:20%'>{$exams[exam].examen_date}</td>
			<td class='b' style='width:35%'>Dr {$exams[exam].medecin_prenom} {$exams[exam].medecin_nom}</td>
			</table>
			</li>

	{/section}
	
	{section name=patient loop=$patients}
	
		{if $smarty.section.patient.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$patients[patient].ID})"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_patient.php?action=view&id={$patients[patient].ID}' title='{$detail_alt}'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_patient.php?action=edit&id={$patients[patient].ID}' title='{$edit_alt}'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:17%'>{$patients[patient].nom}</td>
			<td class='b' style='width:17%'>{$patients[patient].prenom}</td>
			<td class='b' style='width:10%'>{$patients[patient].date_naissance}</td>
			<td class='b' style='width:19%'>{$patients[patient].titulaire}</td>
			<td class='b' style='width:13%'>{$patients[patient].telephone}</td>
			<td class='b' style='width:13%'>{$patients[patient].gsm}</td>
			</table>
			</li>

	{/section}
	
	
	{section name=client loop=$clients}
	
		{if $smarty.section.client.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$clients[client].ID})"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_client.php?action=view&id={$clients[client].ID}' title='{$detail_alt}'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_client.php?action=edit&id={$clients[client].ID}' title='{$edit_alt}'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:17%'>{$clients[client].nom}</td>
			<td class='b' style='width:17%'>{$clients[client].prenom}</td>
			<td class='b' style='width:10%'>{$clients[client].date_naissance}</td>
			<td class='b' style='width:13%'>{$clients[client].telephone}</td>
			<td class='b' style='width:13%'>{$clients[client].gsm}</td>
			</table>
			</li>

	{/section}
	
	{section name=cecodi loop=$cecodis}
	
		{if $smarty.section.cecodi.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
	
			<table cellpadding='0' cellspacing='0' width='100%'>
			<tr>
			<td class='b' style='width:2%'></td>
			<td class='b' style='width:3%'><a href='#' title='{$delete_alt}' onclick="javascript:deleteConfirmBox({$products[cecodi].ID})"><img src="./templates/standard/img/16x16/user_delete.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_cecodi.php?action=view&id={$cecodis[cecodi].ID}' title='{$detail_alt}'><img src="./templates/standard/img/16x16/user_comment.png" /></a></td>
			<td class='b' style='width:3%'><a href='management_cecodi.php?action=edit&id={$cecodis[cecodi].ID}' title='{$edit_alt}'><img src="./templates/standard/img/16x16/user_edit.png" /></a></td>
			<td class='b' style='width:6%'>{$cecodis[cecodi].cecodi}</td>
			<td class='b' style='width:6%'>{$cecodis[cecodi].age_short}</td>
			<td class='b' style='width:10%'>{$cecodis[cecodi].type}</td>
			<td class='b' style='width:12%'>{$cecodis[cecodi].hono_travailleur}</td>
			<td class='b' style='width:8%'>{$cecodis[cecodi].a_vipo}</td>
			<td class='b' style='width:8%'>{$cecodis[cecodi].b_tiers_payant}</td>
			<td class='b' style='width:8%'>{$cecodis[cecodi].kdb}</td>
			<td class='b' style='width:8%'>{$cecodis[cecodi].bc}</td>
			<td class='b' style='width:8%'>{$cecodis[cecodi].amout_tp}</td>
			<td class='b' style='width:7%'>{$cecodis[cecodi].amout_tr}</td>
			<td class='b' style='width:7%'>{$cecodis[cecodi].amout_vp}</td>
			</table>
			</li>

	{/section}
	
</ul>