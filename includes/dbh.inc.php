
<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "logsystem";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
