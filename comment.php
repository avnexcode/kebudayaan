<?php
session_start();
require('./module/function.php');
if (isset($_SESSION['login'])) {
    $username = $_SESSION['auth']['name'];
    $email = $_SESSION['auth']['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['login'])) {
        header('Location:http://localhost/kebudayaan/views/user/login/');
    } else {
        if (setComments($_SESSION['auth']['id']) > 0) {
            echo "
                <script>
                    alert('Berhasil');
                </script>            
            ";
        } else {
            echo "
                <script>
                    alert('gagal');
                </script>
            ";
        }
    }
}

$comments = getData("SELECT * FROM comments");
function getUsername($user_id)
{
    return getData("SELECT * FROM users WHERE id = '$user_id'")[0]['name'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment - Kebudayaan</title>
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="./src/css/main.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="comment-page">
        <nav>
            <!-- judul -->
            <div class="title">
                <a id="kebudayaan-title" href="http://localhost/kebudayaan/">Kebudayaan</a>
            </div>
            <!-- navigasi -->
            <ul class="desktop-nav">
                <li><a href="http://localhost/kebudayaan/">Home</a></li>
                <li><a href="http://localhost/kebudayaan/profile.php">Profile</a></li>
                <li><a href="http://localhost/kebudayaan/comment.php">Comment</a></li>
            </ul>
            <!-- utiliti -->
            <div class="utils">
                <div class="user-nav">
                    <?php if (isset($_SESSION['login'])) : ?>
                        <?php if ($_SESSION['auth']['admin'] > 0) : ?>
                            <a href="http://localhost/kebudayaan/views/dashboard/" class="sign">Dashboard</a>
                        <?php endif; ?>
                        <a onclick="confirmAction('Yakin Logout ?','http://localhost/kebudayaan/views/user/logout')" class="sign">Logout</a>
                    <?php else : ?>
                        <a href="http://localhost/kebudayaan/views/user/login" class="sign">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <header>
            <div class="title">
                <h1>Comment Section</h1>
            </div>
        </header>
        <main>
            <div class="side side-left">
                <div class="form-container">
                    <form class="form" method="post">
                        <!-- <span class="heading">Hujat Kami di Sini</span> -->
                        <input placeholder="Name" type="text" class="input" name="name" id="name" value="<?= $username ?? '' ?>" readonly>
                        <input placeholder="Email" id="email" type="email" class="input" name="email" value="<?= $email ?? '' ?>" readonly>
                        <textarea placeholder="Say Hello" rows="10" cols="30" id="message" name="message" class="textarea" maxlength="250"></textarea>
                        <div class="button-container">
                            <button class="send-button">Send</button>
                            <!-- <div class="reset-button-container">
                                <button id="reset-btn" class="reset-button">Reset</button>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="side side-right">
                <div class="page">
                    <?php foreach ($comments as $key => $value) : ?>
                        <div class="margin"></div>
                        <p class="username">Dari : <?= getUsername($value['user_id']) ?></p>
                        <p class="content">-<?= $value['content'] ?>-</p>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </section>

    <script>
        const textElement = document.querySelector("#kebudayaan-title");
        const textToType = [textElement.textContent];
        let textIndex = 0;
        let charIndex = 0;
        let isTyping = true;
        const typing = () => {
            const currentText = textToType[textIndex];

            if (isTyping) {
                textElement.textContent = currentText.slice(0, charIndex + 1);
                charIndex++;

                if (charIndex >= currentText.length) {
                    isTyping = false;
                    setTimeout(typing, 100);
                } else {
                    setTimeout(typing, 100);
                }
            }
            // else {
            //     textElement.textContent = currentText.slice(0, charIndex);
            //     charIndex--;

            //     if (charIndex < 0) {
            //         isTyping = true;
            //         textIndex = (textIndex + 1) % textToType.length;
            //         setTimeout(typing, 100);
            //     } else {
            //         setTimeout(typing, 50);
            //     }
            // }
        };
        typing()
        const confirmAction = (text, url) => {
            if (confirm(text)) {
                document.location.href = url
            }
        }
    </script>
</body>

</html>