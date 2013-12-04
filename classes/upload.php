<?php
require_once 'uploader.php';

?>

<script type="text/javascript">	
	$('input.form-control').attr('maxlength',35);
</script>


<div class="col-md-6 panel-upload">

	<form method="post" enctype="multipart/form-data"  action="../classes/upload.php">
		<div class="row-fix">
	    	<input type="file" name="file" id="file"/>

			<ul id="image-list"></ul>
		</div>
		
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Title</span>
			<input type="text" class="form-control" name="title" value="none">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Subject</span>
			<input type="text" class="form-control" name="subject"value="none">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Type</span>
			<input type="text" class="form-control" name="type"value="none">
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon">Instructor</span>
			<input type="text" class="form-control" name="instructor"value="none">
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
		<input type="text" class="form-control" name="class"value="none">
		</div><!-- /input-group -->

			<textarea id="discription" class="form-control input-large" name="description" placeholder="Discription"></textarea>
			<div class="text-center">
				<button type="submit" id="btn" class="btn btn-primary btn-upload"> Begin Upload </button>
				<div id="response" class="response"></div>
			</div>
	</form>
</div>