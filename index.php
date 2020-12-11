<?php
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Main Page</title>
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
		
		<div class="container" style="margin-top: 60px">
			<div class="row">
				<div class="col-sm-3">
					<h1>Category</h1>
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?category=all">All</a></li>
						<li class="list-group-item"><a href="index.php?category=acer">Acer</a></li>
						<li class="list-group-item"><a href="index.php?category=apple">Apple</a></li>
						<li class="list-group-item"><a href="index.php?category=asus">Asus</a></li>
						<li class="list-group-item"><a href="index.php?category=dell">Dell</a></li>
						<li class="list-group-item"><a href="index.php?category=hp">HP</a></li>
						<li class="list-group-item"><a href="index.php?category=lenovo">Lenovo</a></li>
						<li class="list-group-item"><a href="index.php?category=msi">MSi</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="Laptop_Banner.jpg" width="900" height="300" class="d-block w-100" alt="https://via.placeholder.com/900x350">
							</div>
							<div class="carousel-item">
								<img src="Laptop_Banner2.jpg" width="900" height="300" class="d-block w-100" alt="https://via.placeholder.com/900x350">
							</div>
							<div class="carousel-item">
								<img src="Laptop_Banner3.jpg" width="900" height="300" class="d-block w-100" alt="https://via.placeholder.com/900x350">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				
					
					<div class="row mt-3">
						<?php
						require "connection.php";
						$sql = "SELECT * FROM product";
						if (isset($_GET["category"])) {
							$category = $_GET["category"];
							if($category == "all"){
								$sql .= "";
							} else {
								$sql .= " WHERE category='$category'";
							}
						}
						$result = $conn->query($sql);
						while ($row=$result->fetch_assoc()) {
						?>
							<div class="col-sm-4 mt-2">
								<a href = "productdetail.php?id=<?php echo $row["id"]?>">
									<div class="card">
										<img src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row["name"] ?></h5>
											<p class="card-text" style = "color: red; font-size: 20px"><?php echo number_format($row["price"], 0, '', ',')."đ"; ?></p>
										</div>
									</div>
								</a>	
							</div>
						<?php 
						}
						?>
					</div>
					
				</div>
			</div>
		</div>

	<div class="bg-dark">
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
</html>