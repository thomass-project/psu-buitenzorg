<?php
$server="localhost";
$username="root";
$password="";
$database="college_db";
$link=mysqli_connect($server,$username,$password,$database);
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>