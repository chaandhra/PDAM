<?php

  require_once("session.php");
  
  require_once("model/class.user.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Panel</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBcPRIQDyR1TGrQg38r20Gm9Boupot4NwU"></script>

<script type="text/javascript" src="jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<link rel="shortcut icon" href="../image/bpbd.png"/>
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="bootstrap/js/jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/styles.css" type="text/css"  />
<script src="bootstrap/js/bootstrap.min.js"></script>


</head>

<body>

<!-- <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
        	<a class="navbar-brand" href="home">Home</a>
            <a class="navbar-brand" href="kecamatan">Kecamatan</a>
            <a class="navbar-brand" href="blok">Blok</a>
            <a class="navbar-brand" href="pelanggan">Pelanggan</a>
             <a class="navbar-brand" href="userlist">Checker</a>
           
           
        </div>
 		<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
  
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
       </div>
 		
    </div>
</div>  -->


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home">Panel Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="kecamatan"><span class="glyphicon glyphicon-list"></span> Kecamatan </a></li>
          <li><a href="blok"><span class="glyphicon glyphicon-tasks"></span> Blok</a></li>
          <li><a href="pelanggan"><span class="glyphicon glyphicon-user"></span> Pelanggan</a></li>
            <li><a href="userlist"><span class="glyphicon glyphicon-user"></span> Checker</a></li>
            
           </ul>
          <ul class="nav navbar-nav navbar-right">
            


            
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>

