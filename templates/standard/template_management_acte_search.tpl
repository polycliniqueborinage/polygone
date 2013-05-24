{include file="template_header.tpl" js_jquery="yes" js_jquery_datepicker="yes" js_jqmodal="yes" js_acte="yes"}

	<div id="middle">
		
		{include file="template_primary_tabs_management_current.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">
						
					<span>{#dico_management_acte_menu_search#}</span> 

    				<a href="./management_acte.php?action=add">{#dico_management_patient_menu_add#}</a>

	  				<a href="./management_acte.php?action=list">{#dico_management_patient_menu_list#}</a>

				</div>
			
				<div class="ViewPane">
				
						<div class="block_a">
						
							<div class="in">
								
								<div class="block_in_wrapper">

										<form class="main" method="post" action="#">
										
											<fieldset>
										
												<div class="row">
													<label for="name">{#dico_management_acte_complete_search#}:</label>
													<input type="text" name="search" id="search" realname="{#dico_management_acte_complete_search#}" onkeyup="javascript:acteCompleteSearch(this.value);acteSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/>
												</div>
												
											</fieldset>
									
										</form>
									
									</div>
					
								<div id="messagecookie">
								
									<div class="table_head">
										<table cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<td class="b" style="width:2%"></td>
												<td class="b" style="width:9%">{#dico_management_acte_search_colum_action#}</td>
												<td class="b" style="width:15%">{#dico_management_acte_search_colum_code#}</td>
												<td class="b" style="width:24%">{#dico_management_acte_search_colum_description#}</td>
												<td class="b" style="width:15%">{#dico_management_acte_search_colum_cecodis#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_couttr#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_couttp#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_coutvp#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_coutsm#}</td>
												<td class="b" style="width:7%">{#dico_management_acte_search_colum_length#}</td>
											</tr>
										</table>
									</div>
					
									<div class="table_body">
									
										<div id="acteBox">
										
										</div> {*Accordion End*}
										
									</div> {*Table_Body End*}
									
									<div class="clear_both"></div> {*required ... do not delete this row*}
									
								</div>
			        		    
							</div> {*IN end*}
						</div> {*Block A end*}
					

				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" acte_search="yes"}

	{include file="template_right.tpl"}
	
	<div class="jqmWindow" id="addbox">
	
		<div class="jqmConfirmWindow">
		
		    <div class="jqmConfirmTitle clearfix">
    			<h1>{#dico_user_agenda_addbox_title#}</h1>
  			</div>
  			
			<div id="detail" style="display:inline">
 		 		{#dico_user_agenda_addbox_from#} <div class="startconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_to#} <div class="endconsult" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_length#} <div class="length" style="display:inline"></div>
 		 		{#dico_user_agenda_addbox_time#}
 			</div>
			  
			<div class="block_in_wrapper">

				<form class="main" method="post" action="#">
	
					<fieldset>
								
						<div class="row">
							<label>&nbsp;</label>
							<a href="#" class="butn_link" id="add"><span>{#dico_user_agenda_addbox_comment_add#}</span></a>
							<a href="#" class="butn_link" id="cancel"><span>{#dico_user_agenda_addbox_comment_cancel#}</span></a>
						</div>

					</fieldset>

				</form>

			</div>
	
		</div>

	</div>
	
	{literal}
	<script>
	
		function confirmDelete(id) {
		
			alert(id);
			$('#addbox')
		    	.jqmShow()
    			.find('div.startconsult')
    			.html('tttt')
   				.end()
	    		.find('.butn_link')
    			.click(function(){
    	    		if(this.id == 'add') {
    	    			add = true;
    	    		} else {
    	    			add = false;
    	    		}
	        		$('#addbox').jqmHide();
		 		});
		}

		$(document).ready(function(){
		
			$('#addbox').jqm({
				onHide: function(h) { 
			    	h.o.remove(); // remove overlay
			    	h.w.fadeOut(0); // hide window
			    	if (add == true) {
			    		alert('remove');
			    	}
		    	}
			});

  		});
  	</script>
	{/literal}
