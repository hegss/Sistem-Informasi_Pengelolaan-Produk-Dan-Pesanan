<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location: ../dashboard.php');
    exit();
}

ini_set('max_execution_time', 120);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container-login">
        <div class="container-login-form">
            <h3 class="title-login">Login</h3>
            <form action="proses_login_admin.php" method="post">
                <div class="form-group">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" id="nama" class="form-input" required>
                    <label for="nama" class="form-label">Username</label>
                </div>
                <div class="form-group">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="password" class="form-input" required>
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn-login">Login</button>
                <div class="register-link">
                    <p>Don't have an account? <a href="../register/form_register_admin.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>