<?php 
$host = "localhost";
$user = "escore-mice";
$password = "uVHAxf9lPFsOShSnSnjWfZ6Bt";
$database = "escore_mice";

$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>