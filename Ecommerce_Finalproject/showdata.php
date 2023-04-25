<!DOCTYPE html>
<html>
<head>
	<title>Show Data Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<div>
		<h1>User Information</h1>
		   <div class ="container">
			<table class="table">
            <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	require("connection.php");
    	 $sql = "SELECT * FROM userinfo";
    	 $result = $conn->query($sql);

    		if($result->num_rows > 0){
    			while($row = $result->fetch_assoc()){
    				echo "<tr><td>".$row["full_name"]."</td><td>".$row["address"]."</td><td>".$row["email"]."</td><td>".$row["contact"]."</td>
					<td><a href='deleteInfo.php?id=".$row["id"]."' class='btn btn-danger'>Delete</a><a href='editInfo.php?id=".$row["id"]."'class='btn btn-primary'>Edit</a></td></tr>";
    		}
    			}
    			else{
    				echo "There is no record to show";
    			}
    			$conn->close();

   ?>
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