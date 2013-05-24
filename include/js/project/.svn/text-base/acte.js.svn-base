function acteSimpleSearch(value) {
	$('#findActeForm').show();
	$("#informationActe").load("management_acte.php?action=modulesearch", {value:value,limit:5,type:'simple'});
}

// recherche complete d'une prestation inami
function acteCompleteSearch(value){
	$("#acteBox").load("management_acte.php?action=modulesearch", {value:value,limit:5,type:'complete'});
}

// recherche d'un patient
function acteAutoComplete(id) {

	/*var value = $('#patient').val();
	
	patientSimpleSearchInOverlay(value,id);
	
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#patient_id").val(data.ID);
	      		$("#patient").val(data.patient);
    		} else {
    			$("#patient_id").val('');
	      		//$("#patient").val('');
    		}
    		
  		}
	});*/
}

function viewActe(id) {
	window.location.href='management_acte.php?action=view&id='+id;
}

function editActe(id) {
	window.location.href='management_acte.php?action=edit&id='+id;
}
