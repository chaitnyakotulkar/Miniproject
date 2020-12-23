<html>
<head>
	<title>Registration Form</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1 style="text-align: center;">Registration Page</h1>
		<h3 style="text-align: center;">Please Enter Your Details to Register!</h3>
		<form class="col s12" action="registration.php" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="input-field col s6">
					<input name="fname" type="text" class="validate" value="<?php echo $firstname; ?>"><span class="error"><?php echo $firstnameErr; ?></span>
					<label for="fname">First Name</label>
				</div>
				<div class="input-field col s6">
					<input name="lname" type="text" class="validate" value="<?php echo $lastname; ?>"><span class="error"><?php echo $lastnameErr; ?></span>
					<label for="lname">Last Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input name="contact" id="contact" type="tel" value="<?php echo $phone; ?>"><span class="error"><?php echo $phoneErr; ?></span>
					<label for="contact">Contact</label>
				</div>
				<div class="input-field col s6">
					<input name="age" id="age" type="text" class="validate" >
					<label for="age">Age</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="email" type="email" class="validate" value="<?php echo $email; ?>"><span class="error"><?php echo $emailErr; ?></span>
					<label for="email">Email</label>
				</div>
			</div>
			<div class="file-field input-field">
				<input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $img; ?>"><span class="error"><?php echo $imgErr; ?></span>
				<input type="submit" value="Upload Image" name="submit">
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="password" type="password" class="validate" value="<?php echo $password; ?>"><span class="error"><?php echo $pErr; ?></span>
					<label for="password">Password</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input name="cpassword" type="password" class="validate" value="<?php echo $password; ?>"><span class="error"><?php echo $pcErr; ?></span>
					<label for="cpassword">Confirm Password</label>
				</div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="submit">REGISTER
				<i class="material-icons right">send</i>
			</button>
			<a class="waves-effect waves-light btn" href="loginForm.php"><i class="material-icons right">cloud</i>LOGIN</a>
		</form>
	</div>
</body>
</html>