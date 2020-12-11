<?php
session_start();
require "connection.php";
if(empty($_GET["user"])){
    header("Location: login.php");
}

$uid = "";
$uname = stripslashes($_GET["user"]);
$pid = intval($_GET["pid"]);

$sql = "SELECT * FROM user WHERE username = '$uname'";
$result = $conn->query($sql) or die($conn->error);
$row=$result->fetch_assoc();
$uid = $row["id"];

$query = "SELECT * FROM cart WHERE uid = '$uid' AND pid = '$pid'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_fetch_assoc($result);
//echo $rows["uid"];
if ($rows > 0) {
    //echo "FOUND!";
    $quantity = intval($rows["quantity"]) + 1;
    $sql = "UPDATE cart SET quantity = '$quantity' WHERE uid = '$uid' AND pid = '$pid'";
    $result = mysqli_query($conn,$sql);
} else {
    //echo "NOT FOUND!";
    $sql = "INSERT INTO cart(uid, pid, quantity) 
    VALUES ($uid, $pid, 1)";
    $result = mysqli_query($conn,$sql);
}

$conn->close();

//echo "<p>uid '$uid' pid '$pid'</p>";
header("Location: productdetail.php?id=".$pid);
?>