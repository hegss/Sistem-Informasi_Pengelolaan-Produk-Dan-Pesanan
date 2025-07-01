<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="nav-header">
        <div class="header">
            <div class="logo">
                <img src="assets/LiaBites.png" alt="Logo_Lia_Bites">
            </div>
            <div class="container-admin">
                <div class="icon-admin">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="user-admin">
                    <?php include 'auth.php' ?>
                </div>
                <ion-icon name="notifications-outline"></ion-icon>
            </div>
        </div>
        <nav class="nav-side">
            <?php
            $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
            ?>
            <ul class="nav-list list-unstyled">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link <?= $page == "dashboard.php" ? 'active' : ''; ?>">
                        <ion-icon name="grid-outline"></ion-icon>
                        <p class="nav-text p-0 m-0">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categories.php" class="nav-link <?= $page == "categories.php" || $page == "add_category.php" || $page == "edit_category.php" ? 'active' : ''; ?>">
                        <ion-icon name="documents-outline"></ion-icon>
                        <p class="nav-text p-0 m-0">Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="product.php" class="nav-link <?= $page == "product.php" || $page == "add_product.php" || $page == "edit_product.php" ? 'active' : ''; ?>">
                        <ion-icon name="fast-food-outline"></ion-icon>
                        <p class="nav-text p-0 m-0">Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="order.php" class="nav-link <?= $page == "order.php" || $page == "detail_pesanan.php" || $page == "proses_pesanan.php" ? 'active' : ''; ?>">
                        <ion-icon name="receipt-outline"></ion-icon>
                        <p class="nav-text p-0 m-0">Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="account.php" class="nav-link <?= $page == "account.php" ? 'active' : ''; ?>">
                        <ion-icon name="people-outline"></ion-icon>
                        <p class="nav-text p-0 m-0">Account</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="navClick.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>