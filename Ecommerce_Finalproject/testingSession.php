<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Session Starts</title>
</head>
<body>
	<?php $_SESSION["myName"] = "Roshan"; ?>


<h1>Welcome <?php echo $_SESSION["myName"];?>!</h1>
<h3>You have come to my first web page!!!</h3>

</body>
</html>











