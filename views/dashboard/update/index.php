<?php
session_start();
require("../../../module/function.php");
if (!isset($_SESSION["login"])) {
    header("Location:http://localhost/kebudayaan/views/user/login/");
}
if (isset($_SESSION["auth"])) {
    if (!$_SESSION["auth"]["admin"]) {
        header("Location:http://localhost/kebudayaan/");
    }
}
if ($_GET['id']) {
    $id = $_GET['id'];
    $comment = getData("SELECT * FROM comments WHERE id = '$id'")[0];
    $user_id = $comment['user_id'];
    $user = getData("SELECT * FROM users WHERE id = '$user_id'")[0];
} else {
    header("Location:http://localhost/kebudayaan/views/dashboard/");
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
    <title>Edit</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <P>

    </P>
    <section id="update-comment">
        <nav>
            <div class="button-back">
                <a href="http://localhost/kebudayaan/views/dashboard/">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </nav>
        <main>
            <div class="form-container">
                <form class="form" method="post">
                    <!-- <span class="heading">Hujat Kami di Sini</span> -->
                    <input placeholder="Name" type="text" class="input" name="name" id="name" value="<?= $user['name'] ?? '' ?>" readonly>
                    <input placeholder="Email" id="email" type="email" class="input" name="email" value="<?= $user['email'] ?? '' ?>" readonly>
                    <textarea placeholder="Say Hello" rows="10" cols="30" id="message" name="message" class="textarea" maxlength="250"><?= $comment['content'] ?></textarea>
                    <div class="button-container">
                        <button class="send-button">Update</button>
                        <!-- <div class="reset-button-container">
                            <button id="reset-btn" class="reset-button">Reset</button>
                        </div> -->
                    </div>
                </form>
            </div>
        </main>
    </section>
</body>

</html>