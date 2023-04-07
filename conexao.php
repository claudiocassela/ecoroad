<?php

$serv = "localhost";
$user = "root";
$pass = "univesp";
$data = "univesp";

$conn = new mysqli($serv, $user, $pass, $data);
/*
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/
?>