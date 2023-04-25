<?php
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>EditInfo page</title>
	<meta charset="utf-8">
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="marginTop"><center><h1>Ecommerce</h1></center></div>
<div class="marginTop"><center><h3>SignUp</h3></center></div>

<?php
require("connection.php");
$sql = "SELECT * FROM user_info WHERE id = $id";
$result = $conn->query($sql);

?>



	<div class ="FormContent">
    <form method="POST" action="editInfodata.php">
    	<?php
    	if($result->num_rows > 0){
    		while($row=$result->fetch_assoc()){
    			?>
    	
  <div class="form-group">
  	<input type="hidden" name="id"<?php echo"value='".$row["id"]."'"?> >
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full Name" name="fullname" <?php echo"value='".$row["full_name"]."'"?> >
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address"<?php echo"value='".$row["address"]."'"?> >
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email"<?php echo"value='".$row["email"]."'"?> >
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Contact</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contact" name="contact"<?php echo"value='".$row["contact"]."'"?> >
  </div>
<?php } } ?>
<input type="submit" class="btn btn-success" value="Enter">

</form>
	
  
</div>














<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>