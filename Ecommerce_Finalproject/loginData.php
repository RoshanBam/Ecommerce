<?php
session_start();


$email = $password ="";
$error = "";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 	//EMAIL
 	if(empty($_POST["email"])){
 		$error = "Empty Email Field!";

 	}
 	else{
 		$email = validate($_POST["email"]);
 	}
 	//Password
 if(empty($_POST["password"])){
 		$error .= "Password is Empty!";

 	}
 	else{
 		$password = $_POST["password"];
 	}
 }

 function validate($data){
 	$data = trim($data);
 	$data = stripcslashes($data);
 	$data = htmlspecialchars($data);
 	return $data;
 }
 

 $conn = new mysqli("localhost","root","","e_commerce");

 $sql = "SELECT * FROM user_info WHERE email ='$email' AND password='$password'";
 $result = $conn->query($sql);
 $getName = mysqli_fetch_assoc($result);

 if($result->num_rows > 0){
 	$userName = $getName["full_name"];
 	$userId = $getName["id"];
 	$_SESSION["userName"] = $userName;
 	$_SESSION["userId"] = $userId;
 	header("Location:home.php");
 }
 else{
 	$_SESSION["loginError"] = "Email or Password invalid";
 	header("Location:index.php");
 }

 $conn->close();

 ?>