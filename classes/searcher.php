
<?php
require_once 'includes.php';
session_start();
if( $_POST && isset($_POST['search']) ) {
	//echo $_POST['search'];
	$res =  find_things_like($_POST['search']);
	echo $res;
}


function get_ratings($pid){

		$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or 
			die('Cannot connect.err0x00');
		$sql = mysqli_query($con, "SELECT * FROM rating WHERE pid = ".$pid." LIMIT 1");
		while($row = mysqli_fetch_array($sql))
		{
			$rating = '<div id="rating-' . $pid . '" >'. ($row['up'] - $row['down']) . '</div>';
			return (string)$rating;
		}
}

function find_things_like($s) {

$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
$result = mysqli_query($con,'SELECT * FROM upload 
	WHERE class LIKE "%'.$s.'%"
	OR type LIKE "%'.$s.'%"
	OR subject LIKE "%'.$s.'%"
	OR instructor LIKE "%'.$s.'%"
	OR description LIKE "%'.$s.'%"
	');

if (!$result) {
    echo "Error: %s\n" . mysqli_error($con) . $s;
}

$res = "";

while($row = mysqli_fetch_array($result))
{
	$res = $res . "<tr> <td>";
	if( $row['username'] == $_SESSION["user"])
	{
		$res = $res .  $row['id'] . "</td>
		<td> " . $row['username'] . "</td>
		<td> " . $row['title'] . "</td>
		<td> " . $row['subject'] . "</td>
		<td> " . $row['type']  . "</td>
		<td> " . $row['instructor'] . "</td>
		<td> " . $row['class'] . "</td>
		<td> " . $row['description'] . "</td>
		<td> " . $row['date']  . "</td>
		<td><a href='#h".$row['id']."'>Link</a> " . "</td>
		<td> " . '<li class="fa fa-times" pid="'.$row['id']. '" id="remove"></li>' . "</td>
		<td> " . '<span class="badge">';

		$res = $res .  get_ratings($row['id']);

		$res = $res . '<li class="fa  fa-thumbs-up" id="up" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			<li class="fa  fa-thumbs-down" id="down" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			</span>';

		

	}
	else
	{
		$res = $res .  $row['id'] . "</td>
		<td> " . $row['username'] . "</td>
		<td> " . $row['title'] . "</td>
		<td> " . $row['subject'] . "</td>
		<td> " . $row['type']  . "</td>
		<td> " . $row['instructor'] . "</td>
		<td> " . $row['class'] . "</td>
		<td> " . $row['description'] . "</td>
		<td> " . $row['date']  . "</td>
		<td><a href='#h".$row['id']."'>Link</a> " . "</td>
		<td> " . ' '. "</td>
		<td> " . '</li><span class="badge">';

			$res = $res .  get_ratings($row['id']);

		$res = $res .  '<li  class="fa  fa-thumbs-up" id="up" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			<li class="fa  fa-thumbs-down" id="down" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			</span>';
	}
	$res = $res .  "</td></tr>";
	}



mysqli_close($con);
echo $res;
}

?>

