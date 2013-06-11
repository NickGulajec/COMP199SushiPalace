<?php
/*
 Program Name  :        checkout_step2.php
 Author name   :        Nick Gulajec
 Date Created  :        May 14, 2013
 Date Modified :        Jun 8, 2013
 Description   :		Displays itemized bill, subtotal, and total
 						Prompts for appropriate user info
 						javascript evaluates form submission in the page
 						Navigation and $_POST vars from checkout.php
*/
include_once ( "../session.php" );
$_SESSION['returnPage'] = "checkout_step2.php";

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
		
		<!-- Form Validation Functions -->

			<script type="text/javascript">

				function validateRegisterFormOnSubmit(theForm) {

					var reason = "";
			  			reason += validateFirstname(theForm.firstName);
						reason += validateLastname(theForm.lastName);
						reason += validateEmail(theForm.email);
						reason += validatePhone(theForm.phoneNo);
						reason += validateEmpty(theForm.address);

					if (reason != "") {

						alert("Some fields need correction:\n" + reason);
						return false;

					}

					// Registration successful
					return true;

				}

				function validateLoginFormOnSubmit(theForm) {

					var reason = "";
						reason += validateEmail(theForm.email);

					if (reason != "") {

						alert("Some fields need correction:\n" + reason);
						return false;

					}

					// Proceed to lookup of email in DB
					return true;

				}

				function validateEmpty(fld) {

					var error = "";

		 			if (fld.value.length == 0) {

						fld.style.background = 'Yellow'; 
						error = "An address has not been entered.\n"

					} else {

						fld.style.background = 'White';

					}

					return error;  
				}

				function validateFirstname(fld) {

					var error = "";
					var legalChars = /^[A-Za-z]+$/; // allow letters only

		 			if (fld.value == "") {

						fld.style.background = 'Yellow'; 
						error = "You didn't enter a first name.\n";

					} else if (!legalChars.test(fld.value)) {

						fld.style.background = 'Yellow'; 
						error = "The name contains illegal characters.\n";

					} else {

						fld.style.background = 'White';

					}

					return error;
				}

				function validateLastname(fld) {

					var error = "";
					var legalChars = /^[A-Za-z]+$/; // allow letters only
		 
		 			if (fld.value == "") {

						fld.style.background = 'Yellow'; 
						error = "You didn't enter a last name.\n";

					} else if (!legalChars.test(fld.value)) {

						fld.style.background = 'Yellow'; 
						error = "The name contains illegal characters.\n";

					} else {

						fld.style.background = 'White';

					}

					return error;
				}  

				function trim(s){

					return s.replace(/^\s+|\s+$/, '');

				}

				function validateEmail(fld) {

					var error="";
					var tfld = trim(fld.value);                    // value of field with whitespace trimmed off
					var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
					var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
		   
					if (fld.value == "") {

						fld.style.background = 'Yellow';
						error = "You didn't enter an email address.\n";

					} else if (!emailFilter.test(tfld)) {          //test email for illegal characters

						fld.style.background = 'Yellow';
						error = "Please enter a valid email address.\n";

					} else if (fld.value.match(illegalChars)) {

						fld.style.background = 'Yellow';
						error = "The email address contains illegal characters.\n";

					} else {

						fld.style.background = 'White';

					}

					return error;
				}

				function validatePhone(fld) {

					var error = "";
					var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');    

					if (fld.value == "") {

							error = "You didn't enter a phone number.\n";
							fld.style.background = 'Yellow';

					} else if (isNaN(parseInt(stripped))) {

						error = "The phone number contains illegal characters.\n";
						fld.style.background = 'Yellow';

					} else if (!(stripped.length == 10)) {

						error = "The phone number is the wrong length. Make sure you included an area code.\n";
						fld.style.background = 'Yellow';

					} else {

						fld.style.background = 'White';

					}

					return error;
				}

			</script>

		<!-- End of Form Validation Functions -->


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
										<!-- Dynamic Login/Logout Button -->
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
										<!-- store checkout.php $_POST values -->
										<?php 
										if ( isset ( $_POST['deliveryType'] ) ) {

											$_SESSION['deliveryType'] = $_POST['deliveryType'];

										}

										if ( isset ( $_POST['custType'] ) ) {

											$_SESSION['custType'] = $_POST['custType'];

										}

										/* logged in users just need to click through, no further info required */
										if ( isset ( $_SESSION['loggedInID'] ) ) {

											if ( $_SESSION['deliveryType'] == 'takeout' || $_SESSION['deliveryType'] == 'delivery' ) {

												receiptDisplay();
												loggedInCheckout();
												exit();

											} else {

												print "Please choose a delivery method! <p>";
												print "<a href='checkout.php'>Go Back</a>";
												exit();

											}

										}
										
										/* 	Handle all other customer types
											Display appropriate form for type of customer given by checkout.php
											Final }else{ a non-javascript method of handling unselected delivery type from checkout.php
										 */
										if ( $_SESSION['deliveryType'] == 'takeout' || $_SESSION['deliveryType'] == 'delivery' ) {

											if ( $_SESSION['custType'] == 'guest' ) {

												receiptDisplay();
												guestCheckout();

											} elseif ( $_SESSION['custType'] == 'customerSignup' ) {

												receiptDisplay();
												customerSignupCheckout();

											} elseif ( $_SESSION['custType'] == 'customerLogin' ) {

												receiptDisplay();
												customerLoginCheckout();

											} elseif ($_SESSION['custType'] == 'loggedIn' ) {

												receiptDisplay();
												loggedInCheckout();

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
						<div class="row">
							<center>
								<a href="index.html">Home</a>&nbsp;&nbsp;&nbsp;
								<a href="menu.html">Menu</a>&nbsp;&nbsp;&nbsp;
								<a href="order.html">Order</a>&nbsp;&nbsp;&nbsp;
								<a href="login.html">Login</a>
							</center>
						</div>
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
/***
*
* Content display methods
*
***/

/* References database to generate an itemized receipt from $_SESSION['ordered'] product keys */
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

		print " <tr> <td> </td><td> </td><td> ??? </td><td> what did you break? </td> </tr> ";

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

/* Gather minimal info from guest */
function guestCheckout() {

	print "<table> <form method='post' action='checkout_step3.php'>";
	print "<tr> <td align='right'> First Name 		</td><td align='left'> 	<input type='text' name='fname'> 		</td> </tr>";
	print "<tr> <td align='right'> Phone Number 	</td><td align='left'> 	<input type='text' name='phonenum'> 	</td> </tr>";

	if ( $_SESSION['deliveryType'] == 'delivery' ) {

		print "<tr> <td align='right'> Address 		</td><td align='left'> <input type='text' name='address'> 		</td> </tr>";

	}

	print "</table><table align='center'>";
	print "<tr> <td colspan='2' align='center'> <button type='submit' name='checkoutType' value='guest' class='button button-icon button-icon-rarrow'> Guest Checkout </button></td></tr>";
	print "</form> </table>";

}

/* Grab user credentials and pass to checkout_login.php to handle */
function customerLoginCheckout() {

	print "<table> <form name='loginForm' onsubmit='return validateLoginFormOnSubmit(this)' method='post' action='checkout_login.php'>";
	print "<tr> <td align='right'> Email 			</td><td align='left'> 	<input type='text' name='email'> 		</td> </tr>";
	print "<tr> <td colspan='2' align='center'> <button type='submit' name='checkoutType' value='customerReturning' class='button button-icon button-icon-rarrow'> Login </button></td></tr>";
	print "</form> </table>";

}

/* Create a new account during the checkout process, handled by checkout_register.php*/
function customerSignupCheckout() {

	print "<table> <form name='registerForm' onsubmit='return validateRegisterFormOnSubmit(this)' method='post' action='checkout_register.php' >";
	print "<tr> <td> First Name </td><td align='right'> <input type='text' name='firstName'> </td><td> </td><td> </td> </tr>";
	print "<tr> <td> Last Name </td><td align='right'> <input type='text' name='lastName'> </td><td> </td><td> </td> </tr>";
	print "<tr> <td> Email </td><td align='right'> <input type='text' name='email'> </td><td> </td><td> </td> </tr>";
	print "<tr> <td> Phone Number </td><td align='right'> <input type='text' name='phoneNo'> </td><td> </td><td> </td> </tr>";
	print "<tr> <td> Address </td><td align='right'> <input type='text' name='address'> </td><td> </td><td> </td> </tr>";
	print "<tr> <td colspan='2'><input name='Register' value='Register' type='submit' class='button button-medium button-icon button-icon-rarrow'> </button></td></tr>";
	print "</form> </table>";

}

/* Reciept is presented, no further info required.  Proceed to checkout_step3.php */
function loggedInCheckout() {

	print "<table> <form method='post' action='checkout_step3.php'>";
	print "<tr> <td colspan='2'> <button type='submit' name='checkoutType' value='loggedIn' class='button button-icon button-icon-rarrow'> Proceed To Payment </button></td></tr>";
	print "</form> </table>";

}
?>