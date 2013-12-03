<?php
require_once 'mysql.php';

$upload = new UPLOAD;


if($_POST && $_FILES["file"]["error"] == 0 && !empty($_POST['title']) && !empty($_POST['subject']) && !empty($_POST['type']) && !empty($_POST['instructor']) && !empty($_POST['class']) && !empty($_POST['description']))
{
	session_start();
	$target = "uploads/" . rand(0, 5000) .$_FILES['file']['name'];
	$upload -> do_upload(
				$_POST['title'], $_POST['subject'],
				$_POST['type'], $_POST['instructor'],
				$_POST['class'], $_POST['description'], $target, $_SESSION["user"] );

	$try = move_uploaded_file( $_FILES["file"]["tmp_name"], $target );
	if($try)
		header("location: upload_redirect.php" );
}
else if($_POST)
{
	header("location: upload_redirect_fail.php" );
}



class UPLOAD {
	function do_upload($title, $subj,$type,$instr,$class,$descr,$path, $un) {
		$sql = new mysql(); // a copy
		$check = $sql->upload_file($title, $subj,$type,$instr,$class,$descr,$path, $un);
		if($check)
		{

			
		}
	}
}
?>




