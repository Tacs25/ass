<?php

// Local Development
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'access2';

// Hosting
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'access';

$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}