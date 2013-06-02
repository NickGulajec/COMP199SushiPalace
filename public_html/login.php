<?PHP

include_once ( "../session.php" );

// If there hasn't been anything sent from registation, ignore
if ($_POST != null) {

// Connect to the MySQL server.
include '../credentials.php';

// Get info from regestration
$_POST['firstName'];
$_POST['lastName'];
$_POST['address'];
$_POST['phoneNo'];
$_POST['email'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$phoneNo = $_POST['phoneNo'];
$email = $_POST['email'];

// Clean it up
$first = htmlspecialchars(strip_tags(trim($firstName)), ENT_QUOTES);
$last = htmlspecialchars(strip_tags(trim($lastName)), ENT_QUOTES);
$home = strip_tags(trim($address));
$number = strip_tags(trim($phoneNo));
$mail = strip_tags(trim($email));

$LinkID = mysql_connect( $req_server, $req_username, $req_password );

// Die if no connect
if (!$LinkID)
   {
   echo "Failed to connect to MySQL: " . $LinkID;
   }

// Choose the DB and run a query.
$db_selected = mysql_select_db ( 'sushiC199' );
if ( !$db_selected ) {
    die( 'Could not select database: ' . mysql_error ( ) );
	}

$sql="INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no, customer_email)
 VALUES
 ('$first','$last','$home','$number','$mail')";
 
 $retval = mysql_query($sql,$LinkID);
 if (!$retval)
   {
   die('Could not enter data: ' . mysql_error());
   }
   
// Close the connection
mysql_close($LinkID);
}

$returnPage = "";
$returnPage = $_SESSION['returnPage'];
?>
<!DOCTYPE HTML>
<!--
	ZeroFour 1.0 by HTML5 Up!
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Login - SUSHI PALACE!</title>
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
		<script>
		function validateForm()
		{
		var x=document.forms["emailForm"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (x==null || x=="")
			{
				alert("Email must be entered");
				return false;
			}
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert("Not a valid e-mail address");
				return false;
			}
		}
</script>

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
													<li><a href="index.html">Home</a></li>
													<li><a href="menu.html">Menu</a></li>
													<li><a href="order.html">Order</a></li>
													<li><a href="about.html">About</a></li>
													<li class="current_page_item"><a href="login.html">Login</a></li> <!-- will always be login on this page -->
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
									<div class="6u">
										<section class="pad-right">
											<header class="major">
												<h2>Returning Customer</h2>
											</header>
											<p>Enter Email</p>
											<form name="emailForm" onsubmit="return validateForm()" method="post" action="checklogin.php">
											E-mail:<input name="email" type="text" value ="">
											<footer>
											<input value="Login" type="submit" class="button button-medium button-icon button-icon-rarrow">
											</form>
											</footer>
										</section>
									</div>
									<div class="6u">
										<section class="pad-left">
											<header class="major">
												<h2>Guest</h2>
											</header>
											<footer>
												<a href="order.php" class="button button-medium button-icon button-icon-rarrow">Continue Shopping</a>
												<a href="registration.html#" class="button button-medium button-alt button-icon button-icon-info">Register</a>
											</footer>
										</section>
									</div>
								</div>
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