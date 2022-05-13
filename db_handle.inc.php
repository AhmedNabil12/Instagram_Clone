<?php

$db_host = "localhost";
$db_name = "instagram_clone";
$db_user = "root";
$db_pass = "";

$db_connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name); 

if(!$db_connection)
{
    die("Failed to connect to database!");
}
