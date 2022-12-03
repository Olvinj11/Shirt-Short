<?php

    $hostname = "localhost";
    $database = "desarrollo_aplicaciones";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $database);

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    }
    
    $urlweb="http://localhost/proyecto_web/";
    
?>