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
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="about.php" class="nav-link">About Us</a>
                        </li>
                        <li>
                            <a href="projects.php" class="nav-link active">Projects</a>
                        </li>
                        <li>
                            <a href="events.php" class="nav-link">Events</a>
                        </li>
                        <li>
                            <a href="blogs.php" class="nav-link">Blogs</a>
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

<!--banner-top-->
<section class="banner-top">
    <div class="banner-overlayer"></div>
    <div
        class="container px-4 px-lg-5 d-flex flex-column justify-content-center align-items-center h-100">
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Projects</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Projects</span>
        </div>
    </div>
</section>

<!--Our Projects-->
<section class="our-projects py-5">
    <div class="container py-5 px-4 px-lg-5">
        <div class="row g-4">
            <div class="col-md-6" id="reveal-down">
                <div class="project-item position-relative">
                    <img src="img/1.jpg" class="img-fluid" />
                    <div
                        class="project-content d-flex justify-content-between align-items-center">
                        <h4>
                            <a href="project-single.php" class="text-white text-decoration-none">Project 1</a>
                        </h4>
                        <a
                            href="project-single.php"
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

<?php
include 'footer.php';
?>