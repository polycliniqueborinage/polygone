{include file="template_header.tpl" js_jquery132="yes" js_ajax="yes" js_workschedule="yes" js_form="yes" js_jquery_validate="yes" tinymce="yes"}
	
	<div id="middle">
    	
		{include file="template_primary_tabs_admin.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

					<a href="./management_workschedule.php?action=list_dws">{#navigation_title_management_daily_wsr_liste#}</a>

    				{if $daily_wsr.id != ""}
						<span>{#navigation_title_management_daily_wsr_edit#}</span>
					{/if}
					{if $daily_wsr.id == ""}
						<span>{#navigation_title_management_daily_wsr_add#}</span>
					{/if}
    				
    				<a href="./management_workschedule.php?action=list_wsr">{#navigation_title_management_workschedule_liste#}</a>
    				
    				<a href="./management_workschedule.php?action=add_wsr">{#navigation_title_management_workschedule_add#}</a>
    				
				</div>
			
				<div class="ViewPane">
				
					<div class="infowin_left" style = "" id = "systemmsg">
						<div class="error" style="display:none;">
							<span class="info_in_red">
							</span>.<br clear="all"/>
    					</div>
					</div>
					<script>
						systemeMessage('systemmsg',3000);
					</script>
						
					<div class="block_a" >
					
						<div class="in">
					
							<div class="headline">
					
								<h2><a href="javascript:void(0);" id="useredit_toggle" class="win_block" onclick = "toggleBlock('dwsedit');"><img src="./templates/standard/img/16x16/calendar_add.png" alt="" />
									{if $daily_wsr.id != ""}
										<span>{#navigation_title_management_daily_wsr_edit#}</span>
									{/if}
									{if $daily_wsr.id == ""}
										<span>{#navigation_title_management_daily_wsr_add#}</span>
									{/if}
								</a>
								</h2>
							</div>
			
							<div id = "dwsedit" style = "">
			
								<div class="block_in_wrapper">
			
								<form id="form" class="main" method="post" action="management_workschedule.php?action=submit_dws" enctype="multipart/form-data">
						
									<fieldset>

										<div style="float:left;width:80%;">
										
											<div class="row"><label for = "id"          class="name">{#dico_management_daily_wsr_id#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.id}" name = "id" id="id" class="{$errors.id}" realname="{#dico_management_daily_wsr_id#}" onkeyup="javascript:dwsrSimpleSearch(this.value);" onfocus="javascript:this.select()" autocomplete="off"/></div>

											<div class="row"><label for = "description" class="name">{#dico_management_daily_wsr_description#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.description}" name = "description" id="description" class="{$errors.description}" realname="{#dico_management_daily_wsr_description#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											{if $daily_wsr.begtime == ''}
												<div class="row"><label for = "begtime"     class="name">{#dico_management_daily_wsr_begtime#}<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "begtime" id="begtime" class="{$errors.begtime}" realname="{#dico_management_daily_wsr_begtime#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{else}
												<div class="row"><label for = "begtime"     class="name">{#dico_management_daily_wsr_begtime#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.begtime}" name = "begtime" id="begtime" class="{$errors.begtime}" realname="{#dico_management_daily_wsr_begtime#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											
											{if $daily_wsr.endtime == ''}
												<div class="row"><label for = "endtime"     class="name">{#dico_management_daily_wsr_endtime#}<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "endtime" id="endtime" class="{$errors.endtime}" realname="{#dico_management_daily_wsr_endtime#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{else}
												<div class="row"><label for = "endtime"     class="name">{#dico_management_daily_wsr_endtime#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.endtime}" name = "endtime" id="endtime" class="{$errors.endtime}" realname="{#dico_management_daily_wsr_endtime#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											
											{if $daily_wsr.begbreak == ''}
												<div class="row"><label for = "begbreak"    class="name">{#dico_management_daily_wsr_begbreak#}<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "begbreak" id="begbreak" class="{$errors.begbreak}" realname="{#dico_management_daily_wsr_begbreak#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{else}
												<div class="row"><label for = "begbreak"    class="name">{#dico_management_daily_wsr_begbreak#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.begbreak}" name = "begbreak" id="begbreak" class="{$errors.begbreak}" realname="{#dico_management_daily_wsr_begbreak#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											
											{if $daily_wsr.endbreak == ''}
												<div class="row"><label for = "endbreak"    class="name">{#dico_management_daily_wsr_endbreak#}<span class="mandatory">*</span>:</label><input type = "text" value = "00:00" name = "endbreak" id="endbreak" class="{$errors.endbreak}" realname="{#dico_management_daily_wsr_endbreak#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{else}
												<div class="row"><label for = "endbreak"    class="name">{#dico_management_daily_wsr_endbreak#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.endbreak}" name = "endbreak" id="endbreak" class="{$errors.endbreak}" realname="{#dico_management_daily_wsr_endbreak#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											{/if}
											
											<div class="row"><label for = "nb_hours"    class="name">{#dico_management_daily_wsr_nb_hours#}<span class="mandatory">*</span>:</label><input type = "text" value = "{$daily_wsr.nb_hours}" name = "nb_hours" id="nb_hours" class="{$errors.nb_hours}" realname="{#dico_mvanagement_daily_wsr_nb_hours#}" onfocus="javascript:this.select()" autocomplete="off"/></div>
											
											</div>
			
											<div class="row">
												<label>&nbsp;</label>
												<div class="butn"><button type="submit">{#dico_management_protocol_button_send#}</button></div>
											</div>

										<div style="float:left;" >
																						
										</div>
			
									</fieldset>
									
								</form>
			
								<div class="clear_both"></div> {*required ... do not delete this row*}
								
								</div> {*block_in_wrapper end*}
			
							</div>{*useredit end*}
			
							<div class="clear_both"></div> {*required ... do not delete this row*}
			
						</div> {*IN end*}
			
					</div> {*Block B end*}	
					
				</div>
					
			</div>

		</div>

	</div>
	
	{include file="template_left.tpl" daily_wsr_search="yes"}
	
		{literal}
	<script type="text/javascript">
		var valuesize =  null;
		
		$(document).ready(function() {
		
		    $("form").validate({
			rules: {
	  			id: "required",
	  			description: "required",
	  			begtime: "required",
	  			endtime: "required",
	  			begbreak: "required",
	  			endbreak: "required",
	  			nb_hours: "required"
   			},
   			messages: {
				id: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				description: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				begtime: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},		
 				endtime: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},	
 				begbreak: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				endbreak: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				},
 				nb_hours: {
 			    	required: "{/literal}{#dico_management_error_required#}{literal}"
 				}
 			},
			submitHandler: function() {
				form.submit();
			}
		});
		
	});
	</script>
	{/literal}
	
