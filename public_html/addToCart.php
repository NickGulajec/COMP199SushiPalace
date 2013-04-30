<?php

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

?>

<!DOCTYPE HTML>
<!--
	ZeroFour 1.0 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Adding to the Cart - SUSHI PALACE!</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css" />
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
							<h1><a href="#" class="mobileUI-site-name">Sushi Palace</a></h1>
								
							<!-- Nav -->
							<nav id="nav" class="mobileUI-site-nav">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li><a href="menu.html">Menu</a></li>
									<li class="current_page_item"><a href="order.html">Order</a></li>
									<li><a href="about.html">About</a></li>
									<li><a href="login.html">Login</a></li>
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
					
						<!-- Sidebar -->
						<div class="4u">
							<div id="sidebar">
								<section>
									<header class="major">
										<h2>Sushi Palace</h2>
									</header>
									<p>Our goal in life: to make the best sushi in the world!
										Enjoy any of our sushi! open 10:00 to 20:00 every day</p>
									<footer>
										<a href="#" class="button button-icon button-icon-info">Order Sushi</a>
									</footer>
								</section>
								<section>
									<header class="major">
										<h2>SUSHI PALACE</h2>
									</header>
									<ul class="style2">
										<li>1111 palace st St</li>
										<li>Victoria, B.C. V8M 5J7</li>
										<li>250-777-777</li>
										<li><a href="#">order@sushipalace.ca</a></li>
									</ul>
									<footer>
										<a href="#" class="button button-icon button-icon-rarrow">Contact us</a>
									</footer>
								</section>
							</div>
						</div>
						<div class="8u mobileUI-main-content">
							<div id="content">

								<!-- Content -->
								<article>
									<?php
									
									if ( isset ( $_POST ) ) {
										
										$_SESSION['ordered'] = $_POST;
										$subtotal = null;
									
										foreach ( $_SESSION['ordered'] as $key => $value) {
											
											if ( $value > 0 ) {
											
												$table_result = mysql_query ( "SELECT product_name, price FROM PRODUCT_TBL WHERE product_id = $key" );
												mysql_data_seek ( $table_result, 0 );
												$row_result = mysql_fetch_row ( $table_result );
												
												$qty_pointer = false;
												
												foreach ( $row_result as $foo ) {  // $row_result has 2 entries, 'product_name' and 'price'.
													
													print " $foo &nbsp; ";
													
												}
												
												$line_total = $foo * $value;  // this works because $foo is set to price when the foreach is exited
												$subtotal += $line_total;
												
												print " $line_total ";
												
												print "<br>";
																						
											}

										}

										print " <p> $subtotal <p> ";
										
										print "<a href=\"order.html\" class=\"button button-icon button-icon-larrow\">Confirm & Continue Shopping</a>";
										print "<a href=\"checkout.html\" class=\"button button button-icon button-icon-check\">Confirm & Purchase</a>";
										
									} else {
									
										print ("Cart is empty");
										print "<a href=\"order.html\" class=\"button button-big button-icon button-icon-rarrow\">Order</a>";
										
									}
									
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