<?php
session_start();
require('../../../module/function.php');
if (isset($_SESSION["login"])) {
    header("Location:http://localhost/kebudayaan/");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (register() > 0) {
        echo "
            <script>
                alert('register berhasil');
                document.location.href = 'http://localhost/kebudayaan/views/user/login/'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('register gagal');
                document.location.href = 'http://localhost/kebudayaan/views/user/register/'
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
    <title>Register - Kebudayaan</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="register-page">
        <nav>
            <div class="button-back">
                <a href="http://localhost/kebudayaan/">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </nav>
        <main>
            <div class="container">
                <div class="heading">Register</div>
                <form action="" class="form" method="post">
                    <input autofocus class="input" type="text" name="name" id="name" placeholder="Username">
                    <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
                    <input required class="input" type="password" name="password" id="password" placeholder="Password">
                    <input required class="input" type="password" name="password_confirm" id="password-confirm" placeholder="Password Confirm">
                    <input class="login-button" type="submit" value="Register">
                </form>
                <div class="agreement">
                    <span>Sudah Memilliki Akun?</span>
                    <a href="http://localhost/kebudayaan/views/user/login">Login</a>
                </div>
            </div>
        </main>
    </section>
</body>

</html>