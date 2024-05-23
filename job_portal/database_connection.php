<?php
// Connection
$host = "localhost";
$user = "Julliette";
$pass = "222013825";
$database = "jobs_portal";

// Create the connection
$connection = new mysqli($host, $user, $pass, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>