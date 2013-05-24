<?php
/**
 * Provides methods to interact with user groups
 *
 * @name user
 * @version 0.4.7
 * @package Collabtive
 */
class user_group
{
    public $mylog;

    
    /**
     * Konstruktor
     * Initialisiert den Eventlog
     */
    function __construct()
    {
        $this->mylog = new mylog;
    }
    function add($ug_description, $ug_leaderid) {

    	$description = ucfirst(stripslashes(mysql_real_escape_string($ug_description)));
        $leaderid    = mysql_real_escape_string($ug_leaderid);
        
        $sql1 = "INSERT INTO `user_group` (`description`,`leader`) VALUES ('$description','$leaderid')";
        
        $ins1 = mysql_query($sql1);
        
        $insid = mysql_insert_id();
        
        if ($ins1){
            return $insid;
        } else {
            return false;
        }
    }
    
    
    function update($ug_id, $ug_description, $ug_leaderid) {

    	$id    = mysql_real_escape_string($ug_id);
    	$description = ucfirst(stripslashes(mysql_real_escape_string($ug_description)));
        $leaderid    = mysql_real_escape_string($ug_leaderid);
        
        $sql = "UPDATE user_group SET description='$description',leader='$leaderid' WHERE ID = $id";
        
        $ins1 = mysql_query($sql);
        
        $insid = mysql_insert_id();
        
        if ($ins1){
            return $insid;
        } else {
            return false;
        }
    }

    
    function del($id) {
    	
        $id = (int) $id;

        $del = mysql_query("DELETE FROM user_group WHERE id = $id");
        $del2 = mysql_query("DELETE FROM user_assignment WHERE group = $id");
        if ($del) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a user profile
     *
     * @param int $id User ID
     * @return array $profile Profile
     */
    function get($id) {
        
    	$id = (int) mysql_real_escape_string($id);
        $sel = mysql_query("SELECT ug.description as description, ug.leader as leaderid, u.name as leadername, u.firstname as leaderfirstname FROM user u, user_group ug WHERE ug.id = $id AND u.ID = ug.leader");
        $ug = mysql_fetch_array($sel);
        if (!empty($ug))
        {
            $ug["description"] 		= stripcslashes($ug["description"]);
            $ug["leaderid"]    		= stripcslashes($ug["leaderid"]);
            $ug["leadername"]  		= stripcslashes($ug["leadername"]);
            $ug["leaderfirstname"]	= stripcslashes($ug["leaderfirstname"]);
            return $ug;
        }
        else
        {
            return false;
        }
    }

    
	function getAll() {
        
    	$id = (int) mysql_real_escape_string($id);
        $sel = mysql_query("SELECT ug.id as id, ug.description as description, ug.leader as leaderid, u.name as leadername, u.firstname as leaderfirstname FROM user u, user_group ug WHERE u.ID = ug.leader");
        
        $ugs = array();

        while ($ug = mysql_fetch_array($sel)) {
            $ug["id"] 				= stripcslashes($ug["id"]);
        	$ug["description"] 		= stripcslashes($ug["description"]);
            $ug["leaderid"]    		= stripcslashes($ug["leaderid"]);
            $ug["leadername"]  		= stripcslashes($ug["leadername"]);
            $ug["leaderfirstname"]	= stripcslashes($ug["leaderfirstname"]);
            array_push($ugs, $ug);
        }
        if(!empty($ugs))
        	return $ugs;
        else	
        	return false;
    }

    function addAssignment($group, $member, $ponderation) {

        $sql1 = "INSERT INTO `group_assignment` (`group_id`,`user_id`,`ponderation`) VALUES ('$group','$member', '$ponderation')";
        
        $ins1 = mysql_query($sql1);
        
        $insid = mysql_insert_id();
        
        if ($ins1){
            return $insid;
        } else {
            return false;
        }
    }    
    
    function getPonderation($userid){
    	$sel = mysql_query("SELECT max(ponderation) as max_pond FROM group_assignment WHERE user_id = '$userid'");
        
        $res = mysql_fetch_array($sel);
        
        return $res["max_pond"];
    }
    
    function getGroupForUser($userid){
    	$sel = mysql_query("SELECT ug.id as id, ug.description as description, ug.leader as leaderid, u.name as leadername, u.firstname as leaderfirstname, ga.ponderation FROM user u, user_group ug, group_assignment ga WHERE u.ID = ug.leader AND ga.group_id = ug.id AND ga.user_id = '$userid' ORDER BY ga.ponderation ");
    	
        $ugs = array();
        while($ug = mysql_fetch_array($sel)){
	        $ug["id"] 				= stripcslashes($ug["id"]);
	       	$ug["description"] 		= stripcslashes($ug["description"]);
	        $ug["leaderid"]    		= stripcslashes($ug["leaderid"]);
	        $ug["leadername"]  		= stripcslashes($ug["leadername"]);
	        $ug["leaderfirstname"]	= stripcslashes($ug["leaderfirstname"]);
	        $ug["ponderation"]		= stripcslashes($ug["ponderation"]);
	        
	        array_push($ugs, $ug);
        }
         
        if(!empty($ugs))
        	return $ugs;
        else	
        	return false;
    }
    
	function getGroupForManager($userid){
    	$sel = mysql_query("SELECT ug.id as id, ug.description as description, ug.leader as leaderid, u.name as leadername, u.firstname as leaderfirstname, ga.ponderation FROM user u, user_group ug, group_assignment ga WHERE u.ID = ug.leader AND ga.group_id = ug.id AND ug.leader = '$userid' ORDER BY ga.ponderation ");
    	
        $ugs = array();
        while($ug = mysql_fetch_array($sel)){
	        $ug["id"] 				= stripcslashes($ug["id"]);
	       	$ug["description"] 		= stripcslashes($ug["description"]);
	        $ug["leaderid"]    		= stripcslashes($ug["leaderid"]);
	        $ug["leadername"]  		= stripcslashes($ug["leadername"]);
	        $ug["leaderfirstname"]	= stripcslashes($ug["leaderfirstname"]);
	        $ug["ponderation"]		= stripcslashes($ug["ponderation"]);
	        
	        array_push($ugs, $ug);
        }
         
        if(!empty($ugs))
        	return $ugs;
        else	
        	return false;
    }
    
	function getGroupMembers($group){
        $sel = mysql_query("SELECT u.ID, u.firstname as firstname, u.familyname, u.wsr_id as wsr_id, u.wsr_refdate as wsr_refdate, ug.leader as leader, ug.description FROM user u, group_assignment ga, user_group ug WHERE u.ID = ga.user_id AND ga.group_id = '$group' AND ga.group_id = ug.id");
        
        $users = array();

        while ($user = mysql_fetch_array($sel)) {
            $user["ID"] 				= stripcslashes($user["ID"]);
        	$user["firstname"] 			= stripcslashes($user["firstname"]);
            $user["familyname"]    		= stripcslashes($user["familyname"]);
            $user["wsr_id"]  			= stripcslashes($user["wsr_id"]);
            $user["wsr_refdate"]		= stripcslashes($user["wsr_refdate"]);
            $user["user_group"]			= stripcslashes($user["description"]);
           
            array_push($users, $user);
        }
        
        
        
        if(!empty($users))
        	return $users;
        else	
        	return false;
    }
    
	function getGroupChief($group){
        $sel = mysql_query("SELECT u.ID, u.firstname as firstname, u.familyname, u.wsr_id as wsr_id, u.wsr_refdate as wsr_refdate, ug.leader as leader FROM user u, user_group ug WHERE u.ID = ug.leader AND ug.id = '$group'");
        $user = mysql_fetch_array($sel);
        $user["ID"] 				= stripcslashes($user["ID"]);
        $user["firstname"] 			= stripcslashes($user["firstname"]);
        $user["familyname"]    		= stripcslashes($user["familyname"]);
        $user["wsr_id"]  			= stripcslashes($user["wsr_id"]);
        $user["wsr_refdate"]		= stripcslashes($user["wsr_refdate"]);
        
        if(!empty($user))
        	return $user;
        else	
        	return false;
    }
    
	function isManager($userid){
        $sel = mysql_query("SELECT u.ID, u.firstname as firstname, u.familyname, u.wsr_id as wsr_id, u.wsr_refdate as wsr_refdate, ug.leader as leader FROM user u, user_group ug WHERE u.ID = ug.leader AND ug.leader = '$userid'");

        $user = mysql_fetch_array($sel);
        $user["ID"] 				= stripcslashes($user["ID"]);
        $user["firstname"] 			= stripcslashes($user["firstname"]);
        $user["familyname"]    		= stripcslashes($user["familyname"]);
        $user["wsr_id"]  			= stripcslashes($user["wsr_id"]);
        $user["wsr_refdate"]		= stripcslashes($user["wsr_refdate"]);
        
        if($user["ID"] != '')
        	return true;
        else	
        	return false;
    }
    
    /**
     * Get the avatar of a user
     *
     * @param int $id User ID
     * @return array $profile Avatar
     */
    function getAvatar($id) {
        $id = (int) $id;

        $sel = mysql_query("SELECT avatar FROM user WHERE ID = $id");
        $profile = mysql_fetch_row($sel);
        $profile = $profile[0];

        if (!empty($profile))
        {
            return $profile;
        }
        else
        {
            return false;
        }
    }

	function getLogInfo($id) {

		$id = (int) $id;

        $sel = mysql_query("SELECT concat(familyname,' ',firstname) FROM user WHERE ID = $id");
        $log = mysql_fetch_row($sel);
        $log = $log[0];

        if (!empty($log)) {
            return $log;
        } else {
            return false;
        }
    }
    
    /**
     * Log a user in
     *
     * @param string $user User name
     * @param string $pass Password
     * @return bool
     */
    function login($user, $pass)
    {
        if (!$user)
        {
            return false;
        }
        $user = mysql_real_escape_string($user);
        $pass = mysql_real_escape_string($pass);
        $pass = sha1($pass);

        $sel1 = mysql_query("SELECT ID,name,locale,admin,lastlogin FROM user WHERE name = '$user' AND pass = '$pass' and admin > 0");
        $chk = mysql_fetch_array($sel1);
        if ($chk["ID"] != "")
        {
            $now = time();
            $_SESSION['userid'] = $chk['ID'];
            $_SESSION['username'] = stripslashes($chk['name']);
            $_SESSION['adminstate'] = $chk['admin'];
            $_SESSION['lastlogin'] = $now;
            $_SESSION['userlocale'] = $chk['locale'];
            session_register('userid');
            session_register('username');
            session_register('adminstate');
            session_register('lastlogin');
            session_register('userlocale');
            $userid = $_SESSION['userid'];
            $seid = session_id();
            $staylogged = getArrayVal($_POST, 'staylogged');

            if ($staylogged == 1) {
                setcookie("PHPSESSID", "$seid", time() + 14 * 24 * 3600);
            }
            $upd1 = mysql_query("UPDATE user SET lastlogin = '$now' WHERE ID = $userid");
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Logout
     *
     * @return bool
     */
    function logout()
    {
        session_start();
        session_destroy();
        session_unset();
        setcookie("PHPSESSID", "");
        return true;
    }

    /**
     * Returns all users
     *
     * @param int $lim Limit
     * @return array $users Registrierte Mitglieder
     */
    function getAllUsers($lim = 10) {
        
    	$lim = (int) $lim;

        $sel = mysql_query("SELECT COUNT(*) FROM `user` WHERE ID!=0 AND admin > 0");
        $num = mysql_fetch_row($sel);
        $num = $num[0];
        SmartyPaginate::connect();
        // set items per page
        SmartyPaginate::setLimit($lim);
        SmartyPaginate::setTotal($num);

        $start = SmartyPaginate::getCurrentIndex();
        $lim = SmartyPaginate::getLimit();

        $sel2 = mysql_query("SELECT * FROM `user` WHERE ID!=0 AND admin > 0 ORDER BY familyname, firstname LIMIT $start,$lim");

        $users = array();
        while ($user = mysql_fetch_array($sel2))
        {
            $user["name"] = stripslashes($user["name"]);
            $user["familyname"] = stripslashes($user["familyname"]);
            array_push($users, $user);
        }

        if (!empty($users)) {
            return $users;
        } else {
            return false;
        }
    }

	function getAllUsersByLetter($letter) {
        
        $sel = mysql_query("SELECT * FROM `user` WHERE ID!=0 AND admin > 0 AND familyname like '$letter%' ORDER BY familyname, firstname");

        $users = array();
        while ($user = mysql_fetch_array($sel))
        {
            $user["name"] = stripslashes($user["name"]);
            $user["familyname"] = stripslashes($user["familyname"]);
            array_push($users, $user);
        }

        if (!empty($users)) {
            return $users;
        } else {
            return false;
        }
    }
    
	function getAllEmployeesByLetter($letter) {
        
		$sql = "SELECT * FROM `user` WHERE type = 'employee' AND familyname like '$letter%' ORDER BY familyname, firstname";
		$sel = mysql_query($sql);
		
        $users = array();
        while ($user = mysql_fetch_array($sel))
        {
            $user["name"] = stripslashes($user["name"]);
            $user["firstname"] = stripslashes($user["firstname"]);
            $user["familyname"] = stripslashes($user["familyname"]);
            array_push($users, $user);
        }

        if (!empty($users)) {
            return $users;
        } else {
            return false;
        }
    }
    
	function getOnlinelist($offset = 1200) {
        $offset = (int) $offset;
        $time = time();
        $now = $time - $offset;

        $sql ="SELECT * FROM user WHERE lastlogin >= $now";
        
        $sel = mysql_query($sql);

        $users = array();

        while ($user = mysql_fetch_array($sel))
        {
            $user["name"] = stripslashes($user["name"]);
            $user["firstname"] = stripslashes($user["firstname"]);
            $user["familyname"] = stripslashes($user["familyname"]);
            array_push($users, $user);
        }

        if (!empty($users)) {
            return $users;
        } else {
            return false;
        }
    }

    function isOnline($user, $offset = 30) {
        $user = (int) $user;
        $offset = (int) $offset;

        $time = time();
        $now = $time - $offset;

        $sel = mysql_query("SELECT ID FROM user WHERE lastlogin >= $now AND ID = $user");
        $user = mysql_fetch_row($sel);

        if (!empty($user))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function modulesearch($id,$value,$limit) {
    
    	if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT * FROM user WHERE ID='$id'";
		else
			$sql = "SELECT * FROM user WHERE ( lower(concat(familyname, ' ' ,firstname)) regexp '$value' OR lower(concat(firstname, ' ' ,familyname)) regexp '$value' OR lower(name) regexp '$value' ) Limit $limit";
		
		$sel = mysql_query($sql);

        $users = array();

        while ($user = mysql_fetch_array($sel)) {
        	$user["name"] 			= stripslashes($user["name"]);
            $user["firstname"] 		= stripslashes($user["firstname"]);
            $user["familyname"] 	= stripslashes($user["familyname"]);
        	$user["address1"] 		= stripslashes($user["address1"]);
            $user["workphone"] 		= $user["workphone"];
            $user["privatephone"] 	= $user["privatephone"];
            $user["mobilephone"] 	= $user["mobilephone"];
            array_push($users, $user);
        }

        if (!empty($users))  {	
            return $users;
        }
        else  {
            return false;
        }

    }
    
    function autocomplete($id,$value) {
    
	    if ($id!='undefined' && $id!='undefined' && $id!= null)
			$sql = "SELECT ID, familyname, firstname FROM user WHERE ID='$id'";
		else
			$sql = "SELECT ID, familyname, firstname FROM user WHERE ( lower(concat(familyname, ' ' ,firstname)) regexp '$value' OR lower(concat(firstname, ' ' ,familyname)) regexp '$value' OR lower(name) regexp '$value' ) Limit 2";

		$result = mysql_query($sql);
	
		if(mysql_num_rows($result)==1) {
		
			$data = mysql_fetch_assoc($result);
			$ID = $data['ID'];
			$user = $data['familyname']." ".$data['firstname'];
		}
	
		$reponse['ID'] = $ID;
		$reponse['user'] = utf8_encode($user);
  
		header('Content-Type: application/json');
		echo json_encode($reponse);

    }
    
	function count() {
    	
        $sel = mysql_query("SELECT count(ID) AS total FROM `user`");
		
        $count = mysql_fetch_array($sel);
        
        if (!empty($count)) {
            return $count['total'];
        } else {
            return 0;
        }
        
    }
    
   	function get_json($sql,$specialities,$langfile,$url) {
   		
		$permission[0] = $langfile["dico_admin_people_user_no_login"];
		$permission[1] = $langfile["dico_admin_people_user_user"];
		$permission[3] = $langfile["dico_admin_people_user_manager"];
		$permission[4] = $langfile["dico_admin_people_user_manager_advanced"];
		$permission[5] = $langfile["dico_admin_people_user_admin"];
   		
		$i = 0;
		$rows = array();
		
        $sel = mysql_query($sql);
        
        while ($user = mysql_fetch_array($sel)) {
        	
        	$rows[$i]['id']=$user[ID];
			$rows[$i]['cell']=array(
				"<a href=\"./".$url."?action=detail&id=".$user[ID]."\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-view-hover.png\" border=\"0\" /></a><a href=\"./".$url."?action=edit&id=".$user[ID]."\" ><img width=\"16\" height=\"16\" src=\"./templates/standard/images/butn-edit-hover.png\" border=\"0\" /></a>",
				$user[name],
			    $user[firstname],
			    $user[familyname],
				$user[address1]." ".$user[zip1]." ".$user[city1],
			    $user[email],
				$permission[$user[admin]],
			    $langfile['dico_admin_people_user_'.$user[type]],
			    utf8_encode($specialities[$user[speciality]]),
			    $user[inami],
			);
			$i++;
        }
        
        if (!empty($rows)) {
            return $rows;
        } else {
            return false;
        }
        
    }

  function getAllTimesheetUsers($lim = 10) {
        $lim = (int) $lim;

        $sel = mysql_query("SELECT COUNT(*) FROM `user` WHERE ID!=0 AND admin > 0");
        $num = mysql_fetch_row($sel);
        $num = $num[0];
        SmartyPaginate::connect();
        // set items per page
        SmartyPaginate::setLimit($lim);
        SmartyPaginate::setTotal($num);

        $start = SmartyPaginate::getCurrentIndex();
        $lim = SmartyPaginate::getLimit();

        $sel2 = mysql_query("SELECT * FROM `user` WHERE ID!=0 AND admin > 0 AND ID IN (select assigned_user_id FROM timesheet) ORDER BY familyname, firstname");

        $users = array();
        while ($user = mysql_fetch_array($sel2))
        {
            $user["name"] = stripslashes($user["name"]);
            $user["familyname"] = stripslashes($user["familyname"]);
            array_push($users, $user);
        }

        if (!empty($users)) {
            return $users;
        } else {
            return false;
        }
    }    
    
}



?>
