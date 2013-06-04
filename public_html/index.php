<?php 
include_once ( "../session.php" );
$_SESSION['returnPage'] = "index.php";
$returnPage = $_SESSION['returnPage'];
$loggedInID = "";
//$_SESSION['loggedInID'];
?>


<!DOCTYPE HTML>
<!--
	ZeroFour 1.0 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
	<head>
		<title>Index - SUSHI PALACE!</title>
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
	<body class="no-sidebar">

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
													<li class="current_page_item"><a href="index.html">Home</a></li>
													<li><a href="menu.html">Menu</a></li>
													<li><a href="order.html">Order</a></li>
													<li><?php
															if (isset($_SESSION['loggedInID'])) {
														?>
														<a href="logout.php">Logout</a></li>
														<?php
															} else {
														?>
														<a href="login.html">Login</a></li>
														<?php
															}
														?>
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
				<div class="main-wrapper-style1">
					<div class="inner">
				
						<!-- Feature 1 -->
							<section class="5grid-layout box-feature1">
								<div class="row">
									<div class="12u">
										<header class="first major">
											<h2><strong>SUSHI PALACE:</strong> A place where you can<br />
											order and buy sushi</h2>
											<span class="byline">Click here to order</span>
											<a href="order.html#" class="button button-big button-icon button-icon-check">Sushi</a>
										</header>
									</div>
								</div>
							</section>
							<section class="5grid-layout box-feature1">
							<div class="row">
								<div class="12u">
									<header class="major">
										<h2>MyPalace</h2>
										<?php if (isset($_SESSION['loggedInID'])) { ?>
										Welcome back.
										<?php } else { ?>
										<span class="byline">Login to your account</span>
										<a href="login.html" class="button button-icon button-icon-info">Login</a>
										<?php } ?>
									</header>
								</div>
							</div>
							</section>
					</div>
				</div>
			</div>

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">
				<footer id="footer" class="5grid-layout">
					<div class="row">
						<div class="6u">
						
							<!-- Contact -->
								<section>
									<h2>Get in touch</h2>
									<div class="5grid">
										<div class="row">
											<div class="6u">
												<dl class="contact">
													<dt>SUSHI PALACE</dt>
													<dd>
														1111 palace St<br />
														Victoria, B.C. V8M 5J7<br />
													</dd>
													<dt>Phone</dt>
													<dd>(250)-777-777</dd>
													<dd><a href="#">order@sushipalace.ca</a></dd>
												</dl>
											</div>
										</div>
									</div>
								</section>
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<div id="copyright">
								&copy; Untitled. All rights reserved | Images: <a href="http://fotogrph.com/">Fotogrph</a> + <a href="http://iconify.it/">Iconify.it</a> | Design: <a href="http://html5up.net/">HTML5 Up!</a>
							</div>
						</div>
					</div>
				</footer>
			</div>

	</body>
</html>