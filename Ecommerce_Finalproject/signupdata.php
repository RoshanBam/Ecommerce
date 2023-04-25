<?php

$fullname = $address = $contact = $email = $password ="";
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	function validate($data){
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		$data = trim($data);
		return $data;

	}
	if(empty($_POST["fullname"])){
		$error = "Name is not written";
	}
	else{
		if(!preg_match("/^[a-zA-Z]*$/", $_POST["fullname"])){
			$error.="Name format is not correct";
		}
		else{
			$fullname = validate($_POST["fullname"]);
		}
	}
	//validation of address
	if(empty($_POST["address"])){
		$error.="Address is empty";
	}
	else{
		$address = validate($_POST["address"]);
	}
	//validation of email
	if(empty($_POST["email"])){
		$error.="Email is empty";
	}
	else{
		$email = validate($_POST["email"]);
	}
	//validation of contact
	if(empty($_POST["contact"])){
		$error = "Contact is empty";
	}
	else{
		if(preg_match("/^[a-zA-Z]*$/", $_POST["contact"])){
			$error.="Incorrect contact number";
		}
		else{
			$contact = validate($_POST["contact"]);
		}
}
//Password
if(empty($_POST["password"])){
	$error .= "Password is empty!";
}
	else{
		$password = validate($_POST["password"]);
		
	}



}
/*echo "Name: ".$fullname."<br>";
echo "Address: ".$address."<br>";
echo "Email: ".$email."<br>";
echo "Contact: ".$contact;
*/
 //require("connection.php");
$conn = new mysqli("localhost","root","","e_commerce");
 $sql="INSERT INTO user_info(full_name,address,email,contact,password)VALUES('$fullname','$address','$email','$contact','$password');";

if($conn->query($sql) === TRUE){
	$_SESSION["SignUpSuccess"] = "Successful Signed up!";
	header("Location:index.php");
}
else{
	$_SESSION["loginError"] = "Sorry couldn't Signed up!";
	header("Location:index.php");
	
}



$conn->close();
