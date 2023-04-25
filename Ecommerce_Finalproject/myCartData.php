<?php
	session_start(); 
	$userId = $_SESSION["userId"];
	if(isset($_GET["id"])){
	$product_id = $_GET["id"];
	
require("connection.php");
$sql = "INSERT INTO cart(user_id, product_id, purchased)VALUES('$userId','$product_id','false')";
		
	if($conn->query($sql)===TRUE){
		$_SESSION["cart_success"]="Added to a cart successfully";
		header("Location:myCart.php");

	
		
	}
	else{
		$_SESSION["cart_success"]=" Cannot added to a cart successfully";
		header("Location:myCart.php");

	

		
		

	}
}

?>