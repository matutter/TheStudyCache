<?php
require_once 'classes/mysql.php';
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

class UPLOAD {

	function do_upload($title, $subj,$type,$instr,$class,$descr,$path) {
		$sql = new mysql(); // a copy
		$check = $sql->upload_file($title, $subj,$type,$instr,$class,$descr,$path);
		if($check) {

		header("location: index.php"); //better to return a bool but this makes it simple
		} else return "upload failed...";
	}



} // END CLASS
?>

<a href="/">Back</a>



