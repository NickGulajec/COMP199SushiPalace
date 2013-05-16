<?php
/*** 
*
* guestCheckout.php
* Proceed to order confirmation as a guest
*
***/

include_once ( "../session.php" );

print "<table align='center'>";
print "<tr> <td> Email </td><td align='right'> <input type='text' name='email'> </td> </tr>";
print "<tr> <td> Password </td><td align='right'> <input type='password' name='password'> </td> </tr>";
print "<tr> <td colspan='2'> <button type='button' onclick='loginViaCheckout()' class='button button-icon button-icon-rarrow'>Proceed to Payment</button></td></tr>";
//print "<tr> <td colspan='2'><button type='submit' class='button button-icon button-icon-rarrow'>Proceed to Payment</button></td></tr>";
print "</table>";

?>


