// globale param for the calendar
// start at 00:00
var topMinGlobal = 0;
// finish at 00:00
var topMaxGlobal = 1440;

// pixel per slot
var pixelPerSlotGlobal = 30;
// minute per slot
var minutePerSlotGlobal = 10;
// pixel per minute
var pixelPerMinuteGlobal = pixelPerSlotGlobal / minutePerSlotGlobal;

// calculable
// minutes per Double Slot For time
//var minutePerDoubleSlotGlobal = 2 * minutePerSlotGlobal;  //
// pixel per Slot For time
//var pixelPerSlotGlobal = pixelPerMinuteGlobal * minutePerSlotGlobal;
// pixel per Double Slot For time
//var pixelPerSlotGlobal = pixelPerMinuteGlobal * minutePerDoubleSlotGlobal;

// temp variable link with the chip
var dayofweekCurrent;
var positionCurrent; // % minutes
var topCurrent; // % minutes
var lengthCurrent // % minutes
var addCurrent;
var detailIDCurrent;
var detailPatientIDCurrent
var detailMotifIDCurrent

function dateHM(time) {
	var addZero = function(v) { return v<10 ? '0' + v : v; };
	var d = new Date(time * 1000 * 60); // js fonctionne en milisecondes
	var t = [];
	t.push(addZero(d.getHours()-1));
	t.push(addZero(d.getMinutes()));
	return t.join(':');
}

/*
	Selectable row
*/
function startSelectable(dayofweek) {

	$('#eventowner_'+dayofweek).selectable({
		accept : 'selectableitem_'+dayofweek,
		stop: function(){
			
			lengthCurrent = 0;
			$(".ui-selected", this).each(function(){
				lengthCurrent++;  // % slot
			});
			topCurrent = parseInt($(".ui-selected").attr('top')); // % slot
			
			dayConsultCurrent = $(".ui-selected").attr('day');
			dayofweekCurrent = dayofweek;
			
			// convert slot to minute
			topCurrent = topMinGlobal + (topCurrent * minutePerSlotGlobal ) ; // % minutes
			lengthCurrent =  lengthCurrent * minutePerSlotGlobal;
			
			// open edit box
			editConsultationBox(dayConsultCurrent,topCurrent,lengthCurrent,dayofweek);
		}
	});
}

/*
 Draggable
*/
function startDraggable(template) {

	$(".chip").draggable( {
		opacity:	0.9,
		grid:		[20,pixelPerSlotGlobal],
		stack: false,
		handle:	'.title',
		containment : '#tablecontainer',
		stop: function(e, ui) {
	
			dayofweek = $(this).attr('dayofweek');
			day = $(this).attr('day');
			id = $(this).attr('id');
			topCurrent = parseInt($(this).css('top')); //% pixel
			lengthCurrent = parseInt($(this).css('height')); //% pixel
			
			topCurrent = topMinGlobal + (topCurrent/pixelPerMinuteGlobal); // % slot
			lengthCurrent =  lengthCurrent/pixelPerMinuteGlobal; // % slot
			
			startConsultCurrent = dateHM(topCurrent);
			endConsultCurrent = dateHM((topCurrent + lengthCurrent));

			$.ajax({
				type: "POST",
				url: "user_agenda_gestion.php",
				data: "action=move&day="+day+"&id="+id+"&start="+startConsultCurrent+"&end="+endConsultCurrent+"&length="+lengthCurrent+"&top="+topCurrent,
				success: function(msg){
					$('#add_done').hide();
					$('#delete_done').hide();
					$('#update_done').show();
					$('#systemmsg').show();
					refreshAgenda(template,dayofweek);
				}
			});
    			
    	},
		drag: function(e, ui) {
    			$('.ui-draggable-dragging').attr("class","chip ui-draggable moving");
    	}
	});
	
}

/*
 Resizable
*/
function startResizable(template) {

	$(".chip").resizable({

		stop: function(event, ui) {

			dayofweek = $(this).attr('dayofweek');
			day = $(this).attr('day');
			id = $(this).attr('id');

			topCurrent = parseFloat($(this).css('top')); //% pixel
			lengthCurrent = parseFloat($(this).css('height')); //% pixel
			
			topCurrent = topMinGlobal + (topCurrent/pixelPerMinuteGlobal); // % slot
			lengthCurrent =  lengthCurrent/pixelPerMinuteGlobal; // % slot
			
			startConsultCurrent = dateHM(topCurrent);
			endConsultCurrent = dateHM(topCurrent + lengthCurrent);

			$.ajax({
				type: "POST",
				url: "user_agenda_gestion.php",
				data: "action=move&day="+day+"&id="+id+"&start="+startConsultCurrent+"&end="+endConsultCurrent+"&length="+lengthCurrent+"&top="+topCurrent,
				success: function(msg){
					$('#add_done').hide();
					$('#delete_done').hide();
					$('#update_done').show();
					$('#systemmsg').show();
					refreshAgenda(template,dayofweek);
				}
			});

		},
		handlers: {
			s: '.ui-resizable-s'
		},
		grid:		[1000,pixelPerSlotGlobal],
		handles: 's'
	});
}



/* Change day on day template*/
function changeDay(nbr,template) {

	minutePerSlotGlobal = parseInt($('#minutes_per_slot').val());
	pixelPerMinuteGlobal = parseInt($('#pixels_per_minute').val());
	pixelPerSlotGlobal = minutePerSlotGlobal * pixelPerMinuteGlobal;
	topMinGlobal = parseInt($('#start_time').val());
	topMaxGlobal = parseInt($('#end_time').val());

	$('#add_done').hide();
	$('#delete_done').hide();
	$('#update_done').hide();
	$('#upload_in_progress').show();
	$('#systemmsg').show();
	$("#chipdayresume").html('');

	switch(template) {
		case 'list':
			$("#title").load("user_agenda_gestion.php", {nbr:nbr,action:'changeday'}, function() {refreshAgendaFull(template);} );
		break;
		case 'day':
			$("#title").load("user_agenda_gestion.php", {nbr:nbr,action:'changeday'}, function() {refreshAgendaFull(template);} );
			$("#eventowner_0").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:0,topMin:topMinGlobal,topMax:topMaxGlobal,pixelPerSlot:pixelPerSlotGlobal,minutePerSlot:minutePerSlotGlobal}, function() { startSelectable(0); } );
		break;
		case 'week':
			$("#title").load("user_agenda_gestion.php", {nbr:nbr,action:'changeday'}, function() {refreshAgendaFull(template);} );
			$("#eventowner_1").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:1}, function() { startSelectable(1); } );
			$("#eventowner_2").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:2}, function() { startSelectable(2); } );
			$("#eventowner_3").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:3}, function() { startSelectable(3); } );
			$("#eventowner_4").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:4}, function() { startSelectable(4); } );
			$("#eventowner_5").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:5}, function() { startSelectable(5); } );
			$("#eventowner_6").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:6}, function() { startSelectable(6); } );
			$("#eventowner_7").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:7}, function() { startSelectable(7); } );
		break;
		case 'schedule':
			width = $('#chipdayresume').css('width');
			width = width.substring(0,width.indexOf('p'));
			$("#chipdayresume").load("user_agenda_gestion.php", {action:'agenda_week_days',width:width}, function() { } );
			$("#hoursrow_1").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:1}, function() { startSelectableSchedule(1);} );
			$("#hoursrow_2").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:2}, function() { startSelectableSchedule(2); } );
			$("#hoursrow_3").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:3}, function() { startSelectableSchedule(3);} );
			$("#hoursrow_4").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:4}, function() { startSelectableSchedule(4);} );
			$("#hoursrow_5").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:5}, function() { startSelectableSchedule(5);} );
			$("#hoursrow_6").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:6}, function() { startSelectableSchedule(6);} );
			$("#hoursrow_7").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:7}, function() { startSelectableSchedule(7); refreshAgendaFullComplete();} );
		break;
		case 'week_day':
			$("#title").load("user_agenda_gestion.php", {date:nbr,action:'changedayfromcalendar'}, function() {refreshAgendaFull('day');} );
			window.location.href = "user_agenda.php?action=day";
		break;
		case 'calendar_day':
			$("#title").load("user_agenda_gestion.php", {date:nbr,action:'changedayfromcalendar'}, function() {refreshAgendaFull('day');} );
			$("#eventowner_0").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:0}, function() { startSelectable(0); } );
		break;
		case 'calendar_week':
			$("#title").load("user_agenda_gestion.php", {date:nbr,action:'changedayfromcalendar'}, function() {refreshAgendaFull('week');} );
			$("#eventowner_1").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:1}, function() { startSelectable(1); } );
			$("#eventowner_2").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:2}, function() { startSelectable(2); } );
			$("#eventowner_3").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:3}, function() { startSelectable(3); } );
			$("#eventowner_4").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:4}, function() { startSelectable(4); } );
			$("#eventowner_5").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:5}, function() { startSelectable(5); } );
			$("#eventowner_6").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:6}, function() { startSelectable(6); } );
			$("#eventowner_7").load("user_agenda_gestion.php", {action:'agenda_event',dayofweek:7}, function() { startSelectable(7); } );
		break;
	}	
	
}

function refreshAgendaFull(template) {

	switch(template) {
		case 'list':
			$("#agenda_list").load("user_agenda_gestion.php", {action:'agenda_list'}, function() {refreshAgendaFullComplete(); } );
		break;
		case 'day':
			width = $('#chipdayresume').css('width');
			width = width.substring(0,width.indexOf('p'));
			//$("#chipdayresume").load("user_agenda_gestion.php", {action:'agenda_resume',width:width}, function() { } );
			$("#hoursrow_0").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:0,topMin:topMinGlobal,topMax:topMaxGlobal,pixelPerSlot:pixelPerSlotGlobal,minutePerSlot:minutePerSlotGlobal}, function() { } );
			$("#chipday_0").load("user_agenda_gestion.php", {action:'agenda_day',template:template,dayofweek:0,topMin:topMinGlobal,topMax:topMaxGlobal,pixelPerSlot:pixelPerSlotGlobal,minutePerSlot:minutePerSlotGlobal}, function() { startDraggable(template); startResizable(template); refreshAgendaFullComplete(); } );
			
		break;
		case 'week':
			width = $('#chipdayresume').css('width');
			width = width.substring(0,width.indexOf('p'));
			$("#chipdayresume").load("user_agenda_gestion.php", {action:'agenda_week_days',width:width}, function() { } );
			$("#hoursrow_1").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:1}, function() { } );
			$("#hoursrow_2").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:2}, function() { } );
			$("#hoursrow_3").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:3}, function() { } );
			$("#hoursrow_4").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:4}, function() { } );
			$("#hoursrow_5").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:5}, function() { } );
			$("#hoursrow_6").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:6}, function() { } );
			$("#hoursrow_7").load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:7}, function() { } );
			$("#chipday_1").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:1,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_2").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:2,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_3").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:3,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_4").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:4,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_5").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:5,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_6").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:6,template:template}, function() { startDraggable(template); startResizable(template); } );
			$("#chipday_7").load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:7,template:template}, function() { startDraggable(template); startResizable(template); refreshAgendaFullComplete();} );
		break;
	}	
	
}

function refreshAgendaFullComplete() {
	$('#upload_in_progress').hide();
}



function refreshAgenda(template,dayofweek) {
	switch(template) {
		case 'list':
			$("#agenda_list").load("user_agenda_gestion.php", {action:'agenda_list'}, function() { } );
		break;
		case 'day':
			width = $('#chipdayresume').css('width');
			width = width.substring(0,width.indexOf('p'));
			//$("#chipdayresume").load("user_agenda_gestion.php", {action:'agenda_resume',width:width}, function() { } );
			$("#chipday_0").load("user_agenda_gestion.php", {action:'agenda_day',template:template,dayofweek:0,topMin:topMinGlobal,topMax:topMaxGlobal,pixelPerSlot:pixelPerSlotGlobal,minutePerSlot:minutePerSlotGlobal}, function() { startDraggable(template); startResizable(template); refreshAgendaFullComplete(); systemeMessage('systemmsg',3000); } );
		break;
		case 'week':
			width = $('#chipdayresume').css('width');
			width = width.substring(0,width.indexOf('p'));
			$("#chipdayresume").load("user_agenda_gestion.php", {action:'agenda_week_days',width:width}, function() { } );
			$("#chipday_"+dayofweek).load("user_agenda_gestion.php", {action:'agenda_day',dayofweek:dayofweek,template:template}, function() { startDraggable(template); startResizable(template); systemeMessage('systemmsg',3000); } );
		break;
		case 'schedule':
			$('.selectableitem_'+dayofweek).removeClass("ui-selected");
			$("#hoursrow_"+dayofweek).load("user_agenda_gestion.php", {action:'agenda_hour',dayofweek:dayofweek}, function() { systemeMessage('systemmsg',1500); } );
		break;
	}
}














function startSelectableSchedule(id) {
	$('#eventowner_'+id).selectable({
		accept : 'selectableitem_'+id,
		stop: function(){
			length = 0;
			position = $(".ui-selected").attr("id");
			color = $('.colorsel').attr("color");
			$(".ui-selected", this).each(function(){
				length++;
			});
			changeScheduleColor(position,length,color);
		}
	});
}


function editConsultationBox(dayConsultCurrent,topCurrent,lengthCurrent,dayofweek) {
		
	startConsultCurrent = dateHM(topCurrent);
	endConsultCurrent = dateHM(topCurrent + lengthCurrent);
	
	$('#update_title').hide();
	$('#add_title').show();
	
	$('#update_button').hide();
	$('#add_button').show();
			
	$('#agendaaddbox')
		.jqmShow()
    	.find('div.startconsult')
    	.html(startConsultCurrent)
   		.end()
    	.find('div.endconsult')
    	.html(endConsultCurrent)
   		.end()
    	.find('div.length')
    	.html(lengthCurrent)
   		.end()
	    .find('.butn_link')
    	.click(function(){
    		if(this.id == 'add') {
    	    	add = true;
    	    } else {
    	    	add = false;
    	    }
	   	$('#agendaaddbox').jqmHide();
	});
	
}


/* ADD consultation */
function addConsultation(dayConsultCurrent,topCurrent,lengthCurrent,patient,patient_id,motif,motif_id,location,comment,template) {

	startConsultCurrent = dateHM(topCurrent);
	endConsultCurrent = dateHM(topCurrent + lengthCurrent);

	color1 = $('.colorsel').attr("color1");
	color2 = $('.colorsel').attr("color2");
	
	$.ajax({
    	type: "POST",
   		url: "user_agenda_gestion.php",
   		data: "action=add&day="+dayConsultCurrent+"&start="+startConsultCurrent+"&end="+endConsultCurrent+"&length="+lengthCurrent+"&top="+topCurrent+"&color1="+color1+"&color2="+color2+"&patient="+patient+"&patient_id="+patient_id+"&motif="+motif+"&motif_id="+motif_id+"&location="+location+"&comment="+comment ,
   		success: function(msg){
			$('#add_done').show();
			$('#delete_done').hide();
			$('#update_done').hide();
			$('#systemmsg').show();
			refreshAgenda(template,dayofweekCurrent);
	   }
	 });
	 
}


/* MODIF consultation */
function modifConsultation(id,patient,patient_id,motif,motif_id,location,comment,template) {
	$.ajax({
    	type: "POST",
   		url: "user_agenda_gestion.php",
   		data: "action=update&id="+id+"&patient="+patient+"&patient_id="+patient_id+"&motif="+motif+"&motif_id="+motif_id+"&location="+location+"&comment="+comment ,
   		success: function(msg){
			$('#add_done').hide();
			$('#delete_done').hide();
			$('#update_done').show();
			$('#systemmsg').show();
			refreshAgenda(template,$('#chip'+id).attr('dayofweek'));
	   }
	 });
}





		
function deleteConsultationBox(id) {
	detail_id = id;
	$('#agendaconfirmbox').jqmShow();
	$('#agendaviewbox').jqmHide();
}



function deleteConsultation(template) {
	$.ajax({
		type: "POST",
		url: "user_agenda_gestion.php",
		data: "id="+detail_id+"&action=delete",
		success: function(data){
			$('#delete_done').show();
			$('#update_done').hide();
			$('#add_done').hide();
			$('#systemmsg').show();
			refreshAgenda(template,$('#chip'+detail_id).attr('dayofweek'));
			detail_id = null;
		}
	});
}

function viewPatient() {
	detail_patient_id = $('#detail_patient_id').val();
	if (detail_patient_id !='') {
		window.location.href='management_patient.php?action=view&id='+detail_patient_id;
	}
}

function viewMotif() {
	detail_motif_id = $('#detail_motif_id').val();
	if (detail_motif_id !='') {
		window.location.href='management_acte.php?action=view&id='+detail_motif_id;
	}
}

function viewConsultation(id) {
	
	$('#agendaviewbox').jqmShow();
	
	$.ajax({
  		type: "POST",
  		url: "user_agenda_gestion.php",
  		data: "id="+id+"&action=detail",
  		dataType: "json",
  		success: function(data){
  		
  			if (data.ID !='' && data.ID!=null) {
	      		$("#detail_start").html(data.start);
	      		$("#detail_end").html(data.end);
	      		$("#detail_length").html(data.length);
	      		$("#detail_patient").html(data.patient);
	      		$("#detail_motif").html(data.motif);
	      		$("#detail_location").html(data.location);
	      		$("#detail_comment").html(data.comment);
	      		$("#detail_patient_addresse").html(data.patient_addresse);
	      		$("#detail_motif_description").html(data.motif_description);
	      		$("#detail_id").val(data.ID);
	      		$("#detail_patient_id").val(data.patient_id);
	      		$("#detail_motif_id").val(data.motif_id);
	      		
    		}
    		
  		}
	});
}

function editConsultation(id) {
	
	$('#update_title').show();
	$('#add_title').hide();
	
	$('#update_button').show();
	$('#add_button').hide();
	
	$('#agendaaddbox').jqmShow()
		.find('.butn_link')
    	.click(function(){
    		if(this.id == 'add') {
    	    	add = true;
    	    } else {
    	   		add = false;
    		}
	        $('#agendaaddbox').jqmHide();
		 	});
		 		
	$('#agendaviewbox').jqmHide();
	
	$.ajax({
  		type: "POST",
  		url: "user_agenda_gestion.php",
  		data: "id="+id+"&action=detail",
  		dataType: "json",
  		success: function(data){
  		
  			if (data.ID !='' && data.ID!=null) {
	      		$(".startconsult").html(data.start);
	      		$(".endconsult").html(data.end);
	      		$(".length").html(data.length);

	      		$("#id").val(data.ID);
	      		$("#motif_id").val(data.patient_id);
	      		$("#patient_id").val(data.motif_id);
	      		$("#patient").val(data.patient);
	      		$("#motif").val(data.motif);
	      		$("#location").val(data.location);
	      		$("#comment").val(data.comment);
	      		
    		}
    		
  		}
	});
}

// recherche d'un patient
function patientAutoComplete(value,id) {

	$("#overlayInformationPatient").load("management_patient.php?action=modulesearch&id="+id, {value:value,limit:5,type:'overlay'});
	
	$.ajax({
  		type: "POST",
  		url: "management_patient.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#patient_id").val(data.ID);
	      		$("#patient").val(data.patient);
    		} else {
    			$("#patient_id").val('');
	      		//$("#patient").val('');
    		}
    		
  		}
	});
}

// recherche d'un patient
function motifAutoComplete(value,id) {

	$("#overlayInformationMotif").load("management_acte.php?action=modulesearch&id="+id, {value:value,limit:5,type:'overlay'});

	$.ajax({
  		type: "POST",
  		url: "management_acte.php?action=autocomplete&id="+id,
  		data: "value="+value,
  		dataType: "json",
  		success: function(data){
  			
  			if (data.ID !='' && data.ID!=null) {
	      		$("#motif_id").val(data.ID);
	      		$("#motif").val(data.code);
    		} else {
    			$("#motif_id").val('');
    		}
    		
  		}
	});
}

function etiquettePrint(id) {
  	if(id != '') {
		var iframe = "<iframe name='' SRC='../etiquettes/print_rendez.php?id="+ id +"' scrolling='no' height='1' width='1' FRAMEBORDER='no'></iframe>";
		$('etiquette').innerHTML = iframe;
	}
}

/* Scheduler
*
*/

function changeScheduleColor(position,length,color) {
	
	day = position.substring(0,position.indexOf('#'));
	start = position.substring(position.indexOf('_')+1);
	length = parseFloat(length);
	hours = "'";
	
	for(i = 0 ; i < length ; i++) {
	 hours = hours + table['day_'+start] + "','";
	 start ++;
	 start ++;
	}
	hours = hours.substring(0, hours.length-2);
	
	$.ajax({
    	type: "POST",
   		url: "user_agenda_gestion.php",
   		data: "action=change_schedule_color&day="+ day +"&hours=" + hours + "&color=" + color,
   		success: function(msg){
   			$('.selectableitem_'+day).removeClass("selecteditem");
			$('#add_done').hide();
			$('#delete_done').hide();
			$('#update_done').show();
			$('#systemmsg').show();
   			refreshAgenda('schedule',day);
	   }
	 });
}



/* task 
*
*/
task_id = "";
function delete_task(url_refresh) {
	jQuery.ajax({
	  	type: "POST",
	  	url: "user_agenda.php?action=task_delete&id="+escape(task_id),
	  	success: function(data){
	  		window.location.href=url_refresh;
	  	}
	});
}

function delete_task_confirmbox(id) {
	task_id = id;
	$('#taskconfirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#taskconfirmbox').jqmHide();
	});
}

function close_task(id,url_refresh) {
	jQuery.ajax({
	  	type: "POST",
	  	url: "user_agenda.php?action=task_close&id="+escape(id),
	  	success: function(data){
	  		window.location.href=url_refresh;
	  	}
	});
}

function open_task(id,url_refresh) {
	jQuery.ajax({
	  	type: "POST",
	  	url: "user_agenda.php?action=task_open&id="+escape(id),
	  	success: function(data){
	  		window.location.href=url_refresh;
	  	}
	});
}

function view_task_box(id) {
	$('#taskviewbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#viewbox').jqmHide();
		});
	$("#taskviewbox").load("user_agenda.php?action=task_view&id="+id, {}, function() {} );
}