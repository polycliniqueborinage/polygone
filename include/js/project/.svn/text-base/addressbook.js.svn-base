var addressbook_id;

function addressbookCompleteSearch(id, value) {
	$("#addressbookBox").load("management_addressbook.php?action=modulesearch", {limit:10,value:value,id:id,type:'complete'});
}

function addressbookSimpleSearch(id, value) {
	$('#findAddressbookForm').show();
	$("#informationAddressbook").load("management_addressbook.php?action=modulesearch", {value:value,limit:5,id:id,type:'simple'});
}

function viewAddressbook(id) {
	window.location.href='management_addressbook.php?action=view&id='+id;
}

function editAddressbook(id) {
	window.location.href='management_addressbook.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {
	addressbook_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}

function deleteAddressbook() {
	if (addressbook_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_addressbook.php?action=delete&id="+addressbook_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg');
	  			addressbookCompleteSearch($('#search').val());
	  			addressbookSimpleSearch($('#search').val());
	  		}
		});
		addressbook_id = "";
	}
}

function checkType(id) {
	if (id=='mutuel') {
		$('#codediv').show();
		$('#companyspan').show();
	} else {
	
		if (id=='doctor') {
			$('#specialitydiv').show();
			$('#inamidiv').show();
			$('#codediv').hide();
			$('#companyspan').hide();
			$('#code').val('');
			} else {
			$('#specialitydiv').hide();
			$('#speciality').val('');
			$('#inamidiv').hide();
			$('#inami').val('');
			$('#codediv').hide();
			$('#companyspan').hide();
			$('#code').val('');
		}

	}
}

function addressbookAutoComplete() {
}


