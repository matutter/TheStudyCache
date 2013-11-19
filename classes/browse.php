<script>

$('li.fa-times').click(function D() {
	var k = $(this).attr('id');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){}});
	$(this).parents('tr').fadeOut();
});

$('li.fa-thumbs-up').click(function up() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {up:pid, by:uid}, success: function(){}});
});

$('li.fa-thumbs-down').click(function down() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {down:pid, by:uid}, success: function(){}});
});


function locationHashChanged() {
    var hash = window.location.hash;
    var res = hash.match(/[a-zA-Z]/g);

    if(res=='h') {
      $('li.home').addClass('active').removeClass('disable');
            $('li.home').siblings().removeClass('active').addClass('disable');
              $('div.home').load('../classes/home.php').show().siblings().hide();
	}
}
window.onhashchange = locationHashChanged;



</script>


<table class="table table-striped">
	<thead> 
		<th>#</th>
		<th>Username</th>
		<th>Title</th>
		<th>Subject</th>
		<th>Type</th>
		<th>Instructor</th>
		<th>Class</th>
		<th>Description</th>
		<th>Date</th>
		<th>Link</th>
		<th>Destroy</th>
		<th>Rate</th>

	</thead>
	<tbody>

<?php
require_once 'includes.php';

function get_ratings($pid){

		$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or 
			die('Cannot connect.err0x00');
		$sql = mysqli_query($con, "SELECT * FROM rating WHERE pid = ".$pid." LIMIT 30");
		while($row = mysqli_fetch_array($sql))
		{
			echo ($row['up'] - $row['down']);
		}
}

$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
$result = mysqli_query($con,"SELECT * FROM upload");

while($row = mysqli_fetch_array($result))
{
	echo "<tr> <td>";
	if( $row['username'] == $_COOKIE["username"])
	{
		echo $row['id'] . "</td>
		<td> " . $row['username'] . "</td>
		<td> " . $row['title'] . "</td>
		<td> " . $row['subject'] . "</td>
		<td> " . $row['type']  . "</td>
		<td> " . $row['instructor'] . "</td>
		<td> " . $row['class'] . "</td>
		<td> " . $row['description'] . "</td>
		<td> " . $row['date']  . "</td>
		<td><a href='#h".$row['id']."'>Link</a> " . "</td>
		<td> " . '<li class="fa fa-times" id="'.$row['id'].'"></li>' . "</td>
		<td> " . '<span class="badge"><li class="fa  fa-thumbs-up" pid="'.$row['id'].'" uid="'.$_COOKIE["username"].'"></li>
			<li class="fa  fa-thumbs-down" pid="'.$row['id'].'" uid="'.$_COOKIE["username"].'"></li>
			';

		get_ratings($row['id']);

		echo '</span>';
	}
	else
	{
		echo $row['id'] . "</td>
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
		<td> " . '</li><span class="badge"><li class="fa  fa-thumbs-up" pid="'.$row['id'].'" uid="'.$_COOKIE["username"].'"></li>
			<li class="fa  fa-thumbs-down" pid="'.$row['id'].'" uid="'.$_COOKIE["username"].'"></li>
			';

			get_ratings($row['id']);

		echo '</span>';
	}
	echo "</td></tr>";
	}

mysqli_close($con);



?>
	</tbody>
</table>
