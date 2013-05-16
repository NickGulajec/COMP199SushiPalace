<?php
/*** 
*
* guestCheckout.php
* Proceed to order confirmation as a guest
*
***/

include_once ( "../session.php" );

print "<table align='center'>";
print "<tr> <td> First Name </td><td align='right'> <input type='text' name='fname' placeholder='First Name'> </td> </tr>";
print "<tr> <td> Last Name </td><td align='right'> <input type='text' name='lname'> </td> </tr>";
print "<tr> <td> Address </td><td align='right'> <input type='text' name='address'> </td> </tr>";
print "<tr> <td> Phone Number </td><td align='right'> <input type='text' name='phonenum'> </td> </tr>";
print "<tr> <td> Email </td><td align='right'> <input type='text' name='email'> </td> </tr>";
print "<tr> <td colspan='2'> <button type='button' onclick='paymentForm()' class='button button-icon button-icon-rarrow'>Proceed to Payment</button></td></tr>";

print "</table>";
?>
