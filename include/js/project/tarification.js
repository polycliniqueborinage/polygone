// add or remove a new prestation
function submitForm(del_cecodi) {
	$('BoxListCecodi').innerHTML = "<img class='centerimage' src='../images/attente.gif'/>";
	try {
		var cecodi_input = $('cecodi_input').value;
		var cecodi_number = $('cecodi_number').value;
		var cecodi_input_check = $('cecodi_input_check').checked;
		var acte_input = $('acte_input').value;
		var acte_number = $('acte_number').value;
	} catch ( e ) {
		var cecodi_input = '';
		var cecodi_input_check = '';
		var acte_input = '';
	}
	new Ajax.Request('../tarifications/tarification_submit_form.php',
		{
			method:'get',
			parameters: {cecodi_input:cecodi_input, cecodi_number : cecodi_number, cecodi_input_check:cecodi_input_check, acte_input:acte_input, acte_number : acte_number, del_cecodi: del_cecodi},
			asynchronous:false,
			requestHeaders: {Accept: 'application/json'},
  			onSuccess: function(transport, json){
    			$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
    			$('a_payer').innerHTML = json.root.a_payer;
    			$('deja_paye').innerHTML = json.root.deja_paye;
    			$('reste_paye').value = json.root.reste_paye;
    			try {
    				$('cecodi_input').value = '';
    				$('cecodi_number').value = '1';
					$('cecodi_input_check').checked = false;
					$('cecodi_desc').innerHTML = "";
					$('acte_input').value = '0';
    				$('acte_number').value = '1';
    				$('cecodi_input').focus();
    			} catch( e ) {}
    			TarificationUpdateForm();
    	    },
		    onFailure:  function(){ alert("failure");} 
		});
		
	return false;
}


// update Tarification Form
function TarificationUpdateForm() {
	new Ajax.Request('../tarifications/tarification_update_form.php',
		{
			method:'get',
			parameters: {},
			asynchronous:true,
			requestHeaders: {Accept: 'application/json'},
  			onSuccess: function(transport, json){
    			$('BoxListCecodi').innerHTML = transport.responseText;
    	    },
		    onFailure:  function(){ $('BoxListCecodi').innerHTML = "failure";} 
		});
	new Ajax.Request('../tarifications/tarification_update_form2.php',
		{
			method:'get',
			parameters: {},
			asynchronous:true,
			requestHeaders: {Accept: 'application/json'},
  			onSuccess: function(transport, json){
    			$('buttonBox').innerHTML = transport.responseText;
    	    },
		    onFailure:  function(){ $('buttonBox').innerHTML = "failure";} 
		});
}


// cloture d'une tarification
function tarificationCloturer(id) {
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


// Paiement d une tarification
function tarificationPayerConfirm(id) {
	var valeur = $('reste_paye').value;
	var paiement_type = $('paiement_type').value; 
	if (valeur > 0 && paiement_type!='') {
		new Ajax.Request('../tarifications/tarification_payer.php',
			{
				method:'get',
				parameters: {id : id, valeur :valeur, paiement_type : paiement_type},
				asynchronous:false,
				requestHeaders: {Accept: 'application/json'},
	  			onSuccess: function(transport, json){
	  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
	  				submitForm('');
	    	    },
			    onFailure:  function(){ alert("failure");} 
			});
	}
}


// Changeemnt du un acte interne en cecodi
function tarificationCecodiChangeConfirm(id) {
	var cecodi = $('popup_cecodi').value;
	if (id !='' && cecodi.length == 6) {
		new Ajax.Request('../tarifications/tarification_modif_cecodi_confirm.php',
			{
				method:'get',
				parameters: {id : id, cecodi :cecodi},
				asynchronous:false,
				requestHeaders: {Accept: 'application/json'},
	  			onSuccess: function(transport, json){
	  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
	  				submitForm('');
	    	    },
			    onFailure:  function(){ alert("failure");} 
			});
	}
}


// recherche d'un tarification (non clotur�e -  clotur�e) ou d'un proth�se
function tarificationRechercheComplete(utilisation,limit) {
	$('tarificationBox').innerHTML = "<img class='centerimage' src='../images/attente.gif'/>";
	var patient = $('patient_input').value;
	var medecin = $('medecin_input').value;
	var start_date = $('start_date_input').value;
	var end_date = $('end_date_input').value;
	var tarification = $('tarification_input').value;
	var prestation = $('prestation_input').value;
	var etat = $('etat_input').value;
				
	new Ajax.Request('../tarifications/tarification_recherche_complete.php',
		{
			method:'get',
			parameters: {patient: patient, medecin: medecin, start_date: start_date, end_date: end_date, utilisation: utilisation, tarification: tarification, prestation: prestation, etat: etat, limit : limit},
			asynchronous:true,
  			onSuccess: function(transport){
  				$('tarificationBox').innerHTML = transport.responseText;
    	    },
		    onFailure:  function(){ $('tarificationBox').innerHTML = "failure";} 
		});
}

// recherche sur base du id apres clicj
function tarificationRechercheCompleteList(id,utilisation,limit) {
	if ($('tarification_input').value != '') {
		$('tarification_input').value='';
	} else {
		$('tarification_input').value=id;
	}
	tarificationRechercheComplete(utilisation,limit);
}

// action au niveau de la recherche
function tarificationAction(utilisation,type,id) {
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
