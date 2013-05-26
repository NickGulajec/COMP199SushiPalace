<?php

$_SESSION['returnPage'] = "checkout.php";

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
											
											<a href="login.html" class="button button-icon button-icon-info">Login</a>
										</footer>
									</section>
								</div>
							</div>
							<div class="8u mobileUI-main-content">
								<div id="content">

									<!-- Content -->
									<article>
										<?php 
										
										$_SESSION['deliveryType'] = $_POST['deliveryType'];
										$_SESSION['custType'] = $_POST['custType'];
										
										if ( $_SESSION['deliveryType'] == 'takeout' || $_SESSION['deliveryType'] == 'delivery' ) {
											if ( $_POST['custType'] == 'guest' ) {
												receiptDisplay();
												guestCheckout();
											} elseif ( $_POST['custType'] == 'customerSignup' ) {
												receiptDisplay();
												customerSignupCheckout();
											} elseif ( $_POST['custType'] == 'customerLogin' ) {
												receiptDisplay();
												customerLoginCheckout();
											} else {
												print "whoops!";
											}
										} else {
											print "Please choose a delivery method! <p>";
											print "<a href='checkout.php'>Go Back</a>";
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

function receiptDisplay() {

	$subtotal = null;
	$PST_AS_DECIMAL = 0.07;
	$GST_AS_DECIMAL = 0.05;
										
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
					$price = number_format($foo, 2, '.', '');
					print " <td> ";
					print " \$$price &nbsp;&nbsp;&nbsp; x ";
					print " </td> ";
				}
			}
			print " <td> ";
			print $value."&nbsp;&nbsp;&nbsp; = ";
			print " </td> ";
			$line_total = $price * $value;
			$line_total = number_format($line_total, 2, '.', '');
			$subtotal += $line_total;
			print " <td> \$$line_total </td>";
			print " </tr> ";
		}
	} // end of foreach
	
	$subtotal = number_format($subtotal, 2, '.', '');
	print " <tr> <td> </td><td> </td><td> </td><td> ======= </td> </tr> ";
	print " <tr> <td> </td><td> </td><td> Subtotal </td><td> \$$subtotal </td> </tr> ";
	if ( $_SESSION['deliveryType'] == 'takeout' ) {
		$pst = 0.00;
		$pst = number_format($pst, 2, '.', '');
		print " <tr> <td> </td><td> </td><td> PST </td><td> \$$pst </td> </tr> ";
	} elseif ( $_SESSION['deliveryType'] == 'delivery' ) {
		$pst = $PST_AS_DECIMAL * $subtotal;
		$pst = number_format($pst, 2, '.', '');
		print " <tr> <td> </td><td> </td><td> PST </td><td> \$$pst </td> </tr> ";
	} else {
		print " <tr> <td> </td><td> </td><td> WTF </td><td> what did you break? </td> </tr> ";
	}
	$gst = $GST_AS_DECIMAL * $subtotal;
	$gst = number_format($gst, 2, '.', '');
	print " <tr> <td> </td><td> </td><td> GST </td><td> \$$gst </td> </tr> ";
	print " <tr> <td> </td><td> </td><td> </td><td> ======= </td> </tr> ";
	$total = $subtotal + $gst + $pst;
	$total = number_format($total, 2, '.', '');
	print " <tr> <td> </td><td> </td><td> Total </td><td> \$$total </td> </tr> ";
	$_SESSION['totalPayment'] = $total;
	print " </table> ";
}

function guestCheckout() {
	print "<table align='center'> <form method='post' action='checkout_step3.php'>";
	print "<tr> <td> First Name </td><td align='right'> <input type='text' name='fname'> </td> </tr>";
	print "<tr> <td> Phone Number </td><td align='right'> <input type='text' name='phonenum'> </td> </tr>";
	if ( $_SESSION['deliveryType'] == 'delivery' ) {
		print "<tr> <td> Address </td><td align='right'> <input type='text' name='address'> </td> </tr>";
	}
	print "<tr> <td colspan='2'> <button type='submit' name='checkoutType' value='guest' class='button button-icon button-icon-rarrow'> Guest Checkout </button></td></tr>";
	print "</form> </table>";
}

function customerSignupCheckout() {
	print "<table align='center'> <form method='post' action='checkout_step3.php'>";
	print "<tr> <td> First Name </td><td align='right'> <input type='text' name='fname'> </td> </tr>";
	print "<tr> <td> Last Name </td><td align='right'> <input type='text' name='lname'> </td> </tr>";
	print "<tr> <td> Email </td><td align='right'> <input type='text' name='email'> </td> </tr>";
	print "<tr> <td> Phone Number </td><td align='right'> <input type='text' name='phonenum'> </td> </tr>";
	print "<tr> <td> Address </td><td align='right'> <input type='text' name='address'> </td> </tr>";
	print "<tr> <td colspan='2'> <button type='submit' name='checkoutType' value='customerSignup' class='button button-icon button-icon-rarrow'> Signup and Checkout</button></td></tr>";
	print "</form> </table>";
}

function customerLoginCheckout() {
	print "<table align='center'> <form method='post' action='checkout_step3.php'>";
	print "<tr> <td colspan='2'> <button type='submit' name='checkoutType' value='customerReturning' class='button button-icon button-icon-rarrow'> Nicks' Testing </button></td></tr>";
	print "</form> </table>";
}
?>

