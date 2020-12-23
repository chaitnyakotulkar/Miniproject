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
//echo "Connected successfully";

// Create database
/*$sql = "CREATE DATABASE RegistrationDb";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE Userdata (
firstname VARCHAR(30),
lastname VARCHAR(30),
contact INT(30),
age INT(30),
email VARCHAR(50),
password VARCHAR(50),
image VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Userdata created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
*/

$conn->close();
?>