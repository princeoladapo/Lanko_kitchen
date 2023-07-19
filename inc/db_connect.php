<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'lanko_db');

    if(!$conn) {
        die("Could not connect to database: " . mysqli_connect_error());
    }
?>