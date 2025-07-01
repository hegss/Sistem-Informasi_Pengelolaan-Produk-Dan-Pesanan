<?php
include '../buat_koneksi/koneksi.php';

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek username dan password
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header('location: ../dashboard.php');
        exit();
    } else {
        echo "Username atau password salah";
    }
} else {
    echo "Username atau password kosong";
    exit();
}

ini_set('max_execution_time', 120);
