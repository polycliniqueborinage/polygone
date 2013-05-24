var user_id;

function userCompleteSearch(id, value) {
	$("#userBox").load("management_user.php?action=modulesearch", {limit:10,value:value,id:id,type:'complete'});
}

function viewUser(id,url) {
	window.location.href=url+'?action=detail&id='+id;
}

function editUser(id,url) {
	window.location.href=url+'?action=edit&id='+id;
}


function deleteConfirmBox(id) {
		
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
    		if(this.id == 'delete') {
    	    	deleteUser(id);
    	    }
	        $('#confirmbox').jqmHide();
		 });
}

function deleteUser(id) {
	window.location.href='admin_people_user.php?action=delete&id='+id;
}

function userSimpleSearch(value) {
	$('#findUserForm').show();
	$("#informationUser").load("management_user.php?action=modulesearch", {value:value,limit:5,type:'simple'});
}

var medecinsList = "";
var valueinami = '';
var valueacte = '';
var valueinami = '';
var valueprothese = '';
var birthdayvalue = '';

// choix entre interne et externe
function changeType(value) {
	if (value == 'other' || value == 'doctor_without_rate' || value == 'paramedical') {
		$('#inami').val('');
		$('#inami').attr('disabled','disabled');
		$('#specialite').val('');
		$('#specialite').attr('disabled','disabled');
		$('#taux_acte').val('');
		$('#taux_acte').attr('disabled','disabled');
		$('#taux_consultation').val('');
		$('#taux_consultation').attr('disabled','disabled');
		$('#taux_prothese').val('');
		$('#taux_prothese').attr('disabled','disabled');
	} else {
		$('#inami').removeAttr('disabled');
		$('#specialite').removeAttr('disabled');
		$('#taux_acte').removeAttr('disabled');
		$('#taux_consultation').removeAttr('disabled');
		$('#taux_prothese').removeAttr('disabled');
	}
}


// recherche direct
function medecinRechercheDirect() {
	var nom = $('nom').value;
	var prenom = $('prenom').value;
	$('findMedecinInput').value=nom+" "+prenom;
 	medecin_recherche_simple(nom+" "+prenom);
}


// recherche medecin complete
function medecinRechercheComplete(medecin) {
  	if(trim(medecin)!='') {
		$('medecinBox').innerHTML = "<img class='centerimage' src='../images/attente.gif'/>";
  		new Ajax.Updater(
			'medecinBox',
			'../lib/medecin_recherche_complete.php',
			{
				method: 'get',
				parameters: {medecin: htmlentities(medecin)}
			}
		);
	} else {
	    $('medecinBox').innerHTML = '';
	}
}


function controle_choix(value) {
	var choix = $('check'+value);
	var medecinID = choix.value;
	medecinID = "|" + medecinID + "|";
	if (choix.checked == true) {
		medecinsList = medecinsList + medecinID;
	} else {
		medecinsList = medecinsList.replace(medecinID,"")
	}
}


// impression etiquette
function etiquettePrint(nombre) {
	iframe = "<iframe name='' SRC='../etiquettes/print_etiquette_medecin.php?nombreEtiquette=" + escape(nombre) + "&medecinsList=" + escape(medecinsList) + "' scrolling='no' height='1' width='1' FRAMEBORDER='no'></iframe>";
	$('etiquette').innerHTML = iframe;
	$('etiquetteselect').value = "";
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


// action sur la table medecin
function medecinAction(type,id) {
	new Ajax.Request('../medecins/medecin_action.php',
		{
			method:'get',
			parameters: {type : type, id : id},
			asynchronous:false,
			requestHeaders: {Accept: 'application/json'},
	  		onSuccess: function(transport, json){
	  			$('formmodif').innerHTML=json.root.info;
  				medecinRechercheComplete($('pseudo').value);
    	    },
		    onFailure:  function(){ alert('failure');} 
		});
}

function actionUser(id, type, value) {
	switch( type ) {
		case 'del_user':
			new Ajax.Request('../configurations/user_action.php',
				{
					method:'get',
					parameters: {id : id, type : type, value : value},
					asynchronous:false,
					requestHeaders: {Accept: 'application/json'},
		  			onSuccess: function(transport, json){
		  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
		  				parent.window.location.href=parent.window.location.href;
		    	    },
				    onFailure:  function(){ alert("failure");} 
				});
			break;
		case 'login':
			if (value.length<6 || (htmlentities(value)!=value || value.indexOf("'", 0) > 0 )) {
				$('calendarSideBar').innerHTML = "<b>Entrez un login valide! (minimum six caractères, pas d'accent...)</b><br/><br/>" + $('calendarSideBar').innerHTML;
			} else {
				new Ajax.Request('../configurations/user_action.php',
					{
						method:'get',
						parameters: {id : id, type : type, value : value},
						asynchronous:false,
						requestHeaders: {Accept: 'application/json'},
			  			onSuccess: function(transport, json){
			  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
			    	    },
					    onFailure:  function(){ alert("failure");} 
					});
			}
			break; // End execution
		case 'password':
			if (value.length<6 || (htmlentities(value)!=value || value.indexOf("'", 0) > 0 )) {
				$('calendarSideBar').innerHTML = "<b>Entrez un mot de passe valide! (minimum six caractères, pas d'accent...)</b><br/><br/>" + $('calendarSideBar').innerHTML;
			} else {
				new Ajax.Request('../configurations/user_action.php',
					{
						method:'get',
						parameters: {id : id, type : type, value : value},
						asynchronous:false,
						requestHeaders: {Accept: 'application/json'},
			  			onSuccess: function(transport, json){
			  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
			    	    },
					    onFailure:  function(){ alert("failure");} 
					});
			}
			break; // End execution
		case 'nom':
		case 'prenom':
			new Ajax.Request('../configurations/user_action.php',
				{
					method:'get',
					parameters: {id : id, type : type, value : htmlentities(value)},
					asynchronous:false,
					requestHeaders: {Accept: 'application/json'},
		  			onSuccess: function(transport, json){
		  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
		    	    },
				    onFailure:  function(){ alert("failure");} 
				});
			break; // End execution
		default:
			new Ajax.Request('../configurations/user_action.php',
				{
					method:'get',
					parameters: {id : id, type : type, value : value},
					asynchronous:false,
					requestHeaders: {Accept: 'application/json'},
		  			onSuccess: function(transport, json){
		  				$('calendarSideBar').innerHTML = json.root.content + $('calendarSideBar').innerHTML;
		    	    },
				    onFailure:  function(){ alert("failure");} 
				});
	}
}
						
function disable_inami(idInami,idAgenda,application) {
	
	if (application.indexOf('agenda')>0) {
		document.getElementById('inami'+idInami).disabled = false;
		document.getElementById('agenda'+idAgenda).disabled = false;
	} else {
		document.getElementById('inami'+idInami).disabled = true;
		document.getElementById('inami'+idInami).value = '';
		document.getElementById('agenda'+idAgenda).disabled = true;
		document.getElementById('agenda'+idAgenda).value = '';
	}
						
}

