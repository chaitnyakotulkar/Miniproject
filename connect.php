<?php
$servername = "localhost";
$username = "padmin";
$password = "root";
$dbname="Registration";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
