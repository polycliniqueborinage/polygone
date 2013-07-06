<div id="left">
		
		<table id="left-drawer" cellpadding="0" cellspacing="0" style="width:100%;">
	    	<tr>
				<!-- CONTENT -->
    	    	<td id="left-drawer-menu" class="drawer-content">
    	    	
    	    		{if $color_schedule1 == "yes"}
					<div id="calendar_list">
					
						<div color1="2952a3" color2="5a94ce" id="color_block_1" class="calendar-item colorsel" onclick="activeColorBlock('color_block_1')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #2952a3;"></div>
								<div class="control"></div>
							</div>
							<div class="title">blue</div>
						</div>
						
						<div color1="E51717" color2="e35353" id="color_block_2" class="calendar-item" onclick="activeColorBlock('color_block_2')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #E51717;"></div>
								<div class="control"></div>
							</div>
							<div class="title">red</div>
						</div>

						<div color1="2ca10b" color2="80d369" id="color_block_3" class="calendar-item" onclick="activeColorBlock('color_block_3')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #2ca10b;"></div>
								<div class="control"></div>
							</div>
							<div class="title">green</div>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select name = "pixels_per_minute" id = "pixels_per_minute" onchange="javascript:changeDay(0,'day');"/>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "1">petit</option>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "2">moyen</option>
								<option {if $pixels_per_minute == "da"}selected="selected"{/if} value = "3">grand</option>
							</select>
						</div>
						
						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select name = "minutes_per_slot" id = "minutes_per_slot" onchange="javascript:changeDay(0,'day');"/>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "5">5 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "10">10 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "15">15 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "20">20 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "30">30 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "60">60 minutes</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "120">120 minutes</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select name = "start_time" id = "start_time" onchange="javascript:changeDay(0,'day');"/>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "0">00:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "60">01:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "120">02:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "180">03:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "240">04:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "300">05:00</option>
							</select>
						</div>

						<div color1="2ca10b" color2="80d369" class="calendar-item">
							<select name = "end_time" id = "end_time" onchange="javascript:changeDay(0,'day');"/>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "0">00:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "60">01:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "120">02:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "180">03:00</option>
								<option {if $minutes_per_slot == "da"}selected="selected"{/if} value = "240">04:00</option>
							</select>
						</div>
						
					</div>
					<br/>
					{/if}	
					
					
    	    		{if $color_schedule2 == "yes"}
					<div id="calendar_list">
					
						<div color="c3d9fd" id="color_block_1" class="calendar-item colorsel" onclick="activeColorBlock('color_block_1')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #c3d9fd;"></div>
								<div class="control"></div>
							</div>
							<div class="title">blue</div>
						</div>
						
						<div color="e08181" id="color_block_2" class="calendar-item" onclick="activeColorBlock('color_block_2')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #e08181;"></div>
								<div class="control"></div>
							</div>
							<div class="title">red</div>
						</div>

						<div color="a2d194" id="color_block_3" class="calendar-item" onclick="activeColorBlock('color_block_3')">
							<div class="color_checkbox">
								<div class="fill" style="background-color: #a2d194;"></div>
								<div class="control"></div>
							</div>
							<div class="title">green</div>
						</div>

					</div>
					<br/>
					{/if}	
										

					{if $debt_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_debt_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findDebtForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findDebtForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findDebtInput" type="text" onFocus="this.select()" onKeyUp="javascript:debtSimpleSearch(this.value)">
    	              			<input class="button" name="commit" value="" type="submit" >
        	          		</form>
                			
                			<div id="informationDebt" class="boxresult">
                			</div>
                			
						</div>
						
					</div>
					<br/>
					{/if}	
					
					
					{if $planning_search == "yes"}
					<a class="taskControl" href="#" onclick="openSaveBox()">Save</a>
					
    	    		<a class="taskControl" href="#">{#dico_global_left_planning_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findPlanningForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findPlanningForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findPlanningInput" type="text" onFocus="this.select()" onKeyUp="javascript:planningSimpleSearch(this.value)">
    	              			<input class="button" name="commit" value="" type="submit" >
        	          		</form>
                			
                			<div id="informationPlanning" class="boxresult">
                			</div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
						
					
					{if $acte_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_acte_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findActeForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findActeForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findActeInput" type="text" onFocus="this.select()" onKeyUp="javascript:acteSimpleSearch(this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationActe" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					

					
					{if $product_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_product_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findProductForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findProductForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findProductInput" type="text" onFocus="this.select()" onKeyUp="javascript:productSimpleSearch(this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationProduct" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					
					{if $ouvrier_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_ouvrier_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findOuvrierForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findOuvrierForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findOuvrierInput" type="text" onFocus="this.select()" onKeyUp="javascript:ouvrierSimpleSearch('',this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationOuvrier" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					<!--
					{if $employee_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_employee_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findEmployeeForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findEmployeeForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findEmployeeInput" type="text" onFocus="this.select()" onKeyUp="javascript:employeeSimpleSearch('',this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationEmployee" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					
					{if $workday_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_workday_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findWorkdayForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findWorkdayForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findWorkdayInput" type="text" onFocus="this.select()" onKeyUp="javascript:workdaySimpleSearch('',this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationWorkday" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}										
					-->
					{if $patient_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_patient_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findPatientForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findPatientForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findMedecinInput" type="text" onFocus="this.select()" onKeyUp="javascript:patientSimpleSearch('',this.value)">
    	              			<input class="button" name="commit" value="" type="submit" >
        	          		</form>
                			
                			<div id="informationPatient" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					
					{if $titulaire_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_titulaire_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findTitulaireForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findTitulaireForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findTitulaireInput" type="text" onFocus="this.select()" onKeyUp="javascript:titulaireSimpleSearch('',this.value)">
    	              			<input class="button" name="commit" value="" type="submit" >
        	          		</form>
                			
                			<div id="informationTitulaire" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}					
					
					
					{if $client_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_client_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findClientForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findClientForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findClientInput" type="text" onFocus="this.select()" onKeyUp="javascript:clientSimpleSearch('',this.value)">
    	              			<input class="button" name="commit" value="" type="submit" >
        	          		</form>
                			
                			<div id="informationClient" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
					
					
					{if $user_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_user_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findUserForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findUserForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findUserInput" type="text" onFocus="this.select()" onKeyUp="javascript:userSimpleSearch('',this.value)">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationUser" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}


					{if $addressbook_search == "yes"}
    	    		<a class="taskControl" href="#">{#dico_global_left_addressbook_title#}</a>
				
					<div class="boxglobal">
					
						<div class="boxsearch">
							<a onclick="$('#findAddressbookForm').toggle()" href="#" class="controls" style="display: block;">{#dico_global_left_search#}</a>
						</div>

						<div id="findAddressbookForm" class="inlineForm" style="display: none;">
							
							<form onsubmit="">
	                  			<input autocomplete="off" class="text-input" id="findAddressbookInput" type="text" onFocus="this.select()" onKeyUp="javascript:addressbookSimpleSearch('',this.value);">
    	              			<input class="button" name="commit" value="" type="submit">
        	          		</form>
                			
                			<div id="informationAddressbook" class="boxresult"></div>
                			
						</div>
						
					</div>
					<br/>
					{/if}
										
					<div class="footer">
						<p>&nbsp;<a target="_blank" href="http://www.mariquecalcus.com">www.mariquecalcus.com</a></p>
						<br/>
 					</div>
 					
				</td>
  			    	
  			    {if $template == "day"}
				<td class="drawer-handle" onclick="togglePage(); changeDay(0,'day'); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
  			    {/if}

  			    {if $template == "week"}
				<td class="drawer-handle" onclick="togglePage(); changeDay(0,'week'); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
  			    {/if}
					
  			    {if $template == "schedule"}
				<td class="drawer-handle" onclick="togglePage(); changeDay(0,'schedule'); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
  			    {/if}

  			    {if $template == ""}
				<td class="drawer-handle" onclick="togglePage(); return false;">
           			<div class="top-corner"></div>
           			<div class="bottom-corner"></div>
       	   	 	</td>
  			    {/if}
				
      		</tr>
		</table>
	</div>
