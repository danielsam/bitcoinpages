<?php
// Database credentials
$hostname = "localhost";
$username = "bitcoinpages";
$dbname = "bitcoinpages_test";
$password = "Senh@dobitcoinpages01";

// Connecting to the database
$link = mysqli_connect($hostname, $username, $password, $dbname);

// Check if the connection is successful
if (!$link) {
    // Log error details to a secure location instead of displaying them
    error_log("MySQL connection error: " . mysqli_connect_error());
    
    // Display a generic error message to the user
    echo "We are currently experiencing technical difficulties. Please try again later.";
    exit;
}
?>