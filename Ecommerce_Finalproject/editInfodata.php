<?php
$fullname = $address = $email = $contact = $id ="";
$fullname = $address = $contact = $email ="";
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

$id = $_POST["id"];
}

 require("connection.php");

 $sql = "UPDATE user_info SET full_name='$fullname',address='$address',email='$email',contact='$contact' WHERE id=$id";

 if($conn->query($sql) === TRUE){
 	header("Location:showdata.php");
 }
 else{
 	header("Location:showdata.php");

 }
 $conn->close();