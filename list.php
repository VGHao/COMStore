<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <style>
        body{
            padding-top: 50px;
        }
        table{

            text-align: center;
        }
        td{
            padding: 10px;
        }
        tr.item{
            border-top: 1px solid #5e5e5e;
            border-bottom: 1px solid #5e5e5e;
        }

        tr.item:hover{
            background-color: #d9edf7;
        }

        tr.item td{
            min-width: 150px;
        }

        tr.header{
            font-weight: bold;
        }

        a{
            text-decoration: none;
        }
        a:hover{
            color: deeppink;
            font-weight: bold;
        }
    </style>

    <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td>
                <a href="formproduct.php">Add Product</a>
            </td>
            <td colspan = "2">
                <a href="index.php">Home</a>
            </td>
            <td style=" text-align: right;">
                <font color="#8e1b0e" size="+1">Hello <?php echo $_SESSION["user"]; ?>!</font>
            </td>
            <td>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr class="header">
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
        <?php
        require "connection.php";
        
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
        ?>
        <tr class="item">
            <td><img src="<?php echo $row["image"] ?>" style="max-height: 80px"></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["price"]?></td>
            <td><?php echo $row["description"] ?></td>
            <td><a href="formproduct.php?id=<?php echo $row["id"] ?>">Edit</a> | <a href="delete.php?id=<?php echo $row["id"] ?>" class="delete">Delete</a></td>
        </tr>
        <?php 
        }
        ?>
        <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
            <td colspan="5">
                <p>Product number: <?php echo $result->num_rows ?></p>
            </td>
        </tr>
    </table>
    
    <div class="bg-dark">
		<div class="container">
			<!-- Footer -->
			<footer class="page-footer font-small blue">
				<!-- Copyright -->
				<div class="footer-copyright text-center py-3">© 2020 Copyright by VGHao</div>
				<!-- Copyright -->
			</footer>
			<!-- Footer -->
		</div>
	</div>
</body>
</html>