<?php

?>

<html>
  <head>
    <title>Test</title>
  </head>
  <body>
    
	
	<p><?php print_r($_POST);?></p>
	
	<?php
	if ( isset ( $_POST ) ) {
		$_SESSION = $_POST;
		
		// or put it all in an array like this:
		$_SESSION['ordered'] = $_POST;
	}
	
	
	echo ( $_SESSION );
	
	print_r ( $_SESSION );
	
	
	echo($_SESSION[1]."<br />");		// try ordering some of the first 3 items on the menu, should show up here.
	echo($_SESSION[2]."<br />");
	echo($_SESSION[3]."<p />");
	
	print_r ( $_SESSION[1]."<br />" );
	print_r ( $_SESSION[2]."<br />" );
	print_r ( $_SESSION[3]."<p />" );
	
	
	echo ( $_SESSION['ordered']."<br />" );
	print_r ( $_SESSION ['ordered']."<p />" );
	
	
	echo ( $_SESSION['ordered'][1]."<br />"  );
	print_r ( $_SESSION ['ordered'][1]."<p />" );
	
	if ( $_SESSION['ordered'][1] > 0 ) {
		echo ("You ordered the first item from the list! <br />");
	}

	if ( $_SESSION[1] > 0 ) {
		echo ("You ordered the first item from the list and didn't put the variables in an array in the SESSION array!");
	}	
	?>
  </body>
</html>

