<?php

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
							<div class="4u">
								<div id="sidebar">

									<!-- Sidebar -->
									
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
											<p><?php //print_r($_POST);?></p>
	
											<?php
											if ($_SESSION['ordered'] = null) {
												print ("Cart is empty");
												print "<a href=\"order.html#\" class=\"button button-big button-icon button-icon-rarrow\">Order</a>";
											}
											
											if ($_SESSION['ordered'] = 0) {
												print ("Cart is empty");
												print "<a href=\"order.html#\" class=\"button button-big button-icon button-icon-rarrow\">Order</a>";
											}
											
											if ( isset ( $_POST ) ) {
												$_SESSION = $_POST;
		
												// or put it all in an array like this:
												$_SESSION['ordered'] = $_POST;
											}
											
											if ( $_SESSION['ordered'][27] > 0 ) { 
												echo ("Miso Soup: "); 
												echo ($_SESSION[27]."<br />");
											}
											if ( $_SESSION['ordered'][28] > 0 ) { 
												echo ("Agedashi Tofu: "); 
												echo ($_SESSION[28]."<br />");
											}
											if ( $_SESSION['ordered'][24] > 0 ) { 
												echo ("Tempura: "); 
												echo ($_SESSION[24]."<br />");
											}
											if ( $_SESSION['ordered'][26] > 0 ) { 
												echo ("Katsu Don: "); 
												echo ($_SESSION[26]."<br />");
											}
											if ( $_SESSION['ordered'][25] > 0 ) { 
												echo ("Beef Teriyaki : "); 
												echo ($_SESSION[25]."<br />");
											}
											if ( $_SESSION['ordered'][29] > 0 ) { 
												echo ("Platter A: "); 
												echo ($_SESSION[29]."<br />");
											}
											if ( $_SESSION['ordered'][30] > 0 ) { 
												echo ("Platter B: "); 
												echo ($_SESSION[30]."<br />");
											}
											if ( $_SESSION['ordered'][1] > 0 ) { 
												echo ("KAPPA MAKI: "); 
												echo ($_SESSION[1]."<br />");
											}
											if ( $_SESSION['ordered'][2] > 0 ) { 
												echo ("OSHINKO MAKI: "); 
												echo ($_SESSION[2]."<br />");
											}
											if ( $_SESSION['ordered'][4] > 0 ) { 
												echo ("TEKKA MAKI: "); 
												echo ($_SESSION[4]."<br />");
											}
											if ( $_SESSION['ordered'][3] > 0 ) { 
												echo ("SAKE MAKI: "); 
												echo ($_SESSION[3]."<br />");
											}
											if ( $_SESSION['ordered'][10] > 0 ) { 
												echo ("AVOCADO ROLL: "); 
												echo ($_SESSION[10]."<br />");
											}
											if ( $_SESSION['ordered'][5] > 0 ) { 
												echo ("NEGITORO: "); 
												echo ($_SESSION[5]."<br />");
											}
											if ( $_SESSION['ordered'][9] > 0 ) { 
												echo ("CALIFORNIA ROLL: "); 
												echo ($_SESSION[9]."<br />");
											}
											if ( $_SESSION['ordered'][12] > 0 ) { 
												echo ("VEGETABLE ROLL  : "); 
												echo ($_SESSION[12]."<br />");
											}
											if ( $_SESSION['ordered'][11] > 0 ) { 
												echo ("YAM ROLL: "); 
												echo ($_SESSION[11]."<br />");
											}
											if ( $_SESSION['ordered'][15] > 0 ) { 
												echo ("CANADIAN ROLL: "); 
												echo ($_SESSION[15]."<br />");
											}
											if ( $_SESSION['ordered'][14] > 0 ) { 
												echo ("DYNAMITE ROLL : "); 
												echo ($_SESSION[14]."<br />");
											}
											if ( $_SESSION['ordered'][17] > 0 ) { 
												echo ("VANCOUVER ROLL: "); 
												echo ($_SESSION[17]."<br />");
											}
											if ( $_SESSION['ordered'][18] > 0 ) { 
												echo ("B.C. ROLL: "); 
												echo ($_SESSION[18]."<br />");
											}
											if ( $_SESSION['ordered'][13] > 0 ) { 
												echo ("YAMAKADO ROLL: "); 
												echo ($_SESSION[13]."<br />");
											}
											if ( $_SESSION['ordered'][6] > 0 ) { 
												echo ("FUTO MAKI: "); 
												echo ($_SESSION[6]."<br />");
											}
											if ( $_SESSION['ordered'][7] > 0 ) { 
												echo ("SAKURA ROLL: "); 
												echo ($_SESSION[7]."<br />");
											}
											if ( $_SESSION['ordered'][23] > 0 ) { 
												echo ("NINJA ROLL: "); 
												echo ($_SESSION[23]."<br />");
											}
											if ( $_SESSION['ordered'][21] > 0 ) { 
												echo ("HOUSE SPECIAL: "); 
												echo ($_SESSION[21]."<br />");
											}
											if ( $_SESSION['ordered'][16] > 0 ) { 
												echo ("VICTORIA ROLL: "); 
												echo ($_SESSION[16]."<br />");
											}
											if ( $_SESSION['ordered'][8] > 0 ) { 
												echo ("ROB'S ROLL: "); 
												echo ($_SESSION[8]."<br />");
											}
											if ( $_SESSION['ordered'][22] > 0 ) { 
												echo ("SCALLOP ROLL: "); 
												echo ($_SESSION[22]."<br />");
											}
											if ( $_SESSION['ordered'][19] > 0 ) { 
												echo ("TOKYO ROLL: "); 
												echo ($_SESSION[19]."<br />");
											}
											if ( $_SESSION['ordered'][20] > 0 ) { 
												echo ("SPIDER ROLL: "); 
												echo ($_SESSION[20]."<br />");
											}
											print "<a href=\"order.html#\" class=\"button button-big button-icon button-icon-rarrow\">Change order</a>";
											print "<a href=\"#\" class=\"button button-big button-icon button-icon-check\">Buy</a>";
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

