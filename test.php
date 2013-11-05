<?php
require_once 'classes/membership.php';
$membership = new MEMBERSHIP();
$membership->confirm();

?>


<!-- Hey its ADam making my first change!-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css">
<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/main.css"/>
<!--[if 1t IE 7]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.7a-min.js">
<![endif]-->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="js/main.js"></script>

<title>The Study Team</title>
<!-- main blue to use #00A1E2 -->
</head>

<body>
<div class="container main">
    <div class="row">
        <div class="navbar-right">
            <a type="button" class="btn" href="#debug"> Debug </a> <a type="button" class="btn btn-default" href="login.php?status=loggedout"><i class="fa fa-sign-out">Logout</i></a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading head-top">
            <!-- first 1/3 -->
            <div class="col-md-2 head-left">
                <h2 class="panel-title"><b>The<a href="#">StudyCache</a></b></h2>
            </div>
            <!-- middle 2/3 -->
            <div class="col-md-4">
                <ul class="nav nav-tabs">
                    <li class="home active"><a href="#home">Home</a></li>
                    <li class="profile disable"><a href="#profile">Profile</a></li>
                    <li class="workbook disable"><a href="#workbook">WorkBook</a></li>
                    <li class="upload disable"><a href="#upload">Upload</a></li>
                </ul>
            </div>
            <!-- last 3/3 -->
            <div class="col-md-6">
                <div class="input-group search">
                    <input type="text" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-primary"><div class="fa fa-search"></div> Search</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                            <span class="fa fa-toggle-down search-span"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a><strong>Major</strong></a></li>
                        <li class="divider"></li>
                            <li><a href="#">Computer Science</a></li>
                            <li><a href="#">Phsycology</a></li>
                        <li class="divider"></li>
                            <li><a href="#"><div class="fa fa-search-plus"></div> Advnaced Search</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <div class="panel-body">

        <div class="home">
            <?php include "classes/home_loader.php"; ?>
        </div>

        <div class="profile">
            <?php include "classes/profile_loader.php"; ?>
        </div>

        <div class="workbook">
            <?php include "classes/workbook_loader.php"; ?>
        </div>

        <div class="upload">
            <?php include "classes/upload_loader.php"; ?>
        </div>

    </div>
</div>
<div class="container">
    <div class="col-md-6">
        <div class="media">
            <a class="pull-left" href="#">
                <img src="../images/logo_s.png" alt="StudyTeam" class="img-circle">
            </a>
            <div class="media-body">
                <h4 class="media-heading">About Us</h4>
                <p class="lead">The StudyCache is an online collection of user uploaded and shared material for easy and useful studying.</p>
                <p>See <a href="https://fossil.cs.sunyit.edu/project/2013_fall___study_cache">our fossil page</a> for project status.</p>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
