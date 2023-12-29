<?php
require("./module/function.php");
$islands = getData("SELECT * FROM islands");

if(isset($_GET['search'])) {
    $kywrd = $_GET['search'];
    $islands = getData("SELECT * FROM islands WHERE name LIKE '%$kywrd%'");
}
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

    <title>Disorganized</title>
    <!-- <style>
        #carousel-container {
            border: 3px solid black;
            overflow: hidden;
            width: 500px;
            height: 100px;
            margin: 0 auto;
            background-color: black;
            color: white;
        }

        .carousel-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-wrapper-2 {
            display: flex;
            flex-direction: column;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-wrapper-3 {
            display: flex;
            flex-direction: column;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-slide {
            flex: 0 0 auto;
            width: 500px;
            box-sizing: border-box;
        }

        .carousel-wrapper-2 .carousel-slide {
            flex: 0 0 auto;
            width: 500px;
            height: 100px;
            box-sizing: border-box;
        }

        .carousel-wrapper-3 .carousel-slide {
            flex: 0 0 auto;
            width: 500px;
            height: 100px;
            box-sizing: border-box;
        }

        .carousel-slide img {
            object-fit: cover;
        }

        button {
            cursor: pointer;
        }
    </style> -->
</head>

<body>
    <section id="main-page">
        <nav>
            <!-- judul -->
            <div class="title">
                <a href="http://localhost/kebudayaan/">Kebudayaan</a>
            </div>
            <!-- navigasi -->
            <ul class="desktop-nav">
                <li><a href="">Home</a></li>
                <li><a href="">Profile</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <!-- utiliti -->
            <div class="utils">

                <div class="search">
                    <form action="" method="" class="input-container">
                        <input type="text" name="search" class="input" placeholder="Cari dong..." autocomplete="off">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" class="icon">
                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect fill="white" height="24" width="24"></rect>
                                <path fill="" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </g>
                        </svg>
                    </form>
                </div>
                <div class="profile">
                    <!-- <img src="https://source.unsplash.com/1200x350?profile" alt="pic" class="image"> -->
                    <span class="username">Hello, CROT</span>
                </div>
            </div>

            <!-- Mobile -->
            <input type="checkbox" id="nav-check">
            <div id="humberger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="mobile-nav" class="nav-hidden">
                <div class="search">
                    <form action="" method="" class="input-container">
                        <input type="text" name="search" class="input" placeholder="Cari dong..." autocomplete="off">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" class="icon">
                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect fill="white" height="24" width="24"></rect>
                                <path fill="" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </g>
                        </svg>
                    </form>
                </div>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </nav>
        <header>
            <h1 data-aos="fade-down" data-aos-duration="700" data-aos-easing="ease-in-out">Pulau - Pulau di Indonesia</h1>
        </header>
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
                                <h1><?= $value['name'] ?></h1>
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
                                    <img src="https://source.unsplash.com/1200x350?island" alt="">
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
        const textElement = document.querySelector("header h1");
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

        // Hamburger
        const mobileNav = document.getElementById("mobile-nav");
        const navCheck = document.getElementById("nav-check");
        const humberger = document.getElementById('humberger')

        navCheck.addEventListener('click', e => {
            if (e.target.checked) {
                mobileNav.classList.add('nav-show')
                mobileNav.classList.remove('nav-hidden')
                humberger.classList.add('humberger-active')
                humberger.classList.remove('humberger-deactive')
            } else {
                mobileNav.classList.add('nav-hidden')
                mobileNav.classList.remove('nav-show')
                humberger.classList.add('humberger-deactive')
                humberger.classList.remove('humberger-active')
            }
        })

        // Carousel
        const carouselCard = document.querySelector('#container-card .carousel-wrapper');
        const carouselTitle = document.querySelector('#container-title .carousel-wrapper');
        const carouselDescribe = document.querySelector('#container-describe .carousel-wrapper');
        const carouselIndexCard = document.querySelector('#container-index .carousel-wrapper');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');

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

        // Usage

        const card = carouselElement(carouselCard, 'horizontal', false);
        const titleCard = carouselElement(carouselTitle, 'vertical', false);
        const indexCard = carouselElement(carouselIndexCard, 'vertical', false);
        const describeCard = carouselElement(carouselDescribe, 'vertical', false)

        nextBtn.addEventListener('click', () => {
            card.next()
            titleCard.next()
            indexCard.next()
            describeCard.next()
        });
        prevBtn.addEventListener('click', () => {
            card.prev()
            titleCard.prev()
            indexCard.prev()
            describeCard.prev()
        });
    </script>
</body>

</html>