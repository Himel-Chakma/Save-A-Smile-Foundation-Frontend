<?php include 'header.php'; ?>
<!-- Header -->
<div id="topbar">
    <div class="container px-0 px-lg-5">
        <div
            class="d-flex justify-content-between py-3 align-items-center custom-border-bottom-yellow z-index">
            <button
                class="custom-btn d-lg-none bg-yellow rounded-normal ms-3"
                style="font-size: 18px"
                id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="index.php"><img src="img/logo2.png" width="180" /></a>
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
                        <a href="blogs.php" class="nav-link">Blogs</a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link active">Contact</a>
                    </li>
                </ul>
            </div>
            <a
                href="donate.php"
                class="custom-btn bg-green hover-dark-blue rounded me-3 me-lg-0"
                style="font-size: 13px">
                DONATE NOW
            </a>
        </div>
    </div>
</div>

<!--banner-top-->
<section class="banner-top">
    <div class="banner-overlayer"></div>
    <div
        class="container px-4 px-lg-5 d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="text-white quicksand fw-bold" id="reveal-up">Donate Now</h1>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Donate Now</span>
        </div>
    </div>
</section>

<!--Contact-->
<section class="contact">
    <div class="container p-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="card-img d-flex justify-content-center align-items-center">
                        <img src="img/bkash.png" alt="" width="80" height="80" />
                    </div>
                    <div class="card-text py-3">
                        <p class="text-center mb-0 quicksand fw-bold fs-4">
                            BKash
                        </p>
                        <p class="text-center mb-0 quicksand fw-bold fs-5 text-gray">(+88)01891982380</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="card-img d-flex justify-content-center align-items-center">
                        <img src="img/rocket.png" alt="" width="80" height="80" />
                    </div>
                    <div class="card-text py-3">
                        <p class="text-center mb-0 quicksand fw-bold fs-4">
                            Rocket
                        </p>
                        <p class="text-center mb-0 quicksand fw-bold fs-5 text-gray">(+88)01912547231</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="card-img d-flex justify-content-center align-items-center">
                        <img src="img/nagad.png" alt="" width="80" height="80" />
                    </div>
                    <div class="card-text py-3">
                        <p class="text-center mb-0 quicksand fw-bold fs-4">
                            Nagad
                        </p>
                        <p class="text-center mb-0 quicksand fw-bold fs-5 text-gray">(+88)01891982380</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="card-img d-flex justify-content-center align-items-center">
                        <img src="img/sonali.png" alt="" width="80" height="80" />
                    </div>
                    <div class="card-text py-3">
                        <p class="text-center mb-0 quicksand fw-bold fs-4">
                            Sonali Bank PLC
                        </p>
                        <p class="text-center mb-0 quicksand fw-bold fs-5 text-gray">ACC: 123456789012345<br>
                            Khagrachari Sadar Branch, Khagrachari</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<?php include 'footer.php'; ?>