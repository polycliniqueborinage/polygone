{section name=titulaire loop=$titulaires}
	
	<div class="row"><label><a href="#" onclick="javascript:titulaireAutoComplete('',{$titulaires[titulaire].ID})" title=""><b>{$titulaires[titulaire].nom} {$titulaires[titulaire].prenom} </b></a></label>{#dico_user_agenda_addbox_birth_on#} {$titulaires[titulaire].date_naissance} {#dico_user_agenda_addbox_living_in#} {$titulaires[titulaire].rue} {$titulaires[titulaire].code_postal} {$titulaires[titulaire].commune}
	
{/section}
