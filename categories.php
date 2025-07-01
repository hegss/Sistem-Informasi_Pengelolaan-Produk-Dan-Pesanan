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
    <title>Category</title>

    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="containers">
        <?php include 'navbar.php'; ?>
        <div class="containers-page">
            <div class="header-product-page navbar">
                <div class="header-item">
                    <p class="title-page fs-4">All Categories</p>
                    <div class="search">
                        <ion-icon name="search-outline"></ion-icon>
                        <input type="text" placeholder="Search categories ...">
                    </div>
                </div>
                <div class="btn-add">
                    <a href="add_category.php" class="link-offset-2 link-underline link-underline-opacity-0">
                        <button><ion-icon name="add"></ion-icon> Add Category</button>
                    </a>
                </div>
            </div>
            <div class="table-category table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id Category</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'buat_koneksi/koneksi.php';

                        $sql = "SELECT * FROM `category`";
                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            // --- Loop untuk menampilkan setiap baris data ---
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id_category"] . "</td>";
                                // Gunakan htmlspecialchars untuk keamanan dari XSS
                                echo "<td>" . htmlspecialchars($row["category_name"]) . "</td>";
                                echo "<td><a href='edit_category.php?id_category=" . $row['id_category'] . "'><ion-icon name='create'></ion-icon></a></td>";
                                echo "<td><a href='delete_category.php?id_category=" . $row['id_category'] . "'><ion-icon name='trash'></ion-icon></a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' style='text-align: center;'>Tidak ada data ditemukan</td></tr>";
                        }

                        mysqli_free_result($result);
                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>

</html>