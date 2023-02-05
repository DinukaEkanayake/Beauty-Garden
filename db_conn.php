<?php

$serverName="localhost";
$username="root";
$password="Dinuka1999";
$dbname="beauty-garden";

$conn=new mysqli($serverName,$username,$password,$dbname);

if ($conn->connect_error) {
    echo "error in database";
    die("Connection failed: " . $conn->connect_error);
}


?>