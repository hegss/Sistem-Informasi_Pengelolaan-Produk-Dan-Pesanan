<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login/form_login_admin.php');
}

include 'buat_koneksi/koneksi.php';

$sql = "SELECT COUNT(*) AS jumlah_product FROM product";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
$jumlah_product = $data['jumlah_product'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="containers-page">
        <div class="container-dashboard">
            <div class="preview">
                <div class="preview-item">
                    <ion-icon name="reader"></ion-icon>
                    <div class="preview-desc">
                        <p class="p-0 m-0">New Orders</p>
                        <p class="fs-5 fw-bolder p-0 m-0">(0)</p>
                    </div>
                </div>
                <div class="preview-item">
                    <ion-icon name="cash"></ion-icon>
                    <div class="preview-desc">
                        <p class="p-0 m-0">Total Sales</p>
                        <p class="fs-5 fw-bolder p-0 m-0">(0)</p>
                    </div>
                </div>
                <div class="preview-item">
                    <ion-icon name="pizza"></ion-icon>
                    <div class="preview-desc">
                        <p class="p-0 m-0">Product</p>
                        <p class="fs-5 fw-bolder p-0 m-0">(<?php echo $jumlah_product; ?>)</p>
                    </div>
                </div>
            </div>
            <div class="chart-preview">
                <div class="chart">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
                <p class="fs-5 fw-bolder p-0 m-0">Weekly Sales Grafik</p>
            </div>
        </div>
    </div>
</body>

</html>