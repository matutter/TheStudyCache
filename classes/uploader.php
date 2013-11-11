<?php
require_once 'mysql.php';

class UPLOAD {
	function do_upload($title, $subj,$type,$instr,$class,$descr,$path) {
		$sql = new mysql(); // a copy
		$check = $sql->upload_file($title, $subj,$type,$instr,$class,$descr,$path);
		if($check)
		{

			header("location: upload_redirect.php" );
		}
	}
}
?>




