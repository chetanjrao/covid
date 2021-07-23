<?php
include('constants.php');
$host = "localhost";
$port = 3306;
$db = "covid";
$user = "root";
$password = "root";
$connection = mysqli_connect($host, $user, $password, $db, $port);
?>