<?php
/*
 Program Name  :        checkout_step3.php
 Author name   :        Nick Gulajec
 Date Created  :        May 14, 2013
 Date Modified :        Jun 8, 2013
 Description   :		Stores order in database
 						Prompts for payment via PayPal button
 						Contains javascript-disabled form validation for checkout_step2.php
 						Navigation and $_POST vars from checkout_step2.php
*/
include_once ( "../session.php" );
$_SESSION['returnPage'] = "checkout.php";

require ( "../credentials.php" );
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
?>

<!--
	ZeroFour 1.0 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Checkout - Sushi Palace</title>
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
			table { width:80%; }
			td { padding:1px 7px 2px 7px; }
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
										<!-- Dynamic Login/Logout button -->
										<?php 
										if ( isset ($_SESSION['loggedInID'] ) ) {
											?>
											 <li><a href="logout.php">Logout</a></li>
											<?php
										} else {
											?>
											<li><a href="login.html">Login</a></li>
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
			<div class="main-wrapper-style2">
				<div class="inner">
					<div class="5grid-layout">
						<div class="row">
							<div class="4u">
								<!-- Sidebar -->
								<div id="sidebar">
									<section>
										<header>
											<h4>MyPalace</h4>
											<!-- User / Guest button -->
											<?php 
											if ( isset ( $_SESSION['loggedInID'] ) ) {
												?>
												<p>Sign out of your account</p>
												<a href="logout.php" class="button button-icon button-icon-info">Logout</a>
												<?php
											} else {
												?>
												<p>Login to your account</p>
												<a href="login.html" class="button button-icon button-icon-info">Login</a>
												<?php
											}
											?>
										</header>
										<header>
											1111 Palace St</br>
											Victoria B.C.  V8M 5J7</br>
											250-777-777</br>
											Open 10am - 8pm every day!</br>
											<a href="mailto:order@sushipalace.ca">order@sushipalace.ca</a></br><p>
										</header>
										<div>
											Local Partnerships:<br>
											<ul>
												<li><a href="http://www.finestatsea.com/">Finest At Sea</a></li>
												<li><a href="http://www.floatingfishstore.com/">The Fish Store</a></li>
												<li><a href="http://www.1fish2fish.ca/">1Fish2Fish</a></li>
											</ul>
											<span style="font-style: italic"><p>
												All our seafood is regionally sourced<br>
												from OceanWise partners.<br>
												We buy only organic ingredients for rice,<br>
												vegetables, and condiments.<br>
											</span>
										</div>
									</section>
								</div>
							</div>
							<div class="8u mobileUI-main-content">
								<div id="content">
									<!-- Content -->
									<article>
										<?php
										$_SESSION['checkoutType'] = $_POST['checkoutType'];

										/*
										*
										*	GUEST CHECKOUT
										*
										*/
										if ( $_SESSION['checkoutType'] == 'guest' ) {
										
											$first = htmlspecialchars(strip_tags(trim($_POST['fname'])), ENT_QUOTES);
											$phonenum = htmlspecialchars(strip_tags(trim($_POST['phonenum'])), ENT_QUOTES);
											
											if ( $first) {

												$_SESSION['fname'] = $first;

												if ($phonenum) {

													$phoneRegex = '^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$';
													preg_match('`'.$phoneRegex.'`', $phonenum, $goodPhoneNumber);

													if ( $goodPhoneNumber ) {

														$_SESSION['phonenum'] = $goodPhoneNumber;

													} else {

														print "Not a valid phone number <p>";
														print "<a href='checkout_step2.php'>Go Back</a>";
														exit (" ");
													}

												} else {

													print "Not a valid phone number <p>";
													print "<a href='checkout_step2.php'>Go Back</a>";
													exit (" ");

												}

											} else {

												print "No first name <p>";
												print "<a href='checkout_step2.php'>Go Back</a>";
												exit (" ");

											}
											
											if ( $_SESSION['deliveryType'] == 'delivery' ) {
											
												$address = htmlspecialchars(strip_tags(trim($_POST['address'])), ENT_QUOTES);
												
												if ( $address ) {

													$_SESSION['address'] = $address;

												} else {

													print "Address required for delivery <p>";
													print "<a href='checkout_step2.php'>Go Back</a>";
													exit (" ");

												}
												
											}
											
											commitToDatabases(0);  // guest has customer_ID of zero

											echo "<br> Order Recieved at ".$order_date;
											echo "<br> Thank You! <p> Your order number is: ".$order_id."<p>Please complete payment with PayPal, and we'll start making your sushi!<p>";

											$total = $_SESSION['totalPayment'];
											$formattedTotal = number_format($total, 2, '.', '');

											print "\$$formattedTotal";
											payPalButton();
										
										/*
										*
										*	LOGGED IN USER CHECKOUT
										*
										*/
										} elseif ( $_SESSION['checkoutType'] == 'loggedIn' ) {
											
											$ID = $_SESSION['loggedInID'];
											commitToDatabases($ID);
											
											echo "<br> Order Recieved at ".$order_date;
											echo "<br> Thank You! <p> Your order number is: ".$order_id."<p>Please complete payment with PayPal, and we'll start making your sushi!<p>";

											$total = $_SESSION['totalPayment'];
											$formattedTotal = number_format($total, 2, '.', '');

											print "\$$formattedTotal";
											payPalButton();

										} else {

											print "What Happened??";

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

<?php

function commitToDatabases($inID){

	mysql_query ( "INSERT INTO ORDER_TBL (customer_id) VALUES ('$inID')" );
	$table_result = mysql_query ( "SELECT order_id, order_date FROM ORDER_TBL ORDER BY order_date DESC" );
	mysql_data_seek ( $table_result, 0 );
	$row_result = mysql_fetch_row ( $table_result );
	global $order_id;
	global $order_date;
	$order_id = $row_result[0];
	$order_date = $row_result[1];
	
	foreach ( $_SESSION['ordered'] as $key => $value ) {
		if ( $value > 0 ) {
			mysql_query ( "INSERT INTO ORDER_PRODUCT_TBL (order_id, product_id, quantity) VALUES ('$order_id', '$key', '$value')" )
			or die("DB error");
		}
	}
}

function payPalButton() {

	$total = $_SESSION['totalPayment'];
	$formattedTotal = number_format($total, 2, '.', '');
	?>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="N4GM7D5GGTBQQ">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="amount" value="<?php echo $formattedTotal; ?>">
		<input type="hidden" name="item_name" value="SushiPalace Order">
		<input type="hidden" name="button_subtype" value="services">
		<input type="hidden" name="no_note" value="1">
		<input type="hidden" name="no_shipping" value="1">
		<input type="hidden" name="rm" value="1">
		<input type="hidden" name="return" value="http://deepblue.cs.camosun.bc.ca/~comp19901/success.php">
		<input type="hidden" name="cancel_return" value="http://deepblue.cs.camosun.bc.ca/~comp19901/">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	<?php
}

?>