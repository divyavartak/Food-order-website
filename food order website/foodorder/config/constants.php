<?php
    // Start Sessions
    session_start();
//session_destroy();
    //Create Constants to store Non Repeating Values
    define('SITEURL', 'http://localhost/foodorder/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'Divya123');
    define('DB_NAME', 'food_order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) ;//or die(mysqli_error());//Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) ;//or die(mysqli_error()); //Selecting database
?>
