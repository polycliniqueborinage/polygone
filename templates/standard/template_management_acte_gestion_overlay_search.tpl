{section name=acte loop=$actes}
	
	<div class="row"><label><a href="#" onclick="javascript:motifAutoComplete('',{$actes[acte].ID})" title=""><b>{$actes[acte].code}</b></a></label>{$actes[acte].description}
	
{/section}
