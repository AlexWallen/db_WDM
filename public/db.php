<?php
$servername = "mybraadb.cwqg0wxijz8a.us-west-2.rds.amazonaws.com";
$username = "Alex_Wallen";
$password = "siksdg7725nng";
$database = "WDB_Group1";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>