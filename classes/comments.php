<?php
require_once 'includes.php';
////////////////////////////////////
//ben + adam + roman

if($_POST && isset($_POST['new_comment'])) {

	$payload = $_POST['new_comment'];
	$data = explode('.', $payload);
	//echo $data[0].$data[1].$data[2];
	$op = new Comments;
	$response = $op->new_comment($data[0],$data[1],$data[2]);

	if($response)
		echo "good";
	else 
		echo "error " . mysql_error() . mysql_errno();
}

if($_POST && isset($_POST['request'])) {

	$op = new Comments;
	$response = $op->populate_comments($_POST['request']);
		
	if(!$response)
		echo "error " . mysql_error() . mysql_errno();
	else
		echo $response;
}

if($_POST && isset($_POST['remove'])) {

	$op = new Comments;
	$response = $op->remove($_POST['remove']);
	if($response)
		echo "ok";
	else echo "bad";

}

class Comments
{
	private $con; // only access from this class and its children and dont need $ anymore

	function __construct() { // constructor function
		$this->con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
	}

	function remove($cid) {
		$sql= "DELETE FROM comments WHERE id = ?";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('s', $cid);
			if($try->execute()) { return true; }
		}
	}//END FUNCTION

	function populate_comments($pid) {
		$sql = "SELECT * FROM comments WHERE pid = ".$pid." ORDER BY time DESC LIMIT 30";
		$result = mysqli_query($this->con,$sql);
		session_start();
		$all_comments = "";
		if($result)
		{
			while($row = mysqli_fetch_array($result))
			{
			$all_comments = $all_comments . '
			<blockquote cid = "'.$row["id"].'" pid = "'.$row["pid"].'" uid = "'.$row['uid'].'" >
	            <div class="row">';

	            if( $row['uid'] == $_SESSION['user'] )
	              $all_comments = $all_comments . '<i id="remove" cid="'.$row["id"].'" class="fa fa-times"></i> ';

	         $all_comments = $all_comments . '<strong>' . $row["uid"] . '</strong><cite> at '. $row["time"] .' </cite>
	            </div>
	            <div class="row each">
	              '.$row["comment"].'
	            </div>
	        </blockquote> 
	        ';
			}
			return $all_comments;
		}
		else
			return false;

	}

	function new_comment($pid, $uid, $comment) {
		$sql =	"INSERT INTO  `comments` 
				(  `pid` ,  `uid` ,  `comment` ) 
				VALUES (?, ?, ?)";

		if($try = $this->con->prepare($sql)) {
			$try->bind_param('sss',$pid,$uid,$comment);
			if($try->execute()) return true;
				else false;
		}
	}// end function
}