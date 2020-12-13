<?php
	session_start();
	if(isset($_SESSION["user"])){
		header("Location: index.php");
		exit();
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

	<style>
	html, 
	body {
	  height: 100%;
	}

	body {
	  display: -ms-flexbox;
	  display: -webkit-box;
	  display: flex;
	  -ms-flex-align: center;
	  -ms-flex-pack: center;
	  -webkit-box-align: center;
	  align-items: center;
	  -webkit-box-pack: center;
	  justify-content: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}

	.form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .checkbox {
	  font-weight: 400;
	}
	.form-signin .form-control {
	  position: relative;
	  box-sizing: border-box;
	  height: auto;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
  </head>

  <body class="text-center">

  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">Computer Shop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="login.php">
							<?php 
								if(isset($_SESSION["user"])) {echo $_SESSION["user"];} else {echo "Login";}
							?> 
						</a>
						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="list.php">Manage Item</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Cart</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<form class="form-signin" method="post" action="">
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

		<label for="email" class="sr-only">Email</label>
		<input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
		
		<label for="password" class="sr-only">Password</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<a href = "signup.php">Create an account? Sign up</a>  
		<?php
		require('connection.php');
		if (isset($_POST["email"]) && isset($_POST["password"])) {
			// removes backslashes
			$email = stripslashes($_REQUEST['email']);
			//escapes special characters in a string
			$email= mysqli_real_escape_string($conn,$email);
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($conn,$password);

			$sql = "SELECT * FROM user WHERE email= '$email' AND password= '".md5($password)."' ";
			$result = mysqli_query($conn,$sql) or die(mysql_error());
			$rows = mysqli_fetch_assoc($result);
			//echo $rows["username"];
			if ($rows > 0) {
				$_SESSION["user"] = $rows["username"];
				header("Location: index.php");
			} else {
				echo "<p>INVALID USERNAME OR PASSWORD</p>";
			}
		}
		?>
		</form>
	</div>

  </body>
</html>
