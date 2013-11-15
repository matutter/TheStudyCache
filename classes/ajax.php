<?php
require_once 'includes.php';

if($_POST && isset($_POST['d'])) {
	$op = new Ajax;
	$response = $op->get_path_where_id($_POST['d'], $_COOKIE["username"]);
	$response = $op->drop_upload($_POST['d'], $_COOKIE["username"]);
}

if($_POST && isset($_POST['up'])) {
	$op = new Ajax;
	$response = $op->up($_POST['up'], $_POST['by']);
}

if($_POST && isset($_POST['down'])) {
	$op = new Ajax;
	$response = $op->down($_POST['down'], $_POST['by']);
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


	function up($pid, $uid) {
		$sql = "SELECT uidUP FROM rating WHERE pid = ? limit 1";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s',$pid);
			$try->execute();
			$try->bind_result($user_ary);

			if($try->fetch()) { 
				$look_for = "/.".$uid."./i";

				if (!preg_match($look_for, $user_ary))
				{
				    //echo "A match was not found.";
				    $try->close();
					//////////////////////////////////////////////////////////////
					$sql = "UPDATE rating SET
					up = up + 1,
					uidUP = REPLACE(uidUP, ?, '.' ),
					uidUP = concat(uidUP, ? ),
					uidDOWN = REPLACE(uidDOWN, ?, '.' )
					WHERE pid = ?";

					$skew = ".".$uid.".";
					$uid = $uid.".";
					if($try = $this->con->prepare($sql)) {
						$try->bind_param('ssss',$skew,$uid,$skew,$pid);
						$try->execute();
					}
					//////////////////////////////////////////////////////////////
				} //END SECOND CON
			} // END FETCH DATA TRY <- security :D
		} // END INITIAL CON
	} // end

	function down($pid, $uid) {
		$sql = "SELECT uidDOWN FROM rating WHERE pid = ? limit 1";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s',$pid);
			$try->execute();
			$try->bind_result($user_ary);

			if($try->fetch()) { 
				$look_for = "/.".$uid."./i";

				if (!preg_match($look_for, $user_ary))
				{
				    //echo "A match was not found.";
				    $try->close();
					//////////////////////////////////////////////////////////////
					$sql = "UPDATE rating SET
					down = down + 1,
					uidDOWN = REPLACE(uidDOWN, ?, '.' ),
					uidDOWN = concat(uidDOWN, ? ),
					uidUP = REPLACE(uidUP, ?, '.' )
					WHERE pid = ?";

					$skew = ".".$uid.".";
					$uid = $uid.".";
					if($try = $this->con->prepare($sql)) {
						$try->bind_param('ssss',$skew,$uid,$skew,$pid);
						$try->execute();
					}
					//////////////////////////////////////////////////////////////
				} //END SECOND CON
			} // END FETCH DATA TRY <- security :D
		} // END INITIAL CON
	} // END FUNCTION

}//END CLASS
?>