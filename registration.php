<html>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<?php

session_start();

include('connect.php');


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$password1= md5($password);
$_SESSION['pass']="$password1";

$age=$_POST['age'];

?>



<?php



$dup= mysqli_query($conn, "SELECT * FROM login_details where emailid='$email'");

if(mysqli_num_rows($dup)>0){
	
	?>
	<script>

		
swal({
  title: "error!",
  text: "Email already taken.",
  type: "error",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "index.php";
});


	</script>
	<?php

}
	else{
		?>
		<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
	?>
	<script>
	swal({
  title: "error!",
  text: "Duplicate image entry if not try changing name.",
  type: "error",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "index.php";
});
</script>
	<?php
  
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
	?>
	<script>
	swal({
  title: "error!",
  text: "file too large.",
  type: "error",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "index.php";
});
</script>
	
	<?php

  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	
	?>
	<script>
	swal({
  title: "error!",
  text: "Sorry, only JPG, JPEG, PNG & GIF files are allowed..",
  type: "error",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "index.php";
});
</script>
	<?php
	
 
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
?>

<?php
$sql="INSERT INTO login_details(firstname, lastname,emailid,password,contact,age,image) VALUES ('$firstname','$lastname','$email','$password1','$phone','$age','$target_file')";

$result= mysqli_query($conn,$sql);
	
	if($result)
	{
		
		echo"data inserted successfully";
		?>
		<script>
swal({
  title: "Success",
  text: "Registration Successfull .",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "login.php";
});
	</script>
		<?php
		
	}	
	
else{
	
	echo"data not inserted";
}
	}
?>

<?php

  } 
}
?>
		
</body>
</html>