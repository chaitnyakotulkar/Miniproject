<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">LOG-IN FORM</h1>
		<h4 style="text-align: center;">Already a member login here</h4>
 <form class="col s12" action="validation.php" method="post">
      <div class="row">   
           <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input name="email"  type="email" class="validate">
          <label for="icon_prefix">Email</label>
        </div>
    </div>
<div class="row">
	  <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input name="password"  type="password" class="validate">
          <label for="icon_telephone">password</label>

        </div>
</div>

<button class="btn waves-effect waves-light" type="submit" name="login">Submit
    <i class="material-icons right">send</i>
  </button>
  <a class="waves-effect waves-light btn" href="registerForm.php"><i class="material-icons left">keyboard_arrow_left</i>BACK</a>
      </form>
	</div>
</body>
</html>

