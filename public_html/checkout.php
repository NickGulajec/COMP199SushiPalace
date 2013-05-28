<?php

$_SESSION['returnPage'] = "checkout.php";

include_once ( "../session.php" );

?>

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
		
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
		<script src="js/jquery.dropotron-1.2.js"></script>
		<script type="text/javascript" src="js/paypal-button.min.js"></script>

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
											
											<a href="nicks_testing.php" class="button button-icon button-icon-info">Testing Auto-Login</a>
										</footer>
									</section>
								</div>
							</div>
							<div class="8u mobileUI-main-content">
								<div id="content">

									<!-- Content -->
									<article>
										<form method="post" action="checkout_step2.php">
											<table>
												<tr>
													<td colspan="2" align="center"> <h3> Your Order </h3> </td>
												</tr>
												<tr><td> &#160;</td></tr>
												<tr>
													<td align="right"> Choose a delivery method: </td>
													<td>
														<select name="deliveryType">
															<option value="" selected> </option>
															<option value="takeout"> Pick Up / Take Out </option>
															<option value="delivery"> Deliver My Order! </option>
														</select>
													</td>
												</tr>
												<tr><td> &#160;</td></tr>
												<?php
												if (isset($_SESSION['loggedInID'])) {
												?>
												<tr>
													<td> &#160;</td>
													<td>
														<button type="submit" name="custType" value="loggedIn" class="button button-icon button-icon-rarrow"> Signed-in Checkout </button>
													</td>
												</tr>
												
												<?php
												} else {
												?>
												<tr>
													<td>
														<button type="submit" name="custType" value="guest" class="button button-icon button-icon-rarrow"> Checkout as Guest </button>
													</td>
													<td>
														<button type="submit" name="custType" value="customerSignup" class="button button-icon button-icon-rarrow"> Sign Up to Checkout</button>
													</td>
												</tr>
												<tr>
													<td> &#160;</td>
													<td>
														<button type="submit" name="custType" value="customerLogin" class="button button-icon button-icon-rarrow"> Login to Checkout </button>
													</td>
												</tr>
												<?php
												}
												?>
											</table>
										</form>
										
										
										
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

