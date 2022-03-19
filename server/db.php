<?php

$host = 'sg2nlmysql57plsk.secureserver.net:3306';
$user = 'scinfuse';
$pass = 'Scinfuse1';
$dbname = 'scinfuse';

$db = new mysqli($host,$user,$pass,$dbname);

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
}