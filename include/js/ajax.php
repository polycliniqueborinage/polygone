<?php
ob_start("ob_gzhandler");
header("Content-type: text/javascript; charset=utf-8");
header("Cache-Control: must-revalidate");
$offset = 600 * 60 ;
$ExpStr = "Expires:" .
gmdate("D, d M Y H:i:s",time() + $offset) . "GMT";
header($ExpStr);
?>
//various ajax functions
function change(script,element) {
   var ajax = new Ajax.Updater({success: element},script,{method: 'get',evalScripts:true});
}
function changeshow(script,element,theindicator) {
	alert('dac');
	alert(script);
	alert(element);
	alert (theindicator);
   var ajax = new Ajax.Updater({success: element},script,{method: 'get',evalScripts:true,onCreate:startWait(theindicator)});

}
function changePost(script,element,pbody) {
   var ajax = new Ajax.Updater({success: element},script,{method:'post', postBody:pbody,evalScripts:true});
}
function startWait(indic)
{

	$(indic).style.display = 'block';
}
function stopWait(indic)
{ 
	$(indic).style.display = 'none';
}

function deleteElement(theElement,theUrl)
{
	new Ajax.Request(theUrl, {
		  method: 'get',
		  onSuccess:function(payload) {
		    if (payload.responseText == "ok")
		    	{
					new Effect.Highlight(theElement,{duration:1.5,startcolor:'#FFFFFF',endcolor:deleteEndcolor});	    	
		    		new Effect.Fade(theElement,{duration:1.5});
		    		result = true;
		    	} 
		   }
		});
		try
		{
		systemMsg("deleted");
		}
		catch(e){}
}


function closeElement(theElement,theUrl)
{

new Ajax.Request(theUrl, {
	  method: 'get',
	  onSuccess: function(payload) {
	    if (payload.responseText == "ok")
	    	{
				new Effect.Highlight(theElement,{duration:1.5,startcolor:'#FFFFFF',endcolor:closeEndcolor});	    	
	    		new Effect.Fade(theElement,{duration:1.5});
	    	}  
	   }
	});
	
		try
		{
		systemMsg("closed");
		
		}
		catch(e){}
}

function sanitizeTablecolors(theNode)
{
	var myNode = $(theNode);
	var theTable = myNode.parentNode.getElementsByTagName('tbody');
	myNode.parentNode.removeChild(myNode);
	var theLen = theTable.length;

	
	for(i=0;i<theTable.length;i++)
	{
			if(theTable[i].style.display != "none")
			{
			theTable[i].style.background = "";
			if(i % 2 == 0)
			{
				theTable[i].className = "color-b";
			}
			else
			{
				theTable[i].className = "color-a";
			}
			}
		}
	
}

function make_inputs(num){
	url = 'manageajax.php?action=makeinputs&num='+num;
	change(url,'inputs');
}

function show_addtask(id){
	Effect.BlindDown(id);
}
function blindtoggle(id){
	new Effect.toggle(id,'blind');
}

function fadeToggle(id){
	new Effect.toggle(id,'appear');
}


function toggleBlock(id){
	var state = $(id).style.display;
	if(state == "none")
	{
	setCookie(id,'block','30','/','','');
	$(id).style.display = "block";
	$(id + '_toggle').className = 'win_block';
	}
	else if(state == "block" || state == "")
	{
	setCookie(id,'none','30','/','','');
	$(id).style.display = "none";
	$(id + '_toggle').className = 'win_none';
	}
}

function switchClass(id,class1,class2)
{
try{$($('selectedid').value).className = class2;} catch(e){}
	try{$('selectedid').value = id;
	$($('selectedid').value).className = class1;}
	catch (e){}

}
function toggleClass(id,class1,class2)
{
	if($(id).hasClassName(class1))
	{
		$(id).className = class2;
	}
	else
	{
		$(id).className = class1;
	}
	
}

function toggleAccordeon(accord,theLink)
{
	$$("#"+accord+" tbody span[class='acc-toggle-active']").each(
		function(theA)
		{
			if(theA != theLink)
			{
			theA.className = 'acc-toggle';
			}
		}
	);
	
	
	if(theLink.hasClassName('acc-toggle'))
	{
		theLink.className = 'acc-toggle-active';
	}
	else
	{
		theLink.className = 'acc-toggle';
	}
}

function changeElements(element,classname){
	var loop = $$(element);

	for(var i=0; i<loop.length; i++){
	  loop[i].className = classname;
	}
}

function makeTimer(funct,duration)
{
	window.setTimeout(funct,duration);
}

function confirmit(text,url)
{
	check = confirm(text);
	url = decodeURI(url);
	if(check == true)
	{
	window.location = url;
	}

}

function confirmfunction(text,toCall)
{
	check = confirm(text);
	if(check == true)
	{
		eval(toCall);
	}
}

function setCookie( name, value, expires, path, domain, secure )
{
	var today = new Date();
	today.setTime( today.getTime() );
	if ( expires )
	{
	expires = expires * 1000 * 60 * 60 * 24;
	}
	var expires_date = new Date( today.getTime() + (expires) );

	document.cookie = name + "=" +escape( value ) +
	( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
	( ( path ) ? ";path=" + path : "" ) +
	( ( domain ) ? ";domain=" + domain : "" ) +
	( ( secure ) ? ";secure" : "" );
}

function getnow(field)
{
	var currenttime = new Date();
	var hours = currenttime.getHours();
	var minutes = currenttime.getMinutes();
		if (hours < 10)
		{
			hours = "0" + hours;
		}
		if (minutes < 10)
		{
			minutes = "0" + minutes;
		}
	var clocklocation = $(field);
	clocklocation.value = hours + ":" + minutes;
}

/* Clock */
function calctime()
{
var currenttime = new Date();
var hours = currenttime.getHours();
var minutes = currenttime.getMinutes();
var seconds = currenttime.getSeconds();
	if (hours < 10)
	{
		hours = "0" + hours;
	}
	if (minutes < 10)
	{
		minutes = "0" + minutes;
	}
	if (seconds < 10)
	{
		seconds = "0" + seconds;
	}
var clocklocation = $("digitalclock");
clocklocation.innerHTML = hours + ":" + minutes + ":" + seconds;
setTimeout("calctime()", 1000);
}

function systemMsg(ele)
{
	new Effect.Appear(ele, { duration: 2.0 })
	makeTimer("new Effect.Fade('"+ele+"', { duration: 2.0 })",6000);
}

function addEngine(url)
{
	window.external.AddSearchProvider(url);
}

function timetracker(taskId,projectId)
{
	this.working = false;
	this.startTime = 0;
	this.endTime = 0;

	this.taskId = taskId;
	this.projectId = projectId;
}

timetracker.prototype.toggleTracker = function()
{
	if(this.working)
	{
		this.stopWork();
	}
	else
	{
		this.startWork();
	}
}

timetracker.prototype.startWork = function()
{
	if(this.working)
	{
		this.stopWork();
	}
	var date = new Date();

	this.working = true;

	this.startTime = date.getTime();
	this.startTime = Math.round(this.startTime / 1000);
}

timetracker.prototype.stopWork = function()
{
	var date = new Date();

	this.working = false;

	this.endTime = date.getTime();
	this.endTime = Math.round(this.endTime / 1000);
	this.workTime = this.endTime - this.startTime;

	this.saveWork();
}

timetracker.prototype.saveWork = function()
{
	var theUrl = "managetimetracker.php?action=add&ajaxreq=1";
	var thePost = "project="+this.projectId+"&ttask="+this.taskId+"&started="+this.startTime+"&ended="+this.endTime;
	new Ajax.Request(theUrl, {
		  method: 'post',
		  postBody:thePost,
		  onSuccess:function(payload) {
		    if (payload.responseText == "ok")
		    	{
				} 
		   }
		});
		
}

//keyboard handler
shortcut = {
	'all_shortcuts':{},
	'add': function(shortcut_combination,callback,opt) {
			var keyEvent = 'keydown';
			if (navigator.appVersion.indexOf("MSIE")==-1) {
				keyEvent='keypress';
			}
			var default_options = {
				'type':keyEvent,
				'propagate':false,
				'disable_in_input':false,
				'target':document,
				'keycode':false
			}

		if(!opt){
		 opt = default_options;
		}
		else {
			for(var dfo in default_options) {
				if(typeof opt[dfo] == 'undefined'){
				 	opt[dfo] = default_options[dfo];
				}
			}
		}

		var ele = opt.target
		if(typeof opt.target == 'string') 
		{
			ele = $(opt.target);
		}
		var ths = this;
		shortcut_combination = shortcut_combination.toLowerCase();

		//The function to be called at keypress
		var func = function(e) {
			e = e || window.event;
			
			if(opt['disable_in_input']) { //Don't enable shortcut keys in Input, Textarea fields
				var element;
				if(e.target) element=e.target;
				else if(e.srcElement) element=e.srcElement;
				if(element.nodeType==3) element=element.parentNode;

				if(element.tagName == 'INPUT' || element.tagName == 'TEXTAREA') return;
			}
	
			//Find Which key is pressed
			if (e.keyCode) code = e.keyCode;
			else if (e.which) code = e.which;
			character = String.fromCharCode(code).toLowerCase();
			
		
			if(code == 188) character=","; //If the user presses , when the type is onkeydown
			if(code == 190) character="."; //If the user presses , when the type is onkeydown

			var keys = shortcut_combination.split("+");
			//Key Pressed - counts the number of valid keypresses - if it is same as the number of keys, the shortcut function is invoked
			var kp = 0;
	
			//Work around for stupid Shift key bug created by using lowercase - as a result the shift+num combination was broken
			var shift_nums = {
				"`":"~",
				"1":"!",
				"2":"@",
				"3":"#",
				"4":"$",
				"5":"%",
				"6":"^",
				"7":"&",
				"8":"*",
				"9":"(",
				"0":")",
				"-":"_",
				"=":"+",
				";":":",
				"'":"\"",
				",":"<",
				".":">",
				"/":"?",
				"\\":"|"
			}
			//Special Keys - and their codes
			var special_keys = {
				'esc':27,
				'escape':27,
				'tab':9,
				'space':32,
				'return':13,
				'enter':13,
				'backspace':8,
	
				'scrolllock':145,
				'scroll_lock':145,
				'scroll':145,
				'capslock':20,
				'caps_lock':20,
				'caps':20,
				'numlock':144,
				'num_lock':144,
				'num':144,
				
				'pause':19,
				'break':19,
				
				'insert':45,
				'home':36,
				'delete':46,
				'end':35,
				
				'pageup':33,
				'page_up':33,
				'pu':33,
	
				'pagedown':34,
				'page_down':34,
				'pd':34,
	
				'left':37,
				'up':38,
				'right':39,
				'down':40,
				
				'num0' :96,
				'num1' :97,
				'num2' :98,
				'num3' :99,
				'num4' :100,
				'num5' :101,
				'num6' :102,
				'num7' :103,
				'num8' :104,
				'num9' :105,
				
				'f1':112,
				'f2':113,
				'f3':114,
				'f4':115,
				'f5':116,
				'f6':117,
				'f7':118,
				'f8':119,
				'f9':120,
				'f10':121,
				'f11':122,
				'f12':123
			
			}
	
			var modifiers = { 
				shift: { wanted:false, pressed:false},
				ctrl : { wanted:false, pressed:false},
				alt  : { wanted:false, pressed:false},
				meta : { wanted:false, pressed:false}	//Meta is Mac specific
			};
                        
			if(e.ctrlKey)	modifiers.ctrl.pressed = true;
			if(e.shiftKey)	modifiers.shift.pressed = true;
			if(e.altKey)	modifiers.alt.pressed = true;
			if(e.metaKey)   modifiers.meta.pressed = true;
                        
			for(var i=0; k=keys[i],i<keys.length; i++) {
				//Modifiers
				if(k == 'ctrl' || k == 'control') {
					kp++;
					modifiers.ctrl.wanted = true;
				} else if(k == 'shift') {
					kp++;
					modifiers.shift.wanted = true;
				} else if(k == 'alt') {
					kp++;
					modifiers.alt.wanted = true;
				} else if(k == 'meta') {
					kp++;
					modifiers.meta.wanted = true;
				} else if(k.length > 1) { //If it is a special key
					if(special_keys[k] == code) kp++;
				} else if(opt['keycode']) {
					if(opt['keycode'] == code) kp++;
				} else { //The special keys did not match
					//$('logme').innerHTML += "char"+character+" key:"+k+"<br>";
					if(character == k.toLowerCase()) kp++;
					else {
						if(shift_nums[character] && e.shiftKey) { //Stupid Shift key bug created by using lowercase
							character = shift_nums[character]; 
							if(character == k) kp++;
						}
					}
				}
			}
			
			if(kp == keys.length && 
						modifiers.ctrl.pressed == modifiers.ctrl.wanted &&
						modifiers.shift.pressed == modifiers.shift.wanted &&
						modifiers.alt.pressed == modifiers.alt.wanted &&
						modifiers.meta.pressed == modifiers.meta.wanted) {
				callback(e);
	
				if(!opt['propagate']) { //Stop the event
					//e.cancelBubble is supported by IE - this will kill the bubbling process.
					e.cancelBubble = true;
					e.returnValue = false;
	
					//e.stopPropagation works in Firefox.
					if (e.stopPropagation) {
						e.stopPropagation();
						e.preventDefault();
					}
					return false;
				}
			}
		}
		this.all_shortcuts[shortcut_combination] = {
			'callback':func, 
			'target':ele, 
			'event': opt['type']
		};
		
		
		//Attach the function with the event
		if(ele.addEventListener){
			 ele.addEventListener(opt['type'], func, false);
		}
		else if(ele.attachEvent) {
			ele.attachEvent('on'+opt['type'], func);
		}
		else{
			 ele['on'+opt['type']] = func;
		}
	},

	//Remove the shortcut - just specify the shortcut and I will remove the binding
	'remove':function(shortcut_combination) {
		shortcut_combination = shortcut_combination.toLowerCase();
		var binding = this.all_shortcuts[shortcut_combination];
		delete(this.all_shortcuts[shortcut_combination])
		if(!binding) return;
		var type = binding['event'];
		var ele = binding['target'];
		var callback = binding['callback'];

		if(ele.detachEvent) ele.detachEvent('on'+type, callback);
		else if(ele.removeEventListener) ele.removeEventListener(type, callback, false);
		else ele['on'+type] = false;
	}
}


var accordion = Class.create();
accordion.prototype = {

	//
	//  Setup the Variables
	//
	showAccordion : null,
	currentAccordion : null,
	duration : null,
	effects : [],
	animating : false,

	//
	//  Initialize the accordions
	//
	initialize: function(container, options) {
	  if (!$(container)) {
	    throw(container+" doesn't exist!");
	    return false;
	  }

		this.options = Object.extend({
			resizeSpeed : 8,
			classNames : {
				toggle : 'accordion_toggle',
				toggleActive : 'accordion_toggle_active',
				content : 'accordion_content'
			},
			defaultSize : {
				height : null,
				width : null
			},
			direction : 'vertical',
			onEvent : 'click'
		}, options || {});

		this.duration = ((11-this.options.resizeSpeed)*0.15);

		var accordions = $$('#'+container+' .'+this.options.classNames.toggle);
		accordions.each(function(accordion) {
			Event.observe(accordion, this.options.onEvent, this.activate.bind(this, accordion), false);
			if (this.options.onEvent == 'click') {
			  accordion.onclick = function() {return false;};
			}

			if (this.options.direction == 'horizontal') {
				var options = $H({width: '0px'});
			} else {
				var options = $H({height: '0px'});
			}
			options.merge({display: 'none'});

			this.currentAccordion = $(accordion.next(0)).setStyle(options);
		}.bind(this));
	},

	//
	//  Activate an accordion
	//
	activate : function(accordion) {
		if (this.animating) {
			return false;
		}

		this.effects = [];

		this.currentAccordion = $(accordion.next(0));
		this.currentAccordion.setStyle({
			display: 'block'
		});

		this.currentAccordion.previous(0).addClassName(this.options.classNames.toggleActive);

		if (this.options.direction == 'horizontal') {
			this.scaling = $H({
				scaleX: true,
				scaleY: false
			});
		} else {
			this.scaling = $H({
				scaleX: false,
				scaleY: true
			});
		}

		if (this.currentAccordion == this.showAccordion) {
		  this.deactivate();
		} else {
		  this._handleAccordion();
		}
	},
	//
	// Deactivate an active accordion
	//
	deactivate : function() {
		var options = $H({
		  duration: this.duration,
			scaleContent: false,
			transition: Effect.Transitions.sinoidal,
			queue: {
				position: 'end',
				scope: 'accordionAnimation'
			},
			scaleMode: {
				originalHeight: this.options.defaultSize.height ? this.options.defaultSize.height : this.currentAccordion.scrollHeight,
				originalWidth: this.options.defaultSize.width ? this.options.defaultSize.width : this.currentAccordion.scrollWidth
			},
			afterFinish: function() {
				this.showAccordion.setStyle({
          height: 'auto',
					display: 'none'
				});
				this.showAccordion = null;
				this.animating = false;
			}.bind(this)
		});
    options.merge(this.scaling);

    this.showAccordion.previous(0).removeClassName(this.options.classNames.toggleActive);

		new Effect.Scale(this.showAccordion, 0, options);
	},

  //
  // Handle the open/close actions of the accordion
  //
	_handleAccordion : function() {
		var options = $H({
			sync: true,
			scaleFrom: 0,
			scaleContent: false,
			transition: Effect.Transitions.sinoidal,
			scaleMode: {
				originalHeight: this.options.defaultSize.height ? this.options.defaultSize.height : this.currentAccordion.scrollHeight,
				originalWidth: this.options.defaultSize.width ? this.options.defaultSize.width : this.currentAccordion.scrollWidth
			}
		});
		options.merge(this.scaling);

		this.effects.push(
			new Effect.Scale(this.currentAccordion, 100, options)
		);

		if (this.showAccordion) {
			this.showAccordion.previous(0).removeClassName(this.options.classNames.toggleActive);

			options = $H({
				sync: true,
				scaleContent: false,
				transition: Effect.Transitions.sinoidal
			});
			options.merge(this.scaling);

			this.effects.push(
				new Effect.Scale(this.showAccordion, 0, options)
			);
		}

    new Effect.Parallel(this.effects, {
			duration: this.duration,
			queue: {
				position: 'end',
				scope: 'accordionAnimation'
			},
			beforeStart: function() {
				this.animating = true;
			}.bind(this),
			afterFinish: function() {
				if (this.showAccordion) {
					this.showAccordion.setStyle({
						display: 'none'
					});
				}
				$(this.currentAccordion).setStyle({
				  height: 'auto'
				});
				this.showAccordion = this.currentAccordion;
				this.animating = false;
			}.bind(this)
		});
	}
}


/*
 * Copyright (c) 2006 Jonathan Weiss
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 */

var Tooltip = Class.create();
Tooltip.prototype = {
  initialize: function(element, tool_tip) {
    var options = Object.extend({
      default_css: false,
      margin: "0px",
	    padding: "5px",
	    backgroundColor: "#d6d6fc",
	    min_distance_x: 5,
      min_distance_y: 5,
      delta_x: 0,
      delta_y: 0,
      zindex: 1000
    }, arguments[2] || {});

    this.element      = $(element);

    this.options      = options;

    // use the supplied tooltip element or create our own div
    if($(tool_tip)) {
      this.tool_tip = $(tool_tip);
    } else {
      this.tool_tip = $(document.createElement("div"));
      document.body.appendChild(this.tool_tip);
      this.tool_tip.addClassName("tooltip");
      this.tool_tip.appendChild(document.createTextNode(tool_tip));
    }

    // hide the tool-tip by default
    this.tool_tip.hide();

    this.eventMouseOver = this.showTooltip.bindAsEventListener(this);
    this.eventMouseOut   = this.hideTooltip.bindAsEventListener(this);
    this.eventMouseMove  = this.moveTooltip.bindAsEventListener(this);

    this.registerEvents();
  },

  destroy: function() {
    Event.stopObserving(this.element, "mouseover", this.eventMouseOver);
    Event.stopObserving(this.element, "mouseout", this.eventMouseOut);
    Event.stopObserving(this.element, "mousemove", this.eventMouseMove);
  },

  registerEvents: function() {
    Event.observe(this.element, "mouseover", this.eventMouseOver);
    Event.observe(this.element, "mouseout", this.eventMouseOut);
    Event.observe(this.element, "mousemove", this.eventMouseMove);
  },

  moveTooltip: function(event){
	  Event.stop(event);
	  // get Mouse position
    var mouse_x = Event.pointerX(event);
	  var mouse_y = Event.pointerY(event);

	  // decide if wee need to switch sides for the tooltip
	  var dimensions = Element.getDimensions( this.tool_tip );
	  var element_width = dimensions.width;
	  var element_height = dimensions.height;

	  if ( (element_width + mouse_x) >= ( this.getWindowWidth() - this.options.min_distance_x) ){ // too big for X
		  mouse_x = mouse_x - element_width;
		  // apply min_distance to make sure that the mouse is not on the tool-tip
		  mouse_x = mouse_x - this.options.min_distance_x;
	  } else {
		  mouse_x = mouse_x + this.options.min_distance_x;
	  }

	  if ( (element_height + mouse_y) >= ( this.getWindowHeight() - this.options.min_distance_y) ){ // too big for Y
		  mouse_y = mouse_y - element_height;
	    // apply min_distance to make sure that the mouse is not on the tool-tip
		  mouse_y = mouse_y - this.options.min_distance_y;
	  } else {
		  mouse_y = mouse_y + this.options.min_distance_y;
	  }

	  // now set the right styles
	  this.setStyles(mouse_x, mouse_y);
  },


  showTooltip: function(event) {
    Event.stop(event);
    this.moveTooltip(event);
	  new Element.show(this.tool_tip);
	 // new Effect.Appear(this.tool_tip,{duration:1.0});
	  //new Effect.BlindDown(this.tool_tip);
  },

  setStyles: function(x, y){
    // set the right styles to position the tool tip
	  Element.setStyle(this.tool_tip, { position:'absolute',
	 								    top:y + this.options.delta_y + "px",
	 								    left:x + this.options.delta_x + "px",
									    zindex:this.options.zindex
	 								  });

	  // apply default theme if wanted
	  if (this.options.default_css){
	  	  Element.setStyle(this.tool_tip, { margin:this.options.margin,
		 		  						                    padding:this.options.padding,
		                                      backgroundColor:this.options.backgroundColor,
										                      zindex:this.options.zindex
		 								    });
	  }
  },

  hideTooltip: function(event){
	  new Element.hide(this.tool_tip);
	 // new Effect.Fade(this.tool_tip);
  },

  getWindowHeight: function(){
    var innerHeight;
	  if (navigator.appVersion.indexOf('MSIE')>0) {
		  innerHeight = document.body.clientHeight;
    } else {
		  innerHeight = window.innerHeight;
    }
    return innerHeight;
  },

  getWindowWidth: function(){
    var innerWidth;
	  if (navigator.appVersion.indexOf('MSIE')>0) {
		  innerWidth = document.body.clientWidth;
    } else {
		  innerWidth = window.innerWidth;
    }
    return innerWidth;
  }

}



