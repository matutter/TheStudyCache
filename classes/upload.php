<div class="col-md-6 panel-upload">

	<form method="post" enctype="multipart/form-data"  action="upload.php">
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