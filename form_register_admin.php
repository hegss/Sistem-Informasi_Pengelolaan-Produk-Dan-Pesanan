<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container-register">
        <div class="container-register-form">
            <h3 class="title-register">Register</h3>
            <form action="proses_register_admin.php" method="post">
                <div class="form-group">
                    <span class="icon"><ion-icon name="people"></ion-icon></span>
                    <input type="text" name="username" id="usernama" class="form-input" required>
                    <label for="nama" class="form-label">Username</label>
                </div>
                <div class="form-group">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="password" class="form-input" required>
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="form-group">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="name" id="name" class="form-input" required>
                    <label for="nama" class="form-label">Name</label>
                </div>
                <div class="form-group">
                    <span class="icon"><ion-icon name="phone-portrait"></ion-icon></span>
                    <input type="text" name="phone" id="phone" class="form-input" required>
                    <label for="nama" class="form-label">Phone</label>
                </div>
                <button type="submit" class="btn-register">Sign Up</button>
                <div class="login-link">
                    <p>You have an account? <a href="../login/form_login_admin.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>