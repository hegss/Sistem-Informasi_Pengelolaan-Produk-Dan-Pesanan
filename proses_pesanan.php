<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login/form_login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="containers">
        <?php include 'navbar.php' ?>
        <div class="containers-page">
            <div class="containers-edit-category">
                <p class="title fs-4 fw-bold mb-5" style="color: #1a6c7a;">Process Order</p>

                <form action="" method="POST" class="edit-category-form">
                    <div class="form-container">
                        <div class="form-add-group">
                            <?php
                            include 'buat_koneksi/koneksi.php';

                            // Ambil id_category dari URL
                            if (isset($_GET['id_pesanan'])) {
                                $id_pesanan = $_GET['id_pesanan'];
                                $order_status = $_GET['order_status'];

                                $sql = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";
                                $result = $koneksi->query(($sql));

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "<div class='form-group-item'>";
                                    echo "<label for='id_pesanan' class='fs-6' style='color: #1a6c7a;'>Id Pesanan</label>";
                                    echo "<input type='number' id='id_pesanan' name='id_pesanan' value='" . htmlspecialchars($row['id_pesanan']) . "' style='width: 50%;' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group-item'>";
                                    echo "<label for='category' class='fs-6' style='color: #1a6c7a;'>Order Status</label>";
                                    echo "<select name='order_status' id='order_status'>";
                                    echo "<option value='pending_payment'>Pending Payment</option>";
                                    echo "<option value='processing'>Processing</option>";
                                    echo "<option value='shipped'>Shipped</option>";
                                    echo "<option value='completed'>Completed</option>";
                                    echo "<option value='cancelled'>Cancelled</option>";
                                    echo "</select>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="reset" name="reset">Cancel</button>
                        <button type="submit" name="submit">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="imgPreview.js"></script>
</body>

</html>

<?php
// Proses penyimpanan data
include 'buat_koneksi/koneksi.php';

if (isset($_POST['submit'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $order_status = $_POST['order_status'];

    $query = "UPDATE pesanan SET order_status = '$order_status' WHERE id_pesanan = $id_pesanan";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Order Processing Successfully!'); window.location.href='order.php';</script>";
    } else {
        echo "Failed to process order: " . mysqli_error($koneksi);
    }
}
?>