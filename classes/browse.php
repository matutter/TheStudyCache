<?php session_start(); ?>
<script type="text/javascript">

$(document).ready(function(){


$('table').on('click', '#remove',function() {
	var k = $(this).attr('pid'); 
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){ }});
	$(this).parents('tr').fadeOut();
});

$('table').on('click', '#up',function() {
	var pid = $(this).attr('pid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {up:pid}, success: function(res){
		$('#rating-'+pid).replaceWith('<div id="rating-'+pid+'">'+res+'</div>');
	}});
});

$('table').on('click', '#down',function() {
	var pid = $(this).attr('pid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {down:pid}, success: function(res){
		$('#rating-'+pid).replaceWith('<div id="rating-'+pid+'">'+res+'</div>');
	}});
});


function locationHashChanged() {
    var hash = window.location.hash;
    var res = hash.match(/[a-zA-Z]/g);
    if(res=='h') {
      $('li.home').addClass('active').removeClass('disable');
            $('li.home').siblings().removeClass('active').addClass('disable');
              $('div.home').load('../classes/home.php').show().siblings().hide();
	}
    var regex = new RegExp("b.");
    var ext = regex.exec(hash)[0];
	if(ext=='b.') {
      $('li.browse').addClass('active').removeClass('disable');
            $('li.browse').siblings().removeClass('active').addClass('disable');
              $('div.browse').load('../classes/search.php',function(){
              	//$('#default').toggle();
              }).show().siblings().hide();
              
	}
}
window.onhashchange = locationHashChanged;

});

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
	<div id="default">
<?php
require_once 'includes.php';


function get_ratings($pid){

	$score = 0;
	$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or 
		die('Cannot connect.err0x00');

	$sql = mysqli_query($con, "SELECT * FROM rating WHERE pid = ".$pid);
	while($row = mysqli_fetch_array($sql))
	{
		$score = $score + $row['score'];
	}
	return '<div id="rating-'.$pid.'">' . $score . '</div>';
}

$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
$result = mysqli_query($con,"SELECT * FROM upload");

while($row = mysqli_fetch_array($result))
{
	echo	"<tr> <td>" . $row['id'] . "</td>
				<td> " . $row['username'] . "</td>
				<td> " . $row['title'] . "</td>
				<td> " . $row['subject'] . "</td>
				<td> " . $row['type']  . "</td>
				<td> " . $row['instructor'] . "</td>
				<td> " . $row['class'] . "</td>
				<td> " . $row['description'] . "</td>
				<td> " . $row['date']  . "</td>
				<td><a href='#h".$row['id']."'>Link</a> " . "</td>";
	//for owners to delete
	if( $row['username'] == $_SESSION["user"])
		echo "<td> " . '<li class="fa fa-times" pid="'.$row['id']. '" id="remove"></li>' . "</td>";
	else
		echo "<td></td>";

	echo 	'<td> <span class="badge">
				'. get_ratings($row['id']) .' 
				<li class="fa  fa-thumbs-up" id="up" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
				<li class="fa  fa-thumbs-down" id="down" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
				</span>
			</td></tr>';
}

mysqli_close($con);



?>
</div>
	</tbody>
</table>
