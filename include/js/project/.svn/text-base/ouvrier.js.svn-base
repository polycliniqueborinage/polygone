var ouvrier_id;

//recherche d'un ouvrier
function ouvrierAutoComplete(value,id) {

	$("#overlayInformationouvrier").load("management_ouvrier.php?action=modulesearch&id="+id, {value:value,limit:5,type:'overlay'});
	
	$.ajax({
  		type: "POST",
  		url: "management_ouvrier.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#ouvrier_id").val(data.ID);
	      		$("#ouvrier").val(data.ouvrier);
    		} else {
    			$("#ouvrier_id").val('');
	      		//$("#ouvrier").val('');
    		}
    		
  		}
	});
}

function ouvrierCompleteSearch(id,value) {
	$("#searchBox").load("management_ouvrier.php?action=modulesearch", {id:id,value:value,limit:10,type:'complete'});
}

function ouvrierSimpleSearch(id,value) {
	$('#findOuvrierForm').show();
	$("#informationOuvrier").load("management_ouvrier.php?action=modulesearch", {id:id,value:value,limit:5,type:'simple'});
}

function viewOuvrier(id) {
	window.location.href='management_ouvrier.php?action=view&id='+id;
}

function editOuvrier(id) {
	window.location.href='management_ouvrier.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {

	ouvrier_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
		
}

function deleteOuvrier() {

	if (ouvrier_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_ouvrier.php?action=delete&id="+ouvrier_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg',3000);
	  			ouvrierCompleteSearch('',$('#search').val());
	  			ouvrierSimpleSearch('',$('#search').val());
	  		}
		});
		ouvrier_id = "";
	}
}
