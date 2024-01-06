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
                <div class="profile">
                    <!-- <img src="https://source.unsplash.com/1200x350?profile" alt="pic" class="image"> -->
                    <a href="http://localhost/kebudayaan/views/user/login" class="username">Login</a>
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
                    <form class="form">
                        <!-- <span class="heading">Hujat Kami di Sini</span> -->
                        <input placeholder="Name" type="text" class="input">
                        <input placeholder="Email" id="mail" type="email" class="input">
                        <textarea placeholder="Say Hello" rows="10" cols="30" id="message" name="message" class="textarea"></textarea>
                        <div class="button-container">
                            <button class="send-button">Send</button>
                            <div class="reset-button-container">
                                <button id="reset-btn" class="reset-button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="side side-right">
                <div class="page">
                    <!-- Utama -->
                    <div class="margin"></div>
                    <p>Muhammad Fauzi Nur Aziz</p>
                    <p>-Duar Kemem-</p>
                    <!-- End Utama -->
                    <!-- Utama -->
                    <div class="margin"></div>
                    <p>Muhammad Fauzi Nur Aziz</p>
                    <p>-Duar Kemem-</p>
                    <!-- End Utama -->
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
    </script>
</body>

</html>