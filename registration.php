<?php
$servername = "localhost";
$username = "padmin";
$password = "root";
$dbname = "RegistrationDb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {   
  die("Connection failed: " . $conn->connect_error);
}
function filterFirstName($field){                                                                                     // Functions to filter user inputs
$field = filter_var(trim($field), FILTER_SANITIZE_STRING);                                                  // Sanitize user name
if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){      // Validate user name
  return $field;
} else{
  return FALSE;
}
} 
function filterLastName($field){                                                                                     // Functions to filter user inputs
$field = filter_var(trim($field), FILTER_SANITIZE_STRING);                                                  // Sanitize user name
if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){      // Validate user name
  return $field;
} else{
  return FALSE;
}
}  
function filterAge($field){
  $field = filter_var(trim($field), FILTER_SANITIZE_NUMBER_INT);
  $min=18;
  $max=60 ;
  if (filter_var($field, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    return FALSE;
  } else{
    return $field;
  }
} 
function filterEmail($field){
$field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);                                                   // Sanitize e-mail address
if(filter_var($field, FILTER_VALIDATE_EMAIL)){                                                              // Validate e-mail address
  return $field;
} else{
  return FALSE;
}
}
function validating($field){
  $field = filter_var($field, FILTER_SANITIZE_NUMBER_INT); 
  if(preg_match('/^[0-9]{10}+$/', $field)) {
    return $field;
  }else{
    return FALSE;
  }
}
$firstnameErr = $lastnameErr =$ageErr = $emailErr = $contactErr= $pErr=$pcErr=$imgErr= "";
$firstname = $lastname = $age = $email= $contact= $password = $cpassword = $image="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Validate first name
  if(empty($_POST["fname"])){
    $firstnameErr = "Please enter your first name.";
  } else{
    $firstname = filterFirstName($_POST["fname"]);
    if($firstname == FALSE){
      $firstnameErr = "Please enter a valid name.";
    }
  }
  if(empty($_POST["lname"])){
    $lastnameErr = "Please enter your last name.";
  } else{
    $lastname = filterLastName($_POST["lname"]);
    if($lastname == FALSE){
      $lastnameErr = "Please enter a valid name.";
    }
  }

//validate age
  if(empty($_POST["age"])){
    $ageErr = "Please enter your age.";
  }else{
    $age=filterAge($_POST["age"]);
    if($age == FALSE){
      $ageErr = "Please enter a valid age.";
    }
  }
  if(empty($_POST["email"])){
    $emailErr = "Please enter your email address.";     
  } 
  else{ $email = filterEmail($_POST["email"]);
  if($email == FALSE){
    $emailErr = "Please enter a valid email address.";
  }

  else{     $s="select * from Userdata where email= '$email'";
  $res=mysqli_query($conn,$s);
  $num=mysqli_num_rows($res);
  if($num==1){
    $emailErr="email already exist"; 
  }
}
}
if(empty($_POST["contact"])){
  $contactErr = "Please enter 10 digit phone number.";     
} else{
  $contact = validating($_POST["contact"]);
  if($contact == FALSE){
    $contactErr = "Please enter a valid phone number.";
  }
}
if(empty($_POST["password"])){
  $pErr= "please enter password";
} else{
  $password =$_POST['password'];
}
if(empty($_POST["cpassword"])){
  $pcErr= "please enter password";
} else{
  $cpassword =$_POST['cpassword'];
}
if($password != $cpassword){
  $pErr="enter valid password";
}

if(empty($_POST["fileToUpload"])){
  $imgErr = "Please upload image";     
} 
else{
  $imgErr="";
}
}
if(isset($_POST['submit'])) {  
  $password_1 = md5($password);
  $image=$_POST['fileToUpload'];
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
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
// Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
// Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
if($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $contactErr == "" && $pErr == "" && $pcErr == "" && $ageErr == "") { 
  echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>"; 
  $sql = "INSERT INTO Userdata (firstname, lastname, contact, age, email, password, image)
  VALUES ('$firstname', '$lastname', '$contact', '$age', '$email', '$password' , '$target_file')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $firstname = $lastname = $age = $email= $contact= $password = $cpassword = $fileToUpload="";
}
else {  
  echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
}  
}  
$conn->close();
?>

