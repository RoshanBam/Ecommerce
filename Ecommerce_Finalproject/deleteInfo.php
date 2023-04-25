<?php


$id = $_GET["id"];

require("connection.php");

$sql = "DELETE FROM user_info WHERE id =$id";
 if($conn->query($sql) ===TRUE){
 	header("Location:showdata.php");
 }
 else{
 	header("Location:showdata.php");
 }

 $conn->close();

 ?>