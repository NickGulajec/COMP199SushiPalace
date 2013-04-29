<?php

session_start ();

require ( "../credentials.php" );

$LinkID = mysql_connect($req_server, $req_username, $req_password);
if (!$LinkID) {
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db('sushiC199');
if (!$db_selected) {
    die('Could not select database: ' . mysql_error());
}
$query = mysql_query ( "
	SELECT category, product_id, product_name AS 'Item', price AS 'Price'
	FROM PRODUCT_TBL
	ORDER BY category, price
" );

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
										<p>
										All our seafood is regionally sourced from OceanWise partners.<br>
										We buy only organic ingredients for rice, vegetables, and condiments.<br>
										
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
											<center><h3>Select Items to add to your order</h3></center>
										</header>
										
										<?php
										
										if ( $query ) {
										
											print "<form method='post' action='addToCart.php'>";
											print "<table><tr>";
											
											mysql_data_seek ( $query, 0 );		//$query grabs rows of [category, product_id, product_name AS 'Item', price AS 'Price'] 
											$fetched_row = "";
											
											
											// state variables for operating on current row
											$row_label = "";		
											$category = "";
											$category_old = "";
											$labeled = false;
											
											
											// Ex-Table Headers, Mayumi you may still need header code here
											
											// ...
											
											
											// Main Loop
											while ( $fetched_row = mysql_fetch_row ( $query ) ) {	// Go through the query results one row at a time
											
												foreach ( $fetched_row as $v ) {	// Go through each value of the returned row in order.  
																					// The values (in order) are: category, product_id, product_name, and price.
																					// Their order is important to the foreach flow.
													
													if ( $category == "" ) {		// every returned row has a category.  But we only want to display it the first time we see it
													
														$category = $v;				// remember this row's category
														
														if ( $category != $category_old ) {		// compare it to the previous row's category
														
															print "<td><h3> $category </h3></td></tr>";		// only if it's changed, print it on a row by itself
														
														}
														
													} else {	// $category is displayed, so we can now print the row
													
														if ( $labeled == false ) {		// select box for current row has not been labelled yet
																						
															print "<td></td>";		// maybe don't need this?? will test later..
															$row_label = $v;		
															$labeled = true;	//  We've now handled the category and product_id.  
													
														} else {	// This else handles the remaining fields, product_name and price
														
															print "<td> $v </td>";
														}
														
													}	// end foreach 
													
												}
												
												// each row needs a select quantity box
												print "<td>
													<select name=\"$row_label\">
													<option value=\"0\" selected>&nbsp&nbsp&nbsp</option>
													<option value=\"1\">1</option>
													<option value=\"2\">2</option>
													<option value=\"3\">3</option>
													<option value=\"4\">4</option>
													<option value=\"5\">5</option>
													<option value=\"6\">6</option>
													<option value=\"7\">7</option>
													<option value=\"8\">8</option>
													<option value=\"9\">9</option>
													</select>
													</td>";
													
												print "</tr><tr>";
											
												// reset row states, get ready for the next row
												$row_label = "";	
												$category_old = $category;	
												$category = "";
												$labeled = false;
												
											}  // end while (get next row of query until there are no more)
											
											
											// Form Submit Button
											print "<td><p><td></tr> <tr> <td></td> <td></td> <td><input type=\"submit\" class=\"button button-icon button-icon-rarrow\"></td></tr>";
											
											print "</table><p>";
											print "</form>";
											
										} else {	// ( !$query )
										
											print "<p>Database Error";
											
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

