<?php session_start(); ?>
<script>

$(document).ready(function(){


/*
  //since these icos were added by a post processor we have to use a delegated function to find it
  $('.row').on('click', '#remove',function(){
    var cid = $(this).attr('cid');
    $(this).parent().parent().fadeOut();
    $.ajax({ type: "POST", async:true, url: "../classes/comments.php", data: {remove:cid},
      success: function(response){
        if(response!="ok")
          alert("Err:C-0-0-0");
      }
    });
  });

/////////////// works with browse click not search for deletes
$('li.fa-times').click(function D() {
	var k = $(this).attr('pid'); 
	alert("you click it "+k);
	//$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){}});
	$(this).parents('tr').fadeOut();
});

*/


$('table').on('click', '#remove',function d() {
	var k = $(this).attr('pid'); 
	//alert("you click " + k);
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){ }});
	$(this).parents('tr').fadeOut();
});

$('li.fa-thumbs-up').click(function up() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {up:pid, by:uid}, success: function(res){
		$('#rating-'+pid).replaceWith('<div id="rating-'+pid+'">'+res+'</div>');
	}});
});

$('li.fa-thumbs-down').click(function down() {
	var pid = $(this).attr('pid');
	var uid = $(this).attr('uid');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {down:pid, by:uid}, success: function(res){
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

		$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or 
			die('Cannot connect.err0x00');
		$sql = mysqli_query($con, "SELECT * FROM rating WHERE pid = ".$pid." LIMIT 30");
		while($row = mysqli_fetch_array($sql))
		{
			echo '<div id="rating-' . $pid . '" >'. ($row['up'] - $row['down']) . '</div>';
		}
}

$con = new mysqli(DB,DB_USER,DB_PASS,DB_NAME) or
			die('Cannot connect.err0x00');
$result = mysqli_query($con,"SELECT * FROM upload");

while($row = mysqli_fetch_array($result))
{
	echo "<tr> <td>";
	if( $row['username'] == $_SESSION["user"])
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
		<td> " . '<li class="fa fa-times" pid="'.$row['id']. '" id="remove"></li>' . "</td>
		<td> " . '<span class="badge">';

				get_ratings($row['id']);

		echo '<li class="fa  fa-thumbs-up" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			<li class="fa  fa-thumbs-down" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			</span>';

		

		
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
		<td> " . '</li><span class="badge">';


get_ratings($row['id']);

		echo '<li class="fa  fa-thumbs-up" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			<li class="fa  fa-thumbs-down" pid="'.$row['id'].'" uid="'.$_SESSION["user"].'"></li>
			</span>';

			


	}
	echo "</td></tr>";
	}

mysqli_close($con);



?>
</div>
	</tbody>
</table>
