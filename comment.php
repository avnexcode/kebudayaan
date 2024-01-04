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
    <section id="contact-page">
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
                    <span class="username">Hello, Muhammad</span>
                </div>
            </div>
        </nav>
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