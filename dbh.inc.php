<?php

$servername = "localhost";
$dbUsername = "root";
$dbpassword ="";
$dbName = "loginsystem";

$conx = mysqli_connect($servername ,$dbUsername ,$dbpassword ,$dbName);

if (!$conx) {
   die("connexion faild: ".mysqli_connect_error());
}