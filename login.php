<?php
session_start();
require_once 'classes/membership.php';
$membership = new MEMBERSHIP;

if(!isset($_SESSION['status'])) $_SESSION['status'] = "new";

//if user clicks logout then run this
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to the StudyCache</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>

<script src="../js/jquery.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/login.js"></script>

<div class="login">

  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default" id="login">
      <div class="panel-heading">
        <img class="img-responsive" src="../images/tinybannerw.jpg">
      </div>

      <div class="panel-body">
        <form id="login" role="form">
          <div class="form-group">
            <input type="text" id="login" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" id="login" name="pwd" class="form-control" placeholder="Password">
          </div>
        </form>
        <button class="btn btn-success" id="login"><i class="fa fa-sign-in"></i> Login</button>
        <a type="button" class="btn " id="show-reg-form"> or Register</a>
        <span id="login-response"></span>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-md-offset-4" id="register">
    <div class="panel panel-default">
      <div class="panel-heading"></div>
         <img class="img-responsive" src="../images/tinybannerw.jpg">
      <div class="panel-body">
        <form id="register" role="form">
          <div class="form-group">
            <input type="text" id="register" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" id="register" name="pwd" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="email" id="register" name="email" class="form-control" placeholder="Email">
          </div>
        </form>
        <button class="btn btn-success" id="register"><i class="fa fa-bookmark-o"></i> Register</button>
        <button class="btn btn-danger" id="show-login-form"><i class="fa fa-times"></i> Cancel</button>
        <span id="register-response"></span>
      </div>
    </div>
  </div>

</div>
<!--end login-->

<!-- Begin page content -->
<div class="container">
  <div class="page-header">
    <h1>Welcome</h1>
  </div>
  <p class="lead">The StudyCache is an online collection of user uploaded and shared material for easy and useful studying.</p>
  <p>Find us <a href="https://github.com/matutter/TheStudyCache"> <i class="fa fa-github"></i> on GitHub</a> for project status.</p>
</div>
<div id="footer">
  <div class="container">
    <p class="text-muted credit">The StudyTeam <a href="https://www.facebook.com/wiethuechter1">Adam Wiethuechter</a>, <a href="https://www.facebook.com/ben.foster.5836">Ben Foster</a>, <a href="https://www.facebook.com/roman.pendrar"> Roman Pendrar</a>, and <a href="https://www.facebook.com/matutter">Mat Utter</a>.</p>
  </div>
</div>

</body>
</html>