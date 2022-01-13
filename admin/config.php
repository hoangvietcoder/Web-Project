<?php
$mysqli = new mysqli("localhost", "root", "", "ql_ungdung");
mysqli_query($mysqli,"SET NAMES 'UTF8'");
// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
