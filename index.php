<?php

$host = $_POST['host'];
$host = stripslashes(trim($host));

function check($param) {
	$host = $param;
	
	$pattern_ip = "/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/";
	$pattern_domain = "/^[-a-z0-9]+\.[a-z][a-z]|biz|cat|ru|su|by|com|edu|gov|int|mil|net|org|pro|tel|aero|arpa|asia|coop|info|jobs|mobi|name|museum|travel$/";
	$pattern_subdomain = "/^[-a-z0-9]+\.+[-a-z0-9]+\.[a-z]{1,3}|biz|cat|ru|su|by|com|edu|gov|int|mil|net|org|pro|tel|aero|arpa|asia|coop|info|jobs|mobi|name|museum|travel$/";
	$pattern_subdomain2 = "/^[-a-z0-9]+\.[-a-z0-9]+\.+[-a-z0-9]+\.[a-z]{2,3}|biz|cat|ru|su|by|com|edu|gov|int|mil|net|org|pro|tel|aero|arpa|asia|coop|info|jobs|mobi|name|museum|travel$/";

	if(!empty($host) && preg_match($pattern_ip, $host) || preg_match($pattern_domain, $host) || preg_match($pattern_subdomain, $host) || preg_match($pattern_subdomain2, $host)) {
		return $host;

	}
}

?>

<html>
 <head>
	<meta charset="utf-8" />
 </head>
 <body>
  <center>
	<form action="test.php" method="POST">
		<input type="text" name="host" value="" />
		<input type="submit" value="Check" />
	</form>
	<br /><br />
	<?php
	if(empty($host) || $host == '127.0.0.1' || $host == '0.0.0.0' || $host == 'localhost') {
		echo "Invalid host!";
	}	else { $check = check($host);
				if($check) {
					echo $check;
				} else { echo "Error!"; }
			}
	?>
  </center>
 </body>
</html>
