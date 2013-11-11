<?php
session_start();
require_once 'classes/membership.php';
$membership = new MEMBERSHIP;

//if(!isset($_SESSION['status'])) $_SESSION['status'] = "new";

//if user clicks logout then run this
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

//if user enteres pass and name and clicks submit
if(($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) && empty($_POST['REGemail'])) {
//validate!
	$response = $membership->validate_user($_POST['username'],md5($_POST['pwd']));	
}

//if user enteres pass and name and clicks submit
if($_POST && !empty($_POST['REGusername']) && !empty($_POST['REGpwd']) && !empty($_POST['REGemail'])) {
	$response = $membership->validate_new_user($_POST['REGusername'],md5($_POST['REGpwd']),$_POST['REGemail']);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to the StudyCache</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>

<script src="../js/jquery.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/login.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>

</head>

</head>

<body>
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/slide-01.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/slide-02.jpg" alt="">
        </div>
        <div class="item">
          <img src="images/slide-03.jpg" alt="">
        </div>
      </div>
      <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
    </div><!-- /.carousel -->


<div id="login">
		<h2>Login <small>to the StudyCache Project</small></h2>

	<form method="post" action="" role="form" class="form-horizontal">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="pwd" class="form-control" placeholder="Password">
			</div>
		<button type="submit" class="btn btn-success login"><i class="fa fa-sign-in fa-2x btn-"> Login</i></button>
	</form>
		<form class="form-verticle" method="post" action="" role="form">
			<div class="form-group">
				<input type="text" name="REGusername" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="REGpwd" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
				<input type="email" name="REGemail" class="form-control" placeholder="Email">
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-sign-in fa-2x btn-"> Submit</i></button>
		</form>
	<button class="btn btn-danger"><i class="fa fa-times fa-2x btn-"> Cancel</i></button>
	<button class="btn btn-warning slide"><i class="fa fa-pencil fa-2x btn-"> Register</i></button>
	<?php	if(isset($response)  && $_SESSION['status']!='reg-success') 
			{
				echo "<div class='alert alert-danger'>" . $response . "</div>";
			}
			else if(isset($response)  && $_SESSION['status']=='reg-success')
			{
				echo "<div class='alert alert-success'>" . $response . "</div>";
			}

	 ?>

</div><!--end login-->


      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Welcome</h1>
        </div>
        <p class="lead">The StudyCache is an online collection of user uploaded and shared material for easy and useful studying.</p>
        <p>See <a href="https://fossil.cs.sunyit.edu/project/2013_fall___study_cache">our fossil page</a> for project status.</p>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">The StudyTeam <a href="https://www.facebook.com/wiethuechter1">Adam Wiethuechter</a>, <a href="https://www.facebook.com/ben.foster.5836">Ben Foster</a>, <a href="https://www.facebook.com/roman.pendrar"> Roman Pendrar</a>, and <a href="https://www.facebook.com/matutter">Mat Utter</a>.</p>
      </div>
    </div>


</body>
</html>
