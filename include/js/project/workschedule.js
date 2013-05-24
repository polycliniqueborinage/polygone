var dws_id;
var wsr_id;

function productAutoCompleteProprietaire(id) {
	
	var value = $('#proprietaire').val();
	
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocompleteproprietaire&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=null && data.ID!='') {
  				$("#consumer_ID").val(data.ID);
	      		try {
		      		$("#proprietaire").val(data.proprietaire);
		      		$("#adresse").val(data.adresse);
	      		} catch(err) {}
	      		try {
		      		$("#proprietaire").html($("#"+data.proprietaire).html());
		      		$("#adresse").html($("#"+data.adresse).html());
	      			$("#proprietaire").focus();
	      		} catch(err) {}
    		} else {
	      		try {
		      		$("#proprietaire").val('');
		      		$("#adresse").val('');
	      		} catch(err) {}
	      		try {
		      		$("#proprietaire").html('');
		      		$("#adresse").html('');
	      		} catch(err) {}
    		}
    		
  		}
	});
  
}

function productCompleteSearch(value) {
	$("#productBox").load("management_product.php?action=modulesearch", {value:value,limit:10,type:'complete'});
}

function productSimpleSearch(value) {
	$('#findProductForm').show();
	$("#informationProduct").load("management_product.php?action=modulesearch", {value:value,limit:5,type:'simple'});
	
}
function editDws(id) {
	window.location.href='management_workschedule.php?action=edit_dws&id='+id;
}

function deleteDwsConfirmBox(id) {
	dws_id = id;
	jQuery('#confirmbox').jqmShow();
}

function deleteDws() {
	if (dws_id !='') {
		window.location.href="management_workschedule.php?action=delete_dws&id="+dws_id;
		dws_id = "";
	}
}

function add_line(){

	document.getElementById("current_index").value++;
	var curr_index = document.getElementById("current_index").value;
	
	var newRow = document.getElementById("weekly_wsr").insertRow(-1);
	var newCell = newRow.insertCell(0);
	newCell.innerHTML = curr_index;
	
	var ref_select = document.getElementById("day1-1");
	for(j=1; j<=7; j++){
		var newSelect = document.createElement("select");
		newSelect = ref_select.cloneNode(true);
		
		newCell = newRow.insertCell(j);
		newSelect.setAttribute("id", "day"+j+"-"+curr_index);
		newSelect.setAttribute("name", "day"+j+"-"+curr_index);
		newSelect.selectedIndex = 0;
		newCell.appendChild(newSelect);
	}

}

function delete_line(){

	document.getElementById("weekly_wsr").deleteRow(document.getElementById("current_index").value);
	document.getElementById("current_index").value--; 

}

function editWsr(id) {
	window.location.href='management_workschedule.php?action=edit_wsr&id='+id;
}

function deleteWsrConfirmBox(id) {
	wsr_id = id;
	jQuery('#confirmbox').jqmShow();
}

function deleteWsr() {
	if (wsr_id !='') {
		window.location.href="management_workschedule.php?action=delete_wsr&id="+wsr_id;
		wsr_id = "";
	}
}

function get_average(){

	var curr_index = document.getElementById("current_index").value;
	var avg = parseFloat(0);
	for(i=1; i<=curr_index; i++){
		for(j=1; j<=7; j++){ 
			id = document.getElementById("day"+j+"-"+i)[document.getElementById("day"+j+"-"+i).selectedIndex].value;
			nb_hours = 0;
			try{
				nb_hours = parseFloat(document.getElementById(id).value);
			}catch(err){
				document.getElementById("check_all_filled").value = '';
			}	
			avg = parseFloat(avg) + parseFloat(nb_hours); 
		}
	}	
	avg = Math.round((avg / curr_index)*100)/100;
	$("#average").val(avg);
	
}

function setFillin(){
	document.getElementById("check_all_filled").value = 'X';
}

