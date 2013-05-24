var cost_center_id;
var project_task_id;

function systemeMessage( id , time ) {
	jQuery('#' + id).fadeTo(10, 0.50);
	jQuery('#' + id).fadeTo(time, 0.99);
	jQuery('#' + id).fadeOut("fast");
} 

function viewCostCenter(id) {
	jQuery('#addcostcenter').show();
	jQuery.ajax({
  		url: 'admin_project?action=',
  		dataType: 'json',
  		data: data,
  		success: callback
	});
}

function editCostCenter(id) {
	jQuery('#addcostcenter').show();
}

function deleteCostCenterConfirmBox(id) {
		
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
    		if(this.id == 'delete') {
    	    	deleteCostCenter(id);
    	    }
	        $('#confirmbox').jqmHide();
		 });
}

function deleteCostCenter(id) {
	window.location.href='admin_people_user.php?action=delete&id='+id;
}



