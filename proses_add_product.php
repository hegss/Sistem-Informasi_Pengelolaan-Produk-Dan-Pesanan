<?php
// Koneksi ke database
include 'buat_koneksi/koneksi.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nama'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    // Ambil nilai is_active. Jika checkbox dicentang, $_POST['is_active'] akan ada dan bernilai '1'.
    // Jika tidak dicentang, $_POST['is_active'] tidak akan ada, jadi kita set ke 0.
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $image_path = null;

    // Proses Upload Gambar
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/"; // Folder tempat menyimpan gambar
        $file_name = uniqid() . "_" . basename($_FILES["image"]["name"]); // Nama file unik
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi tipe file
        $allowed_types = array("jpg", "jpeg", "png");
        if (!in_array($imageFileType, $allowed_types)) {
            $_SESSION['message'] = "Maaf, hanya file JPG, JPEG, & PNG yang diizinkan.";
            $_SESSION['message_type'] = "error";
            header("Location: add_product.php");
            exit();
        }

        // Validasi ukuran file (contoh: maks 5MB)
        if ($_FILES["image"]["size"] > 5000000) {
            $_SESSION['message'] = "Maaf, ukuran file terlalu besar (maks 5MB).";
            $_SESSION['message_type'] = "error";
            header("Location: add_product.php");
            exit();
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            $_SESSION['message'] = "Maaf, ada masalah saat mengunggah file Anda.";
            $_SESSION['message_type'] = "error";
            header("Location: add_product.php");
            exit();
        }
    }

    // Masukkan data ke database
    // Tambahkan 'is_active' ke query INSERT dan bind_param
    $stmt = $koneksi->prepare("INSERT INTO product (name, id_category, price, description, stock, image_url, is_active) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $name, $category, $price, $description, $stock, $image_path, $is_active);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Produk berhasil ditambahkan!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
    $koneksi->close();

    header("Location: add_product.php");
    exit();
}
