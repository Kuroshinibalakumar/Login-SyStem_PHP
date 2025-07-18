<?php

$severname = "localhost";
$DBUsername = "root";
$DBpassword = "";
$DBname = "phpproject02";

$conn = mysqli_connect($severname,$DBUsername,$DBpassword,$DBname );
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
