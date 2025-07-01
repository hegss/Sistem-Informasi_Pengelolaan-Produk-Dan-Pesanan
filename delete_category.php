<?php
include 'buat_koneksi/koneksi.php';

if (isset($_GET['id_category'])) {
    $id = $_GET['id_category'];

    // Query hapus data berdasarkan ID
    $query = "DELETE FROM category WHERE id_category = '$id'";
    $query_id = "ALTER TABLE category AUTO_INCREMENT = 1";
    $result = mysqli_query($koneksi, $query);
    $result_id = mysqli_query($koneksi, $query_id);

    if ($result && $result_id) {
        echo "<script>alert('Kategori berhasil dihapus!'); window.location.href='categories.php';</script>";
    } else {
        echo "Gagal menghapus kategori: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
