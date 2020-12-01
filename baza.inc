<?php

$host = 'localhost';
$db_name = 'projekat';
$db_username = 'root';
$db_pass = '';

function konekcija() {
    global $host, $db_name, $db_username, $db_pass;
    $conn = mysqli_connect($host, $db_username, $db_pass, $db_name);
    if (!$conn) {
        return 0;
    } else if (!mysqli_select_db($conn, $db_name)) {
        return 0;
    } else {
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
}
