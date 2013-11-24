<?php
require 'mysql.php';

if($_POST && isset($_POST['login']))
{
	$s = explode("*",$_POST['login']);
	$un = $s[1];    
	$pwd = md5($s[3]);

	if($un == "" || $pwd == md5("")) {
		$res['message'] = "Please enter a valid username.";
	}
	else
	{
		$op = new MEMBERSHIP;
		$response = $op->validate_user($un,$pwd);
		if($response) {
			$res['message'] = "Login Success.";
			$res['validate'] = "auth";
		}
		else{
			$res['message'] = "No such username or password found.";
		}
	}
		echo json_encode($res);
}
else if($_POST && isset($_POST['register']))
{	// parsing the serialized form data without regex 
	// validates email and password
	// then makes query and checks results
	$s = str_replace("username="," ", $_POST['register']);
	$s = str_replace("&pwd="," ", $s);
	$s = str_replace("&email="," ", $s);
	$s = str_replace("%40","@", $s);
	$s = explode(" ",$s);
	$un = $s[1];
	$pwd = md5($s[2]);
	$email = $s[3];

	if ( filter_var($email, FILTER_VALIDATE_EMAIL) && $pwd != "d41d8cd98f00b204e9800998ecf8427e")
	{
		$op = new MEMBERSHIP;
		$response = $op->validate_new_user($un,$pwd,$email);
		if($response){
			$res['bool'] = "true";
			$res['message'] = "Success, you may now login!";
		}
		else {
			$res['bool'] = "false";
			$res['message'] = "Username or Email already exists";
		}
	}
	else
		$res['message'] = "Please complete form.";
	echo json_encode($res);
}

class MEMBERSHIP {

	function validate_user($un, $pwd) {
		$sql = new mysql(); // copy of required class
		$check = $sql->verify_user_and_pass($un,$pwd);

		if($check) {
		session_start();
		$_SESSION['status'] = 'auth';
		$_SESSION['user']	= $un;
		return true; 
		} else return false;
	}

	function validate_new_user($un, $pwd, $email) {
		$sql = new mysql(); // copy of required class
		$check = $sql->verify_user_and_pass_and_email($un,$pwd,$email);
		//$check = $sql->verify_user_and_pass($un,md5($pwd));
		if($check) {
		$_SESSION['status'] = 'reg-success';
		//header("location: index.php"); //better to return a bool but this makes it simple
		return true;
		} else return false;
	}

	//invalidate user
	function log_User_Out() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			unset($_SESSION['username']);
			
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