<?php

    date_default_timezone_set('America/Sao_Paulo');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uerj_1";
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (!$mysqli->set_charset("utf8")) {
        exit();
    }