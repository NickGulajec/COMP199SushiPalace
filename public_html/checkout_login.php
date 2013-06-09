<?php 
/*
 Program Name  :        checkout_login.php
 Author name   :        Nick Gulajec
 Date Created  :        June 2, 2013
 Date Modified :        June 8, 2013
 Description   :		If email address is in the database, customer is logged in as that user
  						Directs user to a results page
 						Navigation and $_POST vars from checkout_step2.php
*/
include_once ( "../session.php" );
require ( "../credentials.php" );

$email = htmlspecialchars ( strip_tags ( trim ( $_POST['email'] ) ), ENT_QUOTES );

$LinkID = mysql_connect ( $req_server, $req_username, $req_password );

if ( !$LinkID ) {

	die( 'Could not connect: ' . mysql_error ( ) );

}

$db_selected = mysql_select_db ( 'sushiC199' );

if ( !$db_selected ) {

    die( 'Could not select database: ' . mysql_error ( ) );

}

$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );

$row_result = mysql_fetch_row ( $table_result );

if ( $row_result ) {

	$_SESSION['loggedInID'] = $row_result[0];
	header ( "location: checkout_loggedInSuccess.php");

} else { 

	header ( "location: checkout_loggedInFailure.php");	

}
?>