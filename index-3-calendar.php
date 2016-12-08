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
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/easyTooltip.js"></script>
    <script type="text/javascript" src="js/FF-cash.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
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
                    <li><a href="index-2-medicine.php">medicine</a></li>
                    <li class="current"><a href="index-3-calendar.php">calendar</a></li>
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
                        	<h2>appointments</h2>

<br>
<form name="calendar" method="post">
	<table>
    	<tr>
        	<td valign="middle">
            	<select name="month">
			<?php
			$monthval = $_POST['month'];
			for( $i = 1; $i <= 12; $i++ )
			{
				echo "<option value='$i'";
				if( isset($monthval) && $i == $monthval ) echo " selected";
				echo ">" . date( "F", mktime(0, 0, 0, $i, 1, 2000) );
				echo "</option>";
			}
			?>
                </select>
                &nbsp;&nbsp;
            </td>
            <td valign="middle">
            	<input name="year" id="year" type="text" size="4" value="<?php echo isset($_POST['year']) ? $_POST['year'] : 2016; ?>"/>
                &nbsp;&nbsp;
            </td>
            <td valign="middle">
            	<input name="submit" type="submit" value="Submit"/>
            </td>
        </tr>
    </table>
</form>
<br>

<style>
/* calendar */
table.calendar		{ border-left:1px solid #999; }
tr.calendar-row	{  }
td.calendar-day	{ min-height:80px; font-size:12px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
</style>

<?php
$username = $_SESSION['username'];


/* draws a calendar */
function draw_calendar($month,$year,$db,$user){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$sql_date = date( "j-M-y", mktime(0, 0, 0, $month, $list_day, $year) );
			
			$appointments = oci_parse( $db, "SELECT doctorid, app_time FROM appointments WHERE app_date = '$sql_date' AND userid = (SELECT userid FROM users WHERE username = '$user')" );
			oci_execute($appointments);
			
			while( ($row = oci_fetch_row($appointments)) != false )
			{
				$doctorid = $row[0];
				$app_time = $row[1];
				
				$doctor = oci_parse( $db, "SELECT name, address, phone FROM doctors WHERE doctorid = $doctorid" );
				oci_execute($doctor);
				
				$array = oci_fetch_array($doctor);
				oci_free_statement($doctor);
				
				$name = $array[0];
				$address = $array[1];
				$phone = $array[2];
				
				$calendar.= "<p><a href='#' title='$address, $phone'>$name</a><br>$app_time<br></p>";
			}
			oci_free_statement($appointments);
			
			if( empty($doctorid) ) $calendar.= "<p><br><br></p>";
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}


if( $_POST['submit'] == 'Submit' )
{
	$month = trim( preg_replace("/[^a-zA-Z0-9]/", "", $_POST['month']) );
	$year = trim( preg_replace("/[^a-zA-Z0-9]/", "", $_POST['year']) );
	
	$month2 = date( "F", mktime(0, 0, 0, $month, 1, $year) );
	
	echo "<h1>$month2 $year</h1><br>";
	echo draw_calendar( $month, $year, $oracle_conn, $username );
	echo "<br><br>";
}

$appointments = oci_parse( $oracle_conn, "SELECT doctorid, app_date, app_time FROM appointments WHERE userid = (SELECT userid FROM users WHERE username = '$username')" );
oci_execute($appointments);

while( ($row = oci_fetch_row($appointments)) != false )
{
	$doctorid = $row[0];
	$app_date = $row[1];
	$app_time = $row[2];
	
	$doctor = oci_parse( $oracle_conn, "SELECT name, address, phone FROM doctors WHERE doctorid = $doctorid" );
	oci_execute($doctor);
	
	$array = oci_fetch_array($doctor);
	oci_free_statement($doctor);
	
	$name = $array[0];
	$address = $array[1];
	$phone = $array[2];
	
	echo "<strong>Doctor: </strong><a href='#' title='$address, $phone'>" . $name . "</a><br>";
	echo "<strong>Date: </strong>" . $app_date . "<br>";
	echo "<strong>Time: </strong>" . $app_time . "<br>";
	echo "<br>";
}
oci_free_statement($appointments);

if( empty($doctorid) ) echo "<span style='color:#FF0000'>You have no appointments at the moment.</span>";

oci_close($db);
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
