function controle(value) {
	var checkbox = $('check'+value);
	var id = checkbox.value;
	id = "|" + id + "|";
	if (checkbox.checked == true) {
		id_list = id_list + id;
	} else {
		id_list = id_list.replace(id,"");
	}
}

function print_courriel_test (id) {
	if (id !="") {
		window.open("./management_prevention.php?action=print_courriel_test&id=" + escape(id)); 
	}
}

function print_courriel_contact() {
	window.location.href='management_prevention.php?action=list';
	location.assign(location.href);
	location.reload();
	//location.reload();
	if (id_list !="") {
		//iframe = "<iframe name='' SRC='./management_prevention.php?action=print_courriel_contact&id_list=" + escape(id_list) + "' scrolling='no' height='1' width='1' FRAMEBORDER='no'></iframe>";
		window.open("./management_prevention.php?action=print_courriel_contact&id_list=" + escape(id_list)); 
		//jQuery('print').html(iframe);
		jQuery(':[type=checkbox]').attr('checked', false); 
		id_list="";
		
	}
}

function mailing_contact() {
	jQuery.ajax({
	  		type: "POST",
	  		url: "management_prevention.php?action=mailing_contact&id_list="+escape(id_list),
	  		success: function(data){
				window.location.href='management_prevention.php?action=list';
	  		}
	});
}

function delete_contact_confirmbox() {

	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}


function delete_contact() {
	jQuery.ajax({
	  		type: "POST",
	  		url: "management_prevention.php?action=delete_contact&id_list="+escape(id_list),
	  		success: function(data){
				window.location.href='management_prevention.php?action=list&mode=delete';
	  		}
		});
}

function change_motif_activation(id) {
	var value_checked = $('#motif'+id).attr('checked');
	jQuery.ajax({
	  		type: "POST",
	  		url: "management_prevention.php?action=change_motif_activation&id="+escape(id)+"&value="+value_checked,
	  		success: function(data){
	  			window.location.href='management_prevention.php?action=activation';
	  		}
		});
}

function change_motif_time_agv(id,value) {
	jQuery.ajax({
		type: "POST",
	  	url: "management_prevention.php?action=change_motif_time_agv&id="+id+"&value="+value,
	  	success: function(data){
		}
	});
}

// TAB
var compteur_tab = new Array();
var date_tab = new Array();

function showUpload(id, interval) {
	compteur_tab[id] = compteur_tab[id] + 1;
	$('#spaceused'+id).progressBar(compteur_tab[id]);
	if (compteur_tab[id] <95) setTimeout("showUpload("+id+","+interval+")", interval);
}

function start_motif_batch(id,time_avg) {
	
	date_tab[id] = new Date().getTime();
	compteur_tab[id] = 3;
	$('#spaceused'+id).progressBar(compteur_tab[id]);
	
	//calcul interval
	var interval = time_avg/90;
	setTimeout("showUpload("+id+","+interval+")", interval);
	jQuery.ajax({
	  		type: "POST",
	  		dataType: "json",
	  		url: "management_prevention.php?action=start_motif_batch&id="+id,
	  		success: function(data){
	  			
	  			$('#first_insertion'+id).html(data.first_insertion);
	  			$('#to_call_back'+id).html(data.to_call_back);
	  			$('#init_contact'+id).html(data.init_contact);
	  			$('#still_exist'+id).html(data.still_exist);
	  			$('#deleted'+id).html(data.deleted);
	  			
				$('#spaceused'+id).progressBar(100);
				compteur_tab[id] = 100;
				change_motif_time_agv(id,new Date().getTime() - date_tab[id]);
				
	  		}
		});
}

motif_id = "";

function delete_motif() {
	jQuery.ajax({
	  		type: "POST",
	  		url: "management_prevention.php?action=delete_motif&id="+escape(motif_id),
	  		success: function(data){
	  			window.location.href='management_prevention.php?action=activation&mode=delete';
	  		}
		});
}

function delete_motif_confirmbox(id) {

	motif_id = id;
	$('#confirmbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#confirmbox').jqmHide();
		});
}

function view_motif_box(id) {

	$('#viewbox')
		.jqmShow()
	    .find('.butn_link')
    	.click(function(){
		    $('#viewbox').jqmHide();
		});

	$("#viewbox").load("management_prevention.php?action=detail_motif&id="+id, {}, function() {} );

}