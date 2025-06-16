<?php
include 'header.php';
?>

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
                        <a href="contact.php" class="nav-link">Contact</a>
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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">
            Get Involved
        </h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Get Involved</span>
        </div>
    </div>
</section>

<!--Get Involved Cards-->
<section class="get-involved-cards py-5">
    <div class="container px-5 py-5">
        <div class="row g-0">
            <div class="col-md-4" id="reveal-left">
                <div
                    class="get-involved-card"
                    style="background-image: url('img/g1.jpg')">
                    <div
                        class="d-flex flex-column justify-content-center align-items-center p-4 py-5 h-100 get-involved-content">
                        <div
                            class="get-involved-icon d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-hand-holding-heart text-red"></i>
                        </div>
                        <h4 class="my-3 quicksand fw-bold text-white">
                            Become A Volunteer
                        </h4>
                        <p
                            class="text-white text-center quicksand"
                            style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            eget nunc vitae.
                        </p>
                        <a
                            href="volunteer.php"
                            class="custom-btn bg-white text-red text-uppercase rounded mt-3 quicksand fw-bold"
                            style="font-size: 16px">Join Us Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="reveal-up">
                <div
                    class="get-involved-card card-yellow"
                    style="background-image: url('img/g2.jpg')">
                    <div
                        class="d-flex flex-column justify-content-center align-items-center p-4 py-5 h-100 get-involved-content">
                        <div
                            class="get-involved-icon d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-heart-circle-plus text-yellow"></i>
                        </div>
                        <h4 class="my-3 quicksand fw-bold text-white">Get Involved</h4>
                        <p
                            class="text-white text-center quicksand"
                            style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            eget nunc vitae.
                        </p>
                        <a
                            href="volunteer.php"
                            class="custom-btn bg-white text-yellow text-uppercase rounded mt-3 quicksand fw-bold"
                            style="font-size: 16px">Join Us Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="reveal-right">
                <div
                    class="get-involved-card card-green"
                    style="background-image: url('img/g3.jpg')">
                    <div
                        class="d-flex flex-column justify-content-center align-items-center p-4 py-5 h-100 get-involved-content">
                        <div
                            class="get-involved-icon d-flex justify-content-center align-items-center">
                            <i class="fa-solid fa-hand-holding-medical text-green"></i>
                        </div>
                        <h4 class="my-3 quicksand fw-bold text-white">
                            Treat A Patient
                        </h4>
                        <p
                            class="text-white text-center quicksand"
                            style="font-size: 14px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                            eget nunc vitae.
                        </p>
                        <a
                            href="volunteer.php"
                            class="custom-btn bg-white text-green text-uppercase rounded mt-3 quicksand fw-bold"
                            style="font-size: 16px">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Get in touch-->
<section class="getintouch">
    <div class="container px-5 py-5 mb-5">
        <div class="row g-5">
            <div class="col-md-6 d-flex align-items-center" id="reveal-left">
                <img src="img/v1.jpg" class="img-fluid" />
            </div>
            <div class="col-md-6">
                <p
                    class="text-green quicksand fw-bold"
                    style="font-size: 16px"
                    id="reveal-up">
                    <i class="fa-solid fa-angles-left me-2"></i> Become Volunteer
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4 mb-5" id="reveal-up">
                    Become A Volunteer
                </h1>
                <div class="contact-form">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="mb-3 quicksand fw-bold">Your Name*</label>
                                <input
                                    type="text"
                                    class="custom-form-control"
                                    placeholder="Your Name" />
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mb-3 quicksand fw-bold">Your Email*</label>
                                <input
                                    type="email"
                                    class="custom-form-control"
                                    placeholder="Email" />
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mb-3 quicksand fw-bold">Phone Number*</label>
                                <input
                                    type="text"
                                    class="custom-form-control"
                                    placeholder="Phone Number" />
                            </div>
                            <div class="col-md-6">
                                <label for="" class="mb-3 quicksand fw-bold">Date of Birth*</label>
                                <input
                                    type="date"
                                    class="custom-form-control text-secondary"
                                    placeholder="mm/dd/yyyy" />
                            </div>
                            <div class="col-md-12">
                                <label for="" class="mb-3 quicksand fw-bold">Message*</label>
                                <textarea
                                    name=""
                                    id=""
                                    cols="30"
                                    rows="5"
                                    class="custom-form-control"
                                    placeholder="Write your message here..."></textarea>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="custom-btn bg-green hover-dark-blue rounded mt-3"
                            style="font-size: 16px">
                            Send Us A Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Member Benefit-->
<section class="about-us">
    <div class="container pb-5 px-4 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6">
                <p
                    class="text-green quicksand fw-bold"
                    id="reveal-up"
                    style="font-size: 16px">
                    <i class="fa-solid fa-angles-left me-2"></i> Become Volunteer
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4" id="reveal-up">
                    Member Benefit
                </h1>
                <p
                    class="text-dark quicksand my-4 text-justify"
                    style="font-size: 14px"
                    id="reveal-up">
                    Becoming a member of the <b>Youth Save A Smile Foundation</b> is more than just volunteering—it's about being part of a youth-led movement committed to real change. As a member, you'll gain the opportunity to work on impactful projects across education, health, and environmental sectors, especially in underserved regions like the Chittagong Hill Tracts. Whether you're contributing ideas, managing tasks, or leading initiatives, your involvement will help shape a better future for marginalized communities.
                </p>
                <p
                    class="text-dark quicksand my-4 text-justify"
                    style="font-size: 14px"
                    id="reveal-up">
                    At the same time, you'll be developing valuable personal and professional skills that extend beyond the Foundation. Members are encouraged to explore their interests, take initiative, and grow through experience-based learning. With flexible, task-oriented roles and an open environment for creativity and leadership, the Youth Save A Smile Foundation empowers you to create impact while building a strong foundation for your own journey.
                </p>
                <div class="row" id="reveal-down">
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Real-world project experience
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Leadership and skill development
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Flexible, task-based roles
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Certificates and special rewards
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Freedom to launch your own ideas
                            </li>
                            <li class="mb-4">
                                <i class="fa-regular fa-circle-check me-2"></i> Make a real impact in communities
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center h-100" id="reveal-right">
                    <img src="img/v2.jpg" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>