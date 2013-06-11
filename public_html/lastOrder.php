<?php
/*
 Program Name  :        lastOrder.php
 Author name   :        Nick Gulajec
 Date Created  :        May 07, 2013
 Date Modified :        June 10, 2013
 Description   :		Find's the customer's last order values and puts them into $_SESSION['ordered']
 						returns to the page 'last order' button is found on, order.php
 */

//fuction to get order_id - the last order from a logged in customer(not implemented yet...)


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
$user = $_SESSION['loggedInID'];

/*** reset cart session variable values ***/
foreach ( $_SESSION['ordered'] as $key => $value) {

	$_SESSION['ordered'][$key] = 0;

}

// find the last order number
$orderID_table_result = mysql_query ( "SELECT order_id FROM ORDER_TBL WHERE customer_id = $user ORDER BY order_id DESC" );
mysql_data_seek ( $orderID_table_result, 0 );
$orderID_row_result = mysql_fetch_row ( $orderID_table_result );
$order_id = $orderID_row_result[0];

// use found last ordre number to grab items from that order
$table_result = mysql_query ( "SELECT product_id, quantity FROM ORDER_PRODUCT_TBL WHERE order_id = $order_id" );
mysql_data_seek ( $table_result, 0 );
$row_result = "";

// populate $_SESSION['ordered'] with items
while ( $row_result = mysql_fetch_row ( $table_result ) ) {

	$product_id = "";
	$qty = 0;
	
	foreach ($row_result as $foo) {

		if ( $product_id == "" ) {

			$product_id = $foo;

		} else {

			$qty = $foo;

		}

	}
	
	$_SESSION['ordered'][$product_id] = $qty;
	
	print "<br>";

}

//Finally, redirect
?>
<script type="text/javascript">
	window.location.href = "http://deepblue.cs.camosun.bc.ca/~comp19901/order.php"
</script>

