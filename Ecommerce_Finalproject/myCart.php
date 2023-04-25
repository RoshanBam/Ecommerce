<?php session_start();
  if(!isset($_SESSION["userName"])){
    header("Location:index.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<!-- navigation start-->

	<nav class="navbar navbar-expand-lg navbar-light bg-sucess">
  <a class="navbar-brand" href="#">Ecommerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Items
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Electronic</a>
          <a class="dropdown-item" href="#">Household</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Fancy</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["userId"]." and " .$_SESSION["userName"] ?></a>
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Electronic</a>
          <a class="dropdown-item" href="#">Household</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Fancy</a>
          <a class="dropdown-item" href="logout.php">LogOut</a>
        </div>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!--navigation end-->


<div class = "row">
	<div class = "container">
		<table class="table">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
      $userId=$_SESSION["userId"] ;
  		require("connection.php");
  		$sql = "SELECT products.product_name, products.image, products.price FROM products JOIN cart WHERE cart.product_id = products.id AND cart.user_id = $userId AND cart.purchased='false' ORDER BY cart.id DESC";

  		$result = $conn->query($sql);
  		if($result->num_rows > 0){
  			while($row = $result->fetch_assoc()){
?>


<tr><td><?php echo"<img src='products/".$row["image"]."' width='200'>"?></td><td><?php echo $row["product_name"]?></td><td><?php echo $row["price"]?></td></tr>

	<?php } }  ?>
	<tr><td></td><td>Total</td><td><?php echo $row["total"]?></td></tr>
	<?php $conn->close(); ?>



    
  </tbody>
</table>
</div>
</div>

	<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



</body>
</html>