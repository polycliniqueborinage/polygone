var employee_id;

function employeeSimpleSearch(id,value) {
	$('#findEmployeeForm').show();
	$("#informationEmployee").load("user_services.php?action=modulesearch", {id:id,value:value,limit:5,type:'simple'});
}

