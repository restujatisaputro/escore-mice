<?php 
$host = "localhost";
$user = "rest6794_imam";
$password = "R3m3mb3rm3!";
$database = "rest6794_imam";

$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>