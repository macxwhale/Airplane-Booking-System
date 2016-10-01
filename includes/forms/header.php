<?php require_once("../sessions.php");?>
<?php require ("../db_connect.php"); ?>
<?php require ("../functions/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<!-- ###################################################################-->
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="../js/ajax.js"></script>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script type="text/javascript" src="jquery/jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery/jquery.timepicker.css" />

  <script type="text/javascript" src="jquery/lib/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery/lib/bootstrap-datepicker.css" />


</head> <!-- End of Head tag-->
<!-- #################################################################################-->
<body ng-app="navigation" ng-controller="mainController"> <!-- opening of bidy tag -->

<nav class="navbar navbar-default"> <!-- opening of navbar navbar-inverse tag -->
  <div class="container-fluid"> <!-- opening of container-fluid-->
  <!-- #################################################################### -->
      <div class="navbar-header"> <!-- opening of navbar-header -->
          <!-- opening of button tag-->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
          </button> <!-- closing of button tag-->
          <a class="navbar-brand" href="#">Logo</a>
      </div> <!-- closing of navbar header-->
<!-- #############################################################################-->
<!-- ################################################################33-->
    <div class="collapse navbar-collapse" id="myNavbar"> <!-- opening of collapse navbar-collapse tag-->
      <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div> <!-- closing of collapse navbar-collapse tag-->
 <!--####################################################################################-->   
  </div> <!-- closing of container-fluid dic tag-->
</nav> <!-- closing of navbar navbar-inverse tag -->
<!-- #########################################################################################-->
<div class="container-fluid"> 