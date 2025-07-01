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
            <div class="containers-add-category">
                <p class="title fs-4 fw-bold mb-5" style="color: #1a6c7a;">Add Category</p>

                <form action="" method="POST" class="add-category-form">
                    <div class="form-container">
                        <div class="form-add-group">
                            <div class="form-group-item">
                                <label for="nama" class="fs-6" style="color: #1a6c7a;">Category Name</label>
                                <input type="text" id="nama" name="nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="reset" name="reset">Cancel</button>
                        <button type="submit" name="submit">Add</button>
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
    $category_name = $_POST['nama'];

    $query = "INSERT INTO category (category_name) VALUES ('$category_name')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Kategori berhasil ditambahkan!'); window.location.href='categories.php';</script>";
    } else {
        echo "Gagal menambahkan kategori: " . mysqli_error($koneksi);
    }
}
?>