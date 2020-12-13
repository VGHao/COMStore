<?php
  session_start();
  if(!isset($_GET["id"])){
    header("Location:index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Product Detail</title>
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
        <?php
        $id = "";
        $name = "";
        $price = "";
        $category = "";
        $description = "";
        $img = "";
      
        if (isset($_GET["id"])) {
            require "connection.php";
            $id = $_GET["id"];
            $sql = "SELECT * FROM product WHERE id=" . $id;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row) {
                $name = $row["name"];
                $price = $row["price"];
                $description = $row["description"];
                $img = $row["image"];
                $category = $row["category"];
            }
        }
        ?>    
             
      <!-- Page Content -->
<div class="container">

<!-- Portfolio Item Heading -->
<h1 class="my-4"> <?php echo $name;?>
</h1>

<!-- Portfolio Item Row -->
<div class="row">

  <div class="col-md-8">
    <img class="img-fluid" src="<?php echo $img;?>" alt="">
  </div>

  <div class="col-md-4">
    <h3 class="my-3">Price</h3>
    <p style = "font-size: 40px; color: red;"><?php echo number_format($price, 0, '', ',')."đ";?></p>
    <h3 class="my-3">Product Details</h3>
    <p><?php echo nl2br($description);?></p>
    <button onclick="window.location.href='addtocart.php?user=<?php echo $_SESSION['user'];?>&pid=<?php echo $id;?>'; alert('Added to cart!!');" class="btn btn-lg btn-primary btn-block" type="submit">Add to cart</button>
  </div>

</div>
<!-- /.row -->

<!-- Related Projects Row -->
<h3 class="my-4">Related Product</h3>

<div class="row">
<?php 
  require "connection.php";   
  $sql = "SELECT * FROM product WHERE category = '$category'";
  $result = $conn->query($sql);    
  while($row = $result->fetch_assoc()) {
?>
  <div class="col-md-3 col-sm-6 mb-4">
    <a href = "productdetail.php?id=<?php echo $row["id"]?>">
      <div class="card">
        <img src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text" style = "color: red; font-size: 20px;"><?php echo number_format($row["price"], 0, '', ',')."đ"; ?></p>
        </div>
      </div>
    </a>
  </div>
  <?php
    }
  ?>

</div>


  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright by VGHao</div>
    <!-- Copyright -->
  </footer>

		
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>