<?php

$product_name = $image_name = $price = $description = $quantity = $error ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($_POST["productName"])){
		$error = "Product Name is Empty!";
	}
	else{
		$product_name = validate($_POST["productName"]);

	}
	//PRICE
	if(empty($_POST["price"])){
		$error .= "Price is Empty";
	}
	else{
		if(!preg_match("/^[a-zA-Z]*$/",$_POST["price"])){
			$price = validate($_POST["price"]);
		}
		else{
			$error .= "Price Type is not Correct";
		}
	}

	//Description
	$description = validate($_POST["description"]);
	//Quantity
	if(empty($_POST["quantity"])){
		$error .= "Quantity is Empty";
	}
	else{
		if(!preg_match("/^[a-zA-Z]*$/",$_POST["quantity"])){
			$quantity= validate($_POST["quantity"]);
		}
		else{
			$error .= "Price Type is not Correct";
		}
	}
	//Image Upload
	$image_directory = "products/";

	$image_name = $_FILES["image"]["name"];
	$target_file = $image_directory.basename($image_name);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$extension_arr = array("jpg", "jpeg", "png", "gif");

	  if(in_array($imageFileType, $extension_arr)){
	  	if(file_exists($target_file)){
	  		$error = "Image is already Exist";
	  	}
	  	else{
	  		$uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $image_directory.$image_name);
	  	}
	  }
}
function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//echo $product_name.", ". $image_name .",". $price .", ". $description .", ". $quantity ." ;

require("connection.php");
$sql = "INSERT INTO products(product_name, image, price, description, quantity)VALUES('$product_name','$image_name','$price', '$description', '$quantity')";


if($conn->query($sql) === TRUE){
	header("Location:productUpload.php");
}
else{
	header("Location:productUpload.php");
}
$conn->close();

?>