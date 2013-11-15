<?php
require_once 'includes.php';

class Mysql {
	private $con; // only access from this class and its children and dont need $ anymore

	function __construct() { // constructor function
		$this->con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
			date_default_timezone_set('UTC');
	}
	// login function
	function verify_user_and_pass($un, $pwd) {
		$sql=	"SELECT *
				FROM users
				WHERE username = ?
				AND password = ?
				limit 1";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('ss',$un,$pwd);
			$try->execute();

			if($try->fetch())
			{
				$try->close();
				return true;
			}
		}
	}//end function
	//register function
	function verify_user_and_pass_and_email($un, $pwd,$email) {
		$sql=	"INSERT INTO users
				(id, username, password, email) VALUES
				(NULL, ?, ?, ?)";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('sss',$un,$pwd,$email);
			if($try->execute()) return true;
			


		}
	}// end function

	function upload_file($title, $subj,$type,$instr,$class,$descr,$path, $un)
	{
		$sql=	"INSERT INTO upload
				(title, subject, type, instructor, class, description, path, id, date, username)
				VALUES (?,?,?,?,?,?,?,NULL,?,?)";

		$now = date("Y/m/d");

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('sssssssss',$title,$subj,$type,$instr,$class,$descr,$path,$now, $un);
			if($try->execute()) {
				return true;
			}
		}
	}// end function

	function new_rating_entry($un, $path) {
		$sql = "SELECT id FROM users WHERE username = ?";
		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s',$un);
			$try->execute();
			$try->bind_result($uid);

			if($try->fetch()) {}
		}
		$try->close();
		$sql = "SELECT id FROM upload WHERE path = ?";
		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s',$path);
			$try->execute();
			$try->bind_result($pid);

			if($try->fetch()) {}
		}
		$try->close();
		$sql=	"INSERT INTO `rating`(uid, pid) VALUES ?,?)";
		if($try = $this->con->prepare($sql)) {
			$try->bind_param("ss",$uid,$pid);
			if($try->execute()){}

		}

	}


}//end mysql class
