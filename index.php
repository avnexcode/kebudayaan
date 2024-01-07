<?php
session_start();
require("./module/function.php");
if (isset($_SESSION["login"])) {
    $username = $_SESSION['auth']['name'];
}
$islands = getData("SELECT * FROM islands");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="./src/css/main.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- JS -->
    <!-- <script src="./src/js/app.js" defer></script> -->

    <title>Home - Kebudayaan</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="main-page">
        <!-- background slider -->
        <div class="background-list">
            <div id="container-background">
                <div class="carousel-wrapper">
                    <?php foreach ($islands as $key => $value) : ?>
                        <div class="carousel-slide">
                            <img src="./public/assets/image/pulau/<?= $value['image'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- end background slider -->
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
                    <?php if (isset($_SESSION['login'])) : ?>
                        <a onclick="confirmAction('Yakin Logout ?','http://localhost/kebudayaan/views/user/logout')" class="sign">Logout</a>
                    <?php else : ?>
                        <a href="http://localhost/kebudayaan/views/user/login" class="sign">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <!-- <header>
            <h1 data-aos="fade-down" data-aos-duration="700" data-aos-easing="ease-in-out">Pulau - Pulau di Indonesia</h1>
        </header> -->
        <main>
            <div class="index-list">
                <div id="container-index">
                    <div class="carousel-wrapper">
                        <?php foreach ($islands as $key => $value) : ?>
                            <div class="carousel-slide">
                                <span><?= $key + 1 ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="text-list">
                <div id="container-title">
                    <div class="carousel-wrapper" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <?php foreach ($islands as $key => $value) : ?>
                            <div class="carousel-slide">
                                <h1 style="background-image: url('./public/assets/image/pulau/<?= $value['image'] ?>');">PULAU <?= $value['name'] ?></h1>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div id="container-describe">
                    <div class="carousel-wrapper" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <?php foreach ($islands as $key => $value) : ?>
                            <div class="carousel-slide">
                                <p><?= $value['describe'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="button-explore">
                    <button>Explore<i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <div class="card-list">
                <div id="container-card">
                    <div class="carousel-wrapper">
                        <?php foreach ($islands as $key => $value) : ?>
                            <div class="carousel-slide" data-aos="flip-right" data-aos-duration="900" data-aos-easing="ease-in-out">
                                <a class="card" href="http://localhost/kebudayaan/views/show/island?slug=<?= $value['slug'] ?>">
                                    <img src="./public//assets//image//pulau/<?= $value['image'] ?>" alt="">
                                    <div class="card__content">
                                        <p class="card__title"><?= $value['name'] ?></p>
                                    </div>
                                </a>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="button-wrapper">
                    <!-- <button class="prev"><i class="fa-solid fa-circle-arrow-left"></i></button> -->
                    <button class="prev">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Prev</span>
                    </button>

                    <button class="next">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Next</span>
                    </button>
                </div>
            </div>

        </main>
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        // Typing Effect
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
        // Carousel
        const carouselElement = (wrapper, orientation, loop = false) => {

            const slides = wrapper.children;
            let sliderSize;
            if (orientation === 'horizontal') {
                sliderSize = slides[0].offsetWidth;
            } else {
                sliderSize = slides[0].offsetHeight;
            }

            let currentIndex = 0,
                transformStyle;


            if (orientation === 'horizontal') {
                transformStyle = (index) => {
                    return `translateX(${index}px)`;
                }
            } else if (orientation === 'vertical') {
                transformStyle = (index) => {
                    return `translateY(${index}px)`;
                }
            }

            const updateCarousel = () => {
                wrapper.style.transform = transformStyle(-currentIndex * sliderSize);
            }

            const nextSlide = () => {
                currentIndex++;
                if (currentIndex >= slides.length) {
                    currentIndex = 0;
                }
                updateCarousel();
            }

            const prevSlide = () => {
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = slides.length - 1;
                }
                updateCarousel();
            }


            if (loop) {
                setInterval(nextSlide, 10000)
            }

            return {
                next: nextSlide,
                prev: prevSlide
            }

        }


        // wrapper
        const carouselCard = document.querySelector('#container-card .carousel-wrapper');
        const carouselTitle = document.querySelector('#container-title .carousel-wrapper');
        const carouselDescribe = document.querySelector('#container-describe .carousel-wrapper');
        const carouselIndexCard = document.querySelector('#container-index .carousel-wrapper');
        const carouselBackground = document.querySelector('#container-background .carousel-wrapper');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');

        // carousel
        const card = carouselElement(carouselCard, 'horizontal', false);
        const titleCard = carouselElement(carouselTitle, 'vertical', false);
        const indexCard = carouselElement(carouselIndexCard, 'vertical', false);
        const describeCard = carouselElement(carouselDescribe, 'vertical', false)
        const background = carouselElement(carouselBackground, 'vertical', false)
        nextBtn.addEventListener('click', () => {
            card.next()
            titleCard.next()
            indexCard.next()
            describeCard.next()
            background.next()
        });
        prevBtn.addEventListener('click', () => {
            card.prev()
            titleCard.prev()
            indexCard.prev()
            describeCard.prev()
            background.prev()
        });


        const confirmAction = (text, url) => {
            if (confirm(text)) {
                document.location.href = url
            }
        }
    </script>
</body>

</html>