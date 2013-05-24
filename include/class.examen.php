<?php
/**
 * Provides methods to interact with users
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name user
 */
class examen
{
    public $mylog;

    function __construct()
    {
        $this->mylog = new mylog;
    }

    /**
     * Add Exam
     *
     */
    function addExam($patient_id, $exam_id, $exam_date, $medecin_id) {
    	
    	
    	$patientID = mysql_real_escape_string($patient_id);
        $examID	   = mysql_real_escape_string($exam_id);
        $examDate  = mysql_real_escape_string($exam_date);
        $medecinID = mysql_real_escape_string($medecin_id);
		
        $sql = "INSERT `prises_de_sang` ( `patient_id` , `examen_id` , `date` , `medecin_id` )
				VALUES ( '$patientID', '$examID', '$examDate', '$medecinID' );";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
	/**
     * Add Groupe
     *
     */
    function addGroupe($groupe_descr) {
    	
    	
    	$groupeDescr   = mysql_real_escape_string($groupe_descr);
        
        $sql = "INSERT `analyse_groupe` ( `label` )
				VALUES ( '$groupeDescr'  );";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }    
    
    /**
     * Add Code
     *
     */
    function addCode($analyse_code, $analyse_label, $analyse_ref, $analyse_unite, $analyse_groupe) {
    	
    	
    	$analyseCode   = mysql_real_escape_string($analyse_code);
        $analyseLabel  = mysql_real_escape_string($analyse_label);
        $analyseRef    = mysql_real_escape_string($analyse_ref);
        $analyseUnite  = mysql_real_escape_string($analyse_unite);
        $analyseGroupe = mysql_real_escape_string($analyse_groupe);
		
        $sql = "INSERT `analyse_code` ( `analyse_code` , `label` , `reference` , `unite` , `groupe` )
				VALUES ( '$analyseCode', '$analyseLabel', '$analyseRef', '$analyseUnite', '$analyseGroupe' );";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    /**
     * Add Res
     *
     */
    function addResult($exam_id, $analyse_code, $analyse_code_info, $analyse_res) {
    	
    	
    	$examID          = mysql_real_escape_string($exam_id);
        $analyseCode     = mysql_real_escape_string($analyse_code);
        $analyseCodeInfo = mysql_real_escape_string($analyse_code_info);
        $analyseRes      = mysql_real_escape_string($analyse_res);
		
        $sql = "INSERT `resultats_examen` ( `exam_id` , `analyse_code` , `analyse_info` , `analyse_resultat` )
				VALUES ( '$examID', '$analyseCode', '$analyseCodeInfo', '$analyseRes' );";

		$ins = mysql_query($sql);
		$insid = mysql_insert_id();
        
        if ($ins) {
            return $insid;
        } else {
            return false;
        }
        
    }
    
    
    /**
     * Check if code exists
     *
     */
    function codeExists($analyse_code) {
    	
        $analyseCode     = mysql_real_escape_string($analyse_code);
        
        $sql = "select COUNT(analyse_code) FROM analyse_code WHERE analyse_code = '$analyse_code'";
        $sel = mysql_query($sql);
	  	$res = mysql_fetch_array($sel);
	  	
        if ($res[0] == "1") {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Check if groupe exists
     *
     */
    function groupeExists($groupe_descr) {
    	
        $groupeDescr  = mysql_real_escape_string($groupe_descr);
        
        $sql = "select COUNT(analyse_groupe) FROM analyse_groupe WHERE label = '$groupeDescr'";
        $sel = mysql_query($sql);
	  	$res = mysql_fetch_array($sel);
	  	
        if ($res[0] == "1") {
            return true;
        } else {
            return false;
        }
        
    }

	/**
     * get groupe
     *
     */
    function getGroupe($groupe_descr) {
    	
        $groupeDescr  = mysql_real_escape_string($groupe_descr);
        
        $sql = "select * FROM analyse_groupe WHERE label = '$groupeDescr'";
        $sel = mysql_query($sql);
	  	$res = mysql_fetch_array($sel);
	  	
	  	$res["analyse_groupe"] = stripslashes($res["analyse_groupe"]);
	  	$res["label"]          = stripslashes($res["label"]);
	  	
        return $res["analyse_groupe"];
        
    }
    
	/**
     * get resultats
     *
     */
    function getResultats($patient_id, $examen_id) {
       
    		$sql = "SELECT 
					p.nom    	        as patient_nom, 
					p.prenom 	        as patient_prenom, 
					date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
					date_format(pds.date, '%d/%m/%Y') as examen_date,
    				m.nom    	        as medecin_nom, 
					m.prenom 	        as medecin_prenom, 
					ac.analyse_code     as analyse_code,
					ac.label            as analyse_label,
					ac.reference        as analyse_reference,
					ac.unite            as analyse_unite, 
					ag.label            as groupe_label,  
					re.analyse_info     as analyse_info,
					re.analyse_resultat as analyse_resultat
					FROM patients p, prises_de_sang pds, analyse_code ac, analyse_groupe ag, resultats_examen re, medecins m
   					WHERE (p.id = pds.patient_id) 
   					  AND (m.id = pds.medecin_id)
   				      AND (p.id = '$patient_id') 
   					  AND (ac.groupe = ag.analyse_groupe) 
   					  AND (pds.examen_id = '$examen_id') 
   					  AND (pds.examen_id = re.exam_id) 
   					  AND (re.analyse_code = ac.analyse_code)
   					ORDER BY groupe_label";
   					   	        //echo $sql;				
   		$sel1 = mysql_query($sql);

        $exams = array();

        while ($exam = mysql_fetch_array($sel1)) {
        	
            $exam["patient_nom"] 		    = stripslashes($exam["patient_nom"]);
        	$exam["patient_prenom"] 		= stripslashes($exam["patient_prenom"]);
        	$exam["patient_date_naissance"] = stripslashes($exam["patient_date_naissance"]);
            $exam["examen_date"] 			= stripslashes($exam["examen_date"]);
        	$exam["medecin_nom"] 		    = stripslashes($exam["medecin_nom"]);
        	$exam["medecin_prenom"] 		= stripslashes($exam["medecin_prenom"]);
        	$exam["analyse_code"] 			= stripslashes($exam["analyse_code"]);
            $exam["analyse_label"] 			= stripslashes($exam["analyse_label"]);
            $exam["analyse_reference"] 		= stripslashes($exam["analyse_reference"]);
            $exam["analyse_unite"] 			= stripslashes($exam["analyse_unite"]);
            $exam["groupe_label"] 			= stripslashes($exam["groupe_label"]);
            $exam["analyse_info"] 			= stripslashes($exam["analyse_info"]);
            $exam["analyse_resultat"] 		= stripslashes($exam["analyse_resultat"]);
            
           	array_push($exams, $exam);
            
        }

        if (!empty($exams))  {	
            return $exams;
        } else  {
            return false;
        }

    }    
    
	/**
     * get medecin
     *
     */
    function getMedecin($medecin_prenom, $medecin_nom) {
    	
        $medecin_nom     = strtolower(mysql_real_escape_string($medecin_nom));
        $medecin_prenom  = strtolower(mysql_real_escape_string($medecin_prenom));
        
        $sql = "select id FROM medecins WHERE lower(nom) regexp '$medecin_nom'";
        $sel = mysql_query($sql);
	  	$res = mysql_fetch_array($sel);
	  	
        return $res["id"];
        
    }
    
    /** Make a search for sumehr report
     *
     * @param value
     * @return array
     * 
     **/
	function modulesearch($patient, $doctor, $limit) {
    	
		$patient = strtolower($patient);
		$doctor  = strtolower($doctor);
		
		if($patient != "" && $doctor != ""){
		
			$sql = "SELECT 
						DISTINCT 
						pds.patient_id as patient_id, 
						pds.examen_id as examen_id,
						date_format(pds.date, '%d/%m/%Y') as examen_date,
						p.nom as patient_nom, 
						p.prenom as patient_prenom, 
						date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
						m.nom as medecin_nom, 
						m.prenom as medecin_prenom
						FROM patients p, prises_de_sang pds, medecins m
	   					WHERE (m.id = pds.medecin_id) AND (p.id = pds.patient_id) AND (((lower(concat(p.nom,' ',p.prenom)) regexp '$patient') OR (lower(concat(p.prenom,' ',p.nom)) regexp '$patient'))) AND
	   						                                                          (((lower(concat(m.nom,' ',m.prenom)) regexp '$doctor')  OR (lower(concat(m.prenom,' ',m.nom)) regexp '$doctor')))
	   					ORDER BY pds.patient_id, pds.date 
	   					LIMIT $limit";
		} else{
			if($patient != ""){
				$sql = "SELECT 
							DISTINCT 
							pds.patient_id as patient_id, 
							pds.examen_id as examen_id,
							date_format(pds.date, '%d/%m/%Y') as examen_date,
							p.nom as patient_nom, 
							p.prenom as patient_prenom, 
							date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
							m.nom as medecin_nom, 
							m.prenom as medecin_prenom
							FROM patients p, prises_de_sang pds, medecins m
		   					WHERE (m.id = pds.medecin_id) AND (p.id = pds.patient_id) AND ((lower(concat(p.nom,' ',p.prenom)) regexp '$patient') OR (lower(concat(p.prenom,' ',p.nom)) regexp '$patient'))
		   					ORDER BY pds.patient_id, pds.date 
		   					LIMIT $limit";
			} else {
				$sql = "SELECT 
							DISTINCT 
							pds.patient_id as patient_id, 
							pds.examen_id as examen_id,
							date_format(pds.date, '%d/%m/%Y') as examen_date,
							p.nom as patient_nom, 
							p.prenom as patient_prenom, 
							date_format(p.date_naissance, '%d/%m/%Y') as patient_date_naissance,
							m.nom as medecin_nom, 
							m.prenom as medecin_prenom
							FROM patients p, prises_de_sang pds, medecins m
		   					WHERE (m.id = pds.medecin_id) AND (p.id = pds.patient_id) AND ((lower(concat(m.nom,' ',m.prenom)) regexp '$doctor')  OR (lower(concat(m.prenom,' ',m.nom)) regexp '$doctor'))
		   					ORDER BY pds.patient_id, pds.date 
		   					LIMIT $limit";
			}
			
		}	
   		$sel1 = mysql_query($sql);

        $exams = array();

        while ($exam = mysql_fetch_array($sel1)) {
        	
            $exam["examen_id"] 		    	= stripslashes($exam["examen_id"]);
        	$exam["examen_date"] 			= stripslashes($exam["examen_date"]);
        	$exam["medecin_nom"] 			= stripslashes($exam["medecin_nom"]);
            $exam["medecin_prenom"] 		= stripslashes($exam["medecin_prenom"]);
        	$exam["patient_nom"] 			= stripslashes($exam["patient_nom"]);
            $exam["patient_prenom"] 		= stripslashes($exam["patient_prenom"]);
            $exam["patient_date_naissance"] = stripslashes($exam["patient_date_naissance"]);
            $exam["medecin_nom"] 			= stripslashes($exam["medecin_nom"]);
            $exam["medecin_prenom"] 		= stripslashes($exam["medecin_prenom"]);
            
           	array_push($exams, $exam);
            
        }

        if (!empty($exams))  {	
            return $exams;
        } else  {
            return false;
        }

    }

}
?>