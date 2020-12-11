<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Cart</title>
</head>

<body>
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
						<a class="nav-link" href="cart.php">Cart</a>
					</li>

                    <li class="nav-item">
						<a class="nav-link" href="logout.php">
							<?php 
								if(isset($_SESSION["user"])) echo "Sign out";
							?> 
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    
    <div class="container" style = "margin-top: 100px">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require "connection.php";
                        $sum = 0;
                        $uid = "";
                        $uname = stripslashes($_SESSION["user"]);

                        $sql = "SELECT * FROM user WHERE username = '$uname'";
                        $result = $conn->query($sql) or die($conn->error);
                        $row=$result->fetch_assoc();
                        $uid = $row["id"];

                        $sql = "SELECT * FROM cart WHERE uid = '$uid'";
                        $result = $conn->query($sql) or die($conn->error);
                        while ($rows=$result->fetch_assoc()){
                            $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                            $results = $conn->query($query) or die($conn->error); 
                            $row=$results->fetch_assoc();
                            $sum += $row["price"]*$rows["quantity"];
                    ?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                            <div class="media">
                                 <img class="media-object" src="
                                <?php
                                    $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                                    $results = $conn->query($query) or die($conn->error); 
                                    $row=$results->fetch_assoc();
                                    echo $row["image"];
                                ?>
                                " style="width: 250px; height: 150px;">
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">
                                        <?php
                                        $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                                        $results = $conn->query($query) or die($conn->error); 
                                        $row=$results->fetch_assoc();
                                        echo $row["name"];
                                        ?>
                                    </a>
                                    </h4>
                                    <h5 class="media-heading"> by <a href="#">
                                    <?php
                                        $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                                        $results = $conn->query($query) or die($conn->error); 
                                        $row=$results->fetch_assoc();
                                        echo $row["category"];
                                    ?>
                                    </a></h5>
                                </div>

                            </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <?php echo $rows["quantity"] ?>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>
                                <?php
                                    $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                                    $results = $conn->query($query) or die($conn->error); 
                                    $row=$results->fetch_assoc();
                                    echo number_format($row["price"], 0, '', ',')."đ";
                                ?>
                            </strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>
                                <?php
                                    $query = "SELECT * FROM product WHERE id = ".$rows["pid"];
                                    $results = $conn->query($query) or die($conn->error); 
                                    $row=$results->fetch_assoc();
                                    echo number_format($row["price"]*$rows["quantity"], 0, '', ',')."đ";
                                ?>    
                            </strong></td>
                            <td class="col-sm-1 col-md-1">
                            <button onclick="window.location.href='removecart.php?id=<?php echo $rows['id'];?>'" type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button></td>
                        </tr>

                    <?php 
                    }
                    ?>
        
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong>
                            <?php
                                echo number_format($sum, 0, '', ',')."đ";
                            ?></strong></h3></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                            <button onclick= "window.location.href='index.php'" type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </button></td>
                            <td>
                            <button type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="bg-dark" style= "width:100%">
		<div class="container">
			<!-- Footer -->
			<footer class="page-footer font-small blue">
				<!-- Copyright -->
				<div class="footer-copyright text-center py-3 " style ="color: white;">© 2020 Copyright by VGHao</div>
				<!-- Copyright -->
			</footer>
			<!-- Footer -->
		</div>
	</div>
		
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>