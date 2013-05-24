<?php
/**
 * Provides methods to interact with users
 *
 * @author Open Dynamics <info@o-dyn.de>
 * @name user
 * @version 0.4.7
 * @package Collabtive
 * @link http://www.o-dyn.de
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License v3 or laterg
 */
class user
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

    function create_calendar_table($insid)
    {
	    //CREATE DATABASE FOR CALENDAR
        $sql1 = "CREATE TABLE `agenda_".$insid."` (
					`ID` int(11) NOT NULL auto_increment,
					`date` date NOT NULL,
  					`midday` varchar(32) NOT NULL,
  					`top` float NOT NULL,
  					`length` float NOT NULL,
  					`size` int(11) NOT NULL,
 					`start` varchar(5) NOT NULL,
  					`end` varchar(5) NOT NULL,
  					`position` int(11) NOT NULL,
  					`brothers` varchar(32) NOT NULL,
  					`number_brothers` int(11) NOT NULL,
  					`color1` varchar(7) NOT NULL,
  					`color2` varchar(7) NOT NULL,
  					`patient` varchar(32) NOT NULL,
  					`patient_ID` int(11) NOT NULL default '0',
  					`motif` varchar(32) NOT NULL,
  					`motif_ID` int(11) NOT NULL default '0',
  					`location` varchar(32) NOT NULL,
  					`comment` varchar(256) NOT NULL,
  					PRIMARY KEY  (`ID`)
					) ENGINE=MyISAM  DEFAULT CHARSET=latin1;";
            $ins1 = mysql_query($sql1);
            
            $sql2 = "CREATE TABLE `schedule_".$insid."` (
					`ID` int(11) NOT NULL,
  					`day` int(11) NOT NULL,
  					`hour` varchar(5) NOT NULL,
  					`color` varchar(6) NOT NULL
					) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
            
            $ins2 = mysql_query($sql2);
            
            for ($i=0; $i<7 ; $i++) {
            	
            	mysql_query("INSERT INTO `schedule_".$insid."` VALUES (1, ".$i.", '00:00', 'C3D9FF')");
            	mysql_query("INSERT INTO `schedule_".$insid."` VALUES (2, ".$i.", '00:10', 'C3D9FF')");
            	mysql_query("INSERT INTO `schedule_".$insid."` VALUES (3, ".$i.", '00:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (4, ".$i.", '00:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (5, ".$i.", '00:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (6, ".$i.", '00:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (7, ".$i.", '01:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (8, ".$i.", '01:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (9, ".$i.", '01:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (10, ".$i.", '01:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (11, ".$i.", '01:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (12, ".$i.", '01:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (13, ".$i.", '02:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (14, ".$i.", '02:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (15, ".$i.", '02:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (16, ".$i.", '02:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (17, ".$i.", '02:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (18, ".$i.", '02:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (19, ".$i.", '03:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (20, ".$i.", '03:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (21, ".$i.", '03:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (22, ".$i.", '03:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (23, ".$i.", '03:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (24, ".$i.", '03:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (25, ".$i.", '04:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (26, ".$i.", '04:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (27, ".$i.", '04:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (28, ".$i.", '04:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (29, ".$i.", '04:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (30, ".$i.", '04:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (31, ".$i.", '05:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (32, ".$i.", '05:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (33, ".$i.", '05:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (34, ".$i.", '05:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (35, ".$i.", '05:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (36, ".$i.", '05:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (37, ".$i.", '06:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (38, ".$i.", '06:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (39, ".$i.", '06:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (40, ".$i.", '06:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (41, ".$i.", '06:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (42, ".$i.", '06:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (43, ".$i.", '07:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (44, ".$i.", '07:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (45, ".$i.", '07:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (46, ".$i.", '07:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (47, ".$i.", '07:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (48, ".$i.", '07:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (49, ".$i.", '08:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (50, ".$i.", '08:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (51, ".$i.", '08:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (52, ".$i.", '08:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (53, ".$i.", '08:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (54, ".$i.", '08:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (55, ".$i.", '09:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (56, ".$i.", '09:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (57, ".$i.", '09:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (58, ".$i.", '09:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (59, ".$i.", '09:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (60, ".$i.", '09:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (61, ".$i.", '10:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (62, ".$i.", '10:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (63, ".$i.", '10:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (64, ".$i.", '10:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (65, ".$i.", '10:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (66, ".$i.", '10:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (67, ".$i.", '11:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (68, ".$i.", '11:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (69, ".$i.", '11:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (70, ".$i.", '11:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (71, ".$i.", '11:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (72, ".$i.", '11:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (73, ".$i.", '12:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (74, ".$i.", '12:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (75, ".$i.", '12:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (76, ".$i.", '12:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (77, ".$i.", '12:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (78, ".$i.", '12:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (79, ".$i.", '13:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (80, ".$i.", '13:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (81, ".$i.", '13:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (82, ".$i.", '13:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (83, ".$i.", '13:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (84, ".$i.", '13:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (85, ".$i.", '14:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (86, ".$i.", '14:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (87, ".$i.", '14:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (88, ".$i.", '14:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (89, ".$i.", '14:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (90, ".$i.", '14:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (91, ".$i.", '15:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (92, ".$i.", '15:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (93, ".$i.", '15:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (94, ".$i.", '15:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (95, ".$i.", '15:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (96, ".$i.", '15:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (97, ".$i.", '16:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (98, ".$i.", '16:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (99, ".$i.", '16:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (100, ".$i.", '16:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (101, ".$i.", '16:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (102, ".$i.", '16:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (103, ".$i.", '17:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (104, ".$i.", '17:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (105, ".$i.", '17:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (106, ".$i.", '17:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (107, ".$i.", '17:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (108, ".$i.", '17:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (109, ".$i.", '18:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (110, ".$i.", '18:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (111, ".$i.", '18:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (112, ".$i.", '18:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (113, ".$i.", '18:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (114, ".$i.", '18:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (115, ".$i.", '19:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (116, ".$i.", '19:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (117, ".$i.", '19:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (118, ".$i.", '19:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (119, ".$i.", '19:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (120, ".$i.", '19:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (121, ".$i.", '20:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (122, ".$i.", '20:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (123, ".$i.", '20:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (124, ".$i.", '20:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (125, ".$i.", '20:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (126, ".$i.", '20:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (127, ".$i.", '21:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (128, ".$i.", '21:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (129, ".$i.", '21:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (130, ".$i.", '21:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (131, ".$i.", '21:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (132, ".$i.", '21:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (133, ".$i.", '22:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (134, ".$i.", '22:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (135, ".$i.", '22:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (136, ".$i.", '22:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (137, ".$i.", '22:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (138, ".$i.", '22:50', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (139, ".$i.", '23:00', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (140, ".$i.", '23:10', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (141, ".$i.", '23:20', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (142, ".$i.", '23:30', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (143, ".$i.", '23:40', 'C3D9FF')");
				mysql_query("INSERT INTO `schedule_".$insid."` VALUES (144, ".$i.", '23:50', 'C3D9FF')");
            }
    }
    
	/**
     * Quick Creates a user y admin
     * 
     * @param string $name Name of the member
     * @param string $email Email Address of the member
     * @param int $company Company ID of the member (unused)
     * @param string $pass Password
     * @param int $admin Adminstate (0=client, 1=normal user, 5 = admin)
     * @param string $locale Localisation
     * @return int $insid ID of the newly created member
     */
    function add($name, $pass, $familyname, $firstname, $admin, $sysloc) {

    	$name = mysql_real_escape_string($name);
        $pass = mysql_real_escape_string($pass);
        $familyname = ucfirst(mysql_real_escape_string($familyname));
        $firstname = ucfirst(mysql_real_escape_string($firstname));
        $locale = mysql_real_escape_string($sysloc);
        $admin = mysql_real_escape_string($admin);
        
        $admin = (int) $admin;
        $pass = sha1($pass);
        
        if ($admin == 0){
	        $sql1 = "INSERT INTO `user` (`name`,`pass`,`admin`,`familyname`,`firstname`, `locale`) VALUES ('','',$admin,'$familyname','$firstname','$locale')";
        } else {
	        $sql1 = "INSERT INTO `user` (`name`,`pass`,`admin`,`familyname`,`firstname`, `locale`) VALUES ('$name','$pass',$admin,'$familyname','$firstname','$locale')";
        }

        $ins1 = mysql_query($sql1);
        
        $insid = mysql_insert_id();
        
        if ($ins1 && $admin != 0){
            $this->create_calendar_table($insid);
            return $insid;
        } else if($ins1) {
            return $insid;
        } else {
            return false;
        }
    }

    /**
     * Submit by user of his own profil
     * 
     * @param string $name Name of the member
     * @param string $email Email Address of the member
     * @param int $company Company ID of the member (unused)
     * @param string $pass Password
     * @param int $admin Adminstate (0=client, 1=normal user, 5 = admin)
     * @param string $locale Localisation
     * @return int $insid ID of the newly created member
     */
    function submit($userid, $name, $locale, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $avatar,$agenda_slotminutes, $agenda_mintime, $agenda_maxtime, $agenda_firsthour, $agenda_sessionminutes)
    {
        $name = mysql_real_escape_string($name);
        $locale = mysql_real_escape_string($locale);
        $firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $birthday = mysql_real_escape_string($birthday);
        $gender = mysql_real_escape_string($gender);
        $email = mysql_real_escape_string($email);
        $web = mysql_real_escape_string($web);
        $company = mysql_real_escape_string($company);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $avatar = mysql_real_escape_string($avatar);
        
        $agenda_slotminutes = mysql_real_escape_string($agenda_slotminutes);
        $agenda_mintime = mysql_real_escape_string($agenda_mintime);
        $agenda_maxtime = mysql_real_escape_string($agenda_maxtime);
        $agenda_firsthour = mysql_real_escape_string($agenda_firsthour);
        $agenda_sessionminutes = mysql_real_escape_string($agenda_sessionminutes);
        
        $tok = strtok($birthday,"/");
		$birthday_day = $tok;
		$tok = strtok("/");
		$birthday_month = $tok;
		$tok = strtok("/");
		$birthday_year = $tok;
		$birthday = $birthday_year."-".$birthday_month."-".$birthday_day;
        
        if ($avatar != "") {
        	$sql = "UPDATE user SET name='$name',locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', avatar='$avatar', agenda_slotminutes='$agenda_slotminutes', agenda_mintime='$agenda_mintime', agenda_maxtime='$agenda_maxtime', agenda_firsthour='$agenda_firsthour', agenda_sessionminutes='$agenda_sessionminutes' WHERE ID = $userid";
            $upd = mysql_query($sql);
        } else {
            $sql = "UPDATE user SET name='$name',locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', agenda_slotminutes='$agenda_slotminutes', agenda_mintime='$agenda_mintime', agenda_maxtime='$agenda_maxtime', agenda_firsthour='$agenda_firsthour', agenda_sessionminutes='$agenda_sessionminutes' WHERE ID = $userid";
            $upd = mysql_query($sql);
        }
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
     /**
     * Creates a user by a manager
     * 
     */
    function manager_add($firstname, $familyname) {
        
    	// only required and unique field
    	$firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        
        $sql = "INSERT INTO `user` (`firstname`, `familyname` ) VALUES ('$firstname', '$familyname')";
        
		$ins = mysql_query($sql);
		
        if ($ins) {
            $insid = mysql_insert_id();
            return $insid;
        } else {
            return false;
        }
        
    }
    
    function manager_submit($id, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax,$type, $speciality, $inami, $agenda_slotminutes,$agenda_mintime,$agenda_maxtime,$agenda_firsthour,$agenda_sessionminutes,$agenda_permission,$assignto)
    {
        $id = (int) $id;
        $firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $birthday = mysql_real_escape_string($birthday);
        $gender = mysql_real_escape_string($gender);
        $email = mysql_real_escape_string($email);
        $web = mysql_real_escape_string($web);
        $company = mysql_real_escape_string($company);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $type = mysql_real_escape_string($type);
        $speciality = mysql_real_escape_string($speciality);
        $inami = mysql_real_escape_string($inami);
        
        $agenda_slotminutes = mysql_real_escape_string($agenda_slotminutes);
        $agenda_mintime = mysql_real_escape_string($agenda_mintime);
        $agenda_maxtime = mysql_real_escape_string($agenda_maxtime);
        $agenda_firsthour = mysql_real_escape_string($agenda_firsthour);
        $agenda_sessionminutes = mysql_real_escape_string($agenda_sessionminutes);
        $agenda_permission = mysql_real_escape_string($agenda_permission);
        $assignto = serialize($assignto);
    	
        $birthday_day = strtok($birthday,"/");
		$birthday_month = strtok("/");
		$birthday_year = strtok("/");
		$birthday = $birthday_year."-".$birthday_month."-".$birthday_day;
        
		$sql = "UPDATE user SET firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax',  type='$type', inami='$inami', speciality='$speciality',agenda_slotminutes='$agenda_slotminutes',agenda_mintime='$agenda_mintime',agenda_maxtime='$agenda_maxtime',agenda_firsthour='$agenda_firsthour',agenda_sessionminutes='$agenda_sessionminutes',agenda_permission='$agenda_permission',default_group ='$assignto' WHERE ID = $id LIMIT 1";
			
		$upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }
    
    function submit_admin($id, $name, $locale, $firstname, $familyname, $birthday, $gender, $email, $web, $company, $address1, $zip1, $city1, $state1, $country1, $workphone, $privatephone, $mobilephone, $fax, $length_consult, $avatar, $admin, $type, $speciality, $inami, $taux_acte, $taux_prothese, $taux_consultation, $comment,$code_analytique,$hourly_cost, $wsr_id, $wsr_refdate) {
        $name = mysql_real_escape_string($name);
        $locale = mysql_real_escape_string($locale);
        $firstname = mysql_real_escape_string($firstname);
        $familyname = mysql_real_escape_string($familyname);
        $birthday = mysql_real_escape_string($birthday);
        $gender = mysql_real_escape_string($gender);
        $email = mysql_real_escape_string($email);
        $web = mysql_real_escape_string($web);
        $company = mysql_real_escape_string($company);
        $address1 = mysql_real_escape_string($address1);
        $zip1 = mysql_real_escape_string($zip1);
        $city1 = mysql_real_escape_string($city1);
        $state1 = mysql_real_escape_string($state1);
        $country1 = mysql_real_escape_string($country1);
        $workphone = mysql_real_escape_string($workphone);
        $privatephone = mysql_real_escape_string($privatephone);
        $mobilephone = mysql_real_escape_string($mobilephone);
        $fax = mysql_real_escape_string($fax);
        $length_consult = mysql_real_escape_string($length_consult);
        $avatar = mysql_real_escape_string($avatar);
        $admin = mysql_real_escape_string($admin);
        $type = mysql_real_escape_string($type);
        $speciality = mysql_real_escape_string($speciality);
        $inami = mysql_real_escape_string($inami);
        $taux_acte = mysql_real_escape_string($taux_acte);
        $taux_prothese = mysql_real_escape_string($taux_prothese);
        $taux_consultation = mysql_real_escape_string($taux_consultation);
        $comment = mysql_real_escape_string($comment);
        $code_analytique = mysql_real_escape_string($code_analytique);
        $hourly_cost = mysql_real_escape_string($hourly_cost);
        
	$wsr_id = mysql_real_escape_string($wsr_id);

		$birthday_day = strtok($birthday,"/");
		$birthday_month = strtok("/");
		$birthday_year = strtok("/");
		$birthday = $birthday_year."-".$birthday_month."-".$birthday_day;

		$wsr_refdate_day = strtok($wsr_refdate,"/");
		$wsr_refdate_month = strtok("/");
		$wsr_refdate_year = strtok("/");
		$wsr_refdate = $wsr_refdate_year."-".$wsr_refdate_month."-".$wsr_refdate_day;

		if ($admin == 0) {
			
    		if ($avatar != "") {
      	 	 	$sql = "UPDATE user SET locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', length_consult='$length_consult', admin='$admin', type='$type', speciality='$speciality', inami='$inami', taux_acte='$taux_acte', taux_prothese='$taux_prothese', taux_consultation='$taux_consultation', comment='$comment', code_analytique='$code_analytique', hourly_cost='$hourly_cost', avatar='$avatar', wsr_id='$wsr_id', wsr_refdate='$wsr_refdate' WHERE ID = $id";
        	} else {
        		$sql = "UPDATE user SET locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', length_consult='$length_consult', admin='$admin', type='$type', speciality='$speciality', inami='$inami', taux_acte='$taux_acte', taux_prothese='$taux_prothese', taux_consultation='$taux_consultation', comment='$comment', code_analytique='$code_analytique', hourly_cost='$hourly_cost', wsr_id='$wsr_id', wsr_refdate='$wsr_refdate' WHERE ID = $id";
        	}
        
         } else {

         	if ($avatar != "") {
	        	$sql = "UPDATE user SET name='$name',locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', length_consult='$length_consult', admin='$admin', type='$type', speciality='$speciality', inami='$inami', taux_acte='$taux_acte', taux_prothese='$taux_prothese', taux_consultation='$taux_consultation', code_analytique='$code_analytique', hourly_cost='$hourly_cost', comment='$comment', avatar='$avatar', wsr_id='$wsr_id', wsr_refdate='$wsr_refdate' WHERE ID = $id";
	        } else {
	        	$sql = "UPDATE user SET name='$name',locale='$locale',firstname='$firstname',familyname='$familyname',birthday='$birthday',gender='$gender',web='$web',email='$email',company='$company',address1='$address1',zip1='$zip1',city1='$city1',state1='$state1', country1='$country1', workphone='$workphone', privatephone='$privatephone', mobilephone='$mobilephone',fax='$fax', length_consult='$length_consult', admin='$admin', type='$type', speciality='$speciality', inami='$inami', taux_acte='$taux_acte', taux_prothese='$taux_prothese', taux_consultation='$taux_consultation', code_analytique='$code_analytique', hourly_cost='$hourly_cost', comment='$comment', wsr_id='$wsr_id', wsr_refdate='$wsr_refdate' WHERE ID = $id";
	        }
	        
        }
        
        echo $sql;

        // Create calendar...if needed
        if ($admin != 0){
        	
        	if(!mysql_num_rows( mysql_query("SHOW TABLES LIKE 'agenda_".$id."'"))) {
				 
        		$this->create_calendar_table($id);
			
        	}
        	
        }
        
        $upd = mysql_query($sql);
        
        if ($upd) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Edits a member
     *
     * @param int $id Member ID
     * @param string $name Member name
     * @param string $email Email
     * @param int $company Company ID of the member (unused)
     * @param string $zip ZIP-Code
     * @param string $gender Gender
     * @param string $url URL
     * @param string $address1 Adressline1
     * @param string $address2 Addressline2
     * @param string $state State
     * @param string $country Country
     * @param string $locale Localisation
     * @param string $avatar Avatar
     * @param int $admin Adminstate (0 = client, 1 = normal user, 5 = admin)
     * @return bool
     */
    function edit($id, $name, $email, $company, $zip, $gender, $url, $address1, $address2, $state, $country,$tags, $locale, $avatar = "", $admin = 1)
    {
        $name = mysql_real_escape_string($name);
        $email = mysql_real_escape_string($email);
        $zip = mysql_real_escape_string($zip);
        $gender = mysql_real_escape_string($gender);
        $url = mysql_real_escape_string($url);
        $address1 = mysql_real_escape_string($address1);
        $address2 = mysql_real_escape_string($address2);
        $state = mysql_real_escape_string($state);
        $country = mysql_real_escape_string($country);
        $locale = mysql_real_escape_string($locale);
        $avatar = mysql_real_escape_string($avatar);
        $id = (int) $id;
        $company = (int) $company;
        $admin = (int)$admin;

        if ($avatar != "")
        {
            $upd = mysql_query("UPDATE user SET name='$name',email='$email',admin=$admin,company='$company',zip='$zip',gender='$gender',url='$url',adress='$address1',adress2='$address2',state='$state',country='$country',tags='$tags',locale='$locale',avatar='$avatar' WHERE ID = $id");
        }
        else
        {
            $upd = mysql_query("UPDATE user SET name='$name',email='$email',admin=$admin,company='$company',zip='$zip',gender='$gender',url='$url',adress='$address1',adress2='$address2',state='$state',country='$country',tags='$tags',locale='$locale' WHERE ID = $id");
        }
        if ($upd)
        {
            $this->mylog->add($name, 'user', 2, 0);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Change a password
     *
     * @param int $id Eindeutige Mitgliedsnummer
     * @param string $oldpass Altes Passwort
     * @param string $newpass Neues Passwort
     * @param string $repeatpass Repetition of the new password
     * @return bool
     */
    function editpass($id, $oldpass, $newpass, $repeatpass)
    {
        $oldpass = mysql_real_escape_string($oldpass);
        $newpass = mysql_real_escape_string($newpass);
        $repeatpass = mysql_real_escape_string($repeatpass);
        $id = (int) $id;

        if ($newpass != $repeatpass)
        {
            return false;
        }
        $id = mysql_real_escape_string($id);
        $newpass = sha1($newpass);
        
        $oldpass = sha1($oldpass);
        $chk = mysql_query("SELECT ID, name FROM user WHERE ID = $id AND pass = '$oldpass'");
        $chk = mysql_fetch_row($chk);
        $chk = $chk[0];
        $name = $chk[1];
        if (!$chk)
        {
            return false;
        }

        $upd = mysql_query("UPDATE user SET pass='$newpass' WHERE ID = $id");
        if ($upd)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Change a password as admin
     *
     * @param int $id User ID
     * @param string $newpass New passwort
     * @param string $repeatpass Repetition of the new password
     * @return bool
     */
    function admin_editpass($id, $newpass) {
        $newpass = mysql_real_escape_string($newpass);
        $id = mysql_real_escape_string($id);
        
        $id = (int) $id;
        $newpass = sha1($newpass);
		
        $sql = "UPDATE user SET pass='$newpass' WHERE ID = $id";
        
        $upd = mysql_query($sql);
        if ($upd) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete a user
     *
     * @param int $id User ID
     * @return bool
     */
    function del($id) {
    	
        $id = (int) $id;

        $del = mysql_query("DELETE FROM user WHERE ID = $id");
        $del2 = mysql_query("DELETE FROM group_assigned WHERE user = $id");
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
    function getProfile($id) {
        
    	$id = (int) mysql_real_escape_string($id);
        $sel = mysql_query("SELECT *, date_format(birthday, '%d/%m/%Y') AS birthdate, date_format(wsr_refdate, '%d/%m/%Y') AS wsr_refdate FROM user WHERE ID = $id");
        $profile = mysql_fetch_array($sel);
        if (!empty($profile))
        {
            if (isset($profile["name"])) {
                $profile["name"] = stripcslashes($profile["name"]);
            }
            if (isset($profile["familyname"])) {
                $profile["familyname"] = stripcslashes($profile["familyname"]);
            }
            if (isset($profile["firstname"]))
            {
                $profile["firstname"] = stripcslashes($profile["firstname"]);
            }
            if (isset($profile["company"]))
            {
                $profile["company"] = stripcslashes($profile["company"]);
            }
            if (isset($profile["address1"]))
            {
                $profile["address1"] = stripcslashes($profile["address1"]);
            }
            if (isset($profile["city1"]))
            {
                $profile["city1"] = stripcslashes($profile["city1"]);
            }
            if (isset($profile["state1"]))
            {
                $profile["state1"] = stripcslashes($profile["state1"]);
            }
            if (isset($profile["country1"]))
            {
                $profile["country1"] = stripcslashes($profile["country1"]);
            }
            if (isset($profile["adress2"]))
            {
                $profile["adress2"] = stripcslashes($profile["adress2"]);
            }
            if (isset($profile["birthdate"]))
            {
                $profile["birthday"] = htmlentities(stripcslashes($profile["birthdate"]));
            }
            if (isset($profile["specialite"])) {
                $profile["speciality"] = stripcslashes($profile["specialite"]);
            }
            if (isset($profile["wsr_refdate"]))
            {
                $profile["wsr_refdate"] = htmlentities(stripcslashes($profile["wsr_refdate"]));
            }
            return $profile;
        }
        else
        {
            return false;
        }
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
