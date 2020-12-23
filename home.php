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

if (isset($_SESSION['emailid']) && isset($_SESSION['password'])) {

  ?>
  <h1 style="text-align: center;">Hello, <?php echo $_SESSION['firstname'];?>    <?php echo $_SESSION['lastname'] ; ?></h1>
  <?php
  $imm=$_SESSION['image'];
  $records1 = mysqli_query($conn,"SELECT * FROM Userdata WHERE image='$imm'"); 
  while($data1 = mysqli_fetch_array($records1))
  {
    ?>
    <div class="container"><img class="imgc" src="<?php echo $data1['image']; ?>" width="130" height="130" ><br><br><br>
    </div>
    <?php
  }
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>HOME</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
      img {
        border-radius: 25%;
        float: right;
      }
    </style>
  </head>
  <body>
    <div class="table-container">        
      <table class="striped">
        <thead> 
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Contact</td>
            <td>Age</td>
            <td>Image</td>
          </tr>
        </thead>
        <?php
// Using database connection file here
$records = mysqli_query($conn,"select *from Userdata"); // fetch data from database
while($data = mysqli_fetch_array($records))
{
  ?>
  <tbody>
    <tr>
      <td><?php echo $data['firstname']; ?><?php echo $data['lastname']; ?></td>
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['contact']; ?></td>
      <td><?php echo $data['age']; ?></td>
      <td><img src="<?php echo $data['image']; ?>" width="150" height="150"></td>
    </tr> 
  </tbody>
  <?php
}
?>
</table>
</div>
<a href="logout.php" class="waves-effect waves-light btn-large">LOG-OUT</a>
</body>
</html>
<?php 
}else{
  header("Location: registerForm.php");
  exit();
}
?>