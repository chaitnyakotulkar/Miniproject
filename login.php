<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log in form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            

    </head>
    <body>
    <div>
 
	
    </div>
      <div>
            <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-6 col-lg-6 centered">
                        <h1>Login</h1>
                        <p>Filled in Details</p>
                        <hr class="mb-3">

                         <div class="row">
                    <div class="input-field col s6">
                        <input name="firstname" type="text" pattern="[a-zA-Z]+" class="validate">
                        <label for="first_name">First Name</label>
                    </div>

                        <div class="row">
                    <div class="input-field col s6">
                        <input name="password" type="text"  class="validate">
                        <label for="password">Password</label>
                    </div>


                        <input class="btn btn-primary" type="submit" name="create" value="log in">
						  <a  href="index.php"><button class="btn waves-effect waves-light">Back</button></a>
                    </div>
                </div>
            </div>

            </form>
			

		
  </div>
    </body>
</html>