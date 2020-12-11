<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add product</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">
	<?php
	$id = "";
	$name = "";
	$category = "";
	$price = "";
  $description = "";
  $img = "";
	$title = "Add Product";
	$buttonTitle = "Add";
	
	if (isset($_GET["id"])) {
		require "connection.php";
		$id = $_GET["id"];
		$sql = "SELECT * FROM product WHERE id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row) {
			$name = $row["name"];
			$category = $row["category"];
			$price = $row["price"];
      $description = $row["description"];
      $img = $row["image"];
		}
		$title = "Edit Product";
		$buttonTitle = "Update";
	}
	
	?>

    <div class="container">
      <div class="py-5 text-center">
        <h2><?php echo $title ?></h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="processformproduct.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="mb-3">
              <label for="name">Name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
              </div>
            </div>
			
			<div class="mb-3">
        <label for="name">Category</label>
        <div class="input-group">
          <select class="input-group" name="category">
            <option value="acer" <?php echo $category=="acer"? "selected" : "" ?>>Acer</option>
            <option value="apple" <?php echo $category=="apple"? "selected" : "" ?>>Apple</option>
            <option value="asus" <?php echo $category=="asus"? "selected" : "" ?>>Asus</option>
            <option value="dell" <?php echo $category=="dell"? "selected" : "" ?>>Dell</option>
            <option value="hp" <?php echo $category=="hp"? "selected" : "" ?>>HP</option>
            <option value="lenovo" <?php echo $category=="lenovo"? "selected" : "" ?>>Lenovo</option>
            <option value="msi" <?php echo $category=="msi"? "selected" : "" ?>>MSi</option> 
          </select>
        </div>
      </div>
			
			<div class="mb-3">
              <label for="price">Price</label>
              <div class="input-group">
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" required>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="description">Description</label>
              <div class="input-group">
                <textarea class="form-control" id="description" name="description" rows="7" cols="80" required><?php echo $description ?></textarea>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="fileToUpload">Image</label>
              <div class="input-group">
                <input type="file" id="fileToUpload" name="fileToUpload" required>
              </div>
            </div>
			
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
				<?php echo $buttonTitle ?>
			</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>