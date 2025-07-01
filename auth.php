<?php
include 'buat_koneksi/koneksi.php';

$admin_name = "Tidak ditemukan";

$sql = "SELECT name FROM `admin` LIMIT 1";
$result = $koneksi->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $admin_name = htmlspecialchars($row['name']);
    } else {
        echo "<p>Data Tidak Ditemukan</p>";
    }
    $result->free();
} else {
    echo "<p>Error saat menjalankan kueri</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <p class="admin-greet mb-0 p-0">Hello Admin,</p>
    <p class="admin-name mb-0 p-0"><?= $admin_name; ?></p>
</body>

</html>