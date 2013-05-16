<?php

$PST_AS_DECIMAL = 0.07;
$GST_AS_DECIMAL = 0.05;


require ( "../credentials.php" );
include_once ( "../session.php" );

$LinkID = mysql_connect ( $req_server, $req_username, $req_password );
if ( !$LinkID ) {
	die( 'Could not connect: ' . mysql_error ( ) );
}

$db_selected = mysql_select_db ( 'sushiC199' );
if ( !$db_selected ) {
    die( 'Could not select database: ' . mysql_error ( ) );
}
$query = mysql_query ( "
	SELECT category, product_id, product_name AS 'Item', price AS 'Price'
	FROM PRODUCT_TBL
	ORDER BY category, price
" );

$_SESSION['returnPage'] = "checkout.php";
?>



<!DOCTYPE HTML>
<!--
	ZeroFour 1.0 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sushi Palace Order Form</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Order take-out or delivery from Sushi Palace" />
		<meta name="keywords" content="Sushi Palace Order" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css" />
		
		<script>
		function guestForm ( ) {
			var xmlhttp;
			if ( window.XMLHttpRequest ) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest ( ) ;
			} else {
				// code for IE6, IE5
				xmlhttp=new ActiveXObject ( "Microsoft.XMLHTTP" );
			}
			xmlhttp.onreadystatechange=function ( ) {
				if ( xmlhttp.readyState==4 && xmlhttp.status==200 ) {
					document.getElementById( "guestDiv" ).innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open( "GET","guestCheckout_test.php",true );
			xmlhttp.send ( );
		}
		</script>
		
		<script type="text/javascript">
		function customerForm ( ) {
			window.location.href = "http://deepblue.cs.camosun.bc.ca/~comp19901/login.php"
		}
		</script>
		
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
		<script src="js/jquery.dropotron-1.2.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/5grid/core.css" />
			<link rel="stylesheet" href="css/5grid/core-desktop.css" />
			<link rel="stylesheet" href="css/5grid/core-1200px.css" />
			<link rel="stylesheet" href="css/5grid/core-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
		
		<!-- page specific table style -->
		<style>  
			table
			{
				width:80%;
			}
			td
			{
				padding:1px 7px 2px 7px;
			}
		</style>
	</head>
	
	<body class="left-sidebar">
	
		<!-- Header Wrapper -->
		<div id="header-wrapper">
			<div class="5grid-layout">
				<div class="row">
					<div class="12u">
					
						<!-- Header -->
						<header id="header">
							<div class="inner">
							
								<!-- Logo -->
								<h1><a href="index.html" class="mobileUI-site-name">Sushi Palace</a></h1>
								
								<!-- Nav -->
								<nav id="nav" class="mobileUI-site-nav">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="menu.html">Menu</a></li>
										<li class="current_page_item"><a href="order.html">Order</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="login.html">Login</a></li>  <!-- // should be dynamic - if user is logged in, "Welcome (user)" -->
									</ul>
								</nav>
							</div>
						</header>
					</div>
				</div>
			</div>
		</div>
			
		<!-- Main Wrapper -->
		<div id="main-wrapper">
			<div class="main-wrapper-style2">
				<div class="inner">
					<div class="5grid-layout">
						<div class="row">
							<div class="4u">
							
								<!-- Sidebar -->
								<div id="sidebar">
									<section>
										<header>
											<br>
											1111 Palace St</br>
											Victoria B.C.  V8M 5J7</br>
											250-777-777</br>
											Open 10am - 8pm every day!</br>
											<a href="mailto:order@sushipalace.ca">order@sushipalace.ca</a></br>
											<p>
											
										</header>
										Local Partnerships:<br>
										<ul>
											<li><a href="http://www.finestatsea.com/">Finest At Sea</a></li>
											<li><a href="http://www.floatingfishstore.com/">The Fish Store</a></li>
											<li><a href="http://www.1fish2fish.ca/">1Fish2Fish</a></li>
										</ul>
										<p><span style="font-style: italic">
										All our seafood is regionally sourced from OceanWise partners.<br>
										We buy only organic ingredients for rice, vegetables, and condiments.<br>
										</span>
										<footer>
											<h4>MyPalace</h4>
											
											<p>Login to your account</p>
											
											<a href="login.html" class="button button-icon button-icon-info">Login</a>
										</footer>
									</section>
								</div>
							</div>
							<div class="8u mobileUI-main-content">
								<div id="content">

									<!-- Content -->
									<article>
										<header>
											<center><h3>Your Order</h3></center>
										</header>
										
										<?php
										
										$subtotal = null;
										
										print " <table> ";

										foreach ( $_SESSION['ordered'] as $key => $value) {

											if ( $value > 0 ) {
											
												$table_result = mysql_query ( "SELECT product_name, price  FROM PRODUCT_TBL WHERE product_id = $key" );
												mysql_data_seek ( $table_result, 0 );
												$row_result = mysql_fetch_row ( $table_result );
												
												print " <tr> ";
												$price_display = false;

												foreach ( $row_result as $foo ) {  // $row_result has 2 entries, 'product_name' and 'price'.
													
													if ( $price_display == false ) {
														print " <td> ";
														print " $foo &nbsp; ";
														print " </td>";
														$price_display = true;
													} else {
														print " <td> ";
														print " \$$foo &nbsp;&nbsp;&nbsp; x ";
														print " </td> ";
													}
												}
												
												print " <td> ";
												print $value."&nbsp;&nbsp;&nbsp; = ";
												print " </td> ";
												
												$line_total = $foo * $value;  // this works because $foo is set to price when the foreach is exited
												$subtotal += $line_total;
												
												print " <td> ";
												print " \$$line_total ";
												print " </td> ";
												
												print " </tr> ";
											}
										} // end of foreach
										
										print " <tr> <td> </td><td> </td><td> </td><td> ======= </td> </tr> ";
										print " <tr> <td> </td><td> </td><td> Subtotal </td><td> \$$subtotal </td> </tr> ";
										$pst = $PST_AS_DECIMAL * $subtotal;
										print " <tr> <td> </td><td> </td><td> PST </td><td> $pst </td> </tr> ";
										$gst = $GST_AS_DECIMAL * $subtotal;
										print " <tr> <td> </td><td> </td><td> GST </td><td> $gst </td> </tr> ";
										print " <tr> <td> </td><td> </td><td> </td><td> ======= </td> </tr> ";
										$total = $subtotal + $gst + $pst;
										print " <tr> <td> </td><td> </td><td> Total </td><td> $total </td> </tr> ";


print "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">";
print "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">";
print "<input type=\"hidden\" name=\"hosted_button_id\" value=\"A2KRNHFRQY3LA\">";			
print "<input type=\"hidden\" name=\"total\" value=$total>";			
										
										
										print " </table> ";




										?>
										<button type="button" onclick="guestForm()">Purchase as a Guest</button>
										<button type="button" onclick="customerForm()">Login to Purchase</button>
										<div id="guestDiv"> </div>
										<div id="guestDiv"> </div>
										<?php
										
										
										?>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			

		<!-- Footer Wrapper -->
		<div id="footer-wrapper">
			<footer id="footer" class="5grid-layout">
				<div class="row">
					<div class="12u">
						<div id="copyright">
							&copy; 2013 ConFulGul  All rights reserved | Images: <a href="http://fotogrph.com/">Fotogrph</a> + <a href="http://iconify.it/">Iconify.it</a> | Design Template: <a href="http://html5up.net/">HTML5 Up!</a>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</body>
</html>

