<ul id='accordion_messages'>

	{section name=planning loop=$plannings}
		{if $smarty.section.planning.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:openLoadBox({$plannings[planning].ID})" title="{$plannings[planning].name} ">{$plannings[planning].name}</a>
			</li>
	{/section}


	{section name=ouvrier loop=$ouvriers}
		{if $smarty.section.ouvrier.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="" title="{$ouvriers[ouvrier].nom} ">{$ouriers[ouvrier].ouvrier_nom} {$ouvriers[ouvrier].ouvrier_prenom} </a>
			</li>
	{/section}
	{if $ouvriers[1] == '' && $ouvriers[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>{$ouvriers[0].ouvrier_salaire_horaire}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$ouvriers[0].ouvrier_bonus_recurrent}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$ouvriers[0].ouvrier_cout_recurrent}</td>
		</tr>
    </table>
	{/if}
	
	{section name=product loop=$products}
		{if $smarty.section.product.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:productAutoComplete({$products[product].ID})" title="">{$products[product].name}</a>
			</li>
	{/section}
	
		
	{section name=debt loop=$debts}
		{if $smarty.section.debt.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:debtAutoComplete('',{$debts[debt].addressbook_ID})" title="{$debts[debt].creation_date} - {$debts[debt].amount} Euro">{$debts[debt].familyname} {$debts[debt].firstname} ({$debts[debt].amount} Euro)</a>
			</li>
	{/section}

	
	{section name=addressbook loop=$addressbooks}
		{if $smarty.section.addressbook.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:userAutoComplete({$addressbooks[addressbook].ID},'');" title="">{$addressbooks[addressbook].familyname} {$addressbooks[addressbook].firstname}</a>
			</li>
	{/section}
	{if $addressbooks[1] == '' && $addressbooks[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>{$addressbooks[0].address1}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$addressbooks[0].zip1} {$addressbooks[0].city1}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$addressbooks[0].speciality}</td>
		</tr>
    </table>
	{/if}
											
	<!-- Proprietaire attention use by protocol -->
		
	{section name=titulaire loop=$titulaires} 
		{if $smarty.section.titulaire.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:titulaireAutoComplete('', {$titulaires[titulaire].ID})" title="{$titulaires[titulaire].patient_date_naissance}">{$titulaires[titulaire].nom} {$titulaires[titulaire].prenom}</a>
			</li>
	{/section}
	{if $titulaires[1] == '' && $titulaires[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : {$titulaires[0].date_naissance}</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : {$titulaires[0].sexe}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$titulaires[0].rue}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$titulaires[0].code_postal} {$titulaires[0].commune}</td>
		</tr>
    </table>
	{/if}

	{section name=patient loop=$patients}
            {if $smarty.section.patient.index % 2 == 0}
                    <li class="bg_a">
            {else}
                    <li class="bg_b">
            {/if}
                            <a href="#" onclick="javascript:patientAutoComplete('', {$patients[patient].patient_id})" title="{$patients[patient].patient_date_naissance}">{$patients[patient].nom} {$patients[patient].prenom}</a>
                    </li>
    {/section}
	{if $patients[1] == '' && $patients[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : {$patients[0].date_naissance}</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : {$patients[0].sexe}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$patients[0].rue}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$patients[0].code_postal} {$patients[0].commune}</td>
		</tr>
    </table>
	{/if}
	
	{section name=proprietaire loop=$proprietaires}
		{if $smarty.section.proprietaire.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:debtAutoComplete('', {$proprietaires[proprietaire].patient_id})" title="{$proprietaires[proprietaire].patient_date_naissance}">{$proprietaires[proprietaire].nom} {$proprietaires[proprietaire].prenom}</a>	
			</li>
	{/section}
	{if $proprietaires[1] == '' && $proprietaires[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : {$proprietaires[0].date_naissance}</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : {$proprietaires[0].sexe}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$proprietaires[0].rue}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$proprietaires[0].code_postal} {$proprietaires[0].commune}</td>
		</tr>
    </table>
	{/if}	
	
	{section name=client loop=$clients}
		{if $smarty.section.client.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:clientAutoComplete({$clients[client].patient_id},'')" title="{$clients[client].patient_date_naissance}">{$clients[client].nom} {$clients[client].prenom}</a>	
			</li>
	{/section}
	{if $clients[1] == '' && $clients[0] != ''}
    <table>
    	<tr valign="top">
	    	<td>Date de naissance : {$clients[0].date_naissance}</td>
		</tr>
    	<tr valign="top">
	       	<td>Sexe : {$clients[0].sexe}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$clients[0].rue}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$clients[0].code_postal} {$clients[0].commune}</td>
		</tr>
    </table>
	{/if}
	
	

	{section name=user loop=$users}
		{if $smarty.section.user.index % 2 == 0}
			<li class="bg_a">
		{else}
			<li class="bg_b">
		{/if}
				<a href="#" onclick="javascript:userAutoComplete({$users[user].ID},'')" title="{$users[user].name}">{$users[user].familyname} {$users[user].firstname}</a>
			</li>
	{/section}
	{if $users[1] == '' && $users[0] != ''}
    <table>
    	<tr valign="top">
	       	<td>{$users[0].address1}</td>
		</tr>
		<tr valign="top">
	       	<td>{$users[0].zip1} {$users[0].city1}</td>
		</tr>
		<tr valign="top">
	       	<td>{$users[0].inami}</td>
		</tr>
    	<tr valign="top">
	       	<td>{$users[0].speciality}</td>
		</tr>
    </table>
	{/if}

            
	
</ul>