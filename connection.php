<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "creative_showcase";

$con = new MySQLi($host, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>