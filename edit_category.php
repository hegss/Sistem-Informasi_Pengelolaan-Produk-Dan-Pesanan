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
                <p class="title fs-4 fw-bold mb-5" style="color: #1a6c7a;">Edit Category</p>

                <form action="" method="POST" class="edit-category-form">
                    <div class="form-container">
                        <div class="form-add-group">
                            <?php
                            include 'buat_koneksi/koneksi.php';

                            // Ambil id_category dari URL
                            if (isset($_GET['id_category'])) {
                                $id_category = $_GET['id_category'];

                                $sql = "SELECT * FROM category WHERE id_category = '$id_category'";
                                $result = $koneksi->query(($sql));

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "<div class='form-group-item'>";
                                    echo "<label for='id_category' class='fs-6' style='color: #1a6c7a;'>Id Category</label>";
                                    echo "<input type='number' id='id_category' name='id_category' value='" . htmlspecialchars($row['id_category']) . "' style='width: 50%;' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group-item'>";
                                    echo "<label for='nama' class='fs-6' style='color: #1a6c7a;'>Category Name</label>";
                                    echo "<input type='text' id='nama' name='nama' value='" . htmlspecialchars($row['category_name']) . "' required>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="reset" name="reset">Cancel</button>
                        <button type="submit" name="submit">Save</button>
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
    $id_category = $_POST['id_category'];
    $category_name = $_POST['nama'];

    $query = "UPDATE category SET category_name = '$category_name' WHERE id_category = $id_category";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Kategori Update Successfully!'); window.location.href='categories.php';</script>";
    } else {
        echo "Gagal menambahkan kategori: " . mysqli_error($koneksi);
    }
}
?>