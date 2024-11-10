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
                            <a href="projects.php" class="nav-link">Projects</a>
                        </li>
                        <li>
                            <a href="events.php" class="nav-link">Events</a>
                        </li>
                        <li>
                            <a href="blogs.php" class="nav-link active">Blogs</a>
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Blogs</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.html" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Blogs</span>
        </div>
    </div>
</section>

<!--Blog and news-->
<section class="blog-news py-5">
    <div class="container py-5 px-4 px-lg-5">
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
                            href="blog-single.php"
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