<?php


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'lj2-c2-protestalooza';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (!$connection) {
    echo "Something went wrong...";
}




?>