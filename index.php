#!/usr/local/bin/php

<?php
include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Le'Grasse Medical</title>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/scrool.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery.fancybox-1.3.4.css">
    <link rel="stylesheet" href="css/ui.totop.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/easyTooltip.js"></script>
    <script type="text/javascript" src="js/FF-cash.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script src="js/jquery.jscrollpane.min.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script>
    	$(function(){
			$(".gallery1 a").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});
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
                    <li class="current"><a href="index.php">home</a></li>
                    <li><a href="index-1-plan.php">plan info</a></li>
                    <li><a href="index-2-medicine.php">medicine</font></a></li>
                    <li><a href="index-3-calendar.php">calendar</a></li>
                    <li><a href="index-4-profile.php">profile</a></li>
                </ul>
                <div class="clear"></div>
            </nav>
        </header>	
    </div>
</div>	
<div class="block2">
    <!--==============================content================================-->
    <div class="main">
        <section id="content" class="cont_pad">
            <div class="container_24">
                <div class="wrapper">
                    <article class="grid_24">
                        <div class="box">
                            <div class="wrapper">
                            	<center>
                                	<br><br>
                                	<table width="auto">
                                		<tr>
                                    		<td align="left" valign="middle">
                                        		<img src="https://thumbs.dreamstime.com/z/doctor-holding-carrots-2425997.jpg" width="325" height="348">
                                        	</td>
                                        	<td align="middle" valign="middle">
                                            	<img src="http://www.cise.ufl.edu/~mschneid/markus.jpg" width="309" height="348">
                                        	</td>
                                        	<td align="right" valign="middle">
                                        		<img src="https://thumbs.dreamstime.com/z/doctor-holding-carrots-2431970.jpg" width="325" height="348">
                                        	</td>
                                    	</tr>
                                	</table>
                                </center>
                            </div>
                        </div>
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
                        	<strong>copyright</strong> © 2012 | <a href="index-5-login.php">Privacy policy</a><br>
							<!-- {%FOOTER_LINK} -->
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
<script>
	$(function(){
		$(".box .wrapper a").find('img').parent().append('<span></span>').each(
	   function(){
		var src=new Array()
		src=$(this).find('img').attr('src').split('.')
		src=src[0]+'-hover.'+src[1]
		$(this).find('span').css({background:'url('+src+')'})
	   })
	})
</script>
</body>
</html>