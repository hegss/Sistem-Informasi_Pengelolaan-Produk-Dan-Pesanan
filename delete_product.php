<?php
include 'buat_koneksi/koneksi.php';

if (isset($_GET['id_product'])) {
    $id = $_GET['id_product'];

    // Query hapus data berdasarkan ID
    $query = "DELETE FROM product WHERE id_product = '$id'";
    $query_id = "ALTER TABLE product AUTO_INCREMENT = 1";
    $result = mysqli_query($koneksi, $query);
    $result_id = mysqli_query($koneksi, $query_id);

    if ($result && $result_id) {
        echo "<script>alert('Product Deleted Successfully!'); window.location.href='product.php';</script>";
    } else {
        echo "Failed to deleted product: " . mysqli_error($koneksi);
    }
} else {
    echo "ID Not Found.";
}
