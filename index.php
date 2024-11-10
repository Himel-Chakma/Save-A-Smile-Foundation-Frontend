<?php
include 'header.php';
?>
<!-- Header -->
<div id="topbar">
    <div class="container px-0 px-lg-5">
        <div class="row m-0 py-3 custom-border-bottom-yellow z-index">
            <div
                class="col-md-3 ps-0 ms-0 d-flex align-items-center justify-content-lg-start justify-content-center">
                <a href="index.php"><img src="img/logo.png" width="180" /></a>
            </div>
            <div
                class="col-6 d-flex align-items-center justify-content-start justify-content-lg-center">
                <button
                    class="custom-btn d-lg-none bg-yellow rounded-normal"
                    style="font-size: 18px"
                    id="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sam" id="nav">
                    <ul class="nav">
                        <li>
                            <a href="index.php" class="nav-link active">Home</a>
                        </li>
                        <li>
                            <a href="about.php" class="nav-link">About Us</a>
                        </li>
                        <li>
                            <a href="projects.php" class="nav-link">Projects</a>
                        </li>
                        <li>
                            <a href="events.php" class="nav-link">Events</a>
                        </li>
                        <li>
                            <a href="events.php" class="nav-link">Blogs</a>
                        </li>
                        <li>
                            <a href="contact.php" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="col-md-3 col-6 pe-lg-0 pe-3 me-0 d-flex align-items-center justify-content-end">
                <a
                    href="donate.php"
                    class="custom-btn bg-green hover-dark-blue rounded"
                    style="font-size: 13px">
                    DONATE NOW
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide position-relative">
            <div class="banner" style="background-image: url('img/4.jpg')"></div>
            <div class="background-overlay"></div>
            <div
                class="d-flex justify-content-center align-items-center banner-text flex-column">
                <h6
                    class="text-white text-center quicksand text-uppercase my-4 animate__animated animate__zoomIn">
                    Change the world together
                </h6>
                <h1
                    class="text-white text-center quicksand animate__animated animate__fadeInUp animate__delay-1s">
                    Support Kids and Elders<br />
                    Give Generously
                </h1>
                <p
                    class="text-white text-center quicksand banner-text-desc mt-3 animate__animated animate__fadeInUp animate__delay-2s">
                    Save A Smile Foundation is a non-profit voluntary organization
                    conducted by the students of different SSC batches for quality
                    education, proper health and hygiene and environment protection.
                </p>
                <a
                    href="about.php"
                    class="custom-btn bg-green hover-dark-blue rounded mt-4 animate__animated animate__fadeInUp animate__delay-3s"
                    style="font-size: 16px">
                    LEARN MORE
                </a>
            </div>
        </div>
        <div class="swiper-slide position-relative">
            <div class="banner" style="background-image: url('img/5.jpg')"></div>
            <div class="background-overlay"></div>
            <div
                class="d-flex justify-content-center align-items-center banner-text flex-column">
                <h6
                    class="text-white text-center quicksand text-uppercase my-4 animate__animated animate__zoomIn">
                    We are here to change the world
                </h6>
                <h1
                    class="text-white text-center quicksand animate__animated animate__fadeInUp animate__delay-1s">
                    Support Kids and Elders<br />
                    Give Generously
                </h1>
                <p
                    class="text-white text-center quicksand banner-text-desc mt-3 animate__animated animate__fadeInUp animate__delay-2s">
                    Save A Smile Foundation is a non-profit voluntary organization
                    conducted by the students of different SSC batches for quality
                    education, proper health and hygiene and environment protection.
                </p>
                <a
                    href="about.php"
                    class="custom-btn bg-green hover-dark-blue rounded-pill mt-4 animate__animated animate__fadeInUp animate__delay-3s"
                    style="font-size: 16px">
                    LEARN MORE
                </a>
            </div>
        </div>
    </div>
    <div class="banner-button">
        <button class="banner-button-previous mb-3 active">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="banner-button-next">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>

<!--About Us-->
<section class="about-us py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row">
            <div class="col-md-6 position-relative mb-4 mb-lg-0" id="reveal-left">
                <img src="img/3.jpg" class="about-img about-img-1" />
                <img src="img/2.jpg" class="about-img about-img-2" />
                <img src="img/about-dot.png" class="about-img about-dot" />
            </div>
            <div class="col-md-6">
                <p
                    class="text-green quicksand fw-bold"
                    id="reveal-up"
                    style="font-size: 16px">
                    <i class="fa-solid fa-angles-left me-2"></i> ABOUT US
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4" id="reveal-up">
                    Discover Youth For Rural Health
                </h1>
                <p
                    class="text-gray quicksand my-4"
                    style="font-size: 16px"
                    id="reveal-up">
                    Youth for Rural Health is a non-profit voluntary organization that
                    is dedicated to improving the health and well-being of rural
                    communities in Bangladesh. We work with local communities to
                    provide access to quality healthcare, education, and other
                    essential services. Our goal is to empower young people to become
                    leaders in their communities and create positive change.
                </p>
                <div class="row" id="reveal-down">
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Immediate
                                Assistance
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                Support
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Immediate
                                Assistance
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Long-Time
                                Support
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4" id="reveal-down">
                    <div class="me-3">
                        <a
                            href="about.php"
                            class="custom-btn bg-green hover-dark-blue rounded py-3"
                            style="font-size: 16px">
                            LEARN MORE
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="founder-photo me-3">
                            <img src="img/f1.png" />
                        </div>
                        <div class="founder-desc">
                            <h6 class="merriweather fw-bold">Himel Chakma</h6>
                            <p
                                class="text-green text-uppercase m-0"
                                style="font-size: 13px">
                                Co-Founder & Advisor
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--counter area-->
<section class="counter-area py-5">
    <div class="counter-area-overlayer"></div>
    <div class="container py-5 px-5 px-lg-5">
        <div class="row">
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-left-2">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">2500</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total Happy Children
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-left">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-regular fa-handshake"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">270</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total Our Volunteers
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center mb-lg-0 mb-4"
                id="reveal-right">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">3000</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Our Products and Gifts
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="col-md-3 d-flex justify-content-center align-items-center"
                id="reveal-right-2">
                <div class="d-flex align-items-center flex-lg-row flex-column">
                    <div
                        class="item-icon d-flex justify-content-center align-items-center me-2 mb-lg-0 mb-3">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <div class="item-counter">
                        <h2 class="text-white quicksand m-0">
                            <span class="counter">8700</span>+
                        </h2>
                        <p class="text-white m-0" style="font-size: 14px">
                            Total World Wide Donor
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Our Mission-->
<section class="our-mission py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row">
            <div class="col-md-7">
                <p
                    class="text-green quicksand fw-bold"
                    style="font-size: 16px"
                    id="reveal-up">
                    <i class="fa-solid fa-angles-left me-2"></i> OUR MISSION
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4" id="reveal-up">
                    Our Mission & Goals
                </h1>
                <p
                    class="text-gray quicksand my-4"
                    id="reveal-up"
                    style="font-size: 16px">
                    Save A Smile Foundation is a non-profit voluntary organization
                    conducted by the students of different SSC batches for quality
                    education, proper health and hygiene and environment protection.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <div class="d-flex mb-4" id="reveal-left">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-brainstorm-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Inspiring Young Minds</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Inspiring young minds for a healthier tomorrow.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" id="reveal-left-2">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-graduate-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Empowering Youth</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Empowering Youth, Transforming Communities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex mb-4" id="reveal-left">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-health-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">LUH</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Listeting, Understanding and Healing.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex" id="reveal-left-2">
                            <div
                                class="mission-icon d-flex justify-content-center align-items-center p-3 me-3">
                                <img src="img/icons8-mental-health-100.png" />
                            </div>
                            <div class="mission-text">
                                <h6 class="quicksand fw-bold">Health Education</h6>
                                <p class="text-gray" style="font-size: 14px">
                                    Inspiring future leaders for healthier communities.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Get Involved-->
<section class="counter-area py-5">
    <div class="counter-area-overlayer"></div>
    <div class="container py-5 px-5 px-lg-5">
        <div
            class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-white quicksand fw-bold text-center" id="reveal-up">
                Welcome To <span class="text-green">Youth For Rural Health</span><br />
                Want to make a Positive Impact?
            </h1>
            <p class="text-white quicksand my-4" id="reveal-left">
                Only when the society comes together and contributeswe will be able
                to make an impact.
            </p>
            <a
                href="get_involed.php"
                class="custom-btn bg-green hover-dark-blue rounded p-3 px-4" id="reveal-down"
                style="font-size: 16px">
                Get Involved
            </a>
        </div>
    </div>
</section>

<!--Our Projects-->
<section class="our-projects py-5">
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-green quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> OUR PROJECTS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1 class="quicksand fw-bold text-center my-4 mb-5" id="reveal-up">
            Works Across The Country
        </h1>
        <div class="row g-4">
            <div class="col-md-6" id="reveal-down">
                <div class="project-item position-relative">
                    <img src="img/1.jpg" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="" class="text-white text-decoration-none">Project 1</a>
                        </h4>
                        <a
                            href=""
                            class="text-decoration-none next-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="reveal-down">
                <div class="project-item position-relative">
                    <img src="img/orphan-banner-1.jpg" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="" class="text-white text-decoration-none">Project 2</a>
                        </h4>
                        <a
                            href=""
                            class="text-decoration-none next-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="reveal-down-2">
                <div class="project-item position-relative">
                    <img src="img/orphan-banner-1.jpg" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="" class="text-white text-decoration-none">Project 2</a>
                        </h4>
                        <a
                            href=""
                            class="text-decoration-none next-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="reveal-down-2">
                <div class="project-item position-relative">
                    <img src="img/orphan-banner-1.jpg" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="" class="text-white text-decoration-none">Project 2</a>
                        </h4>
                        <a
                            href=""
                            class="text-decoration-none next-button d-flex justify-content-center align-items-center"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Upcoming Events-->
<section class="upcoming-events py-5">
    <div class="event-overlayer"></div>
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-green quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> UPCOMING EVENTS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1
            class="quicksand fw-bold text-center text-white my-4 mb-5"
            id="reveal-up">
            Get Involved in Our Events
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-8 blog-item" id="reveal-left">
                <div class="row">
                    <div class="col-md-4 p-0">
                        <div class="blog-image" style="height: 100%">
                            <img src="img/1.jpg" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div
                            class="blog-content d-flex flex-column justify-content-center">
                            <ul class="d-flex align-items-center text-gray">
                                <li>
                                    <i class="fa-solid fa-location-dot me-2 text-green"></i>
                                    Mirpur, Dhaka
                                </li>
                                <li class="ms-4">
                                    <i class="fa-regular fa-clock me-2 text-green"></i> 09:00
                                    AM
                                </li>
                                <li class="ms-4">
                                    <i class="fa-solid fa-calendar-days me-2 text-green"></i>
                                    12 June, 2021
                                </li>
                            </ul>
                            <h4 class="my-3">
                                <a href="" class="quicksand text-decoration-none text-dark">Event Title</a>
                            </h4>
                            <p class="text-gray mb-3" style="font-size: 14px">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Obcaecati magni consectetur magnam error deserunt veniam
                                ullam quod possimus porro ea?
                            </p>
                            <a
                                href=""
                                class="text-decoration-none text-gray"
                                style="font-size: 14px">Explore More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Blog and news-->
<section class="blog-news py-5">
    <div class="container py-5 px-4 px-lg-5">
        <p
            class="text-green quicksand fw-bold text-center"
            style="font-size: 16px"
            id="reveal-up">
            <i class="fa-solid fa-angles-left me-2"></i> BLOG & NEWS
            <i class="fa-solid fa-angles-right ms-2"></i>
        </p>
        <h1 class="quicksand fw-bold text-center my-4 mb-5" id="reveal-up">
            Latest Blog & News
        </h1>
        <div class="row">
            <div class="col-md-4 mb-4" id="reveal-left-3">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="blog-tag">Education</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-regular fa-user me-2 text-green"></i> By Admin
                            </li>
                            <li class="ms-4">
                                <i class="fa-solid fa-calendar-days me-2 text-green"></i> 12
                                June, 2021
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <hr class="my-3" />
                        <a
                            href=""
                            class="text-decoration-none text-gray"
                            style="font-size: 14px">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" id="reveal-left-2">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="blog-tag">Education</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-regular fa-user me-2 text-green"></i> By Admin
                            </li>
                            <li class="ms-4">
                                <i class="fa-regular fa-calendar me-2 text-green"></i> 12
                                June, 2021
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <hr class="my-3" />
                        <a
                            href=""
                            class="text-decoration-none text-gray"
                            style="font-size: 14px">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" id="reveal-left">
                <div class="blog-item position-relative">
                    <div class="blog-image">
                        <img src="img/1.jpg" class="img" />
                        <span class="blog-tag">Education</span>
                    </div>
                    <div class="blog-content">
                        <ul class="d-flex align-items-center text-gray">
                            <li>
                                <i class="fa-regular fa-user me-2 text-green"></i> By Admin
                            </li>
                            <li class="ms-4">
                                <i class="fa-regular fa-calendar me-2 text-green"></i> 12
                                June, 2021
                            </li>
                        </ul>
                        <h4 class="my-3">
                            <a href="" class="quicksand text-decoration-none text-dark">Blog Title</a>
                        </h4>
                        <hr class="my-3" />
                        <a
                            href=""
                            class="text-decoration-none text-gray"
                            style="font-size: 14px">Read More <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>

<script>
    $(document).ready(function() {
        $(".counter").counterUp({
            delay: 10,
            time: 2000,
        });
    });
</script>

<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        centeredSlides: true,
        autoplay: {
            delay: 7000,
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            nextEl: ".banner-button-next",
            prevEl: ".banner-button-previous",
        },
    });
</script>