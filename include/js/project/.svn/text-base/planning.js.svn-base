var day_id = '';
var user_id = '';
var planning_id = '';
var version_id = '';
var min_top = 480 // 8 heure


function changeWeek(nbr) {

	$("#title").load("management_planning.php", {nbr:nbr,action:'changeweek'}, function() { loadWeek(); } );

}

function saveVersion(name) {

	$("#title").load("management_planning.php", {version_name:name,action:'save_version'}, function() { } );

}

function loadVersion() {

	$("#title").load("management_planning.php", {version_id:version_id,action:'load_version'}, function() { loadWeek(); } );

}

function loadWeek() {

   	$('#save_new_version').hide();
	$('#upload_in_progress').show();
	$('#systemmsg').show();
	
	height = $("#pixels_per_slot").val();

	$("#worker").load("management_planning.php", {action:'build_ouvrier',height:height}, function() { } );
	$("#eventowner_1").load("management_planning.php", {action:'build_event',dayofweek:1,height:height}, function() { } );
	$("#eventowner_2").load("management_planning.php", {action:'build_event',dayofweek:2,height:height}, function() { } );
	$("#eventowner_3").load("management_planning.php", {action:'build_event',dayofweek:3,height:height}, function() { } );
	$("#eventowner_4").load("management_planning.php", {action:'build_event',dayofweek:4,height:height}, function() { } );
	$("#eventowner_5").load("management_planning.php", {action:'build_event',dayofweek:5,height:height}, function() { } );
	$("#eventowner_6").load("management_planning.php", {action:'build_event',dayofweek:6,height:height}, function() { } );
	$("#eventowner_7").load("management_planning.php", {action:'build_event',dayofweek:7,height:height}, function() { } );
	$("#worker_total").load("management_planning.php", {action:'build_worker_total',height:height}, function() { } );
	$("#chipday_1").load("management_planning.php", {action:'build_chip',dayofweek:1,height:height}, function() { } );
	$("#chipday_2").load("management_planning.php", {action:'build_chip',dayofweek:2,height:height}, function() { } );
	$("#chipday_3").load("management_planning.php", {action:'build_chip',dayofweek:3,height:height}, function() { } );
	$("#chipday_4").load("management_planning.php", {action:'build_chip',dayofweek:4,height:height}, function() { } );
	$("#chipday_5").load("management_planning.php", {action:'build_chip',dayofweek:5,height:height}, function() { } );
	$("#chipday_6").load("management_planning.php", {action:'build_chip',dayofweek:6,height:height}, function() { } );
	$("#chipday_7").load("management_planning.php", {action:'build_chip',dayofweek:7,height:height}, function() { $('#upload_in_progress').hide(); } );
		
}

function openEditPlanningBox(ID) {

	$('#savebox').jqmHide();
	$('#loadbox').jqmHide();
	$('#viewbox').jqmHide();
	$('#editbox').jqmShow();
	
	$.ajax({
  		type: "POST",
  		url: "management_planning.php",
  		data: "id="+ID+"&action=ajax_detail",
  		dataType: "json",
  		success: function(data){
  		
  			if (data.planning_ID !='' && data.planning_ID!=null) {
  			
  				$("#ouvrier_edit").html(data.ouvrier_nom + ' ' + data.ouvrier_prenom);
  				
	      		$("#ouvrier_salaire_horaire_edit").html(data.ouvrier_salaire_horaire);
	      		$("#ouvrier_bonus_recurrent_edit").html(data.ouvrier_bonus_recurrent);
	      		$("#ouvrier_cout_recurrent_edit").html(data.ouvrier_cout_recurrent);
	      		
	      		$("#planning_id_edit").val(data.planning_ID);
	      		$("#planning_hour_edit").val(data.planning_hour);
	      		$("#planning_salaire_edit").val(data.planning_salaire_horaire);
	      		$("#planning_bonus_recurrent_edit").val(data.planning_bonus_recurrent);
	      		$("#planning_cout_recurrent_edit").val(data.planning_cout_recurrent);
	      		$("#planning_bonus_recurrent_edit_comment").val(data.planning_bonus_recurrent_comment);
	      		$("#planning_cout_recurrent_edit_comment").val(data.planning_cout_recurrent_comment);

	      		$("#planning_revenue_edit").val(data.planning_revenue);
	      		$("#planning_resource_edit").val(data.planning_resource);
	      		$("#planning_resource_id_edit").val(data.planning_resource_ID);
	      		$("#planning_comment_edit").val(data.planning_comment);
	      		
    		}
    		
  		}
	});
}

function openAddPlanningBox(ouvrier_ID, dayofweek, date) {

	$("#ouvrier_id_edit").val(ouvrier_ID);
	$("#dayofweek_edit").val(dayofweek);
	$("#date_edit").val(date);

	$('#editbox').jqmShow();
	
	$.ajax({
  		type: "POST",
  		url: "management_ouvrier.php",
  		data: "id="+ouvrier_ID+"&action=ajax_detail",
  		dataType: "json",
  		success: function(data){
  			if (data.ouvrier_ID !='' && data.ouvrier_ID!=null) {
  			
	      		$("#ouvrier_edit").html(data.ouvrier_nom + ' ' + data.ouvrier_prenom);

	      		$("#planning_bonus_recurrent_edit").val(data.ouvrier_bonus_recurrent);
	      		$("#planning_cout_recurrent_edit").val(data.ouvrier_cout_recurrent);

	      		$("#ouvrier_salaire_horaire_edit").html(data.ouvrier_salaire_horaire);
	      		$("#ouvrier_bonus_recurrent_edit").html(data.ouvrier_bonus_recurrent);
	      		$("#ouvrier_cout_recurrent_edit").html(data.ouvrier_cout_recurrent);

    		}
  		}
	});

}

function openViewPlanningBox(ID) {
	
	$('#viewbox').jqmShow();
	
	$.ajax({
  		type: "POST",
  		url: "management_planning.php",
  		data: "id="+ID+"&action=ajax_detail",
  		dataType: "json",
  		success: function(data){
  		
  			if (data.planning_ID !='' && data.planning_ID!=null) {

	      		$("#ouvrier_view").html(data.ouvrier_nom+' '+data.ouvrier_prenom);
	      		$("#ouvrier_salaire_horaire_view").html(data.ouvrier_salaire_horaire);
	      		$("#ouvrier_bonus_recurrent_view").html(data.ouvrier_bonus_recurrent);
	      		$("#ouvrier_cout_recurrent_view").html(data.ouvrier_cout_recurrent);

	      		$("#planning_id_view").val(data.planning_ID);
	      		$("#planning_hour_view").html(data.planning_hour);
	      		$("#planning_salaire_view").html(data.planning_salaire);
	      		$("#planning_bonus_recurrent_view").html(data.planning_bonus_recurrent);
	      		$("#planning_bonus_recurrent_view_comment").html(data.planning_bonus_recurrent_comment);
	      		$("#planning_cout_recurrent_view").html(data.planning_cout_recurrent);
	      		$("#planning_cout_recurrent_view_comment").html(data.planning_cout_recurrent_comment);

	      		$("#planning_revenue_view").html(data.planning_revenue);
	      		$("#planning_resource_view").html(data.planning_resource);
	      		$("#planning_comment_view").html(data.planning_comment);
	      		
    		}
    		
  		}
	});
}

function openSaveBox() {

	$('#loadbox').jqmHide();
	$('#viewbox').jqmHide();
	$('#editbox').jqmHide();
	$('#savebox').jqmShow();
	
}

function openLoadBox(ID) {

	version_id = ID;

	$('#viewbox').jqmHide();
	$('#editbox').jqmHide();
	$('#savebox').jqmHide();
	$('#loadbox').jqmShow();
	
}

function openAllDeleteBox() {
	$('#viewbox').jqmHide();
	$('#deleteallbox').jqmShow();
}

function openDeleteBox(ID) {
	planning_id = ID;
	$('#viewbox').jqmHide();
	$('#deletebox').jqmShow();
}

function openDayDeleteBox(ID) {
	day_id = ID;
	$('#viewbox').jqmHide();
	$('#deletedaybox').jqmShow();
}

function openUserDeleteBox(ID) {
	user_id = ID;
	$('#viewbox').jqmHide();
	$('#deleteuserbox').jqmShow();
}

function openDeletePlanningVersionBox(ID) {
    version_id = ID;
    $('#confirmbox')
        .jqmShow()
        .find('.butn_link')
        .click(function(){
            $('#confirmbox').jqmHide();
        });
}

function savePlanning() {

	planning_ID = $('#planning_id_edit').val();
	ouvrier_ID = $('#ouvrier_id_edit').val();
	dayofweek = $('#dayofweek_edit').val();
	date = $('#date_edit').val();
	
	hour = parseFloat($('#planning_hour_edit').val());
	length = hour * 60;
	top = min_top;
	
	salaire_horaire = $('#planning_salaire_edit').val();
	bonus_recurrent = $('#planning_bonus_recurrent_edit').val();
	bonus_recurrent_comment = $('#planning_bonus_recurrent_edit_comment').val();
	cout_recurrent = $('#planning_cout_recurrent_edit').val();
	cout_recurrent_comment = $('#planning_cout_recurrent_edit_comment').val();
	revenue = $('#planning_revenue_edit').val();

	resource = $('#planning_resource_edit').val();
	resource_ID = $('#planning_resource_id_edit').val();
	comment = $('#planning_comment_edit').val();
	color1 = $('.colorsel').attr("color1");
	color2 = $('.colorsel').attr("color2");

	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=save&planning_ID="+planning_ID+"&ouvrier_ID="+ouvrier_ID+"&dayofweek="+dayofweek+"&date="+date+"&top="+top+"&length="+length+"&salaire_horaire="+salaire_horaire+"&bonus_recurrent="+bonus_recurrent+"&cout_recurrent="+cout_recurrent+"&bonus_recurrent_comment="+bonus_recurrent_comment+"&cout_recurrent_comment="+cout_recurrent_comment+"&revenue="+revenue+"&resource="+resource+"&resource_ID="+resource_ID+"&comment="+comment+"&color1="+color1+"&color2="+color2 ,
   		success: function(msg){
			//changeWeek(0);
			loadWeek();
	   }
	 });
	
	$('#editbox').jqmHide();
	 
}

function deleteAllPlanning() {
	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=delete_all",
   		success: function(msg){
			loadWeek();
	   }
	 });
}

function deletePlanning() {
	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=delete&planning_ID="+planning_id,
   		success: function(msg){
			loadWeek();
			planning_id = '';
	   }
	 });
}

function deleteDayPlanning() {
	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=delete_for_day&dayofweek="+day_id,
   		success: function(msg){
			loadWeek();
			day_id = '';
	   }
	 });
}

function deleteUserPlanning() {
	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=delete_for_user&ouvrier_ID="+user_id,
   		success: function(msg){
			loadWeek();
			user_id = '';
	   }
	 });
}

function deleteVersionPlanning() {

    if (version_id !='') {
        $.ajax({
              type: "POST",
              url: "management_planning.php?action=delete_version&version_id="+version_id,
              success: function(data){
                  $('#systemmsg').show();
                  systemeMessage('systemmsg',3000);
                  planningCompleteSearch('',$('#search').val());
                  planningSimpleSearch('',$('#search').val());
              }
        });
        version_id = "";
    }
}

function saveNewVersion() {

	version_name = $('#planning_save_name').val();

	$.ajax({
    	type: "POST",
   		url: "management_planning.php",
   		data: "action=save_new_version&version_name="+version_name,
   		success: function(msg){
   			$('#save_new_version').show();
			systemeMessage('systemmsg',3000);	   	
	   	}
	   	
	});
	
	$('#editbox').jqmHide();
	 
}

function planningSimpleSearch(value) {
	$('#findPlanningForm').show();
	$("#informationPlanning").load("management_planning.php?action=modulesearch", {value:value,limit:10,type:'simple'});
}

function planningCompleteSearch(id,value) {
    $("#searchBox").load("management_planning.php?action=modulesearch", {id:id,value:value,limit:10,type:'complete'});
}
