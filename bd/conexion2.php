<?php
    $servername = "localhost";
    $username = "root";
	$password = "";
	$db = "kardex";
	$link = new mysqli($servername, $username, $password,$db);
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    } 
    echo json_encode($link, JSON_FORCE_OBJECT);
?>