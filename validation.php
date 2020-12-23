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
session_start(); 
if (isset($_POST['email']) && isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['email']);
	$pass = validate($_POST['password']);
	if (empty($uname)) {
		header("Location: loginForm.php?error=User Name is required");
		exit();
	}else if(empty($pass)){
		header("Location: loginForm.php?error=Password is required");
		exit();
	}else{
		$sql = "SELECT * FROM Userdata WHERE email='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['email'] === $uname && $row['password'] === $pass) {
				$_SESSION['emailid'] = $row['email'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['image'] = $row['image'];
				header("Location: home.php");
				exit();
			}else{
				header("Location: loginForm.php?error=Incorect User name or password");
				exit();
			}
		}else{
			header("Location: loginForm.php?error=Incorect User name or password");
			exit();
		}
	}
}else{
	header("Location: loginForm.php");
	exit();
}





