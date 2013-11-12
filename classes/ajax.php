<?php
require_once 'includes.php';

if($_POST && isset($_POST['d'])) {
	$op = new Ajax;
	$response = $op->get_path_where_id($_POST['d'], $_COOKIE["username"]);
	$response = $op->drop_upload($_POST['d'], $_COOKIE["username"]);
	
}

class Ajax {
	private $con; // only access from this class and its children and dont need $ anymore

	function __construct() { // constructor function
		$this->con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
			date_default_timezone_set('UTC');
	}


	function get_path_where_id($id,$un) {
		$sql = "SELECT path FROM upload WHERE id = ? AND username = ?";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('ss',$id,$un);
			$try->execute();
			$try->bind_result($path);

			if($try->fetch()) {
				unlink($path);
			}
		}
	}//END FUNCTION

	function drop_upload($del,$un) {
		$sql= "DELETE FROM upload WHERE id = ? AND username = ?";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('ss', $del, $un);
			if($try->execute()) { return true; }
		}
	}//END FUNCTION
}//END CLASS

?>