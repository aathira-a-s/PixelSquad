
<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "fullstack"; // Ensure this matches the database name in phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>