<?php
$conn = new mysqli("localhost" , "root", "Easelm93$", "gamescommunity");

    if(!$conn)
    {
        die("Connection failed " . mysqli_connect_error());
    }
    return $conn;
?>