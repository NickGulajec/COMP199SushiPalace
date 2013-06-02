<?php 

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



$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );


//mysql_data_seek ( $table_result, 0 );
$row_result = mysql_fetch_row ( $table_result );

if ( !$row_result ) {

	$insertNewCustomer = "INSERT INTO CUSTOMER_TBL 
			(first_name, last_name, customer_address, customer_phone_no, customer_email)
			VALUES 
			('$first','$last','$address','$phoneNo','$email')
			";

	$retval = mysql_query ( $insertNewCustomer, $LinkID );
	if ( !$retval ) {
		die ( 'Could not enter data: ' . mysql_error ( ) );
	}

	$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );
	$row_result = mysql_fetch_row ( $table_result );

	$_SESSION['loggedInID'] = $row_result[0];
	header ( "location: thankYouForRegistering.php");

} else { 

	header ( "location: alreadyRegistered.php");

}

















?>