var patient_id;
var client_id;

//recherche d'un titulaire
function titulaireAutoComplete(value,id) {

	//$("#overlayInformationTitulaire").load("management_patient.php?action=modulesearch&id="+id, {value:value,limit:5,type:'overlay'});
	
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#titulaire_id").val(data.ID);
	      		$("#titulaire_name").val(data.firstname+" "+data.familyname);
	      		$("#niss").val(data.niss);
	      		$("#mutuelle_matricule").val(data.mutuelle_matricule);
	      		$("#mutuelle_code").val(data.mutuelle_code);
	      		$("#ct1ct2").val(data.ct1ct2);
	      		$("#tiers_payant").val(data.tiers_payant);
    		} else {
    			$("#titulaire_id").val('');
	      		//$("#patient").val('');
    		}
    		
  		}
	});
}

//recherche d'un patient
function patientAutoComplete(value,id) {

	$("#overlayInformationPatient").load("management_patient.php?action=modulesearch&id="+id, {value:value,limit:5,type:'overlay'});
	
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#patient_id").val(data.ID);
	      		$("#titulaire_id").val(data.titulaire_ID);
	      		$("#titulaire_name").val(data.titulaire);
	      		$("#familyname").val(data.familyname);
	      		$("#firstname").val(data.firstname);
	      		$("#birthday").val(data.date_naissance);
	      		$("#gender").val(data.sexe);
	      		$("#niss").val(data.niss);
	      		$("#address1").val(data.rue);
	      		$("#zip1city1").val(data.code_postal+" "+data.commune);
	      		$("#privatephone").val(data.telephone);
	      		$("#mobilephone").val(data.gsm);
    		} else {
    			$("#patient_id").val('');
	      		//$("#patient").val('');
    		}
    		
  		}
	});
}

//recherche d'un patient
function clientAutoComplete(id,value) {

	$('#findClientForm').show();
	$("#informationClient").load("management_client.php?action=modulesearch&id="+id, {value:value,limit:5,type:'simple'});
	
	$.ajax({
  		type: "POST",
  		url: "management_client.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#client_id").val(data.ID);
	      		$("#client").val(data.patient);
    		} else {
    			$("#client_id").val('');
    		}
    		
  		}
	});
}

function titulaireSimpleSearch(id,value) {
	$('#findTitulaireForm').show();
	$("#informationTitulaire").load("management_patient.php?action=modulesearchtitulaire", {id:id,value:value,limit:5,type:'simple'});
}

function patientSimpleSearch(id,value) {
	$('#findPatientForm').show();
	$("#informationPatient").load("management_patient.php?action=modulesearch", {id:id,value:value,limit:5,type:'simple'});
}

function clientSimpleSearch(id,value) {
	$('#findClientForm').show();
	$("#informationClient").load("management_client.php?action=modulesearch", {id:id,value:value,limit:5,type:'simple'});
}

// recherche patient complete
function patientCompleteSearch(id,value) {
	$("#patientBox").load("management_patient.php?action=modulesearch", {id:id,value:value,limit:10,type:'complete'});
}

// recherche client complete
function clientCompleteSearch(id,value) {
	$("#clientBox").load("management_client.php?action=modulesearch", {id:id,value:value,limit:10,type:'complete'});
}

// recherche titulaire complete
function titulaireCompleteSearch(id,titulaire) {
	$("#patientBox").load("php_request/patient_complete_search.php", {id:id,titulaire:titulaire});
}

function viewPatient(id) {
	window.location.href='management_patient.php?action=view&id='+id;
}

function viewClient(id) {
	window.location.href='management_client.php?action=view&id='+id;
}

function detailPatient(id) {
	jQuery('#viewbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    jQuery('#viewbox').jqmHide();
	});
	jQuery("#viewbox").load("management_patient.php?action=detail&id="+id, {}, function() {} );
}


function editPatient(id) {
	window.location.href='management_patient.php?action=edit&id='+id;
}

function editClient(id) {
	window.location.href='management_client.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {

	patient_id = id;
	client_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
		
}

function deletePatient() {
	if (patient_id !='') {
		window.location.href='management_patient.php?action=delete&id='+patient_id;
		/*$.ajax({
	  		type: "POST",
	  		url: "management_patient.php?action=delete&id="+patient_id,
	  		success: function(data){
				//$('#systemmsg').show();
	  			//systemeMessage('systemmsg');
	  			//patientCompleteSearch($('#search').val());
	  			//patientSimpleSearch($('#search').val());
	  		}
		});*/
		patient_id = "";
	}
}

function deleteClient() {
	if (client_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_client.php?action=delete&id="+client_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg',3000);
	  			clientCompleteSearch('',$('#name').val());
	  			clientSimpleSearch('',$('#name').val());
	  		}
		});
		client_id = "";
	}
}




















function patientRechercheDirect() {
	var nom = $('nom').value;
	var prenom = $('prenom').value;
	$('findPatientInput').value=nom+" "+prenom;
 	patient_recherche_simple(nom+" "+prenom);
}

function patientRechercheDirectRecherche(patient) {
	$('findPatientInput').value=patient;
 	patient_recherche_simple(patient);
}


function patientGestionTitulaire() {
	 var titulaireNom;
	 var titulairePrenom;
	 titulaireNom = $('nom').value;
	 titulairePrenom =  $('prenom').value;
	 $('titulaire').value=titulaireNom+" "+titulairePrenom;
}


function cleanTitulaire() {
	$('titulaire_id').value = '';
	$('mutuelle_code').value = '';
	$('ct1ct2').value = '';
	$('tiers_payant').checked = false;
	try {
		$('mutuelle_nom').value = '';
	} catch(e) {}
}


function checkTitulaire(pseudo){

	if (pseudo =='') {
		cleanTitulaire();
	} else {
		$('findPatientInput').value = pseudo;
		patient_recherche_simple(pseudo);
		new Ajax.Request('../patients/patient_check_titulaire.php',
		{
			method:'get',
			parameters: {pseudo: htmlentities(pseudo)},
			asynchronous:false,
			requestHeaders: {Accept: 'application/json'},
  			onSuccess: function(transport, json){
  				var titulaire = json.root.nom+" "+json.root.prenom;
  				if (titulaire != " ") {
			      	$('titulaire_id').value = json.root.id;
			      	$('titulaire').value = html_entity_decode(json.root.nom+" "+json.root.prenom);
			      	$('mutuelle_code').value = json.root.mutuelle_code;
			      	$('ct1ct2').value = json.root.ct1 + "-" + json.root.ct2;
			      	$('tiers_payant').checked = json.root.tiers_payant;
			      	try {
						$('mutuelle_nom').value = html_entity_decode(json.root.mutuelle_code+" "+json.root.mutuelle_nom);
						$('label').value = html_entity_decode(json.root.ct1 + "-" + json.root.ct2 + " - " + json.root.type_label );
					} catch(e) {}
  				} else {
  					cleanTitulaire();
  				}
		    },
		    onFailure: function(){ alert('failure'); }
		});
	}
}

// action sur la table patient
function patientAction(type,id) {
	new Ajax.Request('../patients/patient_action.php',
		{
			method:'get',
			parameters: {type : type, id : id},
			asynchronous:false,
			requestHeaders: {Accept: 'application/json'},
	  		onSuccess: function(transport, json){
	  			$('formmodif').innerHTML=json.root.info;
  				patientRechercheComplete($('patient').value);
    	    },
		    onFailure:  function(){ alert('failure');} 
		});
}

function switchGeneral(id) {
	var all = 4;
	for(i=1;i<all;i++) {
		try{
			if (i == id) {
				$('sec_li_'+i).setAttribute("class","nodelete current");
				Element.show('table_'+i);
				Element.show('sec_li_'+(i+1));
			}
			else{
				$('sec_li_'+i).setAttribute("class","nodelete");
				Element.hide('table_'+i);
			}
		} catch(e){};
	}
}
