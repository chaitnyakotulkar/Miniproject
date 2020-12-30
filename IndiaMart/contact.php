<?php
$servername = "localhost";
$username = "padmin";
$password = "root";
$dbname = "Store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);

// Attempt insert query execution
$sql = "INSERT INTO info (firstname, lastname, email, contact) VALUES ('$first_name', '$last_name', '$email', '$contact')";
if(mysqli_query($conn, $sql)){
  echo "<script type='text/javascript'>alert('You will get a Call within 24hours.');</script>";
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
  <title>IndiaMart</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/marketlogo.png">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  

</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="home.php" class="brand-logo"><i class="material-icons">local_grocery_store</i>IndiaMart</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home.html">Home</a></li>
        <li><a href="list.html">Products</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
  </nav>
  <br>

  <div class="container">
    <h2 style="text-align: center;">Contact Us</h2>
    <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input   name="first_name" id="first_name" type="text" class="validate" required>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input name="last_name" id="last_name" type="text" class="validate" required>
          <label for="last_name">Last Name</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">phone</i>
          <input name="contact" id="contact" type="tel" class="validate" required>
          <label for="contact">Contact</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input name="email" id="email" type="email" class="validate" required>
          <label for="email">Email</label>
          <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
        </div>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">IndianMart</h5>
          <p class="grey-text text-lighten-4">Great Discount On Every Clothing & Accesories.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Menu</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="home.html">Home</a></li>
            <li><a class="grey-text text-lighten-3" href="list.html">Products</a></li>
            <li><a class="grey-text text-lighten-3" href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2020 IndiaMart Pvt Ltd.
        <a class="grey-text text-lighten-4 right" href="home.html">Go to Home</a>
      </div>
    </div>
  </footer>



</body>
</html>