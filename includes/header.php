<?php require_once("includes/sessions.php");?>
<!DOCTYPE html>
<html lang="en">
<!-- ###################################################################-->
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link href="css/css.css" rel="stylesheet" /> -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="includes/js/jquery.js"></script>
  <script src="includes/js/ajax.js"></script>
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
<div class="container-fluid">     <!-- opening of container-fluid div tag -->
<!-- #########################################################################################-->
  <div class="row content" >  <!-- opening of div class row content-->
  <!-- #########################################################################################-->
    <div class="col-sm-2 sidenav" >  <!-- opening of class col-sm-2 sidenav-->
      <ul class="nav nav-pills nav-stacked" >
          <li ng-repeat="appNav in appNavs"><a href="{{ appNav.link}} "> {{ appNav.name }}</a></li>    
      </ul>
      
  