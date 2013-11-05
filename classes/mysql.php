<?php
require_once 'includes.php';

class Mysql {
	private $con; // only access from this class and its children and dont need $ anymore

	function __construct() { // constructor function
		$this->con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
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
	}
}//end class
