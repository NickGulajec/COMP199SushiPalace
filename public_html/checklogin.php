<?php
include_once ( "../session.php" );
require ( "../credentials.php" );
$email = $_POST['email'];

$LinkID = mysql_connect( $req_server, $req_username, $req_password );
if (!$LinkID) {
   die( 'Could not connect: ' . mysql_error ( ) );
}

$db_selected = mysql_select_db ( 'sushiC199' );
if ( !$db_selected ) {
    die( 'Could not select database: ' . mysql_error ( ) );
}

$table_result = mysql_query ( "SELECT customer_id FROM CUSTOMER_TBL WHERE customer_email='$email'" );

//mysql_data_seek ( $table_result, 0 );
$row_result = mysql_fetch_row ( $table_result );

if ( $row_result ) {

	$_SESSION['loggedInID'] = $row_result[0];
	header("location:index.php");
	// It is the page where you want to redirect user after login.
	
} else {

echo "Sorry, that email is not in our database."

echo "Please register or try again."

exit;

}
?>