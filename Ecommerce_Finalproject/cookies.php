<?php

$cookie_name = "username";
$cookie_value = "Roshan";
 
setcookie($cookie_name, $cookie_value);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cookies Example</title>
</head>
<body>
	<?php
	if(isset($_COOKIE[$cookie_name])){
		echo "Cookie Name is:".$_COOKIE[$cookie_name];

	}
	else{
		echo "Cookie Name is not set!";
	}
	?>

</body>
</html>