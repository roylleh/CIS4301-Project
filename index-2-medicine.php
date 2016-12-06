#!/usr/local/bin/php

<?php
include 'config.php';

session_start();
if( !isset($_SESSION['username']) )
{
	header('Location: index-5-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Le'Grasse Medical</title>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/ui.totop.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/scrool2.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/easyTooltip.js"></script>
    <script type="text/javascript" src="js/FF-cash.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.jscrollpane.min.js"></script>
    <script>
    	$(function(){
			$(".social a").easyTooltip();
		})
		$(window).load(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
		})
    </script>
	<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<!--==============================header=================================-->
<div class="block1">
	<div class="main">
    	<header>
            <h1><a class="logo" href="index.php">Le'grasse</a>
            	<span>voted america's silliest health insurance company name 1999-2017</span>
            </h1>
            </br>
            <?php
			if( isset($_SESSION['username']) )
			{
				echo "Welcome, <a target='_blank' href='index-4-profile.php'>" . $_SESSION['username'] . "</a>";
				echo "</br>";
				echo "<a href='index-6-logout.php'>Logout</a>";
			}
            ?>
            <nav>
                <ul class="sf-menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="index-1-plan.php">plan info</a></li>
                    <li class="current"><a href="index-2-medicine.php">medicine</a></li>
                    <li><a href="index-3-calendar.php">calendar</a></li>
                    <li><a href="index-4-profile.php">profile</a></li>
                </ul>
                <div class="clear"></div>
            </nav>
        </header>	
    </div>
</div>	
<div class="block2 bg_fff">
    <!--==============================content================================-->
    <div class="main">
        <section id="content">
            <div class="container_24">
                <div class="wrapper indent1">
                    <article class="grid_24">
                    	<center>
                        	<h2>prescription</h2>

<?php
echo "<br><br>";
$username = $_SESSION['username'];

$medicine = oci_parse( $oracle_conn, "SELECT name, price, startdate, refills FROM prescriptions WHERE userid = (SELECT userid FROM users WHERE username = '$username')" );
oci_execute($medicine);

while( ($row = oci_fetch_row($medicine)) != false )
{
	//Prescription information.
	$name = $row[0];
	$price = $row[1];
	$startdate = $row[2];
	$refills = $row[3];
	
	echo "<strong>Name: </strong><a target='_blank' href='https://encrypted.google.com/#q=$name'>" . $name . "</a><br>";
	echo "<strong>Price: </strong>$" . $price . "<br>";
	echo "<strong>Start Date: </strong>" . $startdate . "<br>";
	echo "<strong>Refills Remaining: </strong>" . $refills . "<br>";
	echo "<br>";
	
	
	
	//Average doctor information.
	$select = oci_parse( $oracle_conn, "
	SELECT AVG(price)
	FROM prescriptions
	INNER JOIN users
	ON prescriptions.userid = users.userid
	INNER JOIN doctors
	ON users.doctorid = doctors.doctorid
	WHERE doctors.name = ( SELECT name FROM doctors WHERE doctorid = (SELECT doctorid FROM users WHERE username = '$username') )
	AND prescriptions.name = '$name'
	" );
	oci_execute($select);
	
	$array = oci_fetch_array($select);
	oci_free_statement($select);
	
	$avg_price = $array[0];
	
	if( $price <= $avg_price ) echo "<span style='color:#006600'>";
	else echo "<span style='color:#FF0000'>";
	echo "Your doctor's average price is $" . round($avg_price, 2) . "</span><br>";
	
	
	
	//Average provider information.
	$select = oci_parse( $oracle_conn, "
	SELECT AVG(price)
	FROM prescriptions
	INNER JOIN users
	ON prescriptions.userid = users.userid
	INNER JOIN insurance
	ON users.userid = insurance.userid
	WHERE insurance.company = ( SELECT company FROM insurance WHERE userid = (SELECT userid FROM users WHERE username = '$username') )
	AND prescriptions.name = '$name'
	" );
	oci_execute($select);
	
	$array = oci_fetch_array($select);
	oci_free_statement($select);
	
	$avg_price = $array[0];
	
	if( $price <= $avg_price ) echo "<span style='color:#006600'>";
	else echo "<span style='color:#FF0000'>";
	echo "Your provider's average price is $" . round($avg_price, 2) . "</span><br>";
	
	
	
	//Average network information.
	$select = oci_parse( $oracle_conn, "SELECT AVG(price) FROM prescriptions WHERE name = '$name'" );
	oci_execute($select);
	
	$array = oci_fetch_array($select);
	oci_free_statement($select);
	
	$avg_price = $array[0];
	
	if( $price <= $avg_price ) echo "<span style='color:#006600'>";
	else echo "<span style='color:#FF0000'>";
	echo "The network's average price is $" . round($avg_price, 2) . "</span><br>";
	
	
	echo "<br><br>";
}

if( empty($name) ) echo "<span style='color:#FF0000'>You have no prescriptions at the moment.</span>";
oci_free_statement($medicine);


oci_close($oracle_conn);
?>

                        </center>
                    </article>
                </div>
            </div>
        </section>
    </div>
</div>
<!--==============================footer=================================-->
<div class="block3">
	<div class="main">
        <footer>
        	<div class="container_24">
            	<div class="wrapper" style="visibility: hidden;">
                	<article class="grid_9">
                    	<h4>our products</h4>
                        <div class="wrapper">
                        	<div class="grid_4 alpha">
                            	<ul class="list1">
                                    <li><a href="#">Bedroom</a></li>
                                    <li><a href="#">Dining Room</a></li>
                                    <li><a href="#">Living Room</a></li>
                                    <li><a href="#">Home Entertainment</a></li>                                
                                </ul>
                            </div>
                          <div class="grid_4 prefix_1 omega">
                          		<ul class="list1">
                                    <li><a href="#">Office Furniture</a></li>
                                    <li><a href="#">Outdoor Furniture</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Wardrobes/Armoires</a></li>                                
                                </ul>
                          </div>
                        </div>
                    </article>
                    <article class="grid_4 prefix_1">
                    	<h4>about us</h4>
                        <ul class="list1">
                            <li><a href="#">services</a></li>
                            <li><a href="#">news</a></li>
                            <li><a href="#">testimonials</a></li>
                            <li><a href="#">clients &amp; partners</a></li>                        
                        </ul>
                    </article>
                    <article class="grid_6 prefix_4">
                    	<div class="privacy">
                        	<strong>copyright</strong> © 2012 | <a href="index-5-login.php">Privacy policy</a>
                        </div>
                        <div class="social">
                        	<h4>follow us:</h4>
                            <a href="#" title="Facebook"><img src="images/soc1.jpg" width="37" height="76" alt=""></a>
                            <a href="#" title="Twitter"><img src="images/soc2.jpg" width="37" height="76" alt=""></a>
                            <a href="#" title="Google +"><img src="images/soc3.jpg" width="37" height="76" alt=""></a>
                            <a href="#" title="RSS"><img src="images/soc4.jpg" width="37" height="76" alt=""></a>
                        </div>
                    </article>
                </div>
                <center><?php echo $datetime; ?></center>
            </div>
        </footer>
    </div>
</div>
</body>
</html>