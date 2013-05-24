var product_id;

function productAutoComplete(id) {
	
	var value = $('#name').val();
	
	$.ajax({
  		type: "POST",
  		url: "management_product.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			if (data.ID!=null && data.ID!='') {
  				$("#product_id").val(data.ID);
	      		try {
		      		$("#name").val(data.name);
		      		$("#quantity").val(data.dose);
		      		$("#unit").val(data.unit);
		      		$("#size").val(data.size);
		      		$("#dose").val(data.dose);
	    	  		$("#stock").val(data.stock);
	    	  		$("#sail_price").val(data.sail_price);
	    	  		$("#lot_number").val(data.lot_number);
	      		} catch(err) {}
	      		try {
		      		$("#unit_detail").html($("#"+data.unit).html());
		      		$("#size_detail").html(data.size);
		      		$("#dose_detail").html(data.dose);
	    	  		$("#stock_detail").html(data.stock);
	    	  		$("#sail_price_detail").html(data.sail_price);
	      			$("#description_detail").html(data.description);
	      			$("#current_stock_detail").html(data.current_stock);
	      			$("#stock_sail_price_detail").html(data.stock_sail_price);
	      			$("#name").focus();
	      			$("#quantity").focus();
	      		} catch(err) {}
    		} else {
    			$("#product_id").val('');
	      		try {
		      		$("#quantity").val('');
		      		$("#unit").val('');
		      		$("#size").val('');
		      		$("#dose").val('');
	    	  		$("#stock").val('');
	      		} catch(err) {}
	      		try {
		      		$("#unit_detail").html('');
		      		$("#size_detail").html('');
		      		$("#dose_detail").html('');
	    	  		$("#stock_detail").html('');
	    	  		$("#sail_price_detail").html('');
	      			$("#description_detail").html('');
	      			$("#current_stock_detail").html('');
	      			$("#stock_sail_price_detail").html('');
	      			$("#lot_number").html('');
	      		} catch(err) {}
    		}
    		
  		}
	});
  
}

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

function viewProduct(id) {
	window.location.href='management_product.php?action=view&id='+id;
}

function editProduct(id) {
	window.location.href='management_product.php?action=edit&id='+id;
}

function deleteConfirmBox(id) {
	product_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}

function deleteProduct() {
	if (product_id !='') {
		$.ajax({
	  		type: "POST",
	  		url: "management_product.php?action=delete&id="+product_id,
	  		success: function(data){
	  			$('#systemmsg').show();
	  			systemeMessage('systemmsg');
	  			productCompleteSearch($('#search').val());
	  			productSimpleSearch($('#search').val());
	  		}
		});
		product_id = "";
	}
}

function productSearchUsedProduct(begda, endda){
	$('#productBox').load("management_product.php?action=report_select", {begda:begda, endda:endda, limit:10, type:'complete'});
}

function calculateTotal(prix_HTVA, tva){
	var prixTotal = 0;
	if (prix_HTVA=='') prix_HTVA=0;
	if( tva == 6 )
		prixTotal = parseFloat(prix_HTVA) + parseFloat(prix_HTVA) * 0.06;
	else	
		prixTotal = parseFloat(prix_HTVA) + parseFloat(prix_HTVA) * 0.21;

	return (prixTotal);	
}

function productSetSpecialType(producttype){ 

	switch(producttype) {
		case '-2':
			$("#consumer_name").val("PERIME");
		break;
		case '-3':
			$("#consumer_name").val("CASSE");
		break;
		default :
			$("#consumer_name").val("");
		break;
	}	
			
}



