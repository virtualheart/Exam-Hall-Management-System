<?php


$servername = "localhost";
$username = "smk";
$password = "";
$dbname = "auto";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?> 