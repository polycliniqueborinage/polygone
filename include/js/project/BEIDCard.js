    function save_photo() {
	fenetre=window.open("../lib/exec_save_pic.php","","resizable,scrollbars");
	fenetre.moveTo(0,0);
	fenetre.resizeTo(300,300);	
	} 
    
    function getIDData(){
		var strTemp;
        var strTemp2;
        var strTemp3;
      	var nomPrenom;
        strTemp = document.BEIDApplet.getCardNumber() + "&nbsp;";
        //document.getElementById('cardNumberField').innerHTML = strTemp;
        strTemp = document.BEIDApplet.getChipNumber() + "&nbsp;";
        //document.getElementById('chipNumberField').innerHTML = strTemp;
        strTemp = document.BEIDApplet.getValidityDateBegin() + "&nbsp;";
        //document.getElementById('valBeginField').innerHTML = strTemp;
        strTemp = document.BEIDApplet.getValidityDateEnd() + "&nbsp;";
        //document.getElementById('valEndField').innerHTML = strTemp;
        strTemp = document.BEIDApplet.getIssMunicipality() + "&nbsp;";
        //document.getElementById('issMunicField').innerHTML = strTemp;
        
        strTemp = document.BEIDApplet.getNationalNumber();
        document.getElementById('niss').value = strTemp;
        document.getElementById('mutuelle_matricule').value = strTemp; 
        
        strTemp = document.BEIDApplet.getName();
        nomPrenom = strTemp;
        document.getElementById('familyname').value = strTemp;

        strTemp = document.BEIDApplet.getFirstName1();
        strTemp2 = document.BEIDApplet.getFirstName2();
        strTemp3 = document.BEIDApplet.getFirstName3();
        document.getElementById('firstname').value = strTemp + " " + strTemp2 + " " + strTemp3;
        nomPrenom += " " + strTemp + " " + strTemp2 + " " + strTemp3;

        //document.getElementById('findPatientInput').value=nomPrenom;
 		//patient_recherche_simple(nomPrenom);

        //document.getElementById('titulaire').value = document.getElementById('nom').value + " " + document.getElementById('prenom').value;

        strTemp = document.BEIDApplet.getNationality();
        for (i=0; i<document.getElementById('nationality').options.length; i++){	
        	if( document.getElementById('nationality').options[i].value == strTemp){
        		document.getElementById('nationality').selectedIndex = i;
        	}
        }
        //document.getElementById('nationnalite').value = strTemp;

        strTemp = document.BEIDApplet.getBirthLocation();
        //document.getElementById('birthLocField').innerHTML = strTemp;
        strTemp = document.BEIDApplet.getBirthDate();
        strTemp = strTemp.substr(6, 2) + "/" + strTemp.substr(4, 2) + "/" + strTemp.substr(0, 4);
        document.getElementById('birthday').value = strTemp;
        
        strTemp = document.BEIDApplet.getSex();
        for (i=0; i<document.getElementById('gender').options.length; i++){
        	if( document.getElementById('gender').options[i].value == strTemp){
        		document.getElementById('gender').selectedIndex = i;
        	}
        }	
        
        
        //document.getElementById('sexField').innerHTML = strTemp;
        //document.BEIDApplet.getNobleCondition();
        //document.BEIDApplet.getWhiteCane();
        //document.BEIDApplet.getYellowCane();
        //document.BEIDApplet.getExtendedMinority();
	}
    
    function getAddressData() {
		var strTemp;
        var strTemp2;
        var strTemp3;
        strTemp = document.BEIDApplet.getStreet();
        document.getElementById('address1').value = strTemp; 
        //strTemp2 = document.BEIDApplet.getStreetNumber();
        //strTemp3 = document.BEIDApplet.getBoxNumber();
        //document.getElementById('numero').value = strTemp2 + "/" + strTemp3;
        strTemp = document.BEIDApplet.getZip();
        strTemp2 = document.BEIDApplet.getMunicipality();
        document.getElementById('zip1city1').value = strTemp + " " + strTemp2;
        strTemp = document.BEIDApplet.getCountry();
        if(strTemp == "" && strTemp2 != ""){
 			strTemp = "be";
		}
        //document.getElementById('countryField').innerHTML = strTemp + "&nbsp;";
	}    
    function ReadCard(){
		var retval;
              var arr = new Array();
        //EmptyScreen();
        //document.getElementById('StatusField').innerHTML = "Lecture de la carte d'identit� en cours...";
        
        retval = document.BEIDApplet.InitLib(null); 
        if(retval == 0) {
			//document.getElementById('StatusField').innerHTML = "Reading Identity, please wait...";
            getIDData();
            //document.getElementById('StatusField').innerHTML = "Reading Address, please wait...";
            getAddressData();
            //document.getElementById('StatusField').innerHTML = "Reading Picture, please wait...";
            /*retval = document.BEIDApplet.GetPicture();
            if(retval != null) {
                      
                      var temp;
                      var fin;
                       
                      temp="";
                      fin ="";
                      
                      for(i=0; i<retval.length; i++)
                      {
                               temp = retval[i];
                               fin += temp.toString(32);
                      }
                      
                      document.getElementById('photo').value = fin;
                
          	}
			*/
            document.BEIDApplet.ExitLib();
            //document.getElementById('StatusField').innerHTML = "Lecture r�ussie";
		} else {
			//document.getElementById('StatusField').innerHTML = "Erreur lors de la lecture";
        }
        //var sURL = unescape(window.location.pathname);
        //window.location.href = sURL;
	}
