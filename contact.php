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
        <h2 class="text-white quicksand fw-bold" id="reveal-up">Contact</h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Contact</span>
        </div>
    </div>
</section>

<!--Contact-->
<section class="contact">
    <div class="container p-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <div class="card-icon bg-green text-white">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div class="card-text py-4">
                        <p class="text-center mb-0 quicksand fw-bold">
                            saveasmile.fd@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <div class="card-icon bg-green text-white">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="card-text py-4">
                        <p class="text-center mb-0 quicksand fw-bold">
                            (+880)1865054501
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="contact-card">
                    <div class="card-icon bg-green text-white">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="card-text py-4">
                        <p class="text-center mb-0 quicksand fw-bold">
                            Near the District Election Office,<br />Khagrachari Sadar,
                            Khagrachari
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Get in touch-->
<section class="getintouch">
    <div class="container px-5 pb-5 mb-5">
        <div class="row g-5">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1782.4756997950788!2d91.9734733704052!3d23.11859566526225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1719286007128!5m2!1sen!2sbd"
                    width="100%"
                    height="100%"
                    style="border: 1px solid #f6f6f6"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <p
                    class="text-green quicksand fw-bold"
                    style="font-size: 16px"
                    id="reveal-up">
                    <i class="fa-solid fa-angles-left me-2"></i> CONTACT
                    <i class="fa-solid fa-angles-right ms-2"></i>
                </p>
                <h1 class="quicksand fw-bold my-4 mb-5" id="reveal-up">
                    Get In Touch
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
                            <div class="col-md-12">
                                <label for="" class="mb-3 quicksand fw-bold">Subject*</label>
                                <input
                                    type="text"
                                    class="custom-form-control"
                                    placeholder="Subject" />
                            </div>
                            <div class="col-md-12">
                                <label for="" class="mb-3 quicksand fw-bold">Your Message*</label>
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
                            Get in Touch
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<?php include 'footer.php'; ?>