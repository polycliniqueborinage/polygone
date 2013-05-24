// Plugin created by david calcus http://mariquecalcus.be/

(function($){

  	// plugin definition
	$.fn.timeSheet= function(options) {
	
		// Default variable
		var defaults = {
			url: 'json.js',
			url_save: 'json.js',
			header: {
				day: true,
				week: true,
				month: false,
			},
			timer: 0,
			on_save: null,
			background:'red',
			default_format:'week',
			we:'false',
			date_format:'dd/MM/yyyy',
			input_format:'yyyy-dd-MM',
			editable : 'false',
  		};
  		
  		// Merging the Defaults With the Options
  		var settings = $.extend({}, defaults, options);  
  		var timesheetentry = new Array();
  		
  		// Reset cookie
  		$.cookie("format", "");
  		$.cookie("we", "");
  		$.cookie("currentdate", "");
  		
  		var emptyarray = {};
  		
  		// Set up
  		var format = settings.default_format;
  		if (""+$.cookie('format') != ""+emptyarray && $.cookie('format') !='') format = $.cookie('format');
  		
  		var we = settings.we;
  		if (""+$.cookie('we') != ""+emptyarray && $.cookie('we') !='') we = $.cookie('we');
  		
  		var currentdate = Date.parse('today').toString(settings.input_format);
  		if (""+$.cookie('currentdate') != ""+emptyarray && $.cookie('currentdate') !='') currentdate = $.cookie('currentdate');
  		
  		// Design
  		var header_class = format;
    	if (we == 'true') header_class += ' we';
  		
  		// Variable
  		var table = null,
			header = null,
			sections = settings.header;
  		
		return this.each(function () {
			
			// Creating a reference to the object
			$this = $(this);
			
			$this.attr('class',header_class);
			
			/* Header
			-----------------------------------------------------------------------------*/
			if (sections) {
				header = $("<div id='timesheet_top_panel'/>")
					.append($("<div id ='timesheet_view_selector'/>")
						.append($("<ul/>")
							.append($("<li/>").append(buildPrevious()))
							.append($("<li/>").append(buildToday()))
							.append($("<li/>").append(buildInput()))
							.append($("<li/>").append(buildSection('day',sections.day)))
							.append($("<li/>").append(buildSection('week',sections.week)))
							.append($("<li/>").append(buildSection('month',sections.month)))
							.append($("<li/>").append(buildShowWE()))
							.append($("<li/>").append(buildNext()))
						)
					)
					.append($("<div id='timesheet_message'/>"))
				    .prependTo($this);
			}
			function buildSection(type,enable) {
				if (enable) {
					text = type;
					return $("<a/>").addClass(type).append(text).bind('click', function(event){ 
							format=type;
							$this.removeClass('day');
							$this.removeClass('week');
							$this.removeClass('month');
							$this.addClass(type);
							$.cookie("format", format, { expires: 365 });
							loadTable(currentdate);
						}
					);
				}
			}
			function buildInput() {
				return $("<input/>").attr('id', 'timesheet_date_input').keyup(function(e) {
					datefull = Date.parse($('#timesheet_date_input').val());
					if (datefull) {
						$('#timesheet_message').html(''+datefull.toString('dddd, d MMMM yyyy'));
					}else {
						$('#timesheet_message').html('no match');
					}
			  		if (e.keyCode == '13') {
			  			if (datefull) {
				  			loadTable($('#timesheet_date_input').val());
						}
			  		}
				}).focus(function() {
  					$('#timesheet_date_input').val('');
  					$('#timesheet_message').html('Entrez la date de votre choix...');
				}).blur(function() {
  					$('#timesheet_message').html('');
				});
			}
			function buildPrevious() {
				text = 'previous';
				return $("<a/>").addClass('previous').append(text).bind('click', function(event){ loadTable('previous');});
			}
			function buildNext() {
				text = 'next';
				return $("<a/>").addClass('next').append(text).bind('click', function(event){ loadTable('next');});
			}
			function buildPicker() {
				text = 'next';
				return $("<a/>").addClass('picker').append(text);
			}
			function buildToday() {
				text = 'today';
				return $("<a/>").addClass('today').append(text).bind('click', function(event){ loadTable('today');});
			}
			function buildShowWE() {
		        text = 'we';
		        return $("<a/>").addClass('we').append(text).bind('click', function(event){ 
		            if (we == 'true') {
		                $this.removeClass('we');
		                we = 'false';
		            } else {
		                $this.addClass('we');
		                we = 'true';
		            }
		            $.cookie("we", we, { expires: 365 });
		            loadTable('today');
		        });
		        return $("<a/>").addClass('picker').append(text);
    		}
    		
    		table 			= $("<table id='timesheet_table'/>");
    					
			/* Table
			-----------------------------------------------------------------------------*/
			var loadTable = function (value) {
				
				// clean
				if(table) table.html('');
				
				// catch predefined value
				switch(value) {
			        case 'previous':
			            if (format == 'day') currentdate = Date.parse(currentdate).add(-1).days().toString(settings.input_format);
			            if (format == 'week') currentdate = Date.parse(currentdate).add(-7).days().toString(settings.input_format);
			        break;
			        case 'next':
			            if (format == 'day') currentdate = Date.parse(currentdate).add(+1).days().toString(settings.input_format);
			            if (format == 'week') currentdate = Date.parse(currentdate).add(7).days().toString(settings.input_format);
			        break;
			        default:
			        	currentdate = Date.parse(value).toString(settings.input_format);
				}
				
				//console.log('currentdate '+currentdate);
				$.ajax({
				
					url: settings.url,
  					dataType: 'json',
  					type: "POST",
					data: "date="+currentdate+"&format="+format+"&we="+we,
					success: function(json){
					
						//console.log('dateto '+json.dateto);
						// BUILD TABLE HEADER
						if (format == 'day') {
						
							$('#timesheet_date_input').val(Date.parse(json.datefrom).toString(settings.date_format));
							
							tablethead		= $("<thead class='subhead dayview'>");
							tabletheadtr	= $("<tr/>");
							
							if (settings.editable == 'true') {
								$("<th class='project'/>").append(buildCreateTask(json)).appendTo(tabletheadtr);
							} else {
								$("<th class='project'/>").append('').appendTo(tabletheadtr);
							}
							
							$.each(json.dateinterval, function(h,date){
								$("<th/>").attr('class',date.class_css).append(buildDate(date.date)).appendTo(tabletheadtr);
							});
							$("<th class='total'/>").append("TOTAL").appendTo(tabletheadtr);
							
							tabletheadtr.appendTo(tablethead);
							tablethead.appendTo(table);
							table.appendTo($this);

						} else {
						
							$('#timesheet_date_input').val(Date.parse(json.datefrom).toString(settings.date_format) + ' ' + Date.parse(json.dateto).toString(settings.date_format));
							
							table = $("<table id='timesheet_table'/>");
							tablethead	= $("<thead class='subhead weekview'>");
							tabletheadtr	= $("<tr/>");
									
							if (settings.editable == 'true') {
								$("<th class='project'/>").append(buildCreateTask(json)).appendTo(tabletheadtr);
							} else {
								$("<th class='project'/>").append('').appendTo(tabletheadtr);
							}

							$.each(json.dateinterval, function(h,date){
								$("<th/>").attr('class',date.class_css).append(buildDate(date.date)).appendTo(tabletheadtr);
							});
							$("<th class='total'/>").append("TOTAL").appendTo(tabletheadtr);
							
							tabletheadtr.appendTo(tablethead);
							tablethead.appendTo(table);
							table.appendTo($this);
							
						}


						// BUILD TABLE BODY
						numberofday = json.dateinterval.length;
						
						tabletbody = $("<tbody id='tsBody'/>");
						
						// build timesheet
						if(json.timesheet) {
							
							total0    = 0; id0 = "";
							total1    = 0; id1 = "";
							total2    = 0; id2 = "";
							total3    = 0; id3 = "";
							total4    = 0; id4 = "";
							total5    = 0; id5 = "";
							total6    = 0; id6 = "";
							Grantotal = 0;
							$.each(json.timesheet, function(i,timesheet){
								
								tsclass_css = timesheet.class_css;
								tabletbodytr = $("<tr/>").attr('id',timesheet.id).addClass(timesheet.class_css);
								tabletbodytrtd = $("<td class='project_task'/>").attr('id','task_'+timesheet.id);
								tabletbodytrtddiv = $("<div class='taskLinks'/>").append("<span class='big'>"+timesheet.project_task_name+"</span><br/><span class='small'>"+timesheet.cost_center_name+"</span>");
								tabletbodytrtddiv.appendTo(tabletbodytrtd);

								// EVENT
								tabletbodytrtddiv					= $("<div class='eventLinks'/>");
								if (settings.editable == 'true') {
									tabletbodytrtddiva					= $("<a class='assign'/>").append('Assign').bind('click', function(event){ 
										$.ajax({
					  						type: "POST",
			  								url: "user_project.php?action=assign_task",
			  								data: "id="+timesheet.id,
			  								dataType: "json",
			  								success: function(data){
			  									$('#'+timesheet.id).attr('class','assign');
			  								}
										});
					        		});
									tabletbodytrtddiva.appendTo(tabletbodytrtddiv);
									tabletbodytrtddiva					= $("<a class='unassign'/>").append('Unassign').bind('click', function(event){ 
										$.ajax({
					  						type: "POST",
			  								url: "user_project.php?action=unassign_task",
			  								data: "id="+timesheet.id,
			  								dataType: "json",
			  								success: function(data){
			  									$('#'+timesheet.id).attr('class','unassign');
			  								}
										});
					        		});
									tabletbodytrtddiva.appendTo(tabletbodytrtddiv);
								}
								tabletbodytrtddiv.appendTo(tabletbodytrtd);
								tabletbodytrtd.appendTo(tabletbodytr);
								total = 0;
								for (x=0;x<numberofday;x++) {
									tabletbodytrtd = $("<td/>").attr('class','number').append(buildTimesheetEntry(json.dateinterval[x].date+ '-'  +timesheet.id,timesheet.cell));
									id_entry = json.dateinterval[x].date+ '-'  +timesheet.id;
									if(timesheet.cell != null){
										if (isNaN(parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)])) == false ){
											total = total + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
											
											switch(x){
												case 0:
													total0 = total0 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;
												case 1:
													total1 = total1 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;
												case 2:
													total2 = total2 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;
												case 3:
													total3 = total3 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;
												case 4:
													total4 = total4 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;
												case 5:
													total5 = total5 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;	
												case 6:
													total6 = total6 + parseFloat(timesheet.cell[id_entry.substr(0,4)+"-"+id_entry.substr(8,2)+"-"+id_entry.substr(5,2)]);
													break;	
											}		
										}		
									}	
									switch(x){
										case 0:
											id0 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;
										case 1:
											id1 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;
										case 2:
											id2 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;
										case 3:
											id3 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;
										case 4:
											id4 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;
										case 5:
											id5 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;	
										case 6:
											id6 = id_entry.substr(0,4)+"-"+id_entry.substr(5,2)+"-"+id_entry.substr(8,2);
											break;	
									}
									tabletbodytrtd.appendTo(tabletbodytr);
								}
								
								if (format == 'day') {
									tabletbodytrtd = $("<td/>").attr('class','comment').append('comment');
									tabletbodytrtd.appendTo(tabletbodytr);
								} else {
									Grantotal = Grantotal + total; 
									inputt = $("<input/>").attr('class','editable').attr('id',timesheet.id + '-total-input').attr('readonly', 'X').attr('value', total);
									tabletbodytrtd = $("<td/>").attr('class','number').attr('id',timesheet.id + '-total-project').append(inputt);
									tabletbodytrtd.appendTo(tabletbodytr);
								}
								
								tabletbodytr.appendTo(tabletbody);
								
						    });
						}
						
						if(format != 'day'){
							tabletbodytr = $("<tr/>").attr('id','total_line').addClass(tsclass_css);
							tabletbodytrtd = $("<td class='project_task'/>").attr('id','no_task');
							tabletbodytrtddiv = $("<div class='taskLinks'/>").append("<span class='big'>TOTAL</span><br/><span class='small'><br></span>");;
							tabletbodytrtddiv.appendTo(tabletbodytrtd);
							tabletbodytrtd.appendTo(tabletbodytr);
							for(x=0; x<numberofday; x++){
								switch(x){
									case 0:  inputt = $("<input/>").attr('class','editable').attr('id',id0 + '-total-input').attr('readonly', 'X').attr('value', total0); break;
									case 1:  inputt = $("<input/>").attr('class','editable').attr('id',id1 + '-total-input').attr('readonly', 'X').attr('value', total1); break;
									case 2:  inputt = $("<input/>").attr('class','editable').attr('id',id2 + '-total-input').attr('readonly', 'X').attr('value', total2); break;
									case 3:  inputt = $("<input/>").attr('class','editable').attr('id',id3 + '-total-input').attr('readonly', 'X').attr('value', total3); break;
									case 4:  inputt = $("<input/>").attr('class','editable').attr('id',id4 + '-total-input').attr('readonly', 'X').attr('value', total4); break;
									case 5:  inputt = $("<input/>").attr('class','editable').attr('id',id5 + '-total-input').attr('readonly', 'X').attr('value', total5); break;
									case 6:  inputt = $("<input/>").attr('class','editable').attr('id',id6 + '-total-input').attr('readonly', 'X').attr('value', total6); break;
									default: break;
								}
								tabletbodytrtd = $("<td/>").attr('class','number').attr('id',x + '-total-project').append(inputt);
								tabletbodytrtd.appendTo(tabletbodytr);
							}
							inputt = $("<input/>").attr('class','editable').attr('id','total-total-input').attr('readonly', 'X').attr('value', Grantotal);
							tabletbodytrtd = $("<td/>").attr('class','number').attr('id','total-total-project').append(inputt);
							tabletbodytrtd.appendTo(tabletbodytr);
							tabletbodytr.appendTo(tabletbody);
						}
						
					    tabletbody.appendTo(table);
					    
					    
						// BUILD TABLE FOOTER
						if (format == 'day') {
						
							tabletfoot 		= $("<tfoot/>");
							tabletfoottr	= $("<tr/>");
							
							$("<td class='empty'/>").appendTo(tabletfoottr);
							$("<td class='total_day'/>").appendTo(tabletfoottr);
							$("<th class='total'/>").appendTo(tabletfoottr);
							
							tabletfoottr.appendTo(tabletfoot);
							tabletfoot.appendTo(table);

						} else {
						
							tabletfoot 		= $("<tfoot/>");
							tabletfoottr	= $("<tr/>");
							
							$("<td class='empty'/>").appendTo(tabletfoottr);
							$.each(json.dateinterval, function(h,date){
							$("<td class='total_day'/>").appendTo(tabletfoottr);
							});
							$("<th class='total'/>").appendTo(tabletfoottr);
							
							tabletfoottr.appendTo(tabletfoot);
							tabletfoot.appendTo(table);

						}
						
						// Reload Google Graph
						$('#chart').timeSheetGoogleChart.currentdate(currentdate);
						$('#chart').timeSheetGoogleChart.format(format);
						$('#chart').timeSheetGoogleChart.reload('');
						$('#chart').timeSheetGoogleChart.resources(json.currentuserid);
					    
					}
				});
				
            };
            
            function buildCreateTask(json) {
            
				text = "+ Ajout d'une tache";
				return $("<a class='add_task'/>").append(text).bind('click', function(event){
				
						tabletbodytr = $("<tr id='createtasktr' class='temp'/>");
						tabletbodytrtd = $("<td id='createtasktrtd' class='project_task'/>");
						
						tabletbodytrtdiv					= $("<div class='taskLinks' id='newTaskLinks'/>");
						tabletbodytrtdiva					= $("<a class='fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all'/>").attr('id','new-menu').append($("<span class='ui-icon ui-icon-triangle-1-s' id='new-menu-span'/>")).append($("<div id='new-menu-div'/>").append('Select'));
						tabletbodytrtdivinput				= $("<input type='hidden'/>").attr('id','new-menu-input');
						tabletbodytrtdivdiv 				= $("<div class='hidden'/>");

						tabletbodytrtdivdivul			= $('<ul/>');
						$.each(json.tasks.cc, function(ccid,cc){
							tabletbodytrtdivdivulli			= $('<li/>').append($("<a/>").attr("id",ccid).append(cc.name));
							tabletbodytrtdivdivulliul		= $('<ul/>');
							
							$.each(cc.task, function(taskid,task){
								tabletbodytrtdivdivulliulli	= $("<li/>").append($("<a/>").attr("id",taskid).append(task.name));
								tabletbodytrtdivdivulliulli.appendTo(tabletbodytrtdivdivulliul);
							});
							
							tabletbodytrtdivdivulliul.appendTo(tabletbodytrtdivdivulli);
							tabletbodytrtdivdivulli.appendTo(tabletbodytrtdivdivul);
						});
						tabletbodytrtdivdivul.appendTo(tabletbodytrtdivdiv);
						tabletbodytrtdivinput.appendTo(tabletbodytrtdiv);
						tabletbodytrtdiva.appendTo(tabletbodytrtdiv);
						tabletbodytrtdivdiv.appendTo(tabletbodytrtdiv);
						tabletbodytrtdiv.appendTo(tabletbodytrtd);

						// EVENT
						tabletbodytrtddiv					= $("<div class='eventLinks'/>");
						tabletbodytrtddiva					= $("<a class='assign'/>").append('Assign').bind('click', function(event){ 
							$.ajax({
				  				type: "POST",
		  						url: "user_project.php?action=assign_task",
		  						data: "id="+tabletbodytr.attr('id'),
		  						dataType: "json",
		  						success: function(data){
		  							loadTable(currentdate);
		  						}
							});
				        });
						
						tabletbodytrtddiva.appendTo(tabletbodytrtddiv);
						tabletbodytrtddiv.appendTo(tabletbodytrtd);
						tabletbodytrtd.appendTo(tabletbodytr);
								
						for (x=0;x<numberofday;x++) {
							tabletbodytrtd = $("<td/>").attr('class','number').append(buildTimesheetEntry(json.dateinterval[x].date,''));
							tabletbodytrtd.appendTo(tabletbodytr);
							
						}
								
						if (format == 'day') {
							tabletbodytrtd = $("<td/>").attr('class','comment').append('comment');
							tabletbodytrtd.appendTo(tabletbodytr);
						} else {
							
							tabletbodytrtd = $("<td/>").attr('class','total').attr('id', 'new-total-project');   
							tabletbodytrtd.appendTo(tabletbodytr);
						}
								
						tabletbodytr.prependTo(tabletbody);
						
						$('#new-menu').menu({
							width: 400,
							maxHeight: 200,
							content: $('#new-menu').next().html(),
							crumbDefaultText: ' ',
							backLink: false
						});

					});
			}
			
			
            function buildDate(date) {
				text = "<span class='day'>" + Date.parse(date).toString('d') + "</span><br><span class='weekday'>" + Date.parse(date).toString('ddd') + "</span><br/><span class='month'>" + Date.parse(date).toString('MMM') + "</span>";
				return $("<a/>").append(text).bind('click', function(event){ 
					format='day';
					$this.removeClass('day');
					$this.removeClass('week');
					$this.removeClass('month');
					$this.addClass(format);
					loadTable(date);
				});
			}
            

            
            function buildTimesheetEntry(id,value) {
            
	            if (value && value[id.substr(0,4)+"-"+id.substr(8,2)+"-"+id.substr(5,2)]) value = value[id.substr(0,4)+"-"+id.substr(8,2)+"-"+id.substr(5,2)]; else value="";
            	
				if (settings.editable == 'true') {

	            	inputts = $("<input/>").val(value).attr('class','editable').attr('id',id).attr('onblur', "sumAllHours("+id.substr(11,3)+");sumAllHours2('"+id+"');").attr('onload', "sumAllHours("+id.substr(11,3)+");").keyup(function(e) {
	            		
	            		id = $(this).attr('id')
	            	    date = id.substr(0,4)+"-"+id.substr(8,2)+"-"+id.substr(5,2);
		            	project_task_id = id.substr(11);
		            	
	            		$.ajax({
	  						type: "POST",
	  						url: "user_project.php?action=save_time",
	  						data: "value="+$(this).val()+"&date="+date+"&project_task_id="+project_task_id,
	  						dataType: "json",
	  						success: function(data){
	  							$('#chart').timeSheetGoogleChart.reload('');
	  						}
						});
	            	
					});
					
				} else {
				
					inputts = $("<input/>").val(value).attr("disabled","disabled");
				
				}
				
				
				return $("<span/>").append("<a onclick='return false' href='javascript:void(0)' class='note' title='Add a note'/>").append(inputts);
			}
			
            loadTable(currentdate);
            
            
            function addTimer() {
            	myInterval = window.setInterval(function () {
             
             	}, options.timer);
          	}
            
            
            
        });
 	
	}
	
	$.fn.timeSheet.format = function(txt) {
    	return '<strong>' + txt + '</strong>';
	};


})(jQuery);



































		










	//
    // create closure
    //
    (function($){

        // Private class variable
        var format 				= null;
        var interval 			= null;
        var group 				= null;
        var currentdate 		= null;
        var opts 				= null;
        var resource_selected 	= "";
        var cc_selected 		= "";
        var element 			= null;

  		var emptyarray = {};
  		
		//
        //Private function
	  	//
	  	function loadResource(element, options) {
        
        	resourcessdiv 		= $("<div class='resources'>");
        	resourcesdivselect 	= $("<select multiple='multiple'>").attr('id','resources');
        
        	$("<option/>").append('all').appendTo(resourcesdivselect);
        	
        	$.ajax({
					
				url: opts.url_resource,
	  			dataType: 'json',
	  			type: "POST",
				success: function(json){
				
					$.each(json.resource, function(index, value) {
        
		            	if (resource_selected.indexOf(value.ID) == '-1') {
		            	      $("<option/>").attr('value',value.ID).append(value.firstname+' '+value.familyname).appendTo(resourcesdivselect);
		            	} else {
		            	      $("<option/>").attr('selected','selected').attr('value',value.ID).append(value.firstname+' '+value.familyname).appendTo(resourcesdivselect);
		            	}
            
        			});
        			
        			$("#resources").dropdownchecklist({
			            firstItemChecksAll: true, 
			            explicitClose: '...close',
			            textFormatFunction: function(options) {
			                var selectedOptions = options.filter(":selected");
			                var countOfSelected = selectedOptions.size();
			                var size = options.size();
			                switch(countOfSelected) {
			                    case 0: return "No Resource";
			                    case 1: return selectedOptions.text();
			                    case size: return "All Resources";
			                    default: return countOfSelected + " Resource";
			                }
			                 
			            },
			            onComplete: function(selector) {
			                resource_selected = "";
			                for( i=0; i < selector.options.length; i++ ) {
			                    if (selector.options[i].selected && (selector.options[i].value != "")) {
			                        if ( resource_selected != "" ) resource_selected += ",";
			                        resource_selected += "'"+selector.options[i].value+"'";
			                    }
			                }
			                reload("");
			            }
			            
			    	});
					
				}
			
			});
        
        	resourcesdivselect.appendTo(resourcessdiv);
        	resourcessdiv.appendTo('#chart_select_panel');
	    	
	    }        
        
        //
        //Private function
	  	//
        function initGraph(element, options) {
	  	
	  		// Private Variables
	  		var table = null;
			var header = null;
	  	
	    	if (options.header) {
				header = $("<div id='chart_top_panel'/>")
					.append($("<div id ='chart_view_selector'/>")
					.append($("<ul/>")
					.append($("<li/>").append(buildPrevious()))
					.append($("<li/>").append(buildToday()))
					.append($("<li/>").append(buildInput()))
					.append($("<li/>").append(buildSection('day',options.header.day)))
					.append($("<li/>").append(buildSection('week',options.header.week)))
					.append($("<li/>").append(buildSection('month',options.header.month)))
					.append($("<li/>").append(buildSection('trimestre',options.header.trimestre)))
					.append($("<li/>").append(buildSection('semestre',options.header.semestre)))
					.append($("<li/>").append(buildSection('year',options.header.year)))
					.append($("<li/>").append(buildInterval()))
					.append($("<li/>").append(buildGroup()))
					.append($("<li/>").append(buildNext()))
					)
				)
				.append($("<div id='chart_message'/>"))
				.prependTo(element);
			}

	    	if (options.select == 'true') {
				header = $("<div id='chart_select_panel'/>")
				.prependTo(element);
			}
			
			table 					= $("<table id='chart_table'/>");
	    	tabletr 				= $("<tr/>");
	    	tabletrtd 				= $("<td/>");
	    	tabletrtddiv 			= $("<div id ='chart_image'/>");
	    	tabletrtddiv.appendTo(tabletrtd);
	    	tabletrtd.appendTo(tabletr);
	    	tabletr.appendTo(table);
	    	table.appendTo(element);
	  	
	  	};
  	
	  	function buildSection(formatin,enable) {
			if (enable) {
				return $("<a/>").addClass(formatin).append(formatin).bind('click', function(event){
						element.removeClass('day');
						element.removeClass('week');
						element.removeClass('month');
						element.removeClass('trimestre');
						element.removeClass('semestre');
						element.removeClass('year');
						element.addClass(formatin);
						format = formatin;
						reload("");
					}
				);
			}
		}
		
		function buildInterval() {
			var select = $("<select/>");
			if (interval == 'day') {
				select.append("<option value='day' selected='selected'>Day</option>");
			} else {
				select.append("<option value='day'>Day</option>");
			}
			if (interval == 'week') {
				select.append("<option value='week' selected='selected'>Week</option>");
			} else {
				select.append("<option value='week'>Week</option>");
			}
			if (interval == 'month') {
				select.append("<option value='month' selected='selected'>Month</option>");
			} else {
				select.append("<option value='month'>Month</option>");
			}
			select.change(function() {
				interval = this.value;
				reload("");
			});;
			return select;
				
		}
	
		function buildGroup() {
			var select = $("<select/>");
			if (group == 'cc') {
				select.append("<option value='cc' selected='selected'>CC</option>");
			} else {
				select.append("<option value='cc'>CC</option>");
			}
			if (group == 'task') {
				select.append("<option value='task' selected='selected'>Task</option>");
			} else {
				select.append("<option value='task'>Task</option>");
			}
			select.change(function() {
				group = this.value;
				reload("");
			});;
			return select;
		}
	
		function buildInput() {
			return $("<input/>").attr('id', 'chart_date_input').keyup(function(e) {
				datefull = Date.parse($('#chart_date_input').val());
				if (datefull) {
					$('#chart_message').html(''+datefull.toString('dddd, d MMMM yyyy'));
				}else {
					$('#chart_message').html('no match');
				}
				if (e.keyCode == '13') {
					if (datefull) {
						reload($('#chart_date_input').val());
					}
				}
			}).focus(function() {
	  			$('#chart_date_input').val('');
	  			$('#chart_message').html('Entrez la date de votre choix...');
			}).blur(function() {
	  			$('#chart_message').html('');
			});
		}
	
		function buildPrevious() {
			text = 'previous';
			return $("<a/>").addClass('previous').append(text).bind('click', function(event){ reload('previous');});
		}
	
		function buildNext() {
			text = 'next';
			return $("<a/>").addClass('next').append(text).bind('click', function(event){ reload('next');});
		}
	
		function buildToday() {
			text = 'today';
			return $("<a/>").addClass('today').append(text).bind('click', function(event){ reload('today');});
		}
          
        //
        // Private Class method
        //
        function setCurrentDate(currentdatein) {
            currentdate = currentdatein;
        }

        //
        // Private Class method
        //
        function setFormat(formatin) {
        	element.removeClass('day');
			element.removeClass('week');
			element.removeClass('month');
			element.removeClass('trimestre');
			element.removeClass('semestre');
			element.removeClass('year');
			element.addClass(formatin);
            format = formatin;
        }
        
        //
        // Private Class method
        //
        function setResources(resources) {
            resource_selected = resources;
        }
        

        
        //
        // Private Class method
        //
      	reload = function(value) {
      	
	      	// catch predefined value
			switch(value) {
				case '':
				break;
				case 'previous':
				            if (format == 'day') currentdate = Date.parse(currentdate).add(-1).days().toString(opts.input_format);
				            if (format == 'week') currentdate = Date.parse(currentdate).add(-7).days().toString(opts.input_format);
				            if (format == 'month') currentdate = Date.parse(currentdate).add(-1).months().toString(opts.input_format);
				            if (format == 'trimestre') currentdate = Date.parse(currentdate).add(-3).months().toString(opts.input_format);
				            if (format == 'semetre') currentdate = Date.parse(currentdate).add(-6).months().toString(opts.input_format);
				            if (format == 'year') currentdate = Date.parse(currentdate).add(-12).months().toString(opts.input_format);
				break;
				case 'next':
				            if (format == 'day') currentdate = Date.parse(currentdate).add(1).days().toString(opts.input_format);
				            if (format == 'week') currentdate = Date.parse(currentdate).add(7).days().toString(opts.input_format);
				            if (format == 'month') currentdate = Date.parse(currentdate).add(1).months().toString(opts.input_format);
				            if (format == 'trimestre') currentdate = Date.parse(currentdate).add(3).months().toString(opts.input_format);
				            if (format == 'semetre') currentdate = Date.parse(currentdate).add(6).months().toString(opts.input_format);
				            if (format == 'year') currentdate = Date.parse(currentdate).add(12).months().toString(opts.input_format);
				break;
				default:
					currentdate = Date.parse(value).toString(opts.input_format);
			}
	
			$.ajax({
					
				url: opts.url,
	  			dataType: 'json',
	  			type: "POST",
				data: "date="+currentdate+"&format="+format+"&interval="+interval+"&group="+group+"&resource_selected="+resource_selected, 
				success: function(json){
						
					if (format == 'day') {
						$('#chart_date_input').val(Date.parse(json.datefrom).toString(opts.date_format));
					} else {
						$('#chart_date_input').val(Date.parse(json.datefrom).toString(opts.date_format) + ' ' + Date.parse(json.dateto).toString(opts.date_format));
					}
						
					var data = new google.visualization.DataTable();
							
					data.addColumn('string', 'Semaine');
	    					
	    			if (json.activity) {
	    					
						// build timesheet
						$.each(json.activity, function(y,activity){
								
			    			data.addColumn('number', activity.name);
									
						});
							    
						// build timesheet
						$.each(json.dateinterval, function(i,date){
							
							newArray = new Array ();
							newArray.push(date.date);
									
							$.each(json.activity, function(y,activity){
										
								if (date.tasks && date.tasks[y]) {
									newArray.push(parseFloat(date.tasks[y]));
								} else {
									newArray.push(0);
								}
									
							});
									
						    data.addRows([ newArray ]);
						    
						});
							    
						drawMouseoverVisualization(data);
	    					
	    			} else {
	    			
	    				$('#chart_image').html("");
	    					
	    			}
				
				}
			
			});
      	
      	};
    
        //
        // Public Class method
        //
        $.fn.timeSheetGoogleChart = function(options) {

			// Private instance variable
            var table = null;
            
            // build main options before element iteration
            opts = $.extend({}, $.fn.timeSheetGoogleChart.defaults, options);

        	interval = opts.default_interval;
  			group = opts.default_group;
  			
            // iterate and reformat each matched element
            return this.each(function() {
            
            	// Creating a reference to the object
				element = $(this);
            	
             	// build element specific options
                var o = $.meta ? $.extend({}, opts, element.data()) : opts;
                   
                initGraph(element,o);
                
                if (o.header.resource_selected) {
                
	                loadResource(element,o);
                
                }
                 
             });
          
        };
        

        //
        // Public Class method
        //
        $.fn.timeSheetGoogleChart.resources = function(resources) {
        	setResources(resources);
            return true;
		};

        //
        // Public Class method
        //
        $.fn.timeSheetGoogleChart.format = function(format) {
        	setFormat(format);
            return true;
		};
          
        //
        // Public Class method
        //
        $.fn.timeSheetGoogleChart.currentdate = function(currentdate) {
        	setCurrentDate(currentdate);
        	return true;
		};

        //
        // Public Class method
        //
        $.fn.timeSheetGoogleChart.reload = function(value) {
            reload(value);
        	return true;
       	};


		//
        // plugin defaults
        //
        $.fn.timeSheetGoogleChart.defaults = {
    		url: 'json.js',
			header: {
				day: true,
				week: true,
				month: false,
				trimestre: false,
				semestre: false,
				year:false,
				resource_selected:false,
			},
			select:'true',
			default_interval:'day',
			default_group:'cc',
			default_format:'week',
			date_format:'dd/MM/yyyy',
			input_format:'yyyy-dd-MM'
        };
    
    //
    // end of closure
    //
    


})(jQuery);

    function sumAllHours(id){
    	var mylist=document.getElementById(id);
    	var sum = 0;
    	for (i=1; i<mylist.childNodes.length-1; i++){ 
    		if (isNaN(parseFloat(mylist.childNodes[i].firstChild.firstChild.nextSibling.value)) == false ) 
    			sum = sum + parseFloat(mylist.childNodes[i].firstChild.firstChild.nextSibling.value);
    	}
    	
    	document.getElementById(id + '-total-input').value = sum;
    }
    
    function sumAllHours2(id_ts){
	   var champs = document.getElementById("timesheetdiv").getElementsByTagName("input");
	   var id = id_ts;
	   var total_hrs = 0;
	   var grandtotal = 0;
	   for(i=0; i<champs.length-1; i++){ 
	      if((champs[i].getAttribute("id" ).substr(0, 10) == id.substr(0, 10)) && (champs[i].getAttribute("id").substr(10, 12) != "-total-input")){  
	    	  if(isNaN(parseFloat(document.getElementById(champs[i].getAttribute("id")).value)) == false){
	    		  total_hrs = total_hrs + parseFloat(document.getElementById(champs[i].getAttribute("id")).value);
	    	  }
	      }
	      if(champs[i].getAttribute("id" ).substr(4, 11) == "total-input"){
	    	  if(isNaN(parseFloat(document.getElementById(champs[i].getAttribute("id")).value)) == false){
	    		  grandtotal = grandtotal + parseFloat(document.getElementById(champs[i].getAttribute("id")).value);
	    	  }
	      }
	   }
	   var id_total = id.substr(0, 10)+"-total-input";
	   document.getElementById(id_total).value = total_hrs; 
	   document.getElementById("total-total-input").value = grandtotal;
    	
    }    
    
    function sumAllTable(){
    	var mylist=document.getElementById('tsBody');
    	for (i=1; i<mylist.childNodes.length; i++){ 
    		sumAllHours(mylist.childNodes[i].id);
    	}
    }



























/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */


jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined'  ||  (name  &&  typeof name != 'string')) { // name and value given, set cookie
        if (typeof name == 'string') {
            options = options || {};
            if (value === null) {
                value = '';
                options.expires = -1;
            }
            var expires = '';
            if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                var date;
                if (typeof options.expires == 'number') {
                    date = new Date();
                    date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                } else {
                    date = options.expires;
                }
                expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
            }
            // CAUTION: Needed to parenthesize options.path and options.domain
            // in the following expressions, otherwise they evaluate to undefined
            // in the packed version for some reason...
            var path = options.path ? '; path=' + (options.path) : '';
            var domain = options.domain ? '; domain=' + (options.domain) : '';
            var secure = options.secure ? '; secure' : '';
            document.cookie = name + '=' + encodeURIComponent(value) + expires + path + domain + secure;
        } else { // `name` is really an object of multiple cookies to be set.
          for (var n in name) { jQuery.cookie(n, name[n], value||options); }
        }
    } else { // get cookie (or all cookies if name is not provided)
        var returnValue = {};
        if (document.cookie) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (!name) {
                    var nameLength = cookie.indexOf('=');
                    returnValue[ cookie.substr(0, nameLength)] = decodeURIComponent(cookie.substr(nameLength+1));
                } else if (cookie.substr(0, name.length + 1) == (name + '=')) {
                    returnValue = decodeURIComponent(cookie.substr(name.length + 1));
                    break;
                }
            }
        }
        return returnValue;
    }
};