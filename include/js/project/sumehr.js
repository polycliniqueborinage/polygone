var sumehr_id;
var user='';

/* Search on patient*/
function patientSimpleSearch(id,value) {
	$('#findPatientForm').show();
	$('#findUserForm').hide();
	$('#findAddressbookForm').hide();
	$("#informationPatient").load("management_patient.php?action=modulesearch&id="+id, {value:value,limit:5,type:'simple'});
}

function patientAutoComplete(id,value) {
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=''&&data.ID!=null) {
	      		$("#patient_id").val(data.ID);
	      		$("#patient").val(data.patient);
	      		$("#patient").focus();
	      		$("#user_sender").focus();
    		} else {
    			$("#patient_id").val('');
    		}
  		}
	});
	patientSimpleSearch(id,value);
}

/* Search on user*/
function userSimpleSearch(id,value) {
	$('#findUserForm').show();
	$('#findAddressbookForm').hide();
	$('#findPatientForm').hide();
	$("#informationUser").load("management_user.php?action=modulesearch&id="+id, {value:value,limit:5,type:'simple'});
}

function userAutoComplete(id,value) {
 if (user != '') {
 	userRecipientAutoComplete(id,value,user);
 } else {
 	userSenderAutoComplete(id,value);
 } 
}

function userSenderAutoComplete(id,value) {
	user = "";
	$.ajax({
  		type: "POST",
  		url: "management_user.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=''&&data.ID!=null) {
	      		$("#user_sender_id").val(data.ID);
	      		$("#user_sender").val(data.user);
	      		$("#user_sender").focus();
	      		$("#user_recipient1").focus();
    		} else {
    			$("#user_sender_id").val('');
    		}
  		}
	});
	userSimpleSearch(id,value);
}

function userRecipientAutoComplete(id,value,number) {
	if (number != "") {user = number} else {number = user};
	$.ajax({
  		type: "POST",
  		url: "management_user.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=''&&data.ID!=null) {
	      		$("#user_recipient"+number+"_id").val(data.ID);
	      		$("#user_recipient"+number).val(data.user);
	      		$("#user_recipient"+number).focus();
	      		if (number != 5) {
		      		$("#user_recipient"+(number+1)+"_div").show();
		      		$("#user_recipient"+(number+1)).focus();
				} else {
		      		$("#date").focus();
				}
			} else {
    			$("#user_recipient"+number+"_id").val('');
    		}
  		}
	});
	userSimpleSearch(id,value);
}





function sumehrCompleteSearchForUser(value,type) {
	$("#search_box").load("user_sumehr.php?action=module_search", {search_value:value,search_type:type,limit:10});
}

function sumehrCompleteSearchForManager(patient_id,patient,doctor_id,doctor) {
	$("#search_box").load("management_sumehr.php?action=module_search", {search_patient_id:patient_id,search_patient:patient,search_doctor_id:doctor_id,search_doctor:doctor,limit:10});
}

function sumehrCompleteSearchAnalyse(patient_id,patient,doctor_id,doctor) { 
	$("#search_box").load("management_sumehr.php?action=module_search_analyse", {search_patient:patient,search_doctor:doctor,limit:10});
}

function sumehrCompleteSearchAnalyseMedecin(patient_id,patient,doctor_id,doctor) { 
	$("#search_box").load("user_sumehr.php?action=module_search_analyse", {search_patient:patient,search_doctor:doctor,limit:10});
}

function viewSumehr(id) {
	window.location.href='user_sumehr.php?action=view&id='+id;
}

function editSumehr(id) {
	window.location.href='user_sumehr.php?action=edit&id='+id;
}


function exportSumehr(id,format) {
	window.open('user_sumehr.php?action=load&format='+format+'&id='+id);
}

function deleteConfirmBox(id) {
	sumehr_report_id = id;
	sumehr_id = id;
	jQuery('#confirmbox').jqmShow();
}

function deleteSumehrReport() {
	if (sumehr_report_id !='') {
		jQuery.ajax({
	  		type: "GET",
	  		url: "management_sumehr.php?action=delete_report&report_id="+sumehr_report_id,
	  		success: function(data){
	  			window.location.reload();
	  		}
		});
		sumehr_report_id = "";
	}
}

function checkClose() {
	$("#s_scan_number").focus();
	return "N'oubliez pas de sauver votre dossier !";
}

function loadtabFromManagement(patient_id, user_id, report_id, name) {

	if (jQuery("#"+report_id).length == 0) {
        jQuery("#tab_content").tabs("add", "#"+report_id, name);
    }  else {
    	jQuery("#tab_content").tabs('select', '#' + report_id);
    }
    
	jQuery("#"+report_id).load("management_sumehr.php?action=view_report&patient_id="+patient_id+"&user_id="+user_id+"&report_id="+report_id, function() { jQuery('a.image_'+report_id).prettyPhoto(); });
    
}

function loadtabFromUser(patient_id, user_id, report_id, sumehr_id, name) {

	if (jQuery("#"+report_id).length == 0) {
        jQuery("#tab_content_"+sumehr_id).tabs("add", "#"+report_id, name);
    }  else {
    	jQuery("#tab_content_"+sumehr_id).tabs('select', '#' + report_id);
    }
    
    jQuery("#"+report_id).load("user_sumehr.php?action=view_report&patient_id="+patient_id+"&user_id="+user_id+"&report_id="+report_id, function() { jQuery("#tab_content_"+sumehr_id).tabs('select', '#' + report_id);jQuery('a.image_'+report_id).prettyPhoto(); });
    
}