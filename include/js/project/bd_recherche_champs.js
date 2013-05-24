//Gets the browser specific XmlHttpRequest Object
function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
	}
}

//Our XmlHttpRequest object to get the auto suggest
var searchReq = getXmlHttpRequestObject();
var champs = '';
var table = '';
var search_suggest = '';

//Called from keyup on the search textbox.
//Starts the AJAX request.
function searchSuggest(row) { 
	if (searchReq.readyState == 4 || searchReq.readyState == 0) { 
		champs  = "champs"+row;
		table   = "table"+row;
		search_suggest = "search_suggest"+row;
		var str = document.getElementById(table).options[document.getElementById(table).selectedIndex].value;
		searchReq.open("GET", '../lib/BD_description.php?table=' + str, true);
		searchReq.onreadystatechange = handleSearchSuggest; 
		searchReq.send(null);
	} else {
		document.getElementById(search_suggest).innerHTML = '';
	}
}

//Called when the AJAX response is returned.
function handleSearchSuggest(){
	if (searchReq.readyState == 4) {	
		var ss = document.getElementById(search_suggest);
		ss.innerHTML = '';
		var str = searchReq.responseText.split("#");
		for(i=0; i < str.length - 1; i++) {
			//Build our element string.  This is cleaner using the DOM, but
			//IE doesn't support dynamically added attributes.
			var suggest = '<div onmouseover="javascript:suggestOver(this);" ';
			suggest += 'onmouseout="javascript:suggestOut(this);" ';
			suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';
			suggest += 'class="suggest_link">' + str[i] + '</div>';
			ss.innerHTML += suggest;
		}
	}	
}

//Mouse over function
function suggestOver(div_value) {
	div_value.className = 'suggest_link_over';
}
//Mouse out function
function suggestOut(div_value) {
	div_value.className = 'suggest_link';
}
//Click function
function setSearch(value) {
	document.getElementById(champs).value = value;
	document.getElementById(search_suggest).innerHTML = '';
}


function html_entities_decode(pseudo) {
	
	out = pseudo;
	
	out = out.replace('&#039;','\'');
	out = out.replace('&#039;','\'');
		
	out = out.replace('&egrave;','�');
	out = out.replace('&egrave;','�');
	out = out.replace('&egrave;','�');
		
	out = out.replace('&Egrave;','�');
	out = out.replace('&Egrave;','�');
	out = out.replace('&Egrave;','�');
		
	out = out.replace('&eacute;','�');
	out = out.replace('&eacute;','�');
	out = out.replace('&eacute;','�');

	out = out.replace('&Eacute;','�');
	out = out.replace('&Eacute;','�');
	out = out.replace('&Eacute;','�');

	out = out.replace('&agrave;','�');
	out = out.replace('&agrave;','�');
	out = out.replace('&aacute;','�');
		
	out = out.replace('&Agrave;','�');
	out = out.replace('&Agrave;','�');
	out = out.replace('&Aacute;','�');
		
	out = out.replace('&aacute;','�');
	out = out.replace('&aacute;','�');
	out = out.replace('&aacute;','�');

	out = out.replace('&Aacute;','�');
	out = out.replace('&Aacute;','�');
	out = out.replace('&Aacute;','�');

	out = out.replace('&euml;','�');
	out = out.replace('&euml;','�');
	out = out.replace('&euml;','�');

	return out;
}
