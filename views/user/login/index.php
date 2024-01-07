<?php
session_start();
require('../../../module/function.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getData("SELECT * FROM users WHERE email = '$email'")[0];
    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["login"] = true;
        $_SESSION['auth'] = $user;
        echo "
            <script>
                alert('berhasil login');
                document.location.href = 'http://localhost/kebudayaan/';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Salah Email atau password');
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../../src/css/main.css">
    <title>Login - Kebudayaan</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="login-page">
        <nav>
            <div class="button-back">
                <a href="http://localhost/kebudayaan/">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </nav>
        <main>
            <div class="container">
                <div class="heading">Sign In</div>
                <form action="" class="form" method="post">
                    <input autofocus required="" class="input" type="email" name="email" id="email" placeholder="E-mail" value="axnvee18@gmail.com">
                    <input required="" class="input" type="password" name="password" id="password" placeholder="Password" value="password">
                    <input class="login-button" type="submit" value="Sign In">
                </form>
                <div class="agreement">
                    <span>Belum memiliki akun?</span>
                    <a href="http://localhost/kebudayaan/views/user/register">Register</a>
                </div>
            </div>
        </main>
    </section>
</body>

</html>