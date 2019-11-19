<?php

// $dbServername = "127.0.0.1";
// $dbUsername = "arkaph_dev";
// $dbPassword = "691U[gf7Cl7U";
// $dbName = "arkaph_dev";

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "dev_ihub";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
// $connect = new PDO('mysql:host=localhost;dbname=filceb_dev', 'filceb_dev', 'Tg8m3d8k6lb3');

if (!$conn) {
	die('Connection failed:' . mysqli_connect_error($conn));
}

?>