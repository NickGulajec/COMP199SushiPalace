<?php 
/*
 Program Name  :        checkout_register.php
 Author name   :        Nick Gulajec
 Date Created  :        June 2, 2013
 Date Modified :        June 8, 2013
 Description   :		Registers a new customer in the database if supplied email address is not already on record.
 						Directs user to a results page.
 						Navigation and $_POST vars from checkout_step2.php
*/
include_once ( "../session.php" );
require ( "../credentials.php" );

$first = htmlspecialchars ( strip_tags ( trim ( $_POST['firstName'] ) ), ENT_QUOTES );
$last = htmlspecialchars ( strip_tags ( trim ( $_POST['lastName'] ) ), ENT_QUOTES );
$address = htmlspecialchars ( strip_tags ( trim ( $_POST['address'] ) ), ENT_QUOTES );
$phoneNo = htmlspecialchars ( strip_tags ( trim ( $_POST['phoneNo'] ) ), ENT_QUOTES );
$email = htmlspecialchars ( strip_tags ( trim ( $_POST['email'] ) ), ENT_QUOTES );

$LinkID = mysql_connect ( $req_server, $req_username, $req_password );

if ( !$LinkID ) {

	die( 'Could not connect: ' . mysql_error ( ) );

}
$db_selected = mysql_select_db ( 'sushiC199' );

if ( !$db_selected ) {

    die( 'Could not select database: ' . mysql_error ( ) );

}

/* Check if email address has already been registered in the database */
$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );
$row_result = mysql_fetch_row ( $table_result );

if ( $row_result ) {

	header ( "location: alreadyRegistered.php");	

} else { 

	$insertNewCustomer = " INSERT INTO CUSTOMER_TBL (first_name, last_name, customer_address, customer_phone_no, customer_email)
							VALUES ('$first','$last','$address','$phoneNo','$email') ";

	$retval = mysql_query ( $insertNewCustomer, $LinkID );

	if ( !$retval ) {

		die ( 'Could not enter data: ' . mysql_error ( ) );

	}

	$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );
	$row_result = mysql_fetch_row ( $table_result );

	$_SESSION['loggedInID'] = $row_result[0];

	header ( "location: thankYouForRegistering.php");

}
?>