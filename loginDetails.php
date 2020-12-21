<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User Registration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
 
<?php


 
include('connect.php');

session_start();
$username=$_SESSION['name'];
$password=$_SESSION['pass'];

	?>



    </head>
    <body>
    <div>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </div>
      <div class="header">
	  
  
  
  <ul id="left-nav">
  <li><h3>Hello</h3></li>
  <li><p>Welcome USER!</p></li>
</ul>
  <?php


$sql="select * from login_details where firstname='$username' && password='$password'";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);{
	



 

?>
<ul id="right-nav">
  <li><img width='60' height='60' class="rounded-circle" src="<?php echo $row['image'];  ?> "/><li>
  
  <li> <span style="text-transform: uppercase;">HI <?php echo $row['firstname']; ?></span></li>
  <?php
}
  ?>
  <li><a  href="login.php"><button type="button" class="btn btn-primary">Logout</button></a></li>
  </ul>
  </div>
  <br>

    <div class="container">
                <div class="row">
				 <div class="col-sm-6 col-md-1 col-lg-1">
				 
				 </div>
                    <div class="col-sm-6 col-md-10 col-lg-10  " style=" background-color: #BC1A3A;color:white;">
                        <h1>Log in Details</h1>
                     
	
	
	  <table class="table table-striped text-white">
	  <thead>
<tr>
<th colspan="4" >Firstname</th>
<th colspan="4">Lastname</th>

<th colspan="4">Emailid</th>
<th colspan="4">contact</th>
<th colspan="4">age</th>
<th colspan="4">image</th>
</tr>
</thead>
<tbody>
<tr>
  <?php


$sql = "SELECT * FROM login_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
  
	



 

?>
<td colspan="4"><?php echo $row['firstname'] ?></td>
<td colspan="4"><?php echo $row['lastname'] ?></td>
<td colspan="4"><?php echo $row['emailid'] ?></td>
<td colspan="4"><?php echo $row['contact'] ?></td>
<td colspan="4"><?php echo $row['age'] ?></td>
<td colspan="4"> <img width='120' height='120' src="<?php echo $row['image'];  ?> "/> </td>

</tr>
</tbody>
	<?php
	}
}

 else {
  echo "0 results";
}
 
?>
	</table>
	<hr class="mb-3">
                        
						
</div>
  
<div class="col-sm-6 col-md-1 col-lg-1 ">
				 
				 </div>

		
  </div>
  </div>
    </body>
</html>