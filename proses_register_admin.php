<?php
include '../buat_koneksi/koneksi.php';

session_start(); // memulai session
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['phone'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO admin (username, password, name, phone) VALUES ('$username', '$password', '$name', '$phone')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Registrasi berhasil.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();
    header("location: ../login/form_login_admin.php");
} else {
    echo "Username atau password kosong.";
}
exit();

ini_set('max_execution_time', 120);
