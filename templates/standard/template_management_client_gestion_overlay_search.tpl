{section name=patient loop=$patients}
	
	<div class="row"><label><a href="#" onclick="javascript:patientAutoComplete('',{$patients[patient].ID})" title=""><b>{$patients[patient].nom} {$patients[patient].prenom} </b></a></label>{#dico_user_agenda_addbox_birth_on#} {$patients[patient].date_naissance} {#dico_user_agenda_addbox_living_in#} {$patients[patient].rue} {$patients[patient].code_postal} {$patients[patient].commune}
	
{/section}
