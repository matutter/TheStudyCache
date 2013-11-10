<?php
require_once 'uploader.php';
$upload = new UPLOAD;


if($_POST && $_FILES["file"]["error"] == 0 && !empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['type']) && !empty($_POST['instructor']) && !empty($_POST['class']) && !empty($_POST['description']))
{
	$target = "uploads/" . time() .$_FILES['file']['name'];
	$upload -> do_upload(
				$_POST['title'], $_POST['subject'],
				$_POST['type'], $_POST['instructor'],
				$_POST['class'], $_POST['description'], $target);

	move_uploaded_file( $_FILES["file"]["tmp_name"], $target );
}
else if($_POST)
{
	header("location: upload_redirect_fail.php" );
}
?>


<div class="col-md-6 panel-upload">

	<form method="post" enctype="multipart/form-data"  action="../classes/upload.php">
		<div class="row-fix">
	    	<input type="file" name="file" id="file"/>

			<ul id="image-list"></ul>
		</div>
		
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Subject</span>
			<input type="text" class="form-control" name="subject">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Type</span>
			<input type="text" class="form-control" name="type">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Instructor</span>
			<input type="text" class="form-control" name="instructor">
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
		<input type="text" class="form-control" name="class">
		</div><!-- /input-group -->

			<textarea id="discription" class="form-control input-large" name="description" placeholder="Discription"></textarea>
			<div class="text-center">
				<button type="submit" id="btn" class="btn btn-primary btn-upload"> Begin Upload </button>
				<div id="response" class="response"></div>
			</div>
	</form>
</div>