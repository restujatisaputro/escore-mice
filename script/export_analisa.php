<?php
// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbHost = "localhost";
$dbName = "u197914754_green";
$dbChar = "utf8mb4";
$dbUser = "u197914754_green";
$dbPass = "Andri13021980";
$pdo = new PDO(
  "mysql:host=$dbHost;dbname=$dbName;charset=$dbChar",
  $dbUser, $dbPass, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
]);

// (B) HTTP CSV HEADERS
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"export.csv\"");

// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$out = fopen("php://output", "w");
$stmt = $pdo->prepare("SELECT * FROM `tb_analisakeyword`");
$stmt->execute();
while ($row = $stmt->fetch()) { fputcsv($out, $row); }
fclose($out);
			 