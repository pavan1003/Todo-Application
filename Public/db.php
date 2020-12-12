<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

$conn = new mysqli($servername, $username, $password,);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
  }

$sql = "CREATE DATABASE todo";
mysqli_query($conn, $sql);

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE `todo_work` (
  `id` int(10) NOT NULL,
  `todo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";
mysqli_query($conn, $sql);
$sql="ALTER TABLE `todo_work`
  ADD PRIMARY KEY (`id`);";
mysqli_query($conn, $sql);
$sql="ALTER TABLE `todo_work`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;";
mysqli_query($conn, $sql);
?>