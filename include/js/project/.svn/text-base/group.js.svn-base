function deleteConfirmBox(id) {
		
	$('#confirmbox')
		    	.jqmShow()
	    		.find('.butn_link')
    			.click(function(){
    	    		if(this.id == 'delete') {
    	    			deleteGroup(id);
    	    		}
	        		$('#confirmbox').jqmHide();
		 		});
}
		
function deleteGroup(id) {
	window.location.href='admin_people_group.php?action=delete&id='+id;
}

function etiquettePrint(id) {
  	if(id != '') {
		var iframe = "<iframe name='' SRC='../etiquettes/print_rendez.php?id="+ id +"' scrolling='no' height='1' width='1' FRAMEBORDER='no'></iframe>";
		$('etiquette').innerHTML = iframe;
	}
}