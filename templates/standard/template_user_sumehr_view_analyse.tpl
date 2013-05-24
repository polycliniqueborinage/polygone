{include file="template_header.tpl" js_jquery132="yes" js_jquery_ui_171="yes" js_jqmodal="yes" js_jquery_prettyphoto="no" js_jquery_prettyphoto3="yes" js_rico="yes" js_sumehr="yes" js_protocol="yes"}

	<div id="middle">
    	
		{include file="template_primary_tabs_user.tpl"}   
      
	  	<div id="main">
        
			<div id="tab_panel">
			
				<div class="secondary_tabs">

    				<a href="./user_sumehr.php?action=search">{#dico_sumehr_menu_search#}</a>
					{*<span>{#dico_sumehr_menu_view#}</span>*}
					<a href="./user_sumehr.php?action=module_analyse">{#dico_sumehr_menu_search_analyse#}</a>
					<span>{#dico_sumehr_menu_view_analyse#}</span> 

				</div>
			
				<div class="ViewPane">
				
					<div class="block_a" >
			
						<div class="in">
					
							<div class="headline">
								<h2><a href="user_sumehr.php?action=print_analyse&patient_id={$patient_id}&examen_id={$examen_id}" style="float:right"><img src="./templates/standard/img/16x16/printer.png" alt="" /></a>
									<span>{#dico_sumehr_submenu_view_analyse#} {$exams.0.examen_date} {#dico_sumehr_submenu_view_analyse_pour#} {$exams.0.patient_prenom} {$exams.0.patient_nom} {#dico_sumehr_submenu_view_analyse_demandee#} {$exams.0.medecin_prenom} {$exams.0.medecin_nom}</span></a>
								</h2>
							</div>
							
							<div id = "" style = "">
								<h3>{$exams.0.groupe_label}</h3><br>
								<table width="100%">
								<tr>
									<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_code#}</th>
									<th style='width:30%' align='left'>{#dico_sumehr_tableheader_analyse_label#}</th>
									<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_reference#}</th>
									<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_unite#}</th>
									<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_info#}</th>
									<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_resultat#}</th>
								</tr>
								{section name=exam loop=$exams}
									
									<tr>
										<td class='b' style='width:14%'>{$exams[exam].analyse_code}</td>
										<td class='b' style='width:30%'>{$exams[exam].analyse_label}</td>
										<td class='b' style='width:14%'>{$exams[exam].analyse_reference}</td>
										<td class='b' style='width:14%'>{$exams[exam].analyse_unite}</td>
										<td class='b' style='width:14%'>{$exams[exam].analyse_info}</td>
										<td class='b' style='width:14%'>{$exams[exam].analyse_resultat}</td>
									</tr>
									
									{if $smarty.section.exam.index_next != $smarty.section.exam.max}
										{if $exams[exam].groupe_label != $exams[$smarty.section.exam.index_next].groupe_label}
											</table><BR>
											<h3>{$exams[$smarty.section.exam.index_next].groupe_label}</h3><br>
											<table width="100%">
											<tr>
												<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_code#}</th>
												<th style='width:30%' align='left'>{#dico_sumehr_tableheader_analyse_label#}</th>
												<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_reference#}</th>
												<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_unite#}</th>
												<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_info#}</th>
												<th style='width:14%' align='left'>{#dico_sumehr_tableheader_analyse_resultat#}</th>
											</tr>
										{/if}
									{/if}
									
								{/section}
							
							</div>
							
					
						</div> {*IN end*}
					
					</div> {*Block A end*}				

				</div>
					
			</div>

		</div>

	</div>
	
	