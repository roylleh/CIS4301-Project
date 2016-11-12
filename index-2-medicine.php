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
				echo "Welcome, " . $_SESSION['username'];
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
                <div class="stripe stripe_box2">
                    <article class="grid_15">
                    	<div class="scrool_box scroll-pane">
                            <div class="box">
                            	<h2>modern services</h2>
                                <h3 class="ind1">Exquisite interior arrangements!</h3>
                                <div class="extra_container services">
                                    <figure><img src="images/3page_img1.jpg" width="113" height="111" alt=""></figure>
                                    <div>
                                        <div class="title">Interior Decorating Services </div>
                                        <p>Est omnis doloresereledusempquibdameto aurerumoms odesn in neces
                                        ude.susandaeItaquearumel rerum hic tenetura sapiravivptatibuas.</p>
                                        <ul class="list2">
                                            <li><a href="#">Functional space planning and design</a></li>
                                            <li><a href="#">Fabric and furniture selection / placement</a></li>
                                            <li><a href="#">Drapery and window treatments</a></li>
                                            <li><a href="#">General, task, accent, and mood lighting</a></li>                                	
                                        </ul>    
                                    </div>
                              </div>
                              <div class="extra_container services">
                                    <figure><img src="images/3page_img2.jpg" width="113" height="111" alt=""></figure>
                                    <div>
                                        <div class="title">Interior Design Services for New Home Construction</div>
                                        <p>Est omnis doloresereledusempquibdameto aurerumoms odesn in neces
                                        ude.susandaeItaquearumel rerum hic tenetura sapiravivptatibuas.</p>
                                        <ul class="list2">
                                           <li><a href="#">Wall finishes (paint, stone or ceramic tile, wall covering)</a></li>
                                            <li><a href="#">Custom stairs, balusters and handrails</a></li>                               	
                                        </ul>
                                        
                                    </div>
                              </div>
                              <div class="extra_container services">
                                    <figure><img src="images/3page_img1.jpg" width="113" height="111" alt=""></figure>
                                    <div>
                                        <div class="title">Interior Decorating Services </div>
                                        <p>Est omnis doloresereledusempquibdameto aurerumoms odesn in neces
                                        ude.susandaeItaquearumel rerum hic tenetura sapiravivptatibuas.</p>
                                        <ul class="list2">
                                            <li><a href="#">Functional space planning and design</a></li>
                                            <li><a href="#">Fabric and furniture selection / placement</a></li>
                                            <li><a href="#">Drapery and window treatments</a></li>
                                            <li><a href="#">General, task, accent, and mood lighting</a></li>                                	
                                        </ul>    
                                    </div>
                              </div>
                              <div class="extra_container services m_bottom_zero">
                                    <figure><img src="images/3page_img2.jpg" width="113" height="111" alt=""></figure>
                                    <div>
                                        <div class="title">Interior Design Services for New Home Construction</div>
                                        <p>Est omnis doloresereledusempquibdameto aurerumoms odesn in neces
                                        ude.susandaeItaquearumel rerum hic tenetura sapiravivptatibuas.</p>
                                        <ul class="list2">
                                           <li><a href="#">Wall finishes (paint, stone or ceramic tile, wall covering)</a></li>
                                            <li><a href="#">Custom stairs, balusters and handrails</a></li>                               	
                                        </ul>
                                        
                                    </div>
                              </div>
                            </div>
                       </div>   
                  	</article>
                    <article class="grid_7 prefix_2">
                        <h2>services list</h2>
                        <h3 class="ind2">Express your style!</h3>
                        <ul class="list3">
                            <li><a href="#">Interior Design Consultation </a></li>
                            <li><a href="#">Project Management </a></li>
                            <li><a href="#">Space Planning </a></li>
                            <li><a href="#">Paint and Color Selection </a></li>
                            <li><a href="#">Fixture Specification </a></li>
                            <li><a href="#">Re-upholstery of existing furniture</a></li>
                            <li><a href="#">Contractor Management </a></li>
                            <li><a href="#">Art Consultation </a></li>
                            <li><a href="#">Draperies/Window Coverings</a></li>
                            <li><a href="#">Floral and Plant Design</a></li>                       
                        </ul>
                    </article>
                    <div class="clear"></div>
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