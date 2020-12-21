<html>
<head>
<?php
session_start();
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<?php

include('connect.php');
$name=$_POST['firstname'];
$_SESSION['name']="$name";
$password=$_POST['password'];
$password1= md5($password);
$_SESSION['pass']="$password1";

// $pass=$_POST['password'];
// $_SESSION['pass']="$pass";
// $password1= md5($password);
// $_SESSION['pass']="$password1";

$dup="select * from login_details where firstname='$name' && password='$password1'";

$result=mysqli_query($conn,$dup);

$num=mysqli_num_rows($result);
if($num==1)
{
	
	?>
	<script>

		
swal({
  title: "logged in!",
  text: "log in successfully .",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
	
      	window.location.href="login-details.php";
});


	</script>
	
	<?php

}
else{
	?>
		<script>

		
swal({
  title: "Error!",
  text: "please verify username and password .",
  type: "error",
  timer: 2000,
  showConfirmButton: false
}, function(){
	
      	window.location.href="login.php";
});


	</script>
	<?php
}




	
	?>
	
	<?php
//header('Location:sign-up.php');



?>

	<?php
	
	
?>
</body>
</html>