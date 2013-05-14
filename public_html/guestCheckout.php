<?php
/*** 
*
* guestCheckout.php
* Proceed to order confirmation as a guest
*
***/

include_once ( "../session.php" );

print "<table border ='1'>";
print "<tr> <td> First Name </td><td> <input type=\"text\" name=\"fname\"> </td> </tr>";
print "<tr> <td> Last Name </td><td> <input type=\"text\" name=\"lname\"> </td> </tr>";
print "<tr> <td> Address </td><td> <input type=\"text\" name=\"address\"> </td> </tr>";
print "<tr> <td> Phone Number </td><td> <input type=\"text\" name=\"phonenum\"> </td> </tr>";
print "<tr> <td> Email </td><td> <input type=\"text\" name=\"email\"> </td> </tr>";
print "</table>";


?>


