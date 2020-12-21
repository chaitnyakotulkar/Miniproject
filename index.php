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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>

    <div class="container"> 
        <form  class="col s12" action="registration.php" method="post" enctype="multipart/form-data">



            <h1 style="text-align: center;">Registration</h1>
            <p style="text-align: center;">Fill Up The Form With Correct Values</p>


            <div class="row">
                <div class="input-field col s6">
                    <input name="fname" type="text" pattern="[a-zA-Z]+" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input name="lname"  type="text" pattern="[a-zA-Z]+" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input name="contact"  type="text"  class="validate">
                    <label for="contact_number">Contact</label>
                </div>
                <div class="input-field col s6">
                    <input  type="number"  name="age" min="18" max="60" class="validate">
                    <label for="age">Age</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password"  type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input  name="confirmpassword" type="password" class="validate">
                    <label for="cpassword">Confirm Password</label>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="signup">SIGNUP
                <i class="material-icons right">send</i>
            </button>
            <a  href="login.php"><button class="btn waves-effect waves-light" type="submit" name="login">LOGIN</button></a>



        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      

    <script>
// confirmpassword and password validation
function Validate() {
    var password = document.getElementById("login-forms-password").value;
    var confirmPassword = document.getElementById("login-confirm-password").value;
    if (password != confirmPassword) {
        alert('password and confirm password wont match');

        return false;
    }
    return true;
}
</script>


</body>
</html>