<?php
$servername= "localhost";
$username = "root";
$password = "";
$dbName = "blog_posts";

$conn = new mysqli($servername, $username, $password,$dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
