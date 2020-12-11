<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration</title>
    
</head>
<body>
    <?php
    require('connection.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
            // removes backslashes
        $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
        $username = mysqli_real_escape_string($conn,$username); 
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn,$email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($conn,$phone);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($conn,$address);
        
            $query = "INSERT into `user` (email, username, password, phone, address)
    VALUES ('$email', '$username', '".md5($password)."', '$phone', '$address')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<div class='form'>
    <font color='#8e1b0e' size='+2'>You are registered successfully.</font>
    <br/>Click here to <a href='login.php'>Login</a>!!</div>";
            }
        }else{
    ?>
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

    <!--div class="form"-->
    <center style = "margin-top: 80px">
    <div style= "width: 450px; height: 230px; text-align: left; align: center">
        <form name="registration" action="" method="post">
            <table width="100%" cellspacing="5" border-spacing: 15px>
                <tr><th colspan="2" style="text-align: center" height="50px"><h3>Registration Form</h3></th></tr>
                <tr><td colspan="2"></td></tr>
                <tr>
                    <td>User name:</td><td><input type="text" name="username" placeholder="Username" required /></td>
                </tr>
                <tr>
                    <td>Email:</td><td><input type="email" name="email" placeholder="Email" required /></td>
                </tr>
                <tr>
                    <td>Password:</td><td> <input type="password" name="password" placeholder="Password" required /></td>
                </tr>
                <tr>
                    <td>Phone:</td><td> <input type="text" name="phone" placeholder="Phone" required /></td>
                </tr>
                <tr>
                    <td>Address:</td><td> <input type="text" name="address" placeholder="Address" required /></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="bgcolor: #cdcdcd"><input type="submit" name="submit" value="Register" />
                        <input type="reset" name="reset" value="Reset"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href = "login.php">Already have an account? Login</a>
                    </td>    
                </tr>
            </table>
        </form>
    </div>
    </center>
    <?php } ?>
</body>
</html>