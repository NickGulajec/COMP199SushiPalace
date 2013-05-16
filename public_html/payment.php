<?php
/*** 
*
* payment.php
* Process guestForm() submission
* Display PayPal payment button
*
***/

include_once ( "../session.php" );



$total = $_SESSION['totalPayment'];

print "<form action=\"https://www.paypal.com/cgi-bin/webscr\"
method=\"post\" target=\"_top\">";
print "<input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">";
print "<input type=\"hidden\" name=\"hosted_button_id\"
value=\"A2KRNHFRQY3LA\">";
print "<input type=\"hidden\" name=\"amount\" value=$total>";

print "<input type=\"image\"
src=\"https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif\"
border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to
pay online!\"><img alt=\"\" border=\"0\"
src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\"
width=\"1\" height=\"1\">";
print "</form>";

?>


