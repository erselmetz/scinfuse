<?php

$host = 'localhost';
$user = 'roow';
$pass = '';
$dbname = 'scinfuse';

$db = new mysqli($host,$user,$pass,$dbname);

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
}