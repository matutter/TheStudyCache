<?php 
//require_once $_SERVER["DOCUMENT_ROOT"].'/classes/mysql.php'; 
//
//
//if($_POST && !empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['type']) && !empty($_POST['instructor']) && !empty($_POST['class']) && !empty($_POST['description']))
//{
//	$upload = new UPLOAD; // since you can make multiple upload attempt each is a new class
//	// target is the path to the file, actual file names dont matter
//	$target = $_SERVER["DOCUMENT_ROOT"].'uploads/'. $_FILES["file"]["name"]; 
//	$response = $UPLOAD->upload_file($_POST['title'], $_POST['subject'], $_POST['type'], $_POST['instructor'], $_POST['class'], $_POST['description'], $target);	
//}
//
?> 

<script src="../js/upload.js"></script>

<div class="col-md-6 panel-upload">

	<form method="post" enctype="multipart/form-data"  action="upload.php">
		<div class="row-fix">
	    	<input type="file" name="images" id="images" multiple />

			<ul id="image-list"></ul>
		</div>
		
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" placeholder="">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Subject</span>
			<input type="text" class="form-control" placeholder="">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Type</span>
			<input type="text" class="form-control" placeholder="">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Instructor</span>
			<input type="text" class="form-control" placeholder="">
		</div>
		<div class="input-group input-group-lg">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Class <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
				</ul>
			</div><!-- /btn-group -->
		<input type="text" class="form-control">
		</div><!-- /input-group -->

			<textarea id="discription" class="form-control input-large" name="discription" placeholder="Discription"></textarea>
			<div class="text-center">
				<button type="submit" id="btn" class="btn btn-primary btn-upload"> Begin Upload </button>
				<div id="response"></div>
			</div>
	</form>
</div>