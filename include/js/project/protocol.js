var protocol_id;
var user='';

/* Search on patient*/
function patientSimpleSearch(value, id) {
	$('#findPatientForm').show();
	$('#findUserForm').hide();
	$('#findAddressbookForm').hide();
	$("#informationPatient").load("management_patient.php?action=modulesearch&id="+id, {value:value,limit:5,type:'simple'});
}

function patientAutoComplete(value, id) {
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




/* Search on addressbook*/
function addressbookSimpleSearch(id,value) {
	$('#findAddressbookForm').show();
	$('#findPatientForm').hide();
	$('#findUserForm').hide();
	$("#informationAddressbook").load("management_addressbook.php?action=modulesearch&id="+id, {value:value,limit:5,type:'simple'});
}

function addressbookAutoComplete(id,value) {
	$.ajax({
  		type: "POST",
  		url: "management_addressbook.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=''&&data.ID!=null) {
	      		$("#addressbook_id").val(data.ID);
	      		$("#addressbook").val(data.addressbook);
	      		$("#addressbook").focus();
	      		$("#date").focus();
    		} else {
    			$("#addressbook_id").val('');
    		}
  		}
	});
	addressbookSimpleSearch(id,value);
}

function protocolCompleteSearchForUser(value,type) {
	$("#protocolBox").load("user_protocol.php?action=modulesearch", {value:value,type:type,limit:30});
}

function protocolCompleteSearchForManager(id,value) {
	$("#protocolBox").load("management_protocol.php?action=modulesearch", {value:value,limit:10,type:'complete'});
}

function protocolSimpleSearch(value) {
	$('#findProtocolForm').show();
	$("#informationProtocol").load("management_protocol.php?action=modulesearch", {value:value,type:'simple'});
}

function viewProtocol(id) {
	window.location.href='management_protocol.php?action=view&id='+id;
}

function editProtocol(id) {
	window.location.href='management_protocol.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {
	protocol_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}

function exportProtocol(id,format) {
	window.open('user_protocol.php?action=load&format='+format+'&id='+id);
}


function deleteProtocol() {
	if (protocol_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_protocol.php?action=delete&id="+protocol_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg');
	  			protocolCompleteSearch('',$('#search').val());
	  		}
		});
		protocol_id = "";
	}
}



