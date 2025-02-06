<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "Staff_DB";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}

?>