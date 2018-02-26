<?php
$dbServername = "localhost";
$dbUsername	= "root";
$dbPassword = "";
$dbName = "redcrossqc";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

$query = "SELECT * FROM volunteers" ;
$result = mysqli_query($conn,$query);



?>