<?php
    session_start();
    define('SITEURL','http://localhost/CoffeeShop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn,'coffee') or die(mysqli_error($conn));


?>