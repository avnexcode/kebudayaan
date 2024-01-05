<?php
require("../../../module/function.php");
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $island = getData("SELECT * FROM islands WHERE slug = '$slug'")[0];
    $island_id = $island['id'];
    $ethnics = getData("SELECT * FROM ethnics WHERE island_id = '$island_id'");
} else {
    header("Location: http://localhost/kebudayaan");
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
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title><?= $island['name'] ?> - Kebudayaan</title>
</head>

<body>
    <div id="close-content">
        <h1>Oops.......</h1>
        <h1>Saat ini Hanya bisa digunakan di</h1>
        <h1>-Layar Besar-</h1>
        <h1>( <i class="fa-solid fa-desktop"></i>, <i class="fa-solid fa-computer"></i>, <i class="fa-solid fa-laptop"></i>, <i class="fa-solid fa-display"></i>, <i class="fa-solid fa-tv"></i> )</h1>
    </div>
    <section id="show-island">
        <div class="identity">

        </div>
        <nav>
            <div class="button-back">
                <a href="http://localhost/kebudayaan/">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="title">
                <a id="detail-title" href="">Pulau <?= $island['name'] ?></a>
            </div>
        </nav>
        <!-- contoh -->
        <!-- <div class="index-list">
            <div id="container-index">
                <div class="carousel-wrapper">
                    <?php foreach ($islands as $key => $value) : ?>
                        <div class="carousel-slide">
                            <span><?= $key + 1 ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div> -->
        <!-- end contoh -->
        <div class="content-list">
            <div id="container-wrapper">
                <?php foreach ($ethnics as $key => $value) : ?>
                    <div class="carousel-slide">
                        <header>
                            <div class="image">
                                <img src="../../../public/assets/image/suku/<?= $value['image'] ?>" alt="">
                            </div>
                            <div class="describe">
                                <h1 id="detail-title"><?= $value['name'] ?></h1>
                                <p><?= $value['describe'] ?></p>
                                <div class="button-explore">
                                    <button>Explore</button>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="gallery">
                                <div class="image-list">
                                    <?php foreach (json_decode($value['gallery']) as $key => $gallery) : ?>
                                        <div class="img">
                                            <img src="../../../public/assets/image/suku/<?= $gallery ?>" alt="">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </main>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="button-wrapper">
            <button id="btn-prev"><i class="fa-solid fa-arrow-up"></i></button>
            <button id="btn-next"><i class="fa-solid fa-arrow-down"></i></button>
        </div>
    </section>

    <script>
        AOS.init()
        const textElement = document.querySelector("#detail-title");
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
        const wrapper = document.getElementById('container-wrapper')
        const content = carouselElement(wrapper, 'vertical', false);
        const next = document.getElementById('btn-next')
        const prev = document.getElementById('btn-prev')

        next.addEventListener('click', e => {
            content.next()
        })
        prev.addEventListener('click', e => {
            content.prev()
        })
    </script>
</body>

</html>