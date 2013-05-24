/*CHECK Global Input*/
// detect browser that not supports inserting of karakter in input-fields
var DATE_SEPARATOR = '/';
n=navigator;
nua=n.userAgent;
var valueinami = '';
var valueprothese = '';
var valueconsultation = '';
var valueracte = '';
var valueniss = '';
var valuebirthday = '';

function isInsertSupported() {
	return !((isSafari() && (parseFloat(versionNumber) >= 312,5)) || isKonquerer());
}

function isSafari() {
	return (nua.indexOf('Safari')!=-1);
}

function isKonquerer() {
	return (!isSafari() && (nua.indexOf('Konqueror')!=-1) )
}

function replaceChar(s, o, n) {
	var newString = "";
	for(i=0; i<s.length; i++) {
		if(s.charAt(i) == o)
			newString += n;
		else
			newString += s.charAt(i);
	}
	return newString;
}

function checkDate(o, oldValue, errorId) {
	var inDate = o.value;

	inDate = replaceChar(inDate, '.', DATE_SEPARATOR);
	inDate = replaceChar(inDate, '-', DATE_SEPARATOR);
	
	var aDate = inDate.split(DATE_SEPARATOR);
	
	// check max length (units & decimals)
	if(aDate[0].length > 3 || (aDate[0].length > 2 && !isInsertSupported())){
		o.value = oldValue;
		return oldValue;
	}
	
	for(i=0; i<inDate.length; i++) {
		var c = inDate.charAt(i);
		if (((c < '0' || c > '9') && c != DATE_SEPARATOR)){
			o.value = oldValue;
			return oldValue;
		}
	}

	var aDateTemp;
	for(i=0; i<aDate.length; i++) {
		if(i == 0) {
			if(parseInt(aDate[i],10) > 31 || aDate[i].length == 3) {
				if (isInsertSupported()){
					aDateTemp = aDate[i].charAt(aDate[i].length-1);
					aDate[i] = aDate[i].substring(0,aDate[i].length-1).concat(DATE_SEPARATOR);
					inDate = aDate[i].concat(aDateTemp);
				}else
					inDate = oldValue;
				break;
			}
		}
		if(i == 1) {
			if((aDate[i].length > 2) && !isInsertSupported()) {
				o.value = oldValue;
				return oldValue;
			}
			if(parseInt(aDate[i],10) > 12 && parseInt(aDate[i].substring(0,aDate[i].length-1),10) > 12){
				inDate = oldValue;
				break;
			}else if((parseInt(aDate[i],10) > 12 || aDate[i].length == 3) && isInsertSupported()) {
				aDateTemp = aDate[i].charAt(aDate[i].length-1);
				aDate[i] = aDate[i].substring(0,aDate[i].length-1).concat(DATE_SEPARATOR);
				inDate = aDate[0].concat(DATE_SEPARATOR.concat(aDate[i].concat(aDateTemp)));
				break;
			}
		}
		if(i == 2) {
			if(parseInt(aDate[i],10) > 2100) {
				inDate = oldValue;
				break;
			}
		}
	}
	
	if (!isInsertSupported()) {
		if (aDate.length >= 1 && parseInt(aDate[1],10) > 12) {
			inDate = oldValue;		
		} 
		if (aDate.length >= 2 && parseInt(aDate[2],10) > 2100) {
			inDate = oldValue;
		} 
	}
	
	if(inDate != o.value) {
		o.value = inDate;
		if(errorId != "" && inDate != "") showError(errorId, true);
	}
	return inDate;
}

function checkNumber(o, oldValue, minDigits, finished) {
	var number = o.value;
	o.className = "inputBox";
	for(i=0; i<number.length; i++) {
		if(number.charAt(i) < '0' || number.charAt(i) > '9') {
			number = oldValue;
		}
	}
	if(finished && (minDigits != 0) && (number.length < minDigits)) {
		o.className = "inputBoxError";
	}
	if(o.value != number) o.value = number;
	return number;
}

function checkAgeFormat(o, oldValue) {

	var inAge = o.value;
	inAge = inAge.replace(/:/g,";");
	inAge = inAge.replace(/;;/g,";");
	inAge = inAge.replace(/ /g,"-");
	inAge = inAge.replace(/--/g,"-");
	inAge = inAge.replace(/;-/g,";");
	inAge = inAge.replace(/-;/g,"-");
	
	var aAge = inAge.split(';');

	var aAgeLast = aAge[aAge.length-1];

	if (aAgeLast.substr(0, aAgeLast.length-1).indexOf('-', 0) > 0 && (aAgeLast.charAt(aAgeLast.length-1) == '-' )) {
		o.value = oldValue;
		return oldValue;
	}
	
	try {
		var aAgePreLast = aAge[aAge.length-2];
		if (aAgePreLast.indexOf('-', 0) == -1 ) {
			o.value = oldValue;
			return oldValue;
		}
	} catch (e) {}

	for(i=0; i<aAgeLast.length; i++) {
		var c = aAgeLast.charAt(i);
		if (((c < '0' || c > '9') && c != '-')){
				o.value = oldValue;
				return oldValue;
		}
	}
	
	if(o.value != inAge) o.value = inAge;
	return inAge;
}


//check amout
function checkAmount(o,oldValue, lenUnits, lenDecimals, signAllowed) {
	var maxLenUnits = lenUnits;
	// remove leading and trailing spaces
	if (o.value.charAt(0) == " " || o.value.charAt(o.value.length-1) == " "){
		 o.value = trim(o.value);
	}
	var number = o.value;

	// check sign
	if (signAllowed){
		if (number.lastIndexOf("-") >0){
			o.value = oldValue;
			return oldValue;
		}
		if (number.charAt(0) == "-"){
			maxLenUnits ++;
		}
	}
	else{
		if (number.indexOf("-") != -1){
			o.value = oldValue;
			return oldValue;
		}
	}

	// check separator
	number = number.replace(',', '.');
	
	if (lenDecimals == 0 && number.indexOf(".") != -1){
		o.value = oldValue;
		return oldValue;
	}
	if (number.indexOf(".") != number.lastIndexOf(".")){ 	// check if exist more than one ','
		o.value = oldValue;
		return oldValue;
	}
	
	// check max length (units & decimals)
	a = number.split(".");  // split units and decimals
	if(a[0].length > maxLenUnits || ((a.length > 1) && (a[1].length > lenDecimals))){
		o.value = oldValue;
		return oldValue;
	}

	// Validate inserted character
	for(i=0; i<number.length; i++) {
		var c = number.charAt(i);
		if ((c<'0' || c >'9') && c != '.' && c != '-'){
			o.value = oldValue;
			return oldValue;
		}
	}
	//return new result
	if (o.value.charAt(number.length-1) == ','){ 
		o.value = number;
	}
	
	return number;
}



function checkAccountNumber(o, oldValue, finished) {
	var number = o.value;
	o.className = "inputBox";

	number = number.replace(" ","");
	number = number.replace("/","-");
	
	posFirstSep = 3;
	posSecondSep = 11; 
	
	var i = 0;
	while (i < number.length) {
		var c = number.charAt(i);
	
		/* check if it's a valid character) */
		if ( (c >= '0' && c <= '9') || c == '-') {
			
			if (c == '-' && (i !=posFirstSep && i != posSecondSep)) {
				/* '-' not at right spot */
				number = number.substring(0,i) + number.substring(i+1,number.length);	
			}
			else if (c != '-' && (i==posFirstSep || i==posSecondSep) && isInsertSupported()) {
				/* we found a spot to insert '-' */
				firstPart = number.substring(0,i);
				secondPart = number.substring(i,number.length);
				number = firstPart + "-" + secondPart; 
				i++;
			} else {
				i++;
			}		

		} else {			
			/* not a number or '-' */
			number = number.substring(0,i) + number.substring(i+1,number.length);			
		}
	}
	if (((number.length >= posFirstSep+1 && number.charAt(posFirstSep) != '-') || 
	     (number.length >= posSecondSep+1 && number.charAt(posSecondSep) != '-')) && !isInsertSupported()) {
		number = oldValue;
	}

	if((finished || number.length == 14) && !checkAccountDigit(number)) o.className = "inputBoxError";
	if(number != o.value) o.value = number;
	//if(!checkAccountFormat2(number)) o.className = "inputBoxError"; 
	return number;
}


function checkPourcent(o,oldValue, lenUnits, lenDecimals) {
	var maxLenUnits = lenUnits;

	// remove leading and trailing spaces
	if (o.value.charAt(0) == " " || o.value.charAt(o.value.length-1) == " "){
		 o.value = trim(o.value);
	}
	var number = o.value;

	if (number.charAt(0) == "1"){
		maxLenUnits ++;
	}

	if (number > 100){
		maxLenUnits --;
	}

	// check separator
	number = number.replace(',', '.');
	
	if (lenDecimals == 0 && number.indexOf(".") != -1){
		o.value = oldValue;
		return oldValue;
	}
	if (number.indexOf(".") != number.lastIndexOf(".")){ 	// check if exist more than one ','
		o.value = oldValue;
		return oldValue;
	}
	
	// check max length (units & decimals)
	a = number.split(".");  // split units and decimals
	
	if(a[0] > 99 && (a.length > 1)){
		o.value = oldValue;
		return oldValue;
	}

	if(a[0].length > maxLenUnits || ((a.length > 1) && (a[1].length > lenDecimals))){
		o.value = oldValue;
		return oldValue;
	}

	// Validate inserted character
	for(i=0; i<number.length; i++) {
		var c = number.charAt(i);
		if ((c<'0' || c >'9') && c != '.' && c != '-'){
			o.value = oldValue;
			return oldValue;
		}
	}
	//return new result
	if (o.value.charAt(number.length-1) == ','){ 
		o.value = number;
	}
	return number;
}