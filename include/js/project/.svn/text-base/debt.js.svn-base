var debt_id;

function debtAutoComplete(value,id) {
	
	$.ajax({
  		type: "POST",
  		url: "management_debt.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  		
  			if (data.ID!='') {
	      		$("#addressbook_ID").val(data.ID);
	      		$("#familyname").val(data.familyname);
	      		$("#firstname").val(data.firstname);
	      		$("#address1").val(data.address1);
	      		$("#zip1city1").val(data.zip1city1);
	      		$("#state1").val(data.state1);
	      		$("#country1").val(data.country1);
	      		$("#workphone").val(data.workphone);
	      		$("#mobilephone").val(data.mobilephone);
	      		$("#familyname").val(data.familyname);
	      		$("#privatephone").val(data.privatephone);
	      		$("#fax").val(data.fax);
	      		$("#email").val(data.email);
	      		
	      		$("#familyname").focus();
	      		$("#firstname").focus();
	      		$("#amount").focus();
	      		
    		} else {
    			$("#addressbook_ID").val('');
	      		$("#familyname").val('');
	      		$("#firstname").val('');
	      		$("#address1").val('');
	      		$("#zip1city1").val('');
	      		$("#state1").val('');
	      		$("#country1").val('');
	      		$("#workphone").val('');
	      		$("#mobilephone").val('');
	      		$("#familyname").val('');
	      		$("#privatephone").val('');
	      		$("#fax").val('');
	      		$("#email").val('');
    		}
    		
  		}
	});
  
}

function debtCompleteSearch(value) {
	$("#debtBox").load("management_debt.php?action=modulesearch", {value:value,limit:10,type:'complete'});
}

function debtSimpleSearch(value) {
	$('#findDebtForm').show();
	$("#informationDebt").load("management_debt.php?action=modulesearch", {value:value,limit:5,type:'simple'});
}

function viewDebt(id) {
	window.location.href='management_debt.php?action=view&id='+id;
}

function editDebt(id) {
	window.location.href='management_debt.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {

	debt_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}

function deleteDebt() {
	if (debt_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_debt.php?action=delete&id="+debt_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg');
	  			debtCompleteSearch($('#search').val());
	  			debtSimpleSearch($('#search').val());
	  		}
		});
		debt_id = "";
	}
}
