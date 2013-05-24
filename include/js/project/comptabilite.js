function openInfoBenefice(){
	$('#infobenefice').jqmShow();
}

function openInfoBeneficeFR(){
	$('#infobeneficefr').jqmShow();
}

function openInfoMargeBrute(){
	$('#infomargebrute').jqmShow();
}

function openInfoVAD(){
	$('#infovad').jqmShow();
}

function openInfoCGS(){
	$('#infocgs').jqmShow();
}

function openInfoTEE(){
	$('#infotee').jqmShow();
}

function openInfoFR(){
	$('#infofr').jqmShow();
}

function openInfoBFR(){
	$('#infobfr').jqmShow();
}

function openInfoTR(){
	$('#infotr').jqmShow();
}

function openInfoVADBFR(){
	$('#infovadbfr').jqmShow();
}

function openInfoTEF(){
	$('#infotef').jqmShow();
}

function openInfoCash(){
	$('#infocash').jqmShow();
}

function openClasseComment(classe_id) {

	$("#classe_id").val(classe_id);
	
	$('#editbox').jqmShow();
	/*tinyMCE.get('classe_faits').setContent('');
	tinyMCE.get('classe_conclusions').setContent('');
	tinyMCE.get('classe_actions').setContent('');*/
	 
	
	$.ajax({
  		type: "POST",
  		url: "management_comptabilite.php?classe_id="+classe_id+"&action=ajax_detail",
  		dataType: "json",
  		success: function(data){
  			if (data.classe !='' && data.classe!=null) {
  				
  				$("#classe_id").val(data.classe);
  				$("#classe_nom").html(data.nom);
  				$("#classe_faits").html(data.faits);
	      		$("#classe_conclusions").html(data.conclusions);
	      		$("#classe_actions").html(data.actions);
  				//$("#classe_faits").html(data.faits);
	      		//$("#classe_conclusions").html(data.conclusions);
	      		//$("#classe_actions").html(data.actions);
  				//document.getElementById('classe_faits').innerHTML = data.faits;
  				//document.getElementById('classe_conclusions').innerHTML = data.conclusions;
  				//document.getElementById('classe_actions').innerHTML = data.actions;

  			}
		}
	});
	
	//tinyMCE.execCommand("mceAddControl",true,'content');

}

function printComment(classe_id) {

	$("#classe_id").val(classe_id);
	
	$.ajax({
  		type: "POST",
  		url: "management_comptabilite.php?classe_id="+classe_id+"&action=print_comment",
  		dataType: "json",
  		success: function(msg){
		
		}
	});

}


function saveComment() {
	
	classe      = $('#classe_id').val();
	nom         = $('#classe_nom').val();
	
	faits       = document.getElementById('classe_faits').value;
	conclusions = document.getElementById('classe_conclusions').value;
	actions     = document.getElementById('classe_actions').value;
	
	/*faits       = tinyMCE.get('classe_faits').getContent();
	conclusions = tinyMCE.get('classe_conclusions').getContent();
	actions     = tinyMCE.get('classe_actions').getContent();*/
	
	/*faits       = tinyMCE.get('classe_faits').getContent();
	conclusions = tinyMCE.get('classe_conclusions').getContent();
	actions     = tinyMCE.get('classe_actions').getContent();*/
	
	/*tinyMCE.get('classe_faits').getBody().innerHTML=' ';
	tinyMCE.get('classe_conclusions').getBody().innerHTML=' ';
	tinyMCE.get('classe_actions').getBody().innerHTML=' ';*/


	$.ajax({
    	type: "POST",
   		url: "management_comptabilite.php?action=savecomment&classe="+classe+"&nom="+nom+"&faits="+faits+"&conclusions="+conclusions+"&actions="+actions,
   		success: function(msg){
		tinyMCE.get('classe_faits').getBody().innerHTML=' ';
		tinyMCE.get('classe_conclusions').getBody().innerHTML=' ';
		tinyMCE.get('classe_actions').getBody().innerHTML=' ';
	   }
	 });
	
	$('#editbox').jqmHide();
	
	 
}
