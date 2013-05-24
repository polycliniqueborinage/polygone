// Edit anomlie comment
function editComment() {

	Element.show('globalText');
	Element.hide('resumeText');
	Element.hide('link');
		
	areaedit_init();

}

// cloture d'une tarification
function anomalieCloturer(id) {
	new Ajax.Request('../tarifications/tarification_cloturer.php',
		{
			method:'get',
			parameters: {id :id},
			asynchronous:false,
			requestHeaders: {Accept: 'application/json'},
  			onSuccess: function(transport, json){
    			$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
    			Element.hide('BoxAddCecodi');
  				TarificationUpdateForm();
    	    },
		    onFailure:  function(){ $('BoxListCecodi').innerHTML = "failure";} 
		});
}


// recherche d'un tarification (non clotur�e -  clotur�e) ou d'un proth�se
function tarificationRechercheComplete() {
	$('tarificationBox').innerHTML = "<img class='centerimage' src='../images/attente.gif'/>";
	var patient = $('patient_input').value;
	var medecin = $('medecin_input').value;
	var start_date = $('start_date_input').value;
	var end_date = $('end_date_input').value;
	var tarification = $('tarification_input').value;
	var prestation = $('prestation_input').value;
	var etat = $('etat_input').value;
				
	new Ajax.Request('../anomalies/tarification_recherche_complete.php',
		{
			method:'get',
			parameters: {patient: patient, medecin: medecin, start_date: start_date, end_date: end_date, tarification: tarification, prestation: prestation, etat: etat},
			asynchronous:true,
  			onSuccess: function(transport){
  				$('tarificationBox').innerHTML = transport.responseText;
    	    },
		    onFailure:  function(){ $('tarificationBox').innerHTML = "failure";} 
		});
}

// recherche sur base du id apres clicj
function tarificationRechercheCompleteList(id) {
	if ($('tarification_input').value != '') {
		$('tarification_input').value='';
	} else {
		$('tarification_input').value=id;
	}
	tarificationRechercheComplete();
}


// recherche d'un tarification (non clotur�e -  clotur�e) ou d'un proth�se
function anomalieRechercheComplete() {
	$('tarificationBox').innerHTML = "<img class='centerimage' src='../images/attente.gif'/>";
	var patient = $('patient_input').value;
	var medecin = $('medecin_input').value;
	var start_date = $('start_date_input').value;
	var end_date = $('end_date_input').value;
	var tarification = $('tarification_input').value;
	var prestation = $('prestation_input').value;
	var etat = $('etat_input').value;
				
	new Ajax.Request('../anomalies/anomalie_recherche_complete.php',
		{
			method:'get',
			parameters: {patient: patient, medecin: medecin, start_date: start_date, end_date: end_date, tarification: tarification, prestation: prestation, etat: etat},
			asynchronous:true,
  			onSuccess: function(transport){
  				$('tarificationBox').innerHTML = transport.responseText;
    	    },
		    onFailure:  function(){ $('tarificationBox').innerHTML = "failure";} 
		});
}

// recherche sur base du id apres clicj
function anomalieRechercheCompleteList(id) {
	if ($('tarification_input').value != '') {
		$('tarification_input').value='';
	} else {
		$('tarification_input').value=id;
	}
	anomalieRechercheComplete();
}


// action au niveau de la recherche
function anomalieAction(utilisation,type,id) {
	new Ajax.Request('../tarifications/tarification_action.php',
		{
			method:'get',
			parameters: {type: type, id: id},
			asynchronous:true,
			requestHeaders: {Accept: 'application/json'},
	  		onSuccess: function(transport, json){
  				$('formmodif').innerHTML=json.root.info;
  				tarificationRechercheComplete(utilisation);
    	    },
		    onFailure:  function(){ $('tarificationBox').innerHTML = "failure";} 
		});
}


