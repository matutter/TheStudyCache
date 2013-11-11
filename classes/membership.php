<?php

require 'mysql.php';

class MEMBERSHIP {

	function validate_user($un, $pwd) {
		$sql = new mysql(); // copy of required class
		$check = $sql->verify_user_and_pass($un,$pwd);
		//$check = $sql->verify_user_and_pass($un,md5($pwd));
		if($check) {
		$_SESSION['status'] = 'auth';
		$_SESSION['user']	= $un;
		header('location: index.php' ); //better to return a bool but this makes it simple
		//echo "<script> window.location.reload(); </script"; 
		} else return "No such user and password found.";
	}

	function validate_new_user($un, $pwd, $email) {
		$sql = new mysql(); // copy of required class
		$check = $sql->verify_user_and_pass_and_email($un,$pwd,$email);
		//$check = $sql->verify_user_and_pass($un,md5($pwd));
		if($check) {
		$_SESSION['status'] = 'reg-success';
		//header("location: index.php"); //better to return a bool but this makes it simple
		return "Registration Succesful.";
		} else return "Username or Email already exists.";
	}

	//invalidate user
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
	}

	//confirm a logged in user for each page
	function confirm() {
		session_start();
		if($_SESSION['status'] != 'auth') header("location: login.php");
	}

}






