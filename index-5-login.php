#!/usr/local/bin/php

<?php
include 'config.php';

session_start();
if( isset($_SESSION['username']) )
{
	header('Location: index.php');
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/easyTooltip.js"></script>
    <script type="text/javascript" src="js/FF-cash.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="js/forms.js"></script>
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
				echo "Welcome, " . $_SESSION['username'];
				echo "</br>";
				echo "<a href='index-6-logout.php'>Logout</a>";
			}
            ?>
            <nav>
                <ul class="sf-menu">
                    <li><a href="index.php">home</a></li>
                    <li><a href="index-1-plan.php">plan info</a></li>
                    <li><a href="index-2-medicine.php">medicine</a></li>
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
                        	<p><strong>Please login to continue.</strong></p>

<?php
$validated = false;

if( $_POST['validate'] == 'yes' )
{
	$username = trim( preg_replace("/[^a-zA-Z0-9]/", "", $_POST['username']) );
	$password = trim( preg_replace("/[^a-zA-Z0-9]/", "", $_POST['password']) );
	
	$login = oci_parse( $oracle_conn, "SELECT COUNT(*) FROM users WHERE username = '$username' AND password = '$password'" );
	oci_execute($login);
	
	$array = oci_fetch_array($login);
	oci_free_statement($login);
	
	if( $array[0] == 1 )
	{
		$validated = true;
		
		session_start();
		$_SESSION['username'] = $username;
		
		header('Location: index.php');
	}
	else
	{
		echo "<span style='color:#FF0000'>Invalid Username or Password. Please try again.</span>";
	}
}

oci_close($oracle_conn);
echo "<br><br>";

if( !$validated )
{
?>
<form name="login" method="post">
	<table>
    	<tr>
        	<td align="right" valign="baseline"><strong>Username:&nbsp;&nbsp;</strong></td>
            <td align="left" valign="baseline"><input name="username" id="username" type="text"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        	<td align="right" valign="baseline"><strong>Password:&nbsp;&nbsp;</strong></td>
            <td align="left" valign="baseline"><input name="password" id="password" type="password"/></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        	<td align="right" valign="baseline"><input name="validate" type="hidden" value="yes"/></td>
            <td align="left" valign="baseline"><input name="submit" type="submit" value="Login"/></td>
        </tr>
    </table>
</form>
<?php
}
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
<!--Coded by Grizli-->
</body>
</html>