<?php     ob_start();
include_once("../config.php");
require_once(CLASSES . 'FwConnection.php');
require_once(FUNCTIONS . 'function.php');
require_once(CLASSES . './my_pagina_class.php');
$DbConnection = new FwConnection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
date_default_timezone_set('America/New_York');    ob_end_clean();
if(!isset($_SESSION["userX"]))
{     ?>	    <script type="text/javascript">                        window.location="index.php";               </script>	 <?php
	//header("location:http://taxiasap.com/taxiApp/web_order/index.php");
	exit();
}
?>

<style>

a:link.extra_name {
    color: #ffff00; text-decoration: none;
} 

	.my_nav ul {
	-webkit-font-smoothing:antialiased;
	
    list-style: none;
    margin: 0;
    padding: 0;
    width: 100%;
}
.my_nav li {
    float: left;
    margin: 0;
    padding: 0;
    position: relative;
    
}
.my_nav a {
    
    
    display: block;
    
   
    text-align: center;
    text-decoration: none;
    -webkit-transition: all .25s ease;
       -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
         -o-transition: all .25s ease;
            transition: all .25s ease;
}
.my_nav .dropdown:after {
    content: ' ▶';
}
.my_nav .dropdown:hover:after{
	content:'\25bc'
}
.my_nav li:hover a {
    
}
.my_nav li ul {
    background: none repeat scroll 0 0 #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    float: left;
    left: 0;
    opacity: 0;
    position: absolute;
    top: 0;
    
    visibility: hidden;
    width: 114px;
    z-index: 1;
    -webkit-transition: all .25s ease;
       -moz-transition: all .25s ease;
        -ms-transition: all .25s ease;
         -o-transition: all .25s ease;
            transition: all .25s ease;
}
.my_nav li:hover ul {
    opacity: 1;
    top: 38px;
    visibility: visible;
}
.my_nav li ul li {
    float: none;
    width: 100%;
}

.my_nav #mainNav1 li ul a{border: medium none;
    display: block;
    float: left;
    padding: 0 10px;
    text-align: left;
    width: 94px;}
.my_nav li ul a:hover {
  
}/* Clearfix */

.cf:after, .cf:before {
    content:"";
    display:table;
}
.cf:after {
    clear:both;
}
.cf {
    zoom:1;
}​
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TAXIASAP :: Web Order</title>
	<!-- CSS -->
	<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />	<link href="style/css/style.css" rel="stylesheet" type="text/css" media="screen" />	<link href="style/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />	 <script src="js/jquery.min.js"></script>		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- <h1> logo imgae</h1> -->
		<div id="containerHolder">			<div class="containerHead">
				<div class="col-md-12 ">				    					<div class="col-md-3 col-sm-12"><img style="" class="logo" src="topbar_logo.png"></div>					<div class="col-md-5 col-sm-12">					<strong><address><?php echo $_SESSION['userXaddress']; ?></address></strong>					<?php if($_SESSION['userXphone']!=""){ ?><p style="padding: 0;"><strong>Phone: </strong><?php echo $_SESSION['userXphone']; ?></p><?php } ?>					</div>										 		
					<div class="col-md-4 logAlign col-sm-12">
						<b class="col-md-8 logAlign col-sm-12" style="padding: 0;  float: left;">Welcome: <?php echo $_SESSION['userXname']; ?>! &nbsp;&nbsp;  </b>
						<a class="col-md-4 logAlign col-sm-12"href="logout.php" <?php echo pageActive('logout.php')?>  style=" background:#9FAF31; color: #FFFFFF; padding: 9px 24px;  width: 130px;  float: left;"><img src="style/img/logout.png" /> LOGOUT</a>
					</div>                     			
				</div>				
			</div>		</div>		<div style="display:none" id="driverdetails" class="driverdetails">					</div>