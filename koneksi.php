<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_penjualan";

// Create Connection Using MySQL
$koneksi = mysqli_connect($host, $username, $password, $database);

// Check Connection
if (!$koneksi) {
    die("Connection Failed" . mysqli_connect_error());
}
