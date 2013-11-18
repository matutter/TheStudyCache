<?php
require_once 'includes.php';

if($_POST && isset($_POST['d'])) {
	$op = new Ajax;
	$response = $op->delete_path_where_id($_POST['d'], $_COOKIE["username"]);
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

if($_POST && isset($_POST['dv'])) {
	$op = new Ajax;
	$response = $op->doc_view_where_id($_POST['dv']);
}

if($_POST && isset($_POST['find'])) {
	$op = new Ajax;
	$response = $op->latest_post($_POST['find']);
}

class Ajax {
	private $con; // only access from this class and its children and dont need $ anymore

	function __construct() { // constructor function
		$this->con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
			date_default_timezone_set('UTC');
	}

	function doc_view_where_id($pid) {
		$sql = "SELECT subject, class, type, title, username, path, date, instructor, description FROM upload WHERE id = ?";
		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s',$pid);
			$try->execute();
			$try->store_result();
			$try->bind_result($row1,$row2,$row3,$row4,$row5,$row6,$row7,$row8,$row9);
		}
		if($try->fetch()) {
			$row6 = str_replace('\\','/',$row6);
			$row6 = str_replace(' ','%20',$row6);
			$res['sbj'] = $row1;
			$res['cls'] = $row2;
			$res['typ'] = $row3;
			$res['ttl'] = $row4;
			$res['user'] = $row5;
			$res['path'] = $row6;
			$res['summary'] = '

        <div class="col-md-5">
          <ul class="list-group">
            <li class="list-group-item"><strong>'.$row4.'</strong><cite> posted '.$row7.' </cite> </li>
            <li class="list-group-item">Instructor: '.$row8.'</li>
            <li class="list-group-item">Class: '.$row2.'</li>
            <li class="list-group-item">Subject: '.$row1.'</li>
            <li class="list-group-item"><a download href="classes/'.$row6.'"><i class="fa fa-save"></i><strong> Download</strong></a></li>
          </ul>
        </div>
        <div class="col-md-7 dv-r-col">
          <li class="fa fa-quote-left"></li>
          	'.$row9.'
          <li class="fa fa-quote-right"></li>
        </div>';
			echo json_encode($res);
		}
	}

	function latest_post(){
		if(isset($_POST['pid'])) {
			echo $_POST['pid'];
		} 
		else {
			$sql = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";

			if($try = $this->con->prepare($sql)) {
				$try->execute();
				$try->bind_result($pid);

				if($try->fetch()) {
					echo $pid;
				} //end fetch
			} // end try
		} // end else
	} // end function
	

	function delete_path_where_id($id,$un) {
		$sql = "SELECT * FROM upload WHERE id = ? AND username = ?";

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