<?php



// Connect to the MySQL server.
include '../credentials.php';

$LinkID = mysql_connect($req_server, $req_username, $req_password);

// Die if no connect
if (!$LinkID) {
	die('Could not connect: ' . mysql_error());
}
// Choose the DB and run a query.
//mysql_select_db("comp170", $LinkID);
mysql_select_db('sushiC199');

// Assemble the SQL query
$sql = "SELECT product_name as ITEM, price as PRICE FROM PRODUCT_TBL";

// Excute sql query
$result = mysql_query ($sql);

// If the query returned error, display error the msg
if (!$result) {
	echo "Could not successfully run query ($sql) from DB ";
	exit;
}
// If the query returned no rows, display the error msg
if (mysql_num_rows($result) == 0) {
	echo "No rows found, nothing to print";
	exit;
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
		<title>Sushi Palace!</title>
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
													<li class="current_page_item"><a href="menu.php">Menu</a></li>
													<li><a href="order.php">Order</a></li>
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
									<div id="sidebar">

										<!-- Sidebar -->
									
											<section>
												<header class="major">
													<h2>SUSHI PALACE</h2>
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
													<li>1111 palace St</li>
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
												<header class="major">
													<h2>MENU</h2>
													<span class="byline">

Monday and Friday get $1 off for party platter!!</span>
												</header>
												
												<span class="image image-full"><img src="images/C789_unitoikuramaguro.jpg" width="200" height="400" alt="" /></span>
												
																							
						
<!-- Menu -->

<?php
	// Display the results

	// Reset the result pointer and display in a table with titles
	mysql_data_seek ($result, 0);
	// Fetch a row with the column labels
	$x=mysql_fetch_assoc($result);
	// Print the column labels
	print "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\"><tr><span class=\"byline\">";
	foreach (array_keys($x) as $k) {
		print "<td><h3> $k </h3></td>";

	}
	print "</span></tr><tr>";
	// Print the values for the first row
	foreach ($x as $v) {
	//while ($row = mysql_fetch_assoc($result)) {
		print "<td width=\"80%\">$v</td>";
		//print "<td width=\"18%\" align=\"right\">$v</td>";

	}
	print "</tr><tr>";
	 //Print the rest of the rows.
	while ($x=mysql_fetch_row($result)) {
		foreach ($x as $v) {
			print "<td width=\"80%\">$v</td>";
		//print "<td width=\"82%\">$v</td>";
		//print "<td width=\"18%\" align=\"right\">$v</td>";

		}
	print "</tr><tr>";
	}
?>
</tr></table>


<!--
 <span class="byline"><h3>Appetizers</h3></span>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tr>
		<td width="82%">Tempura</td>
		<td width="18%" align="right">$10.49</td>
	</tr>
	<tr>
		<td width="82%">Agedashi Tofr</td>
		<td width="18%" align="right">$3.99</td>
	</tr>
	<tr>
		<td width="82%">Miso Soup</td>
		<td width="18%" align="right">$1.99</td>
	</tr>

</table>
												

 <span class="byline"><h3>Sushi Roll</h3></span>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tr>
		<td width="82%">Dynamite Roll</td>
		<td width="18%" align="right">$5.49</td>
	</tr>
	<tr>
		<td width="82%">California Roll</td>
		<td width="18%" align="right">$4.99</td>
	</tr>
	<tr>
		<td width="82%">Sakura Roll</td>
		<td width="18%" align="right">$5.99</td>
	</tr>
	<tr>
		<td width="82%">Spider Roll</td>
		<td width="18%" align="right">$5.99</td>
	</tr>

	<tr>
		<td width="82%">Dragon Roll</td>
		<td width="18%" align="right">$6.49</td>
	</tr>
	<tr>
		<td width="82%">Yamacado Roll</td>
		<td width="18%" align="right">$4.99</td>
	</tr>

	<tr>
		<td width="82%">Imperial Roll</td>
		<td width="18%" align="right">$5.99</td>
	</tr>
	<tr>
		<td width="82%">Tokyo Roll</td>
		<td width="18%" align="right">$6.99</td>
	</tr>
	<tr>
		<td width="82%">B.C. Roll</td>
		<td width="18%" align="right">$6.49</td>
	</tr>
	<tr>
		<td width="82%">Inari</td>
		<td width="18%" align="right">$1.49</td>
	</tr>


</table>

 <span class="byline"><h3>Donburi</h3></span>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tr>
		<td width="82%">Katsu Don</td>
		<td width="18%" align="right">$9.99</td>
	</tr>

</table>

 <span class="byline"><h3>Special</h3></span>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tr>
		<td width="82%">House Specia</td>
		<td width="18%" align="right">$7.49</td>
	</tr>
	<tr>
		<td width="82%">Beef Teriyaki</td>
		<td width="18%" align="right">$11.49</td>
	</tr>

</table>

 <span class="byline"><h3>Party Tray</h3></span>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tr>
		<td width="82%">Combination</td>
		<td width="18%" align="right">$28.49</td>
	</tr>
	<tr>
		<td width="82%">Platter A</td>
		<td width="18%" align="right">$25.49</td>
	</tr>

</table>


-->

									</article>




										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			
			</div>
<!-- Menu -->

		<!-- Footer Wrapper -->
			<div id="footer-wrapper">
				<footer id="footer" class="5grid-layout">
					<div class="row">
						<div class="3u">
						
							<!-- Links -->
											<section>
												<header class="major">
													<h2>SUSHI PALACE</h2>
												</header>
												<ul class="style2">
													<li>1111 palace St</li>
													<li>Victoria, B.C. V8M 5J7</li>
													<li>250-777-777</li>
													<li><a href="#">order@sushipalace.ca</a></li>open 10:00 to 20:00 every day</p>
										
																								</ul>
											
											</section>
						
						</div>
						<div class="3u">
						
							<!-- Links -->
								<section>
									<h2>Menu</h2>
									<ul class="style2">
			<li><a href="index.html">Home</a></li>
															<li><a href="menu.php">Menu</a></li>
<li><a href="order.php">Order</a></li>
<li><a href="about.html">About</a></li>
<li><a href="login.html">Login</li>
									</ul>
								</section>
						
						</div>
						<div class="6u">
						
							<!-- About -->

							<!-- Contact -->
								<section>
									<h2>Get in touch</h2>
									<div class="5grid">
										<div class="row">
											<div class="6u">
												<dl class="contact">
													<dt>Twitter</dt>
													<dd><a href="http://twitter.com/sushipalce">@sushipalace</a></dd>
													<dt>Facebook</dt>
													<dd><a href="http://facebook.com/sushipalace">facebook.com/sushipalace</a></dd>
													<dt>google+</dt>
													<dd><a href="http://google.com/sushipalace">google.com/sushipalace</a></dd>
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