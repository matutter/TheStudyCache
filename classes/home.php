




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
  echo $row['id'] . "</td><td> " . $row['username'] . "</td><td> " .$row['title'] . "</td><td> " . $row['subject'] . "</td><td> " . $row['type']  . "</td><td> " . $row['instructor'] . "</td><td> " . $row['class'] . "</td><td> " . $row['description'] . "</td><td> " . $row['date']  . "</td><td><a href='" . $row['path'] . "'>Link</a>";
  echo "</td></tr>";
  }

mysqli_close($con);



?>
	</tbody>
</table>
