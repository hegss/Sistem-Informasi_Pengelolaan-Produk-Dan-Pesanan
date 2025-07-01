<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login/form_login_admin.php');
}

include 'buat_koneksi/koneksi.php';

// Ambil data produk berdasarkan ID
if (isset($_GET['id_product'])) {
    $id = $_GET['id_product'];
    $query = "SELECT * FROM `product` WHERE `id_product` = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Produk tidak ditemukan!'); window.location.href='products.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='products.php';</script>";
    exit;
}

// Daftar kategori untuk dropdown
$categories = mysqli_query($koneksi, "SELECT * FROM `category`");
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
        <?php include 'navbar.php'; ?>
        <div class="containers-page">
            <div class="containers-add-product">
                <p class="title fs-4 fw-bold mb-5" style="color: #1a6c7a;">Edit Product</p>

                <form action="" method="POST" enctype="multipart/form-data" class="add-product-form">
                    <div class="form-container">
                        <div class="form-add-group">
                            <div class="form-group-item">
                                <label for="image" class="fs-6" style="color: #1a6c7a;">Product Image</label>
                                <img src="<?php echo $product['image_url']; ?>" alt="Image Preview" id="image-preview">
                                <input type="file" id="image" name="image" class="input-img" required>
                            </div>
                        </div>
                        <div class="form-add-group">
                            <div class="form-group-item">
                                <label for="nama" class="fs-6" style="color: #1a6c7a;">Product Name</label>
                                <input type="text" id="nama" name="nama" value="<?php echo $product['name']; ?>" required>
                            </div>
                            <div class="form-group-item">
                                <label for="category" class="fs-6" style="color: #1a6c7a;">Category</label>
                                <select name="category" id="category">
                                    <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                                        <option value="<?php echo $cat['id_category']; ?>" <?php if ($cat['id_category'] == $product['id_category']) echo 'selected'; ?>>
                                            <?php echo $cat['category_name']; ?>
                                        </option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="grouping">
                                <div class="form-group-item">
                                    <label for="price" class="fs-6" style="color: #1a6c7a;">Price</label>
                                    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" placeholder="Rp." min="0" class="input-price" required>
                                </div>
                                <div class="form-group-item">
                                    <label for="stock" class="fs-6" style="color: #1a6c7a;">Stock</label>
                                    <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" class="input-stock" min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-add-group">
                            <div class="form-group-item">
                                <label for="description" class="fs-6" style="color: #1a6c7a;">Description</label>
                                <textarea name="description" id="description"><?php echo $product['description']; ?></textarea>
                            </div>
                            <div class="container-checkbox">
                                <label for="checkbox">Status</label>
                                <div class="checkbox-group">
                                    <div class="checkbox">
                                        <input type="checkbox" id="is_active" name="is_active" value="1" <?php if ($product['is_active'] == 1) echo "checked"; ?>>
                                        <label for="is_active" class="fs-6" style="color: #1a6c7a;">Active</label>
                                    </div>
                                </div>
                            </div>
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
// Proses simpan produk
if (isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $category_id = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    // Proses upload gambar
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_dir = "uploads/";

    // Buat folder uploads jika belum ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Pindahkan gambar ke folder uploads
    $image_path = $upload_dir . $image_name;
    move_uploaded_file($image_tmp, $image_path);

    // Simpan ke database
    $query = "UPDATE product SET 
                name = '$name',
                id_category = '$category_id',
                price = '$price',
                description = '$description',
                stock = '$stock',
                image_url = '$image_path',
                is_active = '$is_active'
              WHERE id_product = '$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Product Updated Successfully!'); window.location.href='product.php';</script>";
    } else {
        echo "Failed to update product: " . mysqli_error($koneksi);
    }
}
?>