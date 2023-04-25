<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Session Value</title>
</head>
<body>
	<?php $_SESSION["myName"] = "Roshan"; ?>


<h1>Hello <?php echo $_SESSION["myName"];?>!</h1>
<h3>Welcome to my Another web page!!!</h3>

</body>
</html>