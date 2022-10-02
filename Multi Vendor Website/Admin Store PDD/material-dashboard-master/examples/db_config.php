<?php 

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'task30';

//connect to db
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// check connection
if ($conn->connect_error) {
    die( 'Connection failed: ' . $conn->connect_error );
}

define('APP_NAME', 'ADMIN');


?>