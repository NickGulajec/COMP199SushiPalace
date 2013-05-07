<?php
/*** 
*
* lastOrder.php
* Find's the customer's last order values and puts them into $_SESSION['ordered']
*
***/


//fuction to get order_id - the last order from a logged in customer(not implemented yet...)

$order_id = 1;		// hard-coded for now

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

$table_result = mysql_query ( "SELECT product_id, quantity FROM ORDER_PRODUCT_TBL WHERE order_id = $order_id" );
mysql_data_seek ( $table_result, 0 );
$row_result = "";

/*** reset session variable values ***/
foreach ( $_SESSION['ordered'] as $key => $value) {
	$_SESSION['ordered'][$key] = 0;
}


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
?>
<script type="text/javascript">
	window.location.href = "http://deepblue.cs.camosun.bc.ca/~comp19901/order.php"
</script>

