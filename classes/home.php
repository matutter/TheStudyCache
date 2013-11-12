<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

$('li.fa-times').click(function D() {
	var k = $(this).attr('id');
	$.ajax({type:"POST",async:true,url:"../classes/ajax.php",data: {d:k}, success: function(){}});
	$(this).parents('tr').fadeOut();
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
		<th>KILL</th>
		<th>UP</th>
		<th>DOWN</th>
	</thead>
	<tbody>

<?php

$con=mysqli_connect("localhost","root","root","sc_main");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM upload");

while($row = mysqli_fetch_array($result))
  {
  echo "<tr> <td>";
  if( $row['username'] == $_COOKIE["username"])
	echo $row['id'] . "</td><td> " . $row['username'] . "</td><td> " .$row['title'] . "</td><td> " . $row['subject'] . "</td><td> " . $row['type']  . "</td><td> " . $row['instructor'] . "</td><td> " . $row['class'] . "</td><td> " . $row['description'] . "</td><td> " . $row['date']  . "</td><td><a href='". "/classes/" . $row['path'] . "'>Link</a> " . "</td><td> " . '<li class="fa fa-times" id="'.$row['id'].'"></li>' . "</td><td> " . '<li class="fa  fa-thumbs-up"> <span class="badge">42</span></li>' . "</td><td> " . '<li class="fa  fa-thumbs-down"> <span class="badge">42</span></li>' ;
	else
		echo $row['id'] . "</td><td> " . $row['username'] . "</td><td> " .$row['title'] . "</td><td> " . $row['subject'] . "</td><td> " . $row['type']  . "</td><td> " . $row['instructor'] . "</td><td> " . $row['class'] . "</td><td> " . $row['description'] . "</td><td> " . $row['date']  . "</td><td><a href='". "/classes/" . $row['path'] . "'>Link</a> " . "</td><td> " . ' '. "</td><td> " . '<li class="fa  fa-thumbs-up"> <span class="badge">42</span></li>' . "</td><td> " . '<li class="fa  fa-thumbs-down"> <span class="badge">42</span></li>' ;
  echo "</td></tr>";
  }

mysqli_close($con);



?>
	</tbody>
</table>
