<?php
// config/database.php

function connectDatabase() {
    $hostname = "localhost";
    $username = "bitcoinpages";
    $password = "bitcoinpages";
    $dbname = "Senh@dobitcoinpages01";

    $link = mysqli_connect($hostname, $username, $password, $dbname);

    if (!$link) {
        die("Error: Unable to connect to MySQL." . PHP_EOL . "Debugging error: " . mysqli_connect_error() . PHP_EOL);
    }
    
    return $link;
}
?>
